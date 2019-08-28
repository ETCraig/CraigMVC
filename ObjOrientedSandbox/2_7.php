<?php
    class User {
        public $name;
        public $age;
        public static $minPassLength = 6;

        public static function validatePass($pass) {
            if(strlen($pass) >= self::$minPassLength) {
                return true;
            } else {
                return false;
            }
        }
    }

    $password = 'hello there';
    if(User::validatePass($password)) {
        echo 'Password Valid.';
    } else {
        echo 'Password Not Valid.';
    }