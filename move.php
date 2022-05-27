<?php
$subStepVelo = rand(1, 50) * 2;
$subStep = round(($subRating / $subStepVelo), 0) + 1;
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
echo $sub.' ('.$subRating.') moved ('.$subStep.') to ('.$subX.';'.$subY.';'.$subZ.')<br>';
