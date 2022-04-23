<?php

namespace Kaswell\NbrbBankApi\Models;

use Kaswell\NbnbApi\Abstracts\Model;

/**
 * Class Currency
 * @package Kaswell\NbrbBankApi\Models
 *
 *
 * Cur_ID – внутренний код
 * Cur_ParentID – этот код используется для связи, при изменениях наименования, количества единиц к которому устанавливается курс белорусского рубля,
 *                буквенного, цифрового кодов и т.д. фактически одной и той же валюты*.
 * Cur_Code – цифровой код
 * Cur_Abbreviation – буквенный код
 * Cur_Name – наименование валюты на русском языке
 * Cur_Name_Bel – наименование на белорусском языке
 * Cur_Name_Eng – наименование на английском языке
 * Cur_QuotName – наименование валюты на русском языке, содержащее количество единиц
 * Cur_QuotName_Bel – наименование на белорусском языке, содержащее количество единиц
 * Cur_QuotName_Eng – наименование на английском языке, содержащее количество единиц
 * Cur_NameMulti – наименование валюты на русском языке во множественном числе
 * Cur_Name_BelMulti – наименование валюты на белорусском языке во множественном числе*
 * Cur_Name_EngMulti – наименование на английском языке во множественном числе*
 * Cur_Scale – количество единиц иностранной валюты
 * Cur_Periodicity – периодичность установления курса (0 – ежедневно, 1 – ежемесячно)
 * Cur_DateStart – дата включения валюты в перечень валют, к которым устанавливается официальный курс бел. рубля
 * Cur_DateEnd – дата исключения валюты из перечня валют, к которым устанавливается официальный курс бел. рубля
 */
class Currency extends Model
{
    /**
     * @var int
     */
    protected int $id;

    /**
     * @var int
     */
    protected int $parent_id;


    protected $code;
    protected string $abbreviation;
    protected string $name;
    protected string $name_bel;
    protected string $name_eng;
    protected string $quot_name;
    protected string $quot_name_bel;
    protected string $quot_name_eng;
    protected string $name_multi;
    protected string $name_multi_bel;
    protected string $name_multi_eng;
    protected $scale;
    protected $periodicity;
    protected $date_start;
    protected $date_end;
}