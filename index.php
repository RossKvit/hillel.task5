<?php
spl_autoload_register(function ( $fileName ){
    require_once './core/'.$fileName.'.php';
});


new Game();