<!DOCTYPE HTML>
<html>
    <head>
        <title> <?=$title?> </title>
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
                    <?php if($user_name == '0'): ?>
                    <a href="index.php">На главную</a>
                    <?php else: ?>
                    <a href="user.php">На главную</a>
                    <?php endif; ?>
                </div> 
                <div id="user_greeting">
                    <?php if($user_name != '0'): ?>
                    Hello, <?php echo $user_name ?>!
                    <a href="logout.php?lo=yes&article=<?=$title?>">quit</a>
                    <?php endif; ?>
                </div>
            </div>
<!-- 2nd div -->
            <div id="menu">
                <div id="menu_left">
                    <div id="blog"> NEWS <?php echo '<br/>' . $title; ?> </div>
                    <div id="buttons">
                        <?php if($user_name == '0'): ?>
                        <div id="button1">
                            <a href='specific_article.php?go=login&article=<?=$title ?>'><input type='button' value='      LOG IN         ' name='login'/></a>
                        </div><div></div><!-- div толкающий button1 и button1 с display: table-cell-->
                        <div id="button2">
                            <a href='specific_article.php?go=registr&article=<?=$title ?>'><input type='button' value='REGISTRATION' name='reg'/></a>
                        </div>
                        <?php endif; ?>
                    </div> 
                </div>
        <!-- log in or registr form -->
                <div id="menu_right">
                <?php if($form_type !== '0') include $form_type; ?>
                <?php if($user_name != '0') include 'views/form_post_comment.php'; ?>
                
                </div>
                
                
            </div>
<!-- 3rd div -->
            <div id="content">
                <div id="content_main" style="min-height: 500px;">
                <!-- appearing specific article to user --> 
                    <div id="content_one_note">
                        <div id="main_title" style="min-height: 25px; background-color: graytext;">
                            <div style="float: left;"><?php echo $article_data['article_title']; ?></div>
                            <div style="float: right;"><?php echo $article_data['article_post_time']; ?></div>
                        </div>
                        <div id="note_content" style="background-color: cadetblue;"> <?php echo $article_data['article_content']; ?> </div>
                    </div>
                </div>
                
            </div>
<!-- 4rd div -->
            <?php include 'views/block_comments.php';?>
<!-- 5th div -->
            <div id="footer">
                
                
            </div>
            
            
            
            
        </div>
    </body>
</html>