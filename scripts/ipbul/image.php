<?php
header("Content-type: image/png");
$im = imagecreatefrompng ("yourip.png");
$colour = imagecolorallocate($im, 255, 255, 255);
$ip = "$_SERVER[REMOTE_ADDR]";
imagestring($im, 3, 71, 2, $ip, $colour);
imagepng($im);
?>