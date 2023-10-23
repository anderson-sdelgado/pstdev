<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/Conn.class.php');
/**
 * Description of AtualizaAplicDAO
 *
 * @author anderson
 */
class AtualAplicDAO extends Conn {
    //put your code here

    /** @var PDOStatement */
    private $Read;

    /** @var PDO */
    private $Conn;

    public function verAtual($nroAparelho) {

        $select = "SELECT "
                        . " COUNT(*) AS QTDE "
                    . " FROM "
                        . " PST_ATUAL "
                    . " WHERE "
                        . " NRO_APARELHO = " . $nroAparelho;

        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        foreach ($result as $item) {
            $v = $item['QTDE'];
        }

        return $v;
    }
    
    public function verToken($token) {

        $select = "SELECT "
                    . " COUNT(*) AS QTDE "
                . " FROM "
                    . " PST_ATUAL "
                . " WHERE "
                    . " TOKEN = '" . $token . "'";

        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        foreach ($result as $item) {
            $v = $item['QTDE'];
        }

        return $v;
    }

    public function insAtual($nroAparelho, $versao) {

        $sql = "INSERT INTO PST_ATUAL ("
                            . " NRO_APARELHO "
                            . " , VERSAO "
                            . " , DTHR_ULT_ACESSO "
                            . " , TOKEN "
                        . " ) "
                        . " VALUES ("
                            . " " . $nroAparelho
                            . " , '" . $versao . "'"
                            . " , SYSDATE "
                            . " , '" . strtoupper(md5('PST-VERSAO_' . $versao . '-' . $nroAparelho)) . "'"
                        . " )";

        $this->Conn = parent::getConn();
        $this->Create = $this->Conn->prepare($sql);
        $this->Create->execute();
    }

    public function updAtual($nroAparelho, $versao) {

        $sql = "UPDATE PST_ATUAL "
                            . " SET "
                                . " VERSAO = '" . $versao . "'"
                                . " , DTHR_ULT_ACESSO = SYSDATE "
                                . " , TOKEN = '" . strtoupper(md5('PST-VERSAO_' . $versao . '-' . $nroAparelho)) . "'"
                            . " WHERE "
                                . " NRO_APARELHO = " . $nroAparelho;

        $this->Conn = parent::getConn();
        $this->Create = $this->Conn->prepare($sql);
        $this->Create->execute();
    }

    public function dataHora() {

        $select = " SELECT "
                            . " TO_CHAR(SYSDATE, 'DD/MM/YYYY HH24:MI') AS DTHR "
                        . " FROM "
                            . " DUAL ";

        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result1 = $this->Read->fetchAll();

        foreach ($result1 as $item) {
            $dthr = $item['DTHR'];
        }

        return $dthr;
    }
    
}
