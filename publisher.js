function publisher()
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

var pub_name=document.getElementById('pub_name').value;

var qstr="?pub_name="+pub_name;

//alert("Publisher name:"+pub_name+"qstr:"+qstr);
ajaxReq.open("GET","publisher.php"+qstr,true);
ajaxReq.send(null); 
}
