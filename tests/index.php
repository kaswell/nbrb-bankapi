<?php

require __DIR__ . '/../vendor/autoload.php';

$bank = new \Kaswell\NbrbBankApi\Bank();

print_r($bank->getCurrencies());

echo "\n"; echo "START TEST"; echo "\n";