<?php
if ($subMode > $objMode) {
    $forceDiff = $subMode - $objMode;
    $subForce = round(($forceDiff * 4), 0);
} elseif ($subMode < $objMode) {
    $forceDiff = $objMode - $subMode;
    $subForce = round(($forceDiff * 2), 0);
} elseif ($subMode == $objMode) {
    $forceDiff = $subMode - $objMode;
    $subForce = round(($forceDiff / 4), 0);
}