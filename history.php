<?php
session_start();
//echo 'insde history php';
//print_r($_SESSION);
//user, password, and database variables 

$db_server = "mysql6.000webhost.com";
$db_dbname = "a1665414_bkstore";
$db_user = "a1665414_sar";
$db_password = "Sar123ansh.";

/*$db_user = "root"; 
$db_password = 'Loga@1989';     
$db_dbname = 'bookstore'; 
$db_server='localhost';*/


//connect to the database server 
$db = mysql_connect($db_server, $db_user, $db_password); 
if (!$db) { 
   die('Could Not Connect: ' . mysql_error()); 
} 

//select database name 
mysql_select_db($db_dbname) or die (mysql_error());
if(isset($_SESSION['user_id']))
{$user_id=$_SESSION['user_id'];
$select_query = "select price,img_name,title,isbn,book_desc from book where isbn in (select isbn from history where user_id='$user_id');"; 
  $result = mysql_query($select_query) or die (mysql_error()); 
echo'<div class="panel-heading panel-heading-green">';
	echo'<h3 class="panel-title"> <b>Your Suggestions </b></h3>';
	echo'</div>';
	echo '<br/><br/>';
while($row = mysql_fetch_array($result)) 
  { 	
		$img_name=$row['img_name'];
		$isbn=$row['isbn'];
		$price= $row['price'];
		$title=$row['title'];
		$desc=$row['book_desc'];
		echo '<div class="col-md-4 game">';
		echo '<div class="game-price">$'.$price.'</div>';
		echo '<a href="product.php?price='.$price.'&title='.$title.'&img_name='.$img_name.'.jpg'.'&isbn='.$isbn.'&desc='.$desc.'">';
		echo '<img  src="images/'.$img_name.'.jpg" width="175" height="200"/>';
		echo '</a>';
		echo '<div class="game-title">';
		echo $title;
		echo '</div>';
		echo '<div class="game-add">';
		//echo '<a class="btn btn-primary" onclick="cart('.$isbn.')">Add To Cart</a>';
		echo '<br>';
		echo'</div>';
		echo'</div>';
			
  
  } 
  //output data in a table 
  }
//close database connection 
mysql_close($db);

?>