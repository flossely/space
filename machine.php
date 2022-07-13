<?php

/*function numgen($min,$max) {
    return rand($min,$max);
}*/

function alive($r) {
    return ($r >= 0);
}

function dead($r) {
    return ($r < 0);
}

function valuable($r) {
    return ($r > 0);
}

function invaluable($r) {
    return ($r <= 0);
}

function dist($ix,$iy,$iz,$jx,$jy,$jz) {
    if ($ix > $jx) {
        $dix = $ix - $jx;
    } elseif ($ix < $jx) {
        $dix = $jx - $ix;
    } elseif ($ix == $jx) {
        $dix = 0;
    }
    if ($iy > $jy) {
        $diy = $iy - $jy;
    } elseif ($iy < $jy) {
        $diy = $jy - $iy;
    } elseif ($iy == $jy) {
        $diy = 0;
    }
    if ($iz > $jz) {
        $diz = $iz - $jz;
    } elseif ($iz < $jz) {
        $diz = $jz - $iz;
    } elseif ($iz == $jz) {
        $diz = 0;
    }
    
    return sqrt($dix ** 2 + $diy ** 2 + $diz ** 2);
}

function reach($ix,$iy,$iz,$jx,$jy,$jz,$f) {
    if ($ix > $jx) {
        $dix = $ix - $jx;
    } elseif ($ix < $jx) {
        $dix = $jx - $ix;
    } elseif ($ix == $jx) {
        $dix = 0;
    }
    if ($iy > $jy) {
        $diy = $iy - $jy;
    } elseif ($iy < $jy) {
        $diy = $jy - $iy;
    } elseif ($iy == $jy) {
        $diy = 0;
    }
    if ($iz > $jz) {
        $diz = $iz - $jz;
    } elseif ($iz < $jz) {
        $diz = $jz - $iz;
    } elseif ($iz == $jz) {
        $diz = 0;
    }
    
    return (($dix <= $f) && ($diy <= $f) && ($diz <= $f));
}

function relate($sm, $om) {
    if (($sm == 0 && $om == 0) || ($sm > 0 && $om < 0) || ($sm < 0 && $om > 0)) {
        $status = 'foe';
    } elseif (($subMode > 0 && $objMode > 0) || ($subMode < 0 && $objMode < 0) || ($subMode > 0 && $objMode == 0) || ($subMode < 0 && $objMode == 0) || ($subMode == 0 && $objMode > 0) || ($subMode == 0 && $objMode < 0)) {
        $status = 'friend';
    }
    
    return $status;
}

if (file_exists("locale")) {
    $localeOpen = file_get_contents("locale");
    $locale = ($localeOpen != "") ? $localeOpen : "en";
} else {
    $locale = "en";
}

$lingua = $locale;

$navi =
[
    'en' =>
    [
        'back' => 'back',
        'dead' => 'dead',
        'down' => 'down',
        'forward' => 'forward',
        'heal' => 'heal',
        'hit' => 'hit',
        'left' => 'left',
        'right' => 'right',
        'standby' => 'stand by',
        'strike' => 'strike',
        'tract' => 'traced',
        'up' => 'up',
    ],
    'la' =>
    [
        'back' => 'ad tergum',
        'dead' => 'mortuus',
        'down' => 'ad deorsum',
        'forward' => 'ad deinceps',
        'heal' => 'sano',
        'hit' => 'ferio',
        'left' => 'ad sinistram',
        'right' => 'ad dextram',
        'standby' => 'adsistit',
        'strike' => 'pulso',
        'tract' => 'vestigo',
        'up' => 'ad sursum',
    ],
];

$subRand = rand(0,$last);
$subID = $subRand;
$sub = $list[$subRand];
$subRating = file_get_contents($sub.'/rating');
$subMode = file_get_contents($sub.'/mode');
$subCoord = file_get_contents($sub.'/coord');
$subCoordDiv = explode(';', $subCoord);
if (is_numeric($subCoordDiv[0])) {
    $subX = $subCoordDiv[0];
} else {
    $subX = 0;
}
if (is_numeric($subCoordDiv[1])) {
    $subY = $subCoordDiv[1];
} else {
    $subY = 0;
}
if (is_numeric($subCoordDiv[2])) {
    $subZ = $subCoordDiv[2];
} else {
    $subZ = 0;
}
$objRand = rand(0,$last);
$objID = $objRand;
$obj = $list[$objRand];
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
if ($subRating <= 0) {
    $subForce = 1;
} else {
    $subForce = $subRating;
}

if ($sub == $obj) {
    echo '@'.$sub.' ('.$subRating.') '.$navi[$lingua]['standby'].'<br>';
} elseif ($sub != $obj) {
    if ($subRating >= 0) {
        if ($objRating >= 0) {
	    if (reach($subX,$subY,$subZ,$objX,$objY,$objZ,$subForce)) {
	        if (relate($subMode, $objMode) == 'foe') {
	            $subAction = rand(0, 2);
	            if ($subAction == 0) {
        	        $subX = $objX;
        	        $subY = $objY;
        	        $subZ = $objZ;
        	        echo '@'.$sub.' '.$navi[$lingua]['tract'].' ('.dist($subX,$subY,$subZ,$objX,$objY,$objZ).' @'.$obj.'<br>';
	            } elseif ($subAction == 1) {
	                $subX = $objX;
        	        $subY = $objY;
        	        $subZ = $objZ;
	                $objRating -= $subForce;
        	        $subRating += $subForce;
        	        echo '@'.$sub.' ('.$subRating.') '.$navi[$lingua]['hit'].' ('.$subForce.') @'.$obj.' ('.$objRating.')<br>';
        	    } elseif ($subAction == 2) {
	                $objRating -= $subForce;
        	        $subRating += $subForce;
        	        echo '@'.$sub.' ('.$subRating.') '.$navi[$lingua]['strike'].' ('.$subForce.') @'.$obj.' ('.$objRating.')<br>';
	            }
    		} elseif (relate($subMode, $objMode) == 'friend') {
    		    $subAction = rand(0, 2);
	            if ($subAction == 0) {
	                $subX = $objX;
        	        $subY = $objY;
        	        $subZ = $objZ;
        	        echo '@'.$sub.' '.$navi[$lingua]['tract'].' ('.dist($subX,$subY,$subZ,$objX,$objY,$objZ).' @'.$obj.'<br>';
	            } elseif ($subAction == 1) {
	                $subX = $objX;
        	        $subY = $objY;
        	        $subZ = $objZ;
	                $objRating += $subForce;
        	        $subRating -= $subForce;
        	        echo '@'.$sub.' ('.$subRating.') '.$navi[$lingua]['heal'].' ('.$subForce.') @'.$obj.' ('.$objRating.')<br>';
	            } elseif ($subAction == 2) {
	                $objRating += $subForce;
        	        $subRating -= $subForce;
        	        echo '@'.$sub.' ('.$subRating.') '.$navi[$lingua]['heal'].' ('.$subForce.') @'.$obj.' ('.$objRating.')<br>';
	            }
    		}
	    } else {
	        $subDirect = rand(0, 5);
	        $subMove = rand(0, $subForce);
		if ($subDirect == 0) {
    	    	    $subX = $subX + $subMove;
    	    	    echo '@'.$sub.' '.$navi[$lingua]['right'].' ('.$subMove.')<br>';
		} elseif ($subDirect == 1) {
    	    	    $subX = $subX - $subMove;
    	    	    echo '@'.$sub.' '.$navi[$lingua]['left'].' ('.$subMove.')<br>';
        	} elseif ($subDirect == 2) {
            	    $subY = $subY + $subMove;
            	    echo '@'.$sub.' '.$navi[$lingua]['forward'].' ('.$subMove.')<br>';
        	} elseif ($subDirect == 3) {
            	    $subY = $subY - $subMove;
            	    echo '@'.$sub.' '.$navi[$lingua]['back'].' ('.$subMove.')<br>';
        	} elseif ($subDirect == 4) {
            	    $subZ = $subZ + $subMove;
            	    echo '@'.$sub.' '.$navi[$lingua]['up'].' ('.$subMove.')<br>';
		} elseif ($subDirect == 5) {
            	    $subZ = $subZ - $subMove;
            	    echo '@'.$sub.' '.$navi[$lingua]['down'].' ('.$subMove.')<br>';
		}
	    }
        } elseif ($objRating < 0) {
	    $subDirect = rand(0, 5);
	    $subMove = numgen(0, $subForce);
	    if ($subDirect == 0) {
    	        $subX = $subX + $subMove;
    	    	echo '@'.$sub.' '.$navi[$lingua]['right'].' ('.$subMove.')<br>';
            } elseif ($subDirect == 1) {
    	    	$subX = $subX - $subMove;
    	    	echo '@'.$sub.' '.$navi[$lingua]['left'].' ('.$subMove.')<br>';
            } elseif ($subDirect == 2) {
            	$subY = $subY + $subMove;
            	echo '@'.$sub.' '.$navi[$lingua]['forward'].' ('.$subMove.')<br>';
            } elseif ($subDirect == 3) {
            	$subY = $subY - $subMove;
            	echo '@'.$sub.' '.$navi[$lingua]['back'].' ('.$subMove.')<br>';
            } elseif ($subDirect == 4) {
            	$subZ = $subZ + $subMove;
            	echo '@'.$sub.' '.$navi[$lingua]['up'].' ('.$subMove.')<br>';
	    } elseif ($subDirect == 5) {
            	$subZ = $subZ - $subMove;
            	echo '@'.$sub.' '.$navi[$lingua]['down'].' ('.$subMove.')<br>';
	    }
        }
    } elseif ($subRating < 0) {
        echo '@'.$sub.' ('.$subRating.') '.$navi[$lingua]['dead'].'<br>';
    }
}

file_put_contents($sub.'/coord', $subX.';'.$subY.';'.$subZ);
chmod($sub.'/coord', 0777);
file_put_contents($sub.'/rating', $subRating);
chmod($sub.'/rating', 0777);
file_put_contents($sub.'/mode', $subMode);
chmod($sub.'/mode', 0777);
file_put_contents($obj.'/coord', $objX.';'.$objY.';'.$objZ);
chmod($obj.'/coord', 0777);
file_put_contents($obj.'/rating', $objRating);
chmod($obj.'/rating', 0777);
file_put_contents($obj.'/mode', $objMode);
chmod($obj.'/mode', 0777);
