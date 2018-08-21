	<div id="edit<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<div class="alert alert-info"><strong>Edit Movie</strong></div>
	<form class="form-horizontal" method="post">
            
            
            
            <div class="control-group">
				<label class="control-label" for="inputEmail">Name</label>
				<div class="controls">
                            <input type="hidden" id="inputs" name="id" value="<?php echo $row[0]; ?>" required>
				<input type="text" id="inputs" name="name" value="<?php echo $row[1]; ?>" required>
				</div>
			</div>
            
            <div class="control-group">
				<label class="control-label" for="inputEmail">Year</label>
				<div class="controls">
	
				<input type="text" id="inputs" name="year" value="<?php echo $row[2]; ?>" required>
				</div>
			</div>
             <div class="control-group">
				<label class="control-label" for="inputEmail">Category</label>
				<div class="controls">	
				<input type="text" id="inputs" name="category" value="<?php echo $row[4]; ?>" required>
				</div>
			</div>
             <div class="control-group">
				<label class="control-label" for="inputEmail">Classification</label>
				<div class="controls">
	
				<input type="text" id="inputs" name="classification" value="<?php echo $row[5]; ?>" required>
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
	$year=$_POST['year'];
        $category=$_POST['category'];
	$classification=$_POST['classification'];
       
	
	mysqli_query($link,"update movies set name='$name', year = '$year', category = '$category', classification='$classification' where movie_id='$user_id'")or die(mysql_error()); ?>
	<script>
	window.location="view.php";
	</script>
	<?php
	}
	?>