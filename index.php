<?php
//Controller
require_once '/models/auth.php';

//Check wether user authorised or not by its variable user_name in session
session_start();
if(!empty($_SESSION['user_name'])){
    header ('Location: user.php');
    exit();
}

//Error messages and messages
$regisrt_error = 0;


// Controller Enter point
    if(!empty($_GET['go'])) {// If user came throug GET method
        if($_GET['go'] === 'login')// If user clicked on Log in form
            $form_type = 'views/form_login.php';// saving Log in html form path for further its include in main.php
        elseif($_GET['go'] === 'registr')// If user clicked on Rgister form
            $form_type = 'views/form_reg.php';// saving Register html form path for further its include in main.php
        else{// defence if user inputed wrong get['go'] value
            $form_type = '0';
        }
    }else
        $form_type = '0';

    
// View main page for guest
    include_once '/views/main.php';//__DIR__ . '/views/main.php';

?>