 <?php  
 session_start();  
 $connect = mysqli_connect("localhost", "root", "", "trial") or die(mysqli_error($connect));  
 if(isset($_POST["email"]))  
 {  
	$query = "  
		SELECT * FROM member_login  
		WHERE member_email = '".$_POST["email"]."'  
		AND member_password = '".$_POST["password"]."'  
		";  
	  
	  
	  
     $result = mysqli_query($connect, $query) or die($mysqli_error($connect));  
     if(mysqli_num_rows($result) > 0)  
		{  		
			$row = $result->fetch_assoc();
			
            $_SESSION['id'] = $row['id'];
			
            $_SESSION['username'] = $row['name'];
			
            echo 'Yes';  
        }  
     else  
        {  
            echo 'No';  
        }  
	  
 }  
 if(isset($_POST["action"]))  
 {  
      unset($_SESSION["username"]);  
	  unset($_SESSION["id"]);
 }  
 ?>  