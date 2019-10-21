<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/Conn.class.php');
/**
 * Description of ItemDAO
 *
 * @author anderson
 */
class QuestaoDAO extends Conn {
    //put your code here
    
    public function dados() {

        $select = " SELECT "
                    . " ALQUEST_ID AS \"idQuestao\" "
                    . " , ID_PAI AS \"idTopico\" "
                    . " , CARACTER(UPPER(DESCR)) AS \"descrQuestao\" "
                . " FROM " 
                    . " VST_ABORD_QUEST " 
                . " WHERE "
                    . " NIVEL = 3 " 
                . " ORDER BY " 
                    . " SEQ "
                . " ASC ";
        
        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        return $result;
        
    }
    
}
