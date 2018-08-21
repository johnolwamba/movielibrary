<?php
session_start();
 
if(!isset($_SESSION['name'])){
   header("Location: index.php"); 
    
}else{
    

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
<link rel="stylesheet" href="css/style.css" type="text/css">
 <link rel="stylesheet" href="js/jquery-ui.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap-responsive.css"> 
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui.js"></script>
  
  <script src="js/bootstrap-modal.js"></script>
   <script src="js/bootstrap-tooltip.js"></script>
   <script src="js/bootstrap-popover.js"></script>
  <script src="js/script.js"></script>
  <script src="js/jquery-1.8.3.min.js"></script>
  
  
<title>Movies</title>



<script language="javascript" type="text/javascript">
    function swapContent(cv) {
        $("#myDiv").html(" ").show();
        var url = "content.php";
        $.post(url, { contentVar: cv }, function (data) {
            $("#myDiv").html(data).show();
        });
    }
 
  </script>
</head>

<body style=" background-image:url(images/index.jpg); background-repeat: repeat;" >
   <?php
 include('header.php');
   
   ?> 
<div id="middle">
    
   
<div>

<!--I want to load the first DIV-->
<div id="myDiv" style="padding-top:20px; margin-left:30px;">
     
    
    <?php
    include 'connect.php';
    
 $per_page = 5;
$pages_query=mysqli_query($link,"select * from movies");

$pages = ceil(mysqli_num_rows($pages_query)/$per_page);

if(!isset($_GET['page']))
{
   header("location: view.php?page=1");
}else {
    
$page=$_GET['page'] ;

}
$start = (($page - 1)* $per_page);
    
    
    
         $query = "select * from movies limit $start,$per_page";
         $result= mysqli_query($link,$query); 
         $Nrows = mysqli_num_rows($result);
          
   echo '<div class="well">';

  echo "<table width=\"100%\" border=\:0\" class='table table-bordered'>";
echo '<th>Name</th><th>Year</th><th>Category</th><th>Picture</th><th>Action</th>';
for($i=0;$i<$Nrows;$i++)
{
    
    
    $row = mysqli_fetch_row($result);
    $id = $row[0];
echo '<tr>';
echo "<td>{$row[1]}</td><td>{$row[2]}</td><td>{$row[4]}</td><td><img src='movie_banners/".$row[7]."' height='100px' width='100px'></td><td>";
?>
    
    
   <a rel='tooltip' id='<?php echo $id; ?>' title='Delete' href='#delete_user<?php echo $id; ?>' data-toggle='modal'  class='btn btn-danger'><i class='icon-trash icon-large'></i></a>
    <?php include('delete_movie_modal.php'); ?>
 <a rel='tooltip' title='Edit' id='<?php echo $id; ?>' href='#edit<?php echo $id; ?>'  data-toggle='modal'  class='btn btn-success'><i class='icon-pencil icon-large'></i></a>
 <?php include('modal_edit_movie.php'); ?>
  
    
    
    <?php

echo "</td>";
}

echo '<div style="float:right; width:200px;" class="alert-success">';
for ($number = 1; $number <=$pages; $number++) {
    
    echo '<a href="?page='.$number.'" style="font-size:16px; margin-right:10px;" class="alert-success">'.$number.'</a>'; 
   
}
echo '  ';
echo "Current Page: $page";
echo '</div>';

echo '</tr>';
echo '</table>';
echo '</div>';
        ?>
    
    
    
</div>

</div>
</div>
</body>
</html>


<?php

}

?>