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
	$id = $db->nextId('weborg_user');
	$sql = "insert into weborg_user(user_id,login,password,title,user_name,user_surname,phone,mobile,email,dep_id,student_id,birthdate,home_address,company_name,position) ".
				"values ('$id','$login','$password','$title','$user_name','$user_surname','$phone','$mobile','$email','$dep_id','$student_id','".txt2date($birthdate)."','$home_address','$company_name','$position')";
	$db->query($sql); 
	if ( $db->affectedRows() ) 
		$showmsg = "ข้อมูลผู้ใช้งาน '".$login."' ได้ถูกเพิ่มเข้าระบบเรียบร้อยแล้ว";
	else
		$showmsg = "#eไม่สามารถเพิ่มข้อมูลผู้ใช้งานได้";

	$mode = "result";
}

if ( isset($doedit) && $keyid>0 )
{
	$sql = "update weborg_user set ".
				"login='$login', ".
				"password='$password', ".
				"title='$title', ".
				"user_name='$user_name', ".
				"user_surname='$user_surname', ".
				"phone='$phone', ".
				"mobile='$mobile', ".
				"email='$email', ".
				"dep_id='$dep_id', ".
				"student_id='$student_id', ".
				"birthdate='".txt2date($birthdate)."', ".
				"home_address='$home_address', ".
				"company_name='$company_name', ".
				"position='$position' ".
				"where user_id=$keyid";
	$res = $db->query($sql);
	if  ( $db->affectedRows() ) 
		$showmsg = "ข้อมูลผู้ใช้งาน ".$login." ได้ถูกบันทึกเรียบร้อยแล้ว";
	else
		$showmsg = "#eไม่สามารถบันทึกข้อมูลผู้ใช้งานได้";

	$mode = "result";
}

if ( isset($deleteitem) )
{
	$countdelete = 0;
	if ( is_array($checkitem) ) {
		foreach ( $checkitem as $request_id )
		{
				// del record
				$sql = "delete from weborg_user where user_id = $request_id";
				$res = $db->query ($sql);
				// delete job
				
				
				// delete attachment
				
				
				
				// delete group assign
				if ( $db->affectedRows() ) 
					$countdelete++;
		}
		if ( $countdelete > 0 )
			$showmsg = "ข้อมูลผู้ใช้งาน ".$countdelete." รายการ ถูกลบเรียบร้อยแล้ว";
	}
}

if ( $addgroup && $user_id )
{
	$sql = "select * from weborg_group_assign where group_id=$add_group_id and user_id=$user_id";
	$res = $db->query($sql);
	if ( !DB::IsError($res) )
	{
		if ( $res->numRows() <= 0  ) 
		{
			//  no duplicate , add course
			$id = $db->nextId('weborg_group_assign');
			$sql = "insert into weborg_group_assign(group_id,user_id,group_position) values($add_group_id,$user_id,$sel_group_position)";
			$db->query($sql);
			if ( $db->affectedRows() )
				$showmsg = "ข้อมูลสมาชิกกลุ่มเพิ่มเรียบร้อยแล้ว";
			else
				$showmsg = "ไม่สามารถเพิ่มข้อมูลสมาชิกกลุ่มได้";
		}
		else
		{
			$showmsg = "ผู้ใช้งานนี้เป็นสมาชิกกลุ่มนี้แล้ว";
		}
	}
}

if ( $delgroup )
{
	$sql = "delete from weborg_group_assign where group_id=$del_group_id and user_id=$user_id";
	$db->query($sql);
	if  ( $db->affectedRows() )
		$showmsg = "ลบข้อมูลสมาชิกกลุ่มเรียบร้อยแล้ว";
	else
		$showmsg = "ไม่สามารถลบข้อมูลสมาชิกกลุ่มได้";
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
<script language=JavaScript src="/include/valid.js"></script>
<script language="JavaScript" type="text/JavaScript" src="/include/overlib_mini.js"></script>
<script language="JavaScript">
<!--
function verifySubmit(obj) 
{
if( !requireField(new Array(obj.login,obj.password,obj.user_name),new Array('กรุณาใส่รหัสผู้ใช้','กรุณาใส่รหัสผ่าน','กรุณาใส่ชื่อผู้ใช้งาน'))) return false;
return true;
}	
//-->
</script>
</head>

<body>
<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
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
            <td width="569" height="36">
<!-- Start inside display -->
<? 
if ( $mode == "add" or $mode == "edit" ) 
{ 
	$keyid = $user_id; 
?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr> 
<td height="36" colspan="2">
<input type="hidden" name="keyid" value="<?=$keyid?>">
<input type="hidden" name="ignoreurl" value="1">
<input name="backurl" type="hidden" value="<? if ( $saveurl==1 ) echo $g_user["lasturl"]; else echo $backurl; ?>"> 
&nbsp;&nbsp;&nbsp;<img src="/images/ico_admindata.gif" align="absmiddle"> <span class="largetext">ข้อมูลผู้ใช้งาน </span> 
<? if  ( !$keyid ) { ?>
<img src="/images/arrow_red.gif" width="16" height="16">
<input name="doadd" type="submit" value="เพิ่ม" onclick="return verifySubmit(document.myform);"> 
<? } else { ?>
<img src="/images/arrow_red.gif" width="16" height="16"><input name="doedit" type="submit" value="แก้ไข" onclick="return verifySubmit(document.myform);"> 
<? } ?>
<img src="/images/arrow_red.gif" width="16" height="16"><input name="cancel" type="reset" value="ยกเลิก"> 
<? if ( $g_user["lasturl"] != "" ) { ?>
<img src="/images/arrow_red.gif" width="16" height="16"><input name="goback" type="button" value="ย้อนกลับ" onclick="location.href='<?=$g_user["lasturl"]?>'"> 
<? } ?>
<? if ( isset($showmsg) ) { ?>
<img src="/images/arrow_red.gif" width="16" height="16">
<?=$showmsg?>
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
    <td>
<? 
if ( $user_id )
{
	$sql = "select * from weborg_user where user_id=$user_id";
	$res = $db->query($sql);
	$rs = $res->fetchRow(DB_FETCHMODE_OBJECT);
}
?>
	<table width="100%"  border="0">
      <tr>
        <td width="26%">&nbsp;</td>
        <td width="74%">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="top"><?=putuserimage($rs->user_id,"")?></td>
        <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td>รหัสผู้ใช้
                <input type="hidden" name="user_id" value="<?=$user_id?>"><span class="redtext">*</span></td>
            <td><input name="login" type="text" size="16" value="<?=$rs->login?>"></td>
            <td> &nbsp;รหัสผ่าน<span class="redtext">*</span> </td>
            <td><input name="password" type="password" size="16" value="<?=$rs->password?>" ></td>
          </tr>
          <tr>
            <td>ชื่อ<span class="redtext">*</span></td>
            <td colspan="3"><input name="title" type="text" value="<?=$rs->title?>" size="8">
                <input name="user_name" type="text" value="<?=$rs->user_name?>" size="18">
                <input name="user_surname" type="text" value="<?=$rs->user_surname?>" size="18">                </td>
          </tr>
          <tr>
            <td>  ชื่อเล่น </td>
            <td><input name="nickname" type="text" value="<?=$rs->nickname?>" size="8"></td>
            <td>วันเกิด</td>
            <td><input name="birthdate" type="text" value="<?=date2txt($rs->birthdate)?>" size="10"></td>
          </tr>
          <tr>
            <td> รหัสประจำตัว</td>
            <td><input name="student_id" type="text" value="<?=$rs->student_id?>" size="12"></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td> โทรศัพท์</td>
            <td><input name="phone" type="text" value="<?=$rs->phone?>" size="20"></td>
            <td>มือถือ</td>
            <td><input name="mobile" type="text" value="<?=$rs->mobile?>" size="20"></td>
          </tr>
          <tr>
            <td> บริษัท </td>
            <td><input name="company_name" type="text" value="<?=$rs->company_name?>" size="20"></td>
            <td>ตำแหน่ง</td>
            <td><input name="position" type="text" value="<?=$rs->position?>" size="20"></td>
          </tr>
          <tr>
            <td> ที่อยู่ </td>
            <td colspan="3"><input name="home_address" type="text" value="<?=$rs->home_address?>" size="48"></td>
          </tr>
          <tr>
            <td>e-mail</td>
            <td><input name="email" type="text" value="<?=$rs->email?>" size="20"></td>
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
        </table></td>
      </tr>
      <tr>
        <td colspan="2">
<? if ( $user_id ) { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="24" colspan="3"><br>
                  <img src="/images/seperator2.gif"><br>
&nbsp;กลุ่มที่เป็นสมาชิกอยู่<br>
        <br>
        <img src="/images/seperator2.gif"></td>
            </tr>
            <tr>
              <td width="44%">&nbsp;
                  <select name="del_group_id" size="6">
                    <?
$sql = "select weborg_group.group_id,group_name,group_position from weborg_group inner join weborg_group_assign on ".
			"weborg_group_assign.group_id=weborg_group.group_id ".
			"where user_id=$user_id";
$res2 = $db->query($sql);
if ( !DB::IsError($res2) ) {
	while ( $rs2 = $res2->fetchRow(DB_FETCHMODE_OBJECT) ) {
?>
                    <option value="<?=$rs2->group_id?>">
                    <?=$rs2->group_name?>
          -
          <?=$group_position_name[$rs2->group_position]?>
                    </option>
                    <? } }  $res2->free(); ?>
                  </select>
              </td>
              <td width="13%"><div align="center">
                  <input type="submit" name="delgroup" value=">>>">
                  <br>
                  <br>
                  <input type="submit" name="addgroup" value="<<<">
              </div></td>
              <td width="43%"> ตำแหน่ง
                  <select name="sel_group_position">
                    <option value="0">
                    <?=$group_position_name[0]?>
                    </option>
                    <option value="1">
                    <?=$group_position_name[1]?>
                    </option>
                  </select>
                  <br>
                  <select name="add_group_id" size="5">
                    <?
	$sql = "select * from weborg_group order by group_name";
	$res2 = $db->query($sql);
if ( !DB::IsError($res2) ) {
	while ( $rs2 = $res2->fetchRow(DB_FETCHMODE_OBJECT) ) {
?>
                    <option value="<?=$rs2->group_id?>">
                    <?=$rs2->group_name?>
                    </option>
                    <? } }  $res2->free(); ?>
                  </select>
              </td>
            </tr>
                </table>
<? } ?>
						</td>
        </tr>
    </table>    
      <!-- Start inside display -->
    </td>
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
                  <td height="64" colspan="6">
&nbsp;&nbsp;&nbsp;<img src="/images/ico_admindata.gif" align="absmiddle"> <span class="largetext">ข้อมูลผู้ใช้งาน </span> <img src="/images/arrow_red.gif" width="16" height="16">
<input type="button" name="addnew" value="เพิ่มผู้ใช้งาน" onClick="location.href='<?=$PHP_SELF?>?mode=add&saveurl=1'">
<img src="/images/arrow_red.gif" width="16" height="16">
<input onClick="return Subm('delete',0,0);" name="deleteitem" type="submit"  value=" ลบ ">
<? if ( isset($showmsg) ) { ?>
<img src="/images/arrow_red.gif" width="16" height="16">
<?=$showmsg?>
<? } ?><br><img src="/images/arrow_red.gif" width="16" height="16">
                    ชื่อ/Login/e-mail 
                    <input type="text" name="sel_name" value="<?=$sel_name?>">
                    แผนก
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
                    กลุ่ม
                    <select name="sel_group_id">
					<option value="">- - - - - </option>
                      <?
$sql = "select weborg_group.group_id,group_name from weborg_group ";
$res2 = $db->query($sql);
if ( !DB::IsError($res2) ) {
	while ( $rs2 = $res2->fetchRow(DB_FETCHMODE_OBJECT) ) {
?>
                      <option value="<?=$rs2->group_id?>" <? if  ($rs2->group_id == $sel_group_id ) echo "selected"; ?>>
                      <?=$rs2->group_name?>
                      </option>
                      <? } }  $res2->free(); ?>
                    </select> 
                    <input type="submit" name="dosearch" value="ค้นหา">
                  </td>
                </tr>
              </table>
<?
// start get database
	if ( !isset($mode) ) $mode = "browse";
	$page_param = "mode=$mode&sel_name=$sel_name&sel_dep_id=$sel_dep_id&sel_group_id=$sel_group_id";
	$sql = "select weborg_user.user_id,login,user_name,user_surname,email,student_id from weborg_user ";
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
	if ( !isset($orderby) ) $orderby = "user_id";
	if ( !isset($page) ) $page = 1;
	if ( !isset($sorttype) ) $sorttype = 1;
	$page_ctrl->page_init($sql,$page_param,$orderby,$page,$sorttype,$row_per_page);
?> <table width="570" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="12"><img src="/images/win_edge1.gif"></td>
    <td width="26" background="/images/win_bkhead.gif">&nbsp;
        <input title="Select or de-select all messages" onClick=CA();  tabindex=105 type=checkbox name=allbox>
    </td>
    <td width="55" background="/images/win_bkhead.gif">
      <div align="center"><b>
        <? $page_ctrl->page_column("user_id","ID"); ?>
    </b></div></td>
    <td width="97" background="/images/win_bkhead.gif">
      <div align="center"><b>
        <? $page_ctrl->page_column("login","รหัสผู้ใช้"); ?>
    </b></div></td>
    <td width="168" background="/images/win_bkhead.gif">
      <div align="center"><b>
        <? $page_ctrl->page_column("user_name","ชื่อ-นามสกุล"); ?>
    </b></div></td>
    <td width="166" background="/images/win_bkhead.gif">
      <div align="center"><b>
        <? $page_ctrl->page_column("email","e-mail"); ?>
    </b></div></td>
    <td width="34" background="/images/win_bkhead.gif">&nbsp;</td>
    <td width="12"><img src="/images/win_edge2.gif"></td>
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
        <input onClick=CCA(this);  type="checkbox" name="checkitem[]" value="<?=$rs->user_id?>">
    </td>
    <td><div align="center">
        <?=$rs->user_id?>
    </div></td>
    <td><a href="<?=$PHP_SELF?>?mode=edit&user_id=<?=$rs->user_id?>&saveurl=1">&nbsp;
          <?=$rs->login?>
    </a></td>
    <td><a href="<?=$PHP_SELF?>?mode=edit&user_id=<?=$rs->user_id?>&saveurl=1">&nbsp;
          <?=$rs->user_name." ".$rs->user_surname?>
    </a></td>
    <td><a href="mailto:<?=$rs->email ?>"><?=$rs->email ?>
    </a></td>
    <td>&nbsp; <a title="Edit" href="<?=$PHP_SELF?>?mode=edit&user_id=<?=$rs->user_id?>&saveurl=1"><?=putuserimage($rs->user_id,"s")?></a> </td>
    <td background="/images/win_bkright.gif">&nbsp;</td>
  </tr>
<tr>
  <td background="/images/win_bkleft.gif"></td>
  <td colspan="6" height="2"><img src="/images/seperator2.gif"></td>
  <td background="/images/win_bkright.gif"></td>
</tr>
<?
	}
	$res->free();
}
?>
  <tr>
    <td><img src="/images/win_edge3.gif"></td>
    <td colspan="6" background="/images/win_bkbottom.gif"></td>
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
<script>document.myform.login.focus();</script>
<? } else if ( $mode != "result" ) { ?>
<script>document.myform.sel_name.focus();</script>
<? } else { ?>
<? } ?>
</body>
</html>
<? include("../include/disconnect.php"); ?>
