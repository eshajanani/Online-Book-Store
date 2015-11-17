<?php
session_start();
//print_r($_SESSION);
//echo '<tr> <td>im inside cart_prod php file</td> </tr>';
$db_server = "mysql6.000webhost.com";
$db_dbname = "a1665414_bkstore";
$db_user = "a1665414_sar";
$db_password = "Sar123ansh.";

//$db_user = "root"; 
//$db_password = 'Loga@1989';     
//$db_dbname = 'bookstore'; 
//$db_server='localhost';

//connect to the database server 
$db = mysql_connect($db_server, $db_user, $db_password); 
if (!$db) { 
   die('Could Not Connect: ' . mysql_error()); 
} 

//select database name 
mysql_select_db($db_dbname) or die (mysql_error());
if(isset($_SESSION['user_id']))
{$user_id=$_SESSION['user_id'];
  $cart_query ="select cart_id,user_id from cart where user_id='$user_id' and isActive=1";
   $cart_res= mysql_query($cart_query) or die (mysql_error());
   $cart_row=mysql_fetch_array($cart_res);
   $num_rows = mysql_num_rows($cart_res);
   $cart_id=$cart_row['cart_id'];
  // echo '<tr> <td>cart id:'.$cart_id.'</td> </tr>';
//echo '<tr> <td>'.$num_rows.'</td> </tr>';
if($num_rows == 0)
{ 
echo '<tr> <td>There are no items in the cart</td> </tr>';
}
else
{
$count=0;
$subtotal=0;
$shipping=4.99;
  $select_query = "select bc.isbn as isbn,title,price, quantity from (select isbn,title,price from book where isbn in ( select isbn from cartdetails where cart_id in (select cart_id from cart where user_id='$user_id' and isActive=1)) ) as bc join cartdetails c on bc.isbn=c.isbn where c.cart_id='$cart_id' and quantity > 0"; 
  $result = mysql_query($select_query) or die (mysql_error()); 
while($row = mysql_fetch_array($result)) 
  { 	
	
		$isbn=$row['isbn'];
		$title=$row['title'];
		$price= $row['price'];
		$quan=$row['quantity'];
		$count=$count+1;
		echo '<tr>';
		echo '<td>'.$title .'</td> ';
		echo '<td><form name="f'.$row['isbn'].'"><input type= "text" name="quant'.$row['isbn'].'" value="'.$quan.'" size="1" onchange="update_cart('.$row['isbn'].',this.value)"></form></td>';
		echo '<td>$'.$price.'</td>';
		echo '</tr>';
		$subtotal+=$price*$quan;
		
		}
		
		$total=$subtotal+$shipping;
		echo' <tr>';
		echo ' <td colspan="3" class="cart-subtotal">';
		echo ' <h4><b>Subtotal: $<span id="subtotal">'.$subtotal .'</span></b></h4>';
		echo '</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td colspan="3" class="cart-shipping">';
		echo '<h4><b>Shipping: $' .$shipping .'</b></h4>';
		echo '</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td colspan="3" class="cart-total">';
		echo ' <h4><b>Total: $<span id="total">'.$total .'</span></b></h4>';
		echo '</td>';
		echo '</tr> ';
		
}
}
header("Refresh:cart.html");

?>