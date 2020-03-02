<?php

class Soldier{
    protected $name;
    protected $weapons;
    protected $equipments;
    protected $health = 100;
    protected $damage = 10;
    protected $activeWeapon;

    /**
     * @param string $name
     */
    public function __construct( string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getWeapons()
    {
        return $this->weapons;
    }

    /**
     * @param mixed $weapons
     */
    public function addWeapon(Weapon $weapon)
    {
        $this->weapons[] = $weapon;
    }

    /**
     * @return mixed
     */
    public function getEquipments()
    {
        return $this->equipments;
    }

    /**
     * @param mixed $equipments
     */
    public function addEquipment(Equipment $equipment)
    {
        $this->equipments[] = $equipment;
        $this->health += $equipment->getAddHealth();

    }

    /**
     * @return mixed
     */
    public function getHealth()
    {
        return $this->health;
    }

    /**
     * @param mixed $health
     */
    public function setHealth(float $health)
    {
        $this->health = $health;
    }

    /**
     * @return mixed
     */
    public function getDamage()
    {
        return $this->damage;
    }

    /**
     * @param mixed $damage
     */
    public function setDamage(int $damage)
    {
        $this->damage = $damage;
    }

    /**
     * @return mixed
     */
    public function getActiveWeapon()
    {
        return $this->activeWeapon;
    }

    /**
     * @param mixed $activeWeapon
     */
    public function setActiveWeapon(Weapon $activeWeapon)
    {
        $this->activeWeapon = $activeWeapon;
        $this->damage += $this->activeWeapon->getDamage();
    }

    public function takeDamage( float $damage ){
        $health = $this->getHealth() - round( $damage, 1 );

        if( $health <= 0 ){
            return false;
        }else{
            $this->setHealth($health);
            return true;
        }
    }

}