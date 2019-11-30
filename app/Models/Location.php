<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Location extends Model
{
    //
    use Sortable;
    protected $guarded = ['id'];
    public $sortable = [
        'location_name',
        'status'
    ];
}
