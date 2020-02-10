<?php $this->title = "Connexion" ?>

<link rel="stylesheet" href="Content/connection.css" />
<div class="container">
  <div class="login">
    <h1>Connection Marathon</h1>
    <form method="post" action="connection/connect">
      <p><input type="text" name="login" value="" placeholder="Username"></p>
      <p><input type="password" name="password" value="" placeholder="Password"></p>
      <p class="submit"><input type="submit" name="commit" value="Login"></p>
    </form>
  </div>
</div>

<?php if (isset($msgError)): ?>
    <p><?= $msgError ?></p>
<?php endif; ?>
