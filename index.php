<?php

require 'Character.php';
require 'Hero.php';
require 'Orc.php';

$i = 1
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>FightPOO</title>
</head>

<body>

    <div class="container center">
        <div class="row">
            <div class="col l6 s12">
                <div class="card horizontal z-depth-3">
                    <div class="card-image">
                        <img class="card-img" src="original.gif">
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <p><?php $hero = new Hero('Excalibur', 250, 2000, 0, 'Bouclier de Doran', 600); ?></p>
                        </div>
                        <div class="card-action">
                            <span>Héros</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col l6 s12">
                <div class="card horizontal z-depth-3">
                    <div class="card-image">
                        <img class="card-img" src="thrall.gif">
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <p><?php $orc = new Orc(500, 0); ?></p>
                        </div>
                        <div class="card-action">
                            <span>Orc</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <h1>Résultat des combats :</h1>
            <?php while ($hero->getHealth() > 0 && $orc->getHealth() > 0) { ?>
                <ul class="collection z-depth-3">
                    <li class="collection-item">
                        <h2 class="header">Phase <?= $i++ ?></h2>
                        <p class="green-text lighten-1">Point de Vie : <?= $hero->getHealth() ?></p>
                        <p class="blue-text lighten-1">Point de Bouclier : <?= $hero->getShieldValue() ?></p>
                        <?php
                        $hero->rageRaise();
                        if ($hero->getRage() > 100) {
                        ?>
                            <p class="teal-text">Le héro attaque et inflige <?= $hero->getWeaponDamage() ?> points de dégâts à l'orc. Vous perdez 100 points de rage</p>

                            <?php
                            $orc->setHealth($orc->getHealth() - $hero->setWeaponDamage($hero->getWeaponDamage()));
                            if ($orc->getHealth() <= 0) { ?>
                                <img src="winattackhero.gif" alt="Gif Attaque Heros">
                                <p class="red-text darken-3">L'orc est mort</p>
                            <?php } else { ?>
                                <img src="attackhero.gif" alt="Gif Attaque Heros">
                                <p class="deep-purple-text">L'orc n'a plus que <?= $orc->getHealth() ?> points de vie.</p>
                            <?php $hero->setRage($hero->getRage() - 100);
                            }
                        } else {
                            ?>
                            <p class="orange-text darken-4">Rage : <?= $hero->getRage() ?></p>
                        <?php }
                        if ($orc->getHealth() > 0) {
                        ?>
                            <p class="red-text darken-3">L'orc vous a causé <?= $orc->attackOrc() ?> de dommage. </p>
                            <?php
                            $hero->attacked($orc->getDamage());

                            if ($hero->getHealth() < 0) {
                            ?>
                                <p class="red-text accent-4">Vous êtes mort !</p>
                                <img src="deadhero.gif" alt="Le Héros est mort">
                            <?php } else { ?>
                                <p class="green-text lighten-1">Il vous reste plus que <?= $hero->getHealth() ?> points de vie</p>
                        <?php }
                        }
                        ?>
                    </li>
                </ul>
            <?php } ?>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>