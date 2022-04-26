<?php

namespace Kaswell\NbrbBankApi\Models;

use Carbon\Carbon;
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

    /**
     * @var Carbon
     * дата, на которую запрашивается курс
     */
    protected Carbon $date;

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
     * наименование валюты на русском языке во множественном, либо в единственном числе, в зависимости от количества единиц
     */
    protected string $name;

    /**
     * @var float
     * курс
     */
    protected float $official_rate;

    /**
     * @var array
     */
    protected static array $aliases = [
        'Cur_ID' => 'id',
        'Date' => 'date',
        'Cur_Abbreviation' => 'abbreviation;',
        'Cur_Scale' => 'scale',
        'Cur_Name' => 'name',
        'Cur_OfficialRate' => 'official_rate',
    ];

    /**
     * @param mixed $value
     * @return void
     */
    public function setDateProperty(mixed $value): void
    {
        $this->date = Carbon::parse($value);
    }
}