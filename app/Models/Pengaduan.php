<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table='pengaduan';
    protected $fillable = ['users_id','nopelanggan','nama','alamat','kategori','keterangan','fotoaduan','status','balasan','fotobalasan'];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

}
