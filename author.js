function auth()
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

var auth_name=document.getElementById('author').value;

var qstr="?auth_name="+auth_name;

//alert("Author name:"+auth_name+"qstr:"+qstr);
ajaxReq.open("GET","author.php"+qstr,true);
ajaxReq.send(null); 
}
