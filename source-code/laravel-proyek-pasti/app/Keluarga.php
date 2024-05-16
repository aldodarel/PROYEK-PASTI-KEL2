<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    //
    protected $table = "keluarga";

    public function jemaat(){
        return $this->belongsToMany("App\Jemaat", "jemaat_keluarga", "no_kk", "nik", "no_kk", "nik");
    }
}
