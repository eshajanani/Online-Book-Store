function update_cart(isbn,quant){
$("#update").click(function(){


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

var book_no=isbn;
var qty=quant;
var qstr="?book_no="+book_no+"&qty="+qty;
//alert('im in side update cart and isbn: '+book_no+ 'and new quantity is:'+qty+"query string :"+qstr);
ajaxReq.open("GET","updatecart.php"+qstr,true);
ajaxReq.send(null);

});
}

