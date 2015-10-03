<?php
//Controller for log out

require_once 'functions/session.php';

// Controller Enter point
    if(!empty($_GET['lo'])) {
        if($_GET['lo'] === 'yes'){
            $a = log_out();// $a in succes is true
        }
    }
    header('Location: index.php');
?>