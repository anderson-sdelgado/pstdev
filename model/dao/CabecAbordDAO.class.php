<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/Conn.class.php');
require_once('../model/dao/AjusteDataHoraDAO.class.php');
/**
 * Description of CabecAbordDAO
 *
 * @author anderson
 */
class CabecAbordDAO extends Conn {
    //put your code here
    
    public function verifCabec($cabec) {

        $select = " SELECT "
                . " COUNT(*) AS QTDE "
                . " FROM "
                . " PST_ABORD_CABEC "
                . " WHERE "
                . " DTHR_CEL = TO_DATE('" . $cabec->dthrCabAbord . "','DD/MM/YYYY HH24:MI')"
                . " AND "
                . " MATRIC_FUNC = " . $cabec->matricFuncCabAbord . " ";

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

    public function idCabec($cabec) {

        $select = " SELECT "
                . " ID AS ID "
                . " FROM "
                . " PST_ABORD_CABEC "
                . " WHERE "
                . " DTHR_CEL = TO_DATE('" . $cabec->dthrCabAbord . "','DD/MM/YYYY HH24:MI')"
                . " AND "
                . " MATRIC_FUNC = " . $cabec->matricFuncCabAbord . " ";

        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        foreach ($result as $item) {
            $id = $item['ID'];
        }

        return $id;
    }

    public function insCabec($cabec) {

        $ajusteDataHoraDAO = new AjusteDataHoraDAO();

        $sql = "INSERT INTO PST_ABORD_CABEC ("
                . " MATRIC_FUNC "
                . " , ABORDAREA_ID "
                . " , ABOSUBAREA_ID "
                . " , ABORDTURNO_ID "
                . " , EXTENSAO_MIN "
                . " , QTDE_PESSOA_CONT "
                . " , QTDE_PESSOA_OBS "
                . " , TIPO "
                . " , COMENTARIO "
                . " , DTHR "
                . " , DTHR_CEL "
                . " , DTHR_TRANS "
                . " ) "
                . " VALUES ("
                . " " . $cabec->matricFuncCabAbord
                . " , " . $cabec->idAreaCabAbord
                . " , " . $cabec->idSubAreaCabAbord
                . " , " . $cabec->idTurnoCabAbord
                . " , " . $cabec->extensaoMinCabAbord
                . " , " . $cabec->pessoasContCabAbord
                . " , " . $cabec->pessoasObsCabAbord
                . " , " . $cabec->tipoCabAbord
                . " , '" . $cabec->comentCabAbord . "'"
                . " , " . $ajusteDataHoraDAO->dataHoraGMT($cabec->dthrCabAbord)
                . " , TO_DATE('" . $cabec->dthrCabAbord . "','DD/MM/YYYY HH24:MI') "
                . " , SYSDATE "
                . " )";

        $this->Conn = parent::getConn();
        $this->Create = $this->Conn->prepare($sql);
        $this->Create->execute();
    }
    
    
}
