<?php

class Request {
    
    public $url; // url appelée par l'utilisateur

    
    function __construct(){
       $this->url = pathInfo();
    }
    
    private function pathInfo(){
    if (strlen(getenv('PATH_INFO')) > 1) return rtrim(getenv('PATH_INFO'),'/\\');
    if( array_key_exists('PATH_INFO', $_SERVER) and strlen($_SERVER['PATH_INFO']) ) return rtrim($_SERVER['PATH_INFO'], '/\\');
    if( array_key_exists('ORIG_PATH_INFO', $_SERVER) and strlen($_SERVER['ORIG_PATH_INFO']) )   return rtrim($_SERVER['ORIG_PATH_INFO'], '/\\');
    return rtrim(str_replace(BASEURL, '', current(explode('?',$this->Uri()))), '/\\'); 
    }  
    
}

