<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/Conn.class.php');
require_once('../model/dao/AjusteDataHoraDAO.class.php');
/**
 * Description of FotoAbordDAO
 *
 * @author anderson
 */
class FotoAbordDAO extends Conn {
    //put your code here
    
    public function verifFoto($idCabec, $foto) {

        $select = " SELECT "
                . " COUNT(*) AS QTDE "
                . " FROM "
                . " PST_ABORD_FOTO "
                . " WHERE "
                . " NAME LIKE '" . $foto->nameFoto . "'"
                . " AND "
                . " DTHR_CEL = TO_DATE('" . $foto->dthrFotoAbord . "','DD/MM/YYYY HH24:MI') "
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

    public function insFoto($idCabec, $foto) {

        $ajusteDataHoraDAO = new AjusteDataHoraDAO();

        $sql = "INSERT INTO PST_ABORD_FOTO ("
                . " ABORD_CABEC_ID "
                . " , IMAGE "
                . " , NAME "
                . " , DTHR "
                . " , DTHR_CEL "
                . " , DTHR_TRANS "
                . " ) "
                . " VALUES ("
                . " " . $idCabec
                . " , '" . $foto->fileFoto . "'"
                . " , '" . $foto->nameFoto . "'"
                . " , " . $ajusteDataHoraDAO->dataHoraGMT($foto->dthrFotoAbord)
                . " , TO_DATE('" . $foto->dthrFotoAbord . "','DD/MM/YYYY HH24:MI') "
                . " , SYSDATE "
                . " )";

        $this->Conn = parent::getConn();
        $this->Create = $this->Conn->prepare($sql);
        $this->Create->execute();
    }
    
}
