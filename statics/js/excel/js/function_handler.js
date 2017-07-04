var DIV_ZERO = "#DIV/0!";
var NOT_NUM = "#VALUE!";
var INVALID = "#VALUE!";
var NAME = "#NAME?";
function Funcion(name, params, callback, description, category) {
    var self = this;
    self.construct = function(name, params, callback, description, category) {
        this.name = name;
        this.count = params.length;
        this.required = 0;
        this.description = (description) ? description: "";
        this.category = (category) ? category: "";
        for (var i = 0; i < params.length; i++) {
            var param = params[i];
            if (param.optional == true) {
                this.required++;
            }
            switch (param.type) {
            case "numeric":
                param.validateFn = isNumeric;
                break;
            case "range":
                param.validateFn = function(value) {
                    return value && value.length;
                };
            }
        }
        this.params = params;
        this.callback = callback;
    };
    self.validate = function(args) {
        return true;
        var valid = true;
        if (args.length != this.count) {
            return false;
        }
        for (var i = 0; i < args.length; i++) {
            var param = this.params[i];
            valid = valid && param.validateFn(args[i]);
        }
        return valid;
    };
    self.calc = function(params) {
        if (self.validate(params)) {
            return self.callback(params);
        } else {
            return INVALID;
        }
    };
    self.setDescription = function(desc) {
        this.description = desc;
    };
    self.construct(name, params, callback, category, description);
    return self;
}
function FunctionHandler() {
    var self = this;
    self.construct = function() {
        this.functions = {};
    };
    self.add = function(func) {
        this.functions[func.name.toLowerCase()] = func;
    };
    self.get = function(func_name) {
        return this.functions[func_name.toLowerCase()];
    };
    self.calc = function(func_name, params) {
        var func = self.get(func_name);
        if (func) {
            return func.calc(params);
        } else {
            return NAME;
        }
    };
    self.getFunctionList = function() {
        var result = new Array();
        for (var i in this.functions) {
            result.push(["=" + this.functions[i].name, "=" + this.functions[i].name]);
        }
        return result;
    };
    self.getFunctionNameList = function() {
        var result = new Array();
        for (var i in this.functions) {
            result.push([this.functions[i].name, this.functions[i].name, this.functions[i].category, this.functions[i].description]);
        }
        return result;
    };
    self.construct();
    return self;
}

window.calculator = new FunctionHandler();

calculator.add(new Funcion("abs", [{
    type: "numeric"
}],
function(values) {
    return Math.abs(values);
},
"math", "<b>ABS(number)</b><br>数学函数绝对值."));
calculator.add(new Funcion("average", [{
    type: "numeric"
}],
function(values) {
    var value = 0;
    var total = 0;
    for (var i = 0; i < values.length; i++) {
        if (isNumeric(values[i])) {
            value += parseFloat(values[i]);
            total++;
        } else {
            if (isArray(values[i])) {
                for (var j = 0; j < values[i].length; j++) {
                    if (isNumeric(values[i][j])) {
                        value += parseFloat(values[i][j]);
                    }
                    total++;
                }
            }
        }
    }
    if (total) {
        value = value / total;
    } else {
        value = DIV_ZERO;
    }
    return value;
},
"statistical", "<b>AVERAGE(number1;number2;...)</b><br>求平均数"));
calculator.add(new Funcion("count", [{
    type: "range"
}],
function(values) {
    var total = 0;
    for (var i = 0; i < values.length; i++) {
        if (isNumeric(values[i])) {
            total++;
        } else {
            if (isArray(values[i])) {
                for (var j = 0; j < values[i].length; j++) {
                    if (isNumeric(values[i][j])) {
                        total++;
                    }
                }
            }
        }
    }
    return total;
},
"statistical", "<b>COUNT(value1;value2;...)</b><br>单元格个数."));
calculator.add(new Funcion("counta", [{
    type: "range"
}],
function(values) {
    var total = 0;
    for (var i = 0; i < values.length; i++) {
        if (isEmpty(values[i])) {
            total++;
        } else {
            if (isArray(values[i])) {
                for (var j = 0; j < values[i].length; j++) {
                    if (!isEmpty(values[i][j])) {
                        total++;
                    }
                }
            }
        }
    }
    return total;
},
"statistical", "<b>COUNTA(value1;value2;...)</b><br>单元格个数."));
calculator.add(new Funcion("cos", [{
    type: "numeric"
}],
function(values) {
    return Math.cos(values[0]);
},
"math", "<b>COS(number)</b><br>数学函数cos."));
calculator.add(new Funcion("max", [{
    type: "range"
}],
function(values) {
	if (values != undefined){
		var value = values[0];
		var a = [];
		if (typeof values == 'object'){
			a = String(values).split(",");
			var tmp = parseFloat(a[0]);
			for (var i=0; i<a.length; i++){
				if (parseFloat(a[i]) > tmp){
					tmp = parseFloat(a[i]);
				}
			}
			value = tmp;
		}
	}
	return value;
},
"statistical", "<b>MAX(number1;number2;...)</b><br>求最大值。"));
calculator.add(new Funcion("maxa", [{
    type: "range"
}],
function(values) {
    return calculator.calc("max", values);
},
"statistical", "<b>MAXA(value1;value2;...)</b><br>求最大值。"));
calculator.add(new Funcion("min", [{
    type: "range"
}],
function(values) {
	if (values != undefined){
		var value = values[0];
		var a = [];
		if (typeof values == 'object'){
			a = String(values).split(",");
			var tmp = parseFloat(a[0]);
			for (var i=0; i<a.length; i++){
				if (parseFloat(a[i]) < tmp){
					tmp = parseFloat(a[i]);
				}
			}
			value = tmp;
		}
	}
	return value;
},
"statistical", "<b>MIN(number1;number2;...)</b><br>单元格最小值."));
calculator.add(new Funcion("mina", [{
    type: "range"
}],
function(values) {
    return calculator.calc("min", values);
},
"math", "<b>MINA(value1;value2;...)</b><br>单元格中最小数."));
calculator.add(new Funcion("product", [{
    type: "range"
}],
function(values) {
    var value = 1;
    for (var i = 0; i < values.length; i++) {
        if (isNumeric(values[i])) {
            value *= parseFloat(values[i]);
        } else {
            if (isArray(values[i])) {
                for (var j = 0; j < values[i].length; j++) {
                    if (isNumeric(values[i][j])) {
                        value *= parseFloat(values[i][j]);
                    }
                }
            }
        }
    }
    return value;
},
"math", "<b>PRODUCT(number1;number2;...)</b><br>单元格求积."));
calculator.add(new Funcion("sum", [{
    type: "range"
}],
function(values) {
    var value = 0;
    for (var i = 0; i < values.length; i++) {
        if (isNumeric(values[i])) {
            value += parseFloat(values[i]);
        } else {
            if (isArray(values[i])) {
                for (var j = 0; j < values[i].length; j++) {
                    if (isNumeric(values[i][j])) {
                        value += parseFloat(values[i][j]);
                    }
                }
            }
        }
    }
    return value;
},
"math", "<b>SUM(number1;number2;...)</b><br>单元格求和."));
calculator.add(new Funcion("sin", [{
    type: "numeric"
}],
function(values) {
    return Math.sin(values[0]);
}));
calculator.add(new Funcion("sqrt", [{
    type: "numeric"
}],
function(values) {
    return Math.sqrt(value[0]);
}));
calculator.add(new Funcion("round", [{
    type: "numeric"
}],
function(values) {
	if (typeof values == 'object') {
		var vList = String(values).split(',');
		if (vList.length == 1) {
			return parseFloat(vList[0]);
		} else if(vList.length == 2) {
			var v0 = parseFloat(vList[0]);
			var v1 = parseInt(vList[1]);
			return Math.round(v0*Math.pow(10, v1)/Math.pow(10, v1));
		}
	}
}));
calculator.add(new Funcion("PI", [{
    type: "numeric"
}],
function(values) {
	return 3.14159265358979;
}));