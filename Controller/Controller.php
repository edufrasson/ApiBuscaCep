<?php

namespace App\Controller;
use FFI\Exception;

abstract class Controller{

    public static function getResponseAsJSON($data){
        header("Access-Control-Allow-Origin: *");  
        header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Origin, Content-Type, Accept');      
        header("Content-type: application/json; charset=utf-8");
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Pragma: public");      
        
        exit(json_encode($data));
    }
}