<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class ContactInfo extends Model
{
    use Sortable;
    //
    protected $guarded = ['id'];
    public $sortable = [
        'created_at'
    ];
}
