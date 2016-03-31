<?php 
require("constants.php");
//error_reporting(E_ALL ^ E_DEPRECATED);
//  1.  Create a database connetion
//$connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

$connection = NEW MySQLi(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
if (!$connection) {
	die("Database connection failed: " . mysql_error());
}


// 2. Select a database to use 
//$db_select = mysql_select_db(DB_NAME,$connection);
//if (!$db_select) {
//	die("Database selection failed: " . mysql_error());
//}
?>
