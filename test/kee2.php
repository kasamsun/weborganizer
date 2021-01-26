<? 
include("../include/connect.php"); 
include("../include/util.php");
include("../include/page_ctrl.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>

<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link href="/include/style2.css" rel="stylesheet" type="text/css"></head>

<body>
<? 
	$sql = "select user_name ,user_id ,user_surname, mobile , email , company_name from weborg_user where user_id=$user_id";
	
	$res = $db->query($sql);
	if ( !DB::IsError($res) )
	{
		$rs = $res->fetchRow(DB_FETCHMODE_OBJECT) 
?>
<table border="1" align="center" cellpadding="2" cellspacing="2">
<tr>
<td> Detail </td>
<td> yyyyy
</td>
</tr>

<tr>
  <td>name</td>
  <td><?=$rs->user_name?></td>
</tr>
<tr>
  <td>id</td>
  <td><?=$rs->user_id?></td>
</tr>
<tr>
  <td height="16">mail</td>
  <td><?=$rs->email?></td>
</tr>
<tr>
  <td>mobile</td>
  <td><?=$rs->mobile?></td>
</tr>
<tr>
  <td>surename</td>
  <td><?=$rs->user_surname?></td>
</tr>
<tr>
<td>company</td>
<td><?=$rs->company_name?> </td>
</tr>
</table>
<?   
		$res->free();
	} 


?>

</body>
</html>

<? include("../include/disconnect.php"); ?>