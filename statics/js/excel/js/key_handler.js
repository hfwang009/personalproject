function KeyAction(propagate, callback) {
    var self = this;
    self.construct = function(propagate, callback) {
        this.propagate = propagate;
        this.run = callback;
    };
    self.construct(propagate, callback);
    return self;
};
function KeyHandler() {
    var self = this;
    self.construct = function() {
        this.callbacks = Array();
    };
    self.addAction = function(callback, propagate, keycode) {
        if (keycode != undefined) {
            var item = new KeyAction(propagate, callback);
            this.callbacks[keycode] = item;
        } else {
            alert("键盘事件函数没有定义。");
        }
    };
    self.runAction = function(keycode) {
        if (keycode != undefined) {
            var action = this.callbacks[keycode];
            if (action == undefined) {
                return true;
            } else {
                if (action.run) {
                    action.run();
                }
                return action.propagate;
            }
        } else {
            alert("键盘事件函数没有定义。");
        }
        return true;
    };
    self.keyHandler = function(e) {
        e ? e: e = window.event;
        var propagate = true;
        var targ = e ? e: window.event;
        key = targ.keyCode ? targ.keyCode: targ.charCode;
        if (targ.ctrlKey) {
            key += CH_CTRL;
        }
        if (targ.altKey) {
            key += CH_ALT;
        }
        if (targ.shiftKey) {
            key += CH_SHIFT;
        }
        propagate = self.runAction(key);
        if (!propagate) {
            if (e.stopPropagation) {
                e.stopPropagation();
            } else {
                e.cancelBubble = true;
            }
        }
        return propagate;
    };
    self.construct();
    return self;
}