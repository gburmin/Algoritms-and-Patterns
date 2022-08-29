<?php
$path = $_SERVER['DOCUMENT_ROOT'];

$dir = new RecursiveDirectoryIterator($path);
$iterator = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::CHILD_FIRST);

// Цикл по содержанию директории
foreach ($iterator as $item) {
    if ($item->getFilename() == '..' or $item->getFilename() == '.') continue;
    echo $item . "<br>";
}
