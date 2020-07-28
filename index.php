<?php

require 'Character.php';
require 'Hero.php';
require 'Orc.php';

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FightPOO</title>
</head>

<body>

    <p><?php $hero = new Hero('Excalibur', 250, 2000, 0, 'Bouclier de Doran', 600); ?></p>
    <p><?php $orc = new Orc(500, 0); ?></p>

    <?php

        while ($hero->getHealth() > 0) {     
            
    ?>

    <p>Vie : <?= $hero->getHealth() ?></p>
    <p>Bouclier : <?= $hero->getShieldValue() ?></p>
    <p>Rage : <?= $hero->getRage() ?></p>
    <p>L'orc vous a causé <?= $orc->attackOrc() ?> de dommage. </p>
    <?php $hero->attacked($orc->getDamage()) ?>

    <?php 

        if ($hero->getHealth() < 0) {
            echo 'Vous êtes mort !';
        } else {
            echo 'Il vous reste plus que ' . $hero->getHealth() . ' points de vie';
        }
    }
        
    ?>

</body>

</html>