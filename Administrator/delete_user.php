<?php
include('connect.php');

$id=$_GET['id'];

mysqli_query($link,"delete from users where user_id='$id'") or die(mysql_error());

header('location:main.php');
?>