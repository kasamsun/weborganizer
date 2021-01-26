</script>
<style type="text/css">
.menutitle{
cursor:pointer;
}
.submenu{
margin-bottom: 0.5em;
font-weight: bold;
}
</style>

<script type="text/javascript">
<!--
if (document.getElementById){ 
document.write('<style type="text/css">\n')
document.write('.submenu{display: none;}\n')
document.write('</style>\n')
}
function SwitchMenu(obj){
	if(document.getElementById){
	var el = document.getElementById(obj);
	var ar = document.getElementById("masterdiv").getElementsByTagName("span");
		if(el.style.display != "block"){ 
			for (var i=0; i<ar.length; i++){
				if (ar[i].className=="submenu") 
				ar[i].style.display = "none";
			}
			el.style.display = "block";
		}else{
			el.style.display = "none";
		}
	}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link href="../include/style.css" rel="stylesheet" type="text/css">
<div id="masterdiv"> 
<table width="184" height="400" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign="top">
<? if ( $g_user["user_id"] )  { 
$percent_usage = check_usage($g_user["user_id"]);
?>
<table width="180" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" height="26" align="center"><span class="text">
      <?=$g_user["user_name"]?>
      </span> &nbsp;
      <input name="image" type="image" onClick="location.href='/organizer/profile.php'" src="../images/ico_chprofile.gif" align="absmiddle" alt="Update Profile">
      <? if ( $g_user["user_id"] ) { ?>      
      <input name="image2" type="image" onClick="location.href='/organizer/logout.php'" src="../images/ico_logoff.gif" align="absmiddle" alt="Log Off">      
	  <? } ?>
&nbsp; </td>
  </tr>
  <tr height="24">
    <td width="13%" align="center">&nbsp;</td>
    <td>
      <table width="90%" bgcolor="#9FBFDF" cellspacing="1" border="0" cellpadding="0">
        <tr>
          <td>
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="<?=100-$percent_usage?>%" align="right" bgcolor="#FEFEFE"><span class="text">
                  <? if ( $percent_usage <= 50 ) { ?>
                  <?=$percent_usage?>
                  % of <b>
                  <?=$limit_space/1000000?>
                  MB
                  <? } ?>
                </b></span></td>
                <td width="<?=$percent_usage?>%" background="../images/<? if ( $percent_usage >=95 ) echo "guage_red.gif"; else if ( $percent_usage >=75 ) echo "guage_orange.gif"; else echo "guage_green.gif"; ?>"><span class="text">
                  <? if ( $percent_usage > 50 ) { ?>
                  <?=$percent_usage?>
                  % of <b>
                  <?=$limit_space/1000000?>
                  MB
                  <? } ?>
                </b></span></td>
              </tr>
          </table></td>
        </tr>
      </table>
      </td>
  </tr>
</table>
<? } ?>
<? if  ( $g_user["level"] & AUTHORIZE_WEBUSER ) { ?>
<?
$left_dd = mktime(0, 0, 0, date("m")  , 1, date("Y"));
$left_dd = mktime(0, 0, 0, date("m")  , 1-date("w",$left_dd) , date("Y"));

function check_date_style_left($left_ddd)
{
	if ( date("nY",$left_ddd) == date("n")."".date("Y") )
		return "text1";
	else
		return "text";
}
function show_date_left()
{
	global $left_dd;
	if ( date("dmY",$left_dd) == date("dmY") ) echo "<table width=100% height=100% border=0 cellSpacing=0 cellpadding=0 bgcolor=#e5a2a6><tr><td align=center>";
	echo "<span class='".check_date_style_left($left_dd)."'>";
	echo date("j",$left_dd);
	echo "</span>";
	if ( date("dmY",$left_dd) == date("dmY") ) echo "</td></tr></table>";
	$left_dd = mktime(0, 0, 0, date("m",$left_dd)  , date("d",$left_dd)+1 , date("Y",$left_dd));
}
?>
<TABLE width="160" border=0 cellpadding="0" cellSpacing=0 align="center">
  <TBODY>
    <TR>
      <TD align=middle bgColor=#4682b4>
        <TABLE cellSpacing=1 cellPadding=1 width="100%" border=0>
          <TBODY>
            <TR>
              <TD align=left bgColor=#4682b4 colSpan=7>
                <TABLE cellSpacing=0 cellPadding=1 width="100%" border=0>
                  <TBODY>
                    <TR>
                      <TD align=left bgColor=#4682b4>&nbsp;</TD>
                      <TD align=middle bgColor=#4682b4><div align="center" class="Cheader">
                          <?=$month_name[date("n")]?>
                          <?=date("Y")+543?>
                      </div></TD>
                      <TD align=right bgColor=#4682b4>&nbsp;</TD>
                    </TR>
                  </TBODY>
              </TABLE></TD>
            </TR>
            <TR>
              <TD align=middle bgColor=#87cefa class="Cheader2">อา.</TD>
              <TD align=middle bgColor=#87cefa class="Cheader2">จ.</TD>
              <TD align=middle bgColor=#87cefa class="Cheader2">อ.</TD>
              <TD align=middle bgColor=#87cefa class="Cheader2">พ.</TD>
              <TD align=middle bgColor=#87cefa class="Cheader2">พฤ.</TD>
              <TD align=middle bgColor=#87cefa class="Cheader2">ศ.</TD>
              <TD align=middle bgColor=#87cefa class="Cheader2">ส.</TD>
            </TR>
            <TR>
              <TD align=middle width="15%" bgColor=#dbeaf5><?=show_date_left();?></TD>
              <TD align=middle width="15%" bgColor=#ffffff><?=show_date_left();?></TD>
              <TD align=middle width="15%" bgColor=#ffffff><?=show_date_left();?></TD>
              <TD align=middle width="15%" bgColor=#ffffff><?=show_date_left();?></TD>
              <TD align=middle width="15%" bgColor=#ffffff><?=show_date_left();?></TD>
              <TD align=middle width="15%" bgColor=#ffffff><?=show_date_left();?></TD>
              <TD align=middle width="15%" bgColor=#dbeaf5><?=show_date_left();?></TD>
            </TR>
            <TR>
              <TD align=middle width="15%" bgColor=#dbeaf5><?=show_date_left();?></TD>
              <TD align=middle width="15%" bgColor=#ffffff><?=show_date_left();?></TD>
              <TD align=middle width="15%" bgColor=#ffffff><?=show_date_left();?></TD>
              <TD align=middle width="15%" bgColor=#ffffff><?=show_date_left();?></TD>
              <TD align=middle width="15%" bgColor=#ffffff><?=show_date_left();?></TD>
              <TD align=middle width="15%" bgColor=#ffffff><?=show_date_left();?></TD>
              <TD align=middle width="15%" bgColor=#dbeaf5><?=show_date_left();?></TD>
            </TR>
            <TR>
              <TD align=middle width="15%" bgColor=#dbeaf5><?=show_date_left();?></TD>
              <TD align=middle width="15%" bgColor=#ffffff><?=show_date_left();?></TD>
              <TD align=middle width="15%" bgColor=#ffffff><?=show_date_left();?></TD>
              <TD align=middle width="15%" bgColor=#ffffff><?=show_date_left();?></TD>
              <TD align=middle width="15%" bgColor=#ffffff><?=show_date_left();?></TD>
              <TD align=middle width="15%" bgColor=#ffffff><?=show_date_left();?></TD>
              <TD align=middle width="15%" bgColor=#dbeaf5><?=show_date_left();?></TD>
            </TR>
            <TR>
              <TD align=middle width="15%" bgColor=#dbeaf5><?=show_date_left();?></TD>
              <TD align=middle width="15%" bgColor=#ffffff><?=show_date_left();?></TD>
              <TD align=middle width="15%" bgColor=#ffffff><?=show_date_left();?></TD>
              <TD align=middle width="15%" bgColor=#ffffff><?=show_date_left();?></TD>
              <TD align=middle width="15%" bgColor=#ffffff><?=show_date_left();?></TD>
              <TD align=middle width="15%" bgColor=#ffffff><?=show_date_left();?></TD>
              <TD align=middle width="15%" bgColor=#dbeaf5><?=show_date_left();?></TD>
            </TR>
            <TR>
              <TD align=middle bgColor=#dbeaf5><?=show_date_left();?></TD>
              <TD align=middle bgColor=#ffffff><?=show_date_left();?></TD>
              <TD align=middle bgColor=#ffffff><?=show_date_left();?></TD>
              <TD align=middle bgColor=#ffffff><?=show_date_left();?></TD>
              <TD align=middle bgColor=#ffffff><?=show_date_left();?></TD>
              <TD align=middle bgColor=#ffffff><?=show_date_left();?></TD>
              <TD align=middle bgColor=#dbeaf5><?=show_date_left();?></TD>
            </TR>
            <TR>
              <TD align=middle width="15%" bgColor=#dbeaf5><?=show_date_left();?></TD>
              <TD align=middle width="15%" bgColor=#ffffff><?=show_date_left();?></TD>
              <TD align=middle width="15%" bgColor=#ffffff><?=show_date_left();?></TD>
              <TD align=middle width="15%" bgColor=#ffffff><?=show_date_left();?></TD>
              <TD align=middle width="15%" bgColor=#ffffff><?=show_date_left();?></TD>
              <TD align=middle width="15%" bgColor=#ffffff><?=show_date_left();?></TD>
              <TD align=middle width="15%" bgColor=#dbeaf5><?=show_date_left();?></TD>
            </TR>
          </TBODY>
      </TABLE></TD>
    </TR>
  </TBODY>
</TABLE>    
<table width="180" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td>
<img src="../images/clear.gif" width="2"><img src="../images/seperator.gif">
<a href="#"  onclick="SwitchMenu('sub1')"><img src="../images/clear.gif" width="5" border="0"><img src="/images/ico_box.gif" width="32" height="32" border="0" align="absmiddle"> <span class="largetext">Message Box</span></a>
<br><span class="submenu" id="sub1">
<img src="../images/clear.gif" width="24" height="16"><img src="../images/arrow_blue.gif"> <a href="/organizer/index.php?mode=inbox"> <img src="../images/ico_folder.gif" border="0" align="absmiddle"> กล่องเก็บข้อความ</a><br>
<img src="../images/clear.gif" width="24" height="16"><img src="../images/arrow_blue.gif"> <a href="/organizer/job.php?mode=add&job_type=1"><img src="../images/ico_article.gif" border="0" align="absmiddle"> บันทึกผลการประชุม</a><br>
<img src="../images/clear.gif" width="24" height="16"><img src="../images/arrow_blue.gif"> <a href="/organizer/job.php?mode=add&job_type=2"><img src="../images/ico_announce.gif" border="0" align="absmiddle"> แจ้งประกาศต่างๆ</a><br>
<img src="../images/clear.gif" width="24" height="16"><img src="../images/arrow_blue.gif"> <a href="/organizer/job.php?mode=add&job_type=3"><img src="../images/ico_stick.gif" border="0" align="absmiddle"> แจ้งนัดหมาย</a><br>
<img src="../images/clear.gif" width="24" height="16"><img src="../images/arrow_blue.gif"> <a href="/organizer/job.php?mode=add&job_type=4"><img src="../images/ico_url.gif" border="0" align="absmiddle"> จองห้องประชุม</a><br>
<img src="../images/clear.gif" width="24" height="16"><img src="../images/arrow_blue.gif"> <a href="/organizer/job.php?mode=add&job_type=5"><img src="../images/ico_note.gif" border="0" align="absmiddle"> ส่งข้อความทั่วไป</a><br>
</span>
<img src="../images/clear.gif" width="2"><img src="../images/seperator.gif">
<a href="#"  onclick="SwitchMenu('sub2')"><img src="../images/clear.gif" width="5" border="0"><img src="/images/ico_bcalendar.gif" width="32" height="32" border="0" align="absmiddle"><span class="largetext"> Calendar </span></a>
<br>
<span class="submenu" id="sub2">
<img src="../images/clear.gif" width="24" height="16"><img src="../images/arrow_blue.gif"> <a href="/organizer/calendar.php?mode=monthly"> <img src="../images/ico_calendarc.gif" border="0" align="absmiddle"> ปฏิทินรายเดือน</a><br>
<img src="../images/clear.gif" width="24" height="16"><img src="../images/arrow_blue.gif"> <a href="/organizer/calendar.php?mode=daily"> <img src="../images/ico_calendarc.gif" border="0" align="absmiddle"> ปฏิทินรายวัน</a><br>
</span>
<img src="../images/clear.gif" width="2"><img src="../images/seperator.gif">

<a href="#"  onclick="SwitchMenu('sub3')"><img src="../images/clear.gif" width="5" border="0"><img src="/images/ico_addrbook.gif" width="32" height="32" border="0" align="absmiddle"><span class="largetext"> Address Book </span></a>
<br><span class="submenu" id="sub3">
<img src="../images/clear.gif" width="24" height="16"><img src="../images/arrow_blue.gif"> <a href="/organizer/userinfo.php"><img src="../images/ico_userinfos.gif" border="0" align="absmiddle"> สอบถามข้อมูลผู้ใช้</a><br>
<img src="../images/clear.gif" width="24" height="16"><img src="../images/arrow_blue.gif"> <a href="/organizer/address_book.php"><img src="../images/ico_userinfos.gif" border="0" align="absmiddle"> สมุดโทรศัพท์</a><br>
</span>
<img src="../images/clear.gif" width="2"><img src="../images/seperator.gif">


<a href="#"  onclick="SwitchMenu('sub4')"><img src="../images/clear.gif" width="5" border="0"><img src="/images/ico_chat.gif" width="32" height="32" border="0" align="absmiddle"><span class="largetext"> Chat </span></a><br>
<span class="submenu" id="sub4">
<img src="../images/clear.gif" width="24" height="16"><img src="../images/arrow_blue.gif"> <a href="/organizer/chat.php"><img src="../images/ico_profile.gif" border="0" align="absmiddle"> Chat</a><br>
</span>
<img src="../images/clear.gif" width="2"><img src="../images/seperator.gif">

<? if ( $g_user["level"] & AUTHORIZE_WEBADMIN ) { ?>
<a href="#"  onclick="SwitchMenu('sub5')"><img src="../images/clear.gif" width="5" border="0"><img src="/images/ico_admin.gif" width="32" height="32" border="0" align="absmiddle"><span class="largetext"> Admintrator</span></a>
<br>
<span class="submenu" id="sub5">
<img src="../images/clear.gif" width="24" height="16"><img src="../images/arrow_blue.gif"> <a href="/admin/user.php"> <img src="../images/icon_edit.gif" border="0" align="absmiddle"> ข้อมูลผู้ใช้งาน </a><br>
<img src="../images/clear.gif" width="24" height="16"><img src="../images/arrow_blue.gif"> <a href="/admin/group.php"> <img src="../images/icon_edit.gif" border="0" align="absmiddle"> ข้อมูลกลุ่มผู้ใช้งาน</a><br>
<img src="../images/clear.gif" width="24" height="16"><img src="../images/arrow_blue.gif"> <a href="/admin/department.php"><img src="../images/icon_edit.gif" border="0" align="absmiddle"> ข้อมูลแผนก </a><br>
<img src="../images/clear.gif" width="24" height="16"><img src="../images/arrow_blue.gif"> <a href="/admin/room.php"><img src="../images/icon_edit.gif" border="0" align="absmiddle"> ข้อมูลห้องประชุม </a><br>
</span>
<img src="../images/clear.gif" width="2"><img src="../images/seperator.gif">
<? } ?>
</td>
      </tr>
    </table>  
<? } ?>
<br></td>
  </tr>
</table>
</div>
<script>
<? if ( strpos($PHP_SELF,"organizer/index.php") === false ) ; else { ?>SwitchMenu('sub1');<? } ?>
<? if ( strpos($PHP_SELF,"organizer/job.php") === false ) ; else { ?>SwitchMenu('sub1');<? } ?>
<? if ( strpos($PHP_SELF,"organizer/calendar") === false ) ; else { ?>SwitchMenu('sub2');<? } ?>
<? if ( strpos($PHP_SELF,"organizer/userinfo.php") === false ) ; else { ?>SwitchMenu('sub3');<? } ?>
<? if ( strpos($PHP_SELF,"organizer/address_book.php") === false ) ; else { ?>SwitchMenu('sub3');<? } ?>
<? if ( strpos($PHP_SELF,"organizer/chat.php") === false ) ; else { ?>SwitchMenu('sub4');<? } ?>
<? if ( strpos($PHP_SELF,"/admin/") === false ) ; else { ?>SwitchMenu('sub5');<? } ?>
</script>
