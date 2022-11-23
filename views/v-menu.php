<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

?>

<nav>
    <a href="index.php?vue=home">Accueil</a>
    <a href="index.php?vue=evenement">Evènements</a>
    <a href="index.php?vue=partenaire">Partenaires</a>
        
    <?php
    if(isset($_SESSION['id']))
    {
            echo '<a href="index.php?action=deco">Déconnexion</a>';
    }
    else
    {
        echo '<a href="index.php?vue=login">Login</a>';
    }

    if(isset($_SESSION['adm']))
    {
        if($_SESSION['adm'] == 1)
        {
            echo '<a href="index.php?vue=createevent">Créer un évènement</a>';
        }  
    }
    ?>
    

</nav>