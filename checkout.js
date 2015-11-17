function checkout()
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
	document.getElementById("cart_res").innerHTML=ajaxReq.responseText;
}

}


var add1=document.getElementById('ship_add1').value;
var add2=document.getElementById('ship_add2').value;
var city=document.getElementById('city').value;
var state=document.getElementById('st').value;
var zip=document.getElementById('zip').value;


var qstr="?add1="+add1+"&add2="+add2+"&city="+city+"&state="+state+"&zip="+zip;

//alert("qstr:"+qstr);
ajaxReq.open("GET","checkout.php"+qstr,true);
ajaxReq.send(null); 
}