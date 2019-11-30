<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class BookCar extends Model
{
    use Sortable;
    //
    protected $guarded = ['id'];
    // protected $fillable = ['name', 'password', 'email'];.
    public $sortable = [
        'fullname',
        'msisdn',
        'car_id',
        'start_date'
    ];
}
