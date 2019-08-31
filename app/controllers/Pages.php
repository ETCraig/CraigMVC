<?php
    class Pages extends Controller {
        public function __construct() {
            
        }

        public function index() {
            $data = [
                'title' => 'Craig-MVC'
            ];

            $this->view('pages/Index', $data);
        }

        public function about() {
            $data = [
                'title' => 'About'
            ];
            $this->view('pages/About', $data);
        }
    }