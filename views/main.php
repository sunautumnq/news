<!DOCTYPE HTML>
<html>
    <head>
        <title> BLOG SYSTEM </title>
        <meta charset="UTF-8" content="text/html"/>
        <link href="views/html_adds/css_reset.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="views/html_adds/frame.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="views/html_adds/quest.css" rel="stylesheet" type="text/css" media="screen"/>
    </head>
    <body>
<!-- Entered as quest -->
        <!-- top menu of the website -->
        <div id="main">
<!-- 1st div -->
            <div id="sign_in_on_ver_menu">
                <div id="to_main_page">
                    <?php if($form_type !== '0'):?>
                    <a href="index.php">На главную</a>
                    <?php endif;?>
                </div> 
                <div id="user_greeting">asdasd</div>
            </div>
<!-- 2nd div -->
            <div id="menu">
                <div id="menu_left">
                    <div id="blog">BLOG</div>
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
                <?php if($form_type !== '0') include $form_type; ?>
                
                </div>
                
                
            </div>
<!-- 3rd div -->
            <div id="content">
                
                
            </div>
<!-- 4th div -->
            <div id="footer">
                
                
            </div>
            
            
            
            
        </div>
    </body>
</html>