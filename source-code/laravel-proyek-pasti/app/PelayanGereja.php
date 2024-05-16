<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

// use App\Jemaat;

class PelayanGereja extends Model
{
    //
    protected $table = "pelayan_gereja";

    // Definisi relasi dengan JadwalPelayanan
    public function jadwalPelayanan()
    {
        return $this->belongsTo(Jadwal_Pelayanan::class, 'nik', 'id_pelayan');
    }

    public function jemaat(){
        return $this->belongsTo('App\Jemaat',"nik", "nik");
    }
}
