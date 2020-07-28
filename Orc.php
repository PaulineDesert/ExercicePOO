<?php

class Orc extends Character {

    private $damage;

    public function __construct($healthValue, $rageValue) {
        parent::__construct($healthValue, $rageValue);
        echo 'Vous venez de créer un orc qui a ' . $this->getHealth() . ' de points de vie et 0 points de rage.';
    }

    public function getDamage()
    {
        return $this->damage;
    }

    public function setDamage($damageValue)
    {
        return $this->damage = $damageValue;
    }

    public function attackOrc() {
        return $this->setDamage(rand(600, 800));
    }

}