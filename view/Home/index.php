<?php $this->title = "Home Page"; ?>


<div class="container">
    <div class="box">
        <h1>My Marathon</h1>
            <div class="box">
                <h1>TEST</h1>
            </div>
            <div class="box">
                <h1>TEST1</h1>
            </div>
            <div class="box">
                <h1>TEST2</h1>
            </div>
            <div class="box">
                <h1>TEST3</h1>
            </div>
            <?= $this->clean($login)?>
    </div>
</div>

<!--
<?php foreach ($posts as $post):
    ?>
    <article>
        <header>
            <a href="<?= "post/index/" . $this->clean($post['id']) ?>">
                <h1 class="postTitle"><?= $this->clean($post['title']) ?></h1>
            </a>
            <time><?= $this->clean($post['date']) ?></time>
        </header>
        <p><?= $this->clean($post['content']) ?></p>
    </article>
    <hr />
<?php endforeach; ?>
-->