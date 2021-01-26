<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link href="/include/style.css" rel="stylesheet" type="text/css">
<table width="450" height="180" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
            <td width="5"><img src="/images/win_edge1.gif"></td>
            <th background="/images/win_bkhead.gif" class="text3">Message</th>
            <td width="6"><img src="/images/win_edge2.gif"></td>
    </tr>
    <tr>
    <td background="/images/win_bkleft.gif">&nbsp;</td>
      <td>
        <table width="100%" height="160" border="0" align="center" cellpadding="0" cellspacing="0" background="/images/bg-fadegreen.gif">
          <tr>
            <td colspan="2">&nbsp;</td>
            <td width="381">&nbsp;</td>
          </tr>
          <tr>
            <td width="18"></td>
            <td width="41"><? if ( substr($showmsg,0,2) == "#e" ) { ?><img src="../images/ico_error.gif"><? } else { ?><img src="../images/ico_information.gif"><? } ?></td>
            <td><b><?=str_replace("#e","",$showmsg)?></b></td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3"><div align="center">
<input type="button" name="docontinue" value="ทำงานต่อ" onclick="location.href='<? if ( $backurl ) echo $backurl; else if ( $g_user["lasturl"] ) echo $g_user["lasturl"]; else echo $PHP_SELF; ?>';">
            </div></td>
          </tr>
          <tr>
            <td height="14" colspan="2">&nbsp;</td>
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