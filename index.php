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

// REQUETE CATEGORIE
try {
    $sql = "SELECT 2018_06_07_evaluation.categories.name AS categoriesName,
                   2018_06_07_evaluation.categories.image AS categoriesImage
              FROM 2018_06_07_evaluation.categories
          GROUP BY categoriesName
          ORDER BY categoriesName";
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

<!-- REQUETE SECTION -->
<?php
try {
    $sql = "SELECT 2018_06_07_evaluation.sections.id,
                   2018_06_07_evaluation.sections.name AS sectionsName,
                   2018_06_07_evaluation.sections.categoryId,
                   2018_06_07_evaluation.sections.view,
                   2018_06_07_evaluation.sections.duration,
                   2018_06_07_evaluation.sections.image AS sectionsImage,
                   2018_06_07_evaluation.sections.description,
                   2018_06_07_evaluation.categories.name AS categoriesName,
                   2018_06_07_evaluation.categories.image AS categoriesImage
              FROM 2018_06_07_evaluation.categories
         LEFT JOIN 2018_06_07_evaluation.sections
                ON 2018_06_07_evaluation.categories.id = categoryId
             WHERE 2018_06_07_evaluation.categories.name = :catName AND 2018_06_07_evaluation.sections.view = 1";
    // ALT+ENTER POUR LANCER LA REQUETE ET LA TESTER.
} catch (PDOException $e) {
    die('Error SQL : '.$e->getMessage());
}

// REQUETE SECURISE
$result = $dbh->prepare($sql);
$result->bindValue('catName', $_GET['cat'], PDO::PARAM_STR);
$result->execute();

$row = $result->fetch(PDO::FETCH_OBJ); // Le cursor passe à 1
$result->execute(); // Solution, du bug du manquement du premier résultat dans le listing while, j'execute, et je repasse le curseur à 0.

echo '<br><br>';
if(!empty($result) && isset($_GET['cat'])) : ?>
    <!-- Pour eviter l'affichage quand les sections sont vide. -->

    <!-- RECUPERER LE NOM DE LA CATEGORIE -->
    <h3><?= !empty($row->categoriesName) ? $row->categoriesName : 'Catégories vide' ?></h3>
    <?php if(!empty($row->categoriesName)) : ?>
    <table class="table">
        <tr>
            <th>Image</th>
            <th>Nom</th>
            <th>Durée</th>
            <th>Description</th>
        </tr>
    <?php while($row = $result->fetch(PDO::FETCH_OBJ)) : ?> <!-- Le curseur passe à 1 -->
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
