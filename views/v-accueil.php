<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

if(isset($_SESSION['id']))
{
    ?>

<p>vous etes bien connecte <?= $_SESSION['username'] ?></p>
   <?php
}
?>

<img src="src" alt="alt"/><!-- comment -->

<h1>Bienvenue sur le site du BDE Chaptal Quimper!</h1>

<p>Ici tu peux retrouver toutes les infos sur la vie étudiante du BDE de Chaptal Quimper (partenaires, soirée, évènement sportif...)</p>

<p>Retrouve ici la liste des évènements proposées dans l'année <a href="mettre un pdf" target="_blank">Clique ici !</a></p>


<a href="index.php?vue=apropos">
    <div class="carre"> <!<!-- mettre un background -->

        <h2>Le BDE</h2>
        <p>Viens découvrir l'équipe et notre rôle au sein de l'école!</p>


    </div>
</a>


<a href="index.php?vue=partenaire">
    <div class="carre"> <!<!-- mettre un background -->

        <h2>Partenaires</h2>
        <p>Nos partenaires</p>


    </div>
</a>

<a href="index.php?vue=evenement">
    <div class="carre"> <!<!-- mettre un background -->

        <h2>Evènements</h2>
        <p>Les évènements qui t'attendent à Chaptal</p>


    </div>
</a>


<a href="index.php?vue=quimper">
    <div class="carre"> <!<!-- mettre un background -->

        <h2>Quimper</h2>
        <p>Découvre une ville sportive, culturelle, et étudiante.</p>


    </div>
</a>