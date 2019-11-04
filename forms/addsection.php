<?php
session_start();

require '../lib/db.php';

$dbh = db();

try {
    $sql = "SELECT categories.id,
                   categories.name
            FROM categories
            ORDER BY categories.name ASC";

    $result = $dbh->prepare($sql);
    $result->execute();
}
catch(PDOException $e) {
    die('Error SQL : '.$e->getMessage());
}

?>
<link rel="stylesheet" href="../css/bootstrap.css">

<!-- SECURISATION -->
<?php if(isset($_SESSION['login']) && $_SESSION['level'] == 'Administrateur') : ?>
<h2>Ajouter une nouvelle section</h2>
    <form action="../actions/addsection.php" method="post" enctype="multipart/form-data" class="form-control">
        <div class="form-group">
            <label for="sectionsview">Afficher la section</label>
            <select name="sectionsview" id="sectionsview" required class="form-control">
                <option value="1" selected>Afficher</option>
                <option value="0">Masquer</option>
            </select>
        </div>

        <div class="form-group">
            <label for="sectionsname">Nom de la section</label>
            <input type="text" id="sectionsname" name="sectionsname" required class="form-control">
        </div>

        <div class="form-group">
            <label for="sectionsid">Afficher la section</label>
            <select name="sectionsid" id="sectionsid" required class="form-control">
                <?php while($row = $result->fetch(PDO::FETCH_OBJ)) : ?>
                <option value="<?= $row->id ?>"><?= $row->name ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="sectionsduration">Durée</label>
            <input type="text" id="sectionsduration" name="sectionsduration" required class="form-control">
        </div>

        <div class="form-group">
            <label for="sectionsdescription">Description</label>
            <input type="text" id="sectionsdescription" name="sectionsdescription" required class="form-control">
        </div>

        <div class="form-group">
            <label for="sectionsimage">Image</label>
            <input type="file" id="sectionsimage" name="sectionsimage" class="form-control" required>
        </div>

        <input type="submit" value="Ajoutez" class="form-control btn btn-primary">

    </form>
<?php else : ?>
<?php header('location: ../login.html'); ?>
<?php endif; ?>