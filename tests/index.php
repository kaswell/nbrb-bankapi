<?php

require __DIR__ . '/../vendor/autoload.php';

use Kaswell\NbrbBankApi\Models\Currency;

$model = new Currency(['id'=>2]);
$model->setProperty('name', 'test');

print_r($model->toArray());

echo "START TEST"; echo "\n";