function saveBookConfirm() {
    var valid_name = /([a-zA-Z0-9_-]+)$/;
    Ext.MessageBox.prompt("另存为..", "请输入文件名：", showResultText);
    function showResultText(btn, text) {
        if (btn == "ok") {
            if (valid_name.test(text)) {
                if (text.substring(text.length - 4) != ".gel") {
                    text += ".gel";
                }
                window.saveBook(text);
            } else {
                Ext.MessageBox.prompt("另存为..", "请输入文件名：", showResultText);
            }
        } else {}
    }
}