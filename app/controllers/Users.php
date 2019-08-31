<?php 
    class Users extends Controller {
        public function __construct() {
            $this->userModel = $this->model('User');
        }

        public function register() {
            //Check for Posts
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                //Process Form
                //Sanitize Post Data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                //Init Data
                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'name_error' => '',
                    'email_error' => '',
                    'password_error' => '',
                    'confirm_pass_error' => ''
                ];
                //Validate Email
                if(empty($data['email'])) {
                    $data['email_error'] = 'Please Enter Email';
                } else {
                    //Check Email
                    if($this->userModel->findUserByEmail($data['email'])) {
                        $data['email_error'] = 'Email is Already in Use';
                    }
                }
                if(empty($data['name'])) {
                    $data['name_error'] = 'Please Enter Name';
                }
                if(empty($data['password'])) {
                    $data['password_error'] = 'Please Enter Password';
                } else if(strlen($data['password']) < 6) {
                    $data['password_error'] = 'Password Must Greater Than 6 Characters';
                }
                if(empty($data['confirm_password'])) {
                    $data['confirm_pass_error'] = 'Please Confirm Password';
                } else {
                    if($data['password'] != $data['password']) {
                        $data['confirm_pass_error'] = 'Passwords Do Not Match';
                    }
                }

                //Check Errors Status
                if(
                    empty($data['email_error']) && 
                    empty($data['name_error']) && 
                    empty($data['password_error']) && 
                    empty($data['confirm_pass_error'])) {
                        //Has Password
                        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                        //Register User
                        if($this->userModel->register($data)) {
                            redirect('users/login');
                        } else {
                            die('Something Went Wrong.');
                        }
                    } else {
                        //Load View with Errors
                        $this->view('users/Register', $data);
                    }
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
                $this->view('users/Register', $data);
            }
        }

        public function login() {
            //Check for Posts
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                //Process Form
                //Sanitize Post Data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                //Init Data
                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_error' => '',
                    'password_error' => '',
                ];
                //Validate Email
                if(empty($data['email'])) {
                    $data['email_error'] = 'Please Enter Email';
                }
                if(empty($data['password'])) {
                    $data['password_error'] = 'Please Enter Password';
                }
                //Check Errors Status
                if(empty($data['email_error']) && empty($data['password_error'])) {
                    die('SUCCESS');
                } else {
                    //Load View with Errors
                    $this->view('users/Login', $data);
                }
            } else {
                //Init Data
                $data = [
                    'email' => '',
                    'password' => '',
                    'email_error' => '',
                    'password_error' => '',
                ];
                //Load View
                $this->view('users/Login', $data);
            }
        }
    }