var H1,
	H,
	D,
	a,
	h1,
	L,
	L2,
	L1,
	Pi;

var H2,
 	M0,
	H0,
	h2,
	h3,
	L3,
	M1,
	M2;

function getH2()
{
	var retValue = 0;
	
	retValue = H1 + H;
	
	H2 = retValue;
	
	console.log(" H2 =>", retValue);
	return retValue;
}

function getM0()
{
	var retValue = Math.pow(D / 2, 2) * Pi;
	
	M0 = retValue;
	 
	console.log("M0 => ", retValue);
	
	return retValue;
}

function getH0()
{
	var retValue = h1 - L;
	
	H0 = retValue;
	
	console.log("H0 => ", retValue);
	
	return retValue;
}

function geth2()
{
	var retValue = h1 - L2;
	
	h2 = retValue;
	
	console.log("h2 => ", retValue);
	
	return retValue;
}

function geth3()
{
	var retValue = h1 - L1;
	
	h3 = retValue;
	
	console.log("h3 => ", retValue);
	
	return retValue;
}

function getL3()
{
	var retValue = (h2 - h3);
	
	L3 = retValue;
	
	console.log("L3 => ", retValue);
		
	return retValue;
}

function getM1()
{
	var retValue = (h2 - H0)*M0
	
	M1 = retValue;
		
	console.log("M1 => ", retValue);
	
	return retValue;
}

function getM2()
{
	var retValue = (H2 + a - h2)*M0;
	
	M2 = retValue;
	
	console.log("M2 => ",  retValue);
		
	return retValue;
}

function setParameters(_v0, _v1, _v2, _v3, _v4, _v5, _v6, _v7, _v8)
{
	H1 = _v0;
	H = _v1;
	D = _v2;
	a = _v3;
	h1 = _v4;
	L = _v5;
	L2  = _v6;
	L1 = _v7;
	Pi = _v8;
	
	console.log(" Input parameters: ");
	
	console.log(" H1 => ", H1);
	console.log(" H => ", H);
	console.log(" D => ", D);
	console.log(" a => ", a);
	console.log(" h1 => ", h1);
	console.log(" L => ", L);
	console.log(" L2 => ", L2);
	console.log(" L1 => ", L1);
	console.log(" Pi => ", Pi);
}

function prepare()
{
	getH2();
	getM0();
	getH0();
	geth2();
	geth3();
	getL3();
	getM1();
	getM2();
}

function giveResults() //test function
{
	
	H1 = 200.222;
 	H = 20;
	D = 1.5;
	a = 1;
	h1 = 222.222;
	L = 22.2;
	L2 = 6;
	L1 = 9;
	Pi = 3.141593;
	
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
