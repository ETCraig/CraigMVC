<?php
    class Pages extends Controller {
        public function __construct() {
            
        }

        public function index() {
            $data = [
                'title' => 'Craig-MVC',
                'description' => 'Simple Social Network Built on the Craig-MVC PHP Framework.'
            ];

            $this->view('pages/Index', $data);
        }

        public function about() {
            $data = [
                'title' => 'About Us',
                'description' => 'App to Share Posts With Other Users.'
            ];
            $this->view('pages/About', $data);
        }
    }