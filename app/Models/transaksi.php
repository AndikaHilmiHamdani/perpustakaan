<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $primaryKey='trx_id';
    protected $fillable = [
        'trx_id',
        'kode_buku',
        'user_id',
        'tanggal_pinjam',
        'tanggal_kembali',
    ];
    public function books()
    {
        return $this->belongsTo(Books::class,'kode_buku','kode_buku');
    }
    public function users()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
