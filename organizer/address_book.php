<? 
include("../include/connect.php"); 
include("../include/util.php");
include("../include/page_ctrl.php");
check_authorize($g_user["level"],AUTHORIZE_WEBUSER);

$row_per_page=10;
if ( isset($dosearch) )
{
	$letter = "";
	$page = 1;
}
if (isset($doadd))
{
	$id = $db->nextId('weborg_addr_book');
	$sql = "insert into weborg_addr_book(addr_book_id,user_id,addr_name,addr_address,addr_phone,addr_email,addr_company  ) ".
				"values ('$id','".$g_user["user_id"]."','$a_name','$a_address','$a_phone','$a_email','$a_company')";
	$db->query($sql); 
	if ( $db->affectedRows() ) 
		$showmsg = "ชื่อของคุณ '".$a_name."' ได้ถูกเพิ่มเข้าระบบเรียบร้อยแล้ว";
	else
		$showmsg = " ไม่สามารถเพิ่มข้อมูลได้";
}
if ( isset($doedit) && $addr_book_id>0 )
{
	$sql = "update weborg_addr_book set ".
				"addr_name='$a_name' ,".
				"addr_address='$a_address' ,".
				"addr_phone='$a_phone' ,".
				"addr_email='$a_email' ,".
				"addr_company='$a_company' ".
				"where addr_book_id=$addr_book_id";
	$db->query($sql);
	if  ( $db->affectedRows() ) 
		$showmsg = "ข้อมูลของคุณ  ".$addr_name." ได้ถูกบันทึกเรียบร้อยแล้ว";
	else
		$showmsg = " ไม่สามารถบันทึกข้อมูลได้";
}
if ( isset($deleteitem) )
{
	$countdelete = 0;
	if ( is_array($checkitem) ) {
		foreach ( $checkitem as $request_id )
		{
				// del record
				$sql = "delete from weborg_addr_book where addr_book_id = $request_id";
				$res = $db->query ($sql);
				if ( $db->affectedRows() ) 
					$countdelete++;
		}
		if ( $countdelete > 0 )
			$showmsg = "ข้อมูล ".$countdelete." รายการ ถูกลบเรียบร้อยแล้ว";
	}
				$addr_book_id = 0;
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
<script language=JavaScript src="../include/valid.js"></script>
<script language="JavaScript">
<!-- 
function verifySubmit(obj) 
{
if( !requireField(new Array(obj.a_name),new Array('กรุณาใส่ชื่อ'))) return false;
if( !checkEmail(obj.a_email,'email ไม่ถูกต้อง'))return false;
return true;
}	
//-->
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
	  <form name="myform" method="post" action="<?=$PHP_SELF?>">
	    <table width="569" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td class="largetext"> &nbsp; <img src="../images/ico_userinfo.gif" border="0" align="absmiddle"> สมุดโทรศัพท์</td>
          </tr>
          <tr>
            <td height="36">
<!-- Start inside display -->
<?  if ( $mode != "result" ) { ?>
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
<?
// start get database
	if ( !isset($mode) ) $mode = "browse";
	if ( !isset($letter) ) $letter = "";
	$sql = "select UPPER(left(addr_name,1))  as letter  from weborg_addr_book where user_id=".$g_user["user_id"]." group by UPPER(left(addr_name,1))";
	$res = $db->query($sql);
?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="30" colspan="6">
                    <img src="/images/arrow_red.gif" width="16" height="16">
                      <input onClick="return Subm('delete',0,0);" name="deleteitem" type="submit"  value=" ลบ ">
                      ชื่อ <input name="sel_name" type="text" value="<?=$sel_name?>" size="16">
					  โทรศัพท์/email <input name="sel_email" type="text" value="<?=$sel_email?>" size="16">
					  บริษัท/ที่อยู่ <input name="sel_company" type="text" value="<?=$sel_company?>" size="16">
                      <input type="submit" name="dosearch" value="ค้นหา">
                      <? if ( isset($showmsg) ) { ?>                    
                      <img src="/images/arrow_red.gif" width="16" height="16">
                      <?=$showmsg?>
                      <? } ?>
                    <table border="0" align="right" cellpadding="0" cellspacing="0">
                      <tr>
					                          <td ><img src="/images/tab_ed_left.gif"></td>
                        <td align="center" background="/images/tab_ed_bk.gif" class="largetext">
						<? if  ($letter)
						{
					    ?>
						 <a href="<?=$PHP_SELF?>?letter=<?=$rs->letter?>&orderby=<?=$orderby?>&sorttype=<?=$sorttype?>&page=<?=$page?>">All</a>
						 <? }else {?>
						 All
						<? } ?>
					    </td>
                        <td><img src="/images/tab_ed_right.gif"></td>

                        <?
if ( !isset($orderby) ) $orderby = "addr_name";
if ( !isset($page) ) $page = 1;
if ( !isset($sorttype) ) $sorttype = 1;
if ( !DB::IsError($res) )
{
	while ( $rs = $res->fetchRow(DB_FETCHMODE_OBJECT) ) 
	{
?>
                        <td ><img src="/images/tab_ed_left.gif"></td>
                        <td align="center" background="/images/tab_ed_bk.gif" class="largetext">
						<? if  ($letter !=  $rs->letter)
						{
					    ?>
						 <a href="<?=$PHP_SELF?>?letter=<?=$rs->letter?>&orderby=<?=$orderby?>&sorttype=<?=$sorttype?>&page=<?=$page?>"><?=($rs->letter)?></a>
						 <? }else {?>
						 <?=  ($rs->letter) ?> 
						<? } ?>
					    </td>
                        <td><img src="/images/tab_ed_right.gif"></td>
                        <? } 
 $res->free();
 }
?>
                      </tr>
                    </table>                  </td>
                </tr>
              </table>
<?
// start get database
	if ( !isset($mode) ) $mode = "browse";
	if ( !isset($letter) ) $letter = "";
	$page_param = "mode=$mode&letter=$letter&sel_name=$sel_name&sel_email=$sel_email&sel_company=$sel_company";
	$sql = "select * from weborg_addr_book where addr_name like '$letter%' ".
				" and addr_name like '%$sel_name%'  ".
				" and (addr_email like '%$sel_email%' ".
				" or addr_phone like '%$sel_email%' ) ".
				" and (addr_company like '%$sel_company%'  ".
				" or addr_address like '%$sel_company%')  ".
				" and user_id=".$g_user["user_id"];
    $page_ctrl = new PageControl;
	if ( !isset($orderby) ) $orderby = "addr_name";
	if ( !isset($page) ) $page = 1;
	if ( !isset($sorttype) ) $sorttype = 1;
	$page_ctrl->page_init($sql,$page_param,$orderby,$page,$sorttype,$row_per_page);
?> <table width="570" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="12"><img src="/images/win_edge1.gif"></td>
    <td width="72" background="/images/win_bkhead.gif">
      <div align="center"><b>
        <input title="Select or de-select all messages" onClick=CA();  tabindex=105 type=checkbox name=allbox>
        <? $page_ctrl->page_column("user_id","ID"); ?>
    </b></div></td>
    <td colspan="3" background="/images/win_bkhead.gif">
      <div align="center"><b> เรียงลำดับจาก... 
      <? $page_ctrl->page_column("addr_name","ชื่อ"); ?>  |
      <? $page_ctrl->page_column("addr_address","ที่อยู่"); ?>  |
      <? $page_ctrl->page_column("addr_phone","เบอร์โทรศัพท์"); ?>  |
      <? $page_ctrl->page_column("addr_email","e-mail"); ?>  |
      <? $page_ctrl->page_column("addr_company","ชื่อบริษัท"); ?>  
    </b></div></td>
    <td width="8" background="/images/win_bkhead.gif">&nbsp;</td>
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
        <input onClick=CCA(this);  type="checkbox" name="checkitem[]" value="<?=$rs->addr_book_id?>">
        <?=$rs->addr_book_id?>
</div></td>
    <td width="169" height="20">ชื่อ: <br>      <a href="<?=$PHP_SELF?>?addr_book_id=<?=$rs->addr_book_id?>">    
      <b><?=$rs->addr_name?></b>
    </a></td>
    <td width="122">  โทรศัพท์ :<br> <a href="<?=$PHP_SELF?>?addr_book_id=<?=$rs->addr_book_id?>&saveurl=1" >
  <img src="../images/ico_telephone.gif" width="16" height="16" border="0" align="absmiddle"> <b><?=$rs->addr_phone?></b>
    </a></td>
    <td width="173">e-mail: <br> <a href="mailto:<?=$rs->addr_email ?>">
	<b><img src="../images/ico_mail.gif" width="16" height="16" border="0" align="absmiddle">
	<?=$rs->addr_email ?></b>
    </a></td>
    <td>&nbsp;</td>
    <td background="/images/win_bkright.gif">&nbsp;</td>
  </tr>
    <tr>
    <td background="/images/win_bkleft.gif">&nbsp;</td>
    <td>&nbsp;</td>
    <td height="30">บริษัท:<br>      <a href="<?=$PHP_SELF?>?mode=view&user_id=<?=$rs->user_id?>&saveurl=1">
      <b><?=$rs->addr_company?></b>
    </a></td>
    <td colspan="2">ที่อยู่:<br>      <a href="<?=$PHP_SELF?>?mode=view&user_id=<?=$rs->user_id?>&saveurl=1">
      <b><?=$rs->addr_address?></b>
    </a></td>
    <td>&nbsp;</td>
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
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
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
      <? 
if ( $addr_book_id )
{
	$sql = "select * from weborg_addr_book where addr_book_id=$addr_book_id";
	$res = $db->query($sql);
	$rs = $res->fetchRow(DB_FETCHMODE_OBJECT);
}

?>

<table width="100%"  border="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="4%">&nbsp;</td>
    <td width="94%">
       <input type="hidden" name="addr_book_id" value="<?=$addr_book_id?>">
       <input type="hidden" name="letter" value="<?=$letter?>">
                    ชื่อ<span class="redtext">*</span>: 
                    <input name="a_name" value="<?=$rs->addr_name?>" type="text" size="22">       
    โทรศัพท์ : <input name="a_phone"  value="<?=$rs->addr_phone?>" type="text" size="12">       
    e-mail<span class="redtext">*</span>: <input name="a_email"   value="<?=$rs->addr_email?>" type="text" size="16">  </td>
    <td width="2%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
	   บริษัท:    <input name="a_company"  value="<?=$rs->addr_company?>" type="text" size="25">       
	   ที่อยู่:  <input name="a_address" value="<?=$rs->addr_address?>" type="text" size="45">    
&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><? if  ( !$addr_book_id ) { ?>
      <img src="/images/arrow_red.gif" width="16" height="16">
      <input name="doadd" type="submit" value="เพิ่ม" onclick="return verifySubmit(document.myform);">
      <? } else { ?>
      <img src="/images/arrow_red.gif" width="16" height="16">
      <input name="doedit" type="submit" value="แก้ไข" onclick="return verifySubmit(document.myform);">
      <? } ?></td>
    <td>&nbsp;</td>
  </tr>
</table>
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
</body>
</html>
<? include("../include/disconnect.php"); ?>