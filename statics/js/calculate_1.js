
var inputData = 
[
	{
		x: 100.000000,
		y: 2.000000
	},
	{
		x: 238.000000,
		y: 6.000000
	},
	{
		x: 375.000000,
		y: 4.000000
	},
	{
		x: 482.000000,
		y: 2.000000
	},
	{
		x: 516.000000,
		y: 2.000000
	},
	{
		x: 735.000000,
		y: -2.000000
	},
	
	{
		x: 965.000000,
		y: -4.000000
	},
	{
		x: 1073.000000,
		y: -2.000000
	},
] 

var outputData = 
[
	{
		x: 153.000000,
		y: 0
	},
	{
		x: 298.000000,
		y: 0
	},
	{
		x: 348.000000,
		y: 0
	},
	{
		x: 435.000000,
		y: 0
	},
	
	{
		x: 688.000000,
		y: 0
	},
	{
		x: 758.000000,
		y: 0
	},
	{
		x: 893.000000,
		y: 0
	},
	{
		x: 982.000000,
		y: 0
	},
]

function clearInput()
{
	while (inputData.length)
	{
		inputData.pop();
	}
}

function clearOutputData()
{
	while (outputData.length)
	{
		outputData.pop();
	}
}

// => outputData[i].y
var inputLen = inputData.length;
var outputLen = outputData.length;

function updateIOLength()
{
	inputLen = inputData.length;
	outputLen = outputData.length;
}

function OnButtonCal(type) 
{
	if (type == null || type == 'undefined')
	{
		type = 0;
	} 
	
	//console.log("inputData =>  ", inputData);
	calculate(type, inputData, outputData);
}

function calculate(type, nSqxData, nSHData)
{
	console.log("Input Data : ")
	for(var i = 0 ; i < inputLen ; i++)
	{
		console.log("x: ", inputData[i].x, ",  y: ", inputData[i].y);
				
	}
	
	console.log("  ")
	
	var resultArray = new Array(outputLen);
	console.log("output Data : ")
	for(var i = 0 ; i < outputLen ; i++)
	{
		outputData[i].y = slopeAtDis(type, outputData[i].x);
	
		resultArray.push(outputData[i].y);
		
		console.log("x: ", outputData[i].x, ",  y: ", outputData[i].y)
	}

	return true;
}

function slopeAtDis(type, dis)
{
	var data = 0;
	var i = 0, flag = 0;
	var s = dis , sfrom = 0 , sto = 0 ;
	
	for ( i = 0 ; i < inputLen - 1 ; i ++ )
	{
		sfrom = inputData[i].x;
		sto   = inputData[i+1].x;
		if ( s >= sfrom && s < sto )
		{
			flag = 1;	
			break;
		}
	}

	if (flag)
	{
		if ( Math.abs(s - sfrom) < Math.pow(10, -6))
		{
			data = inputData[i].y;
		}
		else
		{
			switch(type)
			{	
			case 0:
				{
					var deltX=0 , deltY = 0 , k = 0;
					deltX = sto - sfrom;			
					deltY = inputData[i+1].y - inputData[i].y;
					k = deltY/deltX;

					deltX = s - sfrom;			
					data = inputData[i].y + k*deltX;	
				}
				break;
				
			case 1:
				{
					var deltX=0 , deltY = 0 , k = 0;
					deltX = sto - sfrom;			
					deltY = inputData[i+1].y - inputData[i].y;
					k = (s - sfrom)/deltX;

					data = inputData[i].y + (3-2*k)*k*k*deltY;			 

				}
				break;
			}
		}
	}
	else
	{
		if ( s < sfrom )
			data = inputData[0].y;
		else // if ( s >= sto )
			data = inputData[inputLen-1].y;
	}

	return data;
}

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

function sortBy(filed, rev, primer) 
{
    rev = (rev) ? -1 : 1;
    return function (a, b)
	{
			a = a[filed];
			b = b[filed];
			if (typeof (primer) != 'undefined') 
			{
				a = primer(a);
				b = primer(b);
        	}
			
        	if (a < b) { return rev * -1; }
        	if (a > b) { return rev * 1; }
        	
			return 1;
    }
};

function testSort()
{
	var obj = [
		{b: '3', c: 'c'}, 
		{b: '1', c: 'a'},
		{b: '2', c: 'b'}
	];

	obj.sort(sortBy('b', false, String));
	
	$.each(obj, function (index, ele){
		console.log("string sort result:  index =>", index, " b=> ", ele.b, " c=> ", ele.c);
	});
	
	obj.sort(sortBy('b', false, parseInt));
	
	$.each(obj, function (index, ele){
		console.log("integer sort result:  index =>", index, " b=> ", ele.b, " c=> ", ele.c);
	});
}

Array.prototype.removeRepeatAttr = function()
{
    var tmp = {}, b = [], a = this; 
	
    for(var i=0;i<a.length;i++)
	{
        if(!tmp[a[i].id])
		{
            tmp[a[i].id] = !0;
        }
		else
		{
            a.splice(i,1);
        }
    };
}

function testRemoveRepeat()
{
	var a = [{"id":"1231"}, {"id":"9387"}, {"id":"68433"}, {"id":"1231"}, {"id":"43566"}];
	a.removeRepeatAttr();
	
	$.each(a, function (index, ele)
	{
		console.log("no repeat result:  index =>", a[index].id);
	});
}


