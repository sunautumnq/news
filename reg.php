<?php
//Controller of registration
require_once 'functions/session.php';
require_once 'models/auth.php';
require_once 'models/articles.php';

//If user filled the registration form and $_POST not empty

if(!empty($_POST['user_name_reg']) && !empty($_POST['user_password_reg'])) {
    $temp = user_registration($_POST['user_name_reg'], $_POST['user_password_reg']);// User Registration data write to db
    if($temp == true){
        cok_a_sess($_POST['user_name_reg']);
        //   if user entered from specific article page main_one_article.php
        if(!empty($_GET['article'])) {
            $path = article_check_in_database($_GET['article']);
            if($path != false){
                header('Location: specific_article.php?article=' . $_GET['article']);
                exit();// end of script
            }
        }
        header('Location: user.php');// directing script to controller for the users user.php
        exit();// end of script
    }
}

// if Nothing was entered in $_POST['user_name'] && $_POST['user_password']
// directing user on the same page of one specific article
if(!empty($_GET['article'])) {
    $temp = article_check_in_database($_GET['article']);
    if($temp != false) {
        header ('Location: specific_article.php?go=registr&article=' . $_GET['article']);
        exit();
    }
}

header('Location: index.php?go=registr');// if 1)username and password does no exist database
//2) or not entered by user 1. password 2. login 3. password and login together  and pressed submit button
?>