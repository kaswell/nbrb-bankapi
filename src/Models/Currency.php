<?php

namespace Kaswell\NbrbBankApi\Models;

/**
 * Class Currency
 * @package Kaswell\NbrbBankApi\Models
 */
class Currency
{
    protected $id;
    protected $parent_id;
    protected $code;
    protected $abbreviation;
    protected $name;
    protected $name_bel;
    protected $name_eng;
    protected $quot_name;
    protected $quot_name_bel;
    protected $quot_name_eng;
    protected $name_multi;
    protected $name_multi_bel;
    protected $name_multi_eng;
    protected $scale;
    protected $periodicity;
    protected $date_start;
    protected $date_end;
}