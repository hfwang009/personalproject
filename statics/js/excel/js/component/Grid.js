function addGridSelectionOperations(grid) {
    grid.selectRange = function(start, end) {
        if (start.row == end.row && start.col == end.col) {
            this.selectorBox.fitToRange(this.cells[start.row][start.col]);
            return this.drawSimpleRange(start.row, start.col);
        }
        if (start.row < end.row) {
            var rowStart = start.row;
            var rowEnd = end.row;
        } else {
            var rowEnd = start.row;
            var rowStart = end.row;
        }
        if (start.col < end.col) {
            var colStart = start.col;
            var colEnd = end.col;
        } else {
            var colEnd = start.col;
            var colStart = end.col;
        }
        for (var i = rowStart; i <= rowEnd; i++) {
            for (var j = colStart; j <= colEnd; j++) {
                this.selectCell(i, j, true);
            }
        }
    };
    grid.selectColumn = function(index) {
        this.cols[index].select();
        for (var i = 0; i < this.rows.length; i++) {
            this.rows[i].activate();
        }
    };
    grid.selectRow = function(index) {
        this.rows[index].select();
        for (var i = 0; i < this.cols.length; i++) {
            this.cols[i].activate();
        }
    };
    grid.selectCell = function(row, col, inside) {
        try {
            this.rows[row].activate();
            this.cols[col].activate();
            this.cells[row][col].select();
            if (!inside) {
                this.cells[row][col].style.border = "3px solid #000";
            }
        } catch(e) {}
    };
    grid.clearSelection = function() {
        for (var i = 0; i < this.cols.length; i++) {
            this.cols[i].unselect();
        }
        for (var i = 0; i < this.rows.length; i++) {
            this.rows[i].unselect();
        }
        this.clearActiveCell();
    };
    grid.drawColumnsSelection = function(start, end) {
        if (start < end) {
            for (var i = start; i <= end; i++) {
                this.selectColumn(i);
            }
        } else {
            for (var i = end; i <= start; i++) {
                this.selectColumn(i);
            }
        }
    };
    grid.drawRowsSelection = function(start, end) {
        if (start < end) {
            for (var i = start; i <= end; i++) {
                this.selectRow(i);
            }
        } else {
            for (var i = end; i <= start; i++) {
                this.selectRow(i);
            }
        }
    };
    grid.drawCurrentSelection = function() {
        var start = this.selection.start;
        var end = this.selection.end;
        this.clearSelection();
        if (end != undefined) {
            if (start.col == undefined) {
                this.drawRowsSelection(start.row, end.row);
                return;
            }
            if (start.row == undefined) {
                this.drawColumnsSelection(start.col, end.col);
            } else {
                this.selectRange(start, end);
            }
        } else {
            this.drawSelection(start.row, start.col);
        }
    };
    grid.drawSelection = function(start, end) {
        if (end != undefined) {
            if (start.col == undefined) {
                this.drawRowsSelection(start.row, end.row);
                return;
            }
            if (start.row == undefined) {
                this.drawColumnsSelection(start.col, end.col);
            } else {
                this.selectRange(start, end);
            }
        } else {
            this.drawSimpleRange(start.row, start.col);
        }
    };
    grid.drawSimpleRange = function(row, col) {
        if (row == undefined) {
            grid.selectColumn(col);
        } else {
            if (col == undefined) {
                grid.selectRow(row);
            } else {
                grid.selectCell(row, col, true);
            }
        }
    };
    grid.clearActiveCell = function() {
        this.cellEditor.style.visibilty = "hidden";
        this.selectorBox.setVisible(false);
    };
    grid.drawActiveCell = function(row, col, value) {
        try {
            this.cellEditor.style.visibilty = "visible";
            this.cellEditor.fitToCell(this.cells[row][col]);
            this.cellEditor.setValue(value);
        } catch(e) {
            alert(row + ", " + col + " , " + value);
        }
    };
}
function addGridOperations(grid) {
    grid.resizeColumn = function() {
        var offset = grid.verticalResizer.endResizing();
        grid.columnUsed.resize(offset);
        var diff = grid.offsetWidth - (grid.cols[grid.cols.length - 1].offsetLeft + grid.cols[grid.cols.length - 1].offsetWidth);
        if (diff > 0) {
            for (var i = 0; i < diff / grid.configs.colHeader.width; i++) {
                grid.addColumn();
            }
        }
        grid.adjustViewPortX();
        if (grid.onColumnSizeChange) {
            grid.onColumnSizeChange(grid.columnUsed);
        }
        grid.columnUsed = undefined;
    };
    grid.resizeRow = function(pos) {
        var offset = grid.horizontalResizer.endResizing(pos);
        grid.rowUsed.resize(offset);
        var diff = grid.offsetHeight - (grid.rows[grid.rows.length - 1].offsetTop + grid.rows[grid.rows.length - 1].offsetHeight);
        if (diff > 0) {
            for (var i = 0; i < diff / grid.configs.rowHeader.height; i++) {
                grid.addRow();
            }
        }
        grid.adjustViewPortY();
        grid.fire("RowSizeChanged", grid.rowUsed.getAddress(), grid.rowUsed.getSize());
        grid.rowUsed = undefined;
    };
    grid.getActiveCell = function() {
        return grid.activeCell;
    };
    grid.getActiveCellValue = function() {
        return grid.cellEditor.getValue();
    };
    grid.setValue = function(row, col, value) {
        this.cells[row][col].setValue(value);
    };
    grid.setCell = function(row, col, value, fontStyleId) {
        try {
            this.cells[row][col].setValue(value);
            this.cells[row][col].updateFontStyle(fontStyleId);
        } catch(e) {}
    };
    grid.setFontStyle = function(row, col, fontStyleId) {
        WrapFontStyle(this.cells[row][col], fontStyleId);
    };
    grid.setLayerStyle = function(row, col, layerStyleId) {
        WrapLayerStyle(this.cells[row][col], layerStyleId);
    };
    grid.setLayoutStyle = function(row, col, layoutStyleId) {
        WrapLayoutStyle(this.cells[row][col], layoutStyleId);
    };
    grid.getRowCount = function() {
        return grid.viewport.row;
    };
    grid.getColumnCount = function() {
        return grid.viewport.col;
    };
    grid.getColumn = function(index) {
        return grid.cols[index];
    };
    grid.getRow = function(index) {
        return grid.rows[index];
    };
    grid.getViewport = function() {
        return this.viewport;
    };
    grid.reset = function() {
        for (var i = 0; i < grid.rows.length; i++) {
            grid.rows[i].setSize(grid.configs.rowHeader.height);
        }
        for (var i = 0; i < grid.cols.length; i++) {
            grid.cols[i].setSize(grid.configs.colHeader.width);
        }
        grid.adjustViewPort();
    };
}
function Grid(configs) {
    var self = document.createElement("DIV");
    self.configs = {
        height: 500,
        width: 700,
        rowHeader: {
            height: 18,
            width: 30
        },
        colHeader: {
            height: 18,
            width: 80
        },
        scrollbar: {
            height: 16,
            width: 17
        },
        resizeHandler: {
            size: 5
        }
    };
    for (var prop in configs) {
        self.configs[prop] = configs[prop];
    }
    WrapEvents(self);
    self.register("ColumnSizeChange");
    self.register("ColumnFormatChange");
    self.register("RowSizeChanged");
    self.register("SelectionChange");
    self.register("CellValueChange");
    self.register("ActiveCellChange");
    self.register("RowAdded");
    self.register("ColumnAdded");
    self.register("EditingMode");
    self.addRow = function(passive) {
        var row = new VRow(this.rows.length);
        row.setHeight(this.configs.rowHeader.height);
        var i = this.rows.push(row) - 1;
        this.cells[i] = new Array();
        for (var j = 0; j < this.cols.length; j++) {
            var cell = new VCell(i, j);
            this.cols[j].addCell(cell);
            row.addCell(cell);
            this.cells[i][j] = cell;
            addGridCellEvents(self, cell);
        }
        addGridRowEvents(self, row);
        this.body.appendChild(row);
    };
    self.addColumn = function() {
        var column = new VColumn(this.cols.length);
        column.setHeight(this.configs.rowHeader.height);
        column.setWidth(this.configs.colHeader.width);
        var idx = this.cols.push(column);
        addGridColumnEvents(self, column);
        for (var i = 0; i < this.rows.length; i++) {
            var cell = new VCell(i, idx);
            this.rows[i].addCell(cell);
            this.cells[i].push(cell);
            column.addCell(cell);
            addGridCellEvents(self, cell);
        }
        this.colHeader.appendChild(column);
    };
    self.adjustViewPortX = function() {
        //if (this.viewport.col >= this.cols.length) {
        //    this.viewport.col = this.cols.length - 1;
        //}
        //var width = parseInt(this.offsetWidth);
        //if (this.cols[this.viewport.col].offsetLeft >= width) {
        //    for (var j = this.viewport.col; this.cols[j].offsetLeft > width; j--) {
        //        this.viewport.col = j - 1;
        //    }
        //} else {
        //    for (var j = this.viewport.col - 1; (this.cols[j].offsetLeft + this.cols[j].offsetWidth) < width; j++) {
        //        this.viewport.col = j + 1;
        //    }
        //}
    };
    self.adjustViewPortY = function() {
        //if (this.viewport.row >= this.rows.length) {
        //    this.viewport.row = this.rows.length - 1;
        //}
        //var height = parseInt(this.style.height);
        //if (this.rows[this.viewport.row].offsetTop > height) {
        //    for (var i = this.viewport.row; this.rows[i].offsetTop >= height; i--) {
        //        this.viewport.row = i - 1;
        //    }
        //} else {
        //    try {
        //        for (var i = this.viewport.row; (i < this.rows.length) && (this.rows[i].offsetTop + this.rows[i].offsetHeight) <= height; i++) {
        //            this.viewport.row = i;
        //        }
        //    } catch(e) {}
        //}
    };
    self.adjustViewPort = function() {
        self.adjustViewPortX();
        self.adjustViewPortY();
    };
    self.setDimensions = function(width, height) {
        this.scrollbars.setHeight(height);
        this.scrollbars.setWidth(width);
    };
    self.getMinHeight = function() {
        return this.minDimension.height;
    };
    self.getHeight = function() {
        return this.scrollbars.getHeight();
    };
    self.getVisibleHeight = function() {
        return parseInt(this.grid.style.height);
    };
    self.setHeight = function(height) {
        this.scrollbars.setHeight(height);
    };
    self.getVisibleWidth = function() {
        return parseInt(this.grid.style.width);
    };
    self.getMinWidth = function() {
        return this.minDimension.width;
    };
    self.getWidth = function() {
        return this.scrollbars.getWidth();
    };
    self.setWidth = function(width) {
        this.scrollbars.setWidth(width);
    };
    self.construct = function() {
        var width = this.configs.width;
        var height = this.configs.height;
        this.cols = new Array();
        this.rows = new Array();
        this.cells = new Array();
        this.selecting = false;
        this.selectingRow = false;
        this.selectingCol = false;
        this.columnResizing = false;
        this.rowResizing = false;
        this.selection = {
            start: {
                row: 0,
                col: 0
            },
            end: undefined
        };
        this.columnUsed = undefined;
        var gridHeight = height - this.configs.scrollbar.height;
        var gridWidth = width - this.configs.scrollbar.width;
        var ncols = (gridWidth - this.configs.rowHeader.width) / this.configs.colHeader.width;
        var nrows = (gridHeight - this.configs.rowHeader.height) / this.configs.rowHeader.height;
        this.viewport = {
            row: parseInt(nrows),
            col: parseInt(ncols)
        };
        this.minDimension = {
            width: width * 2,
            height: height * 2
        };
        createGridGui(self, width, height);
        for (var j = 0; j < ncols; j++) {
            self.addColumn();
        }
        for (var i = 0; i < nrows; i++) {
            self.addRow();
        }
    };
    self.adjustGrid = function(width, height) {
        if (width != undefined && height != undefined) {
            while (this.rows[this.viewport.row].offsetTop < height) {
                self.addRow(true);
                this.viewport.row++;
            }
            while (this.cols[this.viewport.col].offsetLeft < width) {
                self.addColumn(true);
                this.viewport.col++;
            }
            self.adjustViewPort();
        }
    };
    self.inicialize = function() {
        this.adjustViewPort();
    };
    self.resize = function(width, height) {
        self.adjustGrid(width, height);
        self.setSize(width, height);
    };
    self.construct();
    addGridOperations(self);
    addGridMethods(self);
    addGridSelectionOperations(self);
    return self;
}
function createGridGui(self, width, height) {
    self.setSize = function(width, height) {
        var gridHeight = height - self.configs.scrollbar.height;
        var gridWidth = width - self.configs.scrollbar.width;
        self.style.height = px(height);
        self.style.width = px(width);
        self.gridContainer.style.width = px(gridWidth);
        self.gridContainer.style.height = px(gridHeight);
        self.grid.style.height = px(gridHeight);
        self.grid.style.width = px(gridWidth);
    };
    //self.style.left = "100px";
    //self.style.top = "100px";
    self.style.position = "absolute";
    self.style.overflow = "hidden";
    self.gridContainer = document.createElement("DIV");
    self.gridContainer.id = "GridContainer";
    self.gridContainer.style.position = "absolute";
    self.gridContainer.style.top = "1px";
    self.gridContainer.style.left = "0px";
    self.gridContainer.style.overflow = "hidden";
    self.gridContainer.style.zIndex = 5;
    self.gridContainer.style.backgroundColor = "transparent";
    self.grid = document.createElement("TABLE");
    self.grid.id = "Grid";
    self.grid.style.top = px(0);
    self.grid.style.left = px(0);
    self.grid.style.tableLayout = "fixed";
    self.grid.position = "absolute";
    self.grid.style.zIndex = 2;
    self.grid.cellSpacing = 0;
    self.head = document.createElement("THEAD");
    self.colHeader = new VRow(0);
    self.colHeader.setInnerHTML("");
    self.colHeader.childNodes[0].style.width = "30px";
    self.colHeader.childNodes[0].innerHTML = "";
    self.body = document.createElement("TBODY");
    self.scrollbars = new ScrollBar("ScrollBar", self.minDimension.width, self.minDimension.height);
    self.scrollbars.style.zIndex = 1;
    self.cellEditor = new CellEditor();
    self.selectorBox = new SelectorBox();
    self.setSize(width, height);
    self.verticalResizer = new SizeHandler(true);
    self.verticalResizer.style.left = "100px";
    self.horizontalResizer = new SizeHandler(false);
    self.horizontalResizer.style.top = "100px";
    self.head.appendChild(self.colHeader);
    self.grid.appendChild(self.head);
    self.grid.appendChild(self.body);
    self.gridContainer.appendChild(self.grid);
    self.gridContainer.appendChild(self.selectorBox);
    self.appendChild(self.gridContainer);
    self.appendChild(self.scrollbars);
    self.appendChild(self.verticalResizer);
    self.appendChild(self.horizontalResizer);
    
}