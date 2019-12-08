<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class BookCustomTrip extends Model
{
    use Sortable;
    //
    protected $guarded = ['id'];
    public $sortable = [
        'fullname',
        'msisdn',
        'car_id',
        'room_id',
        'start_date',
        'pickup_place_id'
    ];
}
