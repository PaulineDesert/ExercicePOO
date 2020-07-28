<?php

class Hero extends Character {

    private $weapon;
    private $weaponDamage;
    private $shield;
    private $shieldValue;
    public function __construct($weaponName, $weaponDamageValue, $healthValue, $rageValue, $shieldName, $shieldTakeValue) {
        parent::__construct($healthValue, $rageValue);
        $this->weapon = $weaponName;
        $this->weaponDamage = $weaponDamageValue;
        $this->shield = $shieldName;
        $this->shieldValue = $shieldTakeValue;
        echo 'Vous venez de créer un héros de ' . $this->getHealth() . ' points de vie, une rage de ' . $this->getRage() . ' avec ' . $this->weapon . ' et ' . $this->shield;
    }

    public function getWeapon()
    {
        return $this->weapon;
    }

    public function getWeaponDamage()
    {
        return $this->weaponDamage;
    }

    public function getShield()
    {
        return $this->shield;
    }

    public function getShieldValue()
    {
        return $this->shieldValue;
    }

    public function setWeapon($weaponName)
    {
        return $this->weapon = $weaponName;
    }

    public function setWeaponDamage($weaponDamageValue)
    {
        return $this->weaponDamage = $weaponDamageValue;
    }

    public function setShield($shieldName)
    {
        return $this->shield = $shieldName;
    }

    public function setShieldValue($shieldTakeValue)
    {
        return $this->shieldValue = $shieldTakeValue;
    }

    public function attacked($attackedValue) {
        return $this->setHealth($this->getHealth() - ($attackedValue - $this->getShieldValue()));
    }

    public function rageRaise() {
        return $this->setRage($this->getRage() + 30);
    }

}