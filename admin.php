<?php

require_once 'inc/headeradmin.php';

// SECURISATION DU SCRIPT, INACCESSIBLE SANS LOGIN

if(isset($_SESSION['login']) && $_SESSION['level'] == 'Administrateur') {

// VOTRE ADMIN ICI

require 'lib/db.php';

$dbh = db();

$sql = "SELECT sections.image,
               sections.name AS sectionsName,
               categories.name AS categoriesName,
               sections.id,
               sections.duration,
               sections.view
        FROM eval2018.sections
        LEFT JOIN categories on sections.categoryId = categories.id
        ORDER BY sections.name";

$result = $dbh->prepare($sql);
$result->execute();

if(!empty($result)) : ?>
        <table class="table">
            <tr>
                <th>Image</th>
                <th>Nom</th>
                <th>Catégorie</th>
                <th>Durée</th>
                <th>Del</th>
                <th>Maj</th>
                <th>View</th>
            </tr>
            <?php while($row = $result->fetch(PDO::FETCH_OBJ)) : ?>
                <tr>
                    <td><img src="images/sections/<?= $row->image ?>" alt="<?= $row->image ?>" title="<?= $row->image ?>"></td>
                    <td><strong><?= $row->sectionsName ?></strong></td>
                    <td><?= $row->categoriesName ?></td>
                    <td style="white-space: nowrap"><?= $row->duration ?></td>
                    <td><a href="actions/delsection.php?id=<?= $row->id ?>&image=<?= $row->image ?>">Del</a></td>
                    <td><a href="forms/updatesection.php?id=<?= $row->id ?>&image=<?= $row->image ?>">Maj</a></td>
                    <td><a href="actions/viewsection.php?id=<?= $row->id ?>&view=<?= $row->view == 1 ? 0 : 1 ?>"><?= ($row->view == 1) ? 'Masquer' : 'Afficher'; ?></a></td>
                </tr>
            <?php endwhile; ?>
        </table>
<?php endif; ?>


<?php
require_once 'inc/footer.inc.php';
}
/*
else {
    header('location: login.html');
}
*/
