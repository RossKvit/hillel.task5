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

        $teemUnits2[3]->setHealth(150);
        $teemUnits2[4]->setHealth(120);

        $teemUnits1[3]->setDamage(70);
        $teemUnits1[4]->setDamage(80);

        $teem1 = new Teem($teemUnits1);
        $teem2 = new Teem($teemUnits2);
        $teem1->setName('1');
        $teem2->setName('2');

        echo '<div style="display: flex">';
        $teem1->renderInfo();
        $teem2->renderInfo();
        echo '</div>';

        for($i=0;;$i++){
            echo '<br><br> -------- <br> Round '. $i . '<br>';

            $damage1 = $teem1->getDamage();
            $damage2 = $teem2->getDamage();

            $isAnyAliveUnit1 = $teem1->takeDamage($damage2);
            $isAnyAliveUnit2 = $teem2->takeDamage($damage1);

            echo '<div style="display: flex">';
            $teem1->renderInfo();
            $teem2->renderInfo();
            echo '</div>';

            if( !$isAnyAliveUnit1 || !$isAnyAliveUnit2 ){
                $winner = $isAnyAliveUnit2 === false? '1' : '2';
                echo '<br> Teem ' . $winner . ' win !';
                break;
            }
        }

    }
}