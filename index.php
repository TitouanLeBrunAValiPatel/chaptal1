<?php 
session_start();
include './models/m-models.php';

$vue = filter_input(INPUT_GET, 'vue');
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_ENCODED);
$erreur ='v-comingSoon.php';
//echo $vue;

switch ($vue) {
    case 'apropos':$affichage = 'v-aPropos.php';break;
    case 'partenaire':$affichage = 'v-partenaire.php';break;
    case 'evenement':
        $lesevenements = pdo_string("select id, date, heure, lieu, libelle from evenement;");
        $nbr_participant = pdo_string("select count(*) as nbr from participant where idEvent = 1;");
        $affichage = 'v-evenement.php';
        
        if(isset($_SESSION['id']))
        {
            $tempIdSession = $_SESSION['id'];
            $lesEventParticiper = pdo_string("SELECT idEvent FROM `participant` WHERE idE = $tempIdSession");
        }
        
        
        break;
    case 'quimper':$affichage = 'v-quimper.php';break;
    case 'home':$affichage = 'v-accueil.php';break;
    case 'login':$affichage = 'v-login.php';break;
    default:$affichage = 'v-accueil.php';break;
}

switch ($action) {
    case 'aLogin':
        unset($_SESSION['id']);
        unset($_SESSION['adm']);
        $name = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        
        if($name == 'bde' && $password == 'bde')
        {
            $_SESSION['id'] = 'bde';
            $_SESSION['adm'] = 1;
            $affichage = 'v-accueil.php';
        }
        $connexion = pdo_string("select count(*) as nbr, id, nom, prenom from etudiant where login = '$name' AND mdp = '$password';");
        $id = $connexion[0]['id'];
        $compte = $connexion[0]['nbr'];
        if($compte == 1)
        {
            $_SESSION['id'] = $id;
            $temp1nom = $connexion[0]['nom'];
            
            $temp2prenom = $connexion[0]['prenom'];
            $_SESSION['username'] = "$temp1nom $temp2prenom ";
            $affichage = 'v-accueil.php';
            
        }
        else{
            $affichage = 'v-login.php';
            $erreur= 'v-erreur.php';
        }
            
    
        break;
    case 'aParticipant':
        $checkP = filter_input(INPUT_POST, 'partcipeE');
        if(isset($checkP))
        {
            $idE = filter_input(INPUT_POST, 'idEtudiant');
            $idEvent = filter_input(INPUT_POST, 'idEvent');
            if($checkP == 'jeparticipe')
            {

                $ajoutEtudiant = pdo_insert("INSERT INTO `participant` (`idE`, `idEvent`) VALUES ($idE, $idEvent);");
                if($ajoutEtudiant == false)
                {
                    $affichage = 'v-erreur.php';
                } 
                else
                {
                    $affichage = 'v-evenement.php';
                }
            }
            else if($checkP == 'jedesinscrire')
            {
               $supprEtudiantEvent = pdo_insert("DELETE FROM participant WHERE `participant`.`idE` = $idE AND `participantt`.`idEvent` = $idEvent ");
                if($supprEtudiantEvent == false)
                {
                    $affichage = 'v-erreur.php';
                } 
                else
                {
                    $affichage = 'v-evenement.php';
                } 
            }
        }
        
        break;


    case 'deco':
        unset($_SESSION['id']);
        unset($_SESSION['adm']);break;
    //default: $affichage = 'v-erreur.php' ;break;
}

$menu = 'v-menu.php';

include './views/v-charte.php';
