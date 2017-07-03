
function Stack()
{
    this.arrStack = new Array();
    this.intIndex = 0;

    this.Size     = getSize;
    this.IsEmpty  = isStackEmpty;
    this.Push     = pushElement;
    this.Pop      = popElement;
    this.Get      = getElement;
    this.toString = dumpStack;
}

function dumpStack()
{
    var intCntr = 0;
    var strRet  =  "";
    if (this.intIndex == 0) return null;
    for (intCntr = 0; intCntr < this.intIndex; intCntr++)
    {
        if (strRet.length == 0)
            strRet += this.arrStack[intCntr];
        else
            strRet += "," + this.arrStack[intCntr];
    }
    return strRet;
}

function getSize()
{
    return this.intIndex;
}


function isStackEmpty()
{
	if (this.intIndex == 0)
		return true;
	else
		return false;
}


function pushElement(newData)
{
	debugAssert ("Pushing " + newData);
	this.arrStack[this.intIndex] = newData;
	this.intIndex++;
}

function popElement()
{
    var retVal;

    retVal = null;
    if (this.intIndex > 0)
    {
	   // Assign our new element to the top
	   this.intIndex--;
	   retVal = this.arrStack[this.intIndex];
	}
	return retVal;
}

function getElement(intPos)
{
    var retVal;

    //alert ("Size : " + this.intIndex + ", Index " + intPos);
    if (intPos >= 0 && intPos < this.intIndex)
        retVal = this.arrStack[this.intIndex - intPos - 1];
    return retVal;
}
