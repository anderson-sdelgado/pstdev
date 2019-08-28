<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../control/CentroCustoDAO.class.php');
/**
 * Description of CentroCustoCTR
 *
 * @author anderson
 */
class CentroCustoCTR {
    //put your code here
    
    public function dados($versao) {

        $versao = str_replace("_", ".", $versao);
        
        $centroCustoDAO = new CentroCustoDAO();
        
        if($versao >= 1.00){
        
            $dados = array("dados" => $centroCustoDAO->dados());
            $json_str = json_encode($dados);

            return $json_str;
            
        }
        
    }
    
}
