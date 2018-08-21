<?php
session_start();

include('connect.php');

if(isset($_POST['submit'])){
$username = mysqli_real_escape_string($link,$_REQUEST['username']);
$password = mysqli_real_escape_string($link,$_REQUEST['password']);

if(empty($username) || empty($password)){
    echo '<label class="alert alert-danger">Fill all fields</label>';
}  else {

$search = mysqli_query($link,"select * from admin where username = '$username' and password = '$password'");

 if(mysqli_num_rows($search)>0){	
     $row = mysqli_fetch_row($search);
   $_SESSION['name'] =$row[3];
         $_SESSION['id'] =$row[0];
       header("Location:  main.php");
    
     }else{	 
	echo "<label class='alert alert-error'>Wrong U/P combination</label>";
 } 
}
 }else
{    
	echo "<label class='alert alert-info'>Enter Details to login</label>";
}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
<link rel="stylesheet" href="css/style.css" type="text/css">
<title>Log In</title>
</head>

<body style=" background-image:url(images/index.jpg); background-repeat: repeat">
 <form class="form well span6" action="index.php" method="post" style="position:absolute; left:50%; top:50%; transform:translate(-50%,-50%); width:40%; height:40%;">
     <label style="font-style: oblique; font-size: 18px;">Username</label>
     <input placeholder="Username" type="text" id="inputs" name="username" autocomplete="off"/><br/>

<label style="font-style: oblique; font-size: 18px;">Password</label>
<input type="password" name="password" id="inputs" placeholder="Password"/><br/>

<button class="btn btn-primary" name ="submit" data-loading-text="Logging ..." autocomplete="off"><i class='icon-check icon-large icon-white'></i>&nbsp;Log In</button>
<button class="btn btn-danger"><i class='icon-remove icon-large icon-white'></i>&nbsp;Clear</button>

</form>
    
</body>
</html>