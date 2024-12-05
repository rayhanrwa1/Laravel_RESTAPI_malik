<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'country';  

    protected $fillable = ['name', 'id_counrty'];

    public function country()
    {
        return $this->hasMany(Country::class);
    }
}
