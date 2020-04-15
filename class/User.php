<?php
   final class User extends Database{

        public function __construct()
        {
            parent::__construct();
            $this->table = "users";
        }
        public function getUserByEmail($email){
            $args = array(
                // 'fields' => ["id", "name", "email"],
                // 'fields' => "id, name, email",
                // "where" => " email = '".$email."' "
                "where" => array(
                    'email' => $email,
                    'status' => 'active'
                )
            );
            return $this->select($args);
        }
    }