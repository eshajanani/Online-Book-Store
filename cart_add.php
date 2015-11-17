<?php 
session_start();
//print_r($_SESSION);
//echo '<p> Inside cart php file </p>';
if (!isset($_GET['book_no']))  
{echo ' <h4>Book no is NA </h4>';
echo '<br/>';}
else if(!isset($_GET['quan']))
{
echo ' <h4>Please select the quantity </h4>';
echo '<br/>';
}
else if(!isset($_SESSION['user_id']))
{
echo ' <h4>Please login and continue </h4>';
echo '<br/>';
}
else
{
//user, password, and database variables 

$db_server = "mysql6.000webhost.com";
$db_dbname = "a1665414_bkstore";
$db_user = "a1665414_sar";
$db_password = "Sar123ansh.";

//$db_user = "root"; 
//$db_password = 'Loga@1989';     
//$db_dbname = 'bookstore'; 
//$db_server='localhost';
echo '<h1>';
//print_r($_SESSION);
echo '</h1>';
//connect to the database server 
$db = mysql_connect($db_server, $db_user, $db_password); 
if (!$db) { 
   die('Could Not Connect: ' . mysql_error()); 
} 

//select database name 
mysql_select_db($db_dbname) or die (mysql_error());
$isbn=$_GET['book_no']; 
$user_id=$_SESSION['user_id'];
//echo "user is:".$_SESSION['user_id'];
$isbn=mysql_real_escape_string($isbn);
$isActive=1;
$qty=$_GET['quan'];

//run query and output results 
 $book_query ="select copies_available from book where isbn='$isbn'";
	$book_res= mysql_query($book_query) or die (mysql_error());
	$book_row=mysql_fetch_array($book_res);
   $aval_qty=$book_row['copies_available'];
  //echo 'aval_qty:'.$aval_qty;
   if ($aval_qty <= 0 )
  echo "<b> Sorry Book is not available </b>";
  else if($aval_qty < $qty)
  echo '<b> Quantity available is:'.$aval_qty.' please select the available quantity</b>';
  else
  {
   
 $user_result = mysql_query("select user_id from cart where user_id='$user_id'");
$num_rows = mysql_num_rows($user_result);
//echo $num_rows;
if($num_rows == 0)
{ 
if(mysql_query("insert into cart (user_id,isActive) values('$user_id','$isActive')"))
echo "<h6> Successfully add the user in the cart</h6>";
else
echo "<b>Please login and continue</b>";
}
else
echo "<h6> </h6>";

   $cart_query ="select cart_id,user_id from cart where user_id='$user_id' and isActive=1";
   $cart_res= mysql_query($cart_query) or die (mysql_error());
   $cart_row=mysql_fetch_array($cart_res);
   $cart_id=$cart_row['cart_id'];
  // echo 'cart id:'.$cart_id;

  
   $quan_result = mysql_query("select cart_id,isbn from cartdetails where cart_id='$cart_id' and isbn='$isbn'");
$qnum_rows = mysql_num_rows($quan_result);
if($qnum_rows == 0)
{ 
if(mysql_query("insert into cartdetails (cart_id,isbn,quantity) values('$cart_id','$isbn','$qty')"))
{
echo "<b> Successfully added book in the cart</b>";
if(mysql_query("insert into history(user_id,isbn) values('$user_id','$isbn')"))
{
//echo "<h6> Successfully added book in the history</h6>";
}

 $aval_qty=$aval_qty-$qty;
 
   $update_query="update book set copies_available='$aval_qty' where isbn='$isbn'";
  if( mysql_query($update_query) or die (mysql_error()))
  //echo '<tr> <td>Quantity updated successfuly in books table</td> </tr>';
echo '<h4> Remaining availabilty:'.$aval_qty.' go to cart to update if necessary</h4>'; 
}
else
echo "<h6>Insertion Failed</h6>";
}
else
echo "<h6> The book already exists in the cart  .Please go to cart for updating </h6>";
}
}

echo '<br/><br/>';
//close database connection 

?> 


