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
            //Check for Second Part of the URL
            if(isset($url[1])) {
                //Check to See if Method Exists in Controller
                if(method_exists($this->currentController, $url[1])) {
                    $this->currentMethod = $url[1];
                    //Unset 1 Index
                    unset($url[1]);
                }
            }
            //Get Params
            $this->params = $url ? array_values($url) : [];
            //Call a Callback with an Array of Params
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
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