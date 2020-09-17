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
        public function getCategoryWiseNews($cat_id, $start, $count){
            $args = array(
                'where' => array(
                    "status" => 'active',
                    'cat_id' => $cat_id
                ),
                'order_by' => "id DESC",
                'limit' => $start.", ".$count
            );
            return $this->select($args);
        }
        public function getStatewiseNews($state){
            $args = array(
                'where' => array(
                    "status" => 'active',
                    'state' => $state
                ),
                'order_by' => "id DESC",
                'limit' => "0,5"
            );
            return $this->select($args);
        }
        public function getRelatedNews($cat_id, $id){
            $args = array(
                'where' => " status = 'active' AND cat_id =".$cat_id." AND id != ".$id,
                'order_by' => 'id DESC',
                'limit' => "0, 4"
            );
            return $this->select($args);
        }
        public function getTrendingNews($start,$count){
            $args = array(
                'where' => array(
                    "status" => 'active',
                ),
                'limit' => $start.", ".$count
            );
            return $this->select($args);
        }
    }