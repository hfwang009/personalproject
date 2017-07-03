function Book(name) {
	var self = this;
	self.construct = function(name) {
		this.id = undefined;
		this.name = name;
		this.sheet = undefined;
	};
	self.setSheet = function(sheet) {
		this.sheet = sheet;
	};
	self.getSheet = function() {
		return this.sheet;
	};
	self.setId = function(id) {
		this.id = id;
	};
	self.setName = function(name) {
		this.name = name;
	};
	self.getId = function() {
		return this.id;
	};
	self.getName = function() {
		return this.name;
	};
	self.getSheetsCount = function() {
		return this.sheets.length;
	};
	self.construct(name);
	return self;
}
