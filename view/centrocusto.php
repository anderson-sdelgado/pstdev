<?php

$versao = filter_input(INPUT_GET, 'versao', FILTER_DEFAULT);

require_once('../control/CentroCustoCTR.class.php');

$centroCustoCTR = new CentroCustoCTR();

echo $centroCustoCTR->dados($versao);
