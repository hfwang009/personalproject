function Sheet(configs) {
    var self = this;
    var expression = new Expression("");
    self.getHeight = function() {
        return this.size.height;
    };
    self.getWidth = function() {
        return this.size.width;
    };
    self.getColumnCount = function() {
        return self.maxRange.col;
    };
    self.getRowCount = function() {
        return self.maxRange.row;
    };
    self.addRow = function(index) {
        if (index > this.rows.length) {
            var offset = index - this.rows.length;
            this.size.height += this.defaultRowHeight * offset;
        }
        this.rows[index] = new Row(index);
        this.cells[index] = new Array();
        return this.rows[index];
    };
    self.addColumn = function(index) {
        if (index > this.cols.length) {
            var offset = index - this.cols.length;
            this.size.width += configs.defaultColumnHeight * offset;
        }
        this.cols[index] = new Column(index);
        return this.cols[index];
    };
    self.addCell = function(row, col) {
        if (this.rows[row] == undefined) {
            this.addRow(row);
        }
        if (this.cols[col] == undefined) {
            this.addColumn(col);
        }
        this.cells[row][col] = new Cell(row, col);
        return this.cells[row][col];
    };
    self.deleteCell = function(row, col) {
        if (this.cells[row] != undefined) {
            this.cells[row][col] = undefined;
        }
    };
    self.construct = function(configs) {
        this.cells = new Array();
        this.rows = new Array();
        this.cols = new Array();
        this.namespace = new NameHandler();
        this.maxRange = {
            row: configs.rows,
            col: configs.cols
        };
        this.size = {
            height: 0,
            width: 0
        };
        this.store = new Store();
    };
    self.beginTransaction = function() {
        this.store.beginTransaction();
    };
    self.rollBack = function() {
        var currentState = this.store.getCurrent();
        this.store.rollBack();
        for (var i = 0; i < currentState.length; i++) {
            var state = currentState[i];
            switch (state.property) {
            case "formula":
                this.setFormula(state.address.row, state.address.col, state.oldValue, true);
                break;
            case "fstyle":
                this.setCellFontStyleId(state.address.row, state.address.col, state.oldValue, true);
                break;
            case "decimal":
                this.setDecimals(state.address.row, state.address.col, state.oldValue, true);
                break;
            case "size":
                if (state.address.row == undefined) {
                    this.setColumnSize(state.address.col, state.oldValue, true);
                } else {
                    this.setRowSize(state.address.row, state.oldValue, true);
                }
                break;
            }
        }
    };
    self.restore = function() {
        if (this.store.canRestore()) {
            this.store.restore();
            var currentState = this.store.getCurrent();
            for (var i = 0; i < currentState.length; i++) {
                var state = currentState[i];
                switch (state.property) {
                case "formula":
                    this.setFormula(state.address.row, state.address.col, state.newValue, true);
                    break;
                case "fstyle":
                    this.setCellFontStyleId(state.address.row, state.address.col, state.newValue, true);
                    break;
                case "decimal":
                    this.setDecimals(state.address.row, state.address.col, state.newValue, true);
                    break;
                case "size":
                    if (state.address.row == undefined) {
                        this.setColumnSize(state.address.col, state.newValue, true);
                    } else {
                        this.setRowSize(state.address.row, state.newValue, true);
                    }
                    break;
                }
            }
        }
    };
    self.getRowIndexByPosition = function(top) {
        return parseInt(top / configs.defaultRowHeight);
    };
    self.getRowSize = function(row) {
        if (this.rows[row]) {
            return this.rows[row].getSize();
        } else {
            return configs.defaultRowHeight;
        }
    };
    self.setRowSize = function(row, size, dontStore) {
        var previousSize = 0;
        if (this.rows[row] == undefined) {
            this.addRow(row);
        }
        if (dontStore == undefined) {
            var state = new State({
                row: row
            },
            "size", this.rows[row].getSize(), size);
            this.store.add(state);
        }
        var previousSize = this.rows[row].getSize();
        this.rows[row].setSize(size);
        this.size.height += size - previousSize;
    };
    self.getColumnSize = function(column) {
        if (this.cols[column]) {
            return this.cols[column].getSize();
        } else {
            return configs.defaultColumnWidth;
        }
    };
    self.setColumnSize = function(column, size, dontStore) {
        if (this.cols[column] == undefined) {
            this.addColumn(column);
        }
        if (dontStore == undefined) {
            var state = new State({
                col: column
            },
            "size", this.cols[column].getSize(), size);
            this.store.add(state);
        }
        this.cols[column].setSize(size);
    };
    self.getColumnName = function(column) {
        return this.namespace.getColumnName(column);
    };
    self.getRowName = function(row) {
        return row + 1;
    };
    self.getValue = function(row, column) {
        if (this.cells[row]) {
            if (this.cells[row][column]) {
                return (this.cells[row][column]).getValue();
            } else {
                return undefined;
            }
        } else {
            return undefined;
        }
    };
    self.setValue = function(row, column, value) {
        if (this.cells[row] == undefined) {
            this.addCell(row, column);
        } else {
            if (this.cells[row][column] == undefined) {
                this.addCell(row, column);
            }
        }
        this.cells[row][column].setValue(value);
    };
    self.deleteRowValues = function(row) {
        if (self.rows[row]) {
            for (var i in self.cells[row]) {
                if (i != "remove") {
                    self.setFormula(row, i, undefined);
                }
            }
        }
    };
    self.deleteColValues = function(column) {
        if (self.rows) {
            for (var row in self.rows) {
                if (row != "remove") {
                    if (self.cells[row][column]) {
                        self.setFormula(row, column, undefined);
                    }
                }
            }
        }
    };
    self.clearCellReferences = function(row, col) {
        if (self.cells[row]) {
            if (self.cells[row][col]) {
                self.cells[row][col].clearReferences();
            }
        }
    };
    self.getCellReferences = function(row, col) {
        if (self.cells[row]) {
            if (self.cells[row][col]) {
                return self.cells[row][col].getReferences();
            }
        }
    };
    self.checkCircularReferences = function(row, col, range) {
        try {
            if (range.addressInside(row, col)) {
                self.deleteCell(row, col);
                throw (new Error(300, ""));
            }
        } catch(e) {
            e.description += "<br>Address: " + self.getRangeName(new Range({
                row: i,
                col: j
            })) + " Formula: " + self.getFormula(i, j);
            throw (e);
        }
        for (var i = range.start.row; i <= range.end.row; i++) {
            for (var j = range.start.col; j <= range.end.col; j++) {
                var refs = self.getCellReferences(i, j);
                if (refs != undefined) {
                    for (var r = 0; r < refs.length; r++) {
                        try {
                            if (self.checkCircularReferences(row, col, refs[r])) {
                                throw (new Error(300, ""));
                            }
                        } catch(e) {
                            e.description += "<br>Address: " + self.getRangeName(new Range({
                                row: i,
                                col: j
                            })) + " Formula: " + self.getFormula(i, j);
                            throw (e);
                        }
                    }
                }
            }
        }
        return false;
    };
    self.calculate = function(formula, row, col, passive) {
        var tokens = parseFormula(formula);
        var result = null;
        var strtoeval = "";
        var current_args = new Array();
        var current_func = null;
        var current_prefix = "";
        var func_stack = new Array();
        var cell = self.cells[row][col];
        if (passive == undefined) {
            cell.clearReferences();
            try {
                References.clearReferences({
                    row: row,
                    col: col
                });
            } catch(e) {}
        }
        
        while (tokens.moveNext()) {
            var token = tokens.current();
            switch (token.type) {
            case "operator-prefix":
                current_prefix = token.value;
                break;
            case "operator-infix":
                strtoeval += token.value;
            case "operand":
                switch (token.subtype) {
                case "number":
                    if (current_func != undefined) {
                        current_args.push(current_prefix + token.value);
                        current_prefix = "";
                    } else {
                        strtoeval += current_prefix + token.value;
                        current_prefix = "";
                    }
                    break;
                case "text":
                    if (current_func != undefined) {
                        current_args.push(current_prefix + token.value);
                        current_prefix = "";
                    } else {
                        strtoeval += "'" + current_prefix + token.value + "'";
                        current_prefix = "";
                    }
                    break;
                case "range":
                    var range = this.namespace.getNameAddress(token.value);
                    range.normalize();
                    if (passive == undefined) {
                        try {
                            self.checkCircularReferences(row, col, range);
                        } catch(e) {
                            e.description = "Circular Reference Detected<br>Address: " + self.getRangeName(new Range({
                                row: row,
                                col: col
                            })) + " Formula: " + formula + e.description;
                            throw (e);
                        }
                        cell.addReference(range);
                        try {
                            References.addReference(range, {
                                row: row,
                                col: col
                            });
                        } catch(e) {}
                    }
                    if (range != undefined) {
                        var values = new Array();
                        for (var i = range.start.row; i <= range.end.row; i++) {
                            for (var j = range.start.col; j <= range.end.col; j++) {
                                var value = this.getValue(i, j);
                                if (typeof value == "string") {
                                    value = "'" + value + "'";
                                }
                                if (value != undefined) {
                                	var n = self.getRangeName(new Range({
                                		row: i,
                                		col: j
                                	}));
                                	var v = value;
                                	expression.AddVariable(n, v);
                                	values.push(value);
                                }
                            }
                        }
                        if (current_func != undefined) {
                            current_args.push(values);
                            current_prefix = "";
                        } else {
                            strtoeval += values;
                            current_prefix = "";
                        }
                    }
                    break;
                }
                break;
            case "function":
                if (token.subtype == "start") {
                    if (current_func != undefined) {
                        var old_func = {
                            args: current_args,
                            func: current_func
                        };
                        func_stack.push(old_func);
                    }
                    current_args = new Array();
                    current_func = token.value;
                } else {
                    var value = calculator.calc(current_func, current_args);
                    var current = func_stack.pop();
                    if (current == undefined) {
                        strtoeval += calculator.calc(current_func, current_args);
                    } else {
                        current.args.push(value);
                        current_func = current.func;
                        current_args = current.args;
                    }
                }
                break;
            case "subexpression":
                if (token.subtype == "start") {
                    strtoeval += "(";
                } else {
                    strtoeval += ")";
                }
                break;
            }
        }

    	if (formula.indexOf('=') != -1){
    		formula = formula.substr(1);
    	}
    	expression.Expression(formula + '+0');
    	var retVal = expression.Evaluate();
    	expression.Reset();
    	return retVal;
    };
    self.addVars = function(row, col) {
    	expression.Reset();
    	var name = self.getRangeName(new Range({
            row: row,
            col: col
        }));
        for (var i = 0; i <= 100; i++) {
            for (var j = 0; j <= 100; j++) {
                var value = this.getValue(i, j);
                if (typeof value == "string") {
                    value = "'" + value + "'";
                }
            	var name = self.getRangeName(new Range({
                    row: i, 	
                    col: j
                }));
                if (value != undefined) {
                	expression.AddVariable(name, value);
                }
            }
        }
    };
    self.setFormula = function(row, column, value, dontStore, passive) {
        if (value == "") {
            value = undefined;
        }
        if (self.cells[row] == undefined) {
            self.addCell(row, column);
        } else {
            if (self.cells[row][column] == undefined) {
                self.addCell(row, column);
            }
        }
        if (dontStore == undefined) {
            var state = new State({
                row: row,
                col: column
            },
            "formula", this.cells[row][column].getFormula(), value);
            this.store.add(state);
        }
        if (value != undefined) {
            this.cells[row][column].setFormula(value);
            if (value != undefined) {
                if (value.length) {
                    if ((value[0] == "=") || (value[0] == "+") || (value[0] == "-") || isNumeric(value)) {
                        var result = this.calculate(value, row, column, passive);
                        if (result == 0) {
                            this.cells[row][column].setValue("0");
                        } else {
                            this.cells[row][column].setValue(result);
                        }
                    } else {
                        this.cells[row][column].setValue(value);
                    }
                }
            } else {
                this.cells[row][column].setValue(value);
            }
        } else {
            this.cells[row][column].deleteContents();
        }
        if (this.cells[row][column].isNumeric()) {
            this.changeCellFontStyleProp(row, column, "align", "center", dontStore);
        } else {
            this.changeCellFontStyleProp(row, column, "align", "center", dontStore);
        }
        self.updateReferences({
            row: row,
            col: column
        });
    };
    self.updateReferences = function(address) {
        var references = References.getReferenced(address);
        if (references.length) {
            for (var ref in references) {
                if (ref != "remove") {
                    var c = references[ref];
                    this.setFormula(c.row, c.col, this.getFormula(c.row, c.col), undefined, true);
                }
            }
        }
    };
    self.getFormula = function(row, column) {
        if (this.cells[row]) {
            if (this.cells[row][column]) {
                return (this.cells[row][column]).getFormula();
            } else {
                return undefined;
            }
        } else {
            return undefined;
        }
    };
    self.setDecimals = function(row, col, decimals, dontStore) {
        if (self.cells[row] == undefined) {
            self.addCell(row, col);
        } else {
            if (self.cells[row][col] == undefined) {
                self.addCell(row, col);
            }
        }
        if (dontStore == undefined) {
            var state = new State({
                row: row,
                col: col
            },
            "decimal", self.cells[row][col].getDecimals(), decimals);
            self.store.add(state);
        }
        self.cells[row][col].setDecimals(decimals);
    };
    self.getDecimals = function(row, col) {
        if (self.cells[row] != undefined) {
            if (self.cells[row][col] != undefined) {
                return self.cells[row][col].getDecimals();
            }
        }
    };
    self.setRow = function(index, row) {
        this.rows[index] = row;
    };
    self.getRow = function(index) {
        return this.rows[index];
    };
    self.setRow = function(index, column) {
        this.cols[index] = column;
    };
    self.getColumn = function(index) {
        return this.rows[index];
    };
    self.setCell = function(row, column, formula, style) {
        if (this.cells[row] == undefined) {
            this.cells[row] = new Array();
        }
        if (this.cells[row][column] == undefined) {
            this.cells[row][column] = new Cell(row, column);
        }
        this.cells[row][column].setFormula(formula);
    };
    self.getCell = function(row, column) {
        if (this.cells[row]) {
            return this.cells[row][column];
        } else {
            return undefined;
        }
    };
    self.createEmptyCell = function(row, column) {
        var cell = new Cell(row, column);
        cell.isEmpty = true;
        return cell;
    };
    self.cloneRange = function(range) {
        range.normalize();
        var clone = range.clone();
        clone.addCells(self.cells);
        return clone;
    };
    self.getRangeName = function(range) {
        return self.namespace.getRangeName(range);
    };
    self.addName = function(name, range) {
        return self.namespace.addName(name, range);
    };
    self.deleteName = function(name) {
        self.namespace.deleteName(name);
    };
    self.existsName = function(name) {
        return self.namespace.existsName(name);
    };
    self.getNameAddress = function(name) {
        return self.namespace.getNameAddress(name);
    };
    self.getNames = function() {
        return self.namespace.getNames();
    };
    self.construct(configs);
    addSheetStyleOperations(self);
    return self;
}

function addSheetStyleOperations(sheet) {
    sheet.getColumnFontStyleId = function(colIndex) {
        if (sheet.cols[colIndex]) {
            return sheet.cols[colIndex].getFontStyleId();
        } else {
            return sheet.defaultFontStyleId;
        }
    };
    sheet.getRowFontStyleId = function(rowIndex) {
        if (sheet.rows[rowIndex]) {
            return sheet.rows[rowIndex].getFontStyleId();
        } else {
            return sheet.defaultFontStyleId;
        }
    };
    sheet.getCellFontStyleId = function(rowIndex, colIndex, fontStyleId) {
        if (sheet.cells[rowIndex] == undefined) {
            if (sheet.rows[rowIndex] != undefined) {
                return sheet.rows[rowIndex].getFontStyleId();
            } else {
                if (sheet.cols[colIndex] != undefined) {
                    return sheet.cols[colIndex].getFontStyleId();
                } else {
                    return sheet.defaultFontStyleId;
                }
            }
        } else {
            if (sheet.cells[rowIndex][colIndex] == undefined) {
                return sheet.rows[rowIndex].getFontStyleId();
            } else {
                return sheet.cells[rowIndex][colIndex].getFontStyleId();
            }
        }
    };
    sheet.setCellFontStyleId = function(rowIndex, colIndex, fontStyleId, dontStore) {
        if (dontStore == undefined) {
            var state = new State({
                row: rowIndex,
                col: colIndex
            },
            "fstyle", this.getCellFontStyleId(rowIndex, colIndex), fontStyleId);
            this.store.add(state);
        }
        if (sheet.cells[rowIndex] == undefined) {
            sheet.addCell(rowIndex, colIndex);
        } else {
            if (sheet.cells[rowIndex][colIndex] == undefined) {
                sheet.addCell(rowIndex, colIndex);
            }
        }
        sheet.cells[rowIndex][colIndex].setFontStyleId(fontStyleId);
    };
    sheet.changeCellFontStyleProp = function(rowIndex, colIndex, property, value, dontStore) {
        var styleId = this.getCellFontStyleId(rowIndex, colIndex);
        var newStyleId = Styler.changeFontStyleProp(styleId, property, value);
        this.setCellFontStyleId(rowIndex, colIndex, newStyleId, dontStore);
    };
    sheet.changeColumnFontStyleProp = function(column, property, value) {
        if (sheet.cols[column] == undefined) {
            sheet.addColumn(column);
        }
        var styleId = this.getColumnFontStyleId(column);
        var newStyleId = Styler.changeFontStyleProp(styleId, property, value);
        sheet.cols[column].setFontStyleId(newStyleId);
        for (var i = 0; i < sheet.cells.length; i++) {
            if (sheet.cells[i]) {
                if (sheet.cells[i][column]) {
                    this.changeCellFontStyleProp(i, column, property, value);
                }
            }
        }
    };
    sheet.changeRowFontStyleProp = function(row, property, value) {
        if (sheet.rows[row] == undefined) {
            sheet.addRow(row);
        }
        var styleId = this.getRowFontStyleId(row);
        var newStyleId = Styler.changeFontStyleProp(styleId, property, value);
        sheet.rows[row].setFontStyleId(newStyleId);
        if (sheet.cells[row]) {
            for (var i = 0; i < sheet.cells[row].length; i++) {
                if (sheet.cells[row][i]) {
                    this.changeCellFontStyleProp(row, i, property, value);
                }
            }
        }
    };
    sheet.setColumnFontStyleId = function(column, fontStyleId, dontStore) {
        if (sheet.cols[column] == undefined) {
            sheet.addColumn(column);
        }
        sheet.cols[column].setFontStyleId(fontStyleId);
        for (var i = 0; i < sheet.cells.length; i++) {
            if (sheet.cells[i]) {
                if (sheet.cells[i][column]) {
                    sheet.setCellFontStyleId(i, column, fontStyleId, dontStore);
                }
            }
        }
    };
    sheet.setRowFontStyleId = function(row, fontStyleId, dontStore) {
        if (sheet.rows[row] == undefined) {
            sheet.addRow(row);
        }
        sheet.rows[row].setFontStyleId(fontStyleId);
        if (sheet.cells[row]) {
            for (var i in sheet.cells[row]) {
                if (i != "remove") {
                    sheet.setCellFontStyleId(row, i, fontStyleId, dontStore);
                }
            }
        }
    };
    sheet.setColumnBgColor = function(column, color) {
        for (var i = 0; i < sheet.cells.length; i++) {
            application.grid.cells[i][column].style.background = color;
        }
    };
    sheet.setRowBgColor = function(row, color) {
        if (sheet.rows[row] == undefined) {
            sheet.addRow(row);
        }
        sheet.rows[row].setFontStyleId(fontStyleId);
        if (sheet.cells[row]) {
            for (var i = 0; i < sheet.cells[row].length; i++) {
                sheet.cells[row][i].setFontStyleId(fontStyleId);
            }
        }
    };
}