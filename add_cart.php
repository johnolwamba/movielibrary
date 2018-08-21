<?php
session_start();
include 'Administrator/connect.php';
$movie_id = $_GET["id"];
$user_id = $_SESSION['id'];

$movie_info = mysqli_query($link,"select *  from movies where movie_id = '$movie_id' limit 1");

$movie = mysqli_fetch_array($movie_info);

$today = date('Y/m/d H:m:s');

$query = mysqli_query($link,"insert into borrow (user_id,movie_id,name,date,cost,status) values('$user_id','$movie_id','{$movie["name"]}','$today','{$movie["cost"]}',0)") ;
if(!$query)
{
    echo mysqli_error($link);
}
echo "Movie Added to Cart";
?>