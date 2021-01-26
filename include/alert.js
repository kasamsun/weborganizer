<!--
	function requireField(element,altvalue)//usage "return requireField(new Array(document.form1.email,document.form1.pass),new Array('Email address is required !','Password is required !'));"
	{
		for(i=0;i<element.length;i++)
		{
			if(element[i].value == '')
			{
				alert(altvalue[i]);
				element[i].focus();
				return false;
			}
		}
		return true;
	}
//-->