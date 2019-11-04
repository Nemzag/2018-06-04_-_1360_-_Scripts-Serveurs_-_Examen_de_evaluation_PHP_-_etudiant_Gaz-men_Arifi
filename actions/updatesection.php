<?php
/*
 * Créez le script d'update de fichier et d'upload d'images
 * On supprime l'ancien fichier dans le dossier images et on retourne sur l'admin.php
 */
session_start();

// SECURISATION CONTRE LES HACKERS, CODE INVISIBLE
if(isset($_SESSION['login']) && $_SESSION['level'] == 'Administrateur') {

    require '../lib/db.php';

    $dbh = db();

    try {
        $sql = "UPDATE sections
                SET view = :sectionsview,
                    name = :sectionsname,
                    categoryId = :sectionscategoryid,
                    duration = :sectionsduration,
                    description = :sectionsdescription,
                    image = :sectionsimage            
                WHERE sections.id = :sectionsid";

        $result = $dbh->prepare($sql);

        $result->bindValue('sectionsid', $_POST['sectionsid'], PDO::PARAM_INT);
        $result->bindValue('sectionsview', $_POST['sectionsview'], PDO::PARAM_INT);
        $result->bindValue('sectionsname', $_POST['sectionsname'], PDO::PARAM_STR);
        $result->bindValue('sectionscategoryid', $_POST['sectionscategoryid'], PDO::PARAM_INT);
        $result->bindValue('sectionsduration', $_POST['sectionsduration'], PDO::PARAM_STR);
        $result->bindValue('sectionsdescription', $_POST['sectionsdescription'], PDO::PARAM_STR);
        $result->bindValue('sectionsimage', !empty($_FILES['sectionsimage']) ? $_FILES['sectionsimage']['name'] : $_POST['sectionsimageoriginel'], PDO::PARAM_STR);

        $result->execute();
    }
    catch (PDOException $e) {
        die('Error SQL : '.$e->getMessage());
    }

    if(!empty($_FILES['sectionsimage'])) {
        move_uploaded_file($_FILES['sectionsimage']['tmp_name'], '../images/sections/'.$_FILES['sectionsimage']['name'].'');

        // JE NE FAIS PAS LA BOUCLE POUR L'UNLINK DE L'IMAGE (QUI EFFACE QU'EN ON NE MET RIEN OU LA MEME) COMME ON A PAS OBTENUE TA VERSION CORRIGEE...

        header('location: ../admin.php');
    }
} else {
    header('location: ../login.html');
}