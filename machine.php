<?php
if ($sub == $obj) {
    if ($subRating >= 0) {
        $subAct = rand(0,1);
        if ($subAct == 0) {
            echo $sub.' ('.$subRating.') is thinking...<br>';
        } elseif ($subAct == 1) {
            $arc = ['d','r','u','l'];
            $arcRand = rand(0,count($arc)-1);
            if (file_exists($sub.'/foot.'.$arc[$arcRand].'.png')) {
                echo $sub." has opened a <a href='".$sub."/foot.".$arc[$arcRand].".png'>brothel</a>";
            } else {
                echo $sub.' ('.$subRating.') is thinking...<br>';
            }
        }
    } elseif ($subRating < 0) {
        echo $sub.' ('.$subRating.') is dead<br>';
    }
} elseif ($sub != $obj) {
    if ($subRating >= 0) {
        include 'discover.php';
        if (($distX <= $subRating) && ($distY <= $subRating) && ($distZ <= $subRating)) {
            include 'discovered.php';
        } else {
            echo $sub.': '.$obj.' not reachable<br>';
        }
    } elseif ($subRating < 0) {
        echo $sub.' ('.$subRating.') is dead<br>';
    }
}