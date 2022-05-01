<?php
    session_start();

    include("connection.php");
    include("functions.php");
  
    $user_data = check_login($con);
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Page</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="topnav" id="myTopnav">
    <a href="#home" class="active">Home</a>
    <a href="#news">News</a>
    <a href="#contact">Contact</a>
    <a href="#about">About</a>
    <a href="logout.php" class="signup-image-link">Logout</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
    </a>
    </div>
    <div class="main">
   
        <h1>Hello <?php echo $_SESSION['user_name']; ?> <?php echo $_SESSION['user_last_name']; ?></h1>
        <p>Your phone number is  <?php echo $_SESSION['user_phonenumber']; ?> , email address => <?php echo $_SESSION['user_email']; ?>  and role <?php echo $_SESSION['user_role']; ?> </p>
    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        /* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
            function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
            }
    </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>