<?php
include('Administrator/connect.php');

$id=$_GET['id'];

$toa =mysqli_query($link,"delete from borrow where movie_id='$id'") or die(mysql_error());


if(!$toa)
{
    echo mysqli_error($link);
}
echo "Deleted";




//header('location:cart.php');
?>