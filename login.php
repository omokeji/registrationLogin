<?php
	session_start();

		include("connection.php");
		include("functions.php");
        
        if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			//something was posted 
			$login_mail = $_POST['your_email'];
			$login_password = $_POST['user_password'];
            $selectOption = $_POST['roleOption'];

			if(!empty($login_mail) && !empty($login_password))
			{
                echo $login_mail;
                echo $login_password;
				//save to database
				$query = "select * from login_table where user_email = '$login_mail' limit 1";
                
				$result = mysqli_query($con, $query);
				
             
				if($result)
				{
					if($result && mysqli_num_rows($result) > 0)
					{
						$user_data = mysqli_fetch_assoc($result);
                        echo $user_data['user_password'];
						if($user_data['user_password'] === $login_password)
						{
							$_SESSION['user_id_gen'] = $user_data['user_id_gen'];
							$_SESSION['user_name'] = $user_data['user_first_name'];
                            $_SESSION['user_last_name'] = $user_data['user_last_name'];
							$_SESSION['user_email'] = $user_data['user_email'];
                            $_SESSION['user_phonenumber'] = $user_data['user_phonenumber'];
                            $_SESSION['user_role'] = $user_data['user_role'];
                            if($selectOption == 'Admin'){
                                header("Location: admin.php");
                            }else{
                                header("Location: index.php");
                            }
							die;

						}
					}
				}
				echo "Wrong username or password!";
			}else{
				echo "Please enter a valid information!";
			}
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register-form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
    #roleUser{
        padding: 10px;
        padding-left: 100px;
    }
</style>
<body>

    <div class="main">

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="signup.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign In</h2>	
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="your_email" id="your_email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="user_password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="user_password" id="user_password" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="role"></label>
                               <select id="roleUser" name="roleOption">
                                   <option>Select Role</option>
                                   <option value="Admin">Administrator</option>
                                   <option value="User">User</option>
                               </select>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>