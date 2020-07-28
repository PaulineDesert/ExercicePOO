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
    <p><?php $orc = new Orc(750, 0); ?></p>

    <?php

        while ($hero->getHealth() > 0 && $orc->getHealth() > 0) {     
            
    ?>

    <p>Vie : <?= $hero->getHealth() ?></p>
    <p>Bouclier : <?= $hero->getShieldValue() ?></p>

    <?php

        $hero->rageRaise();

        if ($hero->getRage() > 100) {
            
    ?>

    <p>Le héro attaque</p>

    <?php

            $orc->setHealth($orc->getHealth() - $hero->setWeaponDamage($hero->getWeaponDamage()));
            if ($orc->getHealth() <= 0) {
                echo 'L\'orc est mort';
            } else {
                echo 'L\'orc n\'a plus que ' . $orc->getHealth() . ' points de vie.';
            }
        } else {

    ?>

    <p>Rage : <?= $hero->getRage() ?></p>

    <?php

        }

    ?>

    <p>L'orc vous a causé <?= $orc->attackOrc() ?> de dommage. </p>
    <?php $hero->attacked($orc->getDamage()) ?>

    <?php 

        if ($hero->getHealth() < 0) {
            echo 'Vous êtes mort !<hr>';
        } else {
            echo 'Il vous reste plus que ' . $hero->getHealth() . ' points de vie<hr>';
        }
    }
        
    ?>

</body>

</html>