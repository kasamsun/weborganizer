<? 
include("../include/connect.php"); 
include("../include/util.php");
require "../include/rte.php";
check_authorize($g_user["level"],AUTHORIZE_WEBUSER);


if ( isset($doadd) )
{
	// get all receiver

	$id = $db->nextId('weborg_job');
	$_from_job_id = $id;
	$_entrydate = date("Ymd");
	$_entrytime = date("His");
	$_effectivedate = txt2date($effectivedate);
	$_effectivetime = $effectivehour;
	$_from_user = $g_user["user_id"];
	$_sendto_type = -1;
	if ( $sel_user_id == -1 )	{ $_sendto_type = 0; $_sendto_id =0; }
	else if ( $sel_user_id > 0 ) { $_sendto_type = 1; $_sendto_id =$sel_user_id; }
	else if (  $multi_sendto ) { $_sendto_type = 1; $_sendto_id =0; /* get real user_id in loop */ }
	else if ( $sel_dep_id ) { $_sendto_type = 2; $_sendto_id =$sel_dep_id; }
	else if ( $sel_group_id ) { $_sendto_type = 3; $_sendto_id =$sel_group_id; }
	
	$job_size = 420;
	if ( isset($fileattach1) ) $job_size += $fileattach1_size;
	if ( isset($fileattach2) ) $job_size += $fileattach2_size;
	if ( isset($fileattach3) ) $job_size += $fileattach3_size;
	$job_size += strlen($txtContent);
// NON-RESERVE ROOM TX
// save send item
if ( $_sendto_type ==  -1 )
{
	// no receiver
	$showmsg = "#eไม่มีผู้รับ - ข้อมูลจะไม่ถูกบันทึก";
	$mode = "result";
}
else if ( $g_user["usage_space"] + $job_size > $limit_space )
{
	$showmsg = "#eเนื้อที่เก็บข้อมูลเต็ม  ไม่สามารถบันทึกข้อมูลได้";
	$mode = "result";
}
else
{
	// Can find receiver , save source to OutBox
	$_job_user_id = $g_user["user_id"];
	$sql = "insert into weborg_job(job_id,job_type,entrydate,entrytime,effectivedate,effectivetime,room_id,from_time,to_time,".
				" job_title,job_detail,job_folder,job_user_id,from_user,sendto_type,sendto_id,read_status,job_size,from_job_id) ".
				"values ('$id','$job_type','$_entrydate','$_entrytime','$_effectivedate','$_effectivetime',$sel_room_id,'$sel_from_time','$sel_to_time',".
				"'$title','$txtContent',1,$_job_user_id,$_from_user,$_sendto_type,$_sendto_id,1,$job_size,0 )";
	$db->query($sql); 
	// save file attachment
	$usepath = "../data/attach/".$g_user["user_id"]."/$id/";
	mkDirE($usepath);
	chmod($usepath,755);
	if ( $fileattach1_name )
	{
		$fileattach1_name = rawurlencode($fileattach1_name);
		copy($fileattach1,$usepath.$fileattach1_name);
		$id3 = $db->nextId('weborg_attachment');
		$sql = "insert into weborg_attachment(attach_id,job_id,filename,filesize) values ($id3,'$id','$fileattach1_name','$fileattach1_size')";
		$db->query($sql); 
	}
	if ( $fileattach2_name ) 
	{
		$fileattach2_name = rawurlencode($fileattach2_name);
		copy($fileattach2,$usepath.$fileattach2_name);
		$id3 = $db->nextId('weborg_attachment');
		$sql = "insert into weborg_attachment(attach_id,job_id,filename,filesize) values ($id3,'$id','$fileattach2_name','$fileattach2_size')";
		$db->query($sql); 
	}
	if ( $fileattach3_name ) 
	{
		$fileattach3_name = rawurlencode($fileattach3_name);
		copy($fileattach3,$usepath.$fileattach3_name);
		$id3 = $db->nextId('weborg_attachment');
		$sql = "insert into weborg_attachment(attach_id,job_id,filename,filesize) values ($id3,'$id','$fileattach3_name','$fileattach3_size')";
		$db->query($sql); 
	}
	// save to receiver
	switch($_sendto_type)
	{
	// send to everyone
	case 0: $sql = "select user_id,user_name,usage_space FROM weborg_user WHERE user_status=1"; break;
	// send to someone
	case 1: 
	{
		if ( $sel_user_id > 0 )
			$sql = "select user_id,user_name,usage_space FROM weborg_user WHERE user_status=1 AND user_id =$_sendto_id"; 
		else 
		{
			$st = "";
			$tmp = explode(";",$multi_sendto);
			for ( $i = 0 ; $i<count($tmp) ; $i++ )
			{
				$st .= " or user_id=$tmp[$i]";
			}
			$sql = "select user_id,user_name,usage_space FROM weborg_user WHERE user_status=1 AND (".substr($st,3).")"; 
		}
	}
	break;
	// send to everyone in department
	case 2: $sql = "select user_id,user_name,usage_space FROM weborg_user WHERE user_status=1 AND dep_id=$_sendto_id"; break;
	// send to everyone in group
	case 3: $sql = "select weborg_user.user_id,user_name,usage_space FROM weborg_group_assign LEFT JOIN weborg_user ON weborg_user.user_id=weborg_group_assign.user_id WHERE user_status=1 AND group_id=$_sendto_id"; break;
	}
	$res = $db->query($sql);
	$countsend=0;
	$showmsg = "";
	while ( $rs = $res->fetchRow(DB_FETCHMODE_OBJECT)  )
	{
		// check uage quota / id before send
		if ( $rs->usage_space + $job_size > $limit_space ) 
		{
			$showmsg .= ", ".putuserimage($rs->user_id,"s")." <font color='red'>".$rs->user_name."</font>";
			continue;
		}
		$countsend++;
		$showmsg .= ", ".putuserimage($rs->user_id,"s")." ".$rs->user_name;
		// save data to that one
		$_job_user_id = $rs->user_id;
		if ( $multi_sendto ) $_sendto_id = $rs->user_id;
		if ( !$_job_user_id ) break;
		$id2 = $db->nextId('weborg_job');
		$sql = "insert into weborg_job(job_id,job_type,entrydate,entrytime,effectivedate,effectivetime,room_id,from_time,to_time,".
					" job_title,job_detail,job_folder,job_user_id,from_user,sendto_type,sendto_id,read_status,job_size,from_job_id) ".
					" values ($id2,'$job_type','$_entrydate','$_entrytime','$_effectivedate','$_effectivetime',$sel_room_id,'$sel_from_time','$sel_to_time',".
					" '$title','$txtContent',0,$_job_user_id,$_from_user,$_sendto_type,$_sendto_id,0,$job_size,$_from_job_id )";
		$db->query($sql);
		// save attachment table
		$usepath = "../data/attach/".$rs->user_id."/$id2/";
		mkDirE($usepath);
		chmod($usepath,755);
		if ( $fileattach1_name )
		{
			$fileattach1_name = rawurlencode($fileattach1_name);
			copy($fileattach1,$usepath.$fileattach1_name);
			$id3 = $db->nextId('weborg_attachment');
			$sql = "insert into weborg_attachment(attach_id,job_id,filename,filesize) values ($id3,'$id2','$fileattach1_name','$fileattach1_size')";
			$db->query($sql); 
		}
		if ( $fileattach2_name ) 
		{
			$fileattach2_name = rawurlencode($fileattach2_name);
			copy($fileattach2,$usepath.$fileattach2_name);
			$id3 = $db->nextId('weborg_attachment');
			$sql = "insert into weborg_attachment(attach_id,job_id,filename,filesize) values ($id3,'$id2','$fileattach2_name','$fileattach2_size')";
			$db->query($sql); 
		}
		if ( $fileattach3_name ) 
		{
			$fileattach3_name = rawurlencode($fileattach3_name);
			copy($fileattach3,$usepath.$fileattach3_name);
			$id3 = $db->nextId('weborg_attachment');
			$sql = "insert into weborg_attachment(attach_id,job_id,filename,filesize) values ($id3,'$id2','$fileattach3_name','$fileattach3_size')";
			$db->query($sql); 
		}
		// update usage space for that user
		$sql = "update weborg_user set usage_space=".($rs->usage_space+$job_size)." where user_id=".$rs->user_id;
		$db->query($sql);
	}
	$res->free();

	if ( $showmsg ) $showmsg = substr($showmsg,1);
	if ( $keyid = $id ) 
		$showmsg = "ข้อความส่งเรียบร้อยแล้ว รายชื่อผู้ที่ส่งไปมีดังนี้ <br><br>".$showmsg;
	else
		$showmsg = "#eไม่สามารถบันทึกข้อมูลได้";

	$mode = "result";
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
<script language=JavaScript src="../include/rte.js"></script>
<script language=JavaScript src="/include/calendar.js"></script>
<script language=JavaScript src="/include/valid.js"></script>
<script language=JavaScript src="/include/alert.js"></script>
<script language="JavaScript" type="text/JavaScript" src="/include/overlib_mini.js"></script>
<script language="JavaScript">
<!--
function verifySubmit(obj) 
{
if ( !confirm('ต้องการส่งข้อความหรือไม่?') )  return false;
if (isHTMLMode){alert("Please uncheck 'Edit HTML'");return false;}
document.myform.txtContent.value = idContent.document.body.innerHTML;
document.myform.bgg.value =idContent.document.body.bgColor;
if (document.myform.txtContent.value.length > 400000 )
{
	alert("ข้อความของท่านยาวเกินไป");
	return false;
}	
if (document.myform.txtContent.value.length <= 0 )
{
	alert("กรุณาใส่ข้อความ");
	return false;
}
if (obj.effectivedate.value.length <= 0 )
{
	alert("กรุณาใส่วันที่ที่มีผล");obj.effectivedate.focus();
	return false;
}	
if (obj.title.value.length <= 0 )
{
	alert("กรุณาใส่หัวเรื่อง");obj.title.focus();
	return false;
}	
if ( obj.sel_dep_id.value.length <= 0 && obj.sel_group_id.value.length <=0 && obj.sel_user_id.value.length <=0 && obj.multi_sendto.value.length <=0 )
{
	alert("กรุณาระบุผู้รับ");obj.sel_user_id.focus();
	return false;
}	

if(!checkFormatDate(obj.effectivedate,'วันที่ไม่ถูกต้อง')) return false;
if( obj.job_type.value == 4 )
{
	if ( obj.sel_room_id.value <= 0 )
	{
		alert("กรุณาเลือกห้องประชุม"); obj.sel_room_id.focus();
		return false;
	}
}
return true;
}	
//-->
</script>
<script>
function PopupSelectUser()
{
	if ( document.myform.sel_dep_id.value.length > 0 ) 
		win=window.open("sel_user.php?target=multi_sendto&sel_dep_id="+document.myform.sel_dep_id.value,"WIN","scrollbars=yes,resizable=yes,status=no,toolbar=no,location=no,menu=no,width=240,height=320");
	else if ( document.myform.sel_group_id.value.length > 0 )
		win=window.open("sel_user.php?target=multi_sendto&sel_group_id="+document.myform.sel_group_id.value,"WIN","scrollbars=yes,resizable=yes,status=no,toolbar=no,location=no,menu=no,width=240,height=320");
	else 
		win=window.open("sel_user.php?target=multi_sendto","WIN","scrollbars=yes,resizable=yes,status=no,toolbar=no,location=no,menu=no,width=240,height=320");
}
function PopupRoom()
{
	
	if ( document.myform.effectivedate.value.length <= 0 )
	{
		alert("กรุณาเลือกวันที่ก่อน");
		return;
	} 
	if ( document.myform.sel_room_id.value <= 0 )
	{
		alert("กรุณาเลือกห้องประชุมก่อน");
		return;
	} 
	
	win=window.open("check_room.php?room_id="+document.myform.sel_room_id.value+"&effectivedate="+document.myform.effectivedate.value,"WIN","scrollbars=yes,resizable=yes,status=no,toolbar=no,location=no,menu=no,width=400,height=520");
}
</script>
</head>

<body>
<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
<? include("../include/top.php"); ?>
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0" background="../images/main_body.gif">
<tr>
<td width="184" valign="top">
<? include("../include/left.php"); ?></td>
    <td valign="top">
      <?  include("../include/user.php"); ?>
	  <form action="" method="post" enctype="multipart/form-data" name="myform">
	    <table width="580" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td class="largetext" align="left">&nbsp;&nbsp;
<?
if ( $job_id )
{
	$sql = "update weborg_job set read_status = 1 where job_id=$job_id";
	$db->query($sql);

	$sql = "select weborg_job.job_id,job_type,job_folder,weborg_user.user_id,title,user_name,user_surname,effectivedate,effectivetime,entrydate,from_user, ".
			"from_time,to_time,room_name,job_title,job_detail,sendto_type,sendto_id,read_status,job_type,job_folder from weborg_job ".
			" left join weborg_room on weborg_room.room_id=weborg_job.room_id ".
			" left join weborg_user on weborg_user.user_id=weborg_job.from_user where job_id=$job_id";
	$res = $db->query($sql);
	$rs = $res->fetchRow(DB_FETCHMODE_OBJECT);
	$job_type = $rs->job_type;
	$job_folder = $rs->job_folder;
}
?>
<? 
if ( $job_folder == 5 )
	echo "<img src='/images/ico_page.gif' align='absmiddle' width=32 height=32> ปฏิทินรวม";
else if ( $job_folder == 4 )
	echo "<img src='/images/ico_item.gif' align='absmiddle' width=32 height=32> ปฏิทินส่วนตัว";
else if ( $job_type == 1 )
	echo "<img src='/images/ico_article.gif' align='absmiddle' width=32 height=32> บันทึกผลการประชุม";
else if ( $job_type == 2 )
	echo "<img src='/images/ico_announce.gif' align='absmiddle' width=32 height=32> แจ้งประกาศต่างๆ";
else if ( $job_type == 3 )
	echo "<img src='/images/ico_stick.gif' align='absmiddle' width=32 height=32> แจ้งนัดหมาย";
else if ( $job_type == 4 )
	echo "<img src='/images/ico_url.gif' align='absmiddle' width=32 height=32> จองห้องประชุม";
else if ( $job_type == 5 )
	echo "<img src='/images/ico_note.gif' align='absmiddle' width=32 height=32> ส่งข้อความทั่วไป";
?>			</td>
          </tr>
          <tr>
            <td height="36">
<!-- Start inside display -->
<? 
if ( $mode == "add" ) 
{ 
?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr> 
<td height="36" colspan="2">
<input type="hidden" name="ignoreurl" value="1">
<input name="backurl" type="hidden" value="<? if ( $saveurl==1 ) echo $g_user["lasturl"]; else echo $backurl; ?>"> 
<img src="/images/arrow_red.gif" width="16" height="16">
<input name="doadd" type="submit" value="&nbsp;&nbsp;&nbsp; ส่ง &nbsp;&nbsp;&nbsp;" onclick="return verifySubmit(document.myform);"> 
<img src="/images/arrow_red.gif" width="16" height="16">
<input name="cancel" type="reset" value="ลบหน้าจอ"> 
<? if ( $g_user["lasturl"] != "" ) { ?>
<img src="/images/arrow_red.gif" width="16" height="16"><input name="goback" type="button" value="ย้อนกลับ" onclick="location.href='<?=$g_user["lasturl"]?>'"> 
<? } ?></td>
</tr>
</table>
<table width="570" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="5"><img src="/images/win_edge1.gif"></td>
    <th background="/images/win_bkhead.gif" class="text3">รายละเอียดข้อความ</th>
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
                        <td height="24">&nbsp;ผู้ส่ง </td>
                        <td colspan="3"><b> 
                          <?=putuserimage($g_user["user_id"],"m")?>
                          <?=$g_user["title"]?>
                          <?=$g_user["user_name"]?>
                          <?=$g_user["user_surname"]?>
                          </b></td>
                      </tr>
                      <tr> 
                        <td height="24">วันที่ส่ง<b></b></td>
                        <td width="21%"><b> 
                          <?=showshortthaidate(curdate())?>
                          </b></td>
                        <td width="27%">เวลา 
                          <select name="effectivehour">
                            <option value="0600">6:00</option>
                            <option value="0700">7:00</option>
                            <option value="0800">8:00</option>
                            <option value="0900" selected>9:00</option>
                            <option value="1000">10:00</option>
                            <option value="1100">11:00</option>
                            <option value="1200">12:00</option>
                            <option value="1300">13:00</option>
                            <option value="1400">14:00</option>
                            <option value="1500">15:00</option>
                            <option value="1600">16:00</option>
                            <option value="1700">17:00</option>
                            <option value="1800">18:00</option>
                            <option value="1900">19:00</option>
                            <option value="2000">20:00</option>
                            <option value="2100">21:00</option>
                            <option value="2200">22:00</option>
                          </select></td>
                        <td width="41%">วันที่มีผล<span class="redtext">*</span> 
                          <input name="effectivedate" type="text" value="<?=$effectivedate?>" size="10" maxlength="10"> 
                          <a href="#" onClick="g_Calendar.hide(); g_Calendar.show(event,'myform.effectivedate', false, 'dd/mm/yyyy');  return false;"><img src="../images/ico_calendar.gif" border="0" align="absmiddle"></a></td>
                      </tr>
                      <tr> 
                        <td width="11%" height="24">&nbsp;ถึง<span class="redtext">*</span><b> 
                          </b></td>
                        <td> <b> </b>เลือกตามแผนก </td>
                        <td colspan="2"><select name="sel_dep_id" onChange="document.myform.sel_group_id.value='';document.myform.sel_user_id.value='';document.myform.multi_sendto.value='';document.myform.multi_sendtoname.value=''">
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
                          </select> </td>
                      </tr>
                      <tr> 
                        <td height="24">&nbsp;</td>
                        <td> เลือกตามกลุ่ม </td>
                        <td colspan="2"><select name="sel_group_id" onChange="document.myform.sel_dep_id.value='';document.myform.sel_user_id.value='';document.myform.multi_sendto.value='';document.myform.multi_sendtoname.value=''">
                            <option value="">- - - - -</option>
                            <?
$sql = "select group_id,group_name from weborg_group order by group_name";
$res2 = $db->query($sql);
if ( !DB::IsError($res2) ) {
while ( $rs2 = $res2->fetchRow(DB_FETCHMODE_OBJECT) )  {
?>
                            <option value="<?=$rs2->group_id?>" <? if  ($rs2->group_id == $sel_group_id ) echo "selected"; ?>> 
                            <?=$rs2->group_name?>
                            </option>
                            <? }  } $res2->free(); ?>
                          </select> </td>
                      </tr>
                      <tr> 
                        <td height="24">&nbsp;</td>
                        <td>เลือกตามบุคคล </td>
                        <td colspan="2"><select name="sel_user_id" onChange="document.myform.sel_group_id.value='';document.myform.sel_dep_id.value='';document.myform.multi_sendto.value='';document.myform.multi_sendtoname.value=''">
                            <option value="">- - - - -</option>
                            <? if ( !$sel_dep_id && !$sel_group_id ) { ?>
                            <option value="-1">- - - ส่งให้ทุกคน - - -</option>
                            <? } ?>
                            <?
if ( !$sel_group_id && !$sel_dep_id )  
	$sql = "select user_id,title,user_name,user_surname from weborg_user order by user_name,user_surname";
else if ( $sel_dep_id )
	$sql = "select weborg_user.user_id,title,user_name,user_surname from weborg_user  left join weborg_department on weborg_department.dep_id=weborg_user.dep_id where weborg_department.dep_id=$sel_dep_id order by user_name,user_surname";
else if ( $sel_group_id )
	$sql = "select weborg_user.user_id,title,user_name,user_surname from weborg_user  left join weborg_group_assign on weborg_group_assign.user_id=weborg_user.user_id where weborg_group_assign.group_id=$sel_group_id order by user_name,user_surname";
$res2 = $db->query($sql);
if ( !DB::IsError($res2) ) {
while ( $rs2 = $res2->fetchRow(DB_FETCHMODE_OBJECT) )  {
?>
                            <option value="<?=$rs2->user_id?>" <? if ( $sel_user_id == $rs2->user_id ) echo "selected"; ?>> 
                            <?=$rs2->title." ".$rs2->user_name." ".$rs2->user_surname?>
                            </option>
                            <? }  } $res2->free(); ?>
                          </select> <input name="selectuser" type="button" id="selectuser4" value="เลือกส่งจากรายชื่อ" onClick="PopupSelectUser()"></td>
                      </tr>
                      <tr> 
                        <td height="24">&nbsp;</td>
                        <td>บุคคลตามที่เลือก 
                          <input name="multi_sendto" type="hidden"></td>
                        <td colspan="2"><textarea name="multi_sendtoname" cols="40" rows="4" readonly="readonly" id="multi_sendtoname2" onChange="document.myform.sel_user_id.value='';document.myform.sel_dep_id.value='';document.myform.sel_group_id.value=''"></textarea> 
                          <input name="dodelmultiname" type="button" id="dodelmultiname" value="ลบรายชื่อ" onClick="document.myform.multi_sendto.value='';document.myform.multi_sendtoname.value='';"></td>
                      </tr>
                      <?
if ( $job_type == 4 ) {
?>
                      <tr> 
                        <td>&nbsp;ห้องประชุม<span class="redtext">*</span></td>
                        <td colspan="3"><select name="sel_room_id">
                            <option value="0">- - - - -</option>
                            <?
$sql = "select room_id,room_name from weborg_room order by room_name";
$res2 = $db->query($sql);
if ( !DB::IsError($res2) ) {
while ( $rs2 = $res2->fetchRow(DB_FETCHMODE_OBJECT) )  {
?>
                            <option value="<?=$rs2->room_id?>" <? if  ($rs2->room_id == $sel_room_id ) echo "selected"; ?>> 
                            <?=$rs2->room_name?>
                            </option>
                            <? }  } $res2->free(); ?>
                          </select>
                          ตั้งแต่เวลา<span class="redtext">*</span> <select name="sel_from_time">
                            <option value="0800">8:00</option>
                            <option value="0900">9:00</option>
                            <option value="1000">10:00</option>
                            <option value="1100">11:00</option>
                            <option value="1200">12:00</option>
                            <option value="1300">13:00</option>
                            <option value="1400">14:00</option>
                            <option value="1500">15:00</option>
                            <option value="1600">16:00</option>
                            <option value="1700">17:00</option>
                            <option value="1800">18:00</option>
                            <option value="1900">19:00</option>
                            <option value="2000">20:00</option>
                          </select>
                          ถึงเวลา<span class="redtext">*</span> <select name="sel_to_time">
                            <option value="0800">8:00</option>
                            <option value="0900">9:00</option>
                            <option value="1000">10:00</option>
                            <option value="1100">11:00</option>
                            <option value="1200">12:00</option>
                            <option value="1300">13:00</option>
                            <option value="1400">14:00</option>
                            <option value="1500">15:00</option>
                            <option value="1600">16:00</option>
                            <option value="1700">17:00</option>
                            <option value="1800">18:00</option>
                            <option value="1900">19:00</option>
                            <option value="2000">20:00</option>
                          </select> <input name="checkroom" type="button" id="checkroom" value="ตรวจสอบห้องประชุม" onClick="PopupRoom()"></td>
                      </tr>
                      <? } else { ?>
                      <tr> 
                        <td> <input type="hidden" name="sel_room_id" value="0"> 
                          <input type="hidden" name="sel_from_time" value=""> 
                          <input type="hidden" name="sel_to_time" value=""> </td>
                      </tr>
                      <? } ?>
                      <tr> 
                        <td height="24">&nbsp;หัวเรื่อง<span class="redtext">*</span></td>
                        <td colspan="3"> 
                          <?
if ( $reply_job_id ) 
{
	$sql = "select job_title from weborg_job where job_id=$reply_job_id";
	$resrf = $db->query($sql);
	$rsrf = $resrf->fetchRow(DB_FETCHMODE_OBJECT);
	$title = "Re: ".$rsrf->job_title;
	$resrf->free();
}
if ( $forward_job_id ) 
{
	$sql = "select job_title from weborg_job where job_id=$forward_job_id";
	$resrf = $db->query($sql);
	$rsrf = $resrf->fetchRow(DB_FETCHMODE_OBJECT);
	$title = "Fwd: ".$rsrf->job_title;
	$resrf->free();
}
?>
                          <input name="title" type="text" value="<?=$title?>" size="60"></td>
                      </tr>
                      <tr bgcolor="#D9E7EE"> 
                        <td height="20" colspan="4">&nbsp;<img src="../images/ico_smallinfo.gif"> 
                          ใส่ข้อความ </td>
                      </tr>
                      <tr> 
                        <td valign="top">&nbsp;</td>
                        <td colspan="3">
                          <? 
	if ( $reply_job_id ) 
		TemplateDocumentFile("getjobcontent.php?id=$reply_job_id");
	else if ( $forward_job_id ) 
		TemplateDocumentFile("getjobcontent.php?id=$forward_job_id");	
	else
		TemplateDocumentFile("getjobcontent.php?id=$job_id");
		
		echo $org_job_id;
	?>
                          <input type="hidden" name="idContent" value=""> <input type="hidden" name="bgg" value=""> 
                          <input type="hidden" name="txtContent"  value=""> </td>
                      </tr>
                      <tr> 
                        <td height="24">&nbsp;</td>
                        <td colspan="3">&nbsp;เอกสารแนบ 1 
                          <input type="file" name="fileattach1"></td>
                      </tr>
                      <tr> 
                        <td height="24">&nbsp;</td>
                        <td colspan="3">&nbsp;เอกสารแนบ 2 
                          <input type="file" name="fileattach2"></td>
                      </tr>
                      <tr> 
                        <td height="24">&nbsp;</td>
                        <td colspan="3">&nbsp;เอกสารแนบ 3 
                          <input type="file" name="fileattach3"></td>
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
</table>
<? } else if ( $mode == "view" ) {  ?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="36" colspan="2">
      <input type="hidden" name="ignoreurl" value="1">
      <input name="backurl" type="hidden" value="<? if ( $saveurl==1 ) echo $g_user["lasturl"]; else echo $backurl; ?>">
      <img src="/images/arrow_red.gif" width="16" height="16">
      <input name="doreply" type="button" value=" ตอบกลับ " onclick="location.href='/organizer/job.php?mode=add&job_type=<?=$job_type?>&effectivedate=<?=showdate($rs->effectivedate)?>&sel_user_id=<?=$rs->from_user?>&reply_job_id=<?=$rs->job_id?>&saveurl=1'">
      <img src="/images/arrow_red.gif" width="16" height="16">
      <input name="doforward" type="button" value=" ส่งต่อ " onclick="location.href='/organizer/job.php?mode=add&job_type=<?=$job_type?>&effectivedate=<?=showdate($rs->effectivedate)?>&sel_user_id=<?=$rs->from_user?>&forward_job_id=<?=$rs->job_id?>&saveurl=1'">
      <? if ( $g_user["lasturl"] != "" ) { ?>
      <img src="/images/arrow_red.gif" width="16" height="16">
      <input name="goback" type="button" value="ย้อนกลับ" onclick="location.href='<?=$g_user["lasturl"]?>'">
      <? } ?></td>
  </tr>
</table>
<table width="570" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="5"><img src="/images/win_edge1.gif"></td>
    <th background="/images/win_bkhead.gif" class="text3">รายละเอียดข้อความ</th>
    <td width="6"><img src="/images/win_edge2.gif"></td>
  </tr>
  <tr>
    <td background="/images/win_bkleft.gif">&nbsp;</td>
    <td>
	
	
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="24">&nbsp;ผู้ส่ง </td>
        <td colspan="3"><b><a href="userinfo.php?mode=view&user_id=<?=$rs->user_id?>&saveurl=1">
          </a>
            <?=putuserimage($rs->user_id,"m")?>
            <a href="userinfo.php?mode=view&user_id=<?=$rs->user_id?>&saveurl=1">
            <?
echo $rs->title." ".$rs->user_name." ".$rs->user_surname;
?>
            </a> </b></td>
        </tr>
      <tr>
        <td height="24">&nbsp;วันที่ส่ง<b>        </b></td>
        <td><b>
          <?=showshortthaidate($rs->entrydate)?>
        </b></td>
        <td>วันที่มีผล<b>
        </b></td>
        <td><b>
          <?=showshortthaidate($rs->effectivedate)?>
        </b>
          <? if ( $rs->effectivetime ) echo " เวลา <b>".showtime($rs->effectivetime)."</b>";?></td>
      </tr>
      <tr>
        <td height="24">&nbsp;ถึง</td>
        <td colspan="3"> <b>
          <? 
	if ( $rs->sendto_type == 0 ) 
	{
		echo "<img src='/images/ico_group.gif'><img src='/images/ico_group.gif'> [ ทุกคน ]";
	}
	else if ( $rs->sendto_type == 1 )
	{
		$sql = "select title,user_name,user_surname from weborg_user where user_id=".$rs->sendto_id;
		$res2 = $db->query($sql);
		$rs2 = $res2->fetchRow(DB_FETCHMODE_OBJECT);
		echo "<img src='/images/ico_profile.gif'> บุคคล : ".$rs2->title." ".$rs2->user_name." ".$rs2->user_surname;
		$res2->free();
	}
	else if ( $rs->sendto_type == 2 )
	{
		$sql = "select dep_name from weborg_department where dep_id=".$rs->sendto_id;
		$res2 = $db->query($sql);
		$rs2 = $res2->fetchRow(DB_FETCHMODE_OBJECT);
		echo "<img src='/images/ico_group.gif'> แผนก ".$rs2->dep_name;
		$res2->free();
	}
	else if ( $rs->sendto_type == 3 )
	{
		$sql = "select group_name from weborg_group where group_id=".$rs->sendto_id;
		$res2 = $db->query($sql);
		$rs2 = $res2->fetchRow(DB_FETCHMODE_OBJECT);
		echo "กลุ่ม ".$rs2->group_name;
		$res2->free();
	}
?>
        </b> </td>
      </tr>
      <? if ( $rs->from_user == $g_user["user_id"] ) { 
$sql = "select user_id,title,user_name,user_surname,read_status ".
		" from weborg_user inner join weborg_job on weborg_job.job_user_id=weborg_user.user_id ".
		" where weborg_job.from_job_id=".$job_id;
$res2 = $db->query($sql);
if ( !DB::IsError($res2) && $res2->numRows() >0 ) {
?>
      <div id="allrecipient">
        <tr>
          <td height="24">&nbsp;</td>
          <td colspan="3"> ผู้รับทั้งหมด ( <img src="/images/ico_read.gif"> เปิดอ่านแล้ว/ <img src="/images/ico_unread.gif"> ยังไม่เปิดอ่าน)<br>
              <?
$line = 0;
while ( $rs2 = $res2->fetchRow(DB_FETCHMODE_OBJECT) )
{
	$line++;
	if ( $rs2->read_status ) 
		echo "<img src='/images/ico_read.gif'> ";
	else
		echo "<img src='/images/ico_unread.gif'> ";
?>
              <a href="userinfo.php?mode=view&user_id=<?=$rs2->user_id?>&saveurl=1">
              <?		
	echo $rs2->title." ".$rs2->user_name." ".$rs2->user_surname." ";
?>
              </a>
              <?	
	if ( ($line-1) %3 == 2 ) echo "<br>";
}
$res2->free();
?></td>
        </tr>
      </div>
      <? } } ?>
      <? if  ( $rs->job_type == 4 ) {  ?>
      <tr>
        <td height="24">&nbsp;ห้องประชุม</td>
        <td colspan="3"> <b>
          <?=$rs->room_name?>
          </b> &nbsp; ตั้งแต่เวลา <b>
          <?=showtime($rs->from_time)?>
          </b> ถึงเวลา <b>
          <?=showtime($rs->to_time)?>
        </b> </td>
      </tr>
      <? } ?>
      <tr>
        <td height="24">&nbsp;หัวเรื่อง</td>
        <td colspan="3"><b>
          <?=$rs->job_title?>
        </b></td>
      </tr>
      <tr>
        <td colspan="4"><img src="/images/seperator2.gif"></td>
      </tr>
      <tr>
        <td height="24">&nbsp;เอกสารแนบ</td>
        <td colspan="3" rowspan="2" valign="top">
          <?
	$sql = "select weborg_attachment.job_id,filename,filesize,job_user_id ".
			" from weborg_attachment left join weborg_job on weborg_job.job_id=weborg_attachment.job_id where weborg_attachment.job_id=".$job_id;
	$res2 = $db->query($sql);
	$linecount= 0;
	while ( $rs2 = $res2->fetchRow(DB_FETCHMODE_OBJECT) )
	{
		$linecount++;
		echo "<img src='/images/ico_disk.gif' align='absmiddle'> ".
			"<a target=\"_blank\" href='/data/attach/".$rs2->job_user_id."/".$rs2->job_id."/".rawurlencode($rs2->filename)."'><b>".$rs2->filename."</b></a>  (".(int)($rs2->filesize / 1024)."KB) &nbsp;&nbsp;&nbsp;";
	}
	$res2->free();
	if ( $linecount == 0 ) echo "-";
?>
        </td>
      </tr>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td height="24">&nbsp;ข้อความ</td>
        <td colspan="3" rowspan="3" valign="top"><?=$rs->job_detail?></td>
      </tr>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="15%">&nbsp;</td>
        <td width="29%">&nbsp;</td>
        <td width="15%">&nbsp;</td>
        <td width="41%">&nbsp;</td>
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
<? } else if ( $mode == "result" ) { 
$backurl = "/organizer/index.php";
?>
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
<input type="hidden" name="job_type" value="<?=$job_type?>">
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
<? if ( $mode == "add" ) { ?>
<script>idContent.document.designMode="On";</script>
<? } else if ( $mode == "edit" ) { ?>
<script>idContent.document.designMode="On";</script>
<? } else { ?>
<? } ?>
</body>
</html>
<? include("../include/disconnect.php"); ?>