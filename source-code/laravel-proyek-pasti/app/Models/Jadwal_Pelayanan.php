<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal_Pelayanan extends Model
{
    protected $table = 'jadwal_pelayanan';
    protected $fillable = [
        'status_pelayanan',
        'id_pelayan',
        'id_jadwal_ibadah'
    ];
    public function jadwalIbadah()
    {
        return $this->belongsTo(jadwal_ibadah::class, 'id_jadwal_ibadah', 'id');
    }
}
