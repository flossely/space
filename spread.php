<?php
for ($i = 89; $i >= -90; $i--) {
    copy('ym.yl', $i.'.yl');
    chmod($i.'.yl', 0777);
}