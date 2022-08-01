<?php
session_start();
	require_once ('../admin/docs/conf/connaction.php'); 
	//echo $_SESSION['userid'];
?>
    
<?php 
    
  	$fail = "";
	if(isset($_POST['login']))
		{
			 $uname=trim($_POST['username']);
			 $password=md5(trim($_POST['password']));
			
			 $sql="SELECT * FROM user_table WHERE user_email='".$uname."' AND user_pass='".$password."'";
			
                        $runQuery =  mysqli_query($conn, $sql);
                        $row=mysqli_fetch_assoc($runQuery);
                        $numRow = mysqli_num_rows($runQuery);
			
			if($numRow > 0)
				{
					//echo "You Have Succesfully Login";
					$_SESSION['userid']=$row['uid'];
					$_SESSION['username']=$row['user_login'];
					$_SESSION['password']=$row['user_pass'];
					$_SESSION['usertype']=$row['user_type'];
					//echo $_SESSION['username']; exit();
					header('Location: ../admin/docs/dashbord.php');
					//exit();
				}
			else
				{
					$fail = "Incorrect entered Password or Email";
					//echo "You Have Entered Incorrect Password";
					//exit();
				}
		}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="icon" type="image/png" href="../admin/docs/assets/img/favicon.ico">
	<title>ATI-SARS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image:url(images/bg_3_login.jpg);">
					<span class="login100-form-title-1">
						Sign In
					</span>
				</div>

                <form class="login100-form validate-form" method="post" action="#" name="myform">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<!--<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>-->

						<!--<div>
							<a href="../admin/docs/password_forget.php" class="txt1">
								Forgot Password?
							</a>
						</div>-->
					</div>

					<div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit" name="login">
							Login
						</button>
					</div>
                    <div>
                    	<p class="error_message"><br>
							<?php echo $fail; ?>
                        </p>
                    <div>
				</form>
			</div>
		</div>
	</div>
	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

</body>
</html>