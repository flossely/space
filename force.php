<?php
if ($subMode > $objMode) {
    $subForce = ($subMode - $objMode) + 2;
} elseif ($subMode < $objMode) {
    $subForce = ($objMode - $subMode) - 2;
} elseif ($subMode == $objMode) {
    $subForce = 2;
}