<?php
//Model for authorized users, all user's comments write to db

require_once 'functions/sql.php';


//пост меняем перенос строки с "точки" в БД на тег <br/> для views main_for_user.php

    function comment_point_to_br_htmltag ($a) {
            $tpost = $a;
            $tpost2 = explode('.', $tpost);//array
            $tpost3 = implode("<br/>", $tpost2);
            $a = $tpost3;
            return $a;
    }
// Extracting exact user notes from db to show them in view main_for_user.php

function comments_to_array($title) {
    sql_connect();
    $data = array();// Creating empty array to put all user notes there
    //request for 1 note in order to get newest first
    $temp = "SELECT article_comment_title, article_comment_time, article_comment_content"
            . " FROM comments_articles WHERE article_name='" . $title . "' ORDER BY"
            . " article_comment_time DESC";
    $temp2 = sql_query($temp);
    do {
        $temp3 = mysql_fetch_row($temp2);
        if($temp3 != false){
            //пост меняем перенос строки с "точки" в БД на тег <br/> для views main_for_user.php
            $br = comment_point_to_br_htmltag($temp3['2']);
            $temp3['2'] = $br;//записываю в ячейку 0 (она же user_note в БД) с тегом <br/> где была точка
            $data[] = $temp3;//writing gotten string 1 note to array
        }
    }while ($temp3 !== false);
    return $data; 
}
// Creating array from textarea(comment post) with \n \r\n change on '.'

function comment_to_array($a) {
    
    $comment = preg_split('/\r\n|[\r\n]/', $a);// comment split by \n or r\n
    $comment2 = implode(".", $comment);//comment string create by '.'
    return $comment2;
}
// Exact note 'post', e.g. write it to db

function comment_write_to_db($a, $b, $c) {
    sql_connect();
    // geting string from entered by user post where \n is marked with full stop '.'
    $post_arr = comment_to_array($c);
    //$time = date('H:i:s', time()) . ' : ' .date('d-m-Y');// БД ставит автоматически там TIMESTAMP
    $temp = "INSERT INTO comments_articles (article_name, article_comment_title, article_comment_content) "
            . "VALUES ('" . $a . "', '" . $b . "', '" . $post_arr . "')";
    $temp2 = sql_query($temp);//as a result mysql query with query INSERT returns true or false
    if($temp2)
        return true;
    else
        return false;
}

?>