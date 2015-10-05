<?php
//Controller

require_once '/models/articles.php';
require_once '/models/comment_articles.php';

session_start();

// Controller Enter point
    if(!empty($_GET['article'])) {// If user came throug GET method
        // checking article exist in db if yes returning array
        $article_data = article_check_in_database($_GET['article']);
        if($article_data === false){//if article doesn't exist go to index.php
            headler('Location: index.php');
            exit();
        }
        $title = $article_data['article_title'];// title of article remembering in variable
        // If user clicked on register or login
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
        // If user clicked on register or login END
    }else{
        headler('Location: index.php');// Если вообще GET не пришел
        exit(); 
    }
    
  
//Checking whether it is user or guest
    $user_name = '0';
    if(!empty($_SESSION['user_name'])){
        $user_name = $_SESSION['user_name'];
    }

//Launching comment_articles.php model

$data = comments_to_array($title);// Retrieving comments, its titles and post time from database
    

// View page with specific article
    include_once 'views/main_one_article.php';
?>