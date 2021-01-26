<? 
include("../include/connect.php"); 
include("../include/util.php");
include("../include/page_ctrl.php");
check_authorize($g_user["level"],AUTHORIZE_WEBUSER);

if ( isset($dosearch) )
{
	$page = 1;
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
<script language="JavaScript" type="text/JavaScript" src="/include/overlib_mini.js"></script>
</head>

<body>
<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
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
            <td class="largetext"> &nbsp; <img src="../images/ico_userinfo.gif" border="0" align="absmiddle"> สอบถามข้อมูลผู้ใช้งาน</td>
          </tr>
          <tr>
            <td height="36" background="../images/bg-fadeblue.gif">
<!-- Start inside display -->
<? 
if ( $mode == "view" ) 
{ 
	$keyid = $user_id; 
?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr> 
<td height="24" colspan="2">
<input type="hidden" name="keyid" value="<?=$keyid?>">
<input type="hidden" name="ignoreurl" value="1">
<input name="backurl" type="hidden" value="<? if ( $saveurl==1 ) echo $g_user["lasturl"]; else echo $backurl; ?>"> 
<? if ( $g_user["lasturl"] != "" ) { ?>
<img src="/images/arrow_red.gif" width="16" height="16">
<input name="goback" type="button" value="ย้อนกลับ" onclick="location.href='<?=$g_user["lasturl"]?>'"> 
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
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="27%" rowspan="8" align="center" valign="middle">
                    <?=putuserimage($rs->user_id,"")?></td>
                  <td height="24">&nbsp;</td>
                  <td colspan="2" class="text3">&nbsp;</td>
                  <td class="text3">&nbsp;</td>
                </tr>
                <tr>
            <td width="12%" height="24">ชื่อ-นามสกุล
          <input type="hidden" name="user_id" value="<?=$user_id?>"></td>
        <td colspan="2" class="text3"><?=$rs->title?>
            <?=$rs->user_name?>
            <?=$rs->user_surname?>
            <? if ( $rs->nickname ) echo "( ".$rs->nickname." )"; ?></td>
        <td class="text3">&nbsp;</td>
      </tr>
      <tr>
        <td height="24">รหัสประจำตัว</td>
        <td class="text3"><b>
          <?=$rs->student_id?>
        </b></td>
        <td>วันเกิด</td>
        <td class="text3"><b>
          <?=showshortthaidate($rs->birthdate)?>
        </b></td>
      </tr>
      <tr>
        <td height="24" colspan="4"><img src="../images/seperator.gif" width="185" height="2"></td>
        </tr>
      <tr>
        <td height="24">โทรศัพท์</td>
        <td width="31%" class="text3"><b>
          <?=$rs->phone?>
        </b></td>
        <td width="9%">มือถือ</td>
        <td width="21%" class="text3"><b>
          <?=$rs->mobile?>
        </b></td>
      </tr>
      <tr>
        <td height="24">บริษัท</td>
        <td class="text3"><b>
          <?=$rs->company_name?>
        </b></td>
        <td>ตำแหน่ง</td>
        <td class="text3"><b>
          <?=$rs->position?>
        </b></td>
      </tr>
      <tr>
        <td height="24">ที่อยู่</td>
        <td colspan="3" class="text3"><b>
          <?=$rs->home_address?>
        </b></td>
      </tr>
      <tr>
        <td height="24">e-mail</td>
        <td class="text3"><b>
          <?=$rs->email?>
        </b></td>
        <td>แผนก</td>
        <td class="text3"><b>
          <?
$sql = "select dep_id,dep_name from weborg_department where dep_id=".$rs->dep_id;
$res2 = $db->query($sql);
if ( !DB::IsError($res2) ) {
$rs2 = $res2->fetchRow(DB_FETCHMODE_OBJECT); 
	echo $rs2->dep_name;
}
$res2->free();
?>
        </b></td>
      </tr>
      <? if ( $user_id ) { ?>
      <tr>
        <td colspan="5"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr bgcolor="#D9E7EE">
              <td width="54%" height="24">&nbsp;<img src="../images/ico_smallinfo.gif" width="11" height="11" border="0" align="absmiddle"> กลุ่มที่เป็นสมาชิกอยู่</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>
                <?
$sql = "select weborg_group.group_id,group_name,group_position from weborg_group inner join weborg_group_assign on ".
			"weborg_group_assign.group_id=weborg_group.group_id ".
			"where user_id=$user_id";
$res2 = $db->query($sql);
$linecount =0;
if ( !DB::IsError($res2) ) {
	while ( $rs2 = $res2->fetchRow(DB_FETCHMODE_OBJECT) ) {
		$linecount++;
?>
&nbsp;
            <?=$linecount.". ".$rs2->group_name?>
            ตำแหน่ง :<b>
            <?=$group_position_name[$rs2->group_position]?>
            </b><br>
            <? } $res2->free(); }   ?>
              </td>
              <td></td>
            </tr>
        </table></td>
      </tr>
      <? } ?>
      <tr>
        <td colspan="2">&nbsp;</td>
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
</table>
<? } else if ( $mode != "result" ) { ?>
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
                  <td height="48" colspan="6">
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
$sql = "select weborg_group.group_id,group_name from weborg_group ";
$res2 = $db->query($sql);
if ( !DB::IsError($res2) ) {
	while ( $rs2 = $res2->fetchRow(DB_FETCHMODE_OBJECT) ) {
?>
<option value="<?=$rs2->group_id?>" <? if  ($rs2->group_id == $sel_group_id ) echo "selected"; ?>>
<?=$rs2->group_name?>
</option>
<? } $res2->free();  }   ?>
</select> 
                    <input type="submit" name="dosearch" value="ค้นหา"></td>
                </tr>
              </table>
<?
// start get database
	if ( !isset($mode) ) $mode = "browse";
	if ( !isset($showcol1) ) $showcol1 = "email";
	$page_param = "mode=$mode&sel_name=$sel_name&sel_dep_id=$sel_dep_id&sel_group_id=$sel_group_id&showcol1=$showcol1";
	$sql = "select weborg_user.user_id,login,user_name,user_surname,email,phone,mobile,student_id,birthdate,home_address,company_name,position,nickname from weborg_user ";
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
    <td width="72" background="/images/win_bkhead.gif">
      <div align="center"><b>
        <? $page_ctrl->page_column("user_id","ID"); ?>
    </b></div></td>
    <td width="127" background="/images/win_bkhead.gif">
      <div align="center"><b>
        <? $page_ctrl->page_column("login","รหัสผู้ใช้"); ?>
    </b></div></td>
    <td width="149" background="/images/win_bkhead.gif">
      <div align="center"><b>
        <? $page_ctrl->page_column("user_name","ชื่อ-นามสกุล"); ?>
    </b></div></td>
    <td width="180" background="/images/win_bkhead.gif">
      <div align="center"><b>
        <select name="showcol1" onchange="document.myform.submit()">
          <option value="phone" <? if ( $showcol1 == "phone" ) echo "selected"; ?>>โทรศัพท์</option>
          <option value="mobile" <? if ( $showcol1 == "mobile" ) echo "selected"; ?>>มือถือ</option>
          <option value="email" <? if ( $showcol1 == "email" ) echo "selected"; ?>>e-mail</option>
          <option value="nickname" <? if ( $showcol1 == "nickname" ) echo "selected"; ?>>ชื่อเล่น</option>
          <option value="company_name" <? if ( $showcol1 == "company_name" ) echo "selected"; ?>>ชื่อบริษัท</option>
          <option value="position" <? if ( $showcol1 == "position" ) echo "selected"; ?>>ตำแหน่ง</option>
          <option value="home_address" <? if ( $showcol1 == "home_address" ) echo "selected"; ?>>ที่อยู่</option>
        </select>
        <? $page_ctrl->page_column($showcol1,$showcol1); ?>
    </b></div></td>
    <td width="16" background="/images/win_bkhead.gif">&nbsp;</td>
    <td width="14"><img src="/images/win_edge2.gif"></td>
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
    <td><div align="center">
        <?=$rs->user_id?>
    </div></td>
    <td><?=putuserimage($rs->user_id,"s")?> <a href="<?=$PHP_SELF?>?mode=view&user_id=<?=$rs->user_id?>&saveurl=1">&nbsp;    </a><a href="<?=$PHP_SELF?>?mode=view&user_id=<?=$rs->user_id?>&saveurl=1">
      <?=$rs->login?>
    </a></td>
    <td><a href="<?=$PHP_SELF?>?mode=view&user_id=<?=$rs->user_id?>&saveurl=1" title="<?=$rs->user_name." ".$rs->user_surname?>">&nbsp;
          <?=$rs->user_name." ".$rs->user_surname?>
    </a></td>
    <td><? if ($showcol1 != email) 
	{?>
		<a href="<?=$PHP_SELF?>?mode=view&user_id=<?=$rs->user_id?>&saveurl=1" title="<?=$rs->showcol1?>" ><?$rs->showcol1?>&nbsp; 

	<? }  else { ?> 
		<a href="mailto:<?=$rs->email?>">&nbsp;

	<? } ?>
        <? if ( strlen($rs->$showcol1) > 25 ) echo  substr($rs->$showcol1,0,25)."..."; else echo $rs->$showcol1; ?>
    </a></td>
    <td><a href="/organizer/job.php?mode=add&job_type=5&sel_user_id=<?=$rs->user_id?>&saveurl=1"><img src="../images/ico_note.gif" alt="ส่งข้อความ" border="0" align="absmiddle"></a></td>
    <td background="/images/win_bkright.gif">&nbsp;</td>
  </tr>
<tr>
  <td background="/images/win_bkleft.gif"></td>
  <td colspan="5" height="2"><img src="/images/seperator2.gif"></td>
  <td background="/images/win_bkright.gif"></td>
</tr>
<? } 
 $res->free();
 }
?>
  <tr>
    <td><img src="/images/win_edge3.gif"></td>
    <td colspan="5" background="/images/win_bkbottom.gif"></td>
    <td><img src="/images/win_edge4.gif"></td>
  </tr>
</table><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
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
<? if ( $mode == "view" ) { ?>
<? } else if ( $mode != "result" ) { ?>
<script>document.myform.sel_name.focus();</script>
<? } else { ?>
<? } ?>
</body>
</html>
<? include("../include/disconnect.php"); ?>