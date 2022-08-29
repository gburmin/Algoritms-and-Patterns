<?php
$path = $_SERVER['DOCUMENT_ROOT'];

$dir = new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS);
$iterator = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::CHILD_FIRST);

// Цикл по содержанию директории
foreach ($iterator as $item) {
    echo $item . "<br>";
}
