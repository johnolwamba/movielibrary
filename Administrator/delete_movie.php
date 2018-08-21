<?php
include('connect.php');

$id=$_GET['id'];

mysqli_query($link,"delete from movies where movie_id='$id'") or die(mysql_error());

header('location:view.php');
?>