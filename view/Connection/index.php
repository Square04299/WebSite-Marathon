<?php $this->title = "Connexion" ?>

<div class="info">
    <ul>
        <li>Username : user</li>
        <li>Password : user</li>
    </ul>
    <ul>
        <li>Username : admin</li>
        <li>Password : admin</li>
    </ul>
</div>
<div class="login">
    <div class="box">
        <h1>Connection Marathon</h1>
        <form method="post" action="connection/connect">
            <div>
                <input type="text" name="login" value="" placeholder="Username">
            </div>
            <div>
                <input type="password" name="password" value="" placeholder="Password">
            </div>
            <div class="submit"><input type="submit" name="commit" value="Login"></div>
        </form>
    </div>
</div>

<?php if (isset($msgError)): ?>
    <p><?= $msgError ?></p>
<?php endif; ?>
