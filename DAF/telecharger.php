<?php
header('Content-type: text/plain');
header('Content-Disposition: attachment; filename="export.txt"');
readfile('export.txt');
?>