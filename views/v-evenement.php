<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

foreach ($lesevenements as $value) {
    $nb = 0;
    $date = $value['date'];
    $lieu = $value['lieu'];
    $heure = $value['heure'];
    $idEvent = $value['id'];
    echo "<h2>Date : $date </h2>";
    echo "<h3>Lieu : $lieu </h3>";
    echo "<h4>Heure : $heure h : minutes</h4>";
    if(isset($_SESSION['id']))
    { ?>
        <form action="index.php?action=aParticipant" method="POST">
            <?php
        foreach ($lesEventParticiper as $EventEtuditantP) {
            if($EventEtuditantP['idEvent'] == $idEvent)
            { 
                $nb = 1;
                ?>
                <p>Vous vous êtes inscrits à cet évènement !</p>
                <p><label for="desinscrire">Se désincrire</label> <input type="checkbox" id="desinscrire" name="desinscrireE" value="jedesinscrire"></p>
            <?php }

                
            }
            if($nb == 0)
            {?>
                   <p><label for="participe">Participera</label> <input type="checkbox" id="participe" name="partcipeE" value="jeparticipe"></p>
            <?php }
        

    ?>
<!--<form action="index.php?action=aParticipant" method="POST">-->
    <!--<p><label for="participe">Participera</label> <input type="checkbox" id="participe" name="partcipeE" value="jeparticipe"></p>-->
    <input type="hidden" name="idEtudiant" value="<?= $_SESSION['id'] ?>">
    <input type="hidden" name="idEvent" value="<?= $idEvent ?>">
    <input type="submit" value="Valider">
</form>

<?php 
    }
    else
    {
        echo "<a href='index.php?vue=login'>S'identifier pour pouvoir participer</a>";
    }
}

?>






