<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Quote extends Model
{
    protected $fillable = ['id', 'content'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
