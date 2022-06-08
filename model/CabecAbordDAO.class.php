<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/OCI.class.php');
/**
 * Description of CabecAbordDAO
 *
 * @author anderson
 */
class CabecAbordDAO extends OCI {
    //put your code here
    
    public function verifCabec($cabec) {

        $select = " SELECT "
                . " COUNT(*) AS QTDE "
                . " FROM "
                . " PST_ABORD_CABEC "
                . " WHERE "
                . " DTHR_CEL = TO_DATE('" . $cabec->dthrCabecAbord . "','DD/MM/YYYY HH24:MI')"
                . " AND "
                . " MATRIC_FUNC = " . $cabec->matricFuncCabecAbord . " ";

        $this->Conn = parent::getConn();
        $stid = oci_parse($this->Conn, $select);
        oci_execute($stid);

        while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
            foreach ($row as $item) {
                $v = $item[0];
            }
        }

        return $v;
    }

    public function idCabec($cabec) {

        $select = " SELECT "
                . " ID AS ID "
                . " FROM "
                . " PST_ABORD_CABEC "
                . " WHERE "
                . " DTHR_CEL = TO_DATE('" . $cabec->dthrCabecAbord . "','DD/MM/YYYY HH24:MI')"
                . " AND "
                . " MATRIC_FUNC = " . $cabec->matricFuncCabecAbord . " ";

       $this->Conn = parent::getConn();
        $stid = oci_parse($this->Conn, $select);
        oci_execute($stid);

        while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
            foreach ($row as $item) {
                $id = $item[0];
            }
        }

        return $id;
        
    }

    public function insCabec($cabec) {

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
                . " " . $cabec->matricFuncCabecAbord
                . " , " . $cabec->idAreaCabecAbord
                . " , " . $cabec->idSubAreaCabecAbord
                . " , " . $cabec->idTurnoCabecAbord
                . " , " . $cabec->extensaoMinCabecAbord
                . " , " . $cabec->pessoasContCabecAbord
                . " , " . $cabec->pessoasObsCabecAbord
                . " , " . $cabec->tipoCabecAbord
                . " , :comentCabAbord"
                . " , TO_DATE('" . $cabec->dthrCabecAbord . "','DD/MM/YYYY HH24:MI') "
                . " , TO_DATE('" . $cabec->dthrCabecAbord . "','DD/MM/YYYY HH24:MI') "
                . " , SYSDATE "
                . " )";

        $this->Conn = parent::getConn();
        $stmt = oci_parse($this->Conn, $sql);
        oci_bind_by_name($stmt, ":comentCabAbord", $cabec->comentCabAbord);
        oci_execute($stmt);
    }
    
}
