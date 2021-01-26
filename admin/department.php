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
	$id = $db->nextId('weborg_department');
	$sql = "insert into weborg_department(dep_id,dep_name) ".
				"values ('$id','$dep_name')";
	$db->query($sql); 
	if ( $db->affectedRows() ) 
		$showmsg = "ข้อมูลแผนก '".$dep_name."' ได้ถูกเพิ่มเข้าระบบเรียบร้อยแล้ว";
	else
		$showmsg = "#eไม่สามารถเพิ่มข้อมูลแผนกได้";

	$mode = "result";
	//echo "<meta http-equiv='refresh' content='0;URL=".$backurl."'>";
	//exit();
}

if ( isset($doedit) && $keyid>0 )
{
	$sql = "update weborg_department set ".
				"dep_id='$dep_id', ".
				"dep_name='$dep_name' ".
				"where dep_id=$keyid";
	$db->query($sql);
	if  ( $db->affectedRows() ) 
		$showmsg = "ข้อมูลแผนก ".$dep_name." ได้ถูกบันทึกเรียบร้อยแล้ว";
	else
		$showmsg = "#eไม่สามารถบันทึกข้อมูลแผนกได้";

	$mode = "result";
	//echo "<meta http-equiv='refresh' content='0;URL=".$backurl."'>";
	//exit();
}

if ( isset($deleteitem) )
{
	$countdelete = 0;
	if ( is_array($checkitem) ) {
		foreach ( $checkitem as $request_id )
		{
				// del record
				$sql = "delete from weborg_department where dep_id = $request_id";
				$res = $db->query ($sql);
				if ( $db->affectedRows() ) 
					$countdelete++;
		}
		if ( $countdelete > 0 )
			$showmsg = "ข้อมูลแผนก ".$countdelete." รายการ ถูกลบเรียบร้อยแล้ว";
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
if( !requireField(new Array(obj.dep_name),new Array('กรุณาใส่ชื่อแผนก'))) return false;
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
	  <form name="myform" method="post" action="<?=$PHP_SELF?>">
	    <table width="574" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="36">
<!-- Start inside display -->
<? 
if ( $mode == "add" or $mode == "edit" ) 
{ 
	$keyid = $dep_id; 
?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr> 
<td height="36" colspan="2">
<input type="hidden" name="keyid" value="<?=$keyid?>">
<input type="hidden" name="ignoreurl" value="1">
<input name="backurl" type="hidden" value="<? if ( $saveurl==1 ) echo $g_user["lasturl"]; else echo $backurl; ?>"> 
&nbsp;&nbsp;&nbsp;<img src="/images/ico_admindata.gif" align="absmiddle"> <span class="largetext">ข้อมูลแผนก </span>

<? if  ( !$keyid ) { ?>
<img src="/images/arrow_red.gif" width="16" height="16">
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
    <th background="/images/win_bkhead.gif" class="text3">ข้อมูลแผนก</th>
    <td width="6"><img src="/images/win_edge2.gif"></td>
  </tr>
  <tr>
    <td background="/images/win_bkleft.gif">&nbsp;</td>
    <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <? 
if ( $dep_id )
{
	$sql = "select * from weborg_department where dep_id=$dep_id";
	$res = $db->query($sql);
	$rs = $res->fetchRow(DB_FETCHMODE_OBJECT);
}
?>
      <tr>
        <td height="24" colspan="4">
          <input type="hidden" name="dep_id" value="<?=$dep_id?>"></td>
      </tr>
      <tr>
        <td width="17%">&nbsp;ชื่อแผนก<span class="redtext">*</span></td>
        <td width="49%"><input name="dep_name" type="text" size="40" value="<?=$rs->dep_name?>"></td>
        <td width="13%">&nbsp;</td>
        <td width="21%">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4"><img src="/images/clear.gif"></td>
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
                  <td height="36" colspan="6">
&nbsp;&nbsp;&nbsp;<img src="/images/ico_admindata.gif" align="absmiddle"> <span class="largetext">ข้อมูลแผนก </span> <img src="/images/arrow_red.gif" width="16" height="16">
<input type="button" name="addnew" value="เพิ่มแผนก" onClick="location.href='<?=$PHP_SELF?>?mode=add&saveurl=1'">
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
	$sql = "select dep_id,dep_name from weborg_department ";
	$page_ctrl = new PageControl;
	if ( !isset($orderby) ) $orderby = "dep_name";
	if ( !isset($page) ) $page = 1;
	if ( !isset($sorttype) ) $sorttype = 1;
	$page_ctrl->page_init($sql,$page_param,$orderby,$page,$sorttype,$row_per_page);
?> 

<table width="570" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="12"><img src="/images/win_edge1.gif"></td>
    <td width="39" background="/images/win_bkhead.gif">&nbsp;
        <input title="Select or de-select all messages" onClick=CA();  tabindex=105 type=checkbox name=allbox>    </td>
    <td width="72" align="center" background="/images/win_bkhead.gif">
      <b>
        <? $page_ctrl->page_column("dep_id","ID"); ?>
    </b></td>
    <td width="395" align="center" background="/images/win_bkhead.gif">
      <b>
        <? $page_ctrl->page_column("dep_name","ชื่อแผนก"); ?>
      </b>
      </td>
    <td width="40" background="/images/win_bkhead.gif">&nbsp;</td>
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
        <input onClick=CCA(this);  type="checkbox" name="checkitem[]" value="<?=$rs->dep_id?>">
    </td>
    <td><div align="center">
        <?=$rs->dep_id?>
    </div></td>
    <td><a href="<?=$PHP_SELF?>?mode=edit&dep_id=<?=$rs->dep_id?>&saveurl=1">&nbsp;
          <?=$rs->dep_name?>
    </a></td>
    <td>&nbsp; <a title="Edit" href="<?=$PHP_SELF?>?mode=edit&dep_id=<?=$rs->dep_id?>&saveurl=1"><img src="/images/icon_edit.gif" border=0></a> </td>
    <td background="/images/win_bkright.gif">&nbsp;</td>
  </tr>
<tr>
  <td background="/images/win_bkleft.gif"></td>
  <td colspan="4" height="2"><img src="/images/seperator2.gif"></td>
  <td background="/images/win_bkright.gif"></td>
</tr>
<?
	}
	$res->free();
}
?>
  <tr>
    <td><img src="/images/win_edge3.gif"></td>
    <td colspan="4" background="/images/win_bkbottom.gif"></td>
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
<script>document.myform.dep_name.focus();</script>
<? } else if ( $mode != "result" ) { ?>

<? } else { ?>
<? } ?>
</body>
</html>
<? include("../include/disconnect.php"); ?>