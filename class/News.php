<?php
    final class News extends Database{
        use DataTraits;
        public function __construct()
        {
            parent::__construct();
            $this->table = "news";
        }
        public function getFeaturedNews($start,$count){
            $args = array(
                'where' => array(
                    "status" => 'active',
                    'is_featured' => 1
                ),
                'limit' => $start.", ".$count
            );
            return $this->select($args);
        }
    }