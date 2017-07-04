
function tablecloth(){
	
	var highlightCols = false;
	var highlightRows = false;	
	var selectable = true;
	
	var THIS = this;
	var selectValue = null;
	var computedValue = null;
	var selectRow = null;
	var selectCol = null;
	var selectCell = null;
	var showSelectbox = true;
	var valueList = new Array();
	
	var expobj = new Expression("");
	var formulaList = new Array();
	var freezeFormulaList = false;
	
	var bLimitCPoint = false; //默认点击全触发
	var clickPoints = new Array();
	
	var digit = 3;
	var callbackFunc = null;
	var orgValues = new Array();
	var colorList = new Array();
	
	this.getColorList = function(){
		return colorList;
	};
	this.getValueList = function(){
		return valueList;
	}
	this.getFormulaList = function(){ 
		return formulaList;
	}
	
	this.registerCallback = function(func){
		callbackFunc = func;
	}
	this.setDigit = function(d){
		if (isNaN(d)){
			return;
		}
		digit = d;
		
	}
	this.limitCPoint = function(){
		bLimitCPoint = true;
	}
	this.loadClickPoints = function(cps){
		clickPoints = cps;
	}
	this.clickAction = function(obj,row,col){
		var value = $(obj).find("input").val();
		selectValue = value;
		computedValue = value;
		if (obj != null){
			selectCell = obj;
			selectRow = obj.row;
			selectCol = obj.col;
		}else{
			console.log("currently, no cell was selected!");
		}
		THIS.updateAll();
		THIS.showformula(row,col);
		if (callbackFunc != null){
			callbackFunc();
		}
	};
	this.updateAll = function(){
		var reg = /^[A-Z]+$/;
		var arr = this.getAllValues();
		var results = new Array();
		var index = 0;
		
		for (var i=0; i< arr.length; i++){
			var row = arr[i];
			for (var j=0; j<row.length; j++){
				var name = row[j].name;
				var	value = row[j].value;  
				var pass = false;
				
				if (THIS.formulaExist(i, j)){
					value = THIS.getFormula(i, j);
					pass = true;
				}
				if ( (name.indexOf('JOIN') == -1) && isNaN(value) /*&& !(reg.test(name))*/ && (value != '') /*&& (value != -1)*/ 
						&& !THIS.hasSimpleChinese(value)
						/*&& !THIS.inChars(value)*/
						&& !THIS.hasLowerChar(value)
						|| pass ){
					
					THIS.addVars();
					
					expobj.Expression(value + '+0');
					var result = new Array();
					result[0] = i;
					result[1] = j;
					result[2] = value;
					result[3] = expobj.Evaluate();
					result[4] = index;
					
					if (typeof(result[3]) == "number"){
						results.push(result);
						$(arr[i][j]).find("input").val((Math.round(result[3]*Math.pow(10, digit))/Math.pow(10, digit)));
						index++;
					}
				}
			}
		}
		
		//orgValues = results; //记下原始值，后续参与计算使用原始数值，使用四舍五入的数值参与计算有一定偏差。
		
		if (!freezeFormulaList){
			formulaList = results;	
		}
	}
	this.loadFormulaList = function(list){
		if (list == null){
			return;
		}
		for (var i=0; i<list.length; i++ ){
			var a = new Array();
			var n = list[i].name;
			var arr = THIS.nameToRowCol(n);
			a[0] = arr[0];
			a[1] = arr[1];
			a[2] = list[i].value;
		
			formulaList.push(a);
		}
		
		//formulaList = list;
	}
	this.lockFormulaList = function(){
		freezeFormulaList = true;
	}
	this.unlockFormulaList = function(){
		freezeFormulaList = false;
	}
	this.addVars = function(){
		var reg = /^[A-Z]+$/;
		var arr = this.getAllValues();
		expobj.Reset();
		for (var i=0; i< arr.length; i++){
			var row = arr[i];
			for (var j=0; j<row.length; j++){
				var name = row[j].name;
				var	value = row[j].value;
				if ( (name.indexOf('JOIN') == -1) && !(reg.test(name)) && (value != '') && (value != -1) && !isNaN(value) ){
					expobj.AddVariable(name, value);	
					//console.log("添加变量：" + name + " => " + value);
				}
			}
		}
	};
	this.showformula = function(row,col){
		if (THIS.formulaExist(row, col)){
			selectValue = THIS.getFormula(row,col);
			computedValue = THIS.getDisplayValue(row, col);
		}
		//console.log("selectValue: " + selectValue + "- computedValue: " + computedValue);
		//console.log("selectRow: " + selectRow + "- selectCol: " + selectCol);
		
		var value = selectValue;
		THIS.setSelectBox(".select_value_box", value, row, col);
	}
	this.formulaExist = function(row, col){
		var exist = false;
		$.each(formulaList, function(index, ele){
			if ( (ele[0] == row) && (ele[1] == col) ){
				exist = true;
			}
		});
		return exist;
	};
	this.orgValueExist = function(row, col){
		var exist = false;
		$.each(orgValues, function(index, ele){
			if ( (ele[0] == row) && (ele[1] == col) ){
				exist = true;
			}
		});
		return exist;
	};
	this.getFormula = function(row,col){
		var targetIdx = 0;
		$.each(formulaList, function(index, ele){
			if ( (ele[0] == row) && (ele[1] == col) ){
				targetIdx = index;
			}
		});
		return formulaList[targetIdx][2];
	}
	this.lockCell = function(row,col){
		//var cell
		//addClass.
	}
	this.autoSync = function(row, col, value){ //box和table cell的同步
		var index = null;
		$.each(formulaList, function(i, ele){
			if ( (ele[0] == row) && (ele[1] == col) ){
				index = i;
			}
		});
		
		if (index != null){
			formulaList[index][2] = value;
		}else{
			var arr = THIS.getAllValues();
			$(arr[row][col]).find("input").val(value);
		}
	}
	this.rednerCellBg = function(style){
		if (style == null){
			return;
		}
		
		if (selectCell != null){
			$(selectCell).css(style);
		} else{
			return;
		}
	};
	this.getHexBgColor = function(obj){ 
		var rgb = $(obj).css('background-color'); 
		if(!$.browser.msie){ rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/); 
		
		function hex(x) {
			return ("0" + parseInt(x).toString(16)).slice(-2);
		} 
		if (rgb == null){
			rgb = null;
		}else{
			rgb= "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]); } 
		}
		return rgb; 
	};
	
	this.colorValueExsit = function(row, col){
		var bRet = false;
		for(var i=0; i<colorList.length; i++){
			if (colorList[i][0] == row && colorList[i][1] == col){
				bRet = true;
				break;
			}
		}
		return bRet;
	};
	this.getSelectValue = function(){
		if (isNaN(selectValue)){
			return 0;
		}
		if (selectValue){
			return selectValue;
		}else{
			return 0;
		}
	}
	this.getComputedValues = function(){ //返回计算结果值
		
		return new Array();
	}
	this.setSelectBox = function(boxClassName, value, row, col){
		var v = value || selectValue;
		if (showSelectbox){
			$(boxClassName).find("input").val(v);
			$(boxClassName).find("input").attr("row",row);
			$(boxClassName).find("input").attr("col",col);
		}
	}
	var tableover = false;
	this.start = function(){
		var tables = document.getElementsByTagName("table");
		for (var i=0;i<tables.length;i++){
			if (tables[i].getElementsByTagName("tbody")[0].id == "tabIn"){
				tables[i].onmouseover = function(){tableover = true};
				tables[i].onmouseout = function(){tableover = false};			
				THIS.rows(tables[i]);
			}
		};
	};
	
	this.rows = function(table){
		var css = "";
		var tr = table.getElementsByTagName("tr");
		
		for (var i=0;i<tr.length;i++){
			css = (css == "odd") ? "even" : "odd";
			tr[i].className = css;
			var arr = new Array();
			for(var j=0;j<tr[i].childNodes.length;j++){				
				if(tr[i].childNodes[j].nodeType == 1) arr.push(tr[i].childNodes[j]);
			};		

			for (var j=0;j<arr.length;j++){	
				arr[j].row = i;
				arr[j].col = j;
				if(arr[j].innerHTML == "&nbsp;" || arr[j].innerHTML == "") arr[j].className += " empty";					
				arr[j].css = arr[j].className;
				arr[j].onmouseover = function(){
					THIS.over(table,this,this.row,this.col);
				};
				arr[j].onmouseout = function(){
					THIS.out(table,this,this.row,this.col);
				};
				arr[j].onmousedown = function(){
					THIS.down(table,this,this.row,this.col);
				};
				arr[j].onmouseup = function(){
					THIS.up(table,this,this.row,this.col);
				};
				
				if (false){
					var arr = new Array();
					arr[0] = i;
					arr[1] = j;
					if (THIS.inArray(THIS.rowColToName(arr), clickPoints)){
						arr[j].onclick = function(){
							THIS.click(table,this,this.row,this.col);
						};
					}else{
						
					}
				} else{ //默认全绑定click事件
					arr[j].onclick = function(){
						THIS.click(table,this,this.row,this.col);
					};
				}
			};
		};
	};
	
	this.over = function(table,obj,row,col){
		if (!highlightCols && !highlightRows) obj.className = obj.css + " over";  
		if(THIS.check1(obj,col)){
			if(highlightCols) THIS.highlightCol(table,obj,col);
			if(highlightRows) THIS.highlightRow(table,obj,row);		
		};
	};

	this.out = function(table,obj,row,col){
		if (!highlightCols && !highlightRows) obj.className = obj.css; 
		THIS.unhighlightCol(table,col);
		THIS.unhighlightRow(table,row);
	};

	this.down = function(table,obj,row,col){
		obj.className = obj.css + " down";  
	};

	this.up = function(table,obj,row,col){
		obj.className = obj.css + " over";  
	};	

	this.click = function(table,obj,row,col){	
		if(THIS.check1){
			if(selectable) {
				THIS.unselect(table);	
				if(highlightCols) THIS.highlightCol(table,obj,col,true);
				if(highlightRows) THIS.highlightRow(table,obj,row,true);
				document.onclick = THIS.unselectAll;
			}
		};
		THIS.clickAction(obj,row,col); 		
	};		
	
	this.highlightCol = function(table,active,col,sel){
		var css = (typeof(sel) != "undefined") ? "selected" : "over";
		var tr = table.getElementsByTagName("tr");
		for (var i=0;i<tr.length;i++){	
			var arr = new Array();
			for(j=0;j<tr[i].childNodes.length;j++){				
				if(tr[i].childNodes[j].nodeType == 1) arr.push(tr[i].childNodes[j]);
			};	
			if (arr.length > 0 && col < arr.length){
				var obj = arr[col];
				if (THIS.check2(active,obj) && THIS.check3(obj)) obj.className = obj.css + " " + css; 	
			}
		};
	};
	this.unhighlightCol = function(table,col){
		var tr = table.getElementsByTagName("tr");
		for (var i=0;i<tr.length;i++){
			var arr = new Array();
			for(j=0;j<tr[i].childNodes.length;j++){				
				if(tr[i].childNodes[j].nodeType == 1) arr.push(tr[i].childNodes[j])
			};				
			var obj = arr[col];
			if(THIS.check3(obj)) obj.className = obj.css; 
		};
	};	
	this.highlightRow = function(table,active,row,sel){
		var css = (typeof(sel) != "undefined") ? "selected" : "over";
		var tr = table.getElementsByTagName("tr")[row];		
		for (var i=0;i<tr.childNodes.length;i++){		
			var obj = tr.childNodes[i];
			if (check2(active,obj) && check3(obj)) obj.className = obj.css + " " + css; 		
		};
	};
	this.unhighlightRow = function(table,row){
		var tr = table.getElementsByTagName("tr")[row];		
		for (var i=0;i<tr.childNodes.length;i++){
			var obj = tr.childNodes[i];			
			if(THIS.check3(obj)) obj.className = obj.css; 			
		};
	};
	this.unselect = function(table){
		tr = table.getElementsByTagName("tr")
		for (var i=0;i<tr.length;i++){
			for (var j=0;j<tr[i].childNodes.length;j++){
				var obj = tr[i].childNodes[j];	
				if(obj.className) obj.className = obj.className.replace("selected","");
			};
		};
	};
	this.unselectAll = function(){
		if(!tableover){
			tables = document.getElementsByTagName("table");
			for (var i=0;i<tables.length;i++){
				if (tables[i].getElementsByTagName("tbody")[0].id == "tabIn"){
					THIS.unselect(tables[i]);
				}
			};		
		};
	};
	this.getJson = function(){//返回Json数据
		return THIS.getAllValues();
	}
	this.getDisplayValue = function(row,col){//根据行号，列号返回对应数值
		if (!row || !col){ return;}
		if (isNaN(row) || isNaN(col)){ return;}
		var arr = this.getAllValues();
		
		return parseFloat(arr[row][col].value);
	};
	this.getOrgValue = function(row,col){//根据行号，列号返回对应数值
		if (!row || !col){ return;}
		if (isNaN(row) || isNaN(col)){ return;}
		var arr = this.getAllOrgValues();
		
		return arr[row][col].value;
	}
	this.getKeyValue = function(row,col){
		if (!row || !col){ return;}
		if (isNaN(row) || isNaN(col)){ return;}
		var arr = this.getAllValues();
		if (arr.length > 0){
			var map = {};
			map.key = arr[row][col].name;
			map.value = arr[row][col].value;
			return map;
		}
		else{
			return {};
		}
	}
	this.getAllValues = function(){//返回table所有数值，构建每个格子的info,可扩展.
		var tables = document.getElementsByTagName("table");
		var table = tables[0];
		for (var i=0; i<tables.length; i++){
			if (tables[i].getElementsByTagName("tbody")[0].id == "tabIn"){
				table = tables[i];
			}
		}
		var tr = table.getElementsByTagName("tr");
		var values = new Array();
		for (var i=0;i<tr.length;i++){
			var arr = new Array();
			for (var j=0;j<tr[i].childNodes.length;j++){				
				if(tr[i].childNodes[j].nodeType == 1) arr.push(tr[i].childNodes[j]);
			};		
			for (var j=0;j<arr.length;j++){				
				arr[j].row = i;
				arr[j].col = j;
				arr[j].bgColor = THIS.getHexBgColor(arr[j]);
				if (i == 0){
					arr[j].name = THIS.convertCodeToChar(j);
					arr[j].value = -1;
				}else{
					arr[j].name = THIS.convertCodeToChar(j) + i;
					if (j == 0){
						arr[j].value = -1;
					}else{
						arr[j].value = $(arr[j]).find("input").val();
					}
				}
			};
			
			values[i] = arr;
		};	
		
		return values;
	}
	this.getAllOrgValues = function(){
		var table = document.getElementsByTagName("table")[0];
		var table = tables[0];
		for (var i=0; i<tables.length; i++){
			if (tables[i].getElementsByTagName("tbody")[0].id == "tabIn"){
				table = tables[i];
			}
		}
		var tr = table.getElementsByTagName("tr");
		var values = new Array();
		for (var i=0;i<tr.length;i++){
			var arr = new Array();
			for (var j=0;j<tr[i].childNodes.length;j++){				
				if(tr[i].childNodes[j].nodeType == 1) arr.push(tr[i].childNodes[j]);
			};		
			for (var j=0;j<arr.length;j++){				
				arr[j].row = i;
				arr[j].col = j;
				if (i == 0){
					arr[j].name = THIS.convertCodeToChar(j);
					arr[j].value = -1;
				}else{
					//arr[j].name = THIS.convertCodeToChar(j) + (i-1);
					arr[j].name = THIS.convertCodeToChar(j) + i;
					if (j == 0){
						arr[j].value = -1;
					}else{
						if (THIS.orgValueExist(i, j)){
							arr[j].value = THIS.getOrgValue(i, j);
						}else{
							arr[j].value = $(arr[j]).find("input").val();
						}
					}
				}
			};
			
			values[i] = arr;
		};	
		
		return values;
	};

	this.convertCodeToChar = function(col){ //将对应的列号转换成字母
		if (isNaN(col)){ return 'JOIN';}
		if (col == 0) { return 'JOIN';}
		var base = "A";
		var code = base.charCodeAt() + (col-1);
		var Cchar = String.fromCharCode(code);
		return Cchar;
	};
	
	this.nameToRowCol = function(name){ 
		if (name == null){
			return -1;
		}
		var s1 = name.substr(0,1);
		var s2 = name.substring(1);
		//console.log("s1 => "+ s1 + "  s2=>"+s2);
		
		var base = "A";
		var col = s1.charCodeAt() - base.charCodeAt() + 1;
		var row = parseInt(s2);
		var arr = new Array();
		arr[0] = row;
		arr[1] = col;
		return arr;
	};
	this.rowColToName = function(arr){
		
		var r = arr[0];
		var c = arr[1];
		
		var chr = THIS.convertCodeToChar(c);
		var s  = chr + r;
		return s;
	};
	
	this.getRowCount = function(rowId){//返回行数
		return parseInt($(rowId).val());
	};
	this.getColCount = function(colId){//返回列数
		return parseInt($(colId).val());
	};
	this.getTableSize = function(tableId){//返回整个table的大小
		return new Array();
	};
	this.getCellSize = function(){ //返回小方格的大小
		return new Array();
	};
	
	this.bind_select_table = function(tableId, rowId, colId){ //将某个select和某个table绑定
		$(_tabId).empty();
		var _rowId = "#" + rowId;
		var _colId = "#" + colId;
		var _tabId = "#" + tableId;
		var _this = this;
		var _row = this.getRowCount(_rowId);
		var _col = this.getColCount(_colId);
		
		var autoChange = false;
		if (autoChange){
			/*$(_selId).change(function(){
				var v = $(this).children('option:selected').val();
				if (row_col == 0){
					_row = v;
				}
				else if (row_col == 1){
					_col = v;
				}
				var new_table= _this.generateTable(_row, _col);
				$(_tabId).html(new_table);
			});*/
		}else{
			var new_table = _this.generateTable(_row, _col);
			$(_tabId).html(new_table);
		}
	};
	this.generateTable = function(row,col){ //根据选择的行数或者列数生出一个table
		var _html = "";
		var _row = row;
		var _col = col;
		
		if (_row != 0 && _col != 0)
		{
			var _head = "<tr><td>&nbsp;</td>";
			for (var k=0; k<_col; k++){
				_head += "<th>" + String.fromCharCode(65+k)+ "</th>";
			}
			_head += "</tr>";
			
			_html += "<tr>"; 
			for (var i=0; i<_row; i++)
			{	
				var t1 = (i + 1), t2;
				var _innerHtml = "<th>" + t1 + "</th>";
				for (var j=0; j<_col; j++)
				{
					t2 = j + 1;
					_innerHtml += "<td><input value='' name='input["+t1+"]["+t2+"]'  type='text'/></td>";
				}
				_innerHtml += "</tr>";
				_html += _innerHtml;
			}
		}
		
		var table = _head + _html; 
		return table;
	};
	this.checkRowCol = function(select){ //行或者列
		var selObj = String(select);
		if (selObj.indexof('row') != -1){
			return 0;
		}
		if (selObj.indexof('col') != -1){
			return 1;
		}
		return -1;
	};
	this.check1 = function(obj,col){
		if (!obj) return false;
		return (!(col == 0 && obj.className.indexOf("empty") != -1));
	};
	this.check2 = function(active,obj){ //是否TH被激活
		if (!obj) return false;
		return (!(active.tagName == "TH" && obj.tagName == "TH")); 
	};
	this.check3 = function(obj){ //是否未被选中
		if (!obj) return false;
		return (obj.className) ? (obj.className.indexOf("selected") == -1) : true; 
	};	
	
	//JS Regular expression APIs
	this.hasSimpleChinese = function(str){ //是否包含中文
		if(/.*[\u4e00-\u9fa5]+.*$/.test(str)){
			return true;
		}else{
			return false;
		}
	};
	this.inChars = function(str){ //是否包含特殊字符
		var pattern = new RegExp("[`~!@#$&=|{}':;',\\[\\].<>?~！@#￥……&（）——|{}【】‘；：”“'。，、？°]"); 
		if (pattern.test(str)) 
		{
			return true;
		}else{
			return false;
		}
	};
	this.hasUpperChar = function(str){//是否包含大写字母
		var reg = /^[A-Z]+$/;
		if (reg.test(str)){
			return true;
		} else{
			return false;
		}
	};
	this.hasLowerChar = function(str){//是否包含小写字母
		var reg = /[a-z]+/;
		if (reg.test(str)){
			return true;
		} else{
			return false;
		}
	};
	this.inArray = function(search, array){
		var bRet = false;
		for(var i in array){
			if(array[i] == search){
				bRet = true;
	        }
	    }
	    return bRet;
	};
	this.getFormatAllValues = function(){
		var arr = this.getAllValues();
		var table_row_str = "{";
		for (var i=0; i< arr.length; i++){
			var row = arr[i];
			if(i == 0){
				table_row_str += i + ":{";
			}else{
				table_row_str += "," + i + ":{";
			}
			for (var j=0; j<row.length; j++){
				var name = row[j].name.replace('JOIN','').replace(/"/g,"&123&").replace(/'/g,"&124&");
				var value = "" + row[j].value;
				value = value.replace('-1','').replace(/"/g,"&123&").replace(/'/g,"&124&");
				var bgColor = row[j].bgColor;
				if(j == 0){
					table_row_str += j + ":'" + name + "|" + value + "|" + bgColor + "'"; 
				}else{
					table_row_str += "," + j + ":'" + name + "|" + value + "|" + bgColor + "'"; 
				}
			}
			table_row_str += "}";
		}
		table_row_str += "}";
		var formula_data = "{";
		$.each(formulaList, function(index, ele){
			if(index == 0){
				formula_data += index + ":{'position':{'0':'" + ele[0] + "','1':'" + ele[1] + "'},'formula':'" + ele[2] + "','value':'" + ele[3] + "'}";
			}else{
				formula_data += "," + index + ":{'position':{'0':'" + ele[0] + "','1':'" + ele[1] + "'},'formula':'" + ele[2] + "','value':'" + ele[3] + "'}";
			}
		});
		formula_data += "}";
		var json_data = "{'table_data':" + table_row_str + ",'formula_data':" + formula_data + "}";
		return json_data;
	};
	this.debug_show_formula_list = function(){
		$.each(formulaList, function(index, ele){
			console.log( "公式列表： " + ele[0] + " : " + ele[1] + " : "+ ele[2] + " : "+ ele[3] );
		});
	};
	this.debug_show_all_values = function(){
		var arr = this.getAllValues();
		
		for (var i=0; i< arr.length; i++){
			var row = arr[i];
			var table_row_str = " ";
			
			for (var j=0; j<row.length; j++){
				table_row_str += "      " + row[j].name + " | " + row[j].value + " " + " | " + row[j].bgColor + " ";
			}
			console.log(table_row_str);
		}
	};
	this.debug_show_all_org_values = function(){
		var arr = this.getAllOrgValues();
		
		for (var i=0; i< arr.length; i++){
			var row = arr[i];
			var table_row_str = " ";
			
			for (var j=0; j<row.length; j++){
				table_row_str += "      " + row[j].name + " | " + row[j].value + " ";
			}
			console.log(table_row_str);
		}
	};
};



