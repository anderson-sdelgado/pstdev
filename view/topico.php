<?php

$versao = filter_input(INPUT_GET, 'versao', FILTER_DEFAULT);

require_once('../control/ObsCTR.class.php');

$obsCTR = new ObsCTR();

echo $obsCTR->dadosTopico($versao);