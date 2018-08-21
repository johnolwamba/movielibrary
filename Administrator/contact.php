<?php
session_start();
   if(!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')){
  header("Location:index.php"); 
   }else {
       include 'connect.php';
 ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
 <link rel="stylesheet" href="js/jquery-ui.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap-responsive.css"> 
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui.js"></script>
<title>Contacts</title>
</head>

<body style=" background-image:url(images/index.jpg); background-repeat: repeat">
    <?php
    include 'header.php';
    ?>

    
    <?php
     echo '<div class="well">';
 $query = mysqli_query($link,"select * from contact");
       
 
   echo "<table width=\"100%\" border=\:0\" class='table table-striped'>\n";
echo '<th>Name</th><th>Email</th><th>Message</th>';

while ($row = mysqli_fetch_array($query)) {

echo '<tr>';
echo "<td>{$row[1]}</td><td>{$row[2]}</td><td>{$row[3]}</td>";

}
echo '</tr>';
echo '</table>';

echo '</div>';
    
    
   ?>
</body>
</html>
<?php
   }
   ?>