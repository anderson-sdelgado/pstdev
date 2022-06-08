<?php

require_once('../control/AbordagemCTR.class.php');

header('Content-type: application/json');
$body = file_get_contents('php://input');

if (isset($body)):

    $abordagemCTR = new AbordagemCTR();
    $idCabecArray = $abordagemCTR->salvarDados($body);
    echo json_encode($idCabecArray);
    
endif;