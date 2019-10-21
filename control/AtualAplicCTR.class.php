<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../model/dao/AtualAplicDAO.class.php');
/**
 * Description of AtualAplicativoCTR
 *
 * @author anderson
 */
class AtualAplicCTR {
    //put your code here
    
    public function atualAplic($versao, $info) {

        $versao = str_replace("_", ".", $versao);
        
        if($versao >= 1.00){
        
            $atualAplicDAO = new AtualAplicDAO();

            $jsonObj = json_decode($info['dado']);
            $dados = $jsonObj->dados;

            foreach ($dados as $d) {
                $matricFunc = $d->matricFuncAtual;
                $va = $d->versaoAtual;
            }
            $retorno = 'N';
            $v = $atualAplicDAO->verAtual($matricFunc);
            if ($v == 0) {
                $atualAplicDAO->insAtual($matricFunc, $va);
            } else {
                $result = $atualAplicDAO->retAtual($matricFunc);
                foreach ($result as $item) {
                    $vn = $item['VERSAO_NOVA'];
                    $vab = $item['VERSAO_ATUAL'];
                }
                if ($va != $vab) {
                    $atualAplicDAO->updAtual($matricFunc, $va);
                } else {
                    if ($va != $vn) {
                        $retorno = 'S';
                    }
                }
            }
            
            return $retorno;
            
        }
        
    }
    
}
