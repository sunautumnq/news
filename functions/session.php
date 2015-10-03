<?php
// Sessions and cookies

// Set session and cookie to user after registration or log in
    
    function cok_a_sess ($a) {
        //setcookie('login', "$a", time() + 3600*24);
        //setcookie("password", "$b", time() + 3600*24);
        session_start();
        $_SESSION['user_name'] = $a;
    }
// Log out
    
    function log_out(){
        session_start();
        unset($_SESSION['user_name']);
        $temp = session_destroy();
        return $temp;
    }
?>