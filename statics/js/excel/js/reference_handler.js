function ReferenceHandler() {
    var self = this;
    self.construct = function() {
        this.targets = {};
    };
    self.clearReferences = function(source) {
        for (i in this.targets) {
            for (j in this.targets[i]) {
                for (k in this.targets[i][j]) {
                    for (l in this.targets[i][j][k]) {
                        var sources = this.targets[i][j][k][l];
                        for (var m = 0; m < sources.length; m++) {
                            var ref = sources[m];
                            if (ref != undefined) {
                                if (ref != "remove") {
                                    if (ref.col == source.col && ref.row == source.row) {
                                        delete this.targets[i][j][k][l][m];
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    };
    self.addReference = function(target, source) {
        var end = (target.end) ? target.end: target.start;
        if (this.targets[target.start.row] == undefined) {
            this.targets[target.start.row] = {};
        }
        if (this.targets[target.start.row][target.start.col] == undefined) {
            this.targets[target.start.row][target.start.col] = {};
        }
        if (this.targets[target.start.row][target.start.col][end.row] == undefined) {
            this.targets[target.start.row][target.start.col][end.row] = {};
        }
        if (this.targets[target.start.row][target.start.col][end.row][end.col] == undefined) {
            this.targets[target.start.row][target.start.col][end.row][end.col] = new Array();
        }
        this.targets[target.start.row][target.start.col][end.row][end.col].push(source);
    };
    self.getReferenced = function(source) {
        var references = new Array();
        var row = source.row;
        var col = source.col;
        for (i in this.targets) {
            for (j in this.targets[i]) {
                for (k in this.targets[i][j]) {
                    for (l in this.targets[i][j][k]) {
                        if (row <= k && row >= i && col >= j && col <= l) {
                            for (ref in this.targets[i][j][k][l]) {
                                if (ref != "remove") {
                                    references.push(this.targets[i][j][k][l][ref]);
                                }
                            }
                        }
                    }
                }
            }
        }
        return references;
    };
    self.construct();
    return self;
}
window.References = new ReferenceHandler();