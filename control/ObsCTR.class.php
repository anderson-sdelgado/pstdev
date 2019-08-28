<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../control/TipoObsDAO.class.php');
require_once('../control/TopicoObsDAO.class.php');
require_once('../control/QuestaoObsDAO.class.php');
/**
 * Description of ObservacaoCTR
 *
 * @author anderson
 */
class ObsCTR {
    //put your code here
    
    public function dadosTipo($versao) {

        $versao = str_replace("_", ".", $versao);
        
        $tipoObsDAO = new TipoObsDAO();
        
        if($versao >= 1.00){
        
            $dados = array("dados" => $tipoObsDAO->dados());
            $json_str = json_encode($dados);

            return $json_str;
            
        }
        
    }
    
    public function dadosTopico($versao) {

        $versao = str_replace("_", ".", $versao);
        
        $topicoObsDAO = new TopicoObsDAO();
        
        if($versao >= 1.00){
        
            $dados = array("dados" => $topicoObsDAO->dados());
            $json_str = json_encode($dados);

            return $json_str;
            
        }
        
    }
    
    public function dadosQuestao($versao) {

        $versao = str_replace("_", ".", $versao);
        
        $questaoObsDAO = new QuestaoObsDAO();
        
        if($versao >= 1.00){
        
            $dados = array("dados" => $questaoObsDAO->dados());
            $json_str = json_encode($dados);

            return $json_str;
            
        }
        
    }
    
}
