<?php
   final class User extends Database{

        public function __construct()
        {
            parent::__construct();
            $this->table = "users";
        }
        public function getUserByEmail($email){
            $args = array(
                'fields' => "",
                // "where" => " email = '".$email."' "
                "where" => array(
                    'email' => $email 
                )
            );
            return $this->select($args, true);
        }
    }