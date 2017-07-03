var H1,
	H2,
	H3,
	H4,
	H5,
	L = 22,
	N = 2,
	Ltype = 0;

var keyValue; // C22
var arrayLList = new Array();
var arrayY1List = new Array();
var arrayY2List = new Array();
var arrayDValueList = new Array();

function getK1()
{
	var errCode = 0;
	var retValue = 0;
	if (H1 >= H2)
	{
		//alert(" error, H1 > H2");
		errCode = 1;
		
		return errCode;
	}
	
	retValue = (H2 - H1) / Math.pow(L, 2);
	
	K1 = retValue;
	
	console.log(" K1 =>", retValue);
	return retValue;
}

function getK2()
{
	var errCode = 0;
	if (H1 >= H2)
	{
		//alert(" error, H1 > H2");
		errCode = 1;
		return errCode;
	}
	
	var retValue = (getKeyValue() - H3 - C2) / Math.pow(getLValueByNum(getKeyXNum()), N);
	K2 = retValue;
	 
	console.log("K2 => ", retValue);
	
	return retValue;
}

function getC1()
{
	var retValue = H1;
	
	C1 = retValue;
	
	console.log("C1 => ", retValue);
	
	return retValue;
}

function getC2()
{
	var retValue = (C1 - H4);
	
	C2 = retValue;
	
	console.log("C2 => ", retValue);
		
	return retValue;
}

function getY1(x1)
{
	var retValue = K1 * Math.pow(x1, N) + C1;
	
	console.log("x1 => ", x1, ", Y1 => ", retValue);
	
	return retValue;
}

function getY2(x2)
{
	var retValue = K2 * Math.pow(x2, N) + C2;
	
	console.log("x2 => ", x2, ", Y2 => ", retValue);
		
	return K2 * Math.pow(x2, N) + C2;
}


function getLLength()
{
	var length = 0;
	if (Ltype == 0 && checkEven(L)) // 2*11
	{
		length = L / 2 + 1;
	}
	else if (Ltype == 1 && !checkEven(L)) // 2*11 + 1
	{
		length = (L + 1 ) / 2 + 1;
	}
	else if (Ltype == 2 && !checkEven(L)) // 1 + 2*11 
	{
		length = (L + 1 ) / 2 + 1;
	}
	else if (Ltype == 3)  // 
	{
		length = L + 1;
	}
	else
	{
		console.error(" it has not been handled !!!");
	}
	
	console.log(" total length = ", length);
	
	return length;
}

function checkEven(num)
{
	if (num % 2 === 0 )
	{
		return true;
	}
	
	return false; 
}

function allocateLListMem()
{
	var len = getLLength();
	if (getLLength() != 0)
	{
		arrayLList = new Array(len);
	}
	else
	{
		console.error("L assign rules error, length is 0; ")	
	}
}

function generateLList()
{
	var type = Ltype;
	var len = arrayLList.length;
	
	if (type == 0) //11*2
	{
		for (var i=0; 2*i<= L; i++)
		{
			arrayLList[i] = L - 2*i; 
		}
	}
	else if (type == 1) //11 *2 +1
	{
		for (var i=0; i < len; i++)
		{
			arrayLList[i] =  Math.max(L - 2*i, 0);
		}
	}
	else if (type == 2) // 1 + 11*2
	{
		arrayLList[0] = L;
		for (var i=1; i<len; i++)
		{
			arrayLList[i] =  (L +1) - 2*i; 
		}
	}
	else if (type == 3)
	{
		for (var i=0; i<= L; i++)
		{
			arrayLList[i] = i; 
		}
	}
	
	for (var i=0; i< arrayLList.length; i++)
	{
		console.log("generateLList  i=>", arrayLList[i]);
	}
}

function getLValueByNum(num)
{
	if (num -1 >= 0 && num <= arrayLList.length)
	{
		return arrayLList[num -1];
	}
	else
	{
		console.log(" num is out of range !!!  num = ", num, ",   length = ", arrayLList.length);
	}
}

function getKeyValue()
{
	var retValue = K1 * Math.pow(getKeyX(), N) + C1;
	
	keyValue = retValue;
	
	console.log("黄色关键值 => ", retValue);
	return retValue;
}

function getKeyXNum()
{	
	var retValue = 2;
	
	console.log("L关键值序列号 => ", retValue);
		
	return retValue;
}

function getKeyX()
{
	var num = getKeyXNum();
	var retValue = getLValueByNum(num);
	
	console.log("L关键值序列号算出的L值 => ", retValue);
	
	return retValue
}

function getY1Formula()
{
	var retValue = "";
	
	retValue = "y=" + K1 + "X^"+ N + "+" + roundNumberToString(C1, 2) + " m";
	
	console.log("Y1公式为 => ", retValue);
	
	return retValue;
}

function getY2Formula()
{
	var retValue = "";
	
	retValue = "y=" + K2 + "X^"+ N + "+" + roundNumberToString(C2, 2) + " m";
	
	console.log("Y2公式为 => ", retValue);
	
	return retValue;
}

function getY1List()
{
	//console.log("Y1 List: ");
	
	for (var i=0; i<arrayLList.length; i++ )
	{
		arrayY1List[i] = roundNumberToString(getY1(arrayLList[i])*100, 2);
		
		//console.log("Y1 List: ", arrayY1List[i]);
	}
	
	return arrayY1List;
}

function getY2List()
{
	//console.log("Y2 List: ");
	for (var i=0; i<arrayLList.length; i++ )
	{
		arrayY2List[i] = roundNumberToString( getY2(arrayLList[i])*100, 2);
		
		//console.log("Y2 List: ", arrayY2List[i]);
	}
	
	return arrayY2List;
}

function getD_ValueList()
{
	for (var i=0; i<arrayLList.length; i++ )
	{
		
		var y1 = parseFloat(roundNumberToString(arrayY1List[i], 2));
		var y2 = parseFloat(roundNumberToString(arrayY2List[i], 2));
		arrayDValueList[i] = roundNumberToString( (y1 - y2), 2); 
		
		
		console.log("y1 =", y1, ", y2 =", y2, ", D-value List: ", arrayDValueList[i]);
	}
	
	arrayDValueList[0] = H5 * 100;
	
	return arrayDValueList;
}

var h1 = 2.1,
	h2 = 3.6,
	h3 = 0.5,
	h4 = 0.22,
	h5 = 0.9,
	l = 22,
	n = 2,
	ltype = 0;

function setParameters(_h1, _h2, _h3, _h4, _h5, _l, _n, _ltype)
{
	H1 = _h1 || 0;
	H2 = _h2 || 0;
	H3 = _h3 || 0;
	H4 = _h4 || 0;
	H5 = _h5 || 0;
	L = _l || 0;
	N = _n || 0;
	Ltype = _ltype || 0;
}

function prepare()
{
	getLLength();
	allocateLListMem();
	generateLList();
	
	getK1();
	getC1();
	getC2();
	getKeyXNum();
	getKeyX();
	getKeyValue(); //黄色关键值
	getK2();
	getY1Formula();
	getY2Formula();
	getY1List();
	getY2List();
	getD_ValueList();
}

function giveResults() //test function
{
	H1 = h1;
	H2 = h2;
	H3 = h3;
	H4 = h4;
	H5 = h5;
	L = l;
	N = n;
	Ltype = ltype;
	
	prepare();
}

//common function

function roundNumberToString(number,decimals) {
	var newString;
	decimals = Number(decimals);
	if (decimals < 1) {
		newString = (Math.round(number)).toString();
	} else {
		var numString = number.toString();
		if (numString.lastIndexOf(".") == -1) {
			numString += ".";
		}
		var cutoff = numString.lastIndexOf(".") + decimals;// The point at which to truncate the number
		var d1 = Number(numString.substring(cutoff,cutoff+1));// The value of the last decimal place that we'll end up with
		var d2 = Number(numString.substring(cutoff+1,cutoff+2));// The next decimal, after the last one we want
		if (d2 >= 5) {// Do we need to round up at all? If not, the string will just be truncated
			if (d1 == 9 && cutoff > 0) {// If the last digit is 9, find a new cutoff point
				while (cutoff > 0 && (d1 == 9 || isNaN(d1))) {
					if (d1 != ".") {
						cutoff -= 1;
						d1 = Number(numString.substring(cutoff,cutoff+1));
					} else {
						cutoff -= 1;
					}
				}
			}
			d1 += 1;
		} 
		if (d1 == 10) {
			numString = numString.substring(0, numString.lastIndexOf("."));
			var roundedNum = Number(numString) + 1;
			newString = roundedNum.toString() + '.';
		} else {
			newString = numString.substring(0,cutoff) + d1.toString();
		}
	}
	if (newString.lastIndexOf(".") == -1) {// Do this again, to the new string
		newString += ".";
	}
	var decs = (newString.substring(newString.lastIndexOf(".")+1)).length;
	for(var i=0;i<decimals-decs;i++) newString += "0";
	//console.log("new number is => ", newString);
	return newString
}
