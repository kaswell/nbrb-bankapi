<?php

namespace Kaswell\NbrbBankApi\Models;

use Kaswell\NbnbApi\Abstracts\Model;

/**
 * Class Currency
 * @package Kaswell\NbrbBankApi\Models
 */
class Currency extends Model
{
    protected int $id;
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