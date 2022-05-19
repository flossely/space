<?php
$objRating = file_get_contents($obj.'/rating');
$objMode = file_get_contents($obj.'/mode');
$objCoord = file_get_contents($obj.'/coord');
$objCoordDiv = explode(';', $objCoord);
if (is_numeric($objCoordDiv[0])) {
    $objX = $objCoordDiv[0];
} else {
    $objX = 0;
}
if (is_numeric($objCoordDiv[1])) {
    $objY = $objCoordDiv[1];
} else {
    $objY = 0;
}
if (is_numeric($objCoordDiv[2])) {
    $objZ = $objCoordDiv[2];
} else {
    $objZ = 0;
}