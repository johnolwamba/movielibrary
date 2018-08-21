<?php
session_start();
  if(!isset($_SESSION['id'])){
  header("Location:index.php"); 
   }else {
       
include('connect.php');
 $today=  date("Y/m/d");
$_SESSION['date'] = $today;

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
 <link rel="stylesheet" href="js/jquery-ui.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap-responsive.css"> 
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui.js"></script>
<title>Approved Movies</title>
<script>
$(function() {
$( "#datepicker" ).datepicker();
});
</script>
</head>

<body style=" background-image:url(images/index.jpg); background-repeat: repeat">
    <?php
    include 'header.php';
    ?>

   <div id="middle">   
<div>

<!--I want to load the first DIV-->
<div id="myDiv" style="padding-top:20px; margin-left:30px;">   
    <div class="well">
       
      <table border= "1" width=\"150%\" border=\:0\" class='table table-striped'>
    <th>BORROWER NAME</th><th>MOVIE</th><th>STATUS</th> 
    <tr>
       <?php
     $per_page = 10;
$pages_query=mysqli_query($link,"select * from borrow where status= 3");
$pages = ceil(mysqli_num_rows($pages_query)/$per_page);

if(!isset($_GET['page']))
{
   header("location: approved.php?page=1");
}else {
    
$page=$_GET['page'] ;

}
$start = (($page - 1)* $per_page); 

       
$result= mysqli_query($link,"select * from borrow where status= 3"); 
$details= array();
while($get_details = mysqli_fetch_array($result))
{
    $get_user = mysqli_query($link,"select * from users where user_id='{$get_details['user_id']}'");
    $movie_borrower = mysqli_fetch_array($get_user);
    $get_movie = mysqli_query($link,"select * from movies where movie_id='{$get_details['movie_id']}'");
    $movie_borrowed = mysqli_fetch_array($get_movie);
          
    
    $borrow_id = $get_details['borrow_id'];
          ?>  
            
        <td><?php echo $movie_borrower['name']; ?></td><td><?php echo $movie_borrowed['name'] ?></td><td><?php
       $status = $get_details['status'];
    if($status != 3){
        echo '<button class="btn btn-danger">Pending</button>';
    }  else {
        echo '<button class="btn btn-success">Approved</button>'; 
    }
    
        ?></td>
  
 <?php
   
echo "</td>";

echo '</tr>';
}
echo '<a onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i> Print</a>';
echo '<div style="float:right; width:200px;" class="alert alert-info">';
for ($number = 1; $number <=$pages; $number++) {
    
    echo '<a href="?page='.$number.'" style="font-size:16px; margin-right:10px;" class="alert-success">'.$number.'</a>'; 
   
}
echo '  ';
echo "Current Page: $page";
echo '</div>';
echo '</table>';



?>

        
    

</div>
</div>
   </div>
   
</body>
</html>
<?php
   }
   ?>