<? 
include("../include/connect.php"); 
include("../include/util.php");
include("../include/page_ctrl.php");

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>NIDA : Web Organizer</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link href="/include/style2.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="58%" border="1" cellspacing="1" cellpadding="2">

 <tr> 
    <td colspan="3"><div align="center"><b>รายชื่อสมาชิก&nbsp;</b></div></td>
  </tr>
     <tr> 
  <td width="26%"> <b>รหัส:</b>&nbsp;</td>
    <td width="32%"><b>ชื่อ:</b>&nbsp;    </td>
    <td width="42%"> <b>นามสกุล: </b>&nbsp;</td>
   </tr>

<?
$sql="select  user_name, user_surname, user_id from weborg_user order by user_id";
$res =$db->query($sql);
$linecount = 0;
if ( !DB::IsError($res) )
{
	while ( $rs = $res->fetchRow(DB_FETCHMODE_OBJECT) ) 
	{
		$linecount++;
		
 ?>
 

  <tr> 
  <td><a href="tao2.php?user_id=<?=$rs->user_id?>"><b><?=$rs->user_id?></b></a>&nbsp;</td>
    <td><b><?=$rs->user_name?>&nbsp;</b>    </td>    
	<td><b><?=$rs->user_surname?></b>&nbsp;</td>
    
  </tr>


   <?	 }
$res->free();
}
?>
</table>
</body>
</html>
<? include("../include/disconnect.php"); ?>