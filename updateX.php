<?php
session_start(); 
$connect = mysqli_connect("localhost", "root", "", "trial"); 

if (isset($_SESSION['id'])) {

	if  (array_key_exists("contentCss", $_POST) ) {
			
	$query = "UPDATE `member_login` SET `css` = '".mysqli_real_escape_string($connect, $_POST['contentCss'])."' Where id = ".mysqli_real_escape_string($connect, $_SESSION['id'])." LIMIT 1";
				
		if (mysqli_query($connect, $query)) {
					
			echo "success";
					
		}else{
					
			echo "failed!";
					
		}
	}

	if  (array_key_exists("contentHtml", $_POST) ) {
			
		$query2 = ("UPDATE `member_login` SET `html` = '".mysqli_real_escape_string($connect, $_POST['contentHtml'])."' Where id = ".mysqli_real_escape_string($connect, $_SESSION['id'])." LIMIT 1");
				
		if (mysqli_query($connect, $query2)) {
					
			echo "success";
					
		}else{
					
			echo "failed!";
					
		}
	}



	if  (array_key_exists("contentJs", $_POST) ) {
			
		$query3 = "UPDATE `member_login` SET `js` = '".mysqli_real_escape_string($connect, $_POST['contentJs'])."' Where id = ".mysqli_real_escape_string($connect, $_SESSION['id'])." LIMIT 1";
				
		if (mysqli_query($connect, $query3)) {
					
			echo "success";
					
		}else{
					
			echo "failed!";
					
		}
	}
}
	
?>