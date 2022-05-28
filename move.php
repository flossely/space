<?php
$subStep = $subForce;
$subDirect = rand(0, 5);
if ($subDirect == 0) {
    $subX = $subX + $subStep;
} elseif ($subDirect == 1) {
    $subX = $subX - $subStep;
} elseif ($subDirect == 2) {
    $subY = $subY + $subStep;
} elseif ($subDirect == 3) {
    $subY = $subY - $subStep;
} elseif ($subDirect == 4) {
    $subZ = $subZ + $subStep;
} elseif ($subDirect == 5) {
    $subZ = $subZ - $subStep;
}
include 'autosubsave.php';
include 'autoobjsave.php';
echo $sub.' ('.$subRating.') moved ('.$subStep.') to ('.$subX.';'.$subY.';'.$subZ.')<br>';
