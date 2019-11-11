<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/OCI.class.php');
require_once('../model/dao/AjusteDataHoraDAO.class.php');
/**
 * Description of FotoAbordDAO
 *
 * @author anderson
 */
class FotoAbordDAO extends OCI {
    //put your code here
    
    public function verifFoto($idCabec, $foto) {

        $select = " SELECT "
                . " COUNT(*) AS QTDE "
                . " FROM "
                . " PST_ABORD_FOTO "
                . " WHERE "
                . " NAME LIKE 'FOTO_" . $foto->idFotoAbord . "'"
                . " AND "
                . " DTHR_CEL = TO_DATE('" . $foto->dthrFotoAbord . "','DD/MM/YYYY HH24:MI') "
                . " AND "
                . " ABORD_CABEC_ID = " . $idCabec;

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
                . " , empty_blob() "
                . " , 'FOTO_" . $foto->idFotoAbord . "'"
                . " , " . $ajusteDataHoraDAO->dataHoraGMT($foto->dthrFotoAbord)
                . " , TO_DATE('" . $foto->dthrFotoAbord . "','DD/MM/YYYY HH24:MI') "
                . " , SYSDATE "
                . " ) RETURNING image INTO :image";

        $this->OCI = parent::getConn();
        
        $result = oci_parse($this->OCI, $sql);
        $blob = oci_new_descriptor($this->OCI, OCI_D_LOB);
        oci_bind_by_name($result, ":image", $blob, -1, OCI_B_BLOB);
        oci_execute($result, OCI_DEFAULT) or die ("Unable to execute query");

        if(!$blob->save(base64_decode($foto->fotoAbord))) {
            oci_rollback($this->OCI);
        }
        else {
            oci_commit($this->OCI);
        }

        oci_free_statement($result);
        $blob->free();
        
    }
    
}
