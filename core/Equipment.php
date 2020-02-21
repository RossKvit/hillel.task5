<?php
class Equipment{
    private $name;
    private $AddHealth;
    private $protectedBodyPart;


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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getAddHealth()
    {
        return $this->AddHealth;
    }

    /**
     * @param int $AddHealth
     */
    public function setAddHealth( int $AddHealth)
    {
        $this->AddHealth = $AddHealth;
    }

    /**
     * @return string
     */
    public function getProtectedBodyPart()
    {
        return $this->protectedBodyPart;
    }

    /**
     * @param string $protectedBodyPart
     */
    public function setProtectedBodyPart( string $protectedBodyPart)
    {
        $this->protectedBodyPart = $protectedBodyPart;
    }
}