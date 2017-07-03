var VIEW_MODE_VALUES = 0;
var VIEW_MODE_FORMULAS = 1;
var VIEW_MODE_TYPES = 2;
function GridModel(grid) {
    var self = this;
    WrapEvents(self);
    self.register("Error");
    self.register("NameChanged");
    self.register("ActiveCellChanged");
    self.register("SelectionChanged");
    self.construct = function() {
        this.viewport = new Range({
            row: 0,
            col: 0
        },
        {
            row: grid.getViewport().row,
            col: grid.getViewport().col
        });
        this.gridPosition = {
            x: grid.getVisibleWidth(),
            y: grid.getVisibleHeight()
        };
        this.scrollPageOffset = {
            x: 800,
            y: 1500
        };
        this.activeCell = {
            row: 0,
            col: 0
        };
        this.selection = new DataSelectionHandler();
        this.selection.setSelection(new Range({
            row: 0,
            col: 0
        }).normalize());
        this.viewMode = VIEW_MODE_VALUES;
        addModelStyleOperations(this);
        this.store = new SimpleStore();
    };
    self.getRelativeRange = function(range) {
        var result = range.clone();
        result.sub(this.viewport.start.row, this.viewport.start.col);
        return result;
    };
    self.getAbsoluteRange = function(range) {
        range.add(this.viewport.start.row, this.viewport.start.col);
        return range;
    };0
    self.updateGridHeight = function() {
        if (grid.getMinHeight() < this.model.getHeight()) {
            grid.setHeight(this.model.getHeight());
        }
    };
    self.updateGridWidth = function() {
        if (grid.getMinWidth() < this.model.getWidth()) {
            grid.setWidth(this.model.getWidth());
        }
    };
    self.setDataModel = function(model) {
        this.model = model;
        this.updateGridHeight();
        this.updateGridWidth();
        this.refresh();
    };
    self.refresh = function() {
        for (var j = 0; j < (this.viewport.end.col - this.viewport.start.col + 1); j++) {
            grid.getColumn(j).setTitle(this.model.getColumnName(this.viewport.start.col + j));
            grid.getColumn(j).setSize(this.model.getColumnSize(this.viewport.start.col + j));
        }
        grid.adjustViewPortX();
        for (var i = 0; i < (this.viewport.end.row - this.viewport.start.row + 1); i++) {
            grid.getRow(i).setTitle(this.model.getRowName(this.viewport.start.row + i));
            grid.getRow(i).setSize(this.model.getRowSize(this.viewport.start.row + i));
            for (var j = 0; j < (this.viewport.end.col - this.viewport.start.col); j++) {
                var cell = this.model.getCell(this.viewport.start.row + i, this.viewport.start.col + j);
                self.refreshVCell(cell, i, j);
            }
        }
        grid.adjustViewPort();
        this.viewport.end.row = this.viewport.start.row + grid.getViewport().row;
        this.viewport.end.col = this.viewport.start.col + grid.getViewport().col;
        this.drawSelections();
    };
    self.refreshValues = function() {
        for (var i = 0; i < (this.viewport.end.row - this.viewport.start.row + 1); i++) {
            for (var j = 0; j < (this.viewport.end.col - this.viewport.start.col); j++) {
                var cell = this.model.getCell(this.viewport.start.row + i, this.viewport.start.col + j);
                if (cell) {
                    var value = cell.getValue();
                    if (value == undefined) {
                        value = "";
                    }
                    grid.setValue(i, j, value);
                }
            }
        }
    };
    self.refreshVCell = function(cell, row, col) {
        if (cell) {
            if (self.viewMode == VIEW_MODE_VALUES) {
                var value = cell.getFormattedValue();
            } else {
                var value = cell.getFormula();
            }
            if (value == undefined) {
                value = "";
            }
            grid.setCell(row, col, value, cell.getFontStyleId());
        } else {
            grid.setCell(row, col, "", 0, 0);
        }
    };
    self.changeActiveCell = function(address) {
        if (address != undefined) {
            self.activeCell = address;
        }
        var value = this.model.getFormula(self.activeCell.row, self.activeCell.col);
        if (value == undefined) {
            value = "";
        }
        self.fire("ActiveCellChanged", value);
    };
    self.setActiveCellFormula = function(value, dontTrigger) {
        var oldValue = self.model.getFormula(self.activeCell.row, self.activeCell.col);
        if (oldValue == undefined) {
            oldValue = "";
        }
        if (oldValue != value) {
            self.beginTransaction();
            try {
                self.model.setFormula(self.activeCell.row, self.activeCell.col, value);
            } catch(e) {
                self.fire("Error", e);
            }
        }
        if (dontTrigger == undefined) {
            self.fire("ActiveCellChanged", value);
        }
    };
    self.setSelection = function(range, dontTrigger) {
        self.selection.setSelection(range);
        if (dontTrigger == undefined) {
            self.fire("SelectionChanged", self.model.getRangeName(range));
        }
    };
    self._applyToSelection = function(cellCallback, rowCallback, colCallback) {
        var selections = self.selection.getSelection();
        for (var k = 0; k < selections.length; k++) {
            var selection = selections[k].normalize();
            if (selection.start) {
                if (selection.start.row != undefined && selection.start.col != undefined) {
                    if (selection.end) {
                        if (selection.end.row != undefined && selection.end.col != undefined) {
                            self.beginTransaction();
                            for (var i = selection.start.row; i <= selection.end.row; i++) {
                                for (var j = selection.start.col; j <= selection.end.col; j++) {
                                    cellCallback(i, j);
                                }
                            }
                        }
                    }
                } else {
                    self.beginTransaction();
                    if (selection.isRow()) {
                        for (var i = selection.start.row; i <= selection.end.row; i++) {
                            rowCallback(i);
                        }
                    } else {
                        for (var i = selection.start.col; i <= selection.end.col; i++) {
                            colCallback(i);
                        }
                    }
                }
            }
        }
    };
    self.deleteSelection = function() {
        self._applyToSelection(function(i, j) {
            self.model.setFormula(i, j, "");
        },
        self.model.deleteRowValues, self.model.deleteColValues);
        self.refresh();
    };
    self.increaseDecimals = function() {
        var decimals = self.model.getDecimals(self.activeCell.row, self.activeCell.col);
        if (decimals > 0) {
            decimals++;
        } else {
            decimals = 1;
        }
        self._applyToSelection(function(i, j) {
            self.model.setDecimals(i, j, decimals);
        },
        function(i) {},
        function(i) {});
        self.refresh();
    };
    self.decreaseDecimals = function() {
        var decimals = self.model.getDecimals(self.activeCell.row, self.activeCell.col);
        if (decimals > 0) {
            decimals--;
        } else {
            decimals = 0;
        }
        self._applyToSelection(function(i, j) {
            self.model.setDecimals(i, j, decimals);
        },
        function(i) {},
        function(i) {});
        self.refresh();
    };
    self.setValueToSelection = function() {
        var selections = self.selection.getSelection();
        var value = grid.cellEditor.getValue();
        for (var k = 0; k < selections.length; k++) {
            var selection = selections[k].normalize();
            if (selection.start.row != undefined && selection.start.col != undefined) {
                if (selection.end.row != undefined && selection.end.col != undefined) {
                    self.beginTransaction();
                    for (var i = selection.start.row; i <= selection.end.row; i++) {
                        for (var j = selection.start.col; j <= selection.end.col; j++) {
                            try {
                                self.model.setFormula(i, j, value);
                            } catch(e) {
                                self.fire("Error", e);
                            }
                        }
                    }
                }
            }
        }
        self.refresh();
    };
    self.isRangeVisible = function(row, col) {
        if (row != undefined) {
            if (row < self.viewport.start.row || row >= self.viewport.end.row) {
                return false;
            }
        }
        if (col != undefined) {
            if (col < self.viewport.start.col || col >= self.viewport.end.col) {
                return false;
            }
        }
        return true;
    };
    self.editActiveCell = function(value) {
        grid.cellEditor.setValue(value);
    };
    self.undo = function() {
        self.model.rollBack();
        self.selection.rollBack();
        self.rollBack();
        self.refresh();
    };
    self.redo = function() {
        self.model.restore();
        self.selection.restore();
        self.restore();
        self.refresh();
    };
    self.rollBack = function() {
        if (this.store.canRollBack()) {
            var temp = self.store.getCurrent();
            self.store.rollBack(self.activeCell);
            self.changeActiveCell(temp);
        }
    };
    self.restore = function() {
        if (this.store.canRestore()) {
            var temp = this.store.restore(self.activeCell);
            self.changeActiveCell(temp);
        }
    };
    self.saveState = function() {
        self.store.set({
            row: self.activeCell.row,
            col: self.activeCell.col
        });
    };
    self.beginTransaction = function() {
        self.store.beginTransaction();
        self.model.beginTransaction();
        self.selection.beginTransaction();
        self.saveState();
    };
    self.addName = function(name) {
        var changed = self.model.addName(name, self.selection.getActiveSelection().clone());
        self.fire("NameChanged", name);
        return changed;
    };
    self.getNames = function() {
        return self.model.getNames();
    };
    self.deleteName = function(name) {
        self.model.deleteName(name);
        self.fire("NameChanged");
    };
    self.existsName = function(name) {
        var temp = self.model.existsName(name);
        return temp;
    };
    self.getActiveCellValue = function() {
        return self.model.getValue();
    };
    self.changeViewMode = function(viewMode) {
        if (viewMode != undefined) {
            self.viewMode = viewMode;
        } else {
            self.viewMode = !self.viewMode;
        }
        self.refresh();
    };
    addDataModelSelection(self, grid);
    self.construct();
    addModelNavigation(self, grid);
    ExtendModelEvents(self, grid);
    return self;
}
function addModelStyleOperations(model) {
    model.getActiveFontStyleId = function() {
        return (model.selection.getSelection())[0].getFontStyleId();
    };
    model.setSelectionFontStyleId = function(fsId) {
        var selection = model.selection.getSelection();
        for (var i = 0; i < selection.length; i++) {
            this.setRangeFontStyleId(selection[i], fsId);
        }
        model.refresh();
    };
    model.getRangeFontStyleId = function(range) {
        var fontStyleId = 0;
        if (range.start.row != undefined) {
            if (range.start.col != undefined) {
                fontStyleId = this.model.getCellFontStyleId(range.start.row, range.start.col);
            } else {
                fontStyleId = this.model.getRowFontStyleId(range.start.row);
            }
        } else {
            fontStyleId = this.model.getColumnFontStyleId(range.start.col);
        }
        return fontStyleId;
    };
    model.setRangeFontStyleId = function(range, fontStyleId) {
        range.normalize();
        if (range.start.row != undefined) {
            if (range.start.col != undefined) {
                for (var i = range.start.row; i <= range.end.row; i++) {
                    for (var j = range.start.col; j <= range.end.col; j++) {
                        this.model.setCellFontStyleId(i, j, fontStyleId);
                    }
                }
            } else {
                this.model.setRowFontStyleId(range.start.row, fontStyleId);
            }
        } else {
            this.model.setColumnFontStyleId(range.start.col, fontStyleId);
        }
    };
    model.changeBgColorToSelection = function(color) {
        var selection = model.selection.getSelection();
        var range = undefined;
        if (selection.length) {
            this.setRangeBgColor(selection[0].row, selection[0].col, color);
        }
        for (var i = 1; i < selection.length; i++) {
            if (selection[i].row == undefined) {
                this.setRangeBgColor(0, selection[i].col, color);
            } else {
                this.setRangeBgColor(selection[i].row, selection[i].col, color);
            }
        }
        model.refresh();
    };
    model.setRangeBgColor = function(rowIndex, colIndex, color) {
        this.model.changeColumnFontStyleProp(colIndex, "bold", true);
        if (rowIndex != undefined) {
            if (colIndex != undefined) {
                application.grid.cells[rowIndex][colIndex].style.background = color;
            } else {
                this.model.setRowBgColor(rowIndex, color);
            }
        } else {
            this.model.setColumnBgColor(colIndex, color);
        }
    };
    model.setRangeFontStyleProperty = function(range, property, value) {
        range.normalize();
        if (range.start.row != undefined) {
            if (range.start.col != undefined) {
                for (var i = range.start.row; i <= range.end.row; i++) {
                    for (var j = range.start.col; j <= range.end.col; j++) {
                        this.model.changeCellFontStyleProp(i, j, property, value);
                    }
                }
            } else {
                for (var i = range.start.row; i <= range.end.row; i++) {
                    this.model.changeRowFontStyleProp(i, property, value);
                }
            }
        } else {
            for (var i = range.start.col; i <= range.end.col; i++) {
                this.model.changeColumnFontStyleProp(i, property, value);
            }
        }
    };
    model.changeFontStylePropertyToSelection = function(property, value) {
        var selection = model.selection.getSelection();
        var range = undefined;
        model.beginTransaction();
        if (value == undefined) {
            if (selection.length) {
                var fstyle = Styler.getFontStyleById(this.getRangeFontStyleId(selection[0]));
                value = !fstyle[property];
            }
        }
        for (var i = 0; i < selection.length; i++) {
            var fstyle = Styler.getFontStyleById(this.getRangeFontStyleId(selection[i]));
            if (value != fstyle[property]) {
                this.setRangeFontStyleProperty(selection[i], property, value);
            }
        }
        model.refresh();
    };
    model.changeBoldToSelection = function() {
        this.changeFontStylePropertyToSelection("bold");
    };
    model.changeUnderlineToSelection = function() {
        this.changeFontStylePropertyToSelection("underline");
    };
    model.changeItalicToSelection = function() {
        this.changeFontStylePropertyToSelection("italic");
    };
    model.changeFontSizeToSelection = function(size) {
        this.changeFontStylePropertyToSelection("size", size);
    };
    model.changeFontToSelection = function(font) {
        this.changeFontStylePropertyToSelection("font", font);
    };
    model.changeFontColorToSelection = function(color) {
        this.changeFontStylePropertyToSelection("color", color);
    };
    model.changeAlignToSelection = function(align) {
        this.changeFontStylePropertyToSelection("align", align);
    };
    model.changeValignToSelection = function(valign) {
        this.changeFontStylePropertyToSelection("valign", valign);
    };
}
function ExtendModelEvents(self, grid) {
    grid.on("ActiveCellChange",
    function(caller, address, value) {
        if (self.activeCell.row != address.row || self.activeCell.col != address.col) {
            self.setActiveCellFormula(value, true);
            if (address.row != undefined) {
                address.row += self.viewport.start.row;
            }
            if (address.col != undefined) {
                address.col += self.viewport.start.col;
            }
            self.changeActiveCell(address);
            self.setSelection(new Range(address));
            self.refresh();
        }
    });
    grid.on("RowAdded", function(caller, row, size) {
        grid.getRow(row).setTitle(this.model.getRowName(this.viewport.start.row + row));
        grid.getRow(row).setSize(this.model.getRowSize(this.viewport.start.row + row));
        for (var j = 0; j < (this.viewport.end.col - this.viewport.start.col + 1); j++) {
            var cell = this.model.getCell(this.viewport.start.row + row, this.viewport.start.col + j);
            self.refreshVCell(row, j);
        }
    });
    grid.on("ColumnAdded", function(caller, col, size) {
        grid.getColumn(col).setTitle(this.model.getColumnName(this.viewport.start.col + col));
        grid.getColumn(col).setSize(this.model.getColumnSize(this.viewport.start.col + col));
        for (var i = 0; i < (this.viewport.end.row - this.viewport.start.row + 1); i++) {
            var cell = this.model.getCell(this.viewport.start.row + i, this.viewport.start.col + j);
            self.refreshGridCell(this.viewport.start.row + i, col);
        }
    });
    grid.cellEditor.on("ValueChanged", function(obj, value) {
        self.fire("ActiveCellChanged", value, value, 0);
    });
    grid.on("RowSizeChanged", function(obj, address, size) {
        self.beginTransaction();
        if (self.selection.getActiveSelection().isRow()) {
            var selections = self.selection.getSelection();
            for (var k = 0; k < selections.length; k++) {
                var selection = selections[k].normalize();
                for (var i = selection.start.row; i <= selection.end.row; i++) {
                    self.model.setRowSize(i, size);
                }
            }
        } else {
            self.model.setRowSize(address.row + self.viewport.start.row, size);
        }
        self.refresh();
    });
    grid.onColumnSizeChange = function(column) {
        self.beginTransaction();
        var size = column.getSize();
        if (self.selection.getActiveSelection().isColumn()) {
            var selections = self.selection.getSelection();
            for (var k = 0; k < selections.length; k++) {
                var selection = selections[k].normalize();
                for (var i = selection.start.col; i <= selection.end.col; i++) {
                    self.model.setColumnSize(i, size);
                }
            }
        } else {
            self.model.setColumnSize(column.getIndex() + self.viewport.start.col, size);
        }
        self.refresh();
    };
}
function addModelNavigation(self, grid) {
    self.moveUp = function() {
        self.setActiveCellFormula(grid.cellEditor.getValue(), true);
        if (self.activeCell.row > 0) {
            self.activeCell.row--;
            self.changeActiveCell();
            self.selection.setSelection(new Range({
                row: self.activeCell.row,
                col: self.activeCell.col
            },
            {
                row: self.activeCell.row,
                col: self.activeCell.col
            }));
            if (self.viewport.start.row > self.activeCell.row) {
                self.onMove(0, -1);
            }
            self.refresh();
        }
    };
    self.moveDown = function() {
        self.setActiveCellFormula(grid.cellEditor.getValue(), true);
        if (self.activeCell.row < 65000) {
            self.activeCell.row++;
            self.changeActiveCell();
            self.selection.setSelection(new Range({
                row: self.activeCell.row,
                col: self.activeCell.col
            },
            {
                row: self.activeCell.row,
                col: self.activeCell.col
            }));
            if (self.activeCell.row >= self.viewport.end.row) {
                self.onMove(0, 1);
            }
            self.refresh();
        }
    };
    self.moveLeft = function() {
        self.setActiveCellFormula(grid.cellEditor.getValue(), true);
        if (self.activeCell.col > 0) {
            self.activeCell.col--;
            self.changeActiveCell();
            self.selection.setSelection(new Range({
                row: self.activeCell.row,
                col: self.activeCell.col
            },
            {
                row: self.activeCell.row,
                col: self.activeCell.col
            }));
            if (!self.isRangeVisible(self.activeCell.row, self.activeCell.col)) {
                self.onMove( - 1, 0);
            }
            self.refresh();
        }
    };
    self.moveRight = function() {
        self.setActiveCellFormula(grid.cellEditor.getValue(), true);
        if (self.activeCell.row < 256) {
            self.activeCell.col++;
            self.changeActiveCell();
            self.selection.setSelection(new Range({
                row: self.activeCell.row,
                col: self.activeCell.col
            },
            {
                row: self.activeCell.row,
                col: self.activeCell.col
            }));
            if (!self.isRangeVisible(self.activeCell.row, self.activeCell.col)) {
                self.onMove(1, 0);
            }
            self.refresh();
        }
    };
    self.pageDown = function() {
        self.setActiveCellFormula(grid.cellEditor.getValue(), true);
        var offset = self.viewport.end.row - self.viewport.start.row;
        if (self.activeCell.row + offset >= self.model.getRowCount()) {
            self.activeCell.row = self.model.getRowCount() - 1;
            offset = 0;
        }
        self.activeCell.row += offset;
        self.changeActiveCell();
        self.setSelection(new Range(self.activeCell));
        grid.scrollDown(offset);
    };
    self.pageUp = function() {
        self.setActiveCellFormula(grid.cellEditor.getValue(), true);
        var offset = self.viewport.start.row - self.viewport.end.row;
        if (self.activeCell.row + offset < 0) {
            offset = -self.activeCell.row;
        }
        self.activeCell.row += offset;
        self.changeActiveCell();
        self.setSelection(new Range(self.activeCell));
        grid.scrollDown(offset);
    };
    self.goToHome = function() {
        if (self.onSpecialMove) {
            self.onSpecialMove("HOME");
        }
    };
    self.goToName = function(name) {
        var range = self.model.getNameAddress(name);
        range = new Range(range.start, range.end);
        if (range != undefined) {
            self.selection.setSelection(range);
            self.activeCell = {
                row: range.start.row,
                col: range.start.col
            };
            self.changeActiveCell();
            if (self.isRangeVisible(self.activeCell.row, self.activeCell.col)) {
                self.drawSelections();
            } else {
                self.viewport.start.row = range.start.row;
                self.viewport.start.col = range.start.col;
                self.viewport.end.row = self.viewport.start.row + grid.rows.length - 1;
                self.viewport.end.col = self.viewport.start.col + grid.cols.length - 1;
                self.refresh();
            }
        }
    };
    self.goToCell = function(row, col) {
        self.setActiveCellFormula(grid.cellEditor.getValue(), true);
        var range = new Range({
            row: row,
            col: col
        });
        self.changeActiveCell({
            row: row,
            col: col
        });
        if (self.isRangeVisible(row, col)) {}
        self.selection.setSelection(new Range({
            row: row,
            col: col
        },
        {
            row: row,
            col: col
        }));
        self.refresh();
    };
    self.onSpecialMove = function(moveType) {
        self.setActiveCellFormula(grid.cellEditor.getValue(), true);
        var offsetX = self.viewport.end.col - self.viewport.start.col;
        var offsetY = self.viewport.end.row - self.viewport.start.row;
        if (moveType == "HOME") {
            self.activeCell.row = 0;
            self.activeCell.col = 0;
            self.viewport.start.col = 0;
            self.viewport.end.col = offsetX;
            self.viewport.start.row = 0;
            self.viewport.end.row = offsetY;
            self.selection.setSelection(new Range(self.activeCell, self.activeCell));
        }
        self.refresh();
    };
    self.onMove = function(offsetX, offsetY) {
        if (offsetY < 0) {
            if ((self.viewport.start.row + offsetY) >= 0) {
                self.viewport.start.row += offsetY;
                self.viewport.end.row += offsetY;
                self.gridPosition.y += offsetY * 18;
            }
        } else {
            if (offsetY > 0) {
                self.viewport.start.row += offsetY;
                self.viewport.end.row += offsetY;
                self.gridPosition.y += offsetY * 18;
            }
        }
        if (offsetX < 0) {
            if ((self.viewport.start.col + offsetX) >= 0) {
                self.viewport.start.col += offsetX;
                self.viewport.end.col += offsetX;
            }
        } else {
            if (offsetX > 0) {
                self.viewport.start.col += offsetX;
                self.viewport.end.col += offsetX;
            }
        }
        self.refresh();
    };
    grid.onHorizontalScroll = function(left) {
        var offset = self.viewport.end.col - self.viewport.start.col;
        self.viewport.start.col = parseInt(left / 80);
        self.viewport.end.col = parseInt(left / 80) + offset;
        if (self.viewport.end.col * 80 + self.scrollPageOffset.x > grid.getWidth()) {
            grid.setWidth(grid.getWidth() + self.scrollPageOffset.x);
        }
        self.refresh();
    };
    grid.onVerticalScroll = function(top) {
        var offset = self.viewport.end.row - self.viewport.start.row;
        self.viewport.start.row = parseInt(top / 18);
        grid.adjustViewPortY();
        self.viewport.end.row = self.viewport.start.row + grid.viewport.row;
        if (self.viewport.end.row * 18 + self.scrollPageOffset.y > grid.getHeight()) {
            grid.setHeight(grid.getHeight() + self.scrollPageOffset.y);
        }
        self.refresh();
    };
    grid.scrollDown = function(offset) {
        var delta = self.viewport.start.row + offset;
        if (delta >= 0) {
            self.viewport.start.row = self.viewport.start.row + offset;
            grid.adjustViewPortY();
            self.viewport.end.row = self.viewport.start.row + grid.viewport.row;
            if (self.viewport.end.row * 18 + self.scrollPageOffset.y > grid.getHeight()) {
                grid.setHeight(grid.getHeight() + self.scrollPageOffset.y);
            }
            self.refresh();
        }
    };
}
function addDataModelSelection(self, grid) {
    grid.on("SelectionChange",
    function(caller, start, end) {
        self.setActiveCellFormula(grid.cellEditor.getValue(), true);
        var absRange = self.getAbsoluteRange(new Range(start, end));
        if (start == undefined) {
            self.selection.getActiveSelection().end = absRange.end;
        } else {
            self.selection.setSelection(absRange);
        }
        var activeCell = self.selection.getActiveSelection().start;
        if (end == undefined) {
            activeCell = {
                row: absRange.start.row,
                col: absRange.start.col
            };
        }
        if (activeCell.row == undefined) {
            activeCell = {
                row: self.viewport.start.row,
                col: activeCell.col
            };
        }
        if (activeCell.col == undefined) {
            activeCell = {
                row: activeCell.row,
                col: self.viewport.start.col
            };
        }
        self.changeActiveCell(activeCell);
        self.fire("SelectionChanged", self.model.getRangeName(self.selection.getActiveSelection().clone()));
        self.drawSelections();
    });
    self.getVisibleRange = function(range) {
        var result = range.clone();
        result.normalize();
        if (result.end.row < self.viewport.start.row) {
            return undefined;
        }
        if (result.end.col < self.viewport.start.col) {
            return undefined;
        }
        if (result.start.row < self.viewport.start.row) {
            result.start.row = self.viewport.start.row;
        }
        if (result.start.col < self.viewport.start.col) {
            result.start.col = self.viewport.start.col;
        }
        if (result.end.row > self.viewport.end.row) {
            result.end.row = self.viewport.end.row;
        }
        if (result.end.col > self.viewport.end.col) {
            result.end.col = self.viewport.end.col;
        }
        return result;
    };
    self.drawSelections = function() {
        grid.clearSelection();
        var selection = self.selection.getSelection();
        for (var i = 0; i < selection.length; i++) {
            var range = self.getVisibleRange(selection[i]);
            if (range != undefined) {
                range = self.getRelativeRange(range);
                grid.drawSelection(range.start, range.end);
            }
        }
        if (self.isRangeVisible(this.activeCell.row, this.activeCell.col)) {
            grid.drawActiveCell(this.activeCell.row - self.viewport.start.row, this.activeCell.col - self.viewport.start.col, this.model.getFormula(this.activeCell.row, this.activeCell.col));
        }
    };
}