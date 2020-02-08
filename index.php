<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" type="text/css" href="vendor/font-awesome-4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" type="text/css" href="vendor/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Style/Login.css">
    <link rel="stylesheet" type="text/css" href="Style/util.css">
	
</head>
<body>
    <div class="limiter" >
		<div class="container-login100" style="background-image: url('vendor/Images/Loginbg.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="login.php">
					<span class="login100-form-logo">
						<img class="login-logo" src="vendor/Images/Iqlogo.png" alt="Interactive Quest logo">
					</span>

					<span class="login100-form-title ">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>
                    
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Start!
						</button>
					</div>
                    <br>
					<div class="text-center ">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>
