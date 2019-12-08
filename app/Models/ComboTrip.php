<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class ComboTrip extends Model
{
    use Sortable;
    //
    protected $guarded = ['id'];
    public $sortable = [
        'start_time',
        'hotel_id',
        'room_id',
        'car_id',
        'combo_type_id',
        'end_date',
        'price',
        'status',
        'combo_trip_name'
    ];
}
