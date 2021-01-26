<? 
include("../include/connect.php"); 
include("../include/util.php");
check_authorize($g_user["level"],AUTHORIZE_WEBUSER);

if ( isset($doeditinfo) && $keyid>0 )
{
	$sql = "update weborg_user set ".
				"title='$title', ".
				"user_name='$user_name', ".
				"user_surname='$user_surname', ".
				"phone='$phone', ".
				"mobile='$mobile', ".
				"email='$email', ".
				"nickname='$nickname', ".
				"student_id='$student_id', ".
				"company_name='$company_name', ".
				"home_address='$home_address', ".
				"position='$position', ".
				"birthdate='".txt2date($birthdate)."', ".
				"dep_id='$dep_id' ".
				"where user_id=$keyid";
	$res = $db->query($sql);
	if  ( $db->affectedRows() ) 
		$showmsg = "ข้อมูลผู้ใช้งาน ได้ถูกบันทึกเรียบร้อยแล้ว";
	else
		$showmsg = "#eไม่สามารถบันทึกข้อมูลผู้ใช้งานได้";

	$mode = "result";
}

if ( isset($doeditpsw) && $keyid>0 )
{
	$sql = "update weborg_user set ".
				"password='$password' ".
				"where user_id=$keyid";
	$res = $db->query($sql);
	if  ( $db->affectedRows() ) 
		$showmsg = "รหัสผ่าน ได้ถูกบันทึกเรียบร้อยแล้ว";
	else
		$showmsg = "#eไม่สามารถบันทึกรหัสผ่านได้";

	$mode = "result";
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>NIDA : Web Organizer</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link href="/include/style.css" rel="stylesheet" type="text/css">
<script language=JavaScript src="/include/alert.js"></script>
<script language=JavaScript src="/include/valid.js"></script>
<script language="JavaScript">
<!--
function verifySubmit(obj) 
{
if( !requireField(new Array(obj.user_name),new Array('กรุณาใส่ชื่อผู้ใช้งาน'))) return false;
if ( obj.birthdate.value.length > 0 )
{ 
	if( !checkFormatDate(obj.birthdate,'วันที่ไม่ถูกต้อง'))return false; 
}
return true;
}	
//-->
</script>
<script>
function check_password()
{
var x = document.myform;
if ( x.password.value.length < 4 )
{ alert("กรุณาใส่รหัสผ่านไม่น้อยกว่า 4 ตัวอักษร"); x.password.focus();return false; }
if ( document.myform.password.value != x.confirmpassword.value )
{ alert("กรุณายืนยันรหัสผ่านให้ถูกต้อง"); x.confirmpassword.focus();return false; }
return true;
}
</script>
</head>

<body>
<? include("../include/top.php"); ?>
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0" background="../images/main_body.gif">
<tr>
<td width="184" valign="top">
<? include("../include/left.php"); ?></td>
<td width="590" valign="top">
      <?  include("../include/user.php"); ?>
	  <form name="myform" method="post" action="">
	    <table width="569" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td class="largetext" align="left">&nbsp;&nbsp;<img src="../images/ico_userinfo.gif" border="0" align="absmiddle"> แก้ไขข้อมูลส่วนตัว</td>
          </tr>
          <tr>
            <td height="36" background="../images/bg-fadeblue.gif">
<!-- Start inside display -->
<? 
if ( $mode != "result" ) 
{ 
	$keyid = $g_user["user_id"]; 
	$user_id = $g_user["user_id"];
?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr> 
<td height="36" colspan="2">
<input type="hidden" name="keyid" value="<?=$keyid?>">
<input type="hidden" name="ignoreurl" value="1">
<input name="backurl" type="hidden" value="<? if ( $saveurl==1 ) echo $g_user["lasturl"]; else echo $backurl; ?>"> 
<img src="/images/arrow_red.gif" width="16" height="16">
<input name="doeditinfo" type="submit" value="บันทึกข้อมูลส่วนตัว" onclick="return verifySubmit(document.myform);"> 
<img src="/images/arrow_red.gif" width="16" height="16">
<input name="cancel" type="reset" value="ยกเลิก"> 
<? if ( $g_user["lasturl"] != "" ) { ?>
<img src="/images/arrow_red.gif" width="16" height="16"><input name="goback" type="button" value="ย้อนกลับ" onclick="location.href='<?=$g_user["lasturl"]?>'"> 
<? } ?></td>
</tr>
</table>
<table width="570" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="5"><img src="/images/win_edge1.gif"></td>
    <th background="/images/win_bkhead.gif" class="text3">ข้อมูลผู้ใช้งาน</th>
    <td width="6"><img src="/images/win_edge2.gif"></td>
  </tr>
  <tr>
    <td background="/images/win_bkleft.gif">&nbsp;</td>
    <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <? 
if ( $user_id )
{
	$sql = "select * from weborg_user where user_id=$user_id";
	$res = $db->query($sql);
	$rs = $res->fetchRow(DB_FETCHMODE_OBJECT);
}
?>
      <tr>
        <td width="23%">&nbsp; <input type="hidden" name="user_id" value="<?=$user_id?>">
          คำนำหน้า-ชื่อ-นามสกุล</td>
        <td colspan="3"><input name="title" type="text" value="<?=$rs->title?>" size="10">
            <input name="user_name" type="text" value="<?=$rs->user_name?>" size="24"><span class="redtext">*</span>
            <input name="user_surname" type="text" value="<?=$rs->user_surname?>" size="24"></td>
      </tr>
      <tr>
        <td>&nbsp; ชื่อเล่น</td>
        <td><input name="nickname" type="text" value="<?=$rs->nickname?>" size="10"></td>
        <td>วันเกิด</td>
        <td><input name="birthdate" type="text" value="<?=date2txt($rs->birthdate)?>" size="10"></td>
      </tr>
      <tr>
        <td>&nbsp; รหัสประจำตัว</td>
        <td><input name="student_id" type="text" value="<?=$rs->student_id?>" size="24"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp; โทรศัพท์</td>
        <td width="32%"><input name="phone" type="text" value="<?=$rs->phone?>" size="24"></td>
        <td width="11%">มือถือ</td>
        <td width="34%"><input name="mobile" type="text" value="<?=$rs->mobile?>" size="24"></td>
      </tr>
      <tr>
        <td>&nbsp; บริษัท</td>
        <td><input name="company_name" type="text" value="<?=$rs->company_name?>" size="24"></td>
        <td>ตำแหน่ง</td>
        <td><input name="position" type="text" value="<?=$rs->position?>" size="24"></td>
      </tr>
      <tr>
        <td>&nbsp; ที่อยู่</td>
        <td colspan="3"><input name="home_address" type="text" value="<?=$rs->home_address?>" size="48"></td>
      </tr>
      <tr>
        <td>&nbsp; e-mail</td>
        <td><input name="email" type="text" value="<?=$rs->email?>" size="24"></td>
        <td>แผนก</td>
        <td><select name="dep_id">
            <option value="0" <? if ( !$rs->dep_id ) echo "selected"; ?>>- - - - -</option>
            <?
$sql = "select dep_id,dep_name from weborg_department order by dep_name";
$res2 = $db->query($sql);
if ( !DB::IsError($res2) ) {
while ( $rs2 = $res2->fetchRow(DB_FETCHMODE_OBJECT) )  {
?>
            <option value="<?=$rs2->dep_id?>" <? if  ($rs2->dep_id == $rs->dep_id ) echo "selected"; ?>>
            <?=$rs2->dep_name?>
            </option>
            <? }  } $res2->free(); ?>
        </select></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
    <td background="/images/win_bkright.gif">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="/images/win_edge3.gif"></td>
    <td background="/images/win_bkbottom.gif"></td>
    <td><img src="/images/win_edge4.gif"></td>
  </tr>
</table><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="36" colspan="2" background="../images/bg-fadeblue.gif">
      <img src="/images/arrow_red.gif" width="16" height="16">
      <input name="doeditpsw" type="submit" value="บันทึกรหัสผ่าน" onclick="return check_password()">
      <img src="/images/arrow_red.gif" width="16" height="16">
      <input name="cancel" type="reset" value="ยกเลิก">
      <? if ( $g_user["lasturl"] != "" ) { ?>
      <img src="/images/arrow_red.gif" width="16" height="16">
      <input name="goback" type="button" value="ย้อนกลับ" onclick="location.href='<?=$g_user["lasturl"]?>'">
      <? } ?></td>
  </tr>
</table>
<table width="570" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="5"><img src="/images/win_edge1.gif"></td>
    <th background="/images/win_bkhead.gif" class="text3">รหัสผ่าน</th>
    <td width="6"><img src="/images/win_edge2.gif"></td>
  </tr>
  <tr>
    <td background="/images/win_bkleft.gif">&nbsp;</td>
    <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <? 
if ( $user_id )
{
	$sql = "select * from weborg_user where user_id=$user_id";
	$res = $db->query($sql);
	$rs = $res->fetchRow(DB_FETCHMODE_OBJECT);
}
?>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td width="20%">&nbsp;รหัสผ่านใหม่</td>
        <td colspan="2">
          <input name="password" type="password" value="" size="24">
                        </td>
      </tr>
      <tr>
        <td>&nbsp;ยืนยันรหัสผ่าน</td>
        <td colspan="2"><input name="confirmpassword" type="password" value="" size="24">
                        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr bgcolor="#D9E7EE">
        <td height="24" colspan="3">&nbsp;<img src="../images/ico_smallinfo.gif"> กลุ่มที่เป็นสมาชิก </td>
      </tr>
      <?
$sql = "select group_name,group_position from weborg_group ".
			" left join weborg_group_assign on weborg_group_assign.group_id = weborg_group.group_id ".
			" where user_id = ".$rs->user_id." order by group_position desc";
$resgp = $db->query($sql);
while ( $rsgp = $resgp->fetchRow(DB_FETCHMODE_OBJECT) )
{
?>
      <tr>
        <td>&nbsp;</td>
        <td width="34%"><?=$rsgp->group_name?></td>
        <td width="46%"><?=$group_position_name[$rsgp->group_position]?></td>
      </tr>
      <? } $resgp->free(); ?>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
    </table></td>
    <td background="/images/win_bkright.gif">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="/images/win_edge3.gif"></td>
    <td background="/images/win_bkbottom.gif"></td>
    <td><img src="/images/win_edge4.gif"></td>
  </tr>
</table><? } else { ?>
<br>
<br>
<br>
<? include("../include/popupmsg.php"); ?>
<br>
<br>
<br>
<? } ?>
<input type="hidden" name="keeppost" value="1">
<input type="hidden" name="mode" value="<?=$mode?>">
<!-- End inside display --></td>
          </tr>
          <tr>
            <td background="/images/win_bkbottom.gif"></td>
          </tr>
        </table>
	    <br>
    </form>    
    <div align="center">      </div></td>
    <td width="10" background="/images/rim1.gif">&nbsp;</td>
  </tr>
</table>
<? include("../include/bottom.php"); ?>
<? if ( $mode != "result" ) { ?>
<script>document.myform.title.focus();</script>
<? } else { ?>
<? } ?>
</body>
</html>
<? include("../include/disconnect.php"); ?>