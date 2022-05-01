<?php
function check_login($con){
    if(isset($_SESSION['user_id_gen']))
    {
        $id = $_SESSION['user_id_gen'];
        $query = "select * from login_table where user_id_gen = $id limit 1";

        $result = mysqli_query($con,$query);
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            debug_to_console($user_data);
            return $user_data ;
        }
    }
        //redirect to login
        header("Location: login.php");
        die;
  
}
 function random_num($length)
 {
     $text = "";
     if($length < 5)
     {
        $length = 5;
     }
     $len = rand(4,$length);

     for ($i=0; $i < $len; $i++) { 
         # code...
         $text .= rand(0,9);
     }
     return $text;
 }

 function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
?>