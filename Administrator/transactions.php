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
<title>Transactions</title>
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
        <form action="transactions.php" method="post">
      <table border= "1" width=\"150%\" border=\:0\" class='table table-striped'>
    <th>BORROWER NAME</th><th>MOVIE</th><th>STATUS</th><th>ACTION</th> 
    <tr>
       <?php
$result= mysqli_query($link,"select * from borrow where status= 1"); 
$details= array();
while($get_details = mysqli_fetch_array($result))
{
    $get_user = mysqli_query($link,"select * from users where user_id='{$get_details['user_id']}'");
    $movie_borrower = mysqli_fetch_array($link,$get_user);
    $get_movie = mysqli_query($link,"select * from movies where movie_id='{$get_details['movie_id']}'");
    $movie_borrowed = mysqli_fetch_array($get_movie);
          
    
    $borrow_id = $get_details['borrow_id'];
    
          ?>  
            
        <td><?php echo $movie_borrower['name'] ?></td><td><?php echo $movie_borrowed['name'] ?></td><td><?php
        
    $status = $get_details['status'];
    if($status == 1){
        echo 'Pending';
    }  else {
        echo 'Approved'; 
    }
    
    
        ?></td><td style="width: 100px;"><button class="btn btn-success" value="<?php echo $borrow_id; ?>" name="approve" style="margin-bottom: 10px;"><i class='icon-thumbs-up icon-large'></i>Approve</button><button value="<?php echo $borrow_id; ?>" name="decline" class="btn btn-danger"><i class='icon-thumbs-down icon-large'></i>Decline</button></i></a>
  
 <?php
   
echo "</td>";

echo '</tr>';
}
echo '</table></form>';

if(isset($_POST['decline'])){
   mysqli_query($link,"delete from borrow where borrow_id = '{$_POST['decline']}'");
   
}else if(isset ($_POST['approve'])){
    $approval_date = date('Y/m/d H:m:s');
    
mysqli_query($link,"update borrow set status = 3 and approval_date ='$approval_date' where borrow_id ='{$_POST['approve']}'  ");  

}else{
    
}

?>

        
    

</div>
</div>
   </div>
   
</body>
</html>
<?php
   }
   ?>