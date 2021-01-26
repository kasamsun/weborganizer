<?
include("../include/connect.php"); 
include("../include/util.php");
check_authorize($g_user["level"],AUTHORIZE_WEBUSER);

?>
<html>
<head>
<title>NIDA : Web Organizer</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link href="/include/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<form name="myform" action="" method="post">
<?
$today = txt2date($effectivedate);
$next_date = date("Ymd",mktime(0, 0, 0, date("m",$dtoday) , date("d",$dtoday)+1 , date("Y",$dtoday)) );
$prev_date = date("Ymd",mktime(0, 0, 0, date("m",$dtoday)  , date("d",$dtoday) -1, date("Y",$dtoday)) );

$datatmp = array();
	$sql = "select weborg_job.job_id,job_title,job_type,job_folder,job_detail,from_user,weborg_room.room_id,from_time,to_time,room_name ".
		" from weborg_job inner join weborg_room on weborg_room.room_id=weborg_job.room_id ".
		" where job_type=4  and effectivedate='$today' and weborg_job.room_id=$room_id and job_user_id=from_user ".
		" group by weborg_job.room_id,weborg_job.from_user,from_time,to_time";

$res = $db->query($sql);
$room_name = "";
while ( $rs = $res->fetchRow(DB_FETCHMODE_OBJECT) )
{
	$room_name = $rs->room_name;
	
	$st = substr($rs->from_time,0,2);
	$en = substr($rs->to_time,0,2);
	for ( $i = $st ; $i <= $en ; $i++ )
	{
		$etf = sprintf("%02d",$i);
	
		if ( $datatmp[$etf] ) $datatmp[$etf] .= "<br>";
		$datatmp[$etf] .= put_jobicon($rs->job_type,-1,-1,-1);
		$datatmp[$etf] .= substr($rs->job_title,0,60);
	}
}
$res->free();

function show_act($stime)
{
	global $datatmp;
	return $datatmp[$stime]."&nbsp;";
}
?>
  <TABLE width="100%" border=0 cellPadding=0 cellSpacing=0>
    <TBODY>
      <TR bgcolor="#B3D0FD">
        <TD height="24" colspan="4"><b>&nbsp;<img src="../images/ico_smallinfo.gif"> ตารางการใช้ <?=$room_name?> &nbsp;&nbsp;วันที่ <?=showshortthaidate(txt2date($effectivedate))?></b></TD>
      </TR>
      <tr bgcolor="#0F6BB7">
        <td colspan="5"><img src="/images/clear.gif"></td>
      </tr>
      <TR valign="top" bgcolor="#dbeaf5">
        <TD height="8" class="text1"><div align="center"></div></TD>
        <TD>&nbsp;</TD>
        <TD width="86%" colspan="2">&nbsp;</TD>
      </TR>
      <TR valign="top" bgcolor="#CCCCCC">
        <TD colspan="4"></TD>
      </TR>
      <TR valign="top">
        <TD height="25" bgColor=#dbeaf5 class="text1" align="center">6:00</TD>
        <TD bgColor=#ffffff>&nbsp;</TD>
        <TD colspan="2" bgColor=#ffffff><?=show_act("06");?></TD>
      </TR>
      <TR valign="top" bgcolor="#CCCCCC">
        <TD colspan="4"></TD>
      </TR>
      <TR valign="top">
        <TD height="25" bgColor=#dbeaf5 class="text1" align="center">7:00</TD>
        <TD bgColor=#ffffff>&nbsp;</TD>
        <TD colspan="2" bgColor=#ffffff><?=show_act("07");?></TD>
      </TR>
      <TR valign="top" bgcolor="#CCCCCC">
        <TD colspan="4"></TD>
      </TR>
      <TR valign="top">
        <TD width="10%" height="25" bgColor=#dbeaf5 class="text1" align="center">8:00</TD>
        <TD width="4%" bgColor=#ffffff>&nbsp;</TD>
        <TD colspan="2" bgColor=#ffffff><?=show_act("08");?></TD>
      </TR>
      <TR valign="top" bgcolor="#CCCCCC">
        <TD colspan="4"></TD>
      </TR>
      <TR valign="top">
        <TD width="10%" height="25" bgColor=#dbeaf5  align="center" ><span class="text1">9:00</span></TD>
        <TD bgColor=#ffffff>&nbsp;</TD>
        <TD colspan="2" bgColor=#ffffff><?=show_act("09");?></TD>
      </TR>
      <TR valign="top" bgcolor="#CCCCCC">
        <TD colspan="4"></TD>
      </TR>
      <TR valign="top">
        <TD width="10%" height="25" bgColor=#dbeaf5  align="center"><span class="text1">10:00</span></TD>
        <TD bgColor=#ffffff>&nbsp;</TD>
        <TD colspan="2" bgColor=#ffffff><?=show_act("10");?></TD>
      </TR>
      <TR valign="top" bgcolor="#CCCCCC">
        <TD colspan="4"></TD>
      </TR>
      <TR valign="top">
        <TD width="10%" height="25" bgColor=#dbeaf5  align="center"><span class="text1">11:00</span></TD>
        <TD bgColor=#ffffff>&nbsp;</TD>
        <TD colspan="2" bgColor=#ffffff><?=show_act("11");?></TD>
      </TR>
      <TR valign="top" bgcolor="#CCCCCC">
        <TD colspan="4"></TD>
      </TR>
      <TR valign="top">
        <TD height="25"  bgColor=#dbeaf5  align="center"><span class="text1">12:00</span></TD>
        <TD  bgColor=#ffffff>&nbsp;</TD>
        <TD colspan="2"  bgColor=#ffffff><?=show_act("12");?></TD>
      </TR>
      <TR valign="top" bgcolor="#CCCCCC">
        <TD colspan="4"></TD>
      </TR>
      <TR valign="top">
        <TD height="25" bgColor=#dbeaf5  align="center"><span class="text1">13:00</span></TD>
        <TD bgColor=#ffffff>&nbsp;</TD>
        <TD colspan="2" bgColor=#ffffff><?=show_act("13");?></TD>
      </TR>
      <TR valign="top" bgcolor="#CCCCCC">
        <TD colspan="4"></TD>
      </TR>
      <TR valign="top">
        <TD height="25" bgColor=#dbeaf5  align="center"><span class="text1">14:00</span></TD>
        <TD bgColor=#ffffff>&nbsp;</TD>
        <TD colspan="2" bgColor=#ffffff><?=show_act("14");?></TD>
      </TR>
      <TR valign="top" bgcolor="#CCCCCC">
        <TD colspan="4"></TD>
      </TR>
      <TR valign="top">
        <TD height="25" bgColor=#dbeaf5  align="center"><span class="text1">15:00</span></TD>
        <TD bgColor=#ffffff>&nbsp;</TD>
        <TD colspan="2" bgColor=#ffffff><?=show_act("15");?></TD>
      </TR>
      <TR valign="top" bgcolor="#CCCCCC">
        <TD colspan="4"></TD>
      </TR>
      <TR valign="top">
        <TD height="25" bgColor=#dbeaf5  align="center"><span class="text1">16:00</span></TD>
        <TD bgColor=#ffffff>&nbsp;</TD>
        <TD colspan="2" bgColor=#ffffff><?=show_act("16");?></TD>
      </TR>
      <TR valign="top" bgcolor="#CCCCCC">
        <TD colspan="4"></TD>
      </TR>
      <TR valign="top">
        <TD height="25" bgColor=#dbeaf5  align="center"><span class="text1">17:00</span></TD>
        <TD bgColor=#ffffff>&nbsp;</TD>
        <TD colspan="2" bgColor=#ffffff><?=show_act("17");?></TD>
      </TR>
      <TR valign="top" bgcolor="#CCCCCC">
        <TD colspan="4"></TD>
      </TR>
      <TR valign="top">
        <TD height="25" bgColor=#dbeaf5  align="center"><span class="text1">18:00</span></TD>
        <TD bgColor=#ffffff>&nbsp;</TD>
        <TD colspan="2" bgColor=#ffffff><?=show_act("18");?></TD>
      </TR>
      <TR valign="top" bgcolor="#CCCCCC">
        <TD colspan="4"></TD>
      </TR>
      <TR valign="top">
        <TD height="25" bgColor=#dbeaf5  align="center"><span class="text1">19:00</span></TD>
        <TD bgColor=#ffffff>&nbsp;</TD>
        <TD colspan="2" bgColor=#ffffff><?=show_act("19");?></TD>
      </TR>
      <TR valign="top" bgcolor="#CCCCCC">
        <TD colspan="4"></TD>
      </TR>
      <TR valign="top">
        <TD height="25"  align="center" bgColor=#dbeaf5><span class="text1">20:00</span></TD>
        <TD bgColor=#ffffff>&nbsp;</TD>
        <TD colspan="2" bgColor=#ffffff><?=show_act("20");?></TD>
      </TR>
      <TR valign="top" bgcolor="#CCCCCC">
        <TD colspan="4"></TD>
      </TR>
      <TR valign="top">
        <TD height="25"  align="center" bgColor=#dbeaf5><span class="text1">21:00</span></TD>
        <TD bgColor=#ffffff>&nbsp;</TD>
        <TD colspan="2" bgColor=#ffffff><?=show_act("21");?></TD>
      </TR>
      <TR valign="top" bgcolor="#CCCCCC">
        <TD colspan="4"></TD>
      </TR>
      <TR valign="top">
        <TD height="25" bgColor=#dbeaf5  align="center"><span class="text1">22:00</span></TD>
        <TD bgColor=#ffffff>&nbsp;</TD>
        <TD colspan="2" bgColor=#ffffff><?=show_act("22");?></TD>
      </TR>
      <TR valign="top" bgcolor="#CCCCCC">
        <TD colspan="4"></TD>
      </TR>
      <TR valign="top" bgcolor="#dbeaf5">
        <TD height="8" class="text1">&nbsp;</TD>
        <TD>&nbsp;</TD>
        <TD colspan="2">&nbsp;</TD>
      </TR>
    </TBODY>
  </TABLE>
</form>
</body>
</html>