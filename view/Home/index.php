<?php $this->title = "Home Page"; ?>


<div class="container">
    <div class="box">
        <h1>My Marathon</h1>
            <?php foreach ($races as $race):?>
                <article>
                <div class="box">
                    <h1><?= $this->clean($race['Cname'])?> </h1>
                    <div class="grid-container">
                        <div class="grid">
                            <div>Lieux de Départ</div>
                            <hr/>
                            <?= $this->clean($race['lieuxDepart'])?> 
                        </div>
                        <div  class="grid">
                            <div>Lieux d'Arriver</div>
                            <hr/>
                            <?= $this->clean($race['lieuxArriver'])?>  
                        </div>
                        <div class="grid">
                            <div>Départ de la course</div>
                            <hr/>
                            <?= $this->clean($race['dateDebut'])?>
                        </div>
                        <div class="grid">
                            <div>Nombres de participant</div>
                            <hr/>
                            <!--
                            //TODO
                                <p><?= $this->clean($race['total']) ?> </p>
                            -->
                        </div>
                    </div>
                </div>
                </article>
            <?php endforeach; ?>
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