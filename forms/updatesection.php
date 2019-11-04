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

try {
    $sql = "SELECT sections.id,
                   sections.name,
                   sections.duration,
                   sections.description,
                   sections.categoryId,
                   sections.image,
                   sections.view
            FROM sections
            WHERE id = :id";

    $resultSection = $dbh->prepare($sql);
    $resultSection->bindValue('id', $_GET['id'], PDO::PARAM_INT);
    $resultSection->execute();

    $row = $resultSection->fetch(PDO::FETCH_OBJ);
}
catch(PDOException $e) {
    die('Error SQL : '.$e->getMessage());
}

?>
    <link rel="stylesheet" href="../css/bootstrap.css">

    <!-- SECURISATION -->
<?php if(isset($_SESSION['login']) && $_SESSION['level'] == 'Administrateur') : ?>
    <h2>Mise à jour de section</h2>
    <form action="../actions/updatesection.php" method="post" enctype="multipart/form-data" class="form-control">

        <!-- ID -->
        <div class="form-group">
            <input type="hidden" id="sectionsid" name="sectionsid" value="<?= $row->id ?>" class="form-control">
        </div>

        <!-- VIEW -->
        <div class="form-group">
            <label for="sectionsview">Afficher la section</label>
            <select name="sectionsview" id="sectionsview" required class="form-control">
                <option value="1" <?= ($row->view == 1) ? 'selected' : ''; ?> selected>Afficher</option>
                <option value="0" <?= ($row->view == 0) ? 'selected' : ''; ?>>Masquer</option>
            </select>
        </div>

        <!-- NOMS -->
        <div class="form-group">
            <label for="sectionsname">Nom de la section</label>
            <input type="text" id="sectionsname" name="sectionsname" value="<?= $row->name ?>" class="form-control" required>
        </div>

        <!-- CATEGORIES -->
        <div class="form-group">
            <label for="sectionscategoryid">Afficher la section</label>
            <select name="sectionscategoryid" id="sectionscategoryid" class="form-control" required>
                <?php while($rowCat = $result->fetch(PDO::FETCH_OBJ)) : ?>
                    <option value="<?= $rowCat->id ?>" <?= ($rowCat->id == $row->categoryId) ? 'selected' : ''; ?>><?= $rowCat->name ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <!-- DURATIONS -->
        <div class="form-group">
            <label for="sectionsduration">Durée</label>
            <input type="text" id="sectionsduration" name="sectionsduration" value="<?= $row->duration ?>" class="form-control" required>
        </div>

        <!-- DESCRIPTIONS -->
        <div class="form-group">
            <label for="sectionsdescription">Description</label>
            <input type="text" id="sectionsdescription" name="sectionsdescription" value="<?= $row->description ?>" class="form-control" required>
        </div>

        <!-- IMAGE -->
        <div class="form-group">
            <label for="sectionsimage">Image</label>
            <input type="file" id="sectionsimage" name="sectionsimage" class="form-control">
        </div>

        <!-- IMAGE ORIGINELLE -->
        <div class="form-group">
            <label for="sectionsimageoriginel">Image Originelle</label>
            <input type="text" id="sectionsimageoriginel" name="sectionsimageoriginel" class="form-control" value="<?= $row->image ?>">
            <div class="form-control">
                <img src="../images/sections/<?= $row->image ?>" alt="" style="height: 5em;">
            </div>
        </div>

        <input type="submit" value="Mettre à jours" class="form-control btn btn-primary">

    </form>
<?php else : ?>
    <?php header('location: ../login.html'); ?>
<?php endif; ?>