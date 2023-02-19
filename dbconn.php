<?php
/* php & mysql db connection file*/
$user = "root"; //mysql username
$pass = ""; //mysql pass
$host = "localhost"; 
$dbname = "efinancial";
$dbconn = mysqli_connect($host, $user, $pass, $dbname);


/*if(isset($dbconn)){
	mysqli_select_db($dbname, $dbconn) or die("<center>Error: " . mysql_error() . "</center>");
}
else{
	echo "<center>Error: Could not connect to the database.</center>";
}*/
if(mysqli_connect_errno())
{
    echo "Failed to connect to MySQL:" .mysqli_connect_error();
}
/*else
	echo 'ok';
?>*/
