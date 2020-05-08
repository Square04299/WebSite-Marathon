<?php $this->title = "Marathon - Administration"?>


<div class="container">
    <div class="box">
        <h1>Create new Marathon</h1>
        <form method="post" action="Admin">
            <label>Nom de la course</label>
                <input type="text" name="nom" value="" placeholder="Nom de la course">
            <label>Date de la course</label>
                <input type="date" name="date" value="" placeholder="Date">

            <label>Lieux de départ </label>

                <select class="lieux">
                    <option selected disabled>Choix du Lieux</option>
                </select>

            <label>Lieux d'arriver </label>

                <select>
                    <option value selected disabled>Choix du Lieux</option>
                </select>

            <div>
                <input class="reset" type="reset" name="reset" value="Reset">
                <input class="submit" type="submit" name="commit" value="Create">
            </div>
        </form>
    </div>
</div>
<div class="container">
    <div class="box">
        <h1>Marathon Précédent</h1>
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