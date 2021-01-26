<?
$ignoreurl = 1;
include("../include/connect.php");
include("../include/util.php");
check_authorize($g_user["level"],AUTHORIZE_WEBUSER);
	
if ( $id )
{
	$sql = "select job_detail from weborg_job where job_id=".$id;
	$resgb = $db->query($sql);
	$rsgb = $resgb->fetchRow(DB_FETCHMODE_OBJECT);
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link href="/include/stylejob.css" rel="stylesheet" type="text/css">
<?	
	echo $rsgb->job_detail;
}
else
{?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link href="/include/stylejob.css" rel="stylesheet" type="text/css">
<? }?>