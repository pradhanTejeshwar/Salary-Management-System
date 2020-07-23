// JavaScript Document
function conf(str)
{
	if(confirm("Are You Sure ??"))
	{
		location.replace(str);	
	}
}
function null_chk()
{
	if(document.getElementById("fname").value == "")
	{
		alert("PLease Enter Full Name");
		document.getElementById("fname").focus();
		return false;
	}
}
	function pass_chk()
	{
	    if(document.getElementById("emp_pass").value !== document.getElementById("emp_repass").value)
		{
			alert("Password and Re-type Password can't be saved");
			document.getElementById("emp_pass").focus();
			return false;
		}
	}
 function get_val(str)
     {
	  //   alert("hi"); 
		 var nodp_j = parseInt(str.value);
	//	 if (nodp_j !== "")
	//	 {
			 var l = 1;
		 	while ('nodp'+l !== str.name)
		 	{
		  		l ++  
		 	}
		 	var sum_x = 'sum_x'+l;
		 	var sum_j = document.getElementById(sum_x).value;
	      	sum_j = parseInt(sum_j);
			var work_b =  sum_j * nodp_j ;
			workb = 'work_b'+l;
	    	document.getElementById(workb).value = work_b;
	    	allown_ded(work_b,l);
	//	 }
	}
function allown_ded(work_b,l)
{
	work_b = parseInt (work_b);
	var n = document.getElementById("i").value;
	var allown = 0;
    var ded = 0;
	   
	for (i = 1; i < n;i++)
	{
	   var x = 'adamt'+i;
	   var adamt = document.getElementById(x).value;
	   adamt = parseInt(adamt);
	   var x = 'adcal'+i;
	   var adcal = document.getElementById(x).value;
	  
	   var x = 'adtype'+i;
	   var adtype = document.getElementById(x).value;
	   var amt = 0 ; 
	    
		if (adcal == '%')
		{
			if (adtype == 'a')
			{
			  amt = (work_b * adamt)/100 ;
			  allown = allown + amt;
			  
			}
			else 
			{
			  amt = (work_b * adamt)/100 ;
			  ded = ded + amt;
			}
		}	
		else if (adcal == '+')
		      allown = allown + adamt;
		else
		      ded = ded + adamt;
		
	}
	
	x = 'allown'+l; 
	document.getElementById(x).value = allown;
	x ='ded'+l;
	document.getElementById(x).value = ded;
	  
	var g_sal = work_b + allown;
	x = 'gross'+l;
	document.getElementById(x).value =  g_sal;

    var n_sal = g_sal - ded;
	x = 'salary'+l;
	document.getElementById(x).value =  n_sal;
	
  	
}


	