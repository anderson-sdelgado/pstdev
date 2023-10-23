<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require('../model/AtualAplicDAO.class.php');
/**
 * Description of AtualAplicativoCTR
 *
 * @author anderson
 */
class AtualAplicCTR {
    //put your code here

    public function inserirDados($info){
        
        $jsonObj = json_decode($info['dado']);
        $dados = $jsonObj->dados;

        foreach ($dados as $d) {
            $nroAparelho = $d->nroAparelho;
            $versao = $d->versao;
        }
        
        return $this->inserirAtualVersao($nroAparelho, $versao);
        
    }
    
    public function inserirAtualVersao($nroAparelho, $versao) {
        $atualAplicDAO = new AtualAplicDAO();
        $v = $atualAplicDAO->verAtual($nroAparelho);
        if ($v == 0) {
            $atualAplicDAO->insAtual($nroAparelho, $versao);
        } else {
            $atualAplicDAO->updAtual($nroAparelho, $versao);
        }
        $dado = array("nroAparelho" => $nroAparelho);
        return json_encode(array("dados" =>array($dado)));
    }

    public function verifToken($info){
        
        $jsonObj = json_decode($info['dado']);
        $dados = $jsonObj->dados;

        foreach ($dados as $d) {
            $token = $d->token;
        }
        
        $atualAplicDAO = new AtualAplicDAO();
        $v = $atualAplicDAO->verToken($token);
        
        if ($v > 0) {
            return true;
        } else {
            return false;
        }
        
    }
    
    public function verToken($headers){
        
        $token = trim(substr($headers['Authorization'], 6));
        $atualAplicDAO = new AtualAplicDAO();
        $v = $atualAplicDAO->verToken($token);
        
        if ($v > 0) {
            return true;
        } else {
            return false;
        }
        
    }
    
}
