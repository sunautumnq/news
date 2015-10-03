<!DOCTYPE HTML>
<html>
    <head>
        <title> <?=$title?>'s BLOG SYSTEM </title>
        <meta charset="UTF-8" content="text/html"/>
        <link href="views/html_adds/css_reset.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="views/html_adds/frame.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="views/html_adds/user.css" rel="stylesheet" type="text/css" media="screen"/>
    </head>
    <body>
<!-- Entered as user -->
        <div id="main">
<!-- 1st div -->
        <!-- top menu of the website -->
            <div id="sign_in_on_ver_menu">
                <div id="to_main_page">
                    <a href="logout.php?lo=yes">quit</a>
                    
                </div> 
                <div id="user_greeting">Hello, <?=$title?>!</div>
            </div>
<!-- 2nd div -->
            <div id="menu">
                <div id="menu_left">
                    <div id="blog"><?=$title?>'s BLOG</div>
                    <div id="buttons">
                        <div id="button1">
                            <a href='index.php?go=login'><input type='button' value='      LOG IN         ' name='login'/></a>
                        </div><div></div><!-- div толкающий button1 и button1 с display: table-cell-->
                        <div id="button2">
                            <a href='index.php?go=registr'><input type='button' value='REGISTRATION' name='reg'/></a>
                        </div>
                    </div> 
                </div>
        <!-- log in or registr form -->
                <div id="menu_right">
                <?php include 'views/form_post_comment.php';?>
                
                </div>
                
                
            </div>
<!-- 3rd div -->
            <div id="content">
                <div id="content_main" style="min-height: 500px;">
                <!-- Check if registered or just user have no post in db -->   
                <?php if(empty($articles_array['0'])):?>
                <!-- appearing each post in users db --> 
                <?php foreach($articles_array as $title => $content): ?>
                    <div id="content_one_note">
                        <div id="main_title" style="min-height: 25px; background-color: graytext;">
                            <div style="float: left;"><a href="#"><?=$title ?></a></div>
                            <div style="float: right;"><?=$content['article_post_time'] ?></div>
                        </div>
                        <!-- <div id="note_content" style="background-color: cadetblue;"> <php =$content['article_content'] > </div> -->
                    </div>
                <?php endforeach;?>
                <?php endif;?>
                </div>
                
            </div>
<!-- 4rd div -->

<!-- 5th div -->
            <div id="footer">
                
                
            </div>
            
            
            
            
        </div>
    </body>
</html>