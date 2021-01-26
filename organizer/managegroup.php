<? 
include("../include/connect.php"); 
include("../include/util.php");
include("../include/page_ctrl.php");
check_authorize($g_user["level"],AUTHORIZE_WEBUSER);

if ( !isset($orderby) ) $orderby = "login";
if ( !isset($page) ) $page = 1;
if ( !isset($sorttype) ) $sorttype = 1;
if ( isset($dosearch) )
{
	$page = 1;
}


if ( $delgroup && $admin_group_list)
{
	$countdelete = 0;
	if ( is_array($checkitem) ) {
		foreach ( $checkitem as $request_id )
		{
				// del record
				$sql = "delete from weborg_group_assign where group_id=$admin_group_list and user_id = $request_id";
				$res = $db->query ($sql);
				if ( $db->affectedRows() ) 
					$countdelete++;
		}
		if ( $countdelete > 0 )
			$showmsg = "ข้อมูลผู้ใช้งาน ".$countdelete." รายการ ถูกลบเรียบร้อยแล้ว";
	}
}

if ( $addgroup && $admin_group_list)
{
	$countdelete = 0;
	if ( is_array($checkitem) ) {
		foreach ( $checkitem as $request_id )
		{
			$sql = "select * from weborg_group_assign where group_id=$request_id and user_id=".$g_user["user_id"];
			$res = $db->query($sql);
			if ( !DB::IsError($res) )
			{
				if ( $res->numRows() <= 0  ) 
				{
					//  no duplicate , add group
					$id = $db->nextId('weborg_group_assign');
					$sql = "insert into weborg_group_assign(group_assign_id,group_id,user_id,group_position) values($id,$admin_group_list,$request_id,$sel_group_position)";
					$db->query($sql);
					if ( $db->affectedRows() )
						$countdelete++;
				}
			}
		}
		if ( $countdelete > 0 )
			$showmsg = "ข้อมูลผู้ใช้งาน ".$countdelete." รายการ ถูกบันทึกเรียบร้อยแล้ว";
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
<style type="text/css">
<!--
.submenu {margin-bottom: 0.5em;
}
-->
</style>
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
            <td class="text1"><div align="center"><img src="../images/ico_group.gif" border="0" align="absmiddle"> จัดกลุ่ม</div></td>
          </tr>
          <tr>
            <td height="36" background="../images/bg-fadeblue.gif">
<!-- Start inside display -->
<?  if ( $mode != "result" ) { ?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="24" colspan="6"> <img src="/images/arrow_red.gif" width="16" height="16"> เลือกกลุ่มที่ต้องการจัดกลุ่มสมาชิก 
      <select name="admin_group_list" onchange="document.myform.submit()">
        <option value="">- - - - - </option>
        <?
$sql = "select weborg_group.group_id,group_name,group_subsys from weborg_group ".
			" inner join weborg_group_assign on weborg_group_assign.group_id=weborg_group.group_id ".
			" where weborg_group_assign.group_position = 2 and weborg_group_assign.user_id=".$g_user["user_id"];
$res2 = $db->query($sql);
if ( !DB::IsError($res2) ) {
	while ( $rs2 = $res2->fetchRow(DB_FETCHMODE_OBJECT) ) {
?>
        <option value="<?=$rs2->group_id?>" <? if  ($rs2->group_id == $admin_group_list ) echo "selected"; ?>>
        <?=$rs2->group_name?>
        </option>
        <? } }  $res2->free(); ?>
      </select>
        <br>        </td>
  </tr>
</table>
<? if ( $admin_group_list ) { ?><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="4"><img src="/images/arrow_red.gif" width="16" height="16">
      <input type="submit" name="addgroup" value="เข้ากลุ่ม">
      <select name="sel_group_position">
        <option value="0">
        <?=$group_position_name[0]?>
        </option>
        <option value="1">
        <?=$group_position_name[1]?>
        </option>
      </select>
      <img src="/images/arrow_red.gif" width="16" height="16">
      <input onClick="return Subm('delete',0,0);" name="delgroup" type="submit"  value=" ออกกลุ่ม ">
      <? if ( isset($showmsg) ) { ?>
      <img src="/images/arrow_red.gif" width="16" height="16">
      <?=$showmsg?>
      <? } ?></td>
    </tr>
  <tr>
    <td width="10%">&nbsp;</td>
    <td colspan="3">รายชื่อสมาชิกในกลุ่ม</td>
    </tr>
<?
$sql = "select group_assign_id,weborg_user.user_id,user_name,user_surname,group_position ".
			" from weborg_user left join weborg_group_assign on weborg_user.user_id=weborg_group_assign.user_id ".
			" where group_id=$admin_group_list order by group_position desc,user_name,user_surname";
$res2 = $db->query($sql);
$linecount = 0;
if ( !DB::IsError($res2) )
{
	while ( $rs2 = $res2->fetchRow(DB_FETCHMODE_OBJECT) ) 
	{
		$linecount++;
?>
  <tr>
    <td>&nbsp;</td>
    <td width="9%"><?=$linecount?></td>
    <td width="32%"><?=$rs2->user_name." ".$rs2->user_surname?></td>
    <td width="49%"><b><?=$group_position_name[$rs2->group_position]?></b></td>
  </tr>
<? } } ?>  
  <? if ( $group_id ) { ?>
  <? }  // end if $group_id ?>
</table>
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
                  <td height="24" colspan="6" bgcolor="#D9E7EE">&nbsp;เลือกรายชื่อ </td>
                </tr>
                <tr>
                  <td height="54" colspan="6">
                    <img src="/images/arrow_red.gif" width="16" height="16">
                    ชื่อ/ รหัสผู้ใช้/ e-mail 
                    <input type="text" name="sel_name" value="<?=$sel_name?>">
                    <br>
                    <img src="/images/arrow_red.gif" width="16" height="16">แผนก
                    <select name="sel_dep_id">
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
                    <img src="/images/arrow_red.gif" width="16" height="16">กลุ่ม
                    <select name="sel_group_id">
					<option value="">- - - - - </option>
                      <?
$sql = "select weborg_group.group_id,group_name,group_subsys from weborg_group ";
$res2 = $db->query($sql);
if ( !DB::IsError($res2) ) {
	while ( $rs2 = $res2->fetchRow(DB_FETCHMODE_OBJECT) ) {
?>
                      <option value="<?=$rs2->group_id?>" <? if  ($rs2->group_id == $sel_group_id ) echo "selected"; ?>>
                      <?=$rs2->group_name?>
                      </option>
                      <? } }  $res2->free(); ?>
                    </select> 
                    <input type="submit" name="dosearch" value="ค้นหา">                    </td>
                </tr>
              </table>
              <?
// start get database
	if ( !isset($mode) ) $mode = "browse";
	$page_param = "mode=$mode&admin_group_list=$admin_group_list&sel_name=$sel_name&sel_dep_id=$sel_dep_id&sel_group_id=$sel_group_id";
	$sql = "select weborg_user.user_id,login,user_name,user_surname,email from weborg_user ";
	$criteria = "";
	if ( $sel_group_id ) 
	{
		$sql  .=  " inner join weborg_group_assign on weborg_group_assign.user_id=weborg_user.user_id "; 
		$criteria .= " and weborg_group_assign.group_id=$sel_group_id ";
	}
	if ( $sel_name ) $criteria .= " and login like '%$sel_name%' or user_name like '%$sel_name%' or email like '%$sel_name%'";
	if ( $sel_dep_id ) $criteria .= " and dep_id=$sel_dep_id ";
	if ( $criteria != "" )
		$sql .= " WHERE ".substr($criteria,4)." GROUP BY weborg_user.user_id";

	$page_ctrl = new PageControl;
	if ( !isset($orderby) ) $orderby = "login";
	if ( !isset($page) ) $page = 1;
	if ( !isset($sorttype) ) $sorttype = 1;
	$page_ctrl->page_init($sql,$page_param,$orderby,$page,$sorttype,$row_per_page);
?>              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr bgcolor="#D9E7EE">
                  <td width="5%">&nbsp;
                      <input title="Select or de-select all messages" onClick=CA();  tabindex=105 type=checkbox name=allbox>                  </td>
                  <td width="10%">
<div align="center"><b>
<? $page_ctrl->page_column("user_id","ID"); ?>
</b></div>
                  </td>
                  <td width="16%">
<div align="center"><b>
<? $page_ctrl->page_column("login","รหัสผู้ใช้"); ?>
</b></div>
                  </td>
                  <td width="30%">
<div align="center"><b>
<? $page_ctrl->page_column("user_name","ชื่อ-นามสกุล"); ?>
</b></div>
                  </td>
                  <td width="33%">
<div align="center"><b>
<? $page_ctrl->page_column("email","e-mail"); ?>
</b></div>                  </td>
                  <td width="6%">&nbsp;</td>
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
                <tr <? if ( $linecount % 2 == 0 ) echo "bgcolor='#DFEBFF'"; else echo "bgcolor='#ECF3FF'"; ?>>
                  <td>&nbsp;
<? if ( $rs->user_id != $g_user["user_id"] ) { ?>				  
                      <input onClick=CCA(this);  type="checkbox" name="checkitem[]" value="<?=$rs->user_id?>">
<? } else { ?><img src="/images/clear.gif" height="16">
<? } ?>					  
                  </td>
                  <td><div align="center">
                      <?=$rs->user_id?>
                  </div></td>
                  <td>&nbsp;<a href="userinfo.php?mode=view&user_id=<?=$rs->user_id?>&saveurl=1">
                        <?=$rs->login?>
                  </a></td>
                  <td>&nbsp;<a href="userinfo.php?mode=view&user_id=<?=$rs->user_id?>&saveurl=1">
                        <?=$rs->user_name." ".$rs->user_surname?>
                  </a></td>
                  <td>&nbsp;<a href="userinfo.php?mode=view&user_id=<?=$rs->user_id?>&saveurl=1">
                        <?=$rs->email?>
                  </a></td>
                  <td>&nbsp;
                      <a title="Edit" href="userinfo.php?mode=view&user_id=<?=$rs->user_id?>&saveurl=1"><img src="/images/icon_edit.gif" border=0></a>
                  </td>
                </tr>
<?
	}
	$res->free();
}
?>
  <tr>
    <td colspan="6"><img src="/images/seperator2.gif"></td>
  </tr>
</table>
<br>
  <table width="100%"  border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
      <td width="31%"><div align="right"><?=$page_ctrl->num_rows." Record(s) - Page ".$page_ctrl->page." of ".$page_ctrl->num_pages." &nbsp;&nbsp;";?>
        </div></td>
      <td width="69%"><div align="center"><? $page_ctrl->page_navigator(); ?></div></td>
    </tr>
  </table>
<? }  // end of select admin_group_list ?>
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
<? if ( $mode != "result" && $admin_group_list ) { ?>
<script>document.myform.sel_name.focus();</script>
<? } else { ?>
<? } ?>
</body>
</html>
<? include("../include/disconnect.php"); ?>
