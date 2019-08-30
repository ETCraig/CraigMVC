<?php
    //Base Controller
    //Loads the Models and Views
    class Controller {
        //Load Model
        public function model($model) {
            //Require Model File
            require_once '../app/models/' . $model . '.php';
            //Instantiate Model
            return new $model();
        }

        //Load View
        public function view($view, $data = []) {
            //Check for View File
            if(file_exists('../app/views/' . $view . '.php')) {
                require_once '../app/views/' . $view . '.php';
            } else {
                //View Does Not Exists
                die('View Does Not Exist.');
            }
        }
    }