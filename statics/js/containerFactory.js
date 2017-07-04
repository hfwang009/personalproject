function container(nType, nVCount, id, nHcount)
{
	this.type = nType; //required
	this.vCount = nVCount; //required
	this.id = id; //required
	this.hCount = nHcount || 0; //option
	this.errorCode = 0;
	
	this.createButtonList = function(json)
	{
		if (!json) return;
		if (this.type === "button")
		{
		   var data0 = json;
		   var _id = this.id;
		   $.each(data0,function(infoIndex,info)
		   { 
				var _html = "<input type ='button' value= '" + info["name"]+ "' />";
				$(_id).append(_html);
		   }) 
		}
		else
		{
			this.errorCode = 1;
		}
	}
	this.createRadioList = function()
	{
		if (this.type === "radio")
		{
			for (var i=0; i<this.vCount; i++)
			{	
				$(this.id).append("<input type='radio'/>" + "<label>k=2.512</label>"); 
			}  
		}
		else
		{
			this.errorCode = 1;
		}
	}
	this.createImgList = function()
	{
		if (this.type === "image")
		{
			for (var i=0; i<this.vCount; i++)
			{	
				var _html = "<img src= '" + "images/m" + i+ ".jpg" + "' />";
				this.appendHTML(_html, this.id); 
			}  
		}
		else
		{
			this.errorCode = 1;
		}
	}
	this.createOptionList = function(startValue)
	{
		if (this.type === "option")
		{
			for (var i=0; i<this.vCount; i++)
			{	
				$(this.id).append("<option value=" + (i+startValue) + ">" + (i+startValue) + "</option>"); 
			}  
		}
		else
		{
			this.errorCode = 1;
			this.error();
		}
	}
	this.createTextList = function(inOut)
	{
		if (this.type === "inputText")
		{
			for (var i=0; i<this.vCount; i++)
			{	
				$(this.id).append("<ul id="+i+" align='center'>"
				+"<li>No."+i+"</li>"
				+"<li><input type='text' name='desc"+ i+"' id='descX"+i+"' /></li>" 
				+"<li><input type='text' name='desc"+ i+"' id='descY"+i+"' /></li>"
				+"</ul>"); 
				$(this.id + " li input").val("0.00");
			} 
		}
		else if (this.type === "template")
		{
			console.log("this.id = ", this.id);
			var _id = this.id;
			var _html = ""; 
			var _dName = "inputD_";
			var _name = "inputN_";
			var _value = "inputV_";
			var _codePre = "V";
			if (inOut) 
			{
				_dName = "outputD_";
				_name = "outputN_";
				_value = "outputV_";
				_codePre = "R";
			}
			for (var i=0; i<this.vCount; i++)
			{	 
			    _html += "<tr><td><input type='text'  value='参数名称"+ (i+1)+"' name='"+_dName+i+"'/></td>" 
				+ "<td><input type='text' value='"+ _codePre + (i+1)+"'  name='"+_name+i+"' /></td>"
				+ "<td align='center'><input type='text' value = '' name='"+_value +i+"'/></td></tr>";
			}
			
			$(_id).append(_html);
		}
		else if (this.type === "inputTextTab")
		{
			if (this.vCount != 0 && this.hCount != 0)
			{
				var vCount = this.vCount;
				var hCount = this.hCount;
				var _id = this.id;
				var _html = "<tr>"; 
				for (var i=0; i<vCount; i++)
				{	
                                        var t1 = (i + 1),t2;
					var _innerHtml = "<tr><td>No."+ t1 + "</td>";
					for (var j=0; j<hCount; j++)
					{   
                          t2 = j + 1;    
                          _innerHtml += "<td><input value='' name='input["+t1+"]["+t2+"]'  type='text'/></td>";
					}
					_innerHtml += "</tr>";
					_html += _innerHtml;
				}
				
				$(_id).append(_html);
				$(_id + " tr input").val("0.00");
			}
			else
			{
				for (var i=0; i<this.vCount; i++)
				{	
					$(this.id).append("<tr>"
					+"<td>No."+ (i + 1) +"</td>"
					+"<td><input type='text' name='desc"+ i+"' id='descX"+i+"' /></td>" 
					+"<td><input type='text' name='desc"+ i+"' id='descY"+i+"' /></td>"
					+"</tr>"); 
					$(this.id + " tr input").val("0.00");
				} 
			}
		}
		else
		{
			this.errorCode = 1;
		}
	}
	this.appendHTML = function(htmlStr, id)
	{
		if (htmlStr != null)
		{
			$(id).append(htmlStr);
		}
	}
	this.addOne= function()
	{
		var _id = this.id;
		var addOneButton = function()
		{
		}
		var addOneInputText = function()
		{
			var _len = $(_id + " ul").length; 
			if (_len != null && _len>0)
			{
				$(_id).append("<ul id="+_len+" align='center'>"
					+"<li>No."+_len+"</li>"
					+"<li>"+_len+"</li>" 
					+"<li><input type='text' name='desc"+_len+"' id='desc"+_len+"' /></li>"
					+"</ul>");  
			}
			$("li input").attr("value", "0.00");
		}
		var addOneImage = function()
		{
		}
		var addOneOption = function()
		{
		}
		
		if (this.type === "button")
		{
			addOneButton()
		}
		else if (this.type === "option")
		{
			addOneOption()
		}
		else if (this.type === "image")
		{
			addOneImage()
		}
		else if (this.type === "text")
		{
			addOneInputText()
		}
		else
		{
			this.printLog("type error!!!");
		}
	}
	this.deleteOne= function()
	{
	}
	this.animate = function()
	{
		$(this.id).hide(200).show(2000);
	}
	this.empty = function()
	{
		$(this.id).empty();
	}
	this.error = function()
	{
		this.printLog("create " + this.type + " list fail, error code => ", this.errorCode);
	}
	this.printLog = function(content)
	{
		console.log(content);
	}
}