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

     /* Retorna um valor como um objeto JSON*/
     protected static function setResponseAsJSON($data, $request_status = true)
     {
         $response = array('response_data' => $data, 'response_successful' => $request_status);
        
         header("Access-Control-Allow-Origin: *");  
         header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
         header('Access-Control-Allow-Headers: Origin, Content-Type, Accept');      
         header("Content-type: application/json; charset=utf-8");
         header("Cache-Control: no-cache, must-revalidate");
         header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
         header("Pragma: public");
 
         exit(json_encode($response));
     }

    public static function getExceptionAsJSON(Exception $e){
        $exception = [
            'message' => $e->getMessage(),
            'code' => $e->getCode(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'traceAsString' => $e->getTraceAsString(),
            'previous' => $e->getPrevious(),
        ];

        http_response_code(400);

        header("Access-Control-Allow-Origin: *");  
        header("Content-type: application/json; charset=utf-8");
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Pragma: public");      
        
        exit(json_encode($exception));
    }

    public static function isGET() : void {
        if($_SERVER['REQUEST_METHOD'] !== 'GET')
            throw new Exception("O método de requisição deve ser GET");
    }

    public static function isPOST() : void{
        if($_SERVER['REQUEST_METHOD'] !== 'POST')
            throw new Exception("O método de requisição deve ser POST");
    }

    public static function getIntFromURL($var_get, $var_name = null) : int{
        self::isGET();

        if(!empty($var_get))
            return (int) $var_get;
        else
            throw new Exception("Variável $var_name não identificada.");

    }

    public static function getStringFromURL($var_get, $var_name = null) : string{
        self::isGET();

        if(!empty($var_get))
            return (string) $var_get;
        else
            throw new Exception("Variável $var_name não identificada.");
        
    }
}