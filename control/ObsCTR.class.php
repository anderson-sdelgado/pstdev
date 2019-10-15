<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../model/dao/TipoDAO.class.php');
require_once('../model/dao/TopicoDAO.class.php');
require_once('../model/dao/QuestaoDAO.class.php');
/**
 * Description of ObservacaoCTR
 *
 * @author anderson
 */
class ObsCTR {
    //put your code here
    
    public function dadosTipo($versao) {

        $versao = str_replace("_", ".", $versao);
        
        $tipoDAO = new TipoDAO();
        
        if($versao >= 1.00){
        
            $dados = array("dados" => $tipoDAO->dados());
            $json_str = json_encode($dados);

            return $json_str;
            
        }
        
    }
    
    public function dadosTopico($versao) {

        $versao = str_replace("_", ".", $versao);
        
        $topicoDAO = new TopicoDAO();
        
        if($versao >= 1.00){
        
            $dados = array("dados" => $topicoDAO->dados());
            $json_str = json_encode($dados);

            return $json_str;
            
        }
        
    }
    
    public function dadosQuestao($versao) {

        $versao = str_replace("_", ".", $versao);
        
        $questaoDAO = new QuestaoDAO();
        
        if($versao >= 1.00){
        
            $dados = array("dados" => $questaoDAO->dados());
            $json_str = json_encode($dados);

            return $json_str;
            
        }
        
    }
    
}
