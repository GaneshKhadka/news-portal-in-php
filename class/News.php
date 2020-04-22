<?php
    final class News extends Database{
        use DataTraits;
        public function __construct()
        {
            parent::__construct();
            $this->table = "news";
        }
    }