function book_tit()
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

var title_name=document.getElementById('tit_name').value;

var qstr="?title_name="+title_name;

//alert("Publisher name:"+title_name+"qstr:"+qstr);
ajaxReq.open("GET","title.php"+qstr,true);
ajaxReq.send(null); 
}
