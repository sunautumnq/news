<?php
// Models working with articles in db

require_once 'functions/sql.php';


// Function gets all tittles of articles from database and puts them to array

function article_titles (){
    sql_connect();
    $query = "SELECT article_title, article_content, article_post_time FROM"
            . " articles ORDER BY article_post_time DESC";
    $temp = sql_query($query);// Returns descriptor of the field title
    $articles = array();
    do {
        $temp2 = mysql_fetch_assoc($temp);// шагаем по дискриптору
        if($temp2 !== false)// вытяги и записывая каждую title в массив $artilces 
            $articles[] = $temp2['article_title'];   
    }while($temp2 !== false);
    return $articles;
}
// Function gets article content and its post time and puts it into array

function article_content_and_time ($a){
    $temp_array = array();
    foreach ($a as $onetitle) {
        $query = "SELECT article_content, article_post_time FROM articles"
                . " WHERE article_title='" . $onetitle . "'";
        $temp = sql_query($query);
        $temp2 = mysql_fetch_assoc($temp);
        //putting into ячейку $temp_array массив в формате 1)ключь ячейки
        // (он же будет название статьи) 2) содержимое ячейки А) сама статья Б) 
        // время её публикации
        $temp_array[$onetitle] = $temp2;
    }
    return $temp_array; 
}
// Specific article searh in db by article title

function article_check_in_database ($a){
    sql_connect();
    $query = "SELECT * FROM articles WHERE article_title='" . $a . "'";
    $temp = sql_query($query);
    $temp2 = mysql_fetch_assoc($temp);
    return $temp2;// returns array with article and information about it
    //or bool(false) if article is not found
}
// NEW ARTICLE data add to database

function article_add_to_db ($title, $content){
    sql_connect();
    $query = "INSERT INTO articles (article_title, article_content) VALUES ('" . $title . "', '" . $content . "')";
    $temp = sql_query($query);
    return $temp;// return true if article succesfuly added to db, or false if not
}



?>