<?php
if ($objRating >= 0) {
    if (($subMode == 0 && $objMode == 0) || ($subMode > 0 && $objMode < 0) || ($subMode < 0 && $objMode > 0)) {
        $objRating = $objRating - $subForce;
        $subRating = $subRating + $subForce;
        echo $sub.' ('.$subRating.') harmed ('.$subForce.') '.$obj.' ('.$objRating.')<br>';
    } elseif (($subMode > 0 && $objMode > 0) || ($subMode < 0 && $objMode < 0) || ($subMode > 0 && $objMode == 0) || ($subMode < 0 && $objMode == 0) || ($subMode == 0 && $objMode > 0) || ($subMode == 0 && $objMode < 0)) {
        $objRating = $objRating + $subForce;
        $subRating = $subRating - $subForce;
        echo $sub.' ('.$subRating.') healed ('.$subForce.') '.$obj.' ('.$objRating.')<br>';
    }
} elseif ($objRating < 0) {
    include 'move.php';
}
include 'autosubsave.php';
include 'autoobjsave.php';