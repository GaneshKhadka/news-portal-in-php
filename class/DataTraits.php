<?php
    trait DataTraits{
        final public function updateData($data, $row_id){
            //
            $args = array(
                'where' => array(
                    'id' => $row_id
                )
            ) ;
            $status = $this->update($data, $args);
            if($status){
                return $row_id;
            }else{
                return false;
            }
        }
    }