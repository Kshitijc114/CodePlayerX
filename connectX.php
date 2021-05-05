<?php

$connect = mysqli_connect("localhost", "root", "", "trial");  

if (isset($_SESSION['id'])) {
	
	$query = "SELECT html FROM `member_login` WHERE id = ".mysqli_real_escape_string($connect, $_SESSION['id'])." LIMIT 1";
			
	$row = mysqli_fetch_array(mysqli_query($connect, $query)) or die(mysqli_error($connect));
			
	$htmlContent = $row['html'];
	
	$query = "SELECT css FROM `member_login` WHERE id = ".mysqli_real_escape_string($connect, $_SESSION['id'])." LIMIT 1";
			
	$row = mysqli_fetch_array(mysqli_query($connect, $query)) or die(mysqli_error($connect));
			
	$cssContent = $row['css'];
	
	$query = "SELECT js FROM `member_login` WHERE id = ".mysqli_real_escape_string($connect, $_SESSION['id'])." LIMIT 1";
			
	$row = mysqli_fetch_array(mysqli_query($connect, $query)) or die(mysqli_error($connect));
			
	$jsContent = $row['js'];
	
}

?>