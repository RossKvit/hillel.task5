<?php
spl_autoload_register(function ( $fileName ){
    if (file_exists('./core/'.$fileName.'.php')) {
        require_once './core/'.$fileName.'.php';
    } elseif (file_exists( './'.$fileName.'.php')) {
        require_once './'.$fileName.'.php';
    }

});
