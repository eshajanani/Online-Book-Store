<?php
session_start();
$_SESSION['user_id'] = $uid;
$db_server = "mysql6.000webhost.com";
$db_dbname = "a1665414_bkstore";
$db_user = "a1665414_sar";
$db_password = "Sar123ansh.";

/*$db_user = "root"; 
$db_password = 'Loga@1989';     
$db_dbname = 'bookstore'; 
$db_server='localhost';*/
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


if(mysql_query("insert into history(user_id,isbn) values('$user_id','$isbn')"))
{
echo "<h6> Successfully added book in the history</h6>";
}
?>
