<?php
//Controller for log out

require_once 'functions/session.php';
require_once 'models/articles.php';

// Controller Enter point
    if(!empty($_GET['lo'])) {
        if($_GET['lo'] === 'yes'){
            $a = log_out();// $a in succes is true
            if(!empty($_GET['article'])) {// if logout was clicked from main_one_article page
                //checking article by its title one more time in database
                $temp = article_check_in_database ($_GET['article']);
                if($temp != false)
                    header('Location: specific_article.php?article=' . $_GET['article']);
                    exit();
            }       
        }
    }
    header('Location: index.php');
?>