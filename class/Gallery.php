<?php
    final class Gallery extends Database{
        use DataTraits;
        public function __construct()
        {
            parent::__construct();
            $this->table = "galleries";
        }
    }