<?php

class Teem{
    private $health;
    private $damage;
    private $units;
    private $name;

    public function __construct( array $units )
    {
        $this->initUnits( $units );
        $this->updateDamage();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName( string $name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getHealth()
    {
        return $this->health;
    }

    /**
     * @return void
     */
    private function updateHealth()
    {
        $this->health = 0;
        foreach( $this->units as $unit ){
            $this->health += $unit->getHealth();
        }
        $this->health = (int) $this->health;
    }

    /**
     * @return mixed
     */
    public function getDamage()
    {
        return $this->damage;
    }

    /**
     * @return void
     */
    private function updateDamage()
    {
        $this->damage = 0;
        foreach( $this->units as $unit ){
            $this->damage += $unit->getDamage();
        }
    }

    /**
     * @return array
     */
    public function getUnits()
    {
        return $this->units;
    }

    /**
     * @param Soldier $unit
     */
    public function addUnit( Soldier $unit )
    {
        $this->units[] = $unit;
    }

    private function initUnits( array $units )
    {
        foreach( $units as $unit ){
            if( get_class($unit) === 'Soldier' || get_class($unit) === 'Commander' ){
                $this->addUnit( $unit );
                $this->health += $unit->getHealth();
            }
        }
    }

    public function takeDamage( int $damage ){
        if( count( $this->units ) === 0 ){
            return false;
        }
        $damagePerUnit = $damage / count( $this->units );
        $this->health = $this->health - $damage;

        foreach( $this->units as $key => $unit ){
            $isAlive = $unit->takeDamage( $damagePerUnit );
            if( !$isAlive ){
                unset( $this->units[$key] );
            }
        }
        $this->updateDamage();
        $this->updateHealth();

        return true;
    }

    public function renderInfo(){
        echo '<div>';
        $name = $this->name;
        echo "<br>Team $name";
        echo "<br><< Damage team $name: $this->damage >><br>";

        foreach( $this->units as $key => $unit ) {
            echo $unit->getName() . '(health): ' . $unit->getHealth() . '<br>';
        }

        echo "<< Health team $name: $this->health >><br>";
        echo '</div>';
    }

}