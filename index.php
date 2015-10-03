<?php
//Controller
require_once '/models/auth.php';
require_once '/models/articles.php';

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

//Launching articles.php model

$articles = article_titles();// Retrieving article titles массив
//putting into ячейку $temp_array массив в формате 1)ключь ячейки (он же
// будет название статьи) 2) содержимое ячейки А) сама статья Б)
//  время её пумликации
// $articles_array format 
// rarray(3) { ["asdasddfbdfdfdfvasd"]=> array(2) { ["article_content"]=> string(14)
//  "asdasdasdasdas" ["article_post_time"]=> string(19) "2015-10-03 14:51:12" }
$articles_array = article_content_and_time($articles);// массив
    
// View main page for guest
    include_once '/views/main.php';//__DIR__ . '/views/main.php';

?>