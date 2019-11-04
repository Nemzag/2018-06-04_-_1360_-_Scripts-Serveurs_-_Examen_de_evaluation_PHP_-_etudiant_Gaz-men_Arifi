<?php
// Création du script de déconnexion et renvoi vers la page index

// J'active la SESSION
session_start();

// unset($_SESSION['login']);
// unset($_SESSION['level']);

// SECURISATION CONTRE LES HACKERS, CODE INVISIBLE
if(isset($_SESSION['login'])) {
    if(isset($_SESSION['login']) && $_SESSION['level'] == 'Administrateur' ) {

        // DESTRUCTION DE LA SESSION LOGIN
        unset($_SESSION['login']);
        unset($_SESSION['level']);

        // REDIRECTION
        header('location: ../index.php');
    }
    elseif(isset($_SESSION['login']) && $_SESSION['level'] == 'Développeur' ) {

        // DESTRUCTION DE LA SESSION LOGIN
        unset($_SESSION['login']);
        unset($_SESSION['level']);

        // REDIRECTION
        header('location: ../index.php');
    }
    elseif(isset($_SESSION['login']) && $_SESSION['level'] == 'Visiteur' ) {

        // DESTRUCTION DE LA SESSION LOGIN
        unset($_SESSION['login']);
        unset($_SESSION['level']);

        // REDIRECTION
        header('location: ../index.php');
    }
}
else
{
    header('location: ../index.php');
}