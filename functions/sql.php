<?php
//Library functions

// Connect to db

    function sql_connect() {
        mysql_connect('localhost', 'root', 'root');
        mysql_select_db('l8blog');
    }
// Query to db

    function sql_query($a) {
        sql_connect();
        $temp = mysql_query($a);
        return $temp;
    }
    
    
    
?>