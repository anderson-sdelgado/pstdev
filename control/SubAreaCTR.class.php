<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../model/dao/SubAreaDAO.class.php');
/**
 * Description of CentroCustoCTR
 *
 * @author anderson
 */
class SubAreaCTR {
    //put your code here
    
    public function dados($versao) {

        $versao = str_replace("_", ".", $versao);
        
        $subAreaDAO = new SubAreaDAO();
        
        if($versao >= 1.00){
        
            $dados = array("dados" => $subAreaDAO->dados());
            $json_str = json_encode($dados);

            return $json_str;
            
        }
        
    }
    
}
