<?php 
    class User extends Controller {
        public function __construct() {

        }

        public function register() {
            //Check for Posts
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                //Process Form
            } else {
                //Init Data
                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_error' => '',
                    'email_error' => '',
                    'password_error' => '',
                    'confirm_pass_error' => ''
                ];
                //Load View
                $this->view('users/register', $data);
            }
        }

        public function LOGIN() {
            //Check for Posts
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                //Process Form
            } else {
                //Init Data
                $data = [
                    'email' => '',
                    'password' => '',
                    'email_error' => '',
                    'password_error' => '',
                ];
                //Load View
                $this->view('users/login', $data);
            }
        }
    }