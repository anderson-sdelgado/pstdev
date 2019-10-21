<?php
//var_dump($_POST);

$versao = filter_input(INPUT_GET, 'versao', FILTER_DEFAULT);
$info = filter_input_array(INPUT_POST, FILTER_DEFAULT);

require_once('../control/AbordagemCTR.class.php');

if (isset($info)):

    $abordagemCTR = new AbordagemCTR();
    echo $abordagemCTR->salvarDados($versao, $info, "inserirdados");
    
endif;

