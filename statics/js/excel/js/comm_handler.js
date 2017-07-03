function CommHandler(configs) {
    var self = this;
    self.configs = {
        url: "importController.php",
        method: "POST"
    };
    for (var prop in configs) {
        self.configs[prop] = configs[prop];
    }
    self.construct = function() {
    };
    self.recieveRequest = function(response, param, successFn) {
        if (response && typeof successFn == 'function') {
        	successFn(response);
        }
    };
    self.sendRequest = function(parameters, successFn) {
    	//send Ajax 
    	var response = "";
    	var param = "";
    	self.recieveRequest(response, param, successFn);
    };
    self.loadBook = function(bookId, callback) {
        self.sendRequest({},callback);
    };
    self.bookSaveServerResponse = function(data) {
        application.activeBook.setId(data.BookId);
        bookId = application.activeBook.getId();
        parent.og.openLink(parent.og.getUrl("files", "save_spreadsheet", {
            id: window.ogID || 0,
            book: bookId,
            name: application.activeBook.getName()
        }), {
            onSuccess: function(data) {
                window.ogID = data.sprdID;
            },
            onError: function(data) {
                deleteBook(bookId);
            }
        });
    };
    self.sendBook = function(data, format) {
        var params = {
            c: "Spreadsheet",
            m: "saveBook",
            param1: data,
            param2: "json",
            param3: "json",
            ogId: window.ogID || 0,
            ogWid: window.ogWID || 0
        };
        self.sendRequest(params, self.bookSaveServerResponse);
    };
    self.exportBook = function(data, format) {
    	//save excel
        if (window.submitForm != undefined) {
            var form = window.submitForm;
        } else {
            var form = document.createElement("FORM");
            window.submitForm = form;
            form.method = self.configs.method;
            form.action = self.configs.url;
            form.acceptCharset = "UTF-8";
            form.target = "_blank";
            var inputs = new Array();
            for (var i = 0; i < 5; i++) {
                inputs[i] = document.createElement("INPUT");
                inputs[i].type = "hidden";
                form.appendChild(inputs[i]);
            }
            document.body.appendChild(form);
        }
        form.elements[0].name = "c";
        form.elements[0].value = "Spreadsheet";
        form.elements[1].name = "m";
        form.elements[1].value = "saveBook";
        form.elements[2].name = "param1";
        form.elements[2].value = data;
        form.elements[3].name = "param2";
        form.elements[3].value = "json";
        form.elements[4].name = "param3";
        form.elements[4].value = format;
        form.submit();
    };
    self.construct();
    return self;
}