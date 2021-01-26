<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language=javaScript>
<!-- Beginning of JavaScript -

img0 = new Image();
img0.src = "/data/pic/4710426004.jpg";

img1 = new Image();
img1.src = "/data/pic/4710426005.jpg";

img2 = new Image();
img2.src = "/data/pic/4710426006.jpg";

img3 = new Image();
img3.src = "/data/pic/4710426007.jpg";


var i_strngth=1
var i_image=0
var changeopacity
var imgscr
var timer


function preshowimage(thisimage) {
	clearTimeout(timer)
	p4710426004.innerHTML="<a href='#' onMouseOver='preshowimage(\"p4710426004\")'><img style='filter:alpha(opacity=10)' src='/data/pic/4710426004.jpg' border=0>";
	p4710426005.innerHTML="<a href='#' onMouseOver='preshowimage(\"p4710426005\")'><img style='filter:alpha(opacity=10)' src='/data/pic/4710426005.jpg' border=0>";
	p4710426006.innerHTML="<a href='#' onMouseOver='preshowimage(\"p4710426006\")'><img style='filter:alpha(opacity=10)' src='/data/pic/4710426006.jpg' border=0>";
	p4710426007.innerHTML="<a href='#' onMouseOver='preshowimage(\"p4710426007\")'><img style='filter:alpha(opacity=10)' src='/data/pic/4710426007.jpg' border=0>";
	i_strngth=10
	imgscr=thisimage+".jpg"
	changeopacity=eval(thisimage)
	showimage()
}



function showimage() {
	if(document.all) {
		if (i_strngth <=100) {
			changeopacity.innerHTML="<img style='filter:alpha(opacity="+i_strngth+")' src="+imgscr+" border=0>";
			i_strngth=i_strngth+2
			var timer=setTimeout("showimage()",50)

		}
		else {
			clearTimeout(timer)
			var timer=setTimeout("hideimage()",400)
		}
	}
}

function hideimage() {
	if(document.all) {
		if (i_strngth >=10) {
			changeopacity.innerHTML="<img style='filter:alpha(opacity="+i_strngth+")' src="+imgscr+" border=0>";
			i_strngth=i_strngth-2
			var timer=setTimeout("hideimage()",50)

		}
		else {
			clearTimeout(timer)
			var timer=setTimeout("showimage()",400)
		}
	}
}

// - End of JavaScript - -->
</script>

<style>
H1 	{
	font-size : 20;
	font-family : Times;
	color : 444444;
	}

A	{
	text-decoration: underline;
	color : 444444;
	}

A:Visited	{
	text-decoration: underline;
	color : 444444;
	}

A:Hover{
	text-decoration: none;
	font-family : Times;
	color : FF0000;
	}

A:Active	{
	text-decoration: underline;
	color : 444444;
	}
</style></head>

<body>
<div id="p4710426004" style="position:absolute;visibility:visible;top:10px;left:20px"><a href="#" onMouseOver="preshowimage('p4710426004')"><img style='filter:alpha(opacity=10)' src=/data/pic/4710426004.jpg border=0></a></div>
<div id="p4710426005" style="position:absolute;visibility:visible;top:80px;left:20px"><a href="#" onMouseOver="preshowimage('p4710426005')"><img style='filter:alpha(opacity=10)' src=/data/pic/4710426005.jpg border=0></a></div>
<div id="p4710426006" style="position:absolute;visibility:visible;top:150px;left:20px"><a href="#" onMouseOver="preshowimage('p4710426006')"><img style='filter:alpha(opacity=10)' src=/data/pic/4710426006.jpg border=0></a></div>
<div id="p4710426007" style="position:absolute;visibility:visible;top:220px;left:20px"><a href="#" onMouseOver="preshowimage('p4710426007')"><img style='filter:alpha(opacity=10)' src=/data/pic/4710426007.jpg border=0></a></div>

</body>
</html>
