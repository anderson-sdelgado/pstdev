<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/Conn.class.php');
/**
 * Description of CentroCustoDAO
 *
 * @author anderson
 */
class SubAreaDAO extends Conn {
    //put your code here
    
    public function dados() {

        $select = " SELECT "
                    . " ABOSUBAREA_ID AS \"idSubArea\" "
                    . " , ABORDAREA_ID AS \"idArea\" "
                    . " , DESCR AS \"descrSubArea\" "
                . " FROM " 
                    . " VST_ABORD_SUB_AREA " 
                . " ORDER BY " 
                    . " ABOSUBAREA_ID "
                . " ASC ";
        
        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        return $result;
        
    }
    
}
