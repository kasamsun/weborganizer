<? 
include("../include/connect.php"); 
//include("../include/util.php");
//include("../include/page_ctrl.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<!--link href="/include/style2.css" rel="stylesheet" type="text/css"-->
</head>
<body>

<table width="100%"  border="1" cellpadding="5" cellspacing="0" >
<tr  bgcolor="#FF0099">

<td bgcolor="#FFFF33"width="40%" height="41">
id
</td>
<td width="60%">
Name
</td>

</tr>
<? 
	$sql = "select * from weborg_user";
	$res = $db->query($sql);
	$linecount = 0;
	if ( !DB::IsError($res) )
	{
		while ( $rs = $res->fetchRow(DB_FETCHMODE_OBJECT) ) 
		 
		{
			echo "<tr>";
			echo "<td>";
			echo $rs->user_id;
			echo "</td>";
			echo "<td>";
			echo $rs->user_name; 
			echo "</td>";
			echo "</tr>";
			$linecount++;
		}
	$res->free();
	}
	
?>
</table>

</body>
</html>
<? include("../include/disconnect.php"); ?>



