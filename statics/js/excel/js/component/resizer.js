function RowResizeArea() {
    var self = document.createElement("DIV");
    self.construct = function() {
        self.style.left = "0px";
        self.style.width = "100%";
        self.style.top = "90%";
        self.style.height = "5px";
        self.style.backgroundColor = "transparent";
        self.style.cursor = "s-resize";
    };
    self.construct();
    return self;
}

function ColumnReziseArea() {
    var self = document.createElement("DIV");
    self.construct = function() {
        this.data = document.createElement("DIV");
        this.data.className = "ColumnTitle";
        var tdResizer = document.createElement("DIV");
        tdResizer.className = "ColumnResizer";
        tdResizer.offset = 0;
        tdResizer.onmousedown = function(e) {
            e ? e: e = window.event;
            this.offset = e.screenX;
            if (self.onresizing) {
                self.onresizing(e);
            }
        };
        this.tdResizer = tdResizer;
        self.style.width = "100%";
        self.style.height = "100%";
        self.style.backgroundColor = "transparent";
        self.appendChild(tdResizer);
        self.appendChild(this.data);
    };
    self.setInnerHTML = function(value) {
        this.data.innerHTML = value;
    };
    self.construct();
    return self;
}