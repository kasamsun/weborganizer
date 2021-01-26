function validNumber(value)
{
	var anum=/(^\d+$)|(^\d+\.\d+$)/;
	if (anum.test(value) || value == "")
		return 1;
	else
	{
		return 0;
	}
}
	function checkEmail(This,altvalue)
	{
		var result,address,user;
		var i;
		address=This.value;
		components=new Array();
		if (address.match(/^[\w_\-\.]+\@[\w_\-]+\.[\w_\-\.]+$/))
		{
			address=address.replace('@','.');
			components=address.split('.');
			for (i=0; i<components.length-1; i++)
			{
				if (components[i].match(/[^\w_\-]/))
				{
					result=false;
					break;				
				}
			}
			if (result!=false)
				result=true;
		}
		else
			result=false;

		if (result == false)
		{
			alert(altvalue);
			This.focus();
			return false;
		}
		return true;
	}
function checkNumber(This,altvalue)
{
	var anum=/(^\d+$)|(^\d+\.\d+$)/;
		if (anum.test(This.value) || This.value == "")
		{ }
		else
		{
			alert(altvalue);
			This.focus();
			return false;
		}
		return true;
}
function checkFormatDate(This,altvalue){//check format date (dd/mm/yyyy)
	var date = This.value;
	var arrDate = date.split('/');
	var maxday;
	var maxmonth = 12;
	var curryear = 1900;
	var maxyear = 2599
	var day;
	
	if( (!validNumber(arrDate[1])) || (!validNumber(arrDate[0])) || (!validNumber(arrDate[2])) )	{//check valid number '/'
		alert(altvalue);
		This.focus();
		return false;
	}
	if( (parseInt(arrDate[1]) < 1) || (parseInt(arrDate[1]) > maxmonth)){//check valid month
		alert(altvalue);
		This.focus();
		return false;
	}
	switch (arrDate[1]){
		case '01' : maxday = 31; break;
		case '02' : maxday = 29; break;
		case '03' : maxday = 31; break;
		case '04' : maxday = 30; break;
		case '05' : maxday = 31; break;
		case '06' : maxday = 30; break;
		case '07' : maxday = 31; break;
		case '08' : maxday = 31; break;
		case '09' : maxday = 30; break;
		case '10' : maxday = 31; break;
		case '11' : maxday = 30; break;
		case '12' : maxday = 31; break;
	}
	day = arrDate[0];
	if(day.substr(0,1)=="0"){
		day = day.substr(1,1);
	}
	if( (day < 1) || (day > maxday) ){//check valid day
		alert(altvalue);
		This.focus();
		return false;
	}

	if( (parseInt(arrDate[2]) < curryear) || (parseInt(arrDate[2]) > maxyear) ){//check valid year
		alert(altvalue);
		This.focus();
		return false;
	}
	return true;
}

function checkDateDept(curDate,dept,retn,altvalue){//
	var deptDate = dept.value;
	var retnDate = retn.value;
	var arrdeptDate = deptDate.split('/');
	var arrcurDate = curDate.split('/');
	var arrretnDate = retnDate.split('/');

	deptDate = arrdeptDate[2]+arrdeptDate[0]+arrdeptDate[1];
	curDate = arrcurDate[2]+arrcurDate[0]+arrcurDate[1];
	retnDate = arrretnDate[2]+arrretnDate[0]+arrretnDate[1];

	if((curDate<=deptDate)&&(deptDate<=retnDate) ){
		return true;
	}
	else{
		alert(altvalue);
		return false;
		dept.focus();
		
	}

}

function checkDateDeptList(curDate, deptDay,deptMonth,deptYear,retnDay,retnMonth,retnYear,altvalue)	{
	
	var arrcurDate = curDate.split('/');
	

	//alert(deptDay);
	deptDay = deptDay.value;
	deptMonth = deptMonth.value;
	deptYear = deptYear.value;
	retnDay = retnDay.value;
	retnMonth = retnMonth.value;
	retnYear = retnYear.value;
	
	var deptDate = deptYear+deptMonth+deptDay;
	var retnDate = retnYear+retnMonth+retnDay;

	curDate = arrcurDate[2]+arrcurDate[0]+arrcurDate[1];

	if((curDate<=deptDate)&&(deptDate<=retnDate) ){
		//alert(curDate+"-"+deptDate+"-"+retnDate+"true");
		//alert("555");
		return true;

	}
	else{
		//alert(curDate+"-"+deptDate+"-"+retnDate+"false");
		alert(altvalue);
		//deptDay.focus();
		return false;
	}
	
}
