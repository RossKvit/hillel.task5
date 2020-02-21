<?php
$corePath = './core/';
$files = array(
    'Weapon',
    'Soldier',
    'Commander',
    'Equipment',
    'Teem',
    '../Game'
);

foreach( $files as $file ){
    require_once $corePath.$file.'.php';
}

new Game();