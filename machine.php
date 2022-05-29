<?php
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
if ((($subMode == 1) && ($objMode == 0)) || (($subMode == 0) && ($objMode == -1))) {
    $subForce = 2;
} elseif (($subMode == 1) && ($objMode == -1)) {
    $subForce = 3;
} else {
    $subForce = 1;
}

if ($sub == $obj) {
    if ($subRating >= 0) {
	
	$subDirect = rand(0, 5);
	if ($subDirect == 0) {
    	    $subX = $subX + $subForce;
	} elseif ($subDirect == 1) {
    	    $subX = $subX - $subForce;
        } elseif ($subDirect == 2) {
            $subY = $subY + $subForce;
        } elseif ($subDirect == 3) {
            $subY = $subY - $subForce;
        } elseif ($subDirect == 4) {
            $subZ = $subZ + $subForce;
	} elseif ($subDirect == 5) {
            $subZ = $subZ - $subForce;
	}
	echo $sub.' ('.$subRating.') moved ('.$subForce.') to ('.$subX.';'.$subY.';'.$subZ.')<br>';
	
    } elseif ($subRating < 0) {
        echo $sub.' ('.$subRating.') is dead<br>';
    }
} elseif ($sub != $obj) {
    if ($subRating >= 0) {
        
        if ($subX > $objX) {
    	    $distX = $subX - $objX;
        } elseif ($subX < $objX) {
            $distX = $objX - $subX;
	} elseif ($subX == $objX) {
            $distX = 0;
	}
	if ($subY > $objY) {
            $distY = $subY - $objY;
	} elseif ($subY < $objY) {
            $distY = $objY - $subY;
	} elseif ($subY == $objY) {
            $distY = 0;
	}
	if ($subZ > $objZ) {
            $distZ = $subZ - $objZ;
	} elseif ($subZ < $objZ) {
            $distZ = $objZ - $subZ;
	} elseif ($subZ == $objZ) {
    	    $distZ = 0;
	}
        
        if (($distX <= $subForce) && ($distY <= $subForce) && ($distZ <= $subForce)) {
            
            if ($objRating >= 0) {
    		if (($subMode == 0 && $objMode == 0) || ($subMode > 0 && $objMode < 0) || ($subMode < 0 && $objMode > 0)) {
        	    $objRating = $objRating - $subForce;
        	    $subRating = $subRating + $subForce;
        	    echo $sub.' ('.$subRating.') harmed ('.$subForce.') '.$obj.' ('.$objRating.')<br>';
    		} elseif (($subMode > 0 && $objMode > 0) || ($subMode < 0 && $objMode < 0) || ($subMode > 0 && $objMode == 0) || ($subMode < 0 && $objMode == 0) || ($subMode == 0 && $objMode > 0) || ($subMode == 0 && $objMode < 0)) {
        	    $objRating = $objRating + $subForce;
        	    $subRating = $subRating - $subForce;
        	    echo $sub.' ('.$subRating.') healed ('.$subForce.') '.$obj.' ('.$objRating.')<br>';
    		}
	    } elseif ($objRating < 0) {
    		
    		$subDirect = rand(0, 5);
	        if ($subDirect == 0) {
    	            $subX = $subX + $subForce;
	        } elseif ($subDirect == 1) {
    	            $subX = $subX - $subForce;
                } elseif ($subDirect == 2) {
                    $subY = $subY + $subForce;
                } elseif ($subDirect == 3) {
                    $subY = $subY - $subForce;
                } elseif ($subDirect == 4) {
                    $subZ = $subZ + $subForce;
	        } elseif ($subDirect == 5) {
                    $subZ = $subZ - $subForce;
	        }
	        echo $sub.' ('.$subRating.') moved ('.$subForce.') to ('.$subX.';'.$subY.';'.$subZ.')<br>';
    		
	    }
            
        } else {
            
            $subDirect = rand(0, 5);
	    if ($subDirect == 0) {
    	        $subX = $subX + $subForce;
	    } elseif ($subDirect == 1) {
    	        $subX = $subX - $subForce;
            } elseif ($subDirect == 2) {
                $subY = $subY + $subForce;
            } elseif ($subDirect == 3) {
                $subY = $subY - $subForce;
            } elseif ($subDirect == 4) {
                $subZ = $subZ + $subForce;
	    } elseif ($subDirect == 5) {
                $subZ = $subZ - $subForce;
	    }
	    echo $sub.' ('.$subRating.') moved ('.$subForce.') to ('.$subX.';'.$subY.';'.$subZ.')<br>';
            
        }
    } elseif ($subRating < 0) {
        echo $sub.' ('.$subRating.') is dead<br>';
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
