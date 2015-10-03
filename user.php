<?php
//Controller for user

require_once '/models/blog_notes.php';

session_start();


//Enter point
if(empty($_SESSION['user_name'])){
    header ('Location: index.php');
    exit();
}
$title = $_SESSION['user_name'];

//Launching user.php model

$data = notes_to_array($title);// Retrieving notes, its titles and post time from database

include 'views/main_for_user.php';
?>