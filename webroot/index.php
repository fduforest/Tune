<?php

// dirname : nom du directory
// __FILE__ : constante magique de php, Le chemin complet et le nom du fichier courant. 
// Si utilisé pour une inclusion, le nom du fichier inclus est retourné. __FILE__ contient toujours le chemin absolu pour les liens symboliques. 
define('WEBROOT', dirname(__FILE__));
define('ROOT', dirname(WEBROOT));
define('DS', DIRECTORY_SEPARATOR);
define('CORE', ROOT.DS.'core');
//define('BASE_URL', dirname(dirname($_SERVER[__FILE__]))); donne le chemin complet dans le système de fichier tandis
//qu'avec SCRIPT_NAME on démarre a partir du dossier de l'appli
define('BASE_URL', dirname(dirname($_SERVER['SCRIPT_NAME'])));

require CORE.DS.'includes.php';
new Dispatcher();

//   print_r($_SERVER);
//   
//   phpinfo();
//  
//    echo 'WEBROOT: '.WEBROOT.'<br/>';
//    echo 'ROOT: '.ROOT.'<br/>';
//    echo 'CORE: '.CORE.'<br/>';
//    echo 'BASE_URL: '.BASE_URL.'<br/>';  
//    print_r($_SERVER) ;
//    //echo dirname(__FILE__);