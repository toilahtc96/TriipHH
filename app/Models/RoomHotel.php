<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class RoomHotel extends Model
{
    //
    use Sortable;
    protected $guarded = ['id'];
    public $sortable = [
        'hotel_id',
        'level',
        'status',
        'price'
    ];
}
