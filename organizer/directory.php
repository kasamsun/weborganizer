<? 
include("../include/connect.php"); 
include("../include/util.php");
include("../include/page_ctrl.php");
check_authorize($g_user["level"],AUTHORIZE_WEBUSER);


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
	  <form name="myform" method="post" action="">
	  
	  
<!-- start ============================================= program -->	  
	    <p>&nbsp;</p>
	    <p>&nbsp;</p>
	    <p>&nbsp;</p>
	    <p>&nbsp;</p>
	    <table width="560" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="5"><img src="/images/win_edge1.gif"></td>
            <th background="/images/win_bkhead.gif" class="text3">Title</th>
            <td width="6"><img src="/images/win_edge2.gif"></td>
          </tr>
          <tr>
            <td background="/images/win_bkleft.gif">&nbsp;</td>
            <td>
			
<table width="100%"  border="0">
<?
$sql = "select user_id,user_name,user_surname,title from weborg_user order by student_id";
$res = $db->query($sql);
if ( !DB::IsError($res) )
{
	$n = $res->numRows();
	$linecount = 0;
	while ( $linecount <= $n ) {
?>
<tr>
<td><? if ( $rs = $res->fetchRow(DB_FETCHMODE_OBJECT) ) echo putuserimage($rs->user_id,"m"); ?></td>
<td><? if ( $rs = $res->fetchRow(DB_FETCHMODE_OBJECT) ) echo putuserimage($rs->user_id,"m"); ?></td>
<td><? if ( $rs = $res->fetchRow(DB_FETCHMODE_OBJECT) ) echo putuserimage($rs->user_id,"m"); ?></td>
<td><? if ( $rs = $res->fetchRow(DB_FETCHMODE_OBJECT) ) echo putuserimage($rs->user_id,"m"); ?></td>
<td><? if ( $rs = $res->fetchRow(DB_FETCHMODE_OBJECT) ) echo putuserimage($rs->user_id,"m"); ?></td>
<td><? if ( $rs = $res->fetchRow(DB_FETCHMODE_OBJECT) ) echo putuserimage($rs->user_id,"m"); ?></td>
<td><? if ( $rs = $res->fetchRow(DB_FETCHMODE_OBJECT) ) echo putuserimage($rs->user_id,"m"); ?></td>
<td><? if ( $rs = $res->fetchRow(DB_FETCHMODE_OBJECT) ) echo putuserimage($rs->user_id,"m"); ?></td>
<td><? if ( $rs = $res->fetchRow(DB_FETCHMODE_OBJECT) ) echo putuserimage($rs->user_id,"m"); ?></td>
<td><? if ( $rs = $res->fetchRow(DB_FETCHMODE_OBJECT) ) echo putuserimage($rs->user_id,"m"); ?></td>
</tr>
<?
	$linecount+=10; 
}  $res->free(); } ?>
</table>
			
			</td>
            <td background="/images/win_bkright.gif">&nbsp;</td>
          </tr>
          <tr>
            <td><img src="/images/win_edge3.gif"></td>
            <td background="/images/win_bkbottom.gif"></td>
            <td><img src="/images/win_edge4.gif"></td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
		
		
<!-- end ============================================= program -->	  
	  </form>    </td>
  </tr>
</table>
<? include("../include/bottom.php"); ?>
</body>
</html>
<? include("../include/disconnect.php"); ?>