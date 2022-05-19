<?php
file_put_contents($obj.'/rating', $objRating);
chmod($obj.'/rating', 0777);
file_put_contents($obj.'/mode', $objMode);
chmod($obj.'/mode', 0777);
file_put_contents($obj.'/coord', $objX.';'.$objY.';'.$objZ);
chmod($obj.'/coord', 0777);