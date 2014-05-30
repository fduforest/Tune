<?php

class Router {
    /**
     * Permet de parser une url 
     * @param type $url Url à parser
     * @return tableau contenant les paramètres
     * //ex:  /pages/view/index (note: normalement ?rlz=1C1GFR343&q=siteduzero)
     */
    static function parse($url, $request) {
        $url = trim($url,'/');
        $params = explode('/',$url);
        //controller 'pages'
        $request->controller = $params[0];
        //action 'view'
        $request->action = isset($params[1]) ? $params[1] : 'index';
        //paramètres: 'index'
        $request->params = array_slice($params, 2);
        return true;
    }
}

