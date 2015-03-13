<?php
require "db.php";
$id=$_GET['st'];
$q=mysql_query("delete from category where id='$id'");
if($q){
	header("location: add_category.php");
}
?>