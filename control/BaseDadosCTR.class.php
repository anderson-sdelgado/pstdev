<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require_once('../model/AreaDAO.class.php');
require_once('../model/ColabDAO.class.php');
require_once('../model/TipoDAO.class.php');
require_once('../model/TopicoDAO.class.php');
require_once('../model/QuestaoDAO.class.php');
require_once('../model/SubAreaDAO.class.php');
require_once('../model/TurnoDAO.class.php');
/**
 * Description of BaseDadosCTR
 *
 * @author anderson
 */
class BaseDadosCTR {
    
    public function dadosTeste() {
        
        $areaDAO = new AreaDAO();
        return json_encode($areaDAO->dados(), JSON_NUMERIC_CHECK);
        
    }
    
    public function dadosArea() {

        $areaDAO = new AreaDAO();
        
        $dados = array("dados" => $areaDAO->dados());
        $json_str = json_encode($dados);

        return $json_str;
            
    }
    
    public function dadosColab() {

        $colabDAO = new ColabDAO();

        $dados = array("dados" => $colabDAO->dados());
        $json_str = json_encode($dados);

        return $json_str;
        
    }
    
    public function dadosTipo() {

        $tipoDAO = new TipoDAO();

        $dados = array("dados" => $tipoDAO->dados());
        $json_str = json_encode($dados);

        return $json_str;

    }
    
    public function dadosTopico() {

        $topicoDAO = new TopicoDAO();

        $dados = array("dados" => $topicoDAO->dados());
        $json_str = json_encode($dados);

        return $json_str;

    }
    
    public function dadosQuestao() {

        $questaoDAO = new QuestaoDAO();

        $dados = array("dados" => $questaoDAO->dados());
        $json_str = json_encode($dados);

        return $json_str;

    }
    
    public function dadosSubArea() {

        $subAreaDAO = new SubAreaDAO();

        $dados = array("dados" => $subAreaDAO->dados());
        $json_str = json_encode($dados);

        return $json_str;

    }
    
    public function dadosTurno() {

        $turnoDAO = new TurnoDAO();

        $dados = array("dados" => $turnoDAO->dados());
        $json_str = json_encode($dados);

        return $json_str;
            
    }
    
}
