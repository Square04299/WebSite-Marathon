<?php $this->title = "Home Page"; ?>

<div class="topnav">
    <a class="active" href="<?= "home/"?>">Home</a>
    <a href="<?= "join/"?>">Join</a>
    <a href="connection/disconnect">Disconnect</a>
</div>

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
                            <?= $this->clean($race['total']) ?>
                        </div>
                    </div>
                </div>
                </article>
            <?php endforeach; ?>
    </div>
</div>
<div class="container">
    <div class="box">
        <h1>Finished Marathon</h1>
            <?php foreach ($racesEndeds as $racesended):?>
                <article>
                <div class="box">
                    <h1><?= $this->clean($racesended['Cname'])?> </h1>
                    <div class="grid-container">
                        <div class="grid">
                            <div>Lieux de Départ</div>
                            <hr/>
                            <?= $this->clean($racesended['lieuxDepart'])?> 
                        </div>
                        <div  class="grid">
                            <div>Lieux d'Arriver</div>
                            <hr/>
                            <?= $this->clean($racesended['lieuxArriver'])?>  
                        </div>
                        <div class="grid">
                            <div>Départ de la course</div>
                            <hr/>
                            <?= $this->clean($racesended['dateDebut'])?>
                        </div>
                        <div class="grid">
                            <div>Classement</div>
                            <hr/>
                            <?= $this->clean($racesended['Pclassement']) ?>
                        </div>
                    </div>
                </div>
                </article>
            <?php endforeach; ?>
    </div>
</div>