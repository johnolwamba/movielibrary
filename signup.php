<!DOCTYPE html>
<!-- Website designed by Johnstone -->
<?php
session_start();
 $today=  date("Y/m/d");
$_SESSION['date'] = $today;

?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Sign Up</title>
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
<link rel="stylesheet" href="css/style.css" type="text/css">
 <link rel="stylesheet" href="js/jquery-ui.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap-responsive.css"> 
  <script src="js/bootstrap-tab.js"></script>
  <script src="js/jquery-ui.js"></script>
  
  <script src="js/script.js"></script>
  <script src="js/quizeking.js"></script>
   <script src="js/exjquery.js"></script>
  <script src="js/jquery-1.8.3.min.js"></script>
  <script>
$(function() {
$( "#datepicker" ).datepicker();
});
</script>
</head>
<body>
	<?php
        include 'header.php';
        
        ?>
	<div id="contents">
		
			<div class="body"  id="gallery">
			 
                            
    <form class="form well span6" action="signup.php" method="post" enctype="multipart/form-data" style="position:absolute; left:50%; top:50%; transform:translate(-50%,-50%); width:50%;">
     
 
<?php
include('Administrator/connect.php');

 if(isset($_POST['submit'])){
$name= mysqli_real_escape_string($link,$_REQUEST['name']);
$dob = mysqli_real_escape_string($link,$_REQUEST['dob']);
$email= mysqli_real_escape_string($link,$_REQUEST['email']);
$username= mysqli_real_escape_string($link,$_REQUEST['username']);
$password= mysqli_real_escape_string($link,$_REQUEST['password']);
$password2= mysqli_real_escape_string($link,$_REQUEST['password2']);
$phone= mysqli_real_escape_string($link,$_REQUEST['phone']);

$id= mysqli_real_escape_string($link,$_REQUEST['id_no']);


 if(empty($name) || (empty($phone)) || (empty($id)) || (empty($username))|| (empty($password)) || (empty($password2))){

   echo "<label class='alert alert-danger'>Fill All Fields</label>";
     
 }
 else {
     
     if($password != $password2){
        echo "<label class='alert alert-danger'>Please retype the password.</label>";  
     }
     else{
    
      
         
     $date = $_SESSION['date'];
    
      $confirm = "select * from users where name='$name' and phone ='$phone'";
    $result= mysqli_query($link,$confirm);
    $Nrows = mysqli_num_rows($result);
    
     if($Nrows <1){
$query = "insert into users (user_id,name,dob,email,username,password,phone,id_no,date) values(null,'$name','$dob','$email','$username','$password','$phone','$id','$date')";
if(mysqli_query($link,$query)){
   echo '<label class="alert alert-success">Successfully Signed up.Click <a href="movies.php">here</a>To login</label>';

} 
 else {
    echo '<label class="alert alert-danger">Error Occured</label>';    
}

    }else{
       echo '<label class="alert alert-danger">User already Exists</label>';  
    }
    
 }}
 }else{
     echo '<label class="alert alert-info">Fill Form to SignUp</label>';  
 }
 

 
 
?>
     <table> 
         <tr>
<td><label style="font-style: oblique; font-size: 16px;">Full Name</label></td><td><input placeholder="Full name" name="name" autocomplete="off"/></td></tr>           
 <tr><td><label style="font-style: oblique; font-size: 16px;">Date of Birth</label></td><td><input placeholder="D.O.B" name="dob" id="datepicker"/></td></tr>
 <tr><td><label style="font-style: oblique; font-size: 16px;">Email</label></td><td><input type="email" placeholder="Email" name="email" autocomplete="off"/></td></tr>
 <tr><td><label style="font-style: oblique; font-size: 16px;">Username</label></td><td><input placeholder="Username" id="username" name="username" autocomplete="off"/><span id="username_status"></span></td></tr>
 <tr><td><label style="font-style: oblique; font-size: 16px;">Password</label></td><td><input placeholder="Password" name="password" autocomplete="off"/></td></tr>
 <tr><td><label style="font-style: oblique; font-size: 16px;">Retype Password</label></td><td><input placeholder="Retype Password" name="password2" autocomplete="off"/></td></tr>
 <tr><td><label style="font-style: oblique; font-size: 16px;">Phone</label></td><td><input placeholder="Phone" name="phone" autocomplete="off"/></td></tr>

 <tr><td><label style="font-style: oblique; font-size: 16px;">ID Number</label></td><td><input placeholder="ID Number" name="id_no" autocomplete="off"/></td></tr>


<br/>
 <tr><td></td><td><button class="btn btn-primary" name ="submit" autocomplete="off">Sign Up</button>
         <button class="btn btn-danger">Clear</button></td></tr>
</form>
                        </div>
                
        
      
            </div>
</body>
</html>