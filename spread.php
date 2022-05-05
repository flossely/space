<?php
$yi = ($_REQUEST['yi']) ? $_REQUEST['yi'] : 90;
$yo = ($_REQUEST['yo']) ? $_REQUEST['yo'] : -90;
for ($i = $yi; $i >= $yo; $i--) {
    copy('row.php', $i.'.row');
    chmod($i.'.row', 0777);
}