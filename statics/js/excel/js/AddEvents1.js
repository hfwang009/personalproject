function addGridMethods(grid) {
	grid.selectorBox.on("EditingMode", function() {
		grid.fire("EditingMode", true);
	});
	grid.scrollbars.onVerticalScroll = function(top) {
		if (grid.onVerticalScroll) {
			grid.onVerticalScroll(parseInt(top));
		}
	};
	grid.scrollbars.onHorizontalScroll = function(left) {
		if (grid.onHorizontalScroll) {
			grid.onHorizontalScroll(parseInt(left));
		}
	};
	grid.onmouseup = function(e) {
		e ? e : e = window.event;
		this.selecting = false;
		this.selectingRow = false;
		this.selectingCol = false;
        console.log(e.clientY);
		if (this.columnResizing) {
			this.resizeColumn();
		}
		if (this.rowResizing) {
			this.resizeRow(e.clientY - 416-40);
		}
		this.columnResizing = false;
		this.rowResizing = false;
	};
	grid.onmousemove = function(e) {
		e ? e : e = window.event;
		if (grid.columnResizing) {
			grid.verticalResizer.setLeft(e.clientX - 458+68);
		} else {
			if (grid.rowResizing) {
				grid.horizontalResizer.setTop(e.clientY - 475+20);
			}
		}
	};
}

function addGridCellEvents(grid, cell) {
	cell.onmousedown = function(e) {
		if (grid.activeCell !== cell) {
			e ? e : e = window.event;
			grid.selecting = true;
			grid.fire("ActiveCellChange", cell.getAddress(), grid.cellEditor
					.getValue());
		}
	};
	cell.onmouseover = function(e) {
		e ? e : e = window.event;
		if (grid.selecting) {
			var address = cell.getAddress();
		} else {
			if (grid.selectingCol) {
				var address = {
					col : cell.getColumn()
				};
			}
		}
		if (address != undefined) {
			grid.fire("SelectionChange", undefined, address);
		}
	};
}
function addGridRowEvents(grid, row) {
	row.on("resizemousedown", function(xrow, e) {
		grid.rowUsed = row;
		grid.horizontalResizer.setTop(e.clientY - 475-20);
		grid.horizontalResizer.startResizing(e.clientY - 475-20);
		grid.rowResizing = true;
	});
	row.on("mousedown", function(xrow, e) {
		if (!grid.rowResizing) {
			grid.selectingRow = true;
			grid.fire("SelectionChange", row.getAddress());
		}
	});
	row.on("mouseover", function(xrow, e) {
		if (grid.selectingRow) {
			grid.selection.end = row.getAddress();
			grid.fire("SelectionChange", undefined, row.getAddress());
		}
	});
}
function addGridColumnEvents(grid, col) {
	col.on("resizemousedown", function(xcol, e) {
		grid.columnUsed = col;
		grid.verticalResizer.setLeft(e.clientX - 458+68);
		grid.verticalResizer.startResizing();
		grid.columnResizing = true;
	});
	col.on("mousedown", function(xcol, e) {
		if (!grid.columnResizing) {
			grid.selectingCol = true;
			grid.fire("SelectionChange", col.getAddress());
		}
	});
	col.on("mouseover", function(xcol, e) {
		if (grid.selectingCol) {
			grid.fire("SelectionChange", undefined, col.getAddress());
		}
	});
}