	<div id="edit<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<div class="alert alert-info"><strong>Edit User</strong></div>
	<form class="form-horizontal" method="post">
            
            <div class="control-group">
				<label class="control-label" for="inputEmail">Name</label>
				<div class="controls">
                            <input type="hidden" id="inputs" name="id" value="<?php echo $row[0]; ?>" required>
				<input type="text" id="inputs" name="name" value="<?php echo $row[1]; ?>" required>
				</div>
			</div>
            
            <div class="control-group">
				<label class="control-label" for="inputEmail">Username</label>
				<div class="controls">
	
				<input type="text" id="inputs" name="username" value="<?php echo $row[4]; ?>" required>
				</div>
			</div>
            
             <div class="control-group">
				<label class="control-label" for="inputEmail">Password</label>
				<div class="controls">
	
				<input type="text" id="inputs" name="password" value="<?php echo $row[5]; ?>" required>
				</div>
			</div>
            
           
			
				
			
			<div class="control-group">
				<div class="controls">
				<button name="edit" type="submit" class="btn btn-success"><i class="icon-file icon-large"></i>&nbsp;Update</button>
				</div>
			</div>
    </form>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
		</div>
    </div>
	
	<?php
	if (isset($_POST['edit'])){
	
	$user_id=$_POST['id'];
	$name=$_POST['name'];
	$username=$_POST['username'];
        $password=$_POST['password'];
       
	
	mysqli_query($link,"update users set name='$name', username = '$username', password = '$password' where user_id='$user_id'")or die(mysql_error()); ?>
	<script>
	window.location="main.php";
	</script>
	<?php
	}
	?>