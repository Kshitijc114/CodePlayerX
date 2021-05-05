<?php

session_start();

if(!isset($_SESSION['id'])) {
    header('Location: CodePlayerX.php');
}

include("connectX.php");

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<script type= "text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		
	<script src="jQueryUI/jquery-ui.min.js"></script>
		
	<link rel="stylesheet" href="jQueryUI/jquery-ui.css"> 
		

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link href="styleX.css" rel="stylesheet" type="text/css" />

	<!-- MDB icon -->
  <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="css/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Code Player X!</title>
	

	
  </head>
  <body>
    
	
	
	<nav id="topBar" class="navbar fixed-top navbar-expand-md">

	  <a class="navbar-brand" href="#">Code Player
	  <img class="nav-item" src="images/logoX" id="logoX" alt="logo"></a>
	  

	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<i class="fas fa-bars togglerIcon"></i>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
		  <li class="nav-item active">
			<a id="reset" class="nav-link" href="#">Reset <span class="sr-only">(current)</span></a>
		  </li>
		 
		  <li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  Theme
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			  <a class="dropdown-item" id="lightOpt" href="#">Light</a>
			  <a class="dropdown-item" id="darkOpt" href="#">Dark</a>
			</div>
		  </li>
		 
		 
		 
		</ul>
		
		
		
		<form class="form-inline my-2 my-lg-0">
		  
			<?php 
                if (isset($_SESSION['username'])) {
            ?> 
					<ul class="navbar-nav mr-auto">
					<li><p class="navbar-text">Hi <?php echo $_SESSION['username']; ?>!</p></li>
                    <li class="nav-item active"><a class="logos" href = "" data-toggle="modal" data-target="#modalSettingsForm">
					<i class="fas fa-cog"></i> Settings </a></li> 
                    
					<li class="nav-item active"><a class="logos" id="logout" href = "logoutX.php">
					<i class="fas fa-sign-out-alt"></i> Logout</a></li>  
                    </ul>
					<?php
					}
				else {
                    ?> 
					<ul class="navbar-nav mr-auto">
                    <li class="nav-item active"><a class="logos" id="signupLink" href="#" data-toggle="modal" data-target="#registerModal">
					<i class="fa fa-user-plus"></i> Sign Up </a></li> 
					
                    <li class="nav-item active"><a class="logos" id="loginLink" href="#" data-toggle="modal" data-target="#loginModal">
					<i class="fas fa-sign-in-alt"></i>Login</a></li> 
					</ul>		
					
					<?php 
                    }
					?> 
		  
		 </form>
	  </div> 
	  
	  
	  
	</nav>
	
	<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
	  <form id="login-form" role="form" method="POST">
	  
      <div class="modal-body mx-3">
	  
	  <div id="message"></div>
	  
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input name="email" type="email" id="email" class="form-control validate">
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input name="password" type="password" id="password" class="form-control validate">
        </div>
		
		
		<div><input type="checkbox" name="stayLoggedIn" value=1><h6 style="color:grey;">Stay Logged In?</h6></div>
		
      </div>
	  
      <div class=" form-group d-flex justify-content-center">
		<input  class="btn btn-default" value="Login!" type="submit" name="login" id="login_button" />
      </div>
	  
	  <div class="modal-footer">
        Don't have an account? <a href="#registerModal">Sign Up here</a>
      </div>
	  
	  </form>
	  
    </div>
  </div>
</div>

<!-- SignUp Modal -->

<div class="modal fade" id="registerModal" tabindex="1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sign up</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
	  <form id="register-form" role="form" method="POST">
	  
      <div class="modal-body mx-3">
	  
	  <div id="msg"></div>
	  
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input name="username" type="text" id="sUser" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-name">Your username</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input name="email" type="email" id="sEmail" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-email">Your email</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input name="password" type="password" id="sPass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Your password</label>
        </div>
		
		<div><input type="checkbox" name="stayLoggedIn" value=1><h6 style="color:grey;">Stay Logged In?</h6></div>

      </div>
      
	  <div class=" form-group d-flex justify-content-center">
		<input  class="btn btn-default" value="Signup!" type="submit" name="signup" id="signup_button" />
      </div>
	  
	  <div class="modal-footer">
        Already have an account? <a href="#loginModal">Login here</a>
      </div>
	  
	  </form>
	  
    </div>
  </div>
</div>


<!-- Settings Form -->

<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Update Password</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
	  <form method="POST" action="settingsX.php">
	  
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input name="username" type="text" id="orangeForm-name2" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-name">Enter Old Password</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input name="email" type="email" id="orangeForm-email2" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-email">Your email</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input name="password" type="password" id="orangeForm-pass2" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Your password</label>
        </div>
		
		
		
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-default">Update Password</button>
      </div>
	  
	  </form>
	  
    </div>
  </div>
</div>



<!-- continue... -->	

<!-- php for content insert



-->

<div id="main"> 
	<div class="first"></div>
	<div class="second">
		<div class="inner d-flex align-items-center justify-content-center">
			<button id="buttHTML" class="three-1 button1">HTML</button>	
			<button id="buttCSS" class="three button1">Css</button>	
			<button id="buttJS"class="three button1">Javascript</button>	
			<button id="buttOutput" class="three button1">Output</button>
		</div>	
	</div>
	<div class="first"></div>
 	
	<div id="tabs" class="ui-widget-content container-fluid">
		
				<div id="tabHTML" >
					<h4>HTML</h4>
					<textarea id="html" placeholder="HTML code goes here..."><?php echo $htmlContent; ?></textarea>
				</div>
					
					
				<div id="tabCSS" >
					<h4>CSS</h4>
					<textarea id="css" placeholder="CSS code goes here..."><?php echo $cssContent; ?></textarea>
				</div>
					
					
				<div id="tabJS" >
					<h4>Javascript</h4>
					<textarea id="js" placeholder="JavaScript goes here..."><?php echo $jsContent; ?></textarea>
				</div>
			
				<div id="tabOutput">
					<h4>Output</h4>
					<iframe id="code" src='about:blank'></iframe>
				</div>
			
	</div>
	
</div>	

  <!-- Your custom scripts (optional) -->	
  
  <script>
  

  
	$(document).ready(function(){  
	
        $('#login-form').on('submit', function (e) {
		   //e.preventDefault();
            var email = $('#email').val();  
            var password = $('#password').val();  
            if(email != '' && password != '')  
            {  
                $.ajax({  
                    url:"loginX.php",  
                    method:"POST",  
                    data: {email:email, password:password},  
                    success:function(data)  
                    {  
                        //alert(data);  
                        if(data == 'No')  
                        {  
                            alert("Wrong Data");  
                        }  
                        else  
                        {  
                            $('#login_button').val('Signing in...');
							$('#loginModal').hide(); 
							location.reload(); 
                        }  
                    }  
                });  
            }  
           else  
            {  
                $("#message").html("Both Fields are required!");  
            }  
        });
		
		$('#logout').click(function(){  
            var action = "action";  
            $.ajax({  
                url:"loginX.php",  
                method:"POST",  
                data:{action:action},  
                success:function()  
                {  
                     location.reload();  
                }  
            });  
        });
		
	$('#register-form').on('submit', function (e) {
		var sUser = $("#sUser").val();
		var sEmail = $("#sEmail").val();
		var sPass = $("#sPass").val();
		if(sEmail != '' && sPass != '' && sUser != '' )  
           {  
                $.ajax({  
                     url:"registerX.php",  
                     method:"POST",  
                     data: {sUser: sUser, sEmail: sEmail, sPass: sPass},  
                     success:function(data)  
                     {  
                        //$("#msg").html(data);  
                        alert(data);    
                     }  
                });  
           }  
           else  
           {  
                $("#msg").html("All fields are required!"); 
				header("location: #registerModal") 
           }
			
	});
	
  $("#css").keyup(function(){
	 
	$.ajax({
		method: "POST",
		url: "updateX.php",
		data: {contentCss: $("#css").val()}
	})
 });

 $("#html").keyup(function(){
	 
	$.ajax({
		method: "POST",
		url: "updateX.php",
		data: {contentHtml: $("#html").val()}
	})
 });

  $("#js").keyup(function(){
	 
	$.ajax({
		method: "POST",
		url: "updateX.php",
		data: {contentJs: $("#js").val()}
	})
 });	 
	
	
});

  </script>
  
  <script type="text/javascript" src="codeTut.js"></script>	
	
  <!-- jQuery -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  
	
      </body>
</html>