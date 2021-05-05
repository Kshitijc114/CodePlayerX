<?php
 
$connect = mysqli_connect("localhost", "root", "", "trial");  

$email = mysqli_real_escape_string($connect, $_POST['sEmail']);
$user = mysqli_real_escape_string($connect, $_POST['sUser']);
$pass = mysqli_real_escape_string($connect, $_POST['sPass']);

$query = mysqli_query($connect, "SELECT `id` FROM `member_login` WHERE `member_email` = '$email'"); 
$id = mysqli_insert_id($connect);	
$num = mysqli_num_rows($query);

	if(!$email & !$pass & !$user){
		echo "All fields are required!";
	}
	else if($num == 1){
		
		echo "Email is already taken!";
		
	}
	else{
		echo $id;
		
		$query = "INSERT INTO `member_login` (`name`, `member_email`, `member_password`) VALUES ('$user', '$email','$pass')";
		
		if(!mysqli_query($connect, $query)) {
			
			echo "Cold not sign u up.Please try again!";
			
		}else{
			
			$query = "UPDATE `member_login` SET member_password ='".md5(md5($id).$pass)."' WHERE id =
			".$id."LIMIT 1";
			
			mysqli_query($connect, $query);
			echo "1";
			$_SESSION['id'] = $id;
			
			if ($_POST['stayLoggedIn'] == '1') {
				
				setcookie("id", $id, time() + 60*60*24*365);
				$_SESSION['id'] = $id;
				echo "2";
			}
			//location.reload();
			
		}
		echo "Success!";
	}

?>