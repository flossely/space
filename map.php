<?php
$name = ($_REQUEST['name']) ? $_REQUEST['name'] : 'sample.map';
$yi = ($_REQUEST['yi']) ? $_REQUEST['yi'] : 90;
$yo = ($_REQUEST['yo']) ? $_REQUEST['yo'] : -90;
$xi = ($_REQUEST['xi']) ? $_REQUEST['xi'] : -180;
$xo = ($_REQUEST['xo']) ? $_REQUEST['xo'] : 180;
include 'alt.php';
$str = '';
for ($i = $yi; $i >= $yo; $i--) {
    for ($j = $xi; $j <= $xo; $j++) {
        $h = $alt[$i][$j];
        $str .= $j.'|[4]|'.$i.'|[3]|'.$h.'|[4]|Pantalassa|[2]|';
        echo 'Generated ' . $j . ';' . $i . ' (' . $h . ' m)<br>';
    }
    $str = mb_strimwidth($str, 0, -5, strlen($str));
    $str .= '|[1]|';
}
$str = mb_strimwidth($str, 0, -5, strlen($str));
file_put_contents($name, $str);
chmod($name, 0777);
