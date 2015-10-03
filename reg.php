<?php
//Controller of registration
require_once 'functions/session.php';
require_once 'models/auth.php';

//If user filled the registration form and $_POST not empty

if(!empty($_POST['user_name_reg']) && !empty($_POST['user_password_reg'])) {
    $temp = user_registration($_POST['user_name_reg'], $_POST['user_password_reg']);// User Registration data write to db
    if($temp == true){
        cok_a_sess($_POST['user_name_reg']);
        header('Location: user.php');// directing script to controller for the users user.php
        exit();// end of script
    }
}
header('Location: index.php?go=registr');// if 1)username and password does no exist database
//2) or not entered by user 1. password 2. login 3. password and login together  and pressed submit button
?>