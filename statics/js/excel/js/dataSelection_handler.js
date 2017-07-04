function DataSelectionHandler() {
    var self = this;
    self.construct = function() {
        this.selection = new Array();
        this.currentSelection = undefined;
        this.store = new SimpleStore();
    };
    self.unsetSelection = function() {
        while (this.selection.length > 0) {
            var item = this.selection.pop();
        }
    };
    self.setSelection = function(range) {
        this.unsetSelection();
        this.selection.push(range);
        this.currentSelection = range;
    };
    self.getSelection = function() {
        return this.selection;
    };
    self.getActiveSelection = function() {
        return this.currentSelection;
    };
    self.addSelection = function(range) {
        this.selection.push(range);
        this.currentSelection = range;
    };
    self.beginTransaction = function() {
        this.store.beginTransaction();
        self.saveState();
    };
    self.rollBack = function() {
        if (this.store.canRollBack()) {
            var temp = this.store.getCurrent();
            this.store.rollBack(self.selection);
            self.selection = temp;
            self.currentSelection = self.selection[self.selection.length - 1];
        }
    };
    self.restore = function() {
        if (this.store.canRestore()) {
            var temp = this.store.restore(self.selection);
            self.selection = temp;
            self.currentSelection = self.selection[self.selection.length - 1];
        }
    };
    self.saveState = function() {
        var currentState = new Array();
        for (var i = 0; i < self.selection.length; i++) {
            currentState.push(self.selection[i].clone());
        }
        self.store.set(currentState);
    };
    self.construct();
    return self;
}