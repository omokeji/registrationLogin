<?php
//	session_start();

		include("connection.php");
		include("functions.php");
	//	$id = isset($_GET['id']) ? $_GET['id'] : '';
	//	$user_data = check_login($con);
		
	if(isset($_SESSION['user_id_gen'])){header("location: index.php");}
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			//something was posted 
			$user_name = $_POST['name'];
            $user_last_name = $_POST['lname'];
			$user_email = $_POST['email'];
            $phonenumber = $_POST['phonenumber'];
			$user_password = $_POST['pass'];
            $selectOption = $_POST['roleOption'];

			if(!empty($user_name) && !empty($user_email) && !empty($user_password))
			{
				//save to database
				$USER_ID = random_num(20);
				$query = "insert into login_table (user_id_gen ,user_first_name,user_last_name,user_phonenumber,USER_EMAIL,user_password,user_role) 
                                            values ('$USER_ID','$user_name','$user_last_name','$phonenumber','$user_email','$user_password','$selectOption')";
			
				mysqli_query($con, $query);

				header("Location: login.php");
				die;
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

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your First Name"/>
                            </div>
                            <div class="form-group">
                                <label for="lname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="lname" id="lname" placeholder="Your Last Name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="phonenumber"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="phonenumber" id="phonenumber" placeholder="Your Phone Number"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                                <label for="role"></label>
                               <select id="roleUser" name="roleOption">
                                   <option>Select Role</option>
                                   <option value="Admin">Administrator</option>
                                   <option value="User">User</option>
                               </select>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already member</a>
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