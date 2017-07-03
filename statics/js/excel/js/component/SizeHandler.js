function SizeHandler(verticalWay) {
    var self = document.createElement("DIV");
    self.construct = function(verticalWay, top, left, width, height) {
        this.element = undefined;
        this.style.position = "absolute";
        this.style.top = px(0);
        this.style.left = px(0);
        this.style.width = px(0);
        this.style.height = px(0);
        this.style.backgroundColor = "gray";
        if (verticalWay) {
            this.style.cursor = "e-resize";
            this.style.width = px(2);
        } else {
            this.style.cursor = "s-resize";
            this.style.height = px(2);
        }
        this.style.zIndex = 2000;
        this.resizing = false;
        WrapStyle(this);
    };
    if (verticalWay) {
        self.startResizing = function() {
            this.offset = parseInt(this.style.left);
            this.style.height = "100%";
        };
        self.endResizing = function() {
            this.style.height = "0px";
            return this.offset - parseInt(this.style.left);
        };
        self.onmousedown = function(e) {
            this.resizing = true;
            this.style.height = "100%";
            this.style.backgroundColor = "gray";
            var pos = (window.Event) ? parseInt(e.pageX) : parseInt(event.clientX);
            self.offset = parseInt(this.style.left) - pos;
        };
    } else {
        self.startResizing = function(pos) {
            this.offset = parseInt(pos);
            this.style.width = "100%";
        };
        self.endResizing = function(pos) {
            this.style.width = "0px";
            return (this.offset - parseInt(pos) + 59);
        };
    }
    self.construct(verticalWay);
    return self;
}