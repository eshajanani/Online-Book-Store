<?php

$db_server = "mysql6.000webhost.com";
$db_dbname = "a1665414_bkstore";
$db_user = "a1665414_sar";
$db_password = "Sar123ansh.";

//user, password, and database variables 
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
$src_name=$_GET['src_name']; 
$src_name=mysql_real_escape_string($src_name);


  //run a select query 
  $select_query = "select price,img_name,title,isbn,book_desc from book where author like '%".$src_name."%' or publisher like '%".$src_name."%' or title like '%".$src_name."%' or book_desc like '%".$src_name."%';"; 
  $result = mysql_query($select_query) or die (mysql_error()); 
   
  $num_rows = mysql_num_rows($result);
  
   echo'<div class="panel-heading panel-heading-green">';
	echo'<h3 class="panel-title"> <b>Search Matches:  </b></h3>';
	echo'</div>';
	echo '<br/><br/>';
	if( $src_name == "")
	{
	echo '<h3> No match found. Please provide the search text </h3>';
	}
	else
	{
	if ($num_rows == 0)
	  echo '<h3> No matches found </h3>';
	  else
	  {
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
  }
  }  
mysql_close($db) 
?>