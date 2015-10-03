<!-- 4rd div -->
<div id="comments">
    <div id="comments_main" style="min-height: 500px;">
    <!-- Check if registered or just user have no post in db -->   
    <?php if(empty($data['0'])):?>
    <!-- appearing each post in users db --> 
    <?php foreach($data as $string): $note = $string['0']; $note_title = $string['1']; $note_time = $string['2']; ?>
        <div id="comments_one_note">
            <div id="comment_title" style="min-height: 25px; background-color: graytext;">
                <div style="float: left;"><?=$note_title ?></div>
                <div style="float: right;"><?=$note_time ?></div>
            </div>
            <div id="comment_content" style="background-color: cadetblue;"><?=$note ?></div>
        </div>
    <?php endforeach;?>
    <?php endif;?>
    </div>
</div>