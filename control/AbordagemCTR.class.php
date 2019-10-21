<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../model/dao/CabecAbordDAO.class.php');
require_once('../model/dao/ItemAbordDAO.class.php');
require_once('../model/dao/FotoAbordDAO.class.php');

/**
 * Description of AbordagemCTR
 *
 * @author anderson
 */
class AbordagemCTR {

    //put your code here

    public function salvarDados($versao, $info, $pagina) {

        $cabec = $info['cabec'];
        $item = $info['item'];
        $foto1 = $info['foto1'];
        $foto2 = $info['foto2'];
        $foto3 = $info['foto3'];
        $foto4 = $info['foto4'];
        $pagina = $pagina . '-' . $versao;
//        $this->salvarLog($dados, $pagina);

        $versao = str_replace("_", ".", $versao);

        if ($versao >= 1.00) {

            $jsonObjCabec = json_decode($cabec);
            $jsonObjItem = json_decode($item);
            $jsonObjFoto1 = json_decode($foto1);
            $jsonObjFoto2 = json_decode($foto2);
            $jsonObjFoto3 = json_decode($foto3);
            $jsonObjFoto4 = json_decode($foto4);

            $dadosCabec = $jsonObjCabec->cabec;
            $dadosItem = $jsonObjItem->item;
            $dadosFoto1 = $jsonObjFoto1->foto;
            $dadosFoto2 = $jsonObjFoto2->foto;
            $dadosFoto3 = $jsonObjFoto3->foto;
            $dadosFoto4 = $jsonObjFoto4->foto;
            
            $idCabecBD = $this->salvarCabec($dadosCabec);
            $this->salvarItem($idCabecBD, $dadosItem);
            $this->salvarFoto($idCabecBD, $dadosFoto1);
            $this->salvarFoto($idCabecBD, $dadosFoto2);
            $this->salvarFoto($idCabecBD, $dadosFoto3);
            $this->salvarFoto($idCabecBD, $dadosFoto4);
        }
    }

    private function salvarCabec($dadosCabec) {
        $cabecAbordDado = new CabecAbordDAO();
        foreach ($dadosCabec as $cabec) {
            $v = $cabecAbordDado->verifCabec($cabec);
            if ($v == 0) {
                $cabecAbordDado->insCabec($cabec);
            }
            $idCabecBD = $cabecAbordDado->idCabec($cabec);
        }
        return $idCabecBD;
    }

    private function salvarItem($idBolBD, $dadosItem) {
        $itemAbordDAO = new ItemAbordDAO();
        foreach ($dadosItem as $item) {
            $v = $itemAbordDAO->verifItem($idBolBD, $item);
            if ($v == 0) {
                $itemAbordDAO->insItem($idBolBD, $item);
            }
        }
    }

    private function salvarFoto($idBolBD, $dadosFoto) {
        $fotoAbordDAO = new FotoAbordDAO();
        foreach ($dadosFoto as $foto) {
            $v = $fotoAbordDAO->verifFoto($idBolBD, $foto);
            if ($v == 0) {
                $fotoAbordDAO->insFoto($idBolBD, $foto);
            }
        }
    }

}
