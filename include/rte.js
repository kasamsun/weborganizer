
var ground = "";	

function changeColor(wcolour) {

if (ground=="bg"){
	document.all["pickbgcolour"].style.backgroundColor = '#' + wcolour;		
	document.all["colorbox"].style.visibility = 'hidden';	
	idContent.document.body.bgColor = wcolour;
}else if (ground=="bgf")
		{
		document.all["pickbgfcolour"].style.backgroundColor = '#' + wcolour;	
		document.all["colorbox"].style.visibility = 'hidden';	
		cmdExec("BackColor",wcolour);	
		} 
 else {
	document.all["pickfgcolour"].style.backgroundColor = '#' + wcolour;		
	document.all["colorbox"].style.visibility = 'hidden';	
	cmdExec("ForeColor",wcolour);	
	}

}
	
function showColor(posX,posY,what){	
	e = window.event;		
	with (document.all["colorbox"]){			
		style.left = e.clientX+4;		
		//style.top = e.clientY - 40;
		style.visibility = 'visible';		
}
ground = what;
}

//3 dimensional button stuff

function button_over(eButton){
	eButton.style.backgroundColor = "#ffff99"
	eButton.style.borderColor = "darkblue darkblue darkblue darkblue"
	}
function button_out(eButton){
	eButton.style.backgroundColor = ""
	eButton.style.borderColor = ""
	}
function button_down(eButton){
	eButton.style.backgroundColor = "#ff3300"
	eButton.style.borderColor = "darkblue darkblue darkblue darkblue"
	}
function button_up(eButton){
	eButton.style.backgroundColor = "#ff9900"
	eButton.style.borderColor = "darkblue darkblue darkblue darkblue"
	eButton = null; 
	}

//Rich text editor stuff
	
var isHTMLMode=false

//function document.onreadystatechange(){
 //	idContent.document.designMode="On"

//}
function cmdExec(cmd,opt) {
  	if (isHTMLMode){alert("Please uncheck 'Edit HTML'");return;}
  	idContent.document.execCommand(cmd,"",opt);
	idContent.focus();
	}
function setMode(bMode){
	var sTmp;
  	isHTMLMode = bMode;
  	if (isHTMLMode){sTmp=idContent.document.body.innerHTML;idContent.document.body.innerText=sTmp;} 
	else {sTmp=idContent.document.body.innerText;idContent.document.body.innerHTML=sTmp;}
  	idContent.focus();
	}
function createLink(){
	if (isHTMLMode){alert("Please uncheck 'Edit HTML'");return;}
	cmdExec("CreateLink");
	}
function MM(){
	if (isHTMLMode){alert("Please uncheck 'Edit HTML'");return;}
	idContent.document.execCommand("InsertImage",true);
	idContent.focus();
	return true;
	}
		
/********************************************************************/
/*						Table Creation Stuff								
/********************************************************************/

function GetElement(oElement,sMatchTag) 
	{
	while (oElement!=null && oElement.tagName!=sMatchTag) 
		{
		if(oElement.id=="idContent") return null;
		oElement = oElement.parentElement
		}
	return oElement
	}
function insertHTML(sHTML) 
	{
	var oSel	= idContent.document.selection.createRange()
	var sType = idContent.document.selection.type	

	if (sType=="Control")
		oSel.item(0).outerHTML = sHTML
	else 
		oSel.pasteHTML(sHTML)
	}


var oSel_Table //selection state
var sType_Table
function TableInsertRow()
	{
	var oSel = oSel_Table
	var oBlock = (oSel.parentElement != null ? GetElement(oSel.parentElement(),"TABLE") : GetElement(oSel.item(0),"TABLE"))
	var elRow = oBlock.insertRow()
	for (var i=0;i<oBlock.rows[0].cells.length;i++) //num of cols
		{
		var elCell = elRow.insertCell()
		elCell.innerHTML = "&nbsp;"
		}	
	}
function TableInsertCol()
	{
	var oSel = oSel_Table
	var oBlock = (oSel.parentElement != null ? GetElement(oSel.parentElement(),"TABLE") : GetElement(oSel.item(0),"TABLE"))
	for (var i=0;i<oBlock.rows.length;i++) //num of rows
		{
		var elCell = oBlock.rows[i].insertCell()
		elCell.innerHTML = "&nbsp;"
		}	
	}
function TablePopup()
	{
	idContent.focus()
	var oSel	= idContent.document.selection.createRange()
	var sType = idContent.document.selection.type
		
	oSel_Table = oSel
	sType_Table = sType

	var oBlock = (oSel.parentElement != null ? GetElement(oSel.parentElement(),"TABLE") : GetElement(oSel.item(0),"TABLE"))
	if (oBlock!=null) 
		{
  		var args = new Array();
  		var arr = null;
  		args["EditTable"] = true
  		args["cellPadding"] = oBlock.cellPadding
  		args["cellSpacing"] = oBlock.cellSpacing
  		args["border"] = oBlock.border
  		args["borderColor"] = oBlock.borderColor
  		args["background"] = oBlock.background
  		args["bgColor"] = oBlock.bgColor
  		arr = null;
  		arr = showModalDialog("/include/rte_table.htm",args,"dialogWidth:23em;dialogHeight:22em;");			
		}
	else
		{
  		var args = new Array();
  		var arr = null;	
  		args["EditTable"] = false
  		arr = null;
  		arr = showModalDialog("/include/rte_table.htm",args,"dialogWidth:23em; dialogHeight:22em; ");			
		}
	if(arr==null)return;
	if(arr["action"]=="insert")TableInsert(arr);
	if(arr["action"]=="update")TableUpdate(arr);
	if(arr["action"]=="insrow")TableInsertRow();
	if(arr["action"]=="inscol")TableInsertCol();
	}
function TableInsert(arr)
	{
	if (isHTMLMode){alert("Please uncheck 'Edit HTML'");return;}
	var sHTML = ""
		+ "<TABLE "
		+ (((arr["border"]=="") || (arr["border"]=="0")) ? "class=\"NOBORDER\"" : "")
		+	(arr["cellPadding"] != "" ? "cellPadding=\"" + arr["cellPadding"] + "\" " : "")
		+	(arr["cellSpacing"] != "" ? "cellSpacing=\"" + arr["cellSpacing"] + "\" " : "")
		+	(arr["border"] != "" ? "border=\"" + arr["border"] + "\" " : "")
		+	(arr["borderColor"] != "" ? "bordercolor=\"" + arr["borderColor"] + "\" " : "")
		+	(arr["background"] != "" ? "background=\"" + arr["background"] + "\" " : "")
		+	(arr["bgColor"] != "" ? "bgColor=\"" + arr["bgColor"] + "\" " : "")
		+ ">"
	for (var i=0; i < arr["rows"]; i++) 
		{
		sHTML += "<TR>"
		for (var j=0; j < arr["cols"]; j++)
		sHTML += "<TD>&nbsp;</TD>"
		sHTML += "</TR>"
		}
	sHTML += "</TABLE>"
		
	idContent.focus()
	if (sType_Table=="Control")oSel_Table.item(0).outerHTML = sHTML
	else oSel_Table.pasteHTML(sHTML)
	}
function TableUpdate(arr)
	{
	idContent.focus()
	var oBlock = (oSel_Table.parentElement != null ? GetElement(oSel_Table.parentElement(),"TABLE") : GetElement(oSel_Table.item(0),"TABLE"))
	if (oBlock!=null) 
		{
		oBlock.cellPadding = arr["cellPadding"]
		oBlock.cellSpacing = arr["cellSpacing"]
		oBlock.border = arr["border"]
		oBlock.borderColor = arr["borderColor"]
		oBlock.background = arr["background"]
		oBlock.bgColor = arr["bgColor"]
		}
	}

