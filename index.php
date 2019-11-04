<?php
/*
 * Affichez les catégories sous la forme de vignettes.  Lors d'un clic sur une des vignette, affichez un tableau avec les sections correspondantes à la catégorie.  Si aucune section n'est prévue, affichez un texte de remplacement.
 * Lors d'un hover sur la vignette, affichez dynamiquement le nom de la catégorie.
 * Pour le tableau des sections, reprenez seulement les champs: image, nom de la section, durée et description.  Pour le champ description, utilisez la fonction cutString() fournie dans le fichier tools.php.
 * Utilisez class="table table-hover"
 * */

require_once 'inc/headerindex.inc.php';

require 'lib/db.php';
require 'lib/tools.php';

$dbh = db();

$_GET['cat'] = $_GET['cat'] ?? null;

try {
    $sql = "SELECT categories.name AS categoriesName,
                   categories.image AS categoriesImage
              FROM eval2018.categories
          GROUP BY categoriesName";
} catch (PDOException $e) {
    die('Error SQL : '.$e->getMessage());
}

// REQUETE SECURISE
$result = $dbh->prepare($sql);
$result->execute();
?>

<!-- BOUCLE WHILE -->
<?php while($row = $result->fetch(PDO::FETCH_OBJ)) : ?>
    <a href="?cat=<?= $row->categoriesName ?>"><img src="images/categories/<?= $row->categoriesImage ?>" alt="<?= $row->categoriesName ?>" title="<?= $row->categoriesName ?>"></a>
<?php endwhile; ?>

<?php
try {
    $sql = "SELECT sections.id,
                   sections.name AS sectionsName,
                   sections.categoryId,
                   sections.view,
                   sections.duration,
                   sections.image AS sectionsImage,
                   sections.description,
                   categories.name AS categoriesName,
                   categories.image AS categoriesImage
              FROM eval2018.categories
         LEFT JOIN eval2018.sections
                ON categories.id = categoryId
             WHERE categories.name = :catName AND sections.view = 1";
} catch (PDOException $e) {
    die('Error SQL : '.$e->getMessage());
}

$result = $dbh->prepare($sql);
$result->bindValue('catName', $_GET['cat'], PDO::PARAM_STR);
$result->execute();

$row = $result->fetch(PDO::FETCH_OBJ);

echo '<br><br>';

if(!empty($result) && isset($_GET['cat'])) : ?>
<!-- RECUPERER LE NOM DE LA CATEGORIE -->
<h1><?= !empty($row->categoriesName) ? $row->categoriesName : 'Catégories vide' ?></h1>
<?php if(!empty($row->categoriesName)) : ?>
<table class="table">
    <tr>
        <th>Image</th>
        <th>Nom</th>
        <th>Durée</th>
        <th>Description</th>
    </tr>
<?php while($row = $result->fetch(PDO::FETCH_OBJ)) : ?>
    <tr>
        <td><img src="images/sections/<?= $row->sectionsImage ?>" alt="<?= $row->sectionsImage ?>" title="<?= $row->sectionsImage ?>"></td>
        <td><strong><?= $row->sectionsName ?></strong></td>
        <td style="white-space: nowrap"><?= $row->duration ?></td>
        <td><?= cutString($row->description) ?></td>
    </tr>
<?php endwhile; ?>
</table>
<?php endif; ?>
<?php endif; ?>
<?php
require_once 'inc/footer.inc.php';
