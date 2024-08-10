<?php

require_once 'bootstrap.php';

if (!isset($argv[1])) {
    echo "Usage: php show_product.php <product_id>\n";
    exit(1);
}

$id = $argv[1];

$product = $entityManager->find('Product', $id);

if ($product === null) {
    echo "No product found.\n";
    exit(1);
}

echo sprintf("-%s\n", $product->getName());
