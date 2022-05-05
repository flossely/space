<?php
$mapname = ($_REQUEST['name']) ? $_REQUEST['name'] : 'sample.map';
$mapfile = file_get_contents($mapname);
$mapdel = explode('|[1]|', $mapfile);
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Cartesian</title>
<link rel="shortcut icon" href="sys.console.png?rev=<?=time();?>" type="image/x-icon">
<link href="system.css?rev=<?=time();?>" rel="stylesheet">
</head>
<body>
<?php
$map = [];
foreach ($mapdel as $mapord => $maprow) {
    $mapdeli = explode('|[2]|', $maprow);
    $mapi = [];
    foreach ($mapdeli as $mapabs => $mapelem) {
    	$mapexp = explode('|[3]|', $mapelem);
    	$maphead = $mapexp[0];
    	$mapbody = $mapexp[1];
    	$mapheadexp = explode('|[4]|', $maphead);
    	$mapheadx = $mapheadexp[0];
    	$mapheady = $mapheadexp[1];
    	$mapbodyexp = explode('|[4]|', $mapbody);
    	$mapbodyalt = $mapbodyexp[0];
    	$mapbodytitle = $mapbodyexp[1];
    	$mapi[] = $mapbodyalt;
    	echo $mapheadx.';'.$mapheady.' '.$mapbodyalt.' m<br>';
    }
    $map[] = $mapi;
}
?>
</body>
</html>