<?php
if ($sub == $obj) {
    if ($subRating >= 0) {
        include 'move.php';
    } elseif ($subRating < 0) {
        echo $sub.' ('.$subRating.') is dead<br>';
    }
} elseif ($sub != $obj) {
    if ($subRating >= 0) {
        include 'discover.php';
        if (($distX <= $subRating) && ($distY <= $subRating) && ($distZ <= $subRating)) {
            include 'discovered.php';
        } else {
            include 'move.php';
        }
    } elseif ($subRating < 0) {
        echo $sub.' ('.$subRating.') is dead<br>';
    }
}