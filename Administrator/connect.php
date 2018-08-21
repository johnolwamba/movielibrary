<?php

//create a connection to the database

/*
$hostname_connct="localhost";
$database_connct = "movielibrary";
$username_connct="root";
$password_connct="";

$connct=mysql_pconnect($hostname_connct,$username_connct,$password_connct)
or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_connct,$connct) or die("Error:db connection failed");
*/


$link = mysqli_connect("127.0.0.1", "root", "", "movielibrary");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

//echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
//echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

//mysqli_close($link);



?>