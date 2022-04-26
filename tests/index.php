<?php

require __DIR__ . '/../vendor/autoload.php';

$bank = new \Kaswell\NbrbBankApi\Bank();

echo "\n"; echo "START TEST"; echo "\n";

print_r($bank->getRate(298));