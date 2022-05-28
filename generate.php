<?php
$subRand = rand(0,$last);
$subID = $subRand;
$sub = $list[$subRand];
include 'autosubopen.php';

$objRand = rand(0,$last);
$objID = $objRand;
$obj = $list[$objRand];
include 'autoobjopen.php';

include 'force.php';
include 'machine.php';

include 'autosubsave.php';
include 'autoobjsave.php';
