<?
function mkDirE($dir,$dirmode=777)
{
   if (!empty($dir))
   {
	   if (!file_exists($dir))
	   {
		   preg_match_all('/([^\/]*)\/?/i', $dir,$atmp);
		   $base="";
		   foreach ($atmp[0] as $key=>$val)
		   {
			   $base=$base.$val;
			   if(!file_exists($base))
				   if (!mkdir($base,$dirmode))
				   {
						echo "Error: Cannot create ".$base;
					   return -1;
				   }
		   }
	   }
	   else
		   if (!is_dir($dir))
		   {
				   echo "Error: ".$dir." exists and is not a directory";
			   return -2;
		   }
   }
   return 0;
} 
function deldir($dir){
  $current_dir = opendir($dir);
  while($entryname = readdir($current_dir)){
     if(is_dir("$dir/$entryname") and ($entryname != "." and $entryname!="..")){
        deldir("${dir}/${entryname}");
     }elseif($entryname != "." and $entryname!=".."){
        unlink("${dir}/${entryname}");
     }
  }
  closedir($current_dir);
  rmdir(${dir});
} 

function showthaidate($datets)
{
	$monthname = array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน",
			"กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
	$year = substr($datets,0,4);
	$month = substr($datets,4,2);
	$day = substr($datets,6,2);
	if ( $year+$month+$day==0 ) return "";
	return sprintf("%d %s %04d",$day,$monthname[(int)$month],$year+543);
}
function showshortthaidate($datets)
{
	$monthname = array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
	$year = substr($datets,0,4);
	$month = substr($datets,4,2);
	$day = substr($datets,6,2);
	if ( $year+$month+$day==0 ) return "";
	if ( $year+543 > 2500 )
		$year = $year+543-2500;
	else
		$year = $year+543;
	return sprintf("%d %s%02d",$day,$monthname[(int)$month],$year);
}

function showtime($datets)
{
	if ( strlen($datets) <= 0 ) return "";
	$h = substr($datets,0,2);
	$n = substr($datets,2,2);
	if ( strlen($datets) <= 4 ) 
		return sprintf("%d:%02d",$h,$n);
	else
	{
		$s = substr($datets,4,2);
		return sprintf("%d:%02d:%02d",$h,$n,$s);
	}
}
function showdate($datets)
{
	$year = substr($datets,0,4);
	$month = substr($datets,4,2);
	$day = substr($datets,6,2);
	if ( $year+$month+$day==0 ) return "";
	return sprintf("%d/%d/%04d",$day,$month,$year);
}
// convert full date from format YYYY-MM-DD HH:NN:SS -> to format D/M/YYYY H:N:S
function showdatetime($datets)
{
	$year = substr($datets,0,4);
	$month = substr($datets,4,2);
	$day = substr($datets,6,2);
	$hour = substr($datets,8,2);
	$min = substr($datets,10,2);
	$sec = substr($datets,12,2);
	if ( $year+$month+$day+$hour+$min+$sec==0 ) return "";
	return sprintf("%d/%d/%04d %d:%02d:%02d",$day,$month,$year,$hour,$min,$sec);
}
// convert full date from format YYYY-MM-DD -> to format D/M/YYYY
function date2txt($datets)
{
	$year = substr($datets,0,4);
	$month = substr($datets,4,2);
	$day = substr($datets,6,2);
	if ( $year+$month+$day==0 ) return "";
	return sprintf("%d/%d/%04d",$day,$month,$year);
}
// convert full date from format D/M/YYYY -> to format YYYY-MM-DD
function txt2date($datestr)
{
	if ( !$datestr ) return "";
	list ($d, $m, $y) = split ('[/ :]', $datestr);
	if ( $d > 2400 ) $d = $d-543;
	return sprintf("%04d%02d%02d",$y,$m,$d);
}
function txt2time($datestr)
{
	if ( !$datestr ) return "";
	list ($h, $n, $s) = split ('[/ :]', $datestr);
	return sprintf("%02d%02d%02d",$h,$n,$s);
}
function curdate()
{
	return date("Ymd");
}
function curdatetime()
{
	return date("YmdHis");
}

// convert full date from format YYYYMMDDHHNNSS -> to format UNIX_TIMESTAMP 
function dateserial($datets)
{
	$y = substr($datets,0,4);
	$m = substr($datets,4,2);
	$d = substr($datets,6,2);
	$h = substr($datets,8,2);
	$n = substr($datets,10,2);
	$s = substr($datets,12,2);
	$ds =  mktime($h ,$n, $s,$m ,$d, $y);
	if ( $y+$m+$d+$h+$n+$s==0 ) return 0;
	return $ds;
}
// return different between 2 date, in format "DD days HH:NN:SS"
function showdiffdate($datets1,$datets2)
{
	$d1 =  dateserial($datets1);
	if ( $d1==0 ) return "";
	$d2 =  dateserial($datets2);
	if ( $d2==0 ) return "";
	$d2 = $d2 - $d1;
	$s = sprintf("%02d",$d2%60);
	$d2-=$s;
	$n =  sprintf("%02d",$d2/60%60);
	$d2-=$n;
	$h =  sprintf("%d",$d2/3600%24);
	$d2-=$h;
	$d = sprintf("%d",$d2/3600/24);
	if ( $d > 1 )
	    return $d." days ".$h.":".$n.":".$s;	
	else if ( $d > 0 )
	    return $d." day ".$h.":".$n.":".$s;	
	else
	    return $h.":".$n.":".$s;	
}
// return different hours between specific date and current date
function  hourcount($datets)
{
	$t1 = dateserial($datets);
	$t2 = time();	
	$t2 = $t2 - $t1;
	$t2 -= $t2%60;
	$t2 = $t2/60;
	$t2 = (int)($t2 / 60);
	return $t2;
}
function yearcount($date1,$date2)
{
	$y = substr($date1,0,4);
	$m = substr($date1,4,2);
	$d = substr($date1,6,2);
	$dobParts=split('-',$y."-".$m."-".$d);
	$y = substr($date2,0,4);
	$m = substr($date2,4,2);
	$d = substr($date2,6,2);
	$yeardiff = $y - intval($dobParts[0]);
	$monthdiff = $m - intval($dobParts[1]);
	$daydiff = $d - intval($dobParts[2]);
	if ( ($monthdiff < 0) || (($monthdiff==0)&&($daydiff<0)) ) 
	{
		$age = $yeardiff - 1;
	} 
	else 
	{
		$age = $yeardiff;
	}
	return $age;
}
?>