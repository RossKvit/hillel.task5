<?php

class Commander extends Soldier{
    protected $health = 110;
    protected $damage = 20;

    /**
     *@param string $name
     */
    public function __construct( string $name )
    {
        parent::__construct( $name );

        $defaultWeapon = new Weapon('pistol');
        $defaultWeapon->setDamage( 30 );
        $defaultWeapon->setReloadTime(5);

        $this->addWeapon( $defaultWeapon );
    }

}