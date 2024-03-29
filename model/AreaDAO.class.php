<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/Conn.class.php');
/**
 * Description of AreaDAO
 *
 * @author anderson
 */
class AreaDAO extends Conn {
    //put your code here
    
    public function dados() {

        $select = " SELECT "
                    . " ABORDAREA_ID AS \"idArea\" "
                    . " , DESCR AS \"descrArea\" "
                . " FROM " 
                    . " VST_ABORD_AREA " 
                . " ORDER BY " 
                    . " ABORDAREA_ID "
                . " ASC ";
        
        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        return $result;
        
    }
    
}
