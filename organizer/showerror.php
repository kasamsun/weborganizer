<?
include("../include/connect.php");
include("../include/util.php");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>NIDA : Web Organizer</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link href="../include/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<? include("../include/top.php"); ?>
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0" background="../images/main_body.gif">
<tr>
<td width="184" valign="top">&nbsp;
</td>
    <td height="360" valign="top">
      <? include("../include/user.php"); ?>
	    <p>&nbsp;</p>
	    <p>&nbsp;</p>
	    <p>&nbsp;</p>
	    <p>&nbsp;</p>
<table width="160" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
            <td width="5"><img src="/images/win_edge1.gif"></td>
            <th background="/images/win_bkhead.gif" class="text3">Message</th>
            <td width="6"><img src="/images/win_edge2.gif"></td>
  </tr>
  <tr>
    <td background="/images/win_bkleft.gif">&nbsp;</td>
    <td>
      <!-- Start inside display -->
      <table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="16"></td>
          <td width="56"><img src="../images/ico_error.gif"></td>
          <td width="228"><b><?=$errormsg?></b></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td><input type="button" name="dologin2" value="เข้าระบบใหม่" onclick="location.href='/index.php'">
            <input type="button" name="doclose2" value="ปิดหน้าจอ" onclick="window.close()"></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
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
    <p>&nbsp;</p></td>
  </tr>
</table>
<? include("../include/bottom.php"); ?>
</body>
</html>
<? include("../include/disconnect.php"); ?>
