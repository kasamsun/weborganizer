<? 
include("../include/connect.php"); 
include("../include/util.php");
include("../include/page_ctrl.php");

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>NIDA : Web Organizer</title>
<link href="/include/style2.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
</head>

<body>
<?
$sql="select user_id, user_name, user_surname,email, company_name from weborg_user where user_id=$user_id";
$res=$db->query($sql);
if (!DB::IsError($res))
{
	 $rs=$res->fetchRow(DB_FETCHMODE_OBJECT);
?>

<table width="75%" border="1" cellspacing="1" cellpadding="1">
  <tr> 
    <td colspan="3">ข้อมูลของคุณ  <b><?=$rs->user_name?></b>&nbsp;</td>
  </tr>
  <tr> 
    <td width="22%">รหัส :&nbsp;</td>
    <td width="78%"><b><?=$rs->user_id?></b>&nbsp;</td>
  </tr>
  <tr> 
    <td>ชื่อ :&nbsp;</td>
    <td><b><?=$rs->user_name?></b>&nbsp;</td>
  </tr>
  <tr> 
    <td>นามสกุล :&nbsp;</td>
    <td><b><?=$rs->user_surname?></b>&nbsp;</td>
  </tr>
  <tr> 
    <td>บริษัท :&nbsp;</td>
    <td><b><?=$rs->company_name?></b>&nbsp;</td>
  </tr>
  <tr> 
    <td>e-mail :&nbsp;</td>
    <td><a href="mailto: <?=$rs->email?>"><b><?=$rs->email?></b></a>&nbsp;</td>
  </tr>
</table>
<?
$res->free();
}
?>

</body>
</html>
<? include("../include/disconnect.php"); ?>
