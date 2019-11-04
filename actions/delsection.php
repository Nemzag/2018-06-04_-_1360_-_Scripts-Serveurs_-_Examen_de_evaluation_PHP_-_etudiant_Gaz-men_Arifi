<?php
// Créer le script de suppression de la section et supprimer l'image également
// Ensuite, retour vers l'admin.

session_start();

// SECURISATION CONTRE LES HACKERS, CODE INVISIBLE
if(isset($_SESSION['login']) && $_SESSION['level'] == 'Administrateur') {
    require '../lib/db.php';

    $dbh = db();

    try {
        $sql = "DELETE
                FROM sections
                WHERE id = :id";

        $result = $dbh->prepare($sql);

        $result->bindValue('id', $_GET['id'], PDO::PARAM_INT);

        $result->execute();
    }
    catch(PDOException $e) {
        die('Error SQL : '.$e->getMessage());
    }

    unlink('../images/sections/'.$_GET['image'].'');

    header('location: ../admin.php');

} else {
    header('location: ../login.html');
}

