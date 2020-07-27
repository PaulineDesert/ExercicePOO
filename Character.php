<?php

class Character
{

    private $health;
    private $rage;

    public function __construct($healthValue, $rageValue)
    {
        $this->health = $healthValue;
        $this->rage = $rageValue;
    }

    public function getHealth()
    {
        return $this->health;
    }

    public function getRage()
    {
        return $this->rage;
    }

    public function setHealth($healthValue)
    {
        return $this->health = $healthValue;
    }

    public function setRage($rageValue)
    {
        return $this->rage = $rageValue;
    }
}
