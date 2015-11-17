
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
/** 
* Run MySQL query and output  
* results in a HTML Table 
*/ 

//connect to the database server 
$db = mysql_connect($db_server, $db_user, $db_password); 
if (!$db) { 
   die('Could Not Connect: ' . mysql_error()); 
} 

//select database name 
mysql_select_db($db_dbname) or die (mysql_error());
$cat=$_GET['category']; 

$cat=mysql_real_escape_string($cat);

//run query and output results 
 
  $cat_query ="select category_name from category where category_id='$cat'";
   $cat_res= mysql_query($cat_query) or die (mysql_error());
   $cat_name=mysql_fetch_array($cat_res);
  //run a select query 
  $select_query = "select price,img_name,title,isbn,book_desc from book where category_id='$cat' order by isbn"; 
  $result = mysql_query($select_query) or die (mysql_error()); 
   echo'<div class="panel-heading panel-heading-green">';
	echo'<h3 class="panel-title"> <b>'.$cat_name['category_name'].'</b></h3>';
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
		echo '<a href="product.php?price='.$price.'&title='.$title.'&img_name='.$img_name.'.jpg'.'&isbn='.$isbn.'&desc='.$desc.'" onclick="history_add('.$isbn.')">';
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
  
//close database connection 
mysql_close($db);

?> 
