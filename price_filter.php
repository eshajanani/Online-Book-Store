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
$st_pr=$_GET['start_pr']; 

$st_pr=mysql_real_escape_string($st_pr);
$last_pr=$_GET['end_pr']; 

$last_pr=mysql_real_escape_string($last_pr);
if ($st_pr == "" || $last_pr == "")
{
echo '<h3> No match found. Please provide the valid price range </h3>';
}
else
{
//run query and output results 
 
  //run a select query 
  $select_query = "select price,img_name,title,isbn,book_desc from book where price between '$st_pr' and '$last_pr' "; 
  $result = mysql_query($select_query) or die (mysql_error()); 
  $num_rows = mysql_num_rows($result);
   echo'<div class="panel-heading panel-heading-green">';
	echo'<h3 class="panel-title"> <b>Price category: Between '.$st_pr.'and '.$last_pr.' </b></h3>';
	echo'</div>';
	echo '<br/><br/>';
	  if ($num_rows == 0)
	  echo '<h3> No match found </h3>';
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