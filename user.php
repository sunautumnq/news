<?php
//Controller for user

require_once '/models/blog_notes.php';
require_once '/models/articles.php';

session_start();


//Enter point
if(empty($_SESSION['user_name'])){
    header ('Location: index.php');
    exit();
}
$title = $_SESSION['user_name'];
//Launching user.php model

$data = notes_to_array($title);// Retrieving notes, its titles and post time from database
//Launching articles.php model

$articles = article_titles();// Retrieving article titles массив
//putting into ячейку $temp_array массив в формате 1)ключь ячейки (он же
// будет название статьи) 2) содержимое ячейки А) сама статья Б)
//  время её пумликации
// $articles_array format 
// rarray(3) { ["asdasddfbdfdfdfvasd"]=> array(2) { ["article_content"]=> string(14)
//  "asdasdasdasdas" ["article_post_time"]=> string(19) "2015-10-03 14:51:12" }
$articles_array = article_content_and_time($articles);// массив


include 'views/main_for_user.php';
?>