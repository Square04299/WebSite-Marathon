<?php $this->title = "Marathon - Administration" ?>
<!--
<h2>Administration</h2>

Bienvenue, <?= $this->clean($login) ?> !
Ce blog comporte <?= $this->clean($nbPosts) ?> billet(s) et <?= $this->clean($nbComments) ?> commentaire(s).
<br>
<a id="decoLink" href="connection/disconnect">Se déconnecter</a>
-->
<link rel="stylesheet" href="Content/connection.css" />

<!-- Need to create form for course -->
<div class="create">
    <h1>Create new Marathon</h1>
    <form method="post" action="Admin">
        <p>
            <label>Nom de la course : </label>
                <input type="text" name="nom" value="" placeholder="Nom de la course">
            <label>Date de la course : </label>
                <input type="text" name="date" value="" placeholder="Date">
        </p>
        <p>
            <label>Lieux de départ </label>
                <input type="text" name="lieuxD" value="" placeholder=""> <!-- change dropdown -->
            <label>Lieux d'arriver </label>
                <input type="text" name="lieuxA" value="" placeholder=""><!-- change dropdown -->

        <p>
            <input type="text" name="temps" value="" placeholder=""> <!-- -->
            <input type="text" name="distance" value="" placeholder=""> <!-- -->
        </p>
        <p class="submit">
            <input type="submit" name="commit" value="Create Marathon">
        </p>
    </form>
  </div>