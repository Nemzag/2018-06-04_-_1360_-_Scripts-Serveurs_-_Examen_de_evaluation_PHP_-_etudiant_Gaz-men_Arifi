<?php
/*
 * Créez le script permettant l'insertion d'une nouvelle section.
 * L'envoi de l'image est obligatoire -> pas de test à réaliser
 */

session_start();

// SECURISATION CONTRE LES HACKERS, CODE INVISIBLE
if(isset($_SESSION['login']) && $_SESSION['level'] == 'Administrateur') {
    require '../lib/db.php';

    $dbh = db();

    try {
        $sql = "INSERT INTO sections (view, name, categoryId, duration, description, image)
                VALUES (:sectionsview, :sectionsname, :sectionsid, :sectionsduration, :sectionsdescription, :sectionsimage)";

        $result = $dbh->prepare($sql);

        $result->bindValue('sectionsview', $_POST['sectionsview'], PDO::PARAM_INT);
        $result->bindValue('sectionsname', $_POST['sectionsname'], PDO::PARAM_STR);
        $result->bindValue('sectionsid', $_POST['sectionsid'], PDO::PARAM_INT);
        $result->bindValue('sectionsduration', $_POST['sectionsduration'], PDO::PARAM_STR);
        $result->bindValue('sectionsdescription', $_POST['sectionsdescription'], PDO::PARAM_STR);
        $result->bindValue('sectionsimage', $_FILES['sectionsimage']['name'], PDO::PARAM_STR);

        $result->execute();
    }
    catch(PDOException $e) {
        die('Error SQL : '.$e->getMessage());
    }

    if(!empty($_FILES['sectionsimage'])) {
        move_uploaded_file($_FILES['sectionsimage']['tmp_name'], '../images/sections/'.$_FILES['sectionsimage']['name'].'');

        header('location: ../admin.php');
    }
} else {
    header('location: ../login.html');
}

