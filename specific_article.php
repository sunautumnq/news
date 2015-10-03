<?php
//Controller

require_once '/models/articles.php';


// Controller Enter point
    if(!empty($_GET['article'])) {// If user came throug GET method
        // checking article exist in db if yes returning array
        $article_data = article_check_in_database($_GET['article']);
        if($article_data === false){//if article doesn't exist go to index.php
            headler('Location: index.php');
            exit();
        }
        $title = $article_data['article_title'];// title of article remembering in variable
    }else{
        headler('Location: index.php');// Если вообще GET не пришел
        exit(); 
    }

// View page with specific article
    include_once 'views/main_one_article.php';
?>