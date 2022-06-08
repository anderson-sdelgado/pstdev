<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/Conn.class.php');
/**
 * Description of ItemAbordDAO
 *
 * @author anderson
 */
class ItemAbordDAO extends Conn {
    //put your code here
    
    public function verifItem($idCabec, $item) {

        $select = " SELECT "
                . " COUNT(*) AS QTDE "
                . " FROM "
                . " PST_ABORD_ITEM "
                . " WHERE "
                . " ALQUEST_ID = " . $item->idQuestaoItemAbord
                . " AND "
                . " DTHR_CEL = TO_DATE('" . $item->dthrItemAbord . "','DD/MM/YYYY HH24:MI') "
                . " AND "
                . " ABORD_CABEC_ID = " . $idCabec;

        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        foreach ($result as $item) {
            $v = $item['QTDE'];
        }

        return $v;
    }

    public function insItem($idCabec, $item) {

        $sql = "INSERT INTO PST_ABORD_ITEM ("
                . " ABORD_CABEC_ID "
                . " , ALQUEST_ID "
                . " , QTDE_SEG "
                . " , QTDE_INSEG "
                . " , DTHR "
                . " , DTHR_CEL "
                . " , DTHR_TRANS "
                . " ) "
                . " VALUES ("
                . " " . $idCabec
                . " , " . $item->idQuestaoItemAbord
                . " , " . $item->qtdeSegItemAbord
                . " , " . $item->qtdeInsegItemAbord
                . " , TO_DATE('" . $item->dthrItemAbord . "','DD/MM/YYYY HH24:MI') "
                . " , TO_DATE('" . $item->dthrItemAbord . "','DD/MM/YYYY HH24:MI') "
                . " , SYSDATE "
                . " )";
        
        $this->Conn = parent::getConn();
        $this->Create = $this->Conn->prepare($sql);
        $this->Create->execute();
    }
    
}
