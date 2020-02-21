<?php
class Weapon{
    private $name;
    private $damage;
    private $reloadTime;

    /**
     * @param string $name
     */
    public function __construct( string $name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getDamage()
    {
        return $this->damage;
    }

    /**
     * @param int $damage
     */
    public function setDamage( int $damage)
    {
        $this->damage = $damage;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getReloadTime()
    {
        return $this->reloadTime;
    }

    /**
     * @param int $reloadTime
     */
    public function setReloadTime( int $reloadTime)
    {
        $this->reloadTime = $reloadTime;
    }


}