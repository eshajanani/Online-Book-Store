function clear_filter()
{
document.getElementById('start').value="";
document.getElementById('end').value="";
document.getElementById('author').value="";
document.getElementById('pub_name').value="";
document.getElementById('tit_name').value="";
showProducts(0);
}