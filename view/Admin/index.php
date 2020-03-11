<?php $this->title = "Marathon - Administration" ?>
<!--
<h2>Administration</h2>

Bienvenue, <?= $this->clean($login) ?> !
Ce blog comporte <?= $this->clean($nbPosts) ?> billet(s) et <?= $this->clean($nbComments) ?> commentaire(s).
<br>
<a id="decoLink" href="connection/disconnect">Se déconnecter</a>
-->


<!-- Need to create form for course -->
<div class="container">
    <div class="box">
        <h1>Create new Marathon</h1>
        <form method="post" action="Admin">
            <label>Nom de la course</label>
                <input type="text" name="nom" value="" placeholder="Nom de la course">
            <label>Date de la course</label>
                <input type="date" name="date" value="" placeholder="Date">

            <label>Lieux de départ </label>


    <!---->
                <select>
                    <option value="" selected disabled>Choix du Lieux</option>
                <?php
                    while ($row = $lieux->fetch()) {
                        $lieuxAr = $row['R_LIEUX'];
                        echo '<option value="' . $lieuxAr . '">' . $lieuxAr . '</option>';
                    }
                    $lieux->closeCursor();
                ?>
                </select>


    <!---->
            <label>Lieux d'arriver </label>
    <!---->

                <select>
                    <option value="" selected disabled>Choix du Lieux</option>
                <?php
                    while ($row = $lieux->fetch()) {
                        $lieuxAr = $row['R_LIEUX'];
                        echo '<option value="' . $lieuxAr . '">' . $lieuxAr . '</option>';
                    }
                    $lieux->closeCursor();
                ?>
                </select>
                
    <!---->



            <label>Temps</label>
                <input type="text" name="temps" value="" placeholder="HH:MM:SS" READONLY> <!-- -->
            <label>Distance</label>
                <input type="text" name="distance" value="" placeholder="KM" READONLY> <!-- -->
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
    </div>
</div>