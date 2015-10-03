<?php
//Model for authorized user, user is one(one unit)

require_once 'functions/sql.php';

//query to db how much строк в массиве таблици постов КОНКРЕТНОГО ползователя

function quantity_of_notes($a) {
    sql_connect();
    $temp = 'SELECT count(*) FROM ' . $a;
    $temp2 = sql_query($temp);
    $temp3 = mysql_fetch_row($temp2);
    $temp4 = $temp3['0'];
    return $temp4;
}
//пост меняем перенос строки с "точки" в БД на тег <br/> для views main_for_user.php

    function note_point_to_br_htmltag ($a) {
            $tpost = $a;
            $tpost2 = explode('.', $tpost);//array
            $tpost3 = implode("<br/>", $tpost2);
            $a = $tpost3;
            return $a;
    }
// Extracting exact user notes from db to show them in view main_for_user.php

function notes_to_array($title) {
    sql_connect();
    $data = array();// Creating empty array to put all user notes there
    // quantity of notes in user table in db using the function above
    $i = quantity_of_notes($title);
    do {
        //request for 1 note in order to get newest first
        $temp = "SELECT user_note, user_note_title, user_note_time FROM " . $title . " WHERE note_id='" . $i . "'";
        $temp2 = sql_query($temp);
        $temp3 = mysql_fetch_row($temp2);
        //пост меняем перенос строки с "точки" в БД на тег <br/> для views main_for_user.php
        $br = note_point_to_br_htmltag($temp3['0']);
        $temp3['0'] = $br;//записываю в ячейку 0 (она же user_note в БД) с тегом <br/> где была точка
        $data[$i] = $temp3;//writing gotten string 1 note to array
        $i--;
    }while ($i >= 1);
    return $data;  
}
// Creating array from textarea(post) with \n \r\n change on '.'

function post_to_array($a) {
    
    $tpost = preg_split('/\r\n|[\r\n]/', $a);// post split by \n or r\n
    $tpost2 = implode(".", $tpost);//post string create by '.'
    return $tpost2;
}
// Exact note 'post', e.g. write it to db

function note_post_to_db($a, $b, $c) {
    sql_connect();
    // geting string from entered by user post where \n is marked with full stop '.'
    $post_arr = post_to_array($c);
    $time = date('H:i:s', time()) . ' : ' .date('d-m-Y');
    $temp = "INSERT INTO " . $a . " (user_note, user_note_title, user_note_time) "
            . "VALUES ('" . $post_arr . "', '" . $b . "', '" . $time . "')";
    $temp2 = sql_query($temp);//as a result mysql query with query INSERT returns true or false
    if($temp2)
        return true;
    else
        return false;
}

?>