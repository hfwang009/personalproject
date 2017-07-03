function VColumn(index) {
		var self = document.createElement("TH");
		self.construct = function(index) {
			this.index = index;
			this.vcells = new Array();
			this.style.textAlign = "center";
			this.className = "ColumnUnselected";
			this.resizeArea = new ColumnReziseArea();
			this.resizeArea.setInnerHTML(String.fromCharCode(65 + index));
			this.appendChild(this.resizeArea);
			WrapStyle(this);
		};
		self.setIndex = function(index) {
			this.index = index;
		};
		self.getIndex = function() {
			return this.index;
		};
		self.getAddress = function() {
			return {
				col : this.index
			};
		};
		self.getSize = function() {
			return this.getWidth();
		};
		self.setSize = function(size) {
			return this.setWidth(size);
		};
		self.setInnerHTML = function(value) {
			this.resizeArea.setInnerHTML(value);
		};
		self.setTitle = function(value) {
			this.resizeArea.setInnerHTML(value);
		};
		self.addCell = function(cell) {
			this.vcells.push(cell);
		};
		self.activate = function() {
			this.className = "ColumnFocused";
		};
		self.deactivate = function() {
			this.className = "ColumnUnselected";
		};
		self.select = function() {
			this.className = "ColumnSelected";
			for (var i = 0; i < this.vcells.length; i++) {
				this.vcells[i].select();
			}
		};
		self.unselect = function() {
			this.className = "ColumnUnselected";
			for (var i = 0; i < this.vcells.length; i++) {
				this.vcells[i].unselect();
			}
		};
		self.resize = function(delta) {
			var width = this.getWidth() - delta;
			if (width < 6) {
				width = 0;
			}
			this.setWidth(width);
		};
		self.construct(index);
		self.resizeArea.onresizing = function(e) {
			e ? e : e = window.event;
			self.fire("resizemousedown", e);
		};
		self.onmousedown = function(e) {
			e ? e : e = window.event;
			self.fire("mousedown", e);
		};
		self.onmouseover = function(e) {
			e ? e : e = window.event;
			self.fire("mouseover", e);
		};
		WrapEvents(self);
		self.register("mousedown");
		self.register("mouseover");
		self.register("resizemousedown");
		return self;
	}