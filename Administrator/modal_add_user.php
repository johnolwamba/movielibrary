<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
 <link rel="stylesheet" href="js/jquery-ui.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap-responsive.css"> 
  <script src="js/jquery.js"></script>
   <script src="js/wegm.js"></script>
  <script src="js/jquery-ui.js"></script>
    </head>
    <body>
<div id="add_user" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel" >
             
		<div class="modal-body">
			<div class="alert alert-info"><strong>Add User</strong></div>
                        	<span id="adduser_status"></span>
                        
                        <form id="add-user" class="form-horizontal" method="post">
		
                            <?php         
  include('connect.php');   
if(isset($_POST['submit'])){
    
$username = mysqli_real_escape_string($link,$_REQUEST['username']);
$password = mysqli_real_escape_string($link,$_REQUEST['password']);
$name = mysqli_real_escape_string($link,$_REQUEST['name']);

if(empty($username) || (empty($password)) || (empty($name))){    
      echo "<label class='alert alert-danger'>Fill All Fields</label>";
      }

else{

    $confirm = "select * from users where username='$username'";
    $result= mysqli_query($link,$confirm); 
    $Nrows = mysqli_num_rows($result);
    
     if($Nrows < 1){
    
          
    $query = "insert into  users (id,username,password,name) values(null,'$username','$password','$name')";
if(mysqli_query($link,$query)){
   
echo "<label class='alert alert-success'>User Entered Successfully!!</label>";
}
else{
    echo "<label class='alert alert-danger'>Sorry! User not Added.</label>";
}
 }else{
     echo "<label class='alert alert-danger'>Sorry! User already exists!</label>";
 } 
 

}

} 
        ?>
    
<label >Full Name</label>
<input class="span3" name="name" type="text" placeholder="Full Name" autocomplete="off" id="inputs"/><br/>
    
<label>Username</label>
<input class="span3" type="text"  name="username" placeholder="Username" autocomplete="off" id="inputsUsername"/><span id="username_response"/><br/>

<label>Password</label>
<input class="span3" type="password" name="password" placeholder="Password" autocomplete="off" id="inputs"/><br/><br/>
<button class="btn btn-primary" name =" submit"><i class="icon-file icon-large"></i>Submit</button>
<button class="btn btn-danger"><i class="icon-remove icon-large"></i>Clear</button>     
                            
                            
    </form>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
		</div>
    </div>
    
    
    
    </body>
    </html>