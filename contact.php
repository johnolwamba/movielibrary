<!DOCTYPE html>
<!-- Website designed by Johnstone -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Contact</title>
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
<link rel="stylesheet" href="css/style.css" type="text/css">
 <link rel="stylesheet" href="js/jquery-ui.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap-responsive.css"> 
  <script src="js/bootstrap.js"></script>
  <script src="js/jquery-ui.js"></script>  
  <script src="js/script.js"></script>
</head>
<body>
	<?php
        include 'header.php';
        
        ?>
	<div id="contents">
		<div>
			<div class="body" id="contact">
                            
				<div id="main">
					<h1>Contact</h1>
					<p>
					To contact us fill in the simple form so that we can assist you in case of any queries you may be having.	
                                        </p>
					<form action="contact.php" method="post">
                                            
                                            
                                             <?php
  include 'Administrator/connect.php';

 if(isset($_POST['submit'])){
$name= $_REQUEST['name'];
$email = $_REQUEST['email'];
$message= $_REQUEST['message'];


 if(empty($message) || (empty($email)) || (empty($name))){

   echo "<label class='alert alert-danger'>Fill All Fields</label>";
     
 }
 else {
      
     $confirm = "select * from contact where name='$name' and message ='$message'";
    $result= mysqli_query($link,$confirm);
    $Nrows = mysqli_num_rows($result);
    
     if($Nrows <1){ 
    
   $query = "insert into contact(contact_id,name,email,message) values(null,'$name','$email','$message')";
if(mysqli_query($link,$query)){
echo "<label class='alert alert-success' style='margin-top= 30%px;'>Request Successfully Submitted</label>";
} 
 else {
    echo '<label class="alert alert-danger">Error Occured</label>';    
}

    }else{
       echo '<label class="alert alert-danger">Request Already Sent</label>';  
    }
    
 }
 }

 
 
?>
                                            
                                            
						<label>Name</label>
                                                <input type="text" name="name" value="">
						<label>Email Address</label>
                                                <input type="text" value="" name="email">
						
						<label>Message</label>
                                                <textarea name="message"></textarea>
                                                <table>
                                                    <tr>
                                                        <td><button class="btn btn-success" name="submit" style="margin-right: 10px;"><i class="icon-thumbs-up"></i>SEND</button><button class="btn btn-danger" name="submit"><i class="icon-remove"></i>CLEAR</button></td>
                                                    </tr>
                                                </table>
                                                
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php
        include 'footer.php';
        ?>
</body>
</html>