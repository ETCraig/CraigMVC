<?php   
    //To Define a Class
    class User {
        //Properties (attributes)
        public $name;
        //Methods (functions)
        public function sayHello() {
            return $this->name .' Says Hello Worlds';
        }
    }

    //Instantiate a User Object from the User Class
    $user1 = new User();
    $user1->name = 'Ethan';

    echo $user1->name;
    echo '<br>';
    echo $user1->sayHello();
    echo '<br>';

    //Create new User
    $user2 = new user();
    $user2->name = 'Phil';

    echo $user2->name;
    echo '<br>';
    echo $user2->sayHello();