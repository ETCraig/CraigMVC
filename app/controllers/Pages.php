<?php
    class Pages extends Controller {
        public function __construct() {

        }

        public function index() {
            $data = [
                'title' => 'Welcome'
            ];
            $this->view('pages/Index', $data);
        }

        public function about() {
            $this->view('pages/About');
        }
    }