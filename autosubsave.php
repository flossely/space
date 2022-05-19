<?php
file_put_contents($sub.'/rating', $subRating);
chmod($sub.'/rating', 0777);
file_put_contents($sub.'/mode', $subMode);
chmod($sub.'/mode', 0777);
file_put_contents($sub.'/coord', $subX.';'.$subY.';'.$subZ);
chmod($sub.'/coord', 0777);