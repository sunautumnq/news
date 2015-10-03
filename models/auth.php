<?php
// User authentification functions

require_once 'functions/sql.php';

// User Registration
    
    function user_registration($a, $b) {
        sql_connect();
        // query to create a new user in db
        $query_user = "INSERT INTO users (user_name, user_password) VALUES ('" . $a . "', '" . $b . "')";
        $temp = sql_query($query_user);// returns true if username and its password are writen in db
        //query to create a new table for registering user
        $query_table = "CREATE TABLE ml1_news." . $a . " (note_id SERIAL NOT NULL ,"
        . " user_note VARCHAR(200) NOT NULL , user_note_title VARCHAR(30) NOT NULL ,"
        . " user_note_time VARCHAR(50) NOT NULL) ENGINE = InnoDB;";
        $temp2 = sql_query($query_table);// returns true if user table is created in db
        if($temp == true && $temp2 == true)
            return true;
        else
            return false;
    }

// Logging in, username and password check in database
    
    function flogin ($a, $b) {
        sql_connect();
        // Forming the sentence/string of query for qury function 
        $result = "SELECT * FROM users WHERE user_name='" . $a . "' AND user_password='" . $b . "'";
        $temp = sql_query($result);
        $arr = mysql_fetch_assoc($temp);
        
        if($arr !== false)
            return true;
        else
            return false;
    }

?>