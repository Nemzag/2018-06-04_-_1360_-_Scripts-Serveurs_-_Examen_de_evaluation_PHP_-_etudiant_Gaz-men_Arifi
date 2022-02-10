<?php
// Créez une fonction de connexion (db)

function db()
{
    try
    {
        $dbh = new PDO('mysql:dbname=2018_06_07_evaluation;host=localhost;charset=utf8', 'root', '');
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (Exception $e)
    {
        die('Error : '.$e->getMessage());
    }

    return $dbh;
}