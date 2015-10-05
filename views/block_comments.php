<!-- 4rd div (php data check specific article controller)-->
<div id="comments">
    <div id="comments_main" style="min-height: 200px;">
    <!-- Check if registered or just user have no post in db -->   
    <?php if(!empty($data['0'])):?>
        <div style="text-align: center;">Comments</div>
    <!-- appearing each post in users db --> 
    <?php foreach($data as $string): $comment = $string['2']; $comment_title = $string['0']; $comment_time = $string['1']; ?>
        <div id="comments_one_note">
            <div id="comment_title" style="min-height: 25px; background-color: graytext;">
                <div style="float: left;"><?=$comment_title ?></div>
                <div style="float: right;"><?=$comment_time ?></div>
            </div>
            <div id="comment_content" style="background-color: cadetblue;"><?=$comment ?></div>
        </div>
    <?php endforeach;?>
    <?php endif;?>
    </div>
</div>