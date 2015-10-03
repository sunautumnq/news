<?php
//Controller

require_once 'models/blog_notes.php';
session_start();

//Checking if user inputed NEW POST, if yes adding it to database

if(!empty($_POST['title_post']) and !empty($_POST['content_post'])
    and !empty($_SESSION['user_name'])) {
    $trr = note_post_to_db($_SESSION['user_name'], $_POST['title_post'], $_POST['content_post']);// returns true or false
}

header('Location: user.php');
?>