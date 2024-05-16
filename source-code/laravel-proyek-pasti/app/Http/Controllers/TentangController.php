<?php

namespace App\Http\Controllers;

use App\jadwal_ibadah;
use App\WartaJemaat;
use App\Renungan;

use Illuminate\Http\Request;

class TentangController extends Controller
{
        public function index()
    {
        $jadwal_ibadah = jadwal_ibadah::latest()->take(3)->get(); 
        $warta_jemaat = WartaJemaat::latest()->take(6)->get();
        $renungan = Renungan::latest()->take(2)->get(); 

        return view('FE/Tentang.index', compact('jadwal_ibadah','warta_jemaat','renungan'));
    }
}
