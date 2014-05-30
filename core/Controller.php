<?php

/**
 * Description of Controller
 *
 * @author Francois DUFOREST
 */
class Controller {

    private $request;
    //tableau créé afin de passer des variables à la vue
    private $vars = array();
    private $layout = 'default';
    private $rendered = false;

    public function __construct($request) {
        $this->request = $request;
    }

    public function render($view) {

        // ici on vérifie que la vue n'a pas été envoyée 2 x
        if ($this->rendered) {
            return false;
        }
        //extract() vérifie chaque clé afin de contrôler si elle a un nom de variable valide. 
        //Elle vérifie également les collisions avec des variables existantes dans la table des symboles.
        extract($this->vars);

        if (strpos($view, '/') === 0) {
            $view = ROOT . DS . 'view' . $view . '.php';
        } else {
            $view = ROOT . DS . 'view' . DS . $this->request->controller . DS . $view . '.php';
        }

        //ob_start() permet de stocker du contenu sans l'afficher (buffering)
        //ob_start() démarre la temporisation de sortie. Tant qu'elle est enclenchée, aucune donnée, hormis les en-têtes, 
        //n'est envoyée au navigateur, mais temporairement mise en tampon.
        ob_start();
        require($view);
        // ici je récupère contenu stocké dans ob_start() et supprime le buffer
        $content_for_layout = ob_get_clean();
        //require ROOT.DS.'view'.DS.'layout'.DS.'default.php';
        require ROOT . DS . 'view' . DS . 'layout' . DS . $this->layout . '.php';
        $this->rendered = true;
    }

    // fonction permet de remplir le tableau de variables destiné à la vue
    // $value = null permet de specifier que le paramètre ($value) est optionnel
    public function set($key, $value = null) {
        if (is_array($key)) {
            $this->vars += $key;
        } else {
            $this->vars[$key] = $value;
        }
    }

}
