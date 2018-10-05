<?php
    include "db.php";


    $f_name = $_POST["f_name"];
    $l_name = $_POST["l_name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $password = $_POST["password"];
    $repassword = $_POST["repassword"];
    $address1 = $_POST["address1"];
    $address2 = $_POST["address2"];

    $name = "/^[A-Z][a-zA-Z]+$/";
    $emailValidation = "/^[a-z0-9-]+(\.{_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
    $number = "/^[0-9]+$/";

    if( empty($f_name) || empty($l_name) || empty($email) || empty($mobile) || empty($password) || empty($address1) || empty($address2) || empty($repassword)) {
        echo "
            <div class='alert alert-warning'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <b> Please Fill all field...!</b>
            </div>
        ";
        exit();
    }

    if(!preg_match($name, $f_name)){
       echo "<div class='alert alert-warning'>
                 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                 <b> $f_name is not a valid name</b>
             </div>";
       
        exit();        
    }
    if(!preg_match($name, $l_name)){
        echo "<div class='alert alert-warning'>
                 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                 <b> $f_name is not a valid name</b>
             </div>";
       
        exit();        
    }
    if(!preg_match($emailValidation, $email)){
        echo "<div class='alert alert-warning'>
                 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                 <b>$email is not a valid email</b>
             </div>";        
        exit();        
    }
    if(strlen($password) < 9 ){
        echo "<div class='alert alert-warning'>
                 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                 <b>Password is weak</b>
             </div>";  
        exit();        
    } 
    if(strlen($repassword) < 9 ){
        echo "<div class='alert alert-warning'>
                 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                 <b>Password is weak</b>
             </div>";
       
        exit();        
    } 
    if($password != $repassword ){
        echo "<div class='alert alert-warning'>
                 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                 <b>Password is not same</b>
             </div>";
        echo "";
        exit();        
    }  
    if(strlen($mobile) < 9 || !preg_match($number, $mobile)){
        echo "<div class='alert alert-warning'>
                 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                 <b> $mobile is not a valid mobile number</b>
             </div>";       
        exit();        
    }

    //existing email address checking

    $sql = "SELECT email from user_table WHERE email = '$email' LIMIT 1";
    $run_query = mysqli_query($con, $sql);
    if(mysqli_num_rows($run_query) > 0 )
    {
        echo "<div class='alert alert-warning'>
                 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                 <b> Email already exist, Try another email</b>
             </div>";
             exit();
        
    } else {

        $sql = "INSERT INTO `user_table` (`first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES ('$f_name', '$l_name', '$email', '$mobile', '$password', '$address1', '$address2')";
        $run_query = mysqli_query($con, $sql);

        if($run_query){
            echo "<div class='alert alert-warning'>
                 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                 <b> Registered Succesfully..!</b>
             </div>";
        }

    }

?>


    