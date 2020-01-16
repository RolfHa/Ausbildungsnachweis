<div class="login-window">

    <?php if($error != '') : ?>
    <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <form action="?" method="post">
        <input type="hidden" name="action" value="login">
        <div class="field-wrapper cf">
            <label for="fieldUser">User</label>
            <input id="fieldUser" class="field" type="text" name="user">
        </div>
        <div class="field-wrapper cf">
            <label for="fieldPassword">Password</label>
            <input id="fieldPassword" class="field" type="password" name="pass">
        </div>
        <div class="field-wrapper cf">
            <input class="button" type="submit" value="Login">
        </div>
    </form>

</div>