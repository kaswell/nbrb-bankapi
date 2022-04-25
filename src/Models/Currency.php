<?php

namespace Kaswell\NbrbBankApi\Models;

use Carbon\Carbon;
use Kaswell\NbrbBankApi\Abstracts\Model;

/**
 * Class Currency
 * @package Kaswell\NbrbBankApi\Models
 */
class Currency extends Model
{
    /**
     * @var int
     * внутренний код
     */
    protected int $id;

    /**
     * @var int
     * этот код используется для связи, при изменениях наименования, количества
     * единиц к которому устанавливается курс белорусского рубля,
     * буквенного, цифрового кодов и т.д. фактически одной и той же валюты
     */
    protected int $parent_id;

    /**
     * @var int
     * цифровой код
     */
    protected int $code;

    /**
     * @var string
     * буквенный код
     */
    protected string $abbreviation;

    /**
     * @var string
     * наименование валюты на русском языке
     */
    protected string $name;

    /**
     * @var string
     * наименование на белорусском языке
     */
    protected string $name_bel;

    /**
     * @var string
     * наименование на английском языке
     */
    protected string $name_eng;

    /**
     * @var string
     * наименование валюты на русском языке, содержащее количество единиц
     */
    protected string $quot_name;

    /**
     * @var string
     * наименование на белорусском языке, содержащее количество единиц
     */
    protected string $quot_name_bel;

    /**
     * @var string
     * наименование на английском языке, содержащее количество единиц
     *
     */
    protected string $quot_name_eng;

    /**
     * @var string
     * наименование валюты на русском языке во множественном числе
     */
    protected string $name_multi;

    /**
     * @var string
     * наименование валюты на белорусском языке во множественном числе
     */
    protected string $name_multi_bel;

    /**
     * @var string
     * наименование на английском языке во множественном числе
     */
    protected string $name_multi_eng;

    /**
     * @var float
     * количество единиц иностранной валюты
     */
    protected float $scale;

    /**
     * @var int
     * периодичность установления курса (0 – ежедневно, 1 – ежемесячно)
     */
    protected int $periodicity;

    /**
     * @var Carbon
     * дата включения валюты в перечень валют, к которым устанавливается официальный курс бел. рубля
     */
    protected Carbon $date_start;

    /**
     * @var Carbon
     * дата исключения валюты из перечня валют, к которым устанавливается официальный курс бел. рубля
     */
    protected Carbon $date_end;

    /**
     * @var array
     */
    protected static array $aliases = [
        'Cur_ID' => 'id',
        'Cur_ParentID' => 'parent_id',
        'Cur_Code' => 'code',
        'Cur_Abbreviation' => 'abbreviation',
        'Cur_Name' => 'name',
        'Cur_Name_Bel' => 'name_bel',
        'Cur_Name_Eng' => 'name_eng',
        'Cur_QuotName' => 'quot_name',
        'Cur_QuotName_Bel' => 'quot_name_bel',
        'Cur_QuotName_Eng' => 'quot_name_eng',
        'Cur_NameMulti' => 'name_multi',
        'Cur_Name_BelMulti' => 'name_multi_bel',
        'Cur_Name_EngMulti' => 'name_multi_eng',
        'Cur_Scale' => 'scale',
        'Cur_Periodicity' => 'periodicity',
        'Cur_DateStart' => 'date_start',
        'Cur_DateEnd' => 'date_end'
    ];
}