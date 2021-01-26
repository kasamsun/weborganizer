function MsngrContactsMR()
{
var DataTable = document.all.ListTable;
if (MsngrIsStateOnline(MsngrObj.GetLocalUserStatus()))
{
for (i=1; i<DataTable.rows.length; i++)
{
var E = DataTable.rows[i].cells[0].children[0].children[0].innerHTML;
if (MsngrIsStateOnline(MsngrObj.GetUserStatus(E)))
DataTable.rows[i].cells[1].innerHTML = MsngrGetContact(E,"AddressBookList");
}
}
}
function MsngrContactsPROMO()
{
//CA(1);  //Check Box Check
var DataTable = document.all.ListTable;
var HdrCell = DataTable.rows[1].insertCell();
HdrCell.style.border='none';
HdrCell.innerHTML = "<font class='sw'><b>&nbsp;<nobr>"+L_OnlineStatus_Text+"</nobr></b></font>"
var PromoCell = DataTable.rows[2].insertCell();
PromoCell.style.border='none';
PromoCell.style.paddingLeft='10px';
PromoCell.style.width=130;
PromoCell.bgColor="#FFFFFF";
PromoCell.rowSpan=DataTable.rows.length;
PromoCell.vAlign="top";
PromoCell.innerHTML="<br><font class='s'><a href='http://g.msn.com/1HM7EN/144??PS=??PS="+HMPS+"'>"+L_DloadMess_Text+"</a>"+L_DloadMessCont_Text+"</font>";
}
function MsngrInBox()
{
//CA(1); //Check Box Check
var DataTable;
if (MsngrIsStateOnline(MsngrObj.GetLocalUserStatus()))
{
DataTable = document.all.MsgTable;	
for (i=1; i<DataTable.rows.length; i++)
{
if (DataTable.rows[i].cells.length>=6)
{
var E = DataTable.rows[i].cells[0].name;
E = E.replace(/\s+/g,"");
if (MsngrIsStateOnline(MsngrObj.GetUserStatus(E)))
{
DataTable.rows[i].cells[2].innerHTML = '<table cellpadding=0 cellspacing=0 style="position:relative;"><tr><td nowrap style="border:none">'+DataTable.rows[i].cells[2].innerHTML+'</td><td width="100%"></td><td style="border:none">'+MsngrGetContact(E,"InBox");+'</td></tr></table>'
}
}
}
}
}

function MsngrReadMessage()
{
if (MsngrIsStateOnline(MsngrObj.GetLocalUserStatus()) && MsngrIsUser())
{
var strFromText = document.all.FromText.value.toLowerCase();
if (document.all.MsgHeaders.rows[1].cells[0].id == "From" && ValidateEmail(strFromText))
{
if ( (MsngrIsStateOnline(MsngrObj.GetUserStatus(strFromText))) && (strFromText != null))
{
var TheHtml = MsngrGetContact(strFromText,"ReadMessage");
MyTable = document.all.MsgHeaders;
MyRow = MyTable.insertRow();
MyRow.insertCell();
MyRow.cells[0].innerHTML=TheHtml;
}
else
{
MsngrAllowedDomain();
MsngrExemptList();
MsngrExemptListObj[LocalUserEmail.toLowerCase()] = 1
var results = strFromText.match(/(.+)@(.+)/);
if ((MsngrAllowedDomainObj[results[2]]) && (MsngrExemptListObj[strFromText]==null) && (MsngrObj.GetUserStatus(strFromText)==0))
{
var TheHtml = '<font class="s"><A HREF="'+ SaveAddLink +'">' + L_Add_Text + strFromText + '</a>' + L_ContactList_Text;
MyTable = document.all.MsgHeaders;
MyRow = MyTable.insertRow();
MyRow.insertCell();
MyRow.cells[0].innerHTML=TheHtml;
}
}
}
}
}
function MsngrAllowedDomain()
{
MsngrAllowedDomainObj = new Object();
MsngrAllowedDomainObj["hotmail.com"] = "1";
MsngrAllowedDomainObj["msn.com"] = "1";
}
function MsngrSaveAddresses()
{
var DataTAble;
if (MsngrIsStateOnline(MsngrObj.GetLocalUserStatus()))
{
DataTable = document.all.msngrdata;
for (i=1;i<DataTable.rows.length;i++)
{
var E = DataTable.rows[i].cells[0].children[0].rows[0].cells[2].id;
var from = DataTable.rows[i].cells[0].children[0].rows[0].cells[0].id;
if ( (MsngrObj.GetUserStatus(E) == 0) && (ValidateEmail(E)) && MsngrIsUser() )
{
E = MsngrHTMLencode(E);
MyRow = DataTable.rows[i].cells[0].children[0].insertRow(4);
MyRow.insertCell();
MyRow.cells[0].colSpan=4;
MyRow.cells[0].style.backgroundColor="#DBEAF5";
MyRow.cells[0].align = "center";
MyRow.cells[0].innerHTML = '<font class="s"><input type="checkbox" name="msngr'+E+'" value="'+E+'"'+from+' onClick="CheckCheckAll();"> '+L_Add_Text+E+L_MyMessList_Text+'</font>'+'';
}
}
}
}
function MsngrSaveAddressesSubmit()
{
if ("undefined" != typeof(MsngrObj) && document.domsgaddresses)
{	
if (MsngrIsStateOnline(MsngrObj.GetLocalUserStatus()))
{
for (var i=0;i<document.domsgaddresses.elements.length;i++)
{
var e = document.domsgaddresses.elements[i];
if ( (e.name != 'allbox') && (e.name.match(/msngr/)) && (e.checked) )
MsngrObj.AddContact(LocalUserEmail,e.value);
}
}
}
}
function MsngrEditContacts()
{
document.addr.alias.focus();
if ( (IsABmigrationComplete!="0") && (ContactType!="messenger") )
{
var DataTable = document.all.msngrdata;
var DataCell = DataTable.rows[5].cells[1];
DataCell.style.padding="0px";
DataCell.innerHTML="<input type='checkbox' name='msngr' value='' checked disabled> <font class='s' color='#c0c0c0'>"+L_UseWithMSNmessenger_Text+"</font>";
if (adfrm.addrim.value!="")
{
if (ValidateEmail(adfrm.addrim.value))
{
adfrm.msngr.disabled=false;
document.all.msngrdata.rows[5].cells[1].children[1].color="#000000";
}
}
document.addr.alias.focus();
}
}
function MsngrEditContactsSubmit()
{
if ( (IsABmigrationComplete!="0")  && (ContactType!="messenger") )
{
if ("undefined" != typeof(MsngrObj))
{
var DataTable = document.all.msngrdata;
if (MsngrIsStateOnline(MsngrObj.GetLocalUserStatus()))
{
if ( (document.addr.msngr.checked) && (document.addr.msngr.disabled==false) && (MsngrObj.GetUserStatus(document.addr.addrim.value) == 0) )
MsngrObj.AddContact(LocalUserEmail,document.addr.addrim.value);
}
}
}
}
function MsngrNotJunkMail()
{
var DataTAble;
if (MsngrIsStateOnline(MsngrObj.GetLocalUserStatus()) && MsngrIsUser() )
{
DataTable = document.all.msngrdata;
var E = DataTable.rows[0].cells[1].id;
if (MsngrObj.GetUserStatus(E) == 0)
{
MyRow = DataTable.insertRow(4);
MyRow.insertCell();
MyRow.cells[0].colSpan=4;
MyRow.cells[0].align = "left";
MyRow.cells[0].innerHTML = '<font class="s"><input type="checkbox" name="msngr'+E+'" value="'+E+'" tabindex=10 checked> '+L_Add_Text+E+L_MyMessList_Text+'</font>';
}
}
}
function MsngrNotJunkMailSubmit()
{
if ("undefined" != typeof(MsngrObj))
{	
if (MsngrIsStateOnline(MsngrObj.GetLocalUserStatus()))
{
for (var i=0;i<document.addtoaddressbook.elements.length;i++)
{
var e = document.addtoaddressbook.elements[i];
if ( (e.name != 'allbox') && (e.name.match(/msngr/)) && (e.checked) )
MsngrObj.AddContact(LocalUserEmail,e.value);
}
}
}
}
function MsngrHTMLencode(strToCode)
{
strToCode = strToCode.replace(/</g,"&lt;");
strToCode = strToCode.replace(/>/g,"&gt;");
strToCode = strToCode.replace(/"/g,"&quot;");
return strToCode;
}
function MsngrIsUser()
{
return MsngrObj.IsUser(LocalUserEmail);
}var alphaChars = "abcdefghijklmnopqrstuvwxyz";
var digitChars = "0123456789";
var asciiChars = alphaChars + digitChars + "!\"#$%&'()*+,-./:;<=>?@[\]^_`{}~";
var folderID = "";
ie = document.all?1:0
ns4 = document.layers?1:0
dodiv=0;
function CallPaneHelp(topic_id,topic_displaystr) {
if (topic_id.indexOf(".htm")<0) {
bSearch=true;
H_KEY=topic_id;
L_H_TEXT=topic_displaystr;
} else { 
bSearch=false;
H_TOPIC=topic_id;
}
DoHelp();
}




function CA(isOnload){
var trk=0;
for (var i=0;i<frm.elements.length;i++)
{
var e = frm.elements[i];
if ((e.name != 'allbox') && (e.type=='checkbox'))
{
if (isOnload != 1)
{
trk++;
e.checked = frm.allbox.checked;
if (frm.allbox.checked)
{
hL(e);
if ((folderID == "F000000005") && (ie) && (trk > 1))
frm.notbulkmail.disabled = true;
}
else
{
dL(e);
if ((folderID == "F000000005") && (ie))
frm.notbulkmail.disabled = false;
}
if (frm.nullbulkmail)
frm.nullbulkmail.disabled = frm.notbulkmail.disabled;
}
else
{
e.tabIndex = i;
if (folderID != "")
e.parentElement.parentElement.children[2].children[0].tabIndex = i;
if (e.checked)
{
hL(e);
}
else
{
dL(e);
}
}
}
}
}


function CCA(CB){
if (CB.checked)
hL(CB);
else
dL(CB);
var TB=TO=0;
for (var i=0;i<frm.elements.length;i++)
{
var e = frm.elements[i];
if ((e.name != 'allbox') && (e.type=='checkbox'))
{
TB++;
if (e.checked)
TO++;
}
}
if ((folderID == "F000000005") && (ie))
{
if (TO > 1)
document.all.notbulkmail.disabled = true;
else
document.all.notbulkmail.disabled = false;
if (document.all.nullbulkmail)
document.all.nullbulkmail.disabled = document.all.notbulkmail.disabled;
}
if (TO==TB)
frm.allbox.checked=true;
else
frm.allbox.checked=false;
}
function hL(E){
if (ie)
{
while (E.tagName!="TR")
{E=E.parentElement;}
}
else
{
while (E.tagName!="TR")
{E=E.parentNode;}
}
E.className = "H";
}
function dL(E){
if (ie)
{
while (E.tagName!="TR")
{E=E.parentElement;}
}
else
{
while (E.tagName!="TR")
{E=E.parentNode;}
}
E.className = "";
}
function doTabIndex(tbleColl)
{
if (tbleColl != null)
{
for (var z=0;z<tbleColl.length;z++)
{
if ((tbleColl.item(z).tagName=='A') || ((tbleColl.item(z).tagName=='INPUT') && (tbleColl.item(z).type!='hidden')) || (tbleColl.item(z).tagName=='SELECT'))
tbleColl.item(z).tabIndex=5;
}
}
}
function HMError(strEType,strError,strOther,strEN)
{
strError = unescape(strError).replace(/\+/g," ");
strError = strError.replace(/\\n/g,"\n");
switch(strEType)
{
case "A":
alert(strError);
break;
case "M":
if (ie)
DoModal(strOther,strEN);
else
DoFakeModal(strOther,strEN);
break;
case "C":
return(confirm(strError));
break;
}
}
function DoModal(strOther,strEN)
{
rv = window.showModalDialog("/cgi-bin/dasp/error_modalshell.asp?strEN="+strEN+"&r="+Math.round(Math.random()*1000000),"","dialogWidth:360px;dialogHeight:217px;help:0;scroll:0;status:0;");
if (rv.help)
CallPaneHelp(rv.help);
if (rv.url)
{
if (strOther=="attach")
DoSaveMSG();
else
location.href=rv.url;
}
}
