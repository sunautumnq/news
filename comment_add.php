<?php
//Controller, adding comment to specifit article.

require_once 'models/comment_articles.php';
session_start();

//Checking if user inputed NEW POST, if yes adding it to database

if(!empty($_POST['comment_title']) and !empty($_POST['comment_content'])
    and !empty($_POST['article_title'])) {
    $title = $_POST['article_title'];
    // comment write to db, returns true or false
    $commetn_to_db = comment_write_to_db($_POST['article_title'], $_POST['comment_title'],
            $_POST['comment_content']);
}

header('Location: specific_article.php?article=' . $title);
?>