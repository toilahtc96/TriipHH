<?php

namespace App\Models;

use App\Models\Location;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Hotel extends Model
{
    //
    use Sortable;
    protected $guarded = ['id'];
    public function profile()
    {
        return $this->hasOne(Location::class, 'address_id');
    }
    public $sortable = [
      
        ''
    ];
}
