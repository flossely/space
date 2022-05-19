<?php
$subStepArr = [2, 4, 8, 12, 24, 48];
$subStepVelo = $subStepArr[rand(0, 5)];
$subStep = round(($subRating / $subStepVelo), 0) + 2;
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
echo $sub.' ('.$subRating.') moved to '.$subX.';'.$subY.';'.$subZ.'<br>';