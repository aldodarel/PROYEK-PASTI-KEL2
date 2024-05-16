<?php

namespace App\Http\Controllers;

use App\jadwal_ibadah;
use App\WartaJemaat;
use App\Jemaat;
use App\Renungan;
use App\Keluarga;
use App\PelayanGereja;
use App\KeluargaJemaat;
use App\Sektor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RenunganController extends Controller
{
        public function index()
    {
        $jadwal_ibadah = jadwal_ibadah::latest()->take(3)->get(); 
        $warta_jemaat = WartaJemaat::latest()->take(3)->get(); 
        $renungan = Renungan::latest()->take(12)->get(); 

        return view('FE/Renungan.index', compact('jadwal_ibadah','warta_jemaat','renungan'));
    }
    public function detail($id)
    {
        $jadwal_ibadah = jadwal_ibadah::latest()->take(6)->get(); 
        $warta_jemaat = WartaJemaat::latest()->take(3)->get(); 
        $renungan = Renungan::latest()->take(9)->get(); 
        $renungan = DB::table('renungan')
        ->where('id', $id)
        ->get();
        return view('FE/Renungan.detail', ['renungan'=>$renungan], compact('jadwal_ibadah','warta_jemaat','renungan'));
    }
}
