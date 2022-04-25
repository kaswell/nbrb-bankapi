<?php

require __DIR__ . '/../vendor/autoload.php';

use Kaswell\NbrbBankApi\Models\Currency;

$model = new Currency(['Cur_ID'=>2, 'name'=>'ff']);
$model->setProperty('name', 'test');

print_r($model->toArray());

echo "START TEST"; echo "\n";