<?php
if ($subMode > $objMode) {
    $forceDiff = $subMode - $objMode;
} elseif ($subMode < $objMode) {
    $forceDiff = $objMode - $subMode;
} elseif ($subMode == $objMode) {
    $forceDiff = 0;
}
$subForce = $forceDiff + 1;