<?
session_start();
require_once 'DB.php';
include_once 'db_config.php';

ini_alter('date.timezone','Asia/Bangkok');

$dsn = $DB_dbType."://". $DB_user .":".$DB_pass."@". $DB_host ."/".$DB_dbName;

$db = DB::connect($dsn, true);
if (DB::isError($db)) 
{
	die($db->getMessage());
}
$db->query("SET NAMES 'tis620'"); 
$db->query("SET chracter_set_results=NULL  "); 


define(JOBFOLDER_INBOX,0);
define(JOBFOLDER_OUTBOX,1);
define(JOBFOLDER_MYBOX,2);
define(JOBFOLDER_TRASH,3);
define(JOBFOLDER_PVCALENDAR,4);
define(JOBFOLDER_PBCALENDAR,5);

define(AUTHORIZE_WEBUSER,0x0001);
define(AUTHORIZE_WEBADMIN,0x0100);

//======================================================================
// =========== parameter =============
$row_per_page = 20;
$limit_space = 2000000;

$group_position_name = array();
$group_position_name[0] = "Group Member";
$group_position_name[1] = "Group Admin";
$month_name = array();
$month_name[1] = "มกราคม";
$month_name[2] = "กุมภาพันธ์";
$month_name[3] = "มีนาคม";
$month_name[4] = "เมษายน";
$month_name[5] = "พฤษภาคม";
$month_name[6] = "มิถุนายน";
$month_name[7] = "กรกฎาคม";
$month_name[8] = "สิงหาคม";
$month_name[9] = "กันยายน";
$month_name[10] = "ตุลาคม";
$month_name[11] = "พฤศจิกายน";
$month_name[12] = "ธันวาคม";
// =========== save url ==============

if ( $REQUEST_METHOD == "POST" && $keeppost==1 )
{
	// if $keeppost variable is set , put POST var to GET var
	$newurl = $PHP_SELF."?";
	reset ($HTTP_POST_VARS);
	while (list ($key, $val) = each ($HTTP_POST_VARS))
    	if ( $val != "Array" ) $newurl .= "&$key=$val";
}
else 
	$newurl = $PHP_SELF."?".$QUERY_STRING;
$newurl = str_replace("saveurl=1","prevurl=1",$newurl);
$newurl = str_replace("savecururl=1","prevurl=1",$newurl);
if ( $printview != 1 && $ignoreurl != 1 )
{
if ( $newurl != $g_user["cururl"] && $saveurl==1 )
{
	// url change by Not Print View and SaveURL Command
	$g_user["urlstack"]++;
	$g_user["urlstack".$g_user["urlstack"]] = $g_user["cururl"];
	$g_user["lasturl"] = $g_user["cururl"];
	$g_user["cururl"] = $newurl;
}
else if ( $prevurl == 1 && $g_user["urlstack"] > 0 )
{
	// add,update click then go back last url 
	$g_user["cururl"] = $g_user["urlstack".$g_user["urlstack"]];
	$g_user["urlstack"]--;
	$g_user["lasturl"] = $g_user["urlstack".$g_user["urlstack"]];
	parse_str($g_user["cururl"]);
}
else if ( $savecururl == 1 )
{
	// save cur url , after saveurl , user change page/sort/order in same page
	$g_user["cururl"] = $newurl;
}
else if ( $newurl != $g_user["cururl"] )
{
	//echo "CLEAR [$newurl] != [".$g_user["cururl"]."]";
	// url change , clear it
	$g_user["urlstack"] = 0;
	$g_user["urlstack1"] = "";
	$g_user["urlstack2"] = "";
	$g_user["urlstack3"] = "";
	$g_user["urlstack4"] = "";
	$g_user["lasturl"] = "";
	$g_user["cururl"] = $newurl;
}
}
//echo	$g_user["urlstack"]."<br>";
//echo	$g_user["urlstack1"]."<br>";
//echo	$g_user["urlstack2"]."<br>";
//echo	$g_user["urlstack3"]."<br>";
//echo	$g_user["urlstack4"]."<br>";
//echo	$g_user["lasturl"]."<br>";
//echo	$g_user["cururl"]."<br>";

$percent_usage = check_usage($g_user["user_id"]);

function check_usage($uid)
{
	if ( !$uid ) return;
	global $db,$limit_space,$g_user;
	// get  all job size
	$sql = "select sum(job_size) sum_job_size from weborg_job where job_user_id=".$uid;
	$resquota = $db->query($sql);
	$rsquota = $resquota->fetchRow(DB_FETCHMODE_OBJECT);
	$percent = (int)(($rsquota->sum_job_size) / $limit_space*100);
	if ( $percent > 100 ) $percent = 100;
	if ( $percent < 0 ) $percent = 0;
	if ( $rsquota->sum_job_size != $g_user["usage_space"] )
	{
		// update job quota  when it change
		$g_user["usage_space"] = $rsquota->sum_job_size;
		$sql = "update weborg_user set usage_space = ".$rsquota->sum_job_size." where user_id=".$g_user["user_id"]; 
		$db->query($sql);
	}
	$resquota->free();
	return $percent;
}

function check_authorize($level,$auth)
{
	if ( !($level & $auth) )
	{
		header("location:/organizer/showerror.php?errormsg=Please_login");
		exit();
	}
}
function put_jobicon($jt,$rst,$fs = -1,$jf=-1)
{
$x = "";
if ( $jf == 5 || $jf == 4 )
{
	// show public msg type
	if ( $jf == 4 ) 
		$x = "<img src='/images/ico_item.gif' align='absmiddle'>";
	else
		$x = "<img src='/images/ico_page.gif' align='absmiddle'>";
}
else
{
	// show normal msg type
	if ( $jt != -1 )
	{
		switch($jt)
		{
		case 1: $x =   "<img src='/images/ico_article.gif' align='absmiddle'>"; break;
		case 2: $x =   "<img src='/images/ico_announce.gif' align='absmiddle'>"; break;
		case 3: $x =   "<img src='/images/ico_stick.gif' align='absmiddle'>"; break;
		case 4: $x =   "<img src='/images/ico_url.gif' align='absmiddle'>"; break;
		case 5: $x =   "<img src='/images/ico_note.gif' align='absmiddle'>"; break;
		}
	}
}
if ( $rst != -1 )
{
	if ( $rst  ) $x .= " <img src='/images/ico_read.gif' align='absmiddle'>"; 
	else $x .= " <img src='/images/ico_unread.gif' align='absmiddle'>";
}
if  ( $fs != -1 ) if ( $fs > 500  ) $x .= " <img src='/images/ico_attach.gif' align='absmiddle'>";
return $x;
}
function showfilesize($sizeinbyte)
{
	if ( $sizeinbyte >= 10000 )
		return number_format(((double)$sizeinbyte)/1000,0)." Kb";
	else	
		return number_format(((double)$sizeinbyte)/1000,2)." Kb";
}
function putuserimage($uid,$suffix="")
{
	if ( $suffix == "s" )
		$sss = " width=20 height=25 ";
	if ( $suffix == "m" )
		$sss = " width=40 height=50 ";

	$fname = "../data/pic/$uid.jpg";
	if ( file_exists($fname) )
	{
		if ( $suffix == "s" || $suffix == "m" )
			return "<img src=\"".$fname."\" border=\"1\" $sss style=\"border-color:#CCCCCC\" align=\"absmiddle\"".
				" onmouseover=\"return overlib('',CAPTION,' ',CAPICON,'$fname',WIDTH,120,TEXTFONTCLASS,'text1');\"".
				" onmouseout=\"return nd();\">";
		else
			return "<img src=\"".$fname."\" border=\"1\" $sss style=\"border-color:#CCCCCC\" align=\"absmiddle\">";
	}
	else
		return "<img src=\"/data/pic/nopic.gif\" border=\"1\" $sss style=\"border-color:#CCCCCC\" align=\"absmiddle\">";

}
function is_groupadmin()
{
global $db,$g_user;
$sql = "select weborg_group.group_id,group_name from weborg_group ".
			" inner join weborg_group_assign on weborg_group_assign.group_id=weborg_group.group_id ".
			" where weborg_group_assign.group_position=1 and weborg_group_assign.user_id=".$g_user["user_id"];
$res = $db->query($sql);
if ( !DB::IsError($res) )
	if ( $res->numRows() > 0 )
		$nr = true;
	else
		$nr = false;
else
	$nr = false;
$res->free();
return $nr;
}

?>