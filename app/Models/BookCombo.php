<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class BookCombo extends Model
{
    use Sortable;
    //
    protected $guarded = ['id'];
    public $sortable = [
        'fullname',
        'msisdn',
        'start_date',
        'combo_id',
        'status',
        'created_at'
    ];
}
