<?php
    class Posts extends Controller {
        public function __construct() {
            if(!isLoggedIn()) {
                redirect('users/login');
            } 

            $this->postModel = $this->model('Post');
        }
        public function index() {
            //Get posts
            $posts = $this->postModel->getPosts();

            $data = [
                'posts' => $posts
            ];

            $this->view('posts/Index', $data);
        }

        public function add() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                //Sanitize Post
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'user_id' => $_SESSION['user_id'],
                    'title_error' => '',
                    'body_error' => ''
                ];
                //Validate Title
                if(empty($data['title'])) {
                    $data['title_error'] = 'Please Enter Title';
                }
                //Validate Body
                if(empty($data['body'])) {
                    $data['body_error'] = 'Please Enter Body text';
                }
                //Check Error Status
                if(empty($data['title_error']) && empty($data['body_error'])) {
                    if($this->postModel->addPost($data)) {
                        flash('post_message', 'Post Added');
                        redirect('posts');
                    } else {
                        die('Something Went Wrong');
                    }
                } else {
                    //Load View w/ Errors
                    $this->view('posts/add', $data);
                }
            } else {
                $data = [
                    'title' => '',
                    'body' => ''
                ];
    
                $this->view('posts/add', $data);
            }
        }
    }