<!-- Log in form -->
    <!-- php передаст get параметр если пользователь зашел со страници конкретной статьи -->
<form action="login.php<?php if($user_name == '0') echo '?article=' . $title; ?>" method="post">
    <fieldset>
        <div id="mright1"><div><legend> Please Log in </legend></div></div>
        <br/>
        <label><div class="mright2"><div class="mright3">Log in &nbsp;</div><div class="mright4"><input type="text" name="user_name"/></div></div></label>
        <label><div class="mright2"><div class="mright3">Password &nbsp;</div><div class="mright4"><input type="text" name="user_password"/></div></div></label>
        <label><div class="mright2"><div id="mright5"><input type="checkbox" name="remember"/>&nbsp; <i>Remember me.</i></div></div></label>
        <div class="mright2"><div id="mright6"><input type="submit" value="  Log in  "/></div><div id="mright7"><input type="reset" value="  reset  "/></div></div>
    </fieldset>
</form>