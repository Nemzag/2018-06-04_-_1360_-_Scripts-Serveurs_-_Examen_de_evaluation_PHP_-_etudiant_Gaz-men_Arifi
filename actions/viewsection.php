<?php
/*
 * Créez le script permettant de voir ou de masquer une section.  Après retour vers admin.php
 */

session_start();

// SECURISATION CONTRE LES HACKERS, CODE INVISIBLE
if(isset($_SESSION['login']) && $_SESSION['level'] == 'Administrateur') {

    require '../lib/db.php';

    $dbh = db();

    try {
        $sql = "UPDATE sections
                SET view = :sectionsview      
                WHERE sections.id = :sectionsid";

        $result = $dbh->prepare($sql);

        $result->bindValue('sectionsid', $_GET['id'], PDO::PARAM_INT);
        $result->bindValue('sectionsview', $_GET['view'], PDO::PARAM_INT);

        $result->execute();
    }
    catch (PDOException $e) {
        die('Error SQL : '.$e->getMessage());
    }

    header('location: ../admin.php');
} else {
    header('location: ../login.html');
}