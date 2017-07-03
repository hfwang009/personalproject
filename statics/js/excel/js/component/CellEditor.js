function CellEditor() {
    var self = document.createElement("INPUT");
    self.construct = function() {
        this.editing = false;
        this.id = "ActiveCell";
        this.type = "TEXT";
        this.cols = 2000;
        this.rows = 2;
        this.style.overflow = "visible";
        this.style.zIndex = 1000;
        this.activeCell = undefined;
        this.style.top = "0px";
        this.style.left = "0px";
        this.style.width = "100%";
        this.cell = undefined;
        this.fontStyleId = 0;
        WrapStyle(this);
        WrapEvents(this);
        self.register("ValueChanged");
    };
    self.reFit = function() {
        this.style.width = "100%";
    };
    self.fitToCell = function(vcell) {
        this.editing = false;
        this.cell = vcell;
        self.style.visibility = "hidden";
        vcell.setInnerHTML("");
        this.value = "";
        this.fontStyleId = vcell.getFontStyleId();
        WrapFontStyle(self, vcell.getFontStyleId());
        vcell.add(self);
        vcell.className = vcell.className + " Editing";
        self.style.visibility = "visible";
        self.focus();
    };
    self.updateFontStyle = function() {
        var address = self.activeCell.getAddress();
        var cell = scGetCell(activeSheet, address.row, address.col);
        WrapFontStyle(self, scGetCell(activeSheet, address.row, address.col).getFontStyleId());
    };
    self.updateValue = function(newValue) {
        self.value = newValue;
    };
    self.setValue = function(value) {
        if (value != undefined) {
            this.value = value;
        } else {
            this.value = "";
        }
    };
    self.getValue = function() {
        return this.value;
    };
    self.setFontStyleId = function(fsId) {
        if (fsId) {
            this.fontStyleId = fontStyleId;
        }
    };
    self.getFontStyleId = function() {
        return this.fontStyleId;
    };
    self.getColumn = function() {
        return this.cell.getColumn();
    };
    self.getRow = function() {
        return this.cell.getRow();
    };
    self.onkeyup = function(e) {
        self.fire("ValueChanged", this.value);
    };
    self.refresh = function() {};
    self.construct();
    return self;
}