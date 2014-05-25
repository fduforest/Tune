<?php

class Router {
    /**
     * Permet de parser une url 
     * @param type $url Url à parser
     * @return tableau contenant les paramètres
     */
    static function parse($url) {
        $url = trim($url);
        $params = explode('/',$url);
        print_r($params);
    }
}

