<?php
if ($sub == $obj) {
    if ($subRating >= 0) {
        $subAct = rand(0, 1);
        if ($subAct == 0) {
            echo $sub.' ('.$subRating.') is thinking...<br>';
        } elseif ($subAct == 1) {
            include 'move.php';
        }
    } elseif ($subRating < 0) {
        echo $sub.' ('.$subRating.') is dead<br>';
    }
} elseif ($sub != $obj) {
    if ($subRating >= 0) {
        $subAct = rand(0, 2);
        if ($subAct == 0) {
            include 'discover.php';
            if (($distX <= $subRating) && ($distY <= $subRating) && ($distZ <= $subRating)) {
                include 'discovered.php';
            } else {
                echo $sub.': '.$obj.' not reachable<br>';
            }
        } elseif ($subAct == 1) {
            include 'move.php';
        } elseif ($subAct == 2) {
            echo $sub.' ('.$subRating.') is thinking...<br>';
        }
    } elseif ($subRating < 0) {
        echo $sub.' ('.$subRating.') is dead<br>';
    }
}