<?php
session_start();
if(!isset($_SESSION['id'])){
  header("Location:index.php");    
}else{
    include 'connect.php'; 

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
<link rel="stylesheet" href="css/style.css" type="text/css">
 <link rel="stylesheet" href="js/jquery-ui.css">
  <link rel="stylesheet" href="css/bootstrap-responsive.css"> 
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui.js"></script>
   <script src="js/bootstrap-modal.js"></script>
   <script src="js/bootstrap-tooltip.js"></script>
   <script src="js/bootstrap-popover.js"></script>
  <script src="js/script.js"></script>
  <script src="js/outlets.js"></script>
  <script src="js/jquery-1.8.3.min.js"></script>
<title>Administrator</title>
<style type="text/css">
body{ margin:0px;}

div#top{ height:50px; position:fixed; width:100%; font-size:36px; padding:20px 0px 0px 0px; background-color:#59F; }


div#middle{ min-width:200px; padding:0px 0px; margin-left:120px; margin-right: 40px; }

div#bottom{ clear:left; background:#666; height:50px; bottom:20px;
	width:100%;	
	position:fixed;
	bottom:0;
	left:0;
}

div#sidebar{
	padding:75px 0px;
	position:fixed;	
	float:left;

}
</style>
</head>

<body style=" background-image:url(images/index.jpg); background-repeat: repeat" >

  <?php
  include 'header.php';
  ?>
    
<div id="middle">
<div>

<!--I want to load the first DIV-->
<div id="myDiv" style="padding-top:20px; margin-left:30px;">   
    <div style="margin-left: 100px;" class="well">
 
    
    <div class="well">
       <?php

$result= mysqli_query($link,"select * from users") or die(mysqli_error($link)); 
$Nrows = mysqli_num_rows($result) or die(mysqli_error($link));

?>
        
<table border= "1" width=\"150%\" border=\:0\" class='table table-striped'>
    <th>NAME</th><th>USERNAME</th><th>PASSWORD</th><th>ACTION</th>
   
    <?php

for($i=0;$i<$Nrows;$i++)
{
$row = mysqli_fetch_row($result) or die(mysqli_error($link));
$id = $row[0];

echo '<tr>';
?>
        <td><?php echo $row[1]; ?></td><td><?php echo $row[4] ?></td><td><?php echo $row[5] ?></td><td style="width: 100px;"> <a style="margin-right: 5px;  margin-bottom: 5px;" rel='tooltip' id='<?php echo $id; ?>' title='Delete User' href='#delete_user<?php echo $id; ?>' data-toggle='modal'  class='btn btn-danger'><i class='icon-trash icon-large'></i></a>
    <?php include('delete_user_modal.php'); ?>
 <a rel='tooltip' title='Edit User' id='<?php echo $id; ?>' href='#edit<?php echo $id; ?>'  data-toggle='modal'  class='btn btn-success'><i class='icon-pencil icon-large'></i></a>
 <?php include('modal_edit_user.php'); ?>
    <?php
echo "</td>";
}
echo '</tr>';
echo '</table>';

        ?>
     
 
 
  
        
        
    </div>
</div>

</div>
</div>
</body>
</html>

<?php

}

?>