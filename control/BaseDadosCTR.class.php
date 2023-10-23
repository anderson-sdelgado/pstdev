<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require_once('../control/AtualAplicCTR.class.php');
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
    
    public function dadosArea($info) {

        $atualAplicCTR = new AtualAplicCTR();
        
        if($atualAplicCTR->verifToken($info)){

            $areaDAO = new AreaDAO();

            $dados = array("dados" => $areaDAO->dados());
            $json_str = json_encode($dados);

            return $json_str;
        
        }
            
    }
    
    public function dadosColab($info) {

        $atualAplicCTR = new AtualAplicCTR();
        
        if($atualAplicCTR->verifToken($info)){
            
            $colabDAO = new ColabDAO();

            $dados = array("dados" => $colabDAO->dados());
            $json_str = json_encode($dados);

            return $json_str;
        
        }
        
    }
    
    public function dadosTipo($info) {

        $atualAplicCTR = new AtualAplicCTR();
        
        if($atualAplicCTR->verifToken($info)){

            $tipoDAO = new TipoDAO();

            $dados = array("dados" => $tipoDAO->dados());
            $json_str = json_encode($dados);

            return $json_str;
        
        }

    }
    
    public function dadosTopico($info) {

        $atualAplicCTR = new AtualAplicCTR();
        
        if($atualAplicCTR->verifToken($info)){

            $topicoDAO = new TopicoDAO();

            $dados = array("dados" => $topicoDAO->dados());
            $json_str = json_encode($dados);

            return $json_str;
        
        }

    }
    
    public function dadosQuestao($info) {

        $atualAplicCTR = new AtualAplicCTR();
        
        if($atualAplicCTR->verifToken($info)){

            $questaoDAO = new QuestaoDAO();

            $dados = array("dados" => $questaoDAO->dados());
            $json_str = json_encode($dados);

            return $json_str;
        
        }

    }
    
    public function dadosSubArea($info) {

        $atualAplicCTR = new AtualAplicCTR();
        
        if($atualAplicCTR->verifToken($info)){

            $subAreaDAO = new SubAreaDAO();

            $dados = array("dados" => $subAreaDAO->dados());
            $json_str = json_encode($dados);

            return $json_str;
        
        }

    }
    
    public function dadosTurno($info) {

        $atualAplicCTR = new AtualAplicCTR();
        
        if($atualAplicCTR->verifToken($info)){

            $turnoDAO = new TurnoDAO();

            $dados = array("dados" => $turnoDAO->dados());
            $json_str = json_encode($dados);

            return $json_str;
        
        }
            
    }
    
}
