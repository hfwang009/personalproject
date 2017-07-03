function FontStyle(font, size, color, bold, italic, underline, align, valign) {
    var self = this;
    self.construct = function(font, size, color, bold, italic, underline, align, valign) {
        this.id = font + "|" + size + "|" + color + "|" + bold + "|" + italic + "|" + underline + "|" + align + "|" + valign;
        this.font = font;
        this.size = size;
        this.color = color;
        this.bold = bold;
        this.italic = italic;
        this.underline = underline;
        this.align = align;
        this.valign = valign;
    };
    self.construct(font, size, color, bold, italic, underline, align, valign);
    return self;
}

function StyleHandler(configs) {
    var self = this;
    self.loadDefaultFont = function(fontStyle) {
        var defaultFont = new FontStyle(fontStyle.fontId, fontStyle.size, fontStyle.color, fontStyle.bold, fontStyle.italic, fontStyle.underline, fontStyle.align, fontStyle.valign);
        this.fontStyles[defaultFont.id] = defaultFont;
        this.fontsIds[0] = defaultFont;
    };
    self.construct = function(configs) {
        this.fontStyles = new Array();
        this.fontsIds = new Array();
        this.layers = new Array();
        this.loadDefaultFont(configs.defaultFontStyle);
    };
    self.getFontName = function(fontId) {
        return window.Fonts[fontId];
    };
    self.getFontStyle = function(styleId) {
        var style = this.fontStyles[styleId];
        if (style == undefined) {
            style = this.fontStyles[0];
        }
        return style;
    };
    self.getFontStyleById = function(index) {
        var style = this.fontsIds[index];
        if (style == undefined) {
            style = this.fontsIds[0];
        }
        return style;
    };
    self.getFontStyleIdByStyle = function(fontStyle) {
        return this.getFontStyleId(fontStyle.font, fontStyle.size, fontStyle.color, fontStyle.bold, fontStyle.italic, fontStyle.underline, fontStyle.align, fontStyle.valign);
    };
    self.changeFontStyleProp = function(fontStyleId, prop, value) {
        var fs = this.getFontStyleById(fontStyleId);
        var oldValue = fs[prop];
        fs[prop] = value;
        var newId = this.getFontStyleId(fs.font, fs.size, fs.color, fs.bold, fs.italic, fs.underline, fs.align, fs.valign);
        fs[prop] = oldValue;
        return newId;
    };
    self.addFontStyle = function(id, font, size, color, bold, italic, underline, align, valign) {
        var fstyle = new FontStyle(font, size, color, bold, italic, underline, align, valign);
        this.fontStyles[fstyle.id] = fstyle;
        this.fontsIds[id] = fstyle;
    };
    self.getFontStyleId = function(font, size, color, bold, italic, underline, align, valign) {
        var id = font + "|" + size + "|" + color + "|" + bold + "|" + italic + "|" + underline + "|" + align + "|" + valign;
        if (this.fontStyles[id]) {
            return this.fontsIds.indexOf(this.fontStyles[id]);
        } else {
            var fstyle = new FontStyle(font, size, color, bold, italic, underline, align, valign);
            this.fontStyles[id] = fstyle;
            var newId = this.fontsIds.length;
            this.fontsIds[newId] = fstyle;
            return newId;
        }
    };
    self.getAlignName = function(align) {
        switch (parseInt(align)) {
        case 0:
            return "general";
            break;
        case 1:
            return "left";
            break;
        case 2:
            return "center";
            break;
        case 3:
            return "right";
            break;
        default:
            return "general";
            break;
        }
    };
    self.getAlignId = function(alignId) {
        switch (alignId) {
        case "general":
            return 0;
            break;
        case "left":
            return 1;
            break;
        case "center":
            return 2;
            break;
        case "right":
            return 3;
            break;
        default:
            return 0;
            break;
        }
    };
    self.getValignName = function(valign) {
        switch (parseInt(valign)) {
        case 0:
            return "bottom";
            break;
        case 1:
            return "middle";
            break;
        case 2:
            return "top";
            break;
        default:
            return "bottom";
            break;
        }
    };
    self.getValignId = function(valign) {
        switch (valign) {
        case "bottom":
            return 0;
            break;
        case "middle":
            return 1;
            break;
        case "top":
            return 2;
            break;
        default:
            return 0;
            break;
        }
    };
    self.getAllFontsStyles = function() {
        return this.fontsIds;
    };
    self.construct(configs);
}

function LayoutStyle(bgcolor, border) {
    self.contructor = function() {};
    return self;
}
function BlockStyle(wrap, valign, halign) {
    self.contructor = function() {
        this.id = halign + "|" + valign + "|" + wrap;
        this.wrap = wrap;
        this.valign = valign;
        this.halign = halign;
    };
    return self;
}

function WrapFontStyle(object, fontStyleId) {
    if (fontStyleId == undefined) {
        fontStyleId = 0;
    }
    var fontStyle = Styler.getFontStyleById(fontStyleId);
    object.style.fontFamily = Styler.getFontName(fontStyle.font);
    object.style.fontSize = pt(fontStyle.size);
    window.borrarFont = fontStyle;
    object.style.color = fontStyle.color;
    if (fontStyle.bold) {
        object.style.fontWeight = "bold";
    } else {
        object.style.fontWeight = "normal";
    }
    if (fontStyle.italic) {
        object.style.fontStyle = "italic";
    } else {
        object.style.fontStyle = "normal";
    }
    if (fontStyle.underline) {
        object.setTextDecoration("underline");
    } else {
        object.setTextDecoration("none");
    }
    if (fontStyle.align == "general") {
        object.style.textAlign = "left";
    } else {
        object.style.textAlign = fontStyle.align;
    }
    object.style.verticalAlign = fontStyle.valign;
}
function WrapStyle(obj) {
    obj.setTextDecoration = function(value) {
        obj.style.textDecoration = value;
    };
    obj.getTextDecoration = function() {
        return object.style.textDecoration;
    };
    obj.setTop = function(value) {
        this.style.top = px(parseInt(value));
    };
    obj.getTop = function() {
        return parseInt(this.style.top);
    };
    obj.setLeft = function(value) {
        this.style.left = px(parseInt(value));
    };
    obj.getLeft = function() {
        return parseInt(this.style.left);
    };
    obj.setZIndex = function(value) {
        this.style.zIndex = parseInt(value);
    };
    obj.getZIndex = function() {
        return this.style.zIndex;
    };
    obj.setHeight = function(value) {
        this.style.height = px(value);
    };
    obj.getHeight = function() {
        return parseInt(this.style.height);
    };
    obj.setWidth = function(value) {
        this.style.width = px(value);
    };
    obj.getWidth = function() {
        return parseInt(this.style.width);
    };
    obj.getAbsoluteWidth = function() {
        if (window.isGecko) {
            return parseInt(this.style.width) - parseInt(this.style.borderLeftWidth) - parseInt(this.style.borderRightWidth);
        } else {
            return parseInt(this.style.width) + parseInt(this.style.borderLeftWidth) + parseInt(this.style.borderRightWidth);
        }
    };
    obj.getAbsoluteHeight = function() {
        if (window.isGecko) {
            return parseInt(this.style.height) - parseInt(this.style.borderTopWidth) - parseInt(this.style.borderBottomWidth);
        } else {
            return parseInt(this.style.height) + parseInt(this.style.borderTopWidth) + parseInt(this.style.borderBottomWidth);
        }
    };
    obj.getAbsoluteTop = function() {
        if (window.isGecko) {
            return parseInt(this.style.top);
        } else {
            return parseInt(this.style.top) + parseInt(this.style.borderTopWidth);
        }
    };
    obj.getAbsoluteLeft = function() {
        if (window.isGecko) {
            return parseInt(this.style.left);
        } else {
            return parseInt(this.style.height) + parseInt(this.style.borderLeftWidth);
        }
    };
}

function bold() {
    cmdSetBoldStyle();
}
function italic() {
    cmdSetItalicStyle();
}
function underline() {
    cmdSetUnderlineStyle();
}
function unformat() {
    cmdSetFontStyleId(0);
}
function setBorderLeft() {
    var cell = application.grid.activeCell;
    cell.style.borderLeft = "5px solid #000000";
}

function refresh() {
    application.refresh();
}

function cmdSetBoldStyle() {
    application.model.changeBoldToSelection();
}
function cmdSetFontStyleId(fsId) {
    application.model.setSelectionFontStyleId(fsId);
}
function cmdSetItalicStyle() {
    application.model.changeItalicToSelection();
}
function cmdSetUnderlineStyle() {
    application.model.changeUnderlineToSelection();
}
function cmdSetFontStyle(font) {
    application.model.changeFontToSelection(font);
}
function cmdSetFontColor(color) {
    application.model.changeFontColorToSelection(color);
}
function cmdSetBgColor(color) {
    application.model.changeBgColorToSelection(color);
}
function cmdSetFontSizeStyle(size) {
    application.model.changeFontSizeToSelection(size);
}
function cmdSetAlignStyle(align) {
    application.model.changeAlignToSelection(align);
}
function cmdSetValignStyle(valign) {
    application.model.changeValignToSelection(valign);
}
function fscChangeBold(object) {
    var fstyle = styleHandler.getFontStyle(object.getFontStyleId());
    var oldValue = fstyle.bold;
    var fsId = styleHandler.getStyleId(fstyle.font, fstyle.size, fstyle.color, !oldValue, fstyle.italic);
    object.setFontStyleId(fsId);
    return oldValue;
}