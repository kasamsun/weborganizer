<?
include("../include/connect.php"); 
include("../include/util.php");
check_authorize($g_user["level"],AUTHORIZE_WEBUSER);

?>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link href="/include/style.css" rel="stylesheet" type="text/css">
</head>
<script>
function trim(inputString) {
   // Removes leading and trailing spaces from the passed string. Also removes
   // consecutive spaces and replaces it with one space. If something besides
   // a string is passed in (null, custom object, etc.) then return the input.
   if (typeof inputString != "string") { return inputString; }
   var retValue = inputString;
   var ch = retValue.substring(0, 1);
   while (ch == " ") { // Check for spaces at the beginning of the string
      retValue = retValue.substring(1, retValue.length);
      ch = retValue.substring(0, 1);
   }
   ch = retValue.substring(retValue.length-1, retValue.length);
   while (ch == " ") { // Check for spaces at the end of the string
      retValue = retValue.substring(0, retValue.length-1);
      ch = retValue.substring(retValue.length-1, retValue.length);
   }
   while (retValue.indexOf("  ") != -1) { // Note that there are two spaces in the string - look for multiple spaces within the string
      retValue = retValue.substring(0, retValue.indexOf("  ")) + retValue.substring(retValue.indexOf("  ")+1, retValue.length); // Again, there are two spaces in each of the strings
   }
   return retValue; // Return the trimmed string back to the user
}

function AddMemberToList(target)
{
	// get all selected number
	var retval="";
	var retval2="";
	for ( controlindex=0; controlindex<document.myform.length; controlindex++ )
	{
		element = document.myform[controlindex];
		if ( element.name.substr(0,5)  == "item_" )
		{
			if ( element.checked == true && trim(element.value) != "" )
			{
				var num = element.name.substr(5);
				if ( retval == "" )
				{
					retval = document.myform["user_id_"+num].value;
					retval2 = document.myform["user_name_"+num].value;
				}
				else
				{
					retval += ";"+document.myform["user_id_"+num].value;
					retval2 += ";"+document.myform["user_name_"+num].value;
				}
			}
		}
	}
	window.opener.document.myform["sel_dep_id"].value = "";
	window.opener.document.myform["sel_group_id"].value = "";
	window.opener.document.myform["sel_user_id"].value = "";
	window.opener.document.myform["multi_sendto"].value = retval;
	window.opener.document.myform["multi_sendtoname"].value = retval2;
	window.close();
}
</script>
<body>
<table bgcolor="#D9E7EE" width="100%">
<tr><td>
<form name="myform" action="" method="post">เลือกรายชื่อ <input type="button" value=" เลือก " onclick="AddMemberToList('<?=$target?>')"> <input type="button" value=" ปิด " onclick="window.close()">
<?
if ( $sel_dep_id > 0 ) 
	$sql = "select user_id,title,user_name,user_surname ".
		" from weborg_user where dep_id=$sel_dep_id order by user_name,user_surname";
else if ( $sel_group_id > 0 )
	$sql = "select weborg_user.user_id,title,user_name,user_surname ".
		" from weborg_user inner join weborg_group_assign on weborg_group_assign.user_id=weborg_user.user_id ".
		" where weborg_group_assign.group_id=$sel_group_id order by user_name,user_surname";
else
	$sql = "select user_id,title,user_name,user_surname ".
		" from weborg_user order by user_name,user_surname";

$res2 = $db->query($sql);
$line = 0;
while ( $rs2 = $res2->fetchRow(DB_FETCHMODE_OBJECT) )
{
	$line++; 
	echo "\n<br><input type='checkbox' name='item_$line' value=1>".
	"<input type='hidden' name='user_id_$line' value='".$rs2->user_id."'>".
	"<input type='hidden' name='user_name_$line' value='".$rs2->title." ".$rs2->user_name." ".$rs2->user_surname."'>".
	"<img src='/images/ico_profile.gif'> ".$rs2->title." ".$rs2->user_name." ".$rs2->user_surname." ";
}
$res2->free();
?>
<br>
<input name="button" type="button" onclick="AddMemberToList('<?=$target?>')" value=" เลือก ">
<input name="button2" type="button" onclick="window.close()" value=" ปิด ">
</form>
</td></tr></table>
</body>
</html>