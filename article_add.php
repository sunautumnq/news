<?php
//Controller 
require_once 'models/articles.php';

//If user filled the form to add an article and $_POST not empty

if(!empty($_POST['tarticle_post']) && !empty($_POST['carticle_post'])) {
    $temp = article_add_to_db($_POST['tarticle_post'], $_POST['carticle_post']);// article write to db
    if($temp == true){
        header('Location: specific_article.php?article=' . $_POST['tarticle_post']);
        exit();// end of script
    }
}
header('Location: index.php');// if post if empty or the failure accured
// to write article to db
?>