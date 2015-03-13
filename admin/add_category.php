<?php require 'db.php'; 
	if(isset($_POST['submit'])){
		$category= $_POST['category'];
		if(empty($category)){
			$error= "Fill category name";
		}else{
			$q= mysql_query("insert into category(name) values ('$category')");
			if($q){
				$success= "Category Added";
			}
		}
	}
?>
<?php require 'header.php'; ?>
<div class="container">
	<h2>Add Category</h2>
	<div class="col-md-5">
		<form action="" method="post">
			<?php 
				echo (isset($error)) ? "<Div class='alert alert-danger'>$error</div>" : "";
				echo (isset($success)) ? "<Div class='alert alert-success'>$success</div>" : "";
			 ?>
			<div class="form-group">
				<label for="">Name</label>
				<input type="text" name="category" class="form-control" autofocus>
			</div>

			<div class="form-group">
				<input type="submit" value="Save" name="submit" class="btn btn-success">
			</div>
		</form>
	</div>
	<div class="col-md-7">
		<table class="table table-striped">
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			<?php 
				$i=1;
				$q= mysql_query("select * from category");
				while($res= mysql_fetch_assoc($q)){
					echo "<tr>";
					echo "<td>$i</td>"; 
					echo "<td>".$res['name']."</td>";
					echo "<td><a href='edit.php?st=".$res['id']."'><span class='glyphicon glyphicon-pencil'></span></a></td>";
					echo "<td><a href='delete.php?st=".$res['id']."'><span class='glyphicon glyphicon-trash'></span></a></td>";

					echo "</tr>";
					$i++;
				}
			 ?>
		</table>
	</div>
</div>
<?php require 'footer.php'; ?>
