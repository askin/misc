<?php
$op = $_GET['op'];

if($op == 'txt') {
    $content = 'txt.php';
} else if($op == 'html') {
    $content = 'html.php';
} else {
    $content = 'html.php';
}

include($content);
?>