<?php

function velo($f) {
    return $f;
}

function self($s,$o) {
    return ($s == $o);
}

function alive($r) {
    return ($r >= 0);
}

function valuable($r) {
    return ($r > 0);
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

include 'spacedictus.php';
