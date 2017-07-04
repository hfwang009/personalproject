function toBool(val) {
    if (val) {
        return 1;
    } else {
        return 0;
    }
}
function toBoolFromString(val) {
    if (parseInt(val)) {
        return true;
    } else {
        return false;
    }
}

function isEmpty(variable) {
    if (variable == undefined) {
        return true;
    }
    return (variable.length == 0);
}
function isNumeric(variable) {
    return (!isEmpty(variable) && !isNaN(variable));
}
function isArray(a) {
    return Object.prototype.toString.apply(a) === "[object Array]";
}

function loadFonts() {
    var list = new Array();
    list[1] = "宋体";
    list[2] = "仿宋";
    list[3] = "黑体";
    list[4] = "楷体";
    list[5] = "隶书";
    list[6] = "幼圆";
    return list;
}

function px(value) {
    return value + "px";
}
function pt(value) {
    return value + "pt";
}
function Address(row, column) {
    this.row = row;
    this.col = column;
    return this;
}
function SelectionState(currentSelection, selection) {
    this.currentSelection = currentSelection;
    this.selection = selection;
    return this;
}
function State(address, property, oldValue, newValue) {
    this.address = address;
    this.property = property;
    this.oldValue = oldValue;
    this.newValue = newValue;
    return this;
}

function Error(number, description) {
    this.number = number;
    this.description = description;
    return this;
}
function addslashes(str) {
    return (str + "").replace(/([\\])/g, "\\\\$1").replace(/(["'])/g, "\\$1").replace(/\u0000/g, "\\0");
}
function stripslashes(str) {
    return str;
    return (str + "").replace(/\\(.?)/g,
    function(s, n1) {
        switch (n1) {
        case "\\":
            return "\\";
        case "0":
            return "\x00";
        case "":
            return "";
        default:
            return n1;
        }
    });
}
function trim(str, charlist) {
    var whitespace, l = 0,
    i = 0;
    str += "";
    if (!charlist) {
        whitespace = " \n\r\t\f\v\xa0\u2000\u2001\u2002\u2003\u2004\u2005\u2006\u2007\u2008\u2009\u200a\u200b\u2028\u2029\u3000";
    } else {
        charlist += "";
        whitespace = charlist.replace(/([\[\]\(\)\.\?\/\*\{\}\+\$\^\:])/g, "$1");
    }
    l = str.length;
    for (i = 0; i < l; i++) {
        if (whitespace.indexOf(str.charAt(i)) === -1) {
            str = str.substring(i);
            break;
        }
    }
    l = str.length;
    for (i = l - 1; i >= 0; i--) {
        if (whitespace.indexOf(str.charAt(i)) === -1) {
            str = str.substring(0, i + 1);
            break;
        }
    }
    return whitespace.indexOf(str.charAt(0)) === -1 ? str: "";
}

function TrimAll(str,is_global)
{
    var result;
    result = str.replace(/(^\s+)|(\s+$)/g,"");
    if(is_global.toLowerCase()=="g")
    {
        result = result.replace(/\s/g,"");
     }
    return result;
}

var Environment = {
    init: function() {
        this.browser = this.searchString(this.dataBrowser) || "An unknown browser";
        this.version = this.searchVersion(navigator.userAgent) || this.searchVersion(navigator.appVersion) || "an unknown version";
        this.OS = this.searchString(this.dataOS) || "an unknown OS";
    },
    searchString: function(data) {
        for (var i = 0; i < data.length; i++) {
            var dataString = data[i].string;
            var dataProp = data[i].prop;
            this.versionSearchString = data[i].versionSearch || data[i].identity;
            if (dataString) {
                if (dataString.indexOf(data[i].subString) != -1) {
                    return data[i].identity;
                }
            } else {
                if (dataProp) {
                    return data[i].identity;
                }
            }
        }
    },
    searchVersion: function(dataString) {
        var index = dataString.indexOf(this.versionSearchString);
        if (index == -1) {
            return;
        }
        return parseFloat(dataString.substring(index + this.versionSearchString.length + 1));
    },
    dataBrowser: [{
        string: navigator.userAgent,
        subString: "Chrome",
        identity: "Chrome"
    },
    {
        string: navigator.userAgent,
        subString: "OmniWeb",
        versionSearch: "OmniWeb/",
        identity: "OmniWeb"
    },
    {
        string: navigator.vendor,
        subString: "Apple",
        identity: "Safari",
        versionSearch: "Version"
    },
    {
        prop: window.opera,
        identity: "Opera"
    },
    {
        string: navigator.vendor,
        subString: "iCab",
        identity: "iCab"
    },
    {
        string: navigator.vendor,
        subString: "KDE",
        identity: "Konqueror"
    },
    {
        string: navigator.userAgent,
        subString: "Firefox",
        identity: "Firefox"
    },
    {
        string: navigator.vendor,
        subString: "Camino",
        identity: "Camino"
    },
    {
        string: navigator.userAgent,
        subString: "Netscape",
        identity: "Netscape"
    },
    {
        string: navigator.userAgent,
        subString: "MSIE",
        identity: "Explorer",
        versionSearch: "MSIE"
    },
    {
        string: navigator.userAgent,
        subString: "Gecko",
        identity: "Mozilla",
        versionSearch: "rv"
    },
    {
        string: navigator.userAgent,
        subString: "Mozilla",
        identity: "Netscape",
        versionSearch: "Mozilla"
    }],
    dataOS: [{
        string: navigator.platform,
        subString: "Win",
        identity: "Windows"
    },
    {
        string: navigator.platform,
        subString: "Mac",
        identity: "Mac"
    },
    {
        string: navigator.userAgent,
        subString: "iPhone",
        identity: "iPhone/iPod"
    },
    {
        string: navigator.platform,
        subString: "Linux",
        identity: "Linux"
    }]
};
Environment.init();

//语言定义
var lang_array = new Array();
lang_array['application_welcome'] = '欢迎使用久久电子表格';
lang_array['bold'] = '黑体';
lang_array['New_Book_Dialog_Title'] = '新建一个表格?';
lang_array['New_Book_Dialog_Text'] = '你没有保存现有数据。新建表格会丢失所有现有数据。';
lang_array['Do_you_want_to_continue'] = '是否继续?';

function lang(term) {
    if (lang_array[term] == undefined) {
        return term;
    } else {
        return lang_array[term];
    }
}