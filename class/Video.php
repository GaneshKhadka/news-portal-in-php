<?php
    final class Video extends Database{
        use DataTraits;
        public function __construct()
        {
            parent::__construct();
            $this->table = "videos";
        }
        public function getVideos($start,$count){
            $args = array(
                'where' => array(
                    "status" => 'active'
                ),
                'limit' => $start.", ".$count
            );
            return $this->select($args);
        }
    }