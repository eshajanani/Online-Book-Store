function showProducts(cat)
{
var ajaxReq;
try{
ajaxReq = new XMLHttpRequest();
}
catch(e)
{
try{
ajaxReq= new ActiveXObject("Msxml2.XMLHTTP");
}
catch(e)
{
try
{
ajaxReq= new ActiveXObject("Microsoft.XMLHTTP");
}
catch(e)
{
alert("The browser broke!");
return false;
}
}
}

ajaxReq.onreadystatechange=function()
{
if(ajaxReq.readyState == 4)
{
	document.getElementById("row1").innerHTML=ajaxReq.responseText;
}

}


var category=cat;
var qstr="?category="+category;
ajaxReq.open("GET","prod_Display.php"+qstr,true);
ajaxReq.send(null);

}
function price(form)
{

var ajaxReq;
try{
ajaxReq = new XMLHttpRequest();
}
catch(e)
{
try{
ajaxReq= new ActiveXObject("Msxml2.XMLHTTP");
}
catch(e)
{
try
{
ajaxReq= new ActiveXObject("Microsoft.XMLHTTP");
}
catch(e)
{
alert("The browser broke!");
return false;
}
}
}

ajaxReq.onreadystatechange=function()
{
if(ajaxReq.readyState == 4)
{
	document.getElementById("row1").innerHTML=ajaxReq.responseText;
}

}
var start_pr= form.start.value;
alert("start price is:"+start_pr);
var end_pr= form.end.value;
alert("end price is:"+end_pr);

var qstr="?start_pr="+start_pr+"&end_pr="+end_pr;
ajaxReq.open("GET","price_filter.php"+qstr,true);
ajaxReq.send(null);

}
function auth()
{
alert("Inside new author function");
}
function pub()
{
alert("Inside new publisher function");
}
