<?php
/*
 * Identification
 * Vérifier la présence du login et la correspondance du password et utilisez les variables session pour l'authentification
 * Ne pourront accéder à l'administration que ceux qui possèdent un niveau Administrateur
 * utilisateurs: le login = password (pat -> pat ou doe -> doe)
 * En cas de non correspondance, l'utilisateur est renvoyé au formulaire
 * */

session_start();

require '../lib/db.php';

$dbh = db();

try {
    $sql = "SELECT users.login,
                   users.password,
                   users.level
            FROM users
            WHERE users.login = :login";

    $result = $dbh->prepare($sql);
    $result->bindValue('login', $_POST['login'], PDO::PARAM_STR);
    $result->execute();

} catch (PDOException $e) {
    die('Error SQL : '.$e->getMessage());
}

$row = $result->fetch(PDO::FETCH_OBJ);

// VERIFICATION PRESENCE
if($result->rowCount()) {

    // BOUCLE DE VERIFICATION DE PASSWORD
    if(password_verify($_POST['password'], $row->password) && ($row->level == 'Administrateur'))
    {
        $_SESSION['login'] = $row->login;
        $_SESSION['level'] = 'Administrateur';
        // var_dump($_SESSION['login']);
        header('location: ../admin.php');

        // VERIFICATION NIVEAU DEVELOPPEUR
    }
    elseif(password_verify($_POST['password'], $row->password) && ($row->level == 'Développeur'))
    {
        $_SESSION['login'] = $row->login;
        $_SESSION['level'] = 'Développeur';
        header('location: ../index.php');
    }
        // VERIFICATION NIVEAU VISITEUR
    elseif(password_verify($_POST['password'], $row->password) && ($row->level == 'Visiteur'))
    {
        $_SESSION['login'] = $row->login;
        $_SESSION['level'] = 'Visiteur';
         header('location: ../index.php');
    }
    else
    {
        header('location: ../login.html');
    }
} else {
    header ('location: ../login.html');
}
