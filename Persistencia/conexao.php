<?php

class Conexao{
    /**
     * @var resource
     */
    
    private static $instance;
    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = pg_connect('host=localhost dbname=mvcBasico port=5432 user=postgres password=ipm@1234567');
        }
        return self::$instance; 
    }
}


