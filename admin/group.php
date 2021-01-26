<? 
include("../include/connect.php"); 
include("../include/util.php");
include("../include/page_ctrl.php");
check_authorize($g_user["level"],AUTHORIZE_WEBADMIN);

if ( isset($dosearch) )
{
	$page = 1;
}

if ( isset($doadd) )
{
	$id = $db->nextId('weborg_group');
	$sql = "insert into weborg_group(group_id,group_name) ".
				"values ('$id','$group_name')";
	$db->query($sql); 
	if ( $db->affectedRows() ) 
		$showmsg = "ข้อมูลกลุ่มผู้ใช้งาน '".$group_name."' ได้ถูกเพิ่มเข้าระบบเรียบร้อยแล้ว";
	else
		$showmsg = "#eไม่สามารถเพิ่มข้อมูลกลุ่มผู้ใช้งานได้";

	$mode = "result";
}

if ( isset($doedit) && $keyid>0 )
{
	$sql = "update weborg_group set ".
				"group_id='$group_id', ".
				"group_name='$group_name' ".
				"where group_id=$keyid";
	$db->query($sql);
	if  ( $db->affectedRows() ) 
		$showmsg = "ข้อมูลกลุ่มผู้ใช้งาน ".$group_name." ได้ถูกบันทึกเรียบร้อยแล้ว";
	else
		$showmsg = "#eไม่สามารถบันทึกข้อมูลกลุ่มผู้ใช้งานได้";

	$mode = "result";
}

if ( isset($deleteitem) )
{
	$countdelete = 0;
	if ( is_array($checkitem) ) {
		foreach ( $checkitem as $request_id )
		{
				// del record
				$sql = "delete from weborg_group where group_id = $request_id";
				$res = $db->query ($sql);
				if ( $db->affectedRows() ) 
					$countdelete++;
		}
		if ( $countdelete > 0 )
			$showmsg = "ข้อมูลกลุ่มผู้ใช้งาน ".$countdelete." รายการ ถูกลบเรียบร้อยแล้ว";
	}
}

if ( isset($dodelgroupassign) )
{
	$countdelete = 0;
	if ( is_array($checkitem) ) {
		foreach ( $checkitem as $request_id )
		{
				// del record
				$sql = "delete from weborg_group_assign where group_assign_id = $request_id";
				echo $sql;
				$db->query ($sql);
				if ( $db->affectedRows() ) 
					$countdelete++;
		}
		if ( $countdelete > 0 )
			$showmsg = "ข้อมูลการเป็นสมาชิก ".$countdelete." รายการ ถูกลบเรียบร้อยแล้ว";
	}
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
<script language=JavaScript src="/include/alert.js"></script>
<script language="JavaScript">
<!--
function verifySubmit(obj) 
{
if( !requireField(new Array(obj.group_name),new Array('กรุณาใส่ชื่อกลุ่มผู้ใช้งาน'))) return false;
return true;
}	
//-->
</script>
</head>

<body>
<? include("../include/top.php"); ?>
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0" background="../images/main_body.gif">
<tr>
<td width="184" valign="top">&nbsp;
<? include("../include/left.php"); ?></td>
<td width="590" valign="top">
      <?  include("../include/user.php"); ?>
	  <form name="myform" method="post" action="">
	    <table width="569" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="36">
<!-- Start inside display -->
<? 
if ( $mode == "add" or $mode == "edit" ) 
{ 
	$keyid = $group_id; 
?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr> 
<td height="36" colspan="2">
<input type="hidden" name="keyid" value="<?=$keyid?>">
<input type="hidden" name="ignoreurl" value="1">
<input name="backurl" type="hidden" value="<? if ( $saveurl==1 ) echo $g_user["lasturl"]; else echo $backurl; ?>">
&nbsp;&nbsp;&nbsp;<img src="/images/ico_admindata.gif" align="absmiddle"> <span class="largetext"> กลุ่มผู้ใช้งาน</span>
<? if  ( !$keyid ) { ?><img src="/images/arrow_red.gif" width="16" height="16">
<input name="doadd" type="submit" value="เพิ่ม" onclick="return verifySubmit(document.myform);"> 
<? } else { ?>
<img src="/images/arrow_red.gif" width="16" height="16"><input name="doedit" type="submit" value="แก้ไข" onclick="return verifySubmit(document.myform);"> 
<? } ?>
<img src="/images/arrow_red.gif" width="16" height="16"><input name="cancel" type="reset" value="ยกเลิก"> 
<? if ( $g_user["lasturl"] != "" ) { ?>
<img src="/images/arrow_red.gif" width="16" height="16"><input name="goback" type="button" value="ย้อนกลับ" onclick="location.href='<?=$g_user["lasturl"]?>'"> 
<? } ?></td>
</tr>
</table>
<table width="570" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="5"><img src="/images/win_edge1.gif"></td>
    <th background="/images/win_bkhead.gif" class="text3">ข้อมูลกลุ่มผู้ใช้งาน</th>
    <td width="6"><img src="/images/win_edge2.gif"></td>
  </tr>
  <tr>
    <td background="/images/win_bkleft.gif">&nbsp;</td>
    <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <? 
if ( $group_id )
{
	$sql = "select * from weborg_group where group_id=$group_id";
	$res = $db->query($sql);
	$rs = $res->fetchRow(DB_FETCHMODE_OBJECT);
}
?>
      <tr>
        <td width="17%">&nbsp;ชื่อกลุ่ม
          <input type="hidden" name="group_id" value="<?=$group_id?>"></td>
        <td width="49%"><input name="group_name" type="text" size="40" value="<?=$rs->group_name?>"></td>
        <td width="13%">&nbsp;</td>
        <td width="21%">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <? if ( $group_id ) { ?>
<tr>
  <td height="4" colspan="4"><img src="/images/seperator2.gif"></td>
</tr>
      <tr>
        <td height="36" colspan="4">&nbsp;รายชื่อสมาชิกในกลุ่ม<img src="/images/arrow_red.gif" width="16" height="16">
            <input name="dodelgroupassign" type="submit" value="ลบสมาชิก"></td>
      </tr>
      <tr>
        <td colspan="4"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr bgcolor="#D9E7EE">
              <td width="5%">&nbsp;
                  <input title="Select or de-select all messages" onClick=CA();  tabindex=105 type=checkbox name=allbox2>              </td>
              <td width="10%">
                <div align="center"><b> ลำดับ </b></div></td>
              <td width="38%" bgcolor="#D9E7EE">
                <div align="center"><b> ชื่อ-นามสกุล </b></div></td>
              <td width="42%">
                <div align="center"><b> ตำแหน่งในกลุ่ม</b></div></td>
              <td width="5%">&nbsp;</td>
            </tr>
            <?
$sql = "select group_assign_id,weborg_user.user_id,user_name,user_surname,group_position ".
			" from weborg_user left join weborg_group_assign on weborg_user.user_id=weborg_group_assign.user_id ".
			" where group_id=$group_id order by group_position desc,user_name,user_surname";
$res2 = $db->query($sql);
$linecount = 0;
if ( !DB::IsError($res2) )
{
	while ( $rs2 = $res2->fetchRow(DB_FETCHMODE_OBJECT) ) 
	{
		$linecount++;
?>
            <tr>
              <td>&nbsp; <a href="/admin/user.php?mode=edit&user_id=<?=$rs2->user_id?>">
                <input onClick=CCA(this);  type="checkbox" name="checkitem[]" value="<?=$rs2->group_assign_id?>">
              </a> </td>
              <td><div align="center">
                  <?=$linecount?>
              </div></td>
              <td><a href="/admin/user.php?mode=edit&user_id=<?=$rs2->user_id?>&saveurl=1">&nbsp;
                    <?=$rs2->user_name." ".$rs2->user_surname?>
              </a></td>
              <td><a href="/admin/user.php?mode=edit&user_id=<?=$rs2->user_id?>&saveurl=1">&nbsp;
                    <?=$group_position_name[$rs2->group_position]?>
              </a></td>
              <td>&nbsp; <a title="Edit" href="/admin/user.php?mode=edit&user_id=<?=$rs2->user_id?>&saveurl=1"><img src="/images/icon_edit.gif" border=0></a> </td>
            </tr>
<tr>
  <td height="2" colspan="5"><img src="/images/seperator2.gif"></td>
</tr>
<?
	}
	$res2->free();
}
?>
        </table></td>
      </tr>
      <? }  // end if $group_id ?>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
      <!-- Start inside display -->      </td>
    <td background="/images/win_bkright.gif">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="/images/win_edge3.gif"></td>
    <td background="/images/win_bkbottom.gif"></td>
    <td><img src="/images/win_edge4.gif"></td>
  </tr>
</table><? } else if ( $mode != "result" ) { ?>
<script language=javascript>
var frm = document.myform;

function numChecked()
{
j=0;
for(i=0;i< frm.length;i++)
{
e=frm.elements[i];
if (e.type=='checkbox' && e.name != 'allbox' && e.checked)
j++;		
}
return j;
}
function slct1st()
{
j=0;
for(i=0;i< frm.length;i++)
{
e=frm.elements[i];
if (e.type=='checkbox' && e.name != 'allbox' && e.checked)
if(j==1) e.checked=false;
else j=1;
}
return j;
}
function Subm(act,first,dosub)
{
num = ((first) ? slct1st(frm) : numChecked(frm));
if (num>0)
{
if ( confirm("ต้องการลบข้อมูลหรือไม่?") ) {
	if (dosub)
		frm.submit();
return true;
}
return false
}
else
HMError("A"," กรุณาเลือกข้อมูลที่ต้องการก่อน","","");
return false;
}
</script>
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="36" colspan="6">
&nbsp;&nbsp;&nbsp;<img src="/images/ico_admindata.gif" align="absmiddle"> <span class="largetext"> กลุ่มผู้ใช้งาน</span> <img src="/images/arrow_red.gif" width="16" height="16">
<input type="button" name="addnew" value="เพิ่มกลุ่ม" onClick="location.href='<?=$PHP_SELF?>?mode=add&saveurl=1'">
<img src="/images/arrow_red.gif" width="16" height="16">
<input onClick="return Subm('delete',0,0);" name="deleteitem" type="submit"  value=" ลบ ">
                      <? if ( isset($showmsg) ) { ?>
                      <img src="/images/arrow_red.gif" width="16" height="16">
                      <?=$showmsg?>
                  <? } ?>                  </td>
                </tr>
              </table>
<?
// start get database
	if ( !isset($mode) ) $mode = "browse";
	$page_param = "mode=$mode";
	$sql = "select group_id,group_name from weborg_group ";
	$page_ctrl = new PageControl;
	if ( !isset($orderby) ) $orderby = "group_name";
	if ( !isset($page) ) $page = 1;
	if ( !isset($sorttype) ) $sorttype = 1;
	$page_ctrl->page_init($sql,$page_param,$orderby,$page,$sorttype,$row_per_page);
?> <table width="570" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="12"><img src="/images/win_edge1.gif"></td>
    <td width="34" background="/images/win_bkhead.gif">&nbsp;
        <input title="Select or de-select all messages" onClick=CA();  tabindex=105 type=checkbox name=allbox>
    </td>
    <td width="84" background="/images/win_bkhead.gif">
      <div align="center"><b>
        <? $page_ctrl->page_column("group_id","ID"); ?>
    </b></div></td>
    <td width="298" background="/images/win_bkhead.gif">
      <div align="center"><b>
        <? $page_ctrl->page_column("group_name","ชื่อกลุ่ม"); ?>
    </b></div></td>
    <td width="71" background="/images/win_bkhead.gif">&nbsp;</td>
    <td width="56" background="/images/win_bkhead.gif">&nbsp;</td>
    <td width="15"><img src="/images/win_edge2.gif"></td>
  </tr>
<?
$res = $page_ctrl->query();
$linecount = 0;
if ( !DB::IsError($res) )
{
	while ( $rs = $res->fetchRow(DB_FETCHMODE_OBJECT) ) 
	{
		$linecount++;
?>
  <tr>
    <td background="/images/win_bkleft.gif">&nbsp;</td>
    <td>&nbsp;
        <input onClick=CCA(this);  type="checkbox" name="checkitem[]" value="<?=$rs->group_id?>">
    </td>
    <td><div align="center">
        <?=$rs->group_id?>
    </div></td>
    <td><a href="<?=$PHP_SELF?>?mode=edit&group_id=<?=$rs->group_id?>&saveurl=1">&nbsp;
          <?=$rs->group_name?>
    </a></td>
    <td>&nbsp;</td>
    <td>&nbsp; <a title="Edit" href="<?=$PHP_SELF?>?mode=edit&group_id=<?=$rs->group_id?>&saveurl=1"><img src="/images/icon_edit.gif" border=0></a> </td>
    <td background="/images/win_bkright.gif">&nbsp;</td>
  </tr>
<tr>
  <td background="/images/win_bkleft.gif"></td>
  <td colspan="5" height="2"><img src="/images/seperator2.gif"></td>
  <td background="/images/win_bkright.gif"></td>
</tr>
<?
	}
	$res->free();
}
?>
  <tr>
    <td><img src="/images/win_edge3.gif"></td>
    <td colspan="5" background="/images/win_bkbottom.gif"></td>
    <td><img src="/images/win_edge4.gif"></td>
  </tr>
</table>

<div align="center">
  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="31%"><div align="right"><?=$page_ctrl->num_rows." Record(s) - Page ".$page_ctrl->page." of ".$page_ctrl->num_pages." &nbsp;&nbsp;";?>
        </div></td>
      <td width="69%"><div align="center"><? $page_ctrl->page_navigator(); ?></div></td>
    </tr>
  </table>
</div>
<? } else { ?>
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
<input type="hidden" name="orderby" value="<?=$orderby?>">
<input type="hidden" name="sorttype" value="<?=$sorttype?>">
<input type="hidden" name="page" value="<?=$page?>">
<!-- End inside display --></td>
          </tr>
          <tr>
            <td background="/images/bg-bottom.gif"></td>
          </tr>
        </table>
	    <br>
    </form>    
    <div align="center">      </div></td>
    <td width="10" background="/images/rim1.gif">&nbsp;</td>
  </tr>
</table>
<? include("../include/bottom.php"); ?>
<? if ( $mode == "add" or $mode == "edit" ) { ?>
<script>document.myform.group_name.focus();</script>
<? } else if ( $mode != "result" ) { ?>

<? } else { ?>
<? } ?>
</body>
</html>
<? include("../include/disconnect.php"); ?>