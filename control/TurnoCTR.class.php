<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../model/dao/TurnoDAO.class.php');
/**
 * Description of TurnoCTR
 *
 * @author anderson
 */
class TurnoCTR {
    //put your code here
    
    public function dados($versao) {

        $versao = str_replace("_", ".", $versao);
        
        $turnoDAO = new TurnoDAO();
        
        if($versao >= 1.00){
        
            $dados = array("dados" => $turnoDAO->dados());
            $json_str = json_encode($dados);

            return $json_str;
            
        }
        
    }
    
}
