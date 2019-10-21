<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/Conn.class.php');
/**
 * Description of TurnoDAO
 *
 * @author anderson
 */
class TurnoDAO extends Conn {
    //put your code here
    
    public function dados() {

        $select = " SELECT "
                    . " ABORDTURNO_ID AS \"idTurno\" "
                    . " , CARACTER(UPPER(DESCR)) AS \"descrTurno\" "
                . " FROM " 
                    . " VST_ABORD_TURNO " 
                . " ORDER BY " 
                    . " ABORDTURNO_ID "
                . " ASC ";
        
        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        return $result;
        
    }
    
}
