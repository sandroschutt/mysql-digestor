<?php
$files = scandir("../final/drmagno");
$filesCount = count($files) - 2;

echo $filesCount . PHP_EOL;
