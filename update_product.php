<?php

require_once 'bootstrap.php';

if ($argc != 3) {
    echo "Usage: php {$argv[0]} <product_id> <new_name>\n";
    exit(1);
}

$id = $argv[1];
$newName = $argv[2];

$product = $entityManager->find('Product', $id);

if ($product === null) {
    echo "Product $id does not exist.\n";
    exit(1);
}

$product->setName($newName);

$entityManager->flush();
