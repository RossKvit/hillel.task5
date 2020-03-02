<?php

class Game{
    public function __construct()
    {
        $teemUnits1 = array(
            new Soldier('Petr'),
            new Soldier('Ivan'),
            new Soldier('Mike'),
            new Soldier('Sergey'),
            new Soldier('Stanislav'),
            new Soldier('Roma'),
            new Commander( 'Anton'),
        );

        $teemUnits2 = array(
            new Soldier('Sam'),
            new Soldier('Alan'),
            new Soldier('Vova'),
            new Soldier('Taras'),
            new Soldier('Pavel'),
            new Soldier('Maks'),
            new Commander( 'Nikolay'),
        );

        $helmet = new Equipment('helmet');
        $helmet->setAddHealth( 30 );
        $helmet->setProtectedBodyPart( 'head' );

        $vest = new Equipment('bulletproof vest');
        $vest->setAddHealth( 50 );
        $vest->setProtectedBodyPart( 'body' );

        $grenades = new Weapon( 'grenades' );
        $grenades->setDamage( 25 );

        $rifle = new Weapon( 'rifle' );
        $rifle->setDamage( 20 );

        $knife = new Weapon( 'knife' );
        $knife->setDamage( 5 );

        $machineGun = new Weapon( 'machine gun' );
        $machineGun->setDamage( 50 );

        $cannon = new Weapon( 'cannon' );
        $cannon->setDamage( 60 );

        $teemUnits1[1]->addEquipment( $helmet );
        $teemUnits1[5]->addEquipment( $vest );

        $teemUnits1[3]->setActiveWeapon( $cannon );
        $teemUnits1[4]->setActiveWeapon( $knife );

        $teemUnits2[1]->setActiveWeapon( $machineGun );
        $teemUnits2[4]->setActiveWeapon( $grenades );
        $teemUnits2[5]->setActiveWeapon( $rifle );

        $teem1 = new Teem($teemUnits1);
        $teem2 = new Teem($teemUnits2);
        $teem1->setName('1');
        $teem2->setName('2');

        echo '<div style="display: flex">';
        $teem1->renderInfo();
        $teem2->renderInfo();
        echo '</div>';

        for($i=0;;$i++){

            $damage1 = $teem1->getDamage();
            $damage2 = $teem2->getDamage();

            $isAnyAliveUnit1 = $teem1->takeDamage($damage2);
            $isAnyAliveUnit2 = $teem2->takeDamage($damage1);

            if( !$isAnyAliveUnit1 || !$isAnyAliveUnit2 ){
                $winner = $isAnyAliveUnit2 === false? '1' : '2';
                echo '<br> Teem ' . $winner . ' win !';
                break;
            }
            echo '<br><br> -------- <br> Round '. $i . '<br>';

            echo '<div style="display: flex">';
            $teem1->renderInfo();
            $teem2->renderInfo();
            echo '</div>';
        }

    }
}