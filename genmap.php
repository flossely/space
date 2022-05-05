<?php
include 'alt.php';
$str = '';
for ($i = 90; $i >= -90; $i--) {
    for ($j = -180; $j <= 180; $j++) {
        $h = $alt[$i][$j];
        $str .= $j.'|[4]|'.$i.'|[3]|'.$h.'|[4]|Pantalassa|[2]|';
        echo $j . ':' . $i . '(' . $h . ')<br>';
    }
    $str = mb_strimwidth($str, 0, -5, strlen($str));
    $str .= '|[1]|';
}
$str = mb_strimwidth($str, 0, -5, strlen($str));
file_put_contents('earth.map', $str);
chmod('earth.map', 0777);
