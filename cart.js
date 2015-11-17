function cart(isbn){

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
	document.getElementById("res").innerHTML=ajaxReq.responseText;
}

}
var book_no = isbn;
var quan = document.getElementById("qty").value;

var qstr="?book_no="+book_no+"&quan="+quan;
//salert("the book is :"+book_no + " qty is :"+quan);
ajaxReq.open("GET","cart_add.php"+qstr,true);
ajaxReq.send(null);

}

