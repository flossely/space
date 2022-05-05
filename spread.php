<?php
$yi = ($_REQUEST['yi']) ? $_REQUEST['yi'] : 90;
$yo = ($_REQUEST['yo']) ? $_REQUEST['yo'] : -90;
for ($i = $yi; $i >= $yo; $i--) {
    copy('ystr.php', $i.'.yl');
    chmod($i.'.yl', 0777);
}