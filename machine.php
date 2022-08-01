<?php

if (file_exists('year')) {
    $today = file_get_contents('year');
} else {
    $today = -2000;
}

$subRand = rand(0,$last);
$subID = $subRand;
$sub = $list[$subRand];
$subRating = file_get_contents($sub.'/rating');
$subMode = file_get_contents($sub.'/mode');
$subCoord = file_get_contents($sub.'/coord');
$subScore = file_get_contents($sub.'/score');
$subMoney = file_get_contents($sub.'/money');
$subAge = file_get_contents($sub.'/age');
$subBorn = file_get_contents($sub.'/born');
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
$objScore = file_get_contents($obj.'/score');
$objMoney = file_get_contents($obj.'/money');
$objAge = file_get_contents($obj.'/age');
$objBorn = file_get_contents($obj.'/born');
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
if (valuable($subRating)) {
    $subForce = $subRating;
} else {
    $subForce = 1;
}

if (self($sub,$obj)) {
    if (alive($subRating)) {
        $subAge += 1;
        $objAge += 1;
        echo yearconv($today).' : @'.$sub.'['.$subRating.'] '.$spacedictus[$lingua]['standby'].'<br>';
        $today += 1;
    } else {
        $subAge += 1;
        $objAge += 1;
        echo yearconv($today).' : @'.$sub.'['.$subRating.'] '.$spacedictus[$lingua]['dead'].'<br>';
        $today += 1;
    }
} else {
    if (alive($subRating)) {
        if (alive($objRating)) {
	    if (reach($subX,$subY,$subZ,$objX,$objY,$objZ,$subForce)) {
	        if (relate($subMode, $objMode) == 'foe') {
	            $subAction = rand(0, 2);
	            if ($subAction == 0) {
        	        $subX = $objX;
        	        $subY = $objY;
        	        $subZ = $objZ;
        	        $subScore += 10;
        	        $subAge += 1;
                        $objAge += 1;
        	        echo yearconv($today).' : @'.$sub.'['.$subRating.'] '.$spacedictus[$lingua]['tract'].' ('.dist($subX,$subY,$subZ,$objX,$objY,$objZ).') @'.$obj.'['.$objRating.']<br>';
        	        $today += 1;
	            } elseif ($subAction == 1) {
	                $subX = $objX;
        	        $subY = $objY;
        	        $subZ = $objZ;
	                $objRating -= $subForce;
        	        $subRating += $subForce;
        	        $subScore += 15;
        	        $subAge += 1;
                        $objAge += 1;
        	        echo yearconv($today).' : @'.$sub.'['.$subRating.'] '.$spacedictus[$lingua]['hit'].' @'.$obj.'['.$objRating.']<br>';
        	        $today += 1;
        	    } elseif ($subAction == 2) {
	                $objRating -= $subForce;
        	        $subRating += $subForce;
        	        $subScore += 5;
        	        $subAge += 1;
                        $objAge += 1;
        	        echo yearconv($today).' : @'.$sub.'['.$subRating.'] '.$spacedictus[$lingua]['strike'].' @'.$obj.'['.$objRating.']<br>';
        	        $today += 1;
	            }
    		} elseif (relate($subMode, $objMode) == 'friend') {
    		    $subAction = rand(0, 2);
	            if ($subAction == 0) {
	                $subX = $objX;
        	        $subY = $objY;
        	        $subZ = $objZ;
        	        $subScore += 10;
        	        $subAge += 1;
                        $objAge += 1;
        	        echo yearconv($today).' : @'.$sub.'['.$subRating.'] '.$spacedictus[$lingua]['tract'].' ('.dist($subX,$subY,$subZ,$objX,$objY,$objZ).') @'.$obj.'['.$objRating.']<br>';
        	        $today += 1;
	            } elseif ($subAction == 1) {
	                $subX = $objX;
        	        $subY = $objY;
        	        $subZ = $objZ;
	                $objRating += $subForce;
        	        $subRating -= $subForce;
        	        $subScore += 15;
        	        $subAge += 1;
                        $objAge += 1;
        	        echo yearconv($today).' : @'.$sub.'['.$subRating.'] '.$spacedictus[$lingua]['heal'].' @'.$obj.'['.$objRating.']<br>';
        	        $today += 1;
	            } elseif ($subAction == 2) {
	                $objRating += $subForce;
        	        $subRating -= $subForce;
        	        $subScore += 5;
        	        $subAge += 1;
                        $objAge += 1;
        	        echo yearconv($today).' : @'.$sub.'['.$subRating.'] '.$spacedictus[$lingua]['heal'].' @'.$obj.'['.$objRating.']<br>';
        	        $today += 1;
	            }
    		}
	    } else {
	        $subDirect = rand(0, 5);
	        $subMove = velo($subForce);
		if ($subDirect == 0) {
    	    	    $subX = $subX + $subMove;
    	    	    $subScore += 1;
    	    	    $subAge += 1;
                    $objAge += 1;
    	    	    echo yearconv($today).' : @'.$sub.'['.$subRating.'] '.$spacedictus[$lingua]['right'].' {'.$subX.';'.$subY.';'.$subZ.'}<br>';
    	    	    $today += 1;
		} elseif ($subDirect == 1) {
    	    	    $subX = $subX - $subMove;
    	    	    $subScore += 1;
    	    	    $subAge += 1;
                    $objAge += 1;
    	    	    echo yearconv($today).' : @'.$sub.'['.$subRating.'] '.$spacedictus[$lingua]['left'].' {'.$subX.';'.$subY.';'.$subZ.'}<br>';
    	    	    $today += 1;
        	} elseif ($subDirect == 2) {
            	    $subY = $subY + $subMove;
            	    $subScore += 1;
            	    $subAge += 1;
                    $objAge += 1;
            	    echo yearconv($today).' : @'.$sub.'['.$subRating.'] '.$spacedictus[$lingua]['forward'].' {'.$subX.';'.$subY.';'.$subZ.'}<br>';
            	    $today += 1;
        	} elseif ($subDirect == 3) {
            	    $subY = $subY - $subMove;
            	    $subScore += 1;
            	    $subAge += 1;
                    $objAge += 1;
            	    echo yearconv($today).' : @'.$sub.'['.$subRating.'] '.$spacedictus[$lingua]['back'].' {'.$subX.';'.$subY.';'.$subZ.'}<br>';
            	    $today += 1;
        	} elseif ($subDirect == 4) {
            	    $subZ = $subZ + $subMove;
            	    $subScore += 1;
            	    $subAge += 1;
                    $objAge += 1;
            	    echo yearconv($today).' : @'.$sub.'['.$subRating.'] '.$spacedictus[$lingua]['up'].' {'.$subX.';'.$subY.';'.$subZ.'}<br>';
            	    $today += 1;
		} elseif ($subDirect == 5) {
            	    $subZ = $subZ - $subMove;
            	    $subScore += 1;
            	    $subAge += 1;
                    $objAge += 1;
            	    echo yearconv($today).' : @'.$sub.'['.$subRating.'] '.$spacedictus[$lingua]['down'].' {'.$subX.';'.$subY.';'.$subZ.'}<br>';
            	    $today += 1;
		}
	    }
        } else {
	    $subDirect = rand(0, 5);
	    $subMove = velo($subForce);
            if ($subDirect == 0) {
    	    	$subX = $subX + $subMove;
    	    	$subScore += 1;
    	    	$subAge += 1;
    	    	echo yearconv($today).' : @'.$sub.'['.$subRating.'] '.$spacedictus[$lingua]['right'].' {'.$subX.';'.$subY.';'.$subZ.'}<br>';
    	    	$today += 1;
	    } elseif ($subDirect == 1) {
    	    	$subX = $subX - $subMove;
    	    	$subScore += 1;
    	    	$subAge += 1;
    	    	echo yearconv($today).' : @'.$sub.'['.$subRating.'] '.$spacedictus[$lingua]['left'].' {'.$subX.';'.$subY.';'.$subZ.'}<br>';
    	    	$today += 1;
            } elseif ($subDirect == 2) {
            	$subY = $subY + $subMove;
            	$subScore += 1;
            	$subAge += 1;
            	echo yearconv($today).' : @'.$sub.'['.$subRating.'] '.$spacedictus[$lingua]['forward'].' {'.$subX.';'.$subY.';'.$subZ.'}<br>';
            	$today += 1;
            } elseif ($subDirect == 3) {
            	$subY = $subY - $subMove;
            	$subScore += 1;
            	$subAge += 1;
            	echo yearconv($today).' : @'.$sub.'['.$subRating.'] '.$spacedictus[$lingua]['back'].' {'.$subX.';'.$subY.';'.$subZ.'}<br>';
            	$today += 1;
            } elseif ($subDirect == 4) {
            	$subZ = $subZ + $subMove;
            	$subScore += 1;
            	$subAge += 1;
            	echo yearconv($today).' : @'.$sub.'['.$subRating.'] '.$spacedictus[$lingua]['up'].' {'.$subX.';'.$subY.';'.$subZ.'}<br>';
            	$today += 1;
	    } elseif ($subDirect == 5) {
            	$subZ = $subZ - $subMove;
            	$subScore += 1;
            	$subAge += 1;
            	echo yearconv($today).' : @'.$sub.'['.$subRating.'] '.$spacedictus[$lingua]['down'].' {'.$subX.';'.$subY.';'.$subZ.'}<br>';
            	$today += 1;
            }
        }
    } else {
        echo yearconv($today).' : @'.$sub.'['.$subRating.'] '.$spacedictus[$lingua]['dead'].'<br>';
        $today += 1;
    }
}

file_put_contents('year', $today);
chmod('year', 0777);
file_put_contents($sub.'/coord', $subX.';'.$subY.';'.$subZ);
chmod($sub.'/coord', 0777);
file_put_contents($sub.'/rating', $subRating);
chmod($sub.'/rating', 0777);
file_put_contents($sub.'/mode', $subMode);
chmod($sub.'/mode', 0777);
file_put_contents($sub.'/score', $subScore);
chmod($sub.'/score', 0777);
file_put_contents($sub.'/money', $subMoney);
chmod($sub.'/money', 0777);
file_put_contents($sub.'/age', $subAge);
chmod($sub.'/age', 0777);
file_put_contents($sub.'/born', $subBorn);
chmod($sub.'/born', 0777);
file_put_contents($obj.'/coord', $objX.';'.$objY.';'.$objZ);
chmod($obj.'/coord', 0777);
file_put_contents($obj.'/rating', $objRating);
chmod($obj.'/rating', 0777);
file_put_contents($obj.'/mode', $objMode);
chmod($obj.'/mode', 0777);
file_put_contents($obj.'/score', $objScore);
chmod($obj.'/score', 0777);
file_put_contents($obj.'/money', $objMoney);
chmod($obj.'/money', 0777);
file_put_contents($obj.'/age', $objAge);
chmod($obj.'/age', 0777);
file_put_contents($obj.'/born', $objBorn);
chmod($obj.'/born', 0777);
