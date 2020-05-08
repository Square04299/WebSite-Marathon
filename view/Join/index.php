<?php $this->title = "Join" ?>

<div class="topnav">
    <a href="<?= "home/"?>">Home</a>
    <a class="active" href="<?= "join/"?>">Join</a>
    <a href="connection/disconnect">Disconnect</a>
</div>

<div class="container">
    <div class="box">
        <h1>My Marathon</h1>
            <?php foreach ($races as $race):?>
                <form method="post" action="join/joining">
                    <article>
                    <div class="box">
                        <h1><?= $this->clean($race['Cname'])?> </h1>
                        <div class="grid-container">
                            <div class="grid">
                                <div>Lieux de Départ</div>
                                <hr/>
                                <label name="lieuxDepart">
                                    <?= $this->clean($race['lieuxDepart'])?>
                                </label>
                            </div>
                            <div  class="grid">
                                <div>Lieux d'Arriver</div>
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
                                <div>Nombres de participant</div>
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

