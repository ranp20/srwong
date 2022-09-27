<?php
if(isset($_POST) && $_POST != ""){
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";
}else{
	header("Location: ../");
}