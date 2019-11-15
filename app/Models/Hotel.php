<?php

namespace App\Models;

use App\Models\Location;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    //
    protected $guarded = ['id'];
    public function profile()
    {
        return $this->hasOne(Location::class, 'address_id');
    }
}
