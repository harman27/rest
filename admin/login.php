<?php 
	require 'db.php';
	if(isset($_POST['submit'])){
		$username= $_POST['username'];
		$password= sha1($_POST['password']);
		if(empty($username) || empty($password)){
			$error= "fill username/password";
		}else{
			$q= mysql_query("select * from admin where username='$username' and password='$password'");
			$count= mysql_num_rows($q);
			if($count==0){
				$error="invalid username/password";
			}else{
				$_SESSION['name']=$username;
				header("location: index.php");
			}
		}

	}

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 	<link rel="stylesheet" href="css/bootstrap.min.css">
 </head>
 <body>
 	<div class="container">
 		
 		<div class="row">
 			<form action="" method="post">
 			<div class="col-md-5 col-md-offset-3">
 				<div class="panel panel-primary">
 					<div class="panel-heading">Login</div>
 					
 					
 						<?php
 							if(isset($error)){ 
 								echo '<div class="alert alert-danger">';
 								echo $error;
 								echo "</div>";
 							}
 						?>	
 					<div class="panel-body">
 						<div class="form-group">
 							<label for="">Username</label>
 							<input type="text" name="username" class="form-control" id="">
 						</div>
 						<div class="form-group">
 							<label for="">Password</label>
 							<input type="password" name="password" class="form-control" id="">
 						</div>
 						<div class="form-group">
 							<button name="submit" type="submit" class="btn btn-primary">Login</button>
 						</div>
 					</div>
 				</div>
 			</div>
 			</form>
 		</div>
 	</div>
 </body>
 </html>