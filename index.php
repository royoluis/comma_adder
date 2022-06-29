<?php
require __DIR__ . '/src/CommaAdder.php';

$newList = new CommaAdder();

$newList->fileName = 'list.txt';

$newList->fileList = $newList->getList();

print("\n" . $newList->addcomma() . "\n");

?>