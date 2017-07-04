function SelectorBox() {
    var self = document.createElement("DIV");
    self.construct = function() {
        this.id = "ActiveRange";
        this.style.position = "absolute";
        this.style.overflow = "visible";
        WrapStyle(this);
        this.setZIndex(3000);
        var fillBox = document.createElement("DIV");
        fillBox.style.position = "absolute";
        fillBox.style.width = "5px";
        fillBox.style.height = "5px";
        fillBox.style.zIndex = 3001;
        fillBox.style.backgroundColor = "#000000";
        fillBox.style.cursor = "crosshair";
        fillBox.style.border = "1px solid #FFFFFF";
        this.fillBox = fillBox;
        this.appendChild(fillBox);
        WrapEvents(this);
        self.register("EditingMode");
    };
    self.setVisible = function(value) {
        if (value) {
            this.style.visibility = "visible";
        } else {
            this.style.visibility = "hidden";
        }
    };
    self.fitToRange = function(range) {
        var borderWidth = 3;
        self.setLeft(range.offsetLeft - borderWidth / 2);
        self.setTop(range.offsetTop - borderWidth / 2);
        try {
            self.setWidth(range.offsetWidth - borderWidth);
            self.setHeight(range.offsetHeight - borderWidth);
            self.fillBox.style.left = px(parseInt(self.style.width) - 2);
            self.fillBox.style.top = px(parseInt(self.style.height) - 2);
        } catch(e) {}
        this.style.visibility = "visible";
    };
    self.fitToArea = function(area) {
        var borderWidth = 3;
        self.setLeft(area.left - borderWidth / 2);
        self.setTop(area.top - borderWidth / 2);
        try {
            self.setWidth(area.width - 2);
            self.setHeight(area.height - 2);
            self.fillBox.style.left = px(parseInt(self.style.width) - 2);
            self.fillBox.style.top = px(parseInt(self.style.height) - 2);
        } catch(e) {}
    };
    self.refresh = function() {
        self.fitToRange(grid.activeCell);
    };
    self.onclick = function() {
        self.fire("EditingMode", true);
    };
    self.construct();
    return self;
}