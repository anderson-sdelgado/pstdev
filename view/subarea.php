<?php

$versao = filter_input(INPUT_GET, 'versao', FILTER_DEFAULT);

require_once('../control/SubAreaCTR.class.php');

$subAreaCTR = new SubAreaCTR();

echo $subAreaCTR->dados($versao);
