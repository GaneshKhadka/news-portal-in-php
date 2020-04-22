<?php
    final class GalleryImages extends Database{
        use DataTraits;
        public function __construct()
        {
            parent::__construct();
            $this->table = "gallery_images";
        }
    }