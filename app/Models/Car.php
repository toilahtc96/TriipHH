<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Car extends Model
{
    //
    use Sortable;
    //
    protected $guarded = ['id'];
    public $sortable = [
        'own_car',
        'msisdn',
        'price',
        'status',
        'car_type',
        'direction'
    ];
}
