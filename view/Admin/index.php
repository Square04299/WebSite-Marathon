<?php $this->title = "Marathon - Administration"?>

<div class="topnav">
    <a href="connection/disconnect">Déconnexion</a>
</div>
<div class="container">
    <div class="box">
        <h1>Nouveau Marathon</h1>
        <form method="post" action="admin/newRace">
            <label>Nom de la course</label>
                <input type="text" name="race" placeholder="Nom de la course" required>
            <label>Date de la course</label>
                <input type="date" name="dateRace" placeholder="Date" required>

            <label>Heure de départ</label>
                <input type="time" step="1" name="timeRace" value="" placeholder="Time" required>

            <label>Lieu de départ </label>

                <select class="lieuxDepart" name="depart" required>
                    <option selected disabled>Choix du Lieu</option>
                </select>

            <label>Lieu d'arrivée</label>

                <select class="lieuxArriver" name="arriver" required>
                    <option value selected disabled>Choix du Lieu</option>
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
        <h1>Liste des Marathons</h1>
            <?php foreach ($races as $race):?>
                <article>
                    <div class="box">
                        <h1><?= $this->clean($race['Cname'])?> </h1>
                        <div class="grid-container">
                            <div class="grid">
                                <div>Lieu de départ</div>
                                <hr/>
                                <?= $this->clean($race['lieuxDepart'])?> 
                            </div>
                            <div  class="grid">
                                <div>Lieu d'arrivée</div>
                                <hr/>
                                <?= $this->clean($race['lieuxArriver'])?>  
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
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
    </div>
</div>