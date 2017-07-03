function Application(container,update1) {
    var self = window;
    self.construct = function(container) {
        //判断创建和修改
        var configs = loadConfigs();
        self.configs = configs;
        self.container = container;
        self.JsonManager = new JsonHandler();
        self.Fonts = loadFonts();
        self.activeBook = new Book(configs.book.defaultName);
        self.sheets = new Array();
        var sheet = new Sheet(configs.sheet);
        self.namesStore = new Ext.data.SimpleStore({
            fields: ["name", "range"]
        });
        self.sheets.push(sheet);
        self.activeSheet = sheet;
        self.Styler = new StyleHandler(configs.style);
        self.update1 = parseInt(update1);
        if(self.update1 == 0){
            self.CommManager = new CommHandler(configs.communication);
        }else if(self.update1 == 1){
            self.CommManager = new CommHandler(configs.communication1);
        }
        createToolbars(self);
        var center = document.getElementById("center");
        self.grid = new Grid({
            width: 1220,
            height:500
        });
        center.appendChild(self.grid);
        self.grid.inicialize();
        self.grid.on("EditingMode",
        function() {
            self.FormulaBar.focus();
        });
        self.model = new GridModel(self.grid);
        self.model.setDataModel(self.activeSheet);
        self.model.on("Error",
        function(caller, e) {
            //Ext.Msg.alert("Error",e.description);
        });
        self.model.on("NameChanged",
        function() {
            var data = self.model.getNames();
            self.namesStore.loadData(data);
        });
        self.model.on("SelectionChanged",
        function(obj, address) {
            nameSelector.setValue(address);
        });
        self.model.on("ActiveCellChanged",
        function(obj, value) {
            FormulaBar.setValue(value);
        });
        self.model.refresh();
        self.gridShortCuts = new KeyHandler();
        self.gridShortCuts.addAction(self.model.goToHome, false, CH_CTRL + CH_HOME);
        self.gridShortCuts.addAction(self.model.moveRight, false, CH_TAB);
        self.gridShortCuts.addAction(self.model.moveDown, false, CH_ENTER);
        self.gridShortCuts.addAction(self.model.moveLeft, false, CH_LEFT_ARROW);
        self.gridShortCuts.addAction(self.model.moveRight, false, CH_RIGHT_ARROW);
        self.gridShortCuts.addAction(self.model.moveUp, false, CH_UP_ARROW);
        self.gridShortCuts.addAction(self.model.moveDown, false, CH_DOWN_ARROW);
        self.gridShortCuts.addAction(self.model.undo, false, CH_CTRL + CH_Z);
        self.gridShortCuts.addAction(self.model.redo, false, CH_CTRL + CH_SHIFT + CH_Z);
        self.gridShortCuts.addAction(model.deleteSelection, false, CH_DELETE);
        self.gridShortCuts.addAction(model.setValueToSelection, false, CH_CTRL + CH_ENTER);
        self.grid.onkeydown = gridShortCuts.keyHandler;
        self.documentShortCuts = new KeyHandler();
        self.documentShortCuts.addAction(self.model.pageUp, false, CH_PAGE_UP);
        self.documentShortCuts.addAction(self.model.pageDown, false, CH_PAGE_DOWN);
        self.documentShortCuts.addAction(self.saveBook, false, CH_CTRL + CH_S);
        self.documentShortCuts.addAction(saveBookConfirm, false, CH_CTRL + CH_SHIFT + CH_S);
        self.documentShortCuts.addAction(cmdSetBoldStyle, false, CH_CTRL + CH_B);
        self.documentShortCuts.addAction(cmdSetItalicStyle, false, CH_CTRL + CH_I);
        self.documentShortCuts.addAction(cmdSetUnderlineStyle, false, CH_CTRL + CH_U);
        self.documentShortCuts.addAction(namesDialog, false, CH_F3);
        self.documentShortCuts.addAction(function() {
            self.FormulaBar.focus();
        },
        false, CH_F2);
        if (Environment.browser == "Explorer") {
            document.onkeydown = self.documentShortCuts.keyHandler;
        } else {
            window.onkeydown = self.documentShortCuts.keyHandler;
        }
        self.grid.onselectstart = function() {
            return false;
        };
        self.grid.onmousedown = function() {
            return false;
        };
        window.onresize = function() {
            self.grid.resize(center.offsetWidth, center.offsetHeight);
        };
    };
    self.nameSelectorChanged = function(name) {
        if (self.model.existsName(name)) {
            self.model.goToName(name);
        } else {
            if (true) {
                self.model.addName(name);
            }
        }
    };
    addApplicationAPI(self);
    self.construct(container);
    window.application = self;
    return self;
}

function addApplicationAPI(self) {

    self.focusActiveCell = function() {
        document.getElementById("ActiveCell").focus();
    };
    self.editActiveCell = function(value) {
        self.model.editActiveCell(value);
    };
    self.getActiveCellValue = function() {
        return self.grid.getActiveCellValue();
    };
    self.increaseDecimals = function() {
        self.model.increaseDecimals();
    };
    self.decreaseDecimals = function() {
        self.model.decreaseDecimals();
    };
    self.deleteSelection = function() {
        self.model.deleteSelection();
    };
    self.bookLoaded = function(responseData) {
        var book = self.JsonManager.importBook(self.configs.sheet, responseData);
        self.activeBook = book;
        self.activeSheet = book.getSheet();
        self.setBookName(book.name);
        self.model.setDataModel(self.activeSheet);
        self.model.refresh();
    };
    self.loadBook = function(bookId) {
        self.CommManager.loadBook(bookId, self.bookLoaded);
    };
    self.setBookName = function(bookName) {
        self.activeBook.setName(bookName);
        //document.title = self.configs.application.titlePrefix + " - " + bookName;
    };
    self.saveBook = function(bookName) {
        var bookId = "null";
        if (bookName == undefined) {
            if (window.ogID) {
                bookName = self.activeBook.getName();
            } else {
                saveBookConfirm();
                return;
            }
            var id = self.activeBook.getId();
        } else {
            window.ogID = null;
        }
        if (bookName == undefined) {
            bookName = self.activeBook.getName();
        }
        self.setBookName(bookName);
        var json = JsonManager.exportBook(id, self.activeBook, self.activeSheet);
        console.log(json);
        self.CommManager.sendBook(json, "json");
    };
    self.exportBook = function(format) {
        var json = JsonManager.exportBook(self.activeBook.getId(), self.activeBook, self.activeSheet);
        console.log("json: " + json);
        self.CommManager.exportBook(json, format);
    };
    self.getBook = function(format){
        var json = JsonManager.exportBook(self.activeBook.getId(), self.activeBook, self.activeSheet);
        return json;
    };
    self.newBook = function() {
        Ext.MessageBox.show({
            title: lang("New_Book_Dialog_Title"),
            msg: lang("New_Book_Dialog_Text") + "<br>" + lang("Do_you_want_to_continue"),
            buttons: Ext.Msg.YESNOCANCEL,
            icon: Ext.MessageBox.OK,
            fn: function(btn) {
                if (btn == "yes") {
                    self.activeBook = new Book(self.configs.book.defaultName);
                    self.activeSheet = new Sheet(self.configs);
                    self.setBookName(self.configs.book.defaultName);
                    window.FormulaBar.setValue("");
                    self.model.setDataModel(self.activeSheet);
                    self.model.goToHome();
                    self.grid.reset();
                    self.model.refresh();
                    window.ogID = undefined;
                }
            }
        });
    };
    self.openFiles = function(data) {
        if (!self.openFileDialog) {
            self.openFileDialog = new OpenFileDialog(50, 50, 300, 300);
        }
        for (var i = 0; i < data.files.length; i++) {
            self.openFileDialog.addFile(data.files[i]);
        }
        self.container.appendChild(self.openFileDialog);
    };
    self.switchViewMode = function(viewMode) {
        self.model.changeViewMode(viewMode);
    };
    self.refresh = function() {
        self.model.refresh();
    };
    self.undo = function() {
        self.model.undo();
    };
    self.redo = function() {
        self.model.redo();
    };
}

function namesDialog() {
    Ext.onReady(function() {
        var store = new Ext.data.SimpleStore({
            fields: ["name", "range"],
            data: window.activeSheet.getNames()
        });
        store.sort("name");
        var grid = new Ext.grid.GridPanel({
            store: store,
            columns: [{
                header: "Name",
                width: 120,
                dataIndex: "name",
                sortable: true
            },
            {
                header: "Range",
                width: 115,
                dataIndex: "range",
                sortable: true
            }],
            sm: new Ext.grid.RowSelectionModel({
                singleSelect: true
            }),
            viewConfig: {
                forceFit: true
            },
            height: 210,
            autoWidth: true,
            split: true,
            region: "north"
        });
        var bookTpl = new Ext.Template(["<br/>{name} => {range} <br/>"]);
        var ct = new Ext.Panel({
            frame: true,
            title: lang("选区标识") + "...",
            autoHeight: true,
            autoWidth: true,
            items: [grid, {
                region: "center",
                bodyStyle: {
                    padding: "10px"
                },
                html: "<br><br><strong>Here are listed all the range names on the book.<strong>"
            }]
        });
        var win = new Ext.Window({
            title: "Ranges:",
            applyToMarkup: "dialog-container",
            layout: "fit",
            autoHeight: true,
            width: 500,
            plain: true,
            modal: true,
            items: ct,
            resizable: false
        });
        win.addButton({
            text: "Ok",
            handler: function() {
                var selected = grid.getSelections();
                if (selected[0] != undefined) {
                    var value = selected[0].data.name;
                    var current = application.getActiveCellValue();
                    if (trim(current) != "") {
                        application.editActiveCell(current + value);
                    } else {
                        application.editActiveCell("=" + value);
                    }
                    application.focusActiveCell();
                    win.close();
                }
            }
        });
        win.addButton({
            text: "Close",
            handler: function() {
                win.close();
            }
        });
        win.show();
    });
}

function cmdSetLeftAlign() {
    var selection = window.SelectionMan.getSelection();
    var i = 0;
    var address = selection[i].getAddress();
    var range = scGetCell(activeSheet, address.row, address.col);
    var fstyle = window.styleHandler.getLayoutStyleById(range.getFontStyleId());
    var italic = !fstyle.italic;
    var newStyle = window.styleHandler.getLayoutStyleId(fstyle.font, fstyle.size, fstyle.color, fstyle.bold, italic, fstyle.underline);
    range.setLayoutStyleId(newStyle);
    EventManager.fire(EVT_CELL_FONT_STYLE_CHANGE, newStyle);
}  

function cmdSetBookName(name) {
    activeBook.setName(name);
    EventManager.fire(EVT_BOOK_NAME_CHANGE, name);
}

function parseFormula(formula) {
    var tokens = getTokens(TrimAll(formula, 'g'));
    return tokens;
}
