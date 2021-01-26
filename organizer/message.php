<?
$ignoreurl = 1;
include("../include/connect.php");
include("../include/util.php");



function putchatimage($uid,$txt)
{
	$sss = " width=20 height=25 ";
	$fname = "../data/pic/$uid.jpg";
	if ( file_exists($fname) )
	{
		return "<img src=\"".$fname."\" border=\"1\" $sss style=\"border-color:#CCCCCC\" align=\"absmiddle\"".
			" onmouseover=\"return overlib('$txt',CAPTION,' ',CAPICON,'$fname',WIDTH,120,OFFSETY,10);\"".
			" onmouseout=\"return nd();\">";
	}
	else
		return "<img src=\"/data/pic/nopic.gif\" border=\"1\" $sss style=\"border-color:#CCCCCC\" align=\"absmiddle\">";
}
?>
<html>
<head>
<title>Un title page</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<meta http-equiv="refresh" content="1500">

<link rel="stylesheet" href="/include/style2.css" type="text/css">
<script language="JavaScript" type="text/JavaScript" src="/include/overlib_mini.js"></script>

</head>

<body>
<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="white" width="500"><font size="1"> 
      <?
$sql = "select a.*,b.nickname ".
			" from weborg_msg a left join weborg_user  b on a.user_id = b.user_id ".
			" where (a.group_id = 0 and a.dep_id = 0) or (a.dep_id = ".$g_user["dep_id"].")  or (a.user_id = ".$g_user["user_id"].")".
			" or (a.group_id in (select group_id from weborg_group_assign where weborg_group_assign.user_id = ".$g_user["user_id"]."))".
			
	   
			" order by msg_date DESC ,msg_time DESC".
			" limit 0,1000";
$res = $db->query($sql);
if ( !DB::IsError($res) )
{
	while ( $rs = $res->fetchRow(DB_FETCHMODE_OBJECT) ) 
	{
?>
  <?=putchatimage($rs->user_id, $rs->msg_detail)?>
 <? if ( $g_user["user_id"]  == $rs->user_id) { ?>
	<span class="chattext1"><?=$rs->msg_detail ?>  </span>  from <?=$rs->nickname ?>  <?= substr( $rs->msg_date,6,2)?>-<?= substr( $rs->msg_date,4,2)?>-<?= substr( $rs->msg_date,0,4)?>  <?=substr($rs->msg_time,0,2)?>:<?=substr($rs->msg_time,2,2)?>:<?=substr($rs->msg_time,4,2)?>
      <br>
	 
 <? } else  { ?>
  	<span class="chattext2"><?=$rs->msg_detail ?> </span> from <?=$rs->nickname ?>  <?= substr( $rs->msg_date,6,2)?>-<?= substr( $rs->msg_date,4,2)?>-<?= substr( $rs->msg_date,0,4)?>  <?=substr($rs->msg_time,0,2)?>:<?=substr($rs->msg_time,2,2)?>:<?=substr($rs->msg_time,4,2)?>
      <br>
<? } ?>	
      <?
	}
	$res->free();
}
else
{
	echo "[ $sql ]<br>";
}
?>
      </font></td>
    <td width="80" valign="top" bgcolor="white"> 
      <div align="center">
        <form name="myform" method="post" action="">
          <input type="button" name="refresh" value="refresh" onClick="window.location.reload()">
 		<input type="hidden" name="refreshrate" value="<?=$user_var["message_refreshrate"]?>">
       </form>
        
      </div>
    </td>
  </tr>
</table>
</body>
</html>

