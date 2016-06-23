<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 23/06/2016
 * Time: 10:36
 */
?>

<table>
    <?php foreach ($data as $item): ?>
        <tr>
            <td><?= $item->id ?></td>
            <td><?= $item->nom ?></td>
            <td><?= $item->description ?></td>
        </tr>
    <?php endforeach; ?>

<a href="index.php?a=user">USER</a><br>
<a href="index.php?a=artiste">ARTISTE</a>
