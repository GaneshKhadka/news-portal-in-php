<?php
   final class User extends Database{

        use DataTraits;
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

        public function getUserByCookieToken($token){
            $args = array(
                // 'fields' => ["id", "name", "email"],
                // 'fields' => "id, name, email",
                // "where" => " email = '".$email."' "
                "where" => array(
                    'remember_token' => $token,
                    'status' => 'active'
                )
            );
            return $this->select($args);
        }
    }