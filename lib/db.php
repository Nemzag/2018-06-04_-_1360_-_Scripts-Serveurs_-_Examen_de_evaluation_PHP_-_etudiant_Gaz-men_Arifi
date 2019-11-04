<?php
// Créez une fonction de connexion (db)

function db()
{
    try
    {
        $dbh = new PDO('mysql:dbname=eval2018;host=localhost;charset=utf8', 'root', '');
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (Exception $e)
    {
        die('Error : '.$e->getMessage());
    }

    return $dbh;
}