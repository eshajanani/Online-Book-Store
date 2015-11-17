
<?php 

//user, password, and database variables 
$db_user = "root"; 
$db_password = 'Loga@1989';     
$db_dbname = 'bookstore'; 
$db_server='localhost';
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
 
   
  //run a select query 
  $select_query = "select price,img_name,title from book where category_id='$cat'order by isbn"; 
  $result = mysql_query($select_query) or die (mysql_error()); 
   
while($row = mysql_fetch_array($result)) 
  { 
		echo '<div class="col-md-4 game">';
		echo '<div class="game-price">'.$row['price'].'</div>';
		echo '<a href="product.html">';
		echo '<img  src="images/'.$row['img_name'].'.jpg"/>';
		echo '</a>';
		echo '<div class="game-title">';
		echo $row['title'];
		echo '</div>';
		echo '<div class="game-add">';
		echo '<button class="btn btn-primary" type="submit">Add To Cart</button>';
		echo'</div>';
		echo'</div>';
			
  
  } 
  //output data in a table 
  


//close database connection 
mysql_close($db) 

?> 
