<?php

require __DIR__ . '/../bootstrap.php';

use Isurance\OOProgramming\Parser\ProductParser;

try {
    $productParser = new ProductParser('/var/www/html/OOProgramming/products.xml');
    $productParser->attachObservers();
    $products = $productParser->parse();
    foreach ($products as $product){
        echo 'Name:' . $product->title() . ', Date:' . $product->pubDate() . ', URL:' . $product->link() . "\n";
    }
} catch (Throwable $error) {
    echo $error->getMessage();
}
