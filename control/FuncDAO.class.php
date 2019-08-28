<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../control/FuncDAO.class.php');
/**
 * Description of FuncDAO
 *
 * @author anderson
 */
class FuncDAO {
    //put your code here
    
    public function dados($versao) {

        $versao = str_replace("_", ".", $versao);
        
        $funcDAO = new FuncDAO();
        
        if($versao >= 1.00){
        
            $dados = array("dados" => $funcDAO->dados());
            $json_str = json_encode($dados);

            return $json_str;
            
        }
        
    }
    
}
