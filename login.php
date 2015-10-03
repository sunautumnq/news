<?php
//Controller log in
require_once 'functions/session.php';
require_once 'models/auth.php';

//Enter point
if(!empty($_POST['user_name']) && !empty($_POST['user_password'])) {    
    $temp = flogin($_POST['user_name'], $_POST['user_password']);//username and password check in database
    if($temp != false){
        cok_a_sess($_POST['user_name']);
        header('Location: user.php');// directing script to controller for the users user.php
        exit();// end of script
    }
}
header('Location: index.php?go=login');// if 1)username and password does no exist database
//2) or not entered by user 1. password 2. login 3. password and login together  and pressed submit button
?>