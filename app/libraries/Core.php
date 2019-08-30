<?php   
    //App Core Class
    //Creates URL & Loads Core Controller
    //URL Format - /controller/method/params
    class Core {
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct() {
            //print_r($this->getUrl());
            $url = $this->getUrl();
            //Look in Controllers for Controller for First value
            if(file_exists('../app/controllers/' . ucwords($url[0]). '.php')) {
                //If Exists .. Set As Controller
                $this->currentController = ucwords($url[0]);
                //Unset 0 Index
                unset($url[0]);
            }
            //Require the Controller
            require_once '../app/controllers/'. $this->currentController . '.php';
            //Instantiate Controller Class
            $this->currentController = new $this->currentController;
        }

        public function getUrl() {
            if(isset($_GET['url'])) {
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return $url;
            }
        }
    }