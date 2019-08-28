<?php

$versao = filter_input(INPUT_GET, 'versao', FILTER_DEFAULT);

require_once('../control/AreaCTR.class.php');

$areaCTR = new AreaCTR();

echo $areaCTR->dados($versao);
