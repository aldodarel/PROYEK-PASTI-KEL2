<?php

namespace App\Http\Controllers;


use App\jadwal_ibadah;
use App\WartaJemaat;
use App\Jemaat;
use App\Renungan;
use App\Keluarga;
use App\Tataibadah;

use Illuminate\Http\Request;

class DataGerejaController extends Controller
{
    public function index()
    {
        $jadwal_ibadah = jadwal_ibadah::latest()->take(3)->get(); 
        $warta_jemaat = WartaJemaat::latest()->take(6)->get();
        $renungan = Renungan::latest()->take(2)->get(); 
        $tata_ibadah = Tataibadah::latest()->take(9)->get();
        
        $datakeluarga = [
            [
                "name"=> "JUMLAH KELUARGA",
                "jumlah"=> Keluarga::count(),
                "color"=> "bg-success",
            ],
            [
                "name"=> "JUMLAH JEMAAT",
                "jumlah"=> Jemaat::all()->count(),
                "color"=> "bg-info",
            ],
            [
                "name"=> "JUMLAH LAKI LAKI",
                "jumlah"=> Jemaat::all()->where("jenis_kelamin", "Laki-laki")->count(),
                "color"=> "bg-primary",
            ],
            [
                "name"=> "JUMLAH PEREMPUAN",
                "jumlah"=> Jemaat::all()->where("jenis_kelamin", "Perempuan")->count(),
                "color"=> "bg-pink",
            ],
            [
                "name"=> "JUMLAH JEMAAT AKTIF",
                "jumlah"=> Jemaat::all()->where("status", "Aktif")->count(),
                "color"=> "bg-yellow",
            ],
            [
                "name"=> "JUMLAH JEMAAT TIDAK AKTIF",
                "jumlah"=> Jemaat::all()->where("status", "Pindah", "Meninggal")->count(),
                "color"=> "bg-danger",
            ],
            [
                "name"=> "JUMLAH JEMAAT SEKTOR OKULI",
                "jumlah"=> Jemaat::all()->where("sektor_id", "1")->count(),
                "color"=> "bg-warning",
            ],
            [
                "name"=> "JUMLAH JEMAAT SEKTOR LETARE",
                "jumlah"=> Jemaat::all()->where("sektor_id", "2")->count(),
                "color"=> "bg-warning",
            ],
            [
                "name"=> "JUMLAH JEMAAT SEKTOR JOSUA",
                "jumlah"=> Jemaat::all()->where("sektor_id", "3")->count(),
                "color"=> "bg-warning",
            ],
            [
                "name"=> "JUMLAH JEMAAT SEKTOR AEK JORDAN",
                "jumlah"=> Jemaat::all()->where("sektor_id", "4")->count(),
                "color"=> "bg-warning",
            ],
            [
                "name"=> "JUMLAH JEMAAT SEKTOR ESTOMIHI",
                "jumlah"=> Jemaat::all()->where("sektor_id", "5")->count(),
                "color"=> "bg-warning",
            ],
            [
                "name"=> "JUMLAH JEMAAT SEKTOR ROGATE",
                "jumlah"=> Jemaat::all()->where("sektor_id", "6")->count(),
                "color"=> "bg-warning",
            ],
            [
                "name"=> "JUMLAH JEMAAT SEKTOR SION",
                "jumlah"=> Jemaat::all()->where("sektor_id", "7")->count(),
                "color"=> "bg-warning",
            ],
        ];
        // Change this pagination if you want to increase pagination
        $keluarga = Keluarga::with(['jemaat', 'jemaat.sektor'])->paginate(1);
        return view('FE.DataGereja.index', compact('jadwal_ibadah','warta_jemaat','renungan', 'tata_ibadah'), [
            "datakeluargas"=> $datakeluarga,
            "keluargas" => $keluarga
        ]);
    }
}

