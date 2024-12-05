<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    // Tentukan nama tabel jika tidak mengikuti konvensi
    protected $table = 'authors';  // Jika tabel Anda bernama 'authors'

    // Tentukan kolom yang bisa diisi (Mass Assignment)
    protected $fillable = ['name'];

    // Definisikan relasi jika ada
    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }
}
