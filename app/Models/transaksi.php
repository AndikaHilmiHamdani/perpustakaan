<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';

    public function books()
    {
        return $this->belongsTo(Books::class);
    }
    // public function user()
    // {
    //     return $this->hasMany(User::class);
    // }
}
