<?php

class Request {
    
    public $url; // url appelée par l'utilisateur

    function __construct(){
       $this->url = $_SERVER['PATH_INFO'];
        
    }
}
