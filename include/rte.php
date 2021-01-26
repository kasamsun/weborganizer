<?
function  TemplateDocumentBlank(){
?>
<table width="450" cellpadding="0" cellspacing="0" id="tblCoolbar">
  <tr valign="middle" height="25">
    <td width="4" ><div class="starter"></div></td>
    <td width="303" ><select class="box1" onchange="cmdExec('formatBlock',this[this.selectedIndex].value);" id=select name=select>
        <option selected>Style</option>
        <option value="Normal">Normal</option>
        <option value="Heading 1">Heading 1</option>
        <option value="Heading 2">Heading 2</option>
        <option value="Heading 3">Heading 3</option>
        <option value="Heading 4">Heading 4</option>
        <option value="Heading 5">Heading 5</option>
        <option value="Address">Address</option>
        <option value="Formatted">Formatted</option>
        <option value="Definition Term">Definition Term</option>
      </select>
        <select class="box1" onchange="cmdExec('fontname',this[this.selectedIndex].value);" id=select4 name=select>
          <option selected>Font</option>
          <option value="Arial">Arial</option>
          <option value="Arial Black">Arial Black</option>
          <option value="Arial Narrow">Arial Narrow</option>
          <option value="Comic Sans MS">Comic Sans MS</option>
          <option value="Courier New">Courier New</option>
          <option value="Ms sans serif">Ms sans serif</option>
          <option value="System">System</option>
          <option value="Tahoma">Tahoma</option>
          <option value="Times New Roman">Times New Roman</option>
          <option value="Verdana">Verdana</option>
          <option value="Wingdings">Wingdings</option>
        </select>
        <select class="box1" onchange="cmdExec('fontsize',this[this.selectedIndex].value);" id=select5 name=select>
          <option selected>Size</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="10">10</option>
          <option value="12">12</option>
          <option value="14">14</option>
      </select></td>
    <td width="91" >
	</td>
  </tr>
</table>
<table width="450" height="28" cellpadding="0" cellspacing="0" id="tblCoolbar">
  <tr height=24> 
    <td width="4" ><div class="starter"></div></td>
    <td width="23" ><div class="cbtn" onClick="cmdExec('cut')" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);"><img align="absmiddle" src="/include/rte_images/cut.gif" alt="Cut"></div></td>
    <td width="23" ><div class="cbtn" onClick="cmdExec('copy')" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);"><img align="absmiddle" src="/include/rte_images/copy.gif" alt="Copy"></div></td>
    <td width="23" ><div class="cbtn" onClick="cmdExec('paste')" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);"><img align="absmiddle" src="/include/rte_images/paste.gif" alt="Paste"></div></td>
    <td width="4" ><div class="separator"></div></td>
    <td width="23" ><div class="cbtn" onClick="cmdExec('justifyleft')" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);"><img align="absmiddle" src="/include/rte_images/left.gif" alt="Justify Left" WIDTH="23" HEIGHT="22"></div></td>
    <td width="23" ><div class="cbtn" onClick="cmdExec('justifycenter')" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);"><img align="absmiddle" src="/include/rte_images/center.gif" alt="Center" WIDTH="23" HEIGHT="22"></div></td>
    <td width="23" ><div class="cbtn" onClick="cmdExec('justifyright')" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);"><img hspace="1" vspace="1" align="absmiddle" src="/include/rte_images/right.gif" alt="Justify Right" WIDTH="23" HEIGHT="22"></div></td>
    <td width="23" > <div class="cbtn" id="pickfgcolour" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);"	onmouseup="button_up(this);" ><img align="absmiddle" src="/include/rte_images/fgcolor.gif" alt="Forecolor" border="0" WIDTH="23" HEIGHT="22" onClick="showColor(this.clientX,this.clientY,'fg');"></div>
	<!-- --Colour drop down box-- -->
      <div id="colorbox" style="position:absolute; visibility:hidden" onmouseout="style.visibility = 'hidden';" onmouseover="style.visibility = 'visible';"> 
        <table border="0" cellpadding="0" cellspacing="0" width="150" bgcolor="#000000">
          <tr> 
            <td> <table border="0"  bordercolor="#000000" cellpadding="0" cellspacing="1">
                <tbody>
                  <tr> 
                    <script language="JavaScript">
				c = new Array();								
				c[1] = "FF";				
				c[2] = "CC";				
				c[3] = "99";				
				c[4] = "66";				
				c[5] = "33";				
				c[6] = "00";				
				d = 0;								
				for (i=1;i <=6;i++)
					{					
					if (i >1)
						{					
						document.write( "</tr>\n<tr>\n");					
						}					
					for (m=1;m <=6;m++)
						{								
						for (n=1;n <=6;n++)
							{								
							d++;							
							colour = c[i] + c[m] + c[n];	
									 
							document.write("<td bgcolor=\"#"+colour+"\" width=10 class=\"text\" onClick=\"changeColor('"+colour+"')\" onmouseover=\"this.style.cursor='hand';\"><img src=\"/include/images/pixel.gif\" width=8 height=8 name=\"a"+d+"\" border=0></td>\n");
							}					
						}				
					}	
				</script>
                  </tr>
                </tbody>
              </table></td>
          </tr>
        </table>
      </div></td>
    <td width="27" > <div class="cbtn" id="pickbgcolour" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);"> <img src="/include/rte_images/bgcolor.gif" align="absmiddle" name="colorimage" border="0" alt="Background Color" WIDTH="23" HEIGHT="22" onClick="showColor(this.x,this.y,'bg');"></div></td>
    <td width="27" ><div class="cbtn" id="pickbgfcolour" onmouseover="button_over(this);" 	onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);"> <img src="/include/rte_images/fbgcolor.gif" align="absmiddle" border="0" alt="Text Background Color" WIDTH="23" HEIGHT="22" onClick="showColor(this.x,this.y,'bgf');"></div></td>
    <td width="4" ><div class="separator"></div></td>
    <td width="23" ><div class="cbtn" onClick="cmdExec('insertorderedlist')" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);"><img align="absmiddle" src="/include/rte_images/numlist.gif" alt="Ordered List" WIDTH="23" HEIGHT="22"></div></td>
    <td width="23" ><div class="cbtn" onClick="cmdExec('insertunorderedlist')" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);"><img align="absmiddle" src="/include/rte_images/bullist.gif" alt="Unordered List" WIDTH="23" HEIGHT="22"></div></td>
    <td width="23" ><div class="cbtn" onClick="cmdExec('outdent')" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);"><img align="absmiddle" src="/include/rte_images/deindent.gif" alt="Decrease Indent" WIDTH="23" HEIGHT="22"></div></td>
    <td width="23" ><div class="cbtn" onClick="cmdExec('indent')" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);"><img align="absmiddle" src="/include/rte_images/inindent.gif" alt="Increase Indent" WIDTH="23" HEIGHT="22"></div></td>
    <td width="4" ><div class="separator"></div></td>
    <td width="23" ><div class="cbtn" onClick="cmdExec('InsertHorizontalRule')" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);"><img align="absmiddle" src="/include/rte_images/hr.gif" alt="Horizontal Rule" WIDTH="22" HEIGHT="22"></div></td>
    <td width="4" ><div class="separator"></div></td>
    <!--td width="23" ><div class="cbtn" onClick="MM();" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);"><img align="absmiddle" src="/include/images/imagelink.gif" alt="Image Link" WIDTH="23" HEIGHT="22"></div></td-->
    <td width="23"  ><div class="cbtn" style="font:8pt verdana,arial,sans-serif;cursor:hand" valign="middle" onclick="window.open('/include/imagelist.php','NewWindow','scrollbars,width=450,height=400,resizable=yes')" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);"></div></td>
    <td width="23" ><div class="starter"></div></td>
  </tr>
</table>

<table width="450" cellpadding="0" cellspacing="0" id="tblCoolbar">
  <tr valign="middle" height="25"> 
    <td ><div class="starter"></div></td>
    <td >&nbsp;</td>
    <td ><div class="separator"></div></td>
    <td ><div class="cbtn" onClick="cmdExec('bold')" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);"><img align="absmiddle" src="/include/rte_images/bold.gif" alt="Bold" WIDTH="23" HEIGHT="22"></div></td>
    <td ><div class="cbtn" onClick="cmdExec('italic')" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);"><img align="absmiddle" src="/include/rte_images/italic.gif" alt="Italic" WIDTH="23" HEIGHT="22"></div></td>
    <td ><div class="cbtn" onClick="cmdExec('underline')" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);"><img align="absmiddle" src="/include/rte_images/under.gif" alt="Underline" WIDTH="23" HEIGHT="22"></div></td>
    <td ><div class="cbtn" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);"><img src="/include/rte_images/table.gif" width="23" height="22" align="absmiddle" id="btnInsertTable" title="Build Table" onclick="TablePopup('Display');event.cancelBubble=true;"></div></td>
    <td ><div class="starter"></div></td>
    <td valign="middle" ><input type="checkbox" onclick="setMode(this.checked)" id=checkbox22 name=checkbox22></td>
    <td width="100%" valign="middle" nowrap  style="font:8pt verdana,arial,sans-serif">HTML</td>
  </tr>
</table>
<table  width="440" cellpadding=0 cellspacing=0>
  <tr bgcolor=threedface>
	<td align=right>
<iframe width="440" id="idContent"  height="290"></iframe>
	</td>
</tr>
</table>
<?}?>
<?
global $filename,$id;
Function TemplateDocumentFile($filename){?>
<table id="tblCoolbar" cellpadding="0" cellspacing="0" width="450">
  <tr valign="middle"  height="25">
    <td ><div class="starter"></div></td>
    <td ><select class="box1" onchange="cmdExec('formatBlock',this[this.selectedIndex].value);" id=select6 name=select1>
        <option selected>Style</option>
        <option value="Normal">Normal</option>
        <option value="Heading 1">Heading 1</option>
        <option value="Heading 2">Heading 2</option>
        <option value="Heading 3">Heading 3</option>
        <option value="Heading 4">Heading 4</option>
        <option value="Heading 5">Heading 5</option>
        <option value="Address">Address</option>
        <option value="Formatted">Formatted</option>
        <option value="Definition Term">Definition Term</option>
      </select>
        <select class="box1" onchange="cmdExec('fontname',this[this.selectedIndex].value);" id=select7 name=select2>
          <option selected>Font</option>
          <option value="Arial">Arial</option>
          <option value="Arial Black">Arial Black</option>
          <option value="Arial Narrow">Arial Narrow</option>
          <option value="Comic Sans MS">Comic Sans MS</option>
          <option value="Courier New">Courier New</option>
          <option value="Ms sans serif">Ms sans serif</option>
          <option value="System">System</option>
          <option value="Tahoma">Tahoma</option>
          <option value="Times New Roman">Times New Roman</option>
          <option value="Verdana">Verdana</option>
          <option value="Wingdings">Wingdings</option>
        </select>
        <select class="box1" onchange="cmdExec('fontsize',this[this.selectedIndex].value);" id=select8 name=select3>
          <option selected>Size</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="10">10</option>
          <option value="12">12</option>
          <option value="14">14</option>
      </select></td>
    <td><div class="starter"></div></td>
    <td >&nbsp; </td>
    <td ><div class="separator"></div></td>
    <td ><div class="cbtn" onClick="cmdExec('bold')" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);"><img align="absmiddle" src="/include/rte_images/bold.gif" alt="Bold" WIDTH="23" HEIGHT="22"></div></td>
    <td ><div class="cbtn" onClick="cmdExec('italic')" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);"><img align="absmiddle" src="/include/rte_images/italic.gif" alt="Italic" WIDTH="23" HEIGHT="22"></div></td>
    <td ><div class="cbtn" onClick="cmdExec('underline')" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);"><img align="absmiddle" src="/include/rte_images/under.gif" alt="Underline" WIDTH="23" HEIGHT="22"></div></td>
    <td > <div class="cbtn" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);"> 
        <img src="/include/rte_images/table.gif" width="23" height="22" align="absmiddle" id="btnInsertTable" title="Build Table" onclick="TablePopup('Display');event.cancelBubble=true;"> 
      </div></td>
    <td ><div class="starter"></div></td>
    <td valign="middle" ><input type="checkbox" onclick="setMode(this.checked)" id=checkbox23 name=checkbox23></td>
    <td valign="middle" nowrap  style="font:8pt verdana,arial,sans-serif">HTML</td>
  </tr>
</table>
<table width="450" height="28" cellpadding="0" cellspacing="0" id="tblCoolbar">
  <tr > 
    <td><div class="starter"></div></td>
    <td ><div class="cbtn" onClick="cmdExec('cut')" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);"><img align="absmiddle" src="/include/rte_images/cut.gif" alt="Cut"></div></td>
    <td ><div class="cbtn" onClick="cmdExec('copy')" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);"><img align="absmiddle" src="/include/rte_images/copy.gif" alt="Copy"></div></td>
    <td ><div class="cbtn" onClick="cmdExec('paste')" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);"><img align="absmiddle" src="/include/rte_images/paste.gif" alt="Paste"></div></td>
    <td ><div class="separator"></div></td>
    <td ><div class="cbtn" onClick="cmdExec('justifyleft')" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);"><img align="absmiddle" src="/include/rte_images/left.gif" alt="Justify Left" WIDTH="23" HEIGHT="22"></div></td>
    <td ><div class="cbtn" onClick="cmdExec('justifycenter')" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);"><img align="absmiddle" src="/include/rte_images/center.gif" alt="Center" WIDTH="23" HEIGHT="22"></div></td>
    <td ><div class="cbtn" onClick="cmdExec('justifyright')" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);"><img hspace="1" vspace="1" align="absmiddle" src="/include/rte_images/right.gif" alt="Justify Right" WIDTH="23" HEIGHT="22"></div></td>
    <td > <div class="cbtn" id="pickfgcolour" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);" > <img align="absmiddle" src="/include/rte_images/fgcolor.gif" alt="Forecolor" border="0" WIDTH="23" HEIGHT="22" onClick="showColor(this.x,this.y,'fg');"></div>
      <!-- --Colour drop down box-- -->
      <div id="colorbox" style="position:absolute; visibility:hidden" onmouseout="style.visibility = 'hidden';" onmouseover="style.visibility = 'visible';"> 
        <table border="0" cellpadding="0" cellspacing="0" width="150" bgcolor="#000000">
          <tr> 
            <td> <table border="0"  bordercolor="#000000" cellpadding="0" cellspacing="1">
                <tbody>
                  <tr> 
                    <script language="JavaScript">
				c = new Array();								
				c[1] = "FF";				
				c[2] = "CC";				
				c[3] = "99";				
				c[4] = "66";				
				c[5] = "33";				
				c[6] = "00";				
				d = 0;								
				for (i=1;i <=6;i++)
					{					
					if (i >1)
						{					
						document.write( "</tr>\n<tr>\n");					
						}					
					for (m=1;m <=6;m++)
						{								
						for (n=1;n <=6;n++)
							{								
							d++;							
							colour = c[i] + c[m] + c[n];	
									 
							document.write("<td bgcolor=\"#"+colour+"\" width=5 class=\"text\" onClick=\"changeColor('"+colour+"')\" onmouseover=\"this.style.cursor='hand';\"><img src=\"/include/images/pixel.gif\" width=8 height=8 name=\"a"+d+"\" border=0></td>\n");
							}					
						}				
					}	
				</script>
                  </tr>
                </tbody>
              </table></td>
          </tr>
        </table>
      </div></td>
    <td > <div class="cbtn" id="pickbgcolour" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);"><img src="/include/rte_images/bgcolor.gif" align="absmiddle" name="colorimage" border="0" alt="Background Color" WIDTH="23" HEIGHT="22" onClick="showColor(this.x,this.y,'bg');"></div></td>
    <td ><div class="cbtn" id="pickbgfcolour" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);"><img src="/include/rte_images/fbgcolor.gif" align="absmiddle" border="0" alt="Text Background Color" WIDTH="23" HEIGHT="22" onClick="showColor(this.x,this.y,'bgf');"></div></td>
    <td ><div class="separator"></div></td>
    <td ><div class="cbtn" onClick="cmdExec('insertorderedlist')" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);"><img align="absmiddle" src="/include/rte_images/numlist.gif" alt="Ordered List" WIDTH="23" HEIGHT="22"></div></td>
    <td ><div class="cbtn" onClick="cmdExec('insertunorderedlist')" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);"><img align="absmiddle" src="/include/rte_images/bullist.gif" alt="Unordered List" WIDTH="23" HEIGHT="22"></div></td>
    <td ><div class="cbtn" onClick="cmdExec('outdent')" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);"><img align="absmiddle" src="/include/rte_images/deindent.gif" alt="Decrease Indent" WIDTH="23" HEIGHT="22"></div></td>
    <td ><div class="cbtn" onClick="cmdExec('indent')" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);"><img align="absmiddle" src="/include/rte_images/inindent.gif" alt="Increase Indent" WIDTH="23" HEIGHT="22"></div></td>
    <td ><div class="separator"></div></td>
    <td ><div class="cbtn" onClick="cmdExec('InsertHorizontalRule')" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);"><img align="absmiddle" src="/include/rte_images/hr.gif" alt="Horizontal Rule" WIDTH="22" HEIGHT="22"></div></td>
    <td ><div class="separator"></div></td>
    <!--td ><div class="cbtn" onClick="MM();" onmouseover="button_over(this);" onmouseout="button_out(this);" onmousedown="button_down(this);" onmouseup="button_up(this);"><img align="absmiddle" src="/include/images/imagelink.gif" alt="Image Link" WIDTH="23" HEIGHT="22"></div></td-->
    <td ><div class="cbtn" style="font:8pt verdana,arial,sans-serif;cursor:hand" valign="middle"  
		onclick="window.open('/include/imagelist.php','NewWindow','scrollbars,width=450,height=400,resizable=yes')" 
		onmouseover="button_over(this);" onmouseout="button_out(this);" 
		onmousedown="button_down(this);" onmouseup="button_up(this);"></div></td>
    <td width="40" ><div class="starter"></div></td>
  </tr>
</table>

<table  width="440" cellpadding=0 cellspacing=0>
  <tr bgcolor=threedface>
	<td align=right>
<iframe width="450" id="idContent"  height="290" scrolling=yes src="<?echo $filename?>"></iframe>
	</td>
</tr>
</table>

<?}?>