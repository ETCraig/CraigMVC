<?php
    class User {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }
        //Find User by Email
        public function findUserByEmail($email) {
            $this->db->query('SELECT * FROM users WHERE email = :email');
            //Bind Value
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            //Check Row
            if($this->db->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }
        //Register User
        public function register($data) {
            $this->db->query('INSERT INTO users (name, email, password) Values(:name, :email, :password)');
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            //Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }