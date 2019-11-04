<?php
session_start();
// var_dump($_SESSION);
?><!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>IEPSCF</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
	</button>
	<a class="navbar-brand" href="#">IEPSCF-NAMUR</a>
	<div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
           <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
        </ul>
    </div>

    <?php if(isset($_SESSION['login'])) : ?>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <div class="form-inline my-2 my-lg-0 ml-auto">

            <a class="btn btn-primary" href="admin.php" role="button">Administration</a>&nbsp;&nbsp;
            <a class="btn btn-danger" href="actions/out.php" role="button">Log‑out</a>

        </div>
    </div>

	<?php else: ?>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">

		<div class="form-inline my-2 my-lg-0 ml-auto"> <!-- my  margin top bottom ; ml = margin left -->
			<a class="btn btn-primary" href="login.html" role="button">Log‑in</a>
		</div>

	</div>

    <?php endif; ?>

</nav>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Nos formations</h2>

