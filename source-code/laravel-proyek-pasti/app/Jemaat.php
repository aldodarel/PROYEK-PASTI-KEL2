<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// use App\PelayanGereja;
class Jemaat extends Model
{
    //
    protected $table = 'jemaat';
    protected $fillable = ['nik'];
    
    public function pelayanGereja(){
        return $this->hasOne('App\PelayanGereja', 'nik', "nik");
    }
    public function keluarga(){
        return $this->belongsToMany("App\Keluarga", "keluarga", "nik", "no_kk", "nik", "no_kk");
    }

    public function sektor(){
        return $this->belongsTo("App\Sektor", "sektor_id", "id");
    }
    public function getAvatar()
    {
        if (!$this->profile) {
            return asset('profile/default.png');
        }
        return asset('profile/' . $this->profile);
    }
}
