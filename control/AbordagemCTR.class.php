<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../model/CabecAbordDAO.class.php');
require_once('../model/ItemAbordDAO.class.php');
require_once('../model/FotoAbordDAO.class.php');

/**
 * Description of AbordagemCTR
 *
 * @author anderson
 */
class AbordagemCTR {

    public function salvarDados($body) {
        $idCabecArray = array();
        $cabecArray = json_decode($body);
        foreach($cabecArray as $cabec){
            $this->salvarCabec($cabec);
            $idCabecBD = $this->salvarCabec($cabec);
            $this->salvarItem($idCabecBD, $cabec->itemAbordBeanList);
            $this->salvarFoto($idCabecBD, $cabec->fotoAbordBeanList);
            $idCabecArray[] = array("idCabecAbord" => $cabec->idCabecAbord);
        }
        return $idCabecArray;
    }
    
    private function salvarCabec($cabec) {
        $cabecAbordDado = new CabecAbordDAO();
        $v = $cabecAbordDado->verifCabec($cabec);
        if ($v == 0) {
            $cabecAbordDado->insCabec($cabec);
        }
        return $cabecAbordDado->idCabec($cabec);
    }

    private function salvarItem($idCabecBD, $dadosItem) {
        $itemAbordDAO = new ItemAbordDAO();
        foreach ($dadosItem as $item) {
            $v = $itemAbordDAO->verifItem($idCabecBD, $item);
            if ($v == 0) {
                $itemAbordDAO->insItem($idCabecBD, $item);
            }
        }
    }

    private function salvarFoto($idCabecBD, $dadosFoto) {
        $fotoAbordDAO = new FotoAbordDAO();
        foreach ($dadosFoto as $foto) {
            $v = $fotoAbordDAO->verifFoto($idCabecBD, $foto);
            if ($v == 0) {
                $fotoAbordDAO->insFoto($idCabecBD, $foto);
            }
        }
    }

}
