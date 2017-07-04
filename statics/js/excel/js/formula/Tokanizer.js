
 var lstAlpha    = "a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,uv,w,x,y,z";
 var lstDigits   = "0,1,2,3,4,5,6,7,8,9";
 var lstArithOps = "^,*,/,%,+,-";
 var lstLogicOps = "!,&,|";
 var lstCompaOps = "<,<=,>,>=,<>,=";
 var lstFuncOps  = ["AVG","ABS","ACOS","ASC","ASIN","ATAN","CDATE","CHR","COS","DATE","FIX","HEX","IF","LCASE","LEFT","LOG","MAX","MID","MIN","RIGHT","ROUND","SIN","SQRT","TAN","UCASE", "PI"];

 
 function Tokanize(pstrExpression)
 {
    var intCntr, intBraces;
    var arrTokens;
    var intIndex, intPos;
    var chrChar, chrNext;
    var strToken, prevToken;

    intCntr   = 0;
    intBraces = 0;
    intIndex  = 0;
    strToken  = "";
    arrTokens = new Array();
    pstrExpression = Trim(pstrExpression);

    while (intCntr < pstrExpression.length)
    {
        prevToken = "";
        chrChar = pstrExpression.substr(intCntr, 1);
        if (window)
            if (window.status)
                window.status = "Processing " + chrChar;
				
        switch (chrChar)
        {
            case " " :
                if (strToken.length > 0)
                {
                    arrTokens[intIndex] = strToken;
                    intIndex++;
                    strToken = "";
                }
                break;
            case "(":
                intBraces++;
                if (strToken.length > 0)
                {
                    arrTokens[intIndex] = strToken;
                    intIndex++;
                    strToken = "";
                }
                arrTokens[intIndex] = chrChar;
                intIndex++;
                break;
            case ")" :
                intBraces--;
                if (strToken.length > 0)
                {
                    arrTokens[intIndex] = strToken;
                    intIndex++;
                    strToken = "";
                }
                arrTokens[intIndex] = chrChar;
                intIndex++;
                break;
            case "^" :
                if (strToken.length > 0)
                {
                    arrTokens[intIndex] = strToken;
                    intIndex++;
                    strToken = "";
                }
                arrTokens[intIndex] = chrChar;
                intIndex++;
                break;
            case "*" :
                if (strToken.length > 0)
                {
                    arrTokens[intIndex] = strToken;
                    intIndex++;
                    strToken = "";
                }
                arrTokens[intIndex] = chrChar;
                intIndex++;
                break;
            case "/" :
                if (strToken.length > 0)
                {
                    arrTokens[intIndex] = strToken;
                    intIndex++;
                    strToken = "";
                }
                arrTokens[intIndex] = chrChar;
                intIndex++;
                break;
            case "%" :
                if (strToken.length > 0)
                {
                    arrTokens[intIndex] = strToken;
                    intIndex++;
                    strToken = "";
                }
                arrTokens[intIndex] = chrChar;
                intIndex++;
                break;
            case "&" :
                if (strToken.length > 0)
                {
                    arrTokens[intIndex] = strToken;
                    intIndex++;
                    strToken = "";
                }
                arrTokens[intIndex] = chrChar;
                intIndex++;
                break;
            case "|" :
                if (strToken.length > 0)
                {
                    arrTokens[intIndex] = strToken;
                    intIndex++;
                    strToken = "";
                }
                arrTokens[intIndex] = chrChar;
                intIndex++;
                break;
            case "," :
                if (strToken.length > 0)
                {
                    arrTokens[intIndex] = strToken;
                    intIndex++;
                    strToken = "";
                }
                arrTokens[intIndex] = chrChar;
                intIndex++;
                break;
            case "-" :
                if (strToken.length > 0)
                {
                    arrTokens[intIndex] = strToken;
                    intIndex++;
                    strToken = "";
                }
                chrNext = pstrExpression.substr(intCntr + 1, 1);
                if (arrTokens.length > 0)
                    prevToken = arrTokens[intIndex - 1];
                if (intCntr == 0 || ((IsOperator(prevToken) ||
                    prevToken == "(" || prevToken == ",") && 
                    (IsDigit(chrNext) || chrNext == "(")))
                {
                    // Negative Number
                    strToken += chrChar;
                }
                else
                {
                    arrTokens[intIndex] = chrChar;
                    intIndex++;
                    strToken = "";
                }
                break;
            case "+" :
                if (strToken.length > 0)
                {
                    arrTokens[intIndex] = strToken;
                    intIndex++;
                    strToken = "";
                }
                chrNext = pstrExpression.substr(intCntr + 1, 1);
                if (arrTokens.length > 0)
                    prevToken = arrTokens[intIndex - 1];
                if (intCntr == 0 || ((IsOperator(prevToken) ||
                    prevToken == "(" || prevToken == ",") && 
                    (IsDigit(chrNext) || chrNext == "(")))
                {
                    // positive Number
                    strToken += chrChar;
                }
                else
                {
                    arrTokens[intIndex] = chrChar;
                    intIndex++;
                    strToken = "";
                }
                break;
            case "<" :
                chrNext = pstrExpression.substr(intCntr + 1, 1);
                if (strToken.length > 0)
                {
                    arrTokens[intIndex] = strToken;
                    intIndex++;
                    strToken = "";
                }
                if (chrNext == "=")
                {
                    arrTokens[intIndex] = chrChar + "=";
                    intIndex++;
                    intCntr++;
                }
                else if (chrNext == ">")
                {
                    arrTokens[intIndex] = chrChar + ">";
                    intIndex++;
                    intCntr++;
                }
                else
                {
                    arrTokens[intIndex] = chrChar;
                    intIndex++;
                }
                break;
            case ">" :
                chrNext = pstrExpression.substr(intCntr + 1, 1);
                if (strToken.length > 0)
                {
                    arrTokens[intIndex] = strToken;
                    intIndex++;
                    strToken = "";
                }
                if (chrNext == "=")
                {
                    arrTokens[intIndex] = chrChar + "=";
                    intIndex++;
                    intCntr++;
                }
                else
                {
                    arrTokens[intIndex] = chrChar;
                    intIndex++;
                }
                break;
            case "=" :
                if (strToken.length > 0)
                {
                    arrTokens[intIndex] = strToken;
                    intIndex++;
                    strToken = "";
                }
                arrTokens[intIndex] = chrChar;
                intIndex++;
                break;
            case "'" :
                if (strToken.length > 0)
                {
                    arrTokens[intIndex] = strToken;
                    intIndex++;
                    strToken = "";
                }

                intPos = pstrExpression.indexOf(chrChar, intCntr + 1);
                if (intPos < 0) 
                    throw "Unterminated string constant";
                else
                {
                    strToken += pstrExpression.substring(intCntr + 1, intPos);
                    arrTokens[intIndex] = strToken;
                    intIndex++;
                    strToken = "";
                    intCntr = intPos;
                }
                break;
            case "\"" :
                if (strToken.length > 0)
                {
                    arrTokens[intIndex] = strToken;
                    intIndex++;
                    strToken = "";
                }

                intPos = pstrExpression.indexOf(chrChar, intCntr + 1);
                if (intPos < 0)
                {
                    throw "Unterminated string constant";
                }
                else
                {
                    strToken += pstrExpression.substring(intCntr + 1, intPos);
                    arrTokens[intIndex] = strToken;
                    intIndex++;
                    strToken = "";
                    intCntr = intPos;
                }
                break;
            default :
                strToken += chrChar;
                break;
        }
        intCntr++;
    }
    if (intBraces > 0)
        throw "Unbalanced parenthesis!";

    if (strToken.length > 0)
        arrTokens[intIndex] = strToken;
    return arrTokens;
}

function IsDigit(chrArg)
{
    if (lstDigits.indexOf(chrArg) >= 0)
        return true;
    return false;
}

function IsAlpha(chrArg)
{
    if (lstAlpha.indexOf(chrArg) >= 0 || 
        lstAlpha.toUpperCase().indexOf(chrArg) >= 0)
        return true;
    return false;
}


function IsOperator(strArg)
{
    if (lstArithOps.indexOf(strArg) >= 0 || lstCompaOps.indexOf(strArg) >= 0)
        return true;
    return false;
}


function IsFunction(strArg)
{
	if (!strArg)
	{
		return false;
	}
	
	var idx = 0;

	strArg = strArg.toUpperCase();
	for (idx = 0; idx < lstFuncOps.length; idx++)
	{
	    if (strArg == lstFuncOps[idx])
	        return true;
	}
	return false;
}

function Trim(pstrVal)
{
    if (pstrVal.length < 1) return "";

    pstrVal = RTrim(pstrVal);
    pstrVal = LTrim(pstrVal);
    if (pstrVal == "")
		return "";
    else
        return pstrVal;
}


function RTrim(pstrValue)
{
    var w_space = String.fromCharCode(32);
    var v_length = pstrValue.length;
    var strTemp = "";
    if(v_length < 0)
    {
        return"";
    }
    var iTemp = v_length - 1;

    while(iTemp > -1)
    {
        if(pstrValue.charAt(iTemp) == w_space)
        {
        }
        else
        {
            strTemp = pstrValue.substring(0, iTemp + 1);
            break;
        }
        iTemp = iTemp - 1;
    }
    return strTemp;
}


function LTrim(pstrValue)
{
    var w_space = String.fromCharCode(32);
    if(v_length < 1)
    {
        return "";
    }
    var v_length = pstrValue.length;
    var strTemp = "";
    var iTemp = 0;

    while(iTemp < v_length)
    {
        if(pstrValue.charAt(iTemp) == w_space)
        {
        }
        else
        {
            strTemp = pstrValue.substring(iTemp, v_length);
            break;
        }
        iTemp = iTemp + 1;
    }
    return strTemp;
}
