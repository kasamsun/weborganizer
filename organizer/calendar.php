<? 
include("../include/connect.php"); 
include("../include/util.php");
check_authorize($g_user["level"],AUTHORIZE_WEBUSER);


// monthly , daily
if ( !isset($mode) ) $mode = "monthly";
// mbox , pvcal , pbcal
if ( !isset($msgtype) ) $msgtype = "mbox";

if ( $mode == "del" && $job_id )
{
	$sql = "delete from weborg_job where job_id = $job_id";
	$res = $db->query($sql);
	if ( $db->affectedRows() ) 
		$showmsg = "ลบข้อความปฏิทินเรียบร้อย";
	else
		$showmsg = "#eไม่สามารถลบข้อความในปฏิทินได้";

	$mode = "result";
}

if ( $dosavecalendar )
{
	if ( !$addday ) $addday = txt2date($selday."/".$selmonth."/".$selyear);
	$id = $db->nextId('weborg_job');
	$_job_user_id = $g_user["user_id"];
	$job_size = strlen($adddetail)+420;
	if ( $msgtype == "pvcal" ) $job_folder = 4; else $job_folder = 5;
	$sql = "insert into weborg_job(job_id,job_type,entrydate,entrytime,effectivedate,effectivetime,room_id,from_time,to_time,".
				" job_title,job_detail,job_folder,job_user_id,from_user,sendto_type,sendto_id,read_status,job_size,from_job_id) ".
				"values ('$id','5','".date("Ymd")."','".date("His")."','$addday','$addhour',0,'','',".
				"'$addtitle','$adddetail',$job_folder,$_job_user_id,$_job_user_id,1,0,1,$job_size,0 )"; 
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
<style type="text/css">
<!--
.style5 {color: #FFFFFF}
-->
</style>
</head>
<script>
function check_savecal(ob)
{
	if ( ob.addtitle.value.length <= 0 ) 
	{
		alert("กรุณาใส่หัวเรื่อง");
		return false;
	}
	if ( ob.adddetail.value.length <= 0 ) 
	{
		alert("กรุณาใส่ข้อความ");
		return false;
	}
	return true;
}
</script>
<body>
<? include("../include/top.php"); ?>
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0" background="../images/main_body.gif">
<tr>
<td width="184" valign="top">
<? include("../include/left.php"); ?></td>
<td valign="top">
      <?  include("../include/user.php"); ?>
	  <form name="myform" method="post" action="">
	    <table width="580" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td class="largetext">&nbsp;&nbsp;<img src='/images/ico_calendarb.gif' align='absmiddle'>
<? if ( $mode == "monthly" ) echo " ปฏิทินรายเดือน"; 
else if ( $mode=="daily" ) echo "  ปฏิทินประจำวัน"; 
?>
</td>
          </tr>
          <tr>
            <td background="../images/bg-fadeblue.gif">
              <!-- Start inside display -->
<? if ( $mode == "monthly" ) { ?>			  
<?
if ( !isset($offset) ) $offset = 0;
// first day of month
$dd = mktime(0, 0, 0, date("m")+$offset  , 1, date("Y"));
$curmonth = date("n",$dd);
$curyear = date("Y",$dd);
// first day of calendar
$dd = mktime(0, 0, 0, date("m")+$offset  , 1-date("w",$dd) , date("Y"));

$datatmp = array();
if ( $msgtype == "mbox" )
	$sql = "select weborg_job.job_id,entrydate,effectivedate,job_title,job_type,job_folder,read_status,job_size,job_detail,from_user,user_name ".
		" from_user_name from weborg_job left join weborg_user on weborg_user.user_id=weborg_job.from_user ".
		" where (job_folder=0 or job_folder=1 or job_folder=2) and job_user_id=".$g_user["user_id"];
else if ( $msgtype == "pvcal" )
	$sql = "select weborg_job.job_id,entrydate,effectivedate,job_title,job_type,job_folder,read_status,job_size,job_detail,from_user,user_name ".
		" from_user_name from weborg_job left join weborg_user on weborg_user.user_id=weborg_job.from_user ".
		" where job_folder=4 and job_user_id=".$g_user["user_id"];
else if ( $msgtype == "pbcal" )
	$sql = "select weborg_job.job_id,entrydate,effectivedate,job_title,job_type,job_folder,read_status,job_size,job_detail,from_user,user_name ".
		" from_user_name from weborg_job left join weborg_user on weborg_user.user_id=weborg_job.from_user ".
		" where job_folder=5";		
else if ( $sel_user_id > 0 ) 
	$sql = "select weborg_job.job_id,entrydate,effectivedate,job_title,job_type,job_folder,read_status,job_size,job_detail,from_user,user_name ".
		" from_user_name from weborg_job left join weborg_user on weborg_user.user_id=weborg_job.from_user ".
		" where job_folder=4 and job_user_id=".$sel_user_id;

		
$res = $db->query($sql);
if ( !DB::IsError($res) ) 
{
while ( $rs = $res->fetchRow(DB_FETCHMODE_OBJECT) )
{
	$datatmp[$rs->effectivedate] .= "<br>";
	$datatmp[$rs->effectivedate] .= put_jobicon($rs->job_type,-1,-1,$rs->job_folder);
	$datatmp[$rs->effectivedate] .= " <a title='".$rs->job_title."' href='job.php?mode=view&job_id=".$rs->job_id."&saveurl=1'>".substr($rs->job_title,0,7)."</a>";
	if ( $rs->from_user == $g_user["user_id"] ) 
		$datatmp[$rs->effectivedate] .= "<a title='ลบข้อความ' href='calendar.php?mode=del&job_id=".$rs->job_id."&savecururl=1' onclick=\"return confirm('ลบข้อความ?')\"><img src=\"/images/icon_del.gif\" border=\"0\"></a>";
}
$res->free();
}

function show_date()
{
	global $dd,$datatmp,$curmonth,$curyear,$msgtype,$sel_user_id;
	if ( date("dmY",$dd) == date("dmY") ) echo "<table width=100% height=64 border=0 cellSpacing=0 cellpadding=0 bgcolor='#FFDDFF'><tr><td valign=top align=left>";
	if ( date("nY",$dd) != $curmonth."".$curyear ) echo "<table width=100% height=64 border=0 cellSpacing=0 cellpadding=0 bgcolor='#FFFFFF'><tr><td valign=top align=left>";
	echo "<a href=\"".$PHP_SELF."?mode=daily&msgtype=".$msgtype."&sel_user_id=".$sel_user_id."&date=".date("Ymd",$dd)."&saveurl=1\"><b>";
	echo date("j",$dd)."</b></a> ".$datatmp[date("Ymd",$dd)];
	if ( date("nY",$dd) != $curmonth."".$curyear ) echo "&nbsp;</td></tr></table>";
	if ( date("dmY",$dd) == date("dmY") ) echo "&nbsp;</td></tr></table>";
	$dd = mktime(0, 0, 0, date("m",$dd)  , date("d",$dd)+1 , date("Y",$dd));
}
?>
<table width="570" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="5"><img src="/images/win_edge1.gif"></td>
    <th background="/images/win_bkhead.gif" class="text3">ปฏิทินรายเดือน</th>
    <td width="6"><img src="/images/win_edge2.gif"></td>
  </tr>
  <tr>
    <td background="/images/win_bkleft.gif">&nbsp;</td>
    <td><TABLE width="100%" border=0 cellPadding=1 cellSpacing=0>
      <TBODY>
        <TR>
          <TD colSpan=7 align=left >
            <TABLE cellSpacing=0 cellPadding=3 width="100%" border=0>
              <TBODY>
                <TR>
                  <TD width="6%" rowspan="2" align=left>&nbsp; 
				  <a href="<?=$PHP_SELF?>?offset=<?=$offset-1?>&msgtype=<?=$msgtype?>&sel_user_id=<?=$sel_user_id?>">
				  <SPAN class=Cheader><IMG alt="prev month" src="/images/nav_left.gif" border=0></SPAN></A> </TD>
                  <TD width="28%" rowspan="2"  ><div align="center" class="largetext">
                      <?=$month_name[$curmonth]?>
                      <?=$curyear+543?>
                  </div></TD>
                  <TD width="6%" rowspan="2" align=right ><a href="<?=$PHP_SELF?>?offset=<?=$offset+1?>&msgtype=<?=$msgtype?>&sel_user_id=<?=$sel_user_id?>"><SPAN 
                                class=Cheader><IMG alt="next month" src="/images/nav_right.gif" border=0></SPAN></A> &nbsp; </TD>
                  <TD width="60%" align=right > แสดงปฏิทิน
                      <select name="msgtype" onChange="location.href='calendar.php?offset=<?=$offset?>&msgtype='+document.myform.msgtype.value+'&sel_user_id='"?>
                        <option value=""></option>
                        <option value="pvcal" <? if ( $msgtype == "pvcal" ) echo "selected"; ?>>ปฏิทินส่วนตัว</option>
                        <option value="pbcal" <? if ( $msgtype == "pbcal" ) echo "selected"; ?>>ปฏิทินรวม</option>
                        <option value="mbox" <? if ( $msgtype == "mbox" ) echo "selected"; ?>>กล่องเก็บข้อความ</option>
                      </select>
                  </TD>
                </TR>
                <TR>
                  <TD align=right > แสดงปฏิทินส่วนตัวของ
                      <select name="sel_user_id" onChange="location.href='calendar.php?offset=<?=$offset?>&msgtype=&sel_user_id='+document.myform.sel_user_id.value"?>
                        <option value="0">== ปฏิทินหัวหน้ากลุ่ม ==</option>
                        <?
// select admin of every group and every in our group
$tmp = "0";
$sql = "select weborg_user.user_id,title,user_name,user_surname,group_id ".
	" from weborg_user inner join weborg_group_assign on weborg_group_assign.user_id=weborg_user.user_id ".
	" where group_position=1 ";
$res3 = $db->query($sql);
while ( $rs3 = $res3->fetchRow(DB_FETCHMODE_OBJECT) )
{
	if ( $rs3->user_id == $g_user["user_id"] ) $tmp .= ",".$rs3->group_id;
}
$res3->free();

$sql = "select weborg_user.user_id,title,user_name,user_surname ".
	" from weborg_user inner join weborg_group_assign on weborg_group_assign.user_id=weborg_user.user_id ".
	" where group_position=1 group by weborg_user.user_id ";
$res3 = $db->query($sql);
while ( $rs3 = $res3->fetchRow(DB_FETCHMODE_OBJECT) )
{
?>
                        <option value="<?=$rs3->user_id?>" <? if ( $sel_user_id == $rs3->user_id ) echo "selected"; ?>>
                        <?=$rs3->title." ".$rs3->user_name." ".$rs3->user_surname?>
                        </option>
                        <? }
$res3->free();
 ?>
                        <option value="0">===================</option>
                        <option value="0">== ปฏิทินสมาชิกกลุ่ม ==</option>
                        <?
// select admin of every group and every in our group
$sql = "select weborg_user.user_id,title,user_name,user_surname ".
	" from weborg_user inner join weborg_group_assign on weborg_group_assign.user_id=weborg_user.user_id ".
	" where group_position=0 and group_id in ($tmp) group by weborg_user.user_id";
$res3 = $db->query($sql);
while ( $rs3 = $res3->fetchRow(DB_FETCHMODE_OBJECT) )
{
?>
                        <option value="<?=$rs3->user_id?>" <? if ( $sel_user_id == $rs3->user_id ) echo "selected"; ?>>
                        <?=$rs3->title." ".$rs3->user_name." ".$rs3->user_surname?>
                        </option>
                        <? }
$res3->free();
 ?>
                        <option value="0">===================</option>
                    </select></TD>
                </TR>
              </TBODY>
          </TABLE></TD>
        </TR>
</TABLE>		
<TABLE cellSpacing=1 cellPadding=0 width="100%" border=0 bgcolor="#FFFFFF" >		
        <TR bgcolor="#003366">
          <TD height="27" align="center" class="text2">Sun</TD>
          <TD height="27" align="center" class="text2">Mon</TD>
          <TD height="27" align="center" class="text2">Tue</TD>
          <TD height="27" align="center" class="text2">Wed</TD>
          <TD height="27" align="center" class="text2">Thu</TD>
          <TD height="27" align="center" class="text2">Fri</TD>
          <TD height="27" align="center" class="text2">Sat</TD>
        </TR>
        <TR valign="top">
          <TD width="13%" height="64" bgColor=#D9E7EE><?=show_date();?></TD>
          <TD width="15%" bgColor=#EFF6FA><?=show_date();?></TD>
          <TD width="15%" bgColor=#EFF6FA><?=show_date();?></TD>
          <TD width="15%" bgColor=#EFF6FA><?=show_date();?></TD>
          <TD width="15%" bgColor=#EFF6FA><?=show_date();?></TD>
          <TD width="15%" bgColor=#EFF6FA><?=show_date();?></TD>
          <TD width="14%" bgColor=#D9E7EE><?=show_date();?></TD>
        </TR>
        <TR valign="top">
          <TD height="64" bgColor=#D9E7EE><?=show_date();?></TD>
          <TD bgColor=#EFF6FA><?=show_date();?></TD>
          <TD bgColor=#EFF6FA><?=show_date();?></TD>
          <TD bgColor=#EFF6FA><?=show_date();?></TD>
          <TD bgColor=#EFF6FA><?=show_date();?></TD>
          <TD bgColor=#EFF6FA><?=show_date();?></TD>
          <TD bgColor=#D9E7EE><?=show_date();?></TD>
        </TR>
        <TR valign="top">
          <TD height="64" bgColor=#D9E7EE><?=show_date();?></TD>
          <TD bgColor=#EFF6FA><?=show_date();?></TD>
          <TD bgColor=#EFF6FA><?=show_date();?></TD>
          <TD bgColor=#EFF6FA><?=show_date();?></TD>
          <TD bgColor=#EFF6FA><?=show_date();?></TD>
          <TD bgColor=#EFF6FA><?=show_date();?></TD>
          <TD bgColor=#D9E7EE><?=show_date();?></TD>
        </TR>
        <TR valign="top">
          <TD height="64" bgColor=#D9E7EE><?=show_date();?></TD>
          <TD bgColor=#EFF6FA><?=show_date();?></TD>
          <TD bgColor=#EFF6FA><?=show_date();?></TD>
          <TD bgColor=#EFF6FA><?=show_date();?></TD>
          <TD bgColor=#EFF6FA><?=show_date();?></TD>
          <TD bgColor=#EFF6FA><?=show_date();?></TD>
          <TD bgColor=#D9E7EE><?=show_date();?></TD>
        </TR>
        <TR valign="top">
          <TD height="64"  bgColor=#D9E7EE><?=show_date();?></TD>
          <TD  bgColor=#EFF6FA><?=show_date();?></TD>
          <TD  bgColor=#EFF6FA><?=show_date();?></TD>
          <TD  bgColor=#EFF6FA><?=show_date();?></TD>
          <TD  bgColor=#EFF6FA><?=show_date();?></TD>
          <TD  bgColor=#EFF6FA><?=show_date();?></TD>
          <TD  bgColor=#D9E7EE><?=show_date();?></TD>
        </TR>
        <TR valign="top">
          <TD height="64" bgColor=#D9E7EE><?=show_date();?></TD>
          <TD bgColor=#EFF6FA><?=show_date();?></TD>
          <TD bgColor=#EFF6FA><?=show_date();?></TD>
          <TD bgColor=#EFF6FA><?=show_date();?></TD>
          <TD bgColor=#EFF6FA><?=show_date();?></TD>
          <TD bgColor=#EFF6FA><?=show_date();?></TD>
          <TD bgColor=#D9E7EE><?=show_date();?></TD>
        </TR>
      </TBODY>
    </TABLE></td>
    <td background="/images/win_bkright.gif">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="/images/win_edge3.gif"></td>
    <td background="/images/win_bkbottom.gif"></td>
    <td><img src="/images/win_edge4.gif"></td>
  </tr>
</table>                      
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="19%">&nbsp;</td>
                          <td width="61%">&nbsp;</td>
                          <td width="20%">&nbsp;</td>
                        </tr>
<?
if ( $msgtype == "pvcal" || ( $msgtype == "pbcal" && is_groupadmin()) ) {

?>
                        <tr>
                          <td>&nbsp; บันทึกเรื่องลงปฏิทิน</td>
                          <td><select name="addhour">
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
                          </select>
                            <select name="addday" id="select">
<? 
if ( !isset($offset) ) $offset = 0;
// first day of month
$dd = mktime(0, 0, 0, date("m")+$offset  , 1, date("Y"));
$curmonth = date("n",$dd);
$curyear = date("Y",$dd);
// first day of calendar
$dd = mktime(0, 0, 0, date("m")+$offset  , 1-date("w",$dd) , date("Y"));
for  ( $i= 1 ; $i <= 42 ; $i++ )
{
?>
                              <option value="<?=date("Ymd",$dd)?>"><?=showshortthaidate(date("Ymd",$dd));?></option>
<?  
		$dd = mktime(0, 0, 0, date("m",$dd)  , date("d",$dd)+1 , date("Y",$dd));
}
?>							  
                            </select>
                            <input name="addtitle" type="text" id="addtitle" size="30"><span class="redtext">*</span></td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td><textarea name="adddetail" cols="50" rows="4" id="adddetail"></textarea></td>
                          <td>                            <input name="dosavecalendar" type="submit" value="บันทึกลงปฏิทิน" onclick="return check_savecal(document.myform)">                            <br>                            <br>                            <input name="doclear" type="reset" id="doclear" value="ลบข้อความ">                          </td>
                        </tr>
<? } ?>						
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                      </table>              
                      <? } else if ( $mode == "daily" ) { ?>
<?

if ( !$dogetdate ) 
{
	$selday = (int)substr($date,6,2);
	$selmonth = (int)substr($date,4,2);
	$selyear = (int)substr($date,0,4);
}
$dtoday = mktime(0,0,0,$selmonth,$selday,$selyear);
$today = date("Ymd",$dtoday );
$next_date = date("Ymd",mktime(0, 0, 0, date("m",$dtoday) , date("d",$dtoday)+1 , date("Y",$dtoday)) );
$prev_date = date("Ymd",mktime(0, 0, 0, date("m",$dtoday)  , date("d",$dtoday) -1, date("Y",$dtoday)) );

$datatmp = array();
if ( $msgtype == "mbox" )
	$sql = "select weborg_job.job_id,entrydate,effectivedate,effectivetime,job_title,job_type,job_folder,read_status,job_size,job_detail,from_user,user_name ".
		" from_user_name from weborg_job left join weborg_user on weborg_user.user_id=weborg_job.from_user ".
		" where (job_folder=0 or job_folder=1 or job_folder=2)  and effectivedate='$today' and job_user_id=".$g_user["user_id"];
else if ( $msgtype == "pvcal" )
	$sql = "select weborg_job.job_id,entrydate,effectivedate,effectivetime,job_title,job_type,job_folder,read_status,job_size,job_detail,from_user,user_name ".
		" from_user_name from weborg_job left join weborg_user on weborg_user.user_id=weborg_job.from_user ".
		" where job_folder=4  and effectivedate='$today' and job_user_id=".$g_user["user_id"];
else if ( $msgtype == "pbcal" )
	$sql = "select weborg_job.job_id,entrydate,effectivedate,effectivetime,job_title,job_type,job_folder,read_status,job_size,job_detail,from_user,user_name ".
		" from_user_name from weborg_job left join weborg_user on weborg_user.user_id=weborg_job.from_user ".
		" where job_folder=5  and effectivedate='$today' ";		
else if ( $sel_user_id > 0 )
	$sql = "select weborg_job.job_id,entrydate,effectivedate,effectivetime,job_title,job_type,job_folder,read_status,job_size,job_detail,from_user,user_name ".
		" from_user_name from weborg_job left join weborg_user on weborg_user.user_id=weborg_job.from_user ".
		" where job_folder=4  and effectivedate='$today' and job_user_id=".$sel_user_id;
		
$res = $db->query($sql);
if ( !DB::IsError($res) )
{
while ( $rs = $res->fetchRow(DB_FETCHMODE_OBJECT) )
{
	if ( !$rs->effectivetime ) $etf = "xx"; else $etf = substr($rs->effectivetime,0,2);
	if ( $datatmp[$etf] ) $datatmp[$etf] .= "<br>";
	$datatmp[$etf] .= put_jobicon($rs->job_type,-1,$rs->job_size - strlen($rs->job_detail) > 500,$rs->job_folder);
	$datatmp[$etf] .= " <a title='".$rs->job_title."' href='job.php?mode=view&job_id=".$rs->job_id."&saveurl=1'> ".showtime($rs->effectivetime)." ".substr($rs->job_title,0,60)."</a>";
	if ( $rs->from_user == $g_user["user_id"] ) 
		$datatmp[$etf] .= "<a title='ลบข้อความ' href='calendar.php?mode=del&job_id=".$rs->job_id."&savecururl=1' onclick=\"return confirm('ลบข้อความ?')\"><img src=\"/images/icon_del.gif\" border=\"0\"></a>";
}
$res->free();
}

function show_act($stime)
{
	global $datatmp;
	return $datatmp[$stime]."&nbsp;";
}
?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="36" colspan="2">
<input type="hidden" name="ignoreurl" value="1">
<input name="backurl" type="hidden" value="<? if ( $saveurl==1 ) echo $g_user["lasturl"]; else echo $backurl; ?>"> 
	<? if ( $g_user["lasturl"] != "" ) { ?>
        <img src="/images/arrow_red.gif" width="16" height="16">
        <input name="goback" type="button" value="ย้อนกลับ" onclick="location.href='<?=$g_user["lasturl"]?>'">
        <? } ?>
        <table width="570" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="5"><img src="/images/win_edge1.gif"></td>
            <th background="/images/win_bkhead.gif" class="text3">ปฏิทินรายวัน</th>
            <td width="6"><img src="/images/win_edge2.gif"></td>
          </tr>
          <tr>
            <td background="/images/win_bkleft.gif">&nbsp;</td>
            <td><TABLE cellSpacing=0 cellPadding=3 width="100%" border=0>
              <TBODY>
                <TR>
                  <TD width="7%" align=left>&nbsp; <a href="#" onclick="document.myform.date.value=<?=$prev_date?>;submit();"> <SPAN class=Cheader><IMG alt="prev month" src="/images/nav_left.gif" border=0></SPAN></A> </TD>
                  <TD width="50%"  ><input type="hidden" name="ignoreurl" value="1">
                      <input type="hidden" name="msgtype" value="<?=$msgtype?>">
                      <input type="hidden" name="sel_user_id" value="<?=$sel_user_id?>">
                      <div align="center">
                        <select name="selday">
                          <? for ( $i = 1 ; $i<=31 ; $i++ ) { ?>
                          <option value="<?=$i?>" <? if ( $selday == $i ) echo "selected"; ?>>
                          <?=$i?>
                          </option>
                          <? } ?>
                        </select>
                        <select name="selmonth">
                          <? for ( $i = 1 ; $i<=12 ; $i++ ) { ?>
                          <option value="<?=$i?>" <? if ( $selmonth == $i ) echo "selected"; ?>>
                          <?=$month_name[$i]?>
                          </option>
                          <? } ?>
                        </select>
                        <select name="selyear">
                          <? for ( $i = date("Y") ; $i<=date("Y")+10 ; $i++ ) { ?>
                          <option value="<?=$i?>" <? if ( $selyear == $i ) echo "selected"; ?>>
                          <?=$i+543?>
                          </option>
                          <? } ?>
                        </select>
                        <input type="submit" name="dogetdate" value="ค้นหา">
                    </div></TD>
                  <TD width="7%" align=right ><a href="#" onclick="document.myform.date.value=<?=$next_date?>;submit();"><SPAN 
                                class=Cheader><IMG alt="next month" src="/images/nav_right.gif" border=0></SPAN></A> &nbsp; </TD>
                  <TD width="36%" align=right >&nbsp;</TD>
                </TR>
              </TBODY>
            </TABLE>
              <TABLE width="100%" border=0 cellPadding=0 cellSpacing=0>
                <TBODY>
                  <TR bgcolor="#D9E7EE">
                    <TD height="24" colspan="4">&nbsp;<img src="../images/ico_smallinfo.gif"> รายละเอียด </TD>
                  </TR>
                  <TR valign="top" bgcolor="#D9E7EE">
                    <TD height="8" class="text1"><div align="center"></div></TD>
                    <TD>&nbsp;</TD>
                    <TD colspan="2">&nbsp;</TD>
                  </TR>
                  <TR valign="top" bgcolor="#CCCCCC">
                    <TD colspan="4"></TD>
                  </TR>
                  <TR valign="top">
                    <TD height="25" bgColor=#D9E7EE class="text1" align="center">6:00</TD>
                    <TD bgColor=#ffffff>&nbsp;</TD>
                    <TD colspan="2" bgColor=#ffffff><?=show_act("06");?></TD>
                  </TR>
                  <TR valign="top" bgcolor="#CCCCCC">
                    <TD colspan="4" bgcolor="#D9E7EE"></TD>
                  </TR>
                  <TR valign="top">
                    <TD height="25" bgColor=#D9E7EE class="text1" align="center">7:00</TD>
                    <TD bgColor=#ffffff>&nbsp;</TD>
                    <TD colspan="2" bgColor=#ffffff><?=show_act("07");?></TD>
                  </TR>
                  <TR valign="top" bgcolor="#CCCCCC">
                    <TD colspan="4" bgcolor="#D9E7EE"></TD>
                  </TR>
                  <TR valign="top">
                    <TD width="10%" height="25" bgColor=#D9E7EE class="text1" align="center">8:00</TD>
                    <TD width="3%" bgColor=#ffffff>&nbsp;</TD>
                    <TD colspan="2" bgColor=#ffffff><?=show_act("08");?></TD>
                  </TR>
                  <TR valign="top" bgcolor="#CCCCCC">
                    <TD colspan="4" bgcolor="#D9E7EE"></TD>
                  </TR>
                  <TR valign="top">
                    <TD width="10%" height="25" bgColor=#D9E7EE  align="center" ><span class="text1">9:00</span></TD>
                    <TD bgColor=#ffffff>&nbsp;</TD>
                    <TD colspan="2" bgColor=#ffffff><?=show_act("09");?></TD>
                  </TR>
                  <TR valign="top" bgcolor="#CCCCCC">
                    <TD colspan="4" bgcolor="#D9E7EE"></TD>
                  </TR>
                  <TR valign="top">
                    <TD width="10%" height="25" bgColor=#D9E7EE  align="center"><span class="text1">10:00</span></TD>
                    <TD bgColor=#ffffff>&nbsp;</TD>
                    <TD colspan="2" bgColor=#ffffff><?=show_act("10");?></TD>
                  </TR>
                  <TR valign="top" bgcolor="#CCCCCC">
                    <TD colspan="4" bgcolor="#D9E7EE"></TD>
                  </TR>
                  <TR valign="top">
                    <TD width="10%" height="25" bgColor=#D9E7EE  align="center"><span class="text1">11:00</span></TD>
                    <TD bgColor=#ffffff>&nbsp;</TD>
                    <TD colspan="2" bgColor=#ffffff><?=show_act("11");?></TD>
                  </TR>
                  <TR valign="top" bgcolor="#CCCCCC">
                    <TD colspan="4" bgcolor="#D9E7EE"></TD>
                  </TR>
                  <TR valign="top">
                    <TD height="25"  bgColor=#D9E7EE  align="center"><span class="text1">12:00</span></TD>
                    <TD  bgColor=#ffffff>&nbsp;</TD>
                    <TD colspan="2"  bgColor=#ffffff><?=show_act("12");?></TD>
                  </TR>
                  <TR valign="top" bgcolor="#CCCCCC">
                    <TD colspan="4" bgcolor="#D9E7EE"></TD>
                  </TR>
                  <TR valign="top">
                    <TD height="25" bgColor=#D9E7EE  align="center"><span class="text1">13:00</span></TD>
                    <TD bgColor=#ffffff>&nbsp;</TD>
                    <TD colspan="2" bgColor=#ffffff><?=show_act("13");?></TD>
                  </TR>
                  <TR valign="top" bgcolor="#CCCCCC">
                    <TD colspan="4" bgcolor="#D9E7EE"></TD>
                  </TR>
                  <TR valign="top">
                    <TD height="25" bgColor=#D9E7EE  align="center"><span class="text1">14:00</span></TD>
                    <TD bgColor=#ffffff>&nbsp;</TD>
                    <TD colspan="2" bgColor=#ffffff><?=show_act("14");?></TD>
                  </TR>
                  <TR valign="top" bgcolor="#CCCCCC">
                    <TD colspan="4" bgcolor="#D9E7EE"></TD>
                  </TR>
                  <TR valign="top">
                    <TD height="25" bgColor=#D9E7EE  align="center"><span class="text1">15:00</span></TD>
                    <TD bgColor=#ffffff>&nbsp;</TD>
                    <TD colspan="2" bgColor=#ffffff><?=show_act("15");?></TD>
                  </TR>
                  <TR valign="top" bgcolor="#CCCCCC">
                    <TD colspan="4" bgcolor="#D9E7EE"></TD>
                  </TR>
                  <TR valign="top">
                    <TD height="25" bgColor=#D9E7EE  align="center"><span class="text1">16:00</span></TD>
                    <TD bgColor=#ffffff>&nbsp;</TD>
                    <TD colspan="2" bgColor=#ffffff><?=show_act("16");?></TD>
                  </TR>
                  <TR valign="top" bgcolor="#CCCCCC">
                    <TD colspan="4" bgcolor="#D9E7EE"></TD>
                  </TR>
                  <TR valign="top">
                    <TD height="25" bgColor=#D9E7EE  align="center"><span class="text1">17:00</span></TD>
                    <TD bgColor=#ffffff>&nbsp;</TD>
                    <TD colspan="2" bgColor=#ffffff><?=show_act("17");?></TD>
                  </TR>
                  <TR valign="top" bgcolor="#CCCCCC">
                    <TD colspan="4" bgcolor="#D9E7EE"></TD>
                  </TR>
                  <TR valign="top">
                    <TD height="25" bgColor=#D9E7EE  align="center"><span class="text1">18:00</span></TD>
                    <TD bgColor=#ffffff>&nbsp;</TD>
                    <TD colspan="2" bgColor=#ffffff><?=show_act("18");?></TD>
                  </TR>
                  <TR valign="top" bgcolor="#CCCCCC">
                    <TD colspan="4" bgcolor="#D9E7EE"></TD>
                  </TR>
                  <TR valign="top">
                    <TD height="25" bgColor=#D9E7EE  align="center"><span class="text1">19:00</span></TD>
                    <TD bgColor=#ffffff>&nbsp;</TD>
                    <TD colspan="2" bgColor=#ffffff><?=show_act("19");?></TD>
                  </TR>
                  <TR valign="top" bgcolor="#CCCCCC">
                    <TD colspan="4" bgcolor="#D9E7EE"></TD>
                  </TR>
                  <TR valign="top">
                    <TD height="25"  align="center" bgColor=#D9E7EE><span class="text1">20:00</span></TD>
                    <TD bgColor=#ffffff>&nbsp;</TD>
                    <TD colspan="2" bgColor=#ffffff><?=show_act("20");?></TD>
                  </TR>
                  <TR valign="top" bgcolor="#CCCCCC">
                    <TD colspan="4" bgcolor="#D9E7EE"></TD>
                  </TR>
                  <TR valign="top">
                    <TD height="25"  align="center" bgColor=#D9E7EE><span class="text1">21:00</span></TD>
                    <TD bgColor=#ffffff>&nbsp;</TD>
                    <TD colspan="2" bgColor=#ffffff><?=show_act("21");?></TD>
                  </TR>
                  <TR valign="top" bgcolor="#CCCCCC">
                    <TD colspan="4" bgcolor="#D9E7EE"></TD>
                  </TR>
                  <TR valign="top">
                    <TD height="25" bgColor=#D9E7EE  align="center"><span class="text1">22:00</span></TD>
                    <TD bgColor=#ffffff>&nbsp;</TD>
                    <TD colspan="2" bgColor=#ffffff><?=show_act("22");?></TD>
                  </TR>
                  <TR valign="top" bgcolor="#CCCCCC">
                    <TD colspan="4" bgcolor="#D9E7EE"></TD>
                  </TR>
                  <TR valign="top">
                    <TD height="25" bgColor=#D9E7EE  align="center">ไม่ระบุเวลา</TD>
                    <TD bgColor=#ffffff>&nbsp;</TD>
                    <TD colspan="2" bgColor=#ffffff><?=show_act("xx");?></TD>
                  </TR>
                  <TR valign="top" bgcolor="#CCCCCC">
                    <TD colspan="4"></TD>
                  </TR>
                  <TR valign="top" bgcolor="#D9E7EE">
                    <TD height="8" class="text1">&nbsp;</TD>
                    <TD>&nbsp;</TD>
                    <TD colspan="2">&nbsp;</TD>
                  </TR>
                  <?	
if ( $msgtype == "pvcal" || ( $msgtype == "pbcal" && is_groupadmin()) ) {
?>
                  <TR valign="top" bgcolor="#D9E7EE">
                    <TD height="8" class="text1">&nbsp;</TD>
                    <TD>&nbsp;</TD>
                    <td colspan="2">บันทึกเรื่องลงปฏิทิน</td>
                  </TR>
                  <TR valign="top" bgcolor="#D9E7EE">
                    <TD height="8" class="text1">&nbsp;</TD>
                    <TD>&nbsp;</TD>
                    <td colspan="2"><select name="addhour">
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
                      </select>
                        <input name="addtitle" type="text" size="40"><span class="redtext">*</span> </td>
                  </TR>
                  <TR valign="top" bgcolor="#D9E7EE">
                    <TD height="8" class="text1"><div align="center"></div></TD>
                    <TD>&nbsp;</TD>
                                <td width="61%"><textarea name="textarea" cols="50" rows="4"></textarea></td>
                    <td width="26%"><input name="dosavecalendar" type="submit" value="บันทึกลงปฏิทิน" onclick="return check_savecal(document.myform)">
                        <br>
                        <br>
                        <input name="doclear" type="reset" value="ลบข้อความ"></td>
                  </TR>
                  <? } ?>
                  <TR valign="top" bgcolor="#D9E7EE">
                    <TD height="8" class="text1">&nbsp;</TD>
                    <TD>&nbsp;</TD>
                    <TD colspan="2">&nbsp;</TD>
                  </TR>
                </TBODY>
              </TABLE></td>
            <td background="/images/win_bkright.gif">&nbsp;</td>
          </tr>
          <tr>
            <td><img src="/images/win_edge3.gif"></td>
            <td background="/images/win_bkbottom.gif"></td>
            <td><img src="/images/win_edge4.gif"></td>
          </tr>
        </table></td>
  </tr>
</table>
<? } else if ( $mode == "result" ) { 
$backurl = $g_user["lasturl"];
?>
<br>
<br>
<br>
<? include("../include/popupmsg.php"); ?>
<br>
<br>
<br>
<? } ?>
<input type="hidden" name="mode" value="<?=$mode?>">
<input type="hidden" name="date" value="<?=$date?>">
<input type="hidden" name="keeppost" value="1">
			  <!-- End inside display --></td>
          </tr>
          <tr>
            <td background="/images/win_bkbottom.gif"></td>
          </tr>
        </table>
      </form>    </td>
    <td width="10" background="/images/rim1.gif">&nbsp;</td>
  </tr>
</table>
<? include("../include/bottom.php"); ?>
</body>
</html>
<? include("../include/disconnect.php"); ?>