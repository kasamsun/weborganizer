<? 
include("../include/connect.php"); 
include("../include/util.php");
include("../include/page_ctrl.php");

check_authorize($g_user["level"],AUTHORIZE_WEBUSER);
if ( !isset($mode) ) $mode = "inbox";

if ( isset($moveto) )
{
	$countdelete = 0;
	if ( is_array($checkitem) ) {
		foreach ( $checkitem as $request_id )
		{
				// move folder
				$sql = "update weborg_job set job_folder=$moveto  where job_id = $request_id";
				$res = $db->query ($sql);
				if ( $db->affectedRows() ) 
					$countdelete++;
		}
		if ( $countdelete > 0 )
			$showmsg = "ข้อมูล ".$countdelete." รายการ ถูกย้ายเรียบร้อยแล้ว";
	}
}

if ( isset($deleteitem) )
{
	if ( $mode == "trash" )
	{
		// only trash can delete
		$countdelete = 0;
		if ( is_array($checkitem) ) {
			foreach ( $checkitem as $request_id )
			{
					// del attachment
					deldir("../user/".$g_user["user_id"]."/$request_id");
					// del record
					$sql = "delete from weborg_attachment where job_id=$request_id";
					$db->query($sql);
					$sql = "delete from weborg_job where job_id = $request_id";
					$res = $db->query ($sql);
					if ( $db->affectedRows() ) 
						$countdelete++;
			}
			if ( $countdelete > 0 )
				$showmsg = "ข้อมูล ".$countdelete." รายการ ถูกลบเรียบร้อยแล้ว";
			$percent_usage = check_usage($g_user["user_id"]);
		}
	}
	else
	{
		// just mode folder
		$countdelete = 0;
		if ( is_array($checkitem) ) {
			foreach ( $checkitem as $request_id )
			{
					// move folder
					$sql = "update weborg_job set job_folder=3  where job_id = $request_id";
					$res = $db->query ($sql);
					if ( $db->affectedRows() ) 
						$countdelete++;
			}
			if ( $countdelete > 0 )
				$showmsg = "ข้อมูล ".$countdelete." รายการ ถูกลบเรียบร้อยแล้ว";
		}
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
<script language="JavaScript" type="text/JavaScript" src="/include/overlib_mini.js"></script>
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
	  <form name="myform" method="post" action="">
	    <table width="569" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <th background="win_bkheader.gif" class="largetext">
              <div align="left">
  <? if ( $mode == "inbox" ) echo "<img src='/images/ico_boxin.gif' align=\"absmiddle\" width=32 height=32>&nbsp;Inbox"; 
else if ( $mode=="outbox" ) echo "<img src='/images/ico_boxout.gif' align=\"absmiddle\" width=32 height=32>&nbsp;Outbox"; 
else if ( $mode=="mybox") echo "<img src='/images/ico_boxmy.gif' align=\"absmiddle\" width=32 height=32>&nbsp;Mybox"; 
else if ( $mode=="trash") echo "<img src='/images/ico_boxtrash.gif' align=\"absmiddle\" width=32 height=32>&nbsp;Trash"; 
else echo "&nbsp";
?>
              </div></th>
            <td width="420" background="win_bkheader.gif" class="text1">
<div align="right"> <img src="/images/ico_boxin.gif" align="absmiddle">
  <? if ( $mode != "inbox" ) { ?>
  <a href="<?=$PHP_SELF?>?mode=inbox">Inbox</a><? } else { ?><span class="text3">Inbox</span><? } ?>&nbsp;&nbsp; 
 <img src="/images/ico_boxout.gif" align="absmiddle">
 <? if ( $mode != "outbox" ) { ?>
 <a href="<?=$PHP_SELF?>?mode=outbox">Outbox</a><? } else { ?><span class="text3">Outbox</span><? } ?>&nbsp;&nbsp; 
 <img src="/images/ico_boxmy.gif" align="absmiddle">
 <? if ( $mode != "mybox" ) { ?>
 <a href="<?=$PHP_SELF?>?mode=mybox">Mybox</a><? } else { ?><span class="text3">Mybox</span><? } ?>&nbsp;&nbsp; 
<img src="/images/ico_boxtrash.gif" align="absmiddle">
<? if ( $mode != "trash" ) { ?>
<a href="<?=$PHP_SELF?>?mode=trash">Trash</a><? } else { ?><span class="text3">Trash</span><? } ?>&nbsp;&nbsp;
</div></td>
          </tr>
          <tr>
            <td colspan="2">
              <!-- Start inside display -->
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
                  <td height="36" colspan="6"><img src="/images/arrow_red.gif" width="16" height="16">
<input onClick="return Subm('delete',0,0);" name="deleteitem" type="submit"  value=" ลบ ">
 ย้ายไปยัง 
 <select name="moveto" onchange="document.myform.submit()">
 <option value="">- - - - -</option>
<? if ( $mode != "inbox" )  { ?> <option value="0">Inbox</option><? } ?>
<? if ( $mode != "outbox" )  { ?> <option value="1">Outbox</option><? } ?>
<? if ( $mode != "mybox" )  { ?> <option value="2">Mybox</option><? } ?>
<? if ( $mode != "trash" )  { ?> <option value="3">Trash</option><? } ?>
 </select>
 <? if ( isset($showmsg) ) { ?>
<img src="/images/arrow_red.gif" width="16" height="16">
<?=$showmsg?>
<? } ?> <input type="hidden" name="mode" value="<?=$mode?>"></td>
                </tr>
              </table>
              <?
// start get database
	$page_param = "mode=$mode";
	if ( $mode == "inbox" )
		$sql = "select weborg_job.job_id,entrydate,effectivedate,effectivetime,job_title,job_type,read_status,job_size,job_detail,weborg_user.user_id,user_name from_user_name from weborg_job left join weborg_user on weborg_user.user_id=weborg_job.from_user where job_folder=0 and job_user_id=".$g_user["user_id"];
	else if ( $mode == "outbox" )
		$sql = "select weborg_job.job_id,entrydate,effectivedate,effectivetime,job_title,job_type,read_status,job_size,job_detail,weborg_user.user_id,user_name from_user_name from weborg_job left join weborg_user on weborg_user.user_id=weborg_job.from_user where job_folder=1 and job_user_id=".$g_user["user_id"];
	else if ( $mode == "mybox" )
		$sql = "select weborg_job.job_id,entrydate,effectivedate,effectivetime,job_title,job_type,read_status,job_size,job_detail,weborg_user.user_id,user_name from_user_name from weborg_job left join weborg_user on weborg_user.user_id=weborg_job.from_user where job_folder=2 and job_user_id=".$g_user["user_id"];
	else if ( $mode == "trash" )
		$sql = "select weborg_job.job_id,entrydate,effectivedate,effectivetime,job_title,job_type,read_status,job_size,job_detail,weborg_user.user_id,user_name from_user_name from weborg_job left join weborg_user on weborg_user.user_id=weborg_job.from_user where job_folder=3 and job_user_id=".$g_user["user_id"];

	$page_ctrl = new PageControl;
	if ( !isset($orderby) ) $orderby = "effectivedate";
	if ( !isset($page) ) $page = 1;
	if ( !isset($sorttype) ) $sorttype = -1;
	$page_ctrl->page_init($sql,$page_param,$orderby,$page,$sorttype,$row_per_page);
?>
              <table width="570" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="12" background="/images/win_bkhead.gif"><img src="/images/win_edge1.gif"></td>
                  <td width="30" background="/images/win_bkhead.gif">&nbsp;
                  <input title="Select or de-select all messages" onClick=CA();  tabindex=105 type=checkbox name=allbox>                  </td>
                  <td width="55" background="/images/win_bkhead.gif">
                  <div align="center"><b> สถานะ </b></div></td>
                  <td width="70" background="/images/win_bkhead.gif">
                    <div align="center"><b>
                      <? $page_ctrl->page_column("effectivedate","วันที่"); ?>
                  </b></div></td>
                  <td width="209" background="/images/win_bkhead.gif"><div align="center"><b>
                      <? $page_ctrl->page_column("job_title","หัวเรื่อง"); ?>
                  </b></div></td>
                  <td width="118" background="/images/win_bkhead.gif"><div align="center"><b>
                      <? $page_ctrl->page_column("from_user_name","ผู้ส่ง"); ?>
                  </b></div></td>
                  <td width="64" background="/images/win_bkhead.gif"><div align="center"><b>
                      <? $page_ctrl->page_column("job_size","ขนาด"); ?>
                  </b></div></td>
                  <td width="12" background="/images/win_bkhead.gif"><img src="/images/win_edge2.gif"></td>
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
                      <input onClick=CCA(this);  type="checkbox" name="checkitem[]" value="<?=$rs->job_id?>">
                  </td>
                  <td><div align="left">
                      <?=put_jobicon(-1,$rs->read_status,$rs->job_size - strlen($rs->job_detail) )?>
                  </div></td>
                  <td align="center"><a href="job.php?mode=view&job_id=<?=$rs->job_id?>&saveurl=1" title="<?=showshortthaidate($rs->effectivedate)." ".showtime($rs->effectivetime)?>">
                      <?=showshortthaidate($rs->effectivedate)?>
                  </a></td>
                  <td><?=put_jobicon($rs->job_type,-1,-1)?>
                      <a href="job.php?mode=view&job_id=<?=$rs->job_id?>&saveurl=1" title="<?=$rs->job_title?>">
                      <? if ( strlen($rs->job_title) > 30 ) echo  substr($rs->job_title,0,30)."..."; else echo $rs->job_title; ?>
                    </a></td>
                  <td><a href="job.php?mode=view&job_id=<?=$rs->job_id?>&saveurl=1">
                    <?=putuserimage($rs->user_id,"s")?> <?=$rs->from_user_name?>
                  </a></td>
                  <td><div align="center"><a href="job.php?mode=view&job_id=<?=$rs->job_id?>&saveurl=1">
                      <?=showfilesize($rs->job_size)?>
                  </a></div></td>
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
                      <td width="31%"><div align="right">
                          <?=$page_ctrl->num_rows." Record(s) - Page ".$page_ctrl->page." of ".$page_ctrl->num_pages." &nbsp;&nbsp;";?>
                      </div></td>
                      <td width="69%"><div align="center">
                          <? $page_ctrl->page_navigator(); ?>
                      </div></td>
                    </tr>
                  </table>
              </div>
<!-- End inside display -->
</td>
          </tr>
        </table>
      </form>    </td>
  </tr>
</table>
<? include("../include/bottom.php"); ?>
</body>
</html>
<? include("../include/disconnect.php"); ?>