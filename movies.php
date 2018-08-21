<?php
session_start();

if (isset($_SESSION['id'])) {
    header("Location: borrow.php");
} else {
    ?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Borrow Movie</title>
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
<link rel="stylesheet" href="css/style.css" type="text/css">
 <link rel="stylesheet" href="js/jquery-ui.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap-responsive.css">
  <script src="js/bootstrap-tab.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/script.js"></script>
  <script src="js/jquery-1.8.3.min.js"></script>

<body>
	<?php
        include 'header.php';

        ?>
	<div id="contents">
		<div>
			<div class="body" id="about">
                            <div>



                                <label class="alert alert-info span8">Sign into your account to borrow a movie</label>


 <form class="form well span6" action="movies.php" method="post" style="position:absolute; left:45%; top:55%; transform:translate(-50%,-50%); width:60%; height:50%;">

 <?php
include('Administrator/connect.php');

if(isset($_POST['submit'])){
 $username = $_REQUEST['username'];
 $password = $_REQUEST['password'];

if(empty($username) || empty($password)){
    echo '<label class="alert alert-danger">Fill all fields</label>';
}  else {

$search = mysqli_query($link,"select * from users where username = '$username' and password = '$password'");
    echo mysqli_num_rows($search);

 if(mysqli_num_rows($search)>0){
     $row = mysqli_fetch_row($search);
   $_SESSION['name'] =$row[1];
         $_SESSION['id'] =$row[0];
       header("Location:  borrow.php");

     }else{
	echo "<label class='alert alert-error'>Wrong U/P combination</label>";
 }
}
 }else
{
	echo "<label class='alert alert-info span6'>Enter Details to login</label>";
}

?>


     <br/> <br/><br/> <br/>
     <div style="margin-left: 30%;">
     <label style="font-style: oblique; font-size: 18px;">Username</label>
     <input placeholder="Username" type="text" id="inputs" name="username" autocomplete="off"/><br/>

<label style="font-style: oblique; font-size: 18px;">Password</label>
<input type="password" name="password" id="inputs" placeholder="Password"/><br/><br/>
<button class="btn btn-primary" style="margin-left: 15%;" name ="submit" autocomplete="off"><i class='icon-check icon-large icon-white'></i>&nbsp;Log In</button>
<button class="btn btn-danger"><i class='icon-remove icon-large icon-white'></i>&nbsp;Clear</button>
<p>Don't have an account?<a href="signup.php">Sign Up</a></p>
     </div>
</form>

                            </div>

				<div id="main">

				</div>
			</div>
		</div>
	</div>
	<?php
        include 'footer.php';
        ?>
</body>
</html>
<?php
}
?>