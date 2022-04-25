<?php

namespace Kaswell\NbrbBankApi\Models;

use Kaswell\NbrbBankApi\Abstracts\Model;

/**
 * Class Rate
 * @package Kaswell\NbrbBankApi\Models
 */
class Rate extends Model
{
    /**
     * @var int
     * внутренний код
     */
    protected int $id;

    protected $date;

    /**
     * @var string
     * буквенный код
     */
    protected string $abbreviation;

    /**
     * @var float
     * количество единиц иностранной валюты
     */
    protected float $scale;

    /**
     * @var string
     * наименование валюты на русском языке
     */
    protected string $name;

    protected $official_rate;

}