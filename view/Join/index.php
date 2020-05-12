<?php $this->title = "Join" ?>

<div class="topnav">
    <a href="<?= "home/"?>">Accueil</a>
    <a class="active" href="<?= "join/"?>">Rejoindre</a>
    <a href="connection/disconnect">Déconnexion</a>
</div>

<div class="container">
    <div class="box">
        <h1>Mes marathons</h1>
            <?php foreach ($races as $race):?>
                <form method="post" action="join/joining">
                    <article>
                    <div class="box">
                        <h1><?= $this->clean($race['Cname'])?> </h1>
                        <div class="grid-container">
                            <div class="grid">
                                <div>Lieu de départ</div>
                                <hr/>
                                <label name="lieuxDepart">
                                    <?= $this->clean($race['lieuxDepart'])?>
                                </label>
                            </div>
                            <div  class="grid">
                                <div>Lieu d'arrivée</div>
                                <hr/>
                                <label name="lieuxArriver">
                                    <?= $this->clean($race['lieuxArriver'])?>
                                </label>  
                            </div>
                            <div class="grid">
                                <div>Départ de la course</div>
                                <hr/>
                                <?= $this->clean($race['dateDebut'])?>
                            </div>
                            <div class="grid">
                                <div>Nombre de participants</div>
                                <hr/>
                                <?= $this->clean($race['total']) ?>
                            </div>
                            <input type="hidden" name="idCourse" value="<?= $this->clean($race['idCOURSE'])?>"></input>
                        </div>
                            <div class="submit">
                                <input type="submit" name="commit" value="Join">
                            </div>
                    </div>
                    </article>
                </form>
            <?php endforeach; ?>
    </div>
</div>

