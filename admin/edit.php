<?php
require "db.php";
if(isset($_POST['submit']))
{
	$cat=$_POST['category'];
	$id=$_GET['st'];
	$q=mysql_query("update category set name='$cat' where id='$id'");
	if($q)
	{
		header("location:add_category.php");
	}
}
$q=mysql_query("select * from category where id='".$_GET['st']."'");
$res= mysql_fetch_assoc($q);
?>
<?php require 'header.php'; ?>
<h2>Add Category</h2>
	<div class="col-md-5">
		<form action="" method="post">
			<?php 
				echo (isset($error)) ? "<Div class='alert alert-danger'>$error</div>" : "";
				echo (isset($success)) ? "<Div class='alert alert-success'>$success</div>" : "";
			 ?>
			<div class="form-group">
				<label for="">Name</label>
				<input type="text" name="category" class="form-control" autofocus value="<?php echo $res['name']; ?>">
			</div>

			<div class="form-group">
				<input type="submit" value="Save" name="submit" class="btn btn-success">
			</div>
		</form>
	</div>
<?php require 'footer.php'; ?>