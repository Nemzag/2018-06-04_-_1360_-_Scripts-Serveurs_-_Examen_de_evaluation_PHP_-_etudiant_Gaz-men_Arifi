<?php
session_start();

// var_dump($_SESSION);

// SECURISATION CONTRE LES HACKERS, CODE INVISIBLE
if(isset($_SESSION['login']) && $_SESSION['level'] == 'Administrateur') : ?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0">
    <title>IEPSCF - ADMIN</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">IDENTIFIANT ICI</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="">Sections</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Catégories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Users</a>
            </li>
        </ul>
        <div class="form-inline my-2 my-lg-0">
            <a class="btn btn-primary" href="index.php" role="button">Website
            </a>&nbsp;&nbsp;
            <a class="btn btn-danger" href="actions/out.php" role="button">Logout
            </a>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Administration [ <a href="forms/addsection.php">Ajouter une section</a> ]</h2>

<?php else : ?>
<?php header('location: login.html'); ?>
<?php endif; ?>
