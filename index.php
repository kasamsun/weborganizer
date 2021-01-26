<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>NIDA web.organizer.php</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link href="/include/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<? include("./include/top.php"); ?>        
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0" background="./images/main_body.gif">
<tr>
<td width="184" valign="top">
</td>
<td valign="top">
<!-- =================================================== -->

	  <form name="myform" method="post" action="./organizer/login.php">
	    <p>&nbsp;</p>
	    <p>&nbsp;</p>
	    <p>&nbsp;</p>
	    <table width="320" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="5"><img src="/images/win_edge1.gif"></td>
            <th background="/images/win_bkhead.gif" class="text3">Log In </th>
            <td width="6"><img src="/images/win_edge2.gif"></td>
          </tr>
          <tr>
            <td background="/images/win_bkleft.gif">&nbsp;</td>
            <td><table width="100%"  border="0">
              <tr>
                <td width="15%">&nbsp;</td>
                <td colspan="2">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td width="21%">รหัสผู้ใช้</td>
                <td width="64%"><input name="login" type="text" id="login"></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>รหัสผ่าน</td>
                <td><input name="password" type="password" id="password"></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td colspan="2">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td colspan="2" align="center"><input name="dologin" type="submit" id="dologin" value="เข้าสู่ระบบ">
                  <input name="doreset" type="Reset" id="doreset" value="Reset"></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td colspan="2">&nbsp;</td>
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
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
	  </form> 
	  
<!-- ===================================================== -->
    </td>
  </tr>
</table>
<? include("./include/bottom.php"); ?>
</body>
</html>
<script>
document.myform.login.focus();
</script>
