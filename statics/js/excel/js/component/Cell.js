var TYPE_GENERAL = 0;
var TYPE_ERROR = 4;
var TYPE_STRING = 1;
var TYPE_NUMBER = 2;
var TYPE_LOGIC = 3;

function Cell(row, column) {
    var self = this;
    self.construct = function(row, column) {
        this.row = row;
        this.column = column;
        this.formula = undefined;
        this.value = undefined;
        this.formatedValue = undefined;
        this.decimals = undefined;
        this.type = TYPE_GENERAL;
        this.valueType = TYPE_GENERAL;
        this.fontStyleId = 0;
        this.layerStyleId = 0;
        this.references = new Array();
    };
    self.processType = function() {
        if (this.value == undefined) {
            this.valueType = this.type;
        } else {
            if (this.type == TYPE_STRING) {
                this.valueType = TYPE_STRING;
            } else {
                if (isNumeric(this.value)) {
                    this.valueType = TYPE_NUMBER;
                } else {
                    var strValue = this.value.toUpperCase();
                    if (strValue == "TRUE" || strValue == "FALSE") {
                        this.valueType = TYPE_LOGIC;
                    } else {
                        if (strValue[0] == "#") {
                            if ((",#NULL!,#DIV/0!,#VALUE!,#REF!,#NAME?,#NUM!,#N/A,").indexOf("," + strValue + ",") != -1) {
                                this.valueType = TYPE_ERROR;
                            } else {
                                this.valueType = TYPE_STRING;
                            }
                        } else {
                            this.valueType = TYPE_STRING;
                        }
                    }
                }
            }
        }
    };
    self.isNumeric = function() {
        return (this.valueType == TYPE_NUMBER);
    };
    self.setType = function(type) {
        this.type = type;
        self.processType();
    };
    self.getType = function() {
        return this.type;
    };
    self.getValueType = function() {
        return this.valueType;
    };
    self.getValueTypeName = function() {
        switch (self.valueType) {
        case TYPE_ERROR:
            return "ERROR";
        case TYPE_NUMBER:
            return "NUMBER";
        case TYPE_LOGIC:
            return "LOGICAL";
        case TYPE_STRING:
            return "TEXT";
        default:
            return "GENERAL";
        }
    };
    self.deleteContents = function() {
        self.clearReferences();
        self.formula = self.value = self.formattedValue = undefined;
    };
    self.calculate = function() {
        if (this.formula != undefined) {
            if (this.formula.charAt(0) == "=") {
                var ref = this.formula.substr(1);
                this.value = ref;
            } else {
                this.value = this.formula;
            }
        }
    };
    self.addReference = function(reference) {
        this.references.push(reference);
    };
    self.clearReferences = function(reference) {
        delete this.references;
        this.references = new Array();
    };
    self.getReferences = function() {
        return this.references;
    };
    self.getFontStyleId = function() {
        return this.fontStyleId;
    };
    self.setFontStyleId = function(fontStyleId) {
        this.fontStyleId = fontStyleId;
    };
    self.getLayerStyleId = function() {
        return this.layerStyleId;
    };
    self.setLayerStyleId = function(layerStyleId) {
        this.layerStyleId = layerStyleId;
    };
    self.getValue = function() {
        return this.value;
    };
    self.getRawValue = function() {
        return this.value;
    };
    self.getFormattedValue = function() {
        return this.formattedValue;
    };
    self.getFormula = function() {
        return this.formula;
    };
    self.setFormula = function(value) {
        self.formula = value;
        self.calculate();
        self.formatValue();
    };
    self.setDecimals = function(decimals) {
        if (decimals != undefined) {
            self.decimals = Number(decimals);
        } else {
            decimals == undefined;
        }
        self.formatValue();
    };
    self.getDecimals = function() {
        return self.decimals;
    };
    self.formatValue = function() {
        if (self.valueType == TYPE_NUMBER && self.decimals != undefined) {
            self.formattedValue = Number(self.value).toFixed(self.decimals);
        } else {
            self.formattedValue = self.value;
        }
    };
    self.getFormattedValue = function() {
        return self.formattedValue;
    };
    self.setValue = function(value) {
        this.value = value;
        try {
            this.processType();
            this.formatValue();
        } catch(e) {
            alert(e.toSource());
        }
    };
    self.getRow = function() {
        return this.row;
    };
    self.getColumn = function() {
        return this.column;
    };
    self.construct(row, column);
    return self;
}
function Row(index) {
    var self = this;
    self.construct = function(index) {
        this.index = index;
        this.size = 18;
    };
    self.setFontStyleId = function(fontStyleId) {
        this.fontStyleId = fontStyleId;
    };
    self.getFontStyleId = function() {
        return this.fontStyleId;
    };
    self.setSize = function(size) {
        this.size = size;
    };
    self.getSize = function() {
        return this.size;
    };
    self.addCell = function(cell) {
        this.cells.push(cell);
    };
    self.getIndex = function() {
        return this.index;
    };
    self.construct(index);
    return self;
}
function Column(index) {
    var self = this;
    self.construct = function(index) {
        this.index = index;
        this.size = 80;
        this.fontStyleId = 0;
    };
    self.setFontStyleId = function(fontStyleId) {
        this.fontStyleId = fontStyleId;
    };
    self.getFontStyleId = function() {
        return this.fontStyleId;
    };
    self.setSize = function(size) {
        this.size = size;
    };
    self.getSize = function() {
        return this.size;
    };
    self.addCell = function(cell) {

        this.cells.push(cell);
    };
    self.getIndex = function() {
        return this.index;
    };
    self.construct(index);
    return self;
}