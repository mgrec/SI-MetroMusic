<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 21/06/2016
 * Time: 15:12
 */

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

SELECT ligne FROM est_sur WHERE id_station = (SELECT station FROM groupe WHERE id = 1);

</body>
</html>
