<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../model/dao/AreaDAO.class.php');
/**
 * Description of AreaCTR
 *
 * @author anderson
 */
class AreaCTR {
    //put your code here
    
    public function dados($versao) {

        $versao = str_replace("_", ".", $versao);
        
        $areaDAO = new AreaDAO();
        
        if($versao >= 1.00){
        
            $dados = array("dados" => $areaDAO->dados());
            $json_str = json_encode($dados);

            return $json_str;
            
        }
        
    }
    
}
