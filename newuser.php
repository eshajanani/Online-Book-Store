
<?php 
if (!isset($_GET['fname']))  
{echo ' Please provide your First name';
echo '<br/>';}
else if (!isset($_GET['lname']))  
{echo ' Please provide your Last name';
echo '<br/>';}
else if (!isset($_GET['email']))  
{echo ' Please provide your Email Address';
echo '<br/>';}
else if (!isset($_GET['username']))  
{echo ' Please provide your Username to be used for login';
echo '<br/>';}
else if (!isset($_GET['pwd']))  
{echo ' Please provide your Password to be used for login';
echo '<br/>';
}
else
{
$db_server = "mysql6.000webhost.com";
$db_dbname = "a1665414_bkstore";
$db_user = "a1665414_sar";
$db_password = "Sar123ansh.";

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
$fname=$_GET['fname'];
$lname=$_GET['lname'];
$email=$_GET['email'];
$username=$_GET['username'];
$pwd=$_GET['pwd'];
if(mysql_query("insert into user values('$fname','$lname','$email','$username','$pwd')"))
echo "<h2> Successfully added user</h2>";
else
echo "<h2>Insertion Failed</h2>";
}
mysql_close($db) 

?> 
