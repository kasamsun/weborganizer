<?
include("../include/connect.php"); 
include("../include/util.php");

if ( !session_is_registered("g_user") )
	session_register("g_user");
$g_user = array();
$g_user["user_id"] = 0;

$sql = "select user_id,user_name,user_surname,login,password,dep_id from weborg_user where login='$login'";
$res =& $db->query($sql);
if (DB::isError($res))  die($res->getMessage());
if ( $res->numRows() <= 0 ) 
{
	header("location:showerror.php?errormsg=Usernotfound");
	exit();
}
$rs = $res->fetchRow(DB_FETCHMODE_OBJECT);
if (DB::isError($rs))  die($rs->getMessage());
if ( $rs->password == $password )
{
	$g_user["user_id"] = $rs->user_id;
	$sql = "update user set login_status=1 where user_id=".$rs->user_id;
	$db->query($sql);
	$g_user["login"] = $rs->login;
	// all user apply with office automation authorize
	$g_user["level"] = AUTHORIZE_WEBUSER;
	// get authorize level
	$sql = "select  group_position from weborg_group ".
			" inner join weborg_group_assign on weborg_group_assign.group_id=weborg_group.group_id ".
			" where weborg_group_assign.user_id=".$rs->user_id;
	$res2 = $db->query($sql);
	if ( !DB::IsError($res2) ) 
	{
		while ( $rs2 = $res2->fetchRow(DB_FETCHMODE_OBJECT) )
		{
				if ( $rs2->group_position > 0 ) 
					$g_user["level"] |= AUTHORIZE_WEBADMIN;
				else
					$g_user["level"] |= AUTHORIZE_WEBUSER;
		}
	}
	$g_user["user_name"] = $rs->user_name;
	$g_user["user_surname"] = $rs->user_surname;
	$g_user["title"] = $rs->title;
	$g_user["dep_id"] = $rs->dep_id;
	$g_user["usage_space"] = 0;
	$g_user["cururl"] = "";
	$g_user["lasturl"] = "";
	$g_user["urlstack1"] = "";
	$g_user["urlstack2"] = "";
	$g_user["urlstack3"] = "";
	$g_user["urlstack4"] = "";
	$g_user["urlstack5"] = "";
	$g_user["urlstack"] = "";
}
else
{
	$res->free();
	header("location:showerror.php?errormsg=Wrongpassword");
	exit();
}
$res->free();
header("location:index.php");
exit();
?>