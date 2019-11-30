<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class BookRoom extends Model
{
    use Sortable;
    //
    protected $guarded = ['id'];
    // protected $fillable = ['name', 'password', 'email'];.
    public $sortable = [
        'fullname',
        'msisdn',
        'room_id',
        'start_date'
    ];
}
