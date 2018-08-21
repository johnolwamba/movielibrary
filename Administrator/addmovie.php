<?php
session_start();
   if(!isset($_SESSION['name'])){
   header("Location: index.php");
   
}else{
    
 $today=  date("Y/m/d");
$_SESSION['date'] = $today;

?>
<!DOCTYPE>
<html lang="en">
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
  <script src="js/jquery-1.8.3.min.js"></script>
<title>Post Movie</title>
</head>

<body style=" background-image:url(images/index.jpg); background-repeat: repeat">
<?php
   
   include('header.php');
   ?>
    
   
    
    
    
    
    <div class="well" style="width: 600px; margin-left: 20%;">
    <form action="addmovie.php" method="post" enctype="multipart/form-data">
       <?php
include('connect.php');

 if(isset($_POST['submit'])){
$name= mysqli_real_escape_string($link,$_REQUEST['name']);
$year = mysqli_real_escape_string($link,$_REQUEST['year']);
$category= mysqli_real_escape_string($link,$_REQUEST['category']);
$classification= mysqli_real_escape_string($link,$_REQUEST['classification']);


$targetfolder = "movie_banners/";	
$targetfolder = $targetfolder . basename($_FILES['image']['name']);
	
// check if file already exit in "images" folder.
if (file_exists("advert_pics/" . $_FILES["image"]["name"]))
{
echo $_FILES["image"]["name"] . " already exists.Rename your image <br/>";
}	
	
	$file_type = $_FILES['image']['type'];	
	if($file_type=="application/pdf" || $file_type=="image/gif" || $file_type=="image/jpeg" || $file_type=="image/png"){
	if(move_uploaded_file($_FILES['image']['tmp_name'],$targetfolder))
	{
	
	}	
	else{
		echo "Problem uploading file";
	}
	
	}else{
	echo "You may only upload PDFs, JPEGs or GIF files.<br/>";			
	}


 if(empty($name) || (empty($year)) || (empty($category))){

   echo "<label class='alert alert-danger'>Fill All Fields</label>";
     
 }
 else {
     
      
    
     $date = $_SESSION['date'];
      $imagename =$_FILES["image"]["name"];
  
     $confirm = "select * from movies where name='$name' and year ='$year'";
    $result= mysqli_query($link,$confirm); 
    $Nrows = mysqli_num_rows($result);
    
     if($Nrows <1){ 
    
   $query = "insert into movies(movie_id,name,year,category,classification,date,photo) values(null,'$name','$year','$category','$classification','$date','$imagename')";
if(mysqli_query($link,$query)){    
echo "<label class='alert alert-success' style='margin-top= 30%px;'>Movie Successfully Added</label>";
} 
 else {
    echo '<label class="alert alert-danger">Error Occured</label>';    
}

    }else{
       echo '<label class="alert alert-danger">Movie Already Exist</label>';  
    }
    
 }
 }

 
 
?>
        <table>
            <p><td><span style="color: red;">*</span> Required fields</p>
            <tr><td><label>Movie Name</label></td><td><input name="name" type="text" id="inputs"></td><td><span style="color: red;">*</span></td></tr>
            <tr><td><label>Year</label></td><td><input name="year" type="text" id="inputs"></td></tr>            
                       <tr><td><label>Category</label></td><td>
                    <select name="category" id="combobox">
                        <option>Cartoon</option>
                        <option>Horror</option>
                        <option>Thriller</option>
                        <option>Comedy</option>
                        <option>General</option>
                    </select></td><td><span style="color: red;">*</span></td></tr> 
                       
                        <tr><td><label>Classification</label></td><td>
                    <select name="classification" id="combobox">
                        <option>Latest</option>
                        <option>General</option>
                        <option>Recommended</option>
                        <option>Trending</option>                        
                    </select></td><td><span style="color: red;">*</span></td></tr> 
            <tr><td><label>Photo</label></td><td><input type="file" name="image"></td></tr>
            <tr><td></td><td><button class="btn btn-success" name="submit"><i class='icon-file icon-large'></i>Submit</button> <button class="btn btn-danger"><i class=' icon-remove icon-large'></i>Clear</button></td></tr>
  
  </table>
   </form>
    </div>
    
</body>
</html>

<?php
}
?>