<? 
include("../include/connect.php"); 
include("../include/util.php");
include("../include/page_ctrl.php");
check_authorize($g_user["level"],AUTHORIZE_WEBUSER);


if ($message )
{
	$id = $db->nextId('weborg_msg');
	$sql = "insert into weborg_msg(msg_id, msg_date, msg_time,user_id,dep_id,group_id,msg_detail) ".
				"values ('$id','".curdate()."' ,'".date("His")."' , '".$g_user["user_id"]."','$sel_dep_id','$sel_group_id' , '$message')";
	$db->query($sql); 
	
}


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>NIDA : Web Organizer</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link href="/include/style.css" rel="stylesheet" type="text/css">
<script language=JavaScript src="../include/table.js"></script>

</head>

<body>
<? include("../include/top.php"); ?>
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0" background="../images/main_body.gif">
<tr>
<td width="184" valign="top">
<? include("../include/left.php"); ?></td>
<td valign="top">
	  <form name="myform" method="post" action="">
		
	    <table width="570" border="0" align="center" cellpadding="0" cellspacing="0">
		
          <tr>
            <td width="5"><img src="/images/win_edge1.gif"></td>
            <th background="/images/win_bkhead.gif" class="text3">Chat</th>
            <td width="6"><img src="/images/win_edge2.gif"></td>
          </tr>
          <tr>
            <td background="/images/win_bkleft.gif">&nbsp;</td>
            <td>
           <input type="text" name="message" size="25"> <input type="submit" name="send" value="send" > 
              <input type="reset" name="clear" value="clear">
              แผนก 
              <select name="sel_dep_id" onchange="document.myform.sel_group_id.value=''">
                <option value="">- - - - -</option>
                <?
				
$sql = "select dep_id,dep_name from weborg_department order by dep_name";
$res2 = $db->query($sql);
if ( !DB::IsError($res2) ) {
while ( $rs2 = $res2->fetchRow(DB_FETCHMODE_OBJECT) )  {
?>
                <option value="<?=$rs2->dep_id?>" <? if  ($rs2->dep_id == $sel_dep_id ) echo "selected"; ?>> 
                <?=$rs2->dep_name?>
                </option>
                <? }  } $res2->free(); ?>
              </select>
               กลุ่ม 
              <select name="sel_group_id" onchange="document.myform.sel_dep_id.value=''">
<option value="">- - - - - </option>
<?
$sql = "select weborg_group.group_id,group_name from weborg_group ";
$res = $db->query($sql);
if ( !DB::IsError($res) ) {
	while ( $rs = $res->fetchRow(DB_FETCHMODE_OBJECT) ) {
?>
<option value="<?=$rs->group_id?>" <? if  ($rs->group_id == $sel_group_id ) echo "selected"; ?>>
<?=$rs->group_name?>
</option>
<? } $res->free();  }   ?>
</select> 
              <br>
			  			 <iframe src="message.php" width=550 height=400 frameborder="3"></iframe>
            </td>
            <td background="/images/win_bkright.gif">&nbsp;</td>
          </tr>
          <tr>
            <td><img src="/images/win_edge3.gif"></td>
            <td background="/images/win_bkbottom.gif"></td>
            <td><img src="/images/win_edge4.gif"></td>
          </tr>
        </table>
	  </form>    </td>
  </tr>
</table>
<? include("../include/bottom.php"); ?>
<script>document.myform.message.focus();</script>
</body>
</html>
<? include("../include/disconnect.php"); ?>