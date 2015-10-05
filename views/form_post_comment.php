<!-- Post form -->
<div>
        <form action="comment_add.php" method="post">
            <fieldset>
                Comment title &nbsp; <input type="text" name="comment_title" /><br/>
                <textarea cols ="10" rows = "3" name="comment_content" maxlength="199" placeholder="Your text..."></textarea><br/>
                <input type="submit" value="Post"/>&nbsp;<input type="reset" value="Reset form."/>
<!-- Фактивный input чтобы передать дополнительный параметр через POST -->
                <input type="text" name="article_title" value="<?php echo $title; ?>" hidden="true"/>
            </fieldset>
        </form>
</div>