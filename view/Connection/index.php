<?php $this->title = "Connexion" ?>

<div class="login">
    <div class="box">
        <h1>Connexion</h1>
        <form method="post" action="connection/connect">
            <div>
                <input type="text" name="login" value="" placeholder="Username" required>
            </div>
            <div>
                <input type="password" name="password" value="" placeholder="Password" required>
            </div>
            <div>
            <?php if (isset($msgError)): ?>
                <p style="color:black;"><?= $msgError ?></p>
            <?php endif; ?>
            </div>
            <div class="submit">
                <input type="submit" name="commit" value="Login">
            </div>
        </form>
    </div>
</div>
