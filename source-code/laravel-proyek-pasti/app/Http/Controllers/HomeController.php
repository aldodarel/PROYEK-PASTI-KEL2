<?php

namespace App\Http\Controllers;

use App\jadwal_ibadah;
use App\WartaJemaat;
use App\Jemaat;
use App\Renungan;
use App\Keluarga;
use App\Tataibadah;

use Illuminate\Http\Request;

class HomeController extends Controller
{
        public function index()
    {
        $jadwal_ibadah = jadwal_ibadah::latest()->take(3)->get(); 
        $jadwal_ibadah2 = jadwal_ibadah::latest()->take(5)->get(); 
        $warta_jemaat = WartaJemaat::latest()->take(3)->get();
        $renungan = Renungan::latest()->take(3)->get();
        $renungan1 = Renungan::latest()->take(1)->get();  
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
                "color"=> "bg-warning",
            ],
            [
                "name"=> "JUMLAH JEMAAT TIDAK AKTIF",
                "jumlah"=> Jemaat::all()->where("status", "Pindah", "Meninggal")->count(),
                "color"=> "bg-danger",
            ],
        ];
        // Change this pagination if you want to increase pagination
        $keluarga = Keluarga::with(['jemaat', 'jemaat.sektor'])->paginate(1);
        return view('FE.home.index', compact('jadwal_ibadah','jadwal_ibadah2','warta_jemaat','renungan', 'renungan1', 'tata_ibadah'), [
            "datakeluargas"=> $datakeluarga,
            "keluargas" => $keluarga,
            "title" => "index"
        ]);
    }

    function ibadah()  {
        return view('FE.home.tataibadah',[
            "title" => "ibadah"
        ]);
    }

    function renungan() {
        return view('FE.home.renungan',[
            "title" => "renungan"
        ]);
    }

    function dashboardjemaat(Request $request)
    {
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
                "color"=> "bg-warning",
            ],
            [
                "name"=> "JUMLAH JEMAAT TIDAK AKTIF",
                "jumlah"=> Jemaat::all()->where("status", "Pindah", "Meninggal")->count(),
                "color"=> "bg-danger",
            ]
        ];
        // Change this pagination if you want to increase pagination
        $keluarga = Keluarga::with(['jemaat', 'jemaat.sektor'])->paginate(1);
        return view('Home.jemaat', [
            "datakeluargas"=> $datakeluarga,
            "keluargas" => $keluarga
        ]);
    }
    function dashboard(Request $request)
    {
        $datakeluarga = [
            [
                "name" => "JUMLAH KELUARGA",
                "jumlah" => Keluarga::count(),
                "color" => "bg-primary",
                "icon" => "fa-users",
            ],
            [
                "name" => "JUMLAH JEMAAT",
                "jumlah" => Jemaat::all()->count(),
                "color" => "bg-primary",
                "icon" => "fa-user",
            ],
            [
                "name" => "JUMLAH LAKI LAKI",
                "jumlah" => Jemaat::all()->where("jenis_kelamin", "Laki-laki")->count(),
                "color" => "bg-info",
                "icon" => "fa-male",
            ],
            [
                "name" => "JUMLAH PEREMPUAN",
                "jumlah" => Jemaat::all()->where("jenis_kelamin", "Perempuan")->count(),
                "color" => "bg-pink",
                "icon" => "fa-female",
            ],
            [
                "name" => "JUMLAH JEMAAT AKTIF",
                "jumlah" => Jemaat::all()->where("status", "Aktif")->count(),
                "color" => "bg-success",
                "icon" => "fa-user",
            ],
            [
                "name" => "JUMLAH JEMAAT TIDAK AKTIF",
                "jumlah" => Jemaat::all()->where("status", "Pindah", "Meninggal")->count(),
                "color" => "bg-danger",
                "icon" => "fa-user-times",
            ],
        ];
        // Change this pagination if you want to increase pagination
        $keluarga = Keluarga::with(['jemaat', 'jemaat.sektor'])->paginate(1);
        return view('Home.index', [
            "datakeluargas"=> $datakeluarga,
            "keluargas" => $keluarga
        ]);
    }
    function dashboardTatausaha(Request $request)
    {
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
                "color"=> "bg-warning",
            ],
            [
                "name"=> "JUMLAH JEMAAT TIDAK AKTIF",
                "jumlah"=> Jemaat::all()->where("status", "Pindah", "Meninggal")->count(),
                "color"=> "bg-danger",
            ]
        ];
        // Change this pagination if you want to increase pagination
        $keluarga = Keluarga::with(['jemaat', 'jemaat.sektor'])->paginate(1);
        return view('Home.tatausaha', [
            "datakeluargas"=> $datakeluarga,
            "keluargas" => $keluarga
        ]);
    }
    function dashboardpenatua(Request $request)
    {
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
                "color"=> "bg-warning",
            ],
            [
                "name"=> "JUMLAH JEMAAT TIDAK AKTIF",
                "jumlah"=> Jemaat::all()->where("status", "Pindah", "Meninggal")->count(),
                "color"=> "bg-danger",
            ]
        ];
        // Change this pagination if you want to increase pagination
        $keluarga = Keluarga::with(['jemaat', 'jemaat.sektor'])->paginate(1);
        return view('Home.penatua', [
            "datakeluargas"=> $datakeluarga,
            "keluargas" => $keluarga
        ]);
    }
    function dashboardbendahara(Request $request)
    {
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
                "color"=> "bg-warning",
            ],
            [
                "name"=> "JUMLAH JEMAAT TIDAK AKTIF",
                "jumlah"=> Jemaat::all()->where("status", "Pindah", "Meninggal")->count(),
                "color"=> "bg-danger",
            ]
        ];
        // Change this pagination if you want to increase pagination
        $keluarga = Keluarga::with(['jemaat', 'jemaat.sektor'])->paginate(1);
        return view('Home.bendahara', [
            "datakeluargas"=> $datakeluarga,
            "keluargas" => $keluarga
        ]);
    }
    function dashboardsekretaris(Request $request)
    {
        $datakeluarga = [
            [
                "name"=> "JUMLAH KELUARGA",
                "jumlah"=> Keluarga::count(),
                "color"=> "bg-success",
            ],
            [
                "name"=> "JUMLAH LAKI LAKI",
                "jumlah"=> Jemaat::all()->where("jenis_kelamin", "Laki-laki")->count(),
                "color"=> "bg-primary",
            ],
            [
                "name"=> "JUMLAH PEREMPUAN",
                "jumlah"=> Jemaat::all()->where("jenis_kelamin", "Perempuan")->count(),
                "color"=> "bg-info",
            ],
            [
                "name"=> "JUMLAH JEMAAT AKTIF",
                "jumlah"=> Jemaat::all()->where("status", "Aktif")->count(),
                "color"=> "bg-warning",
            ],
            [
                "name"=> "JUMLAH JEMAAT TIDAK AKTIF",
                "jumlah"=> Jemaat::all()->where("status", "Aktif")->count(),
                "color"=> "bg-danger",
            ],
            [
                "name"=> "JUMLAH JEMAAT MENIKAH",
                "jumlah"=> Jemaat::all()->where("status_pernikahan", "Menikah")->count(),
                "color"=> "bg-secondary",
            ],
        ];
        // Change this pagination if you want to increase pagination
        $keluarga = Keluarga::with(['jemaat', 'jemaat.sektor'])->paginate(1);
        return view('Home.sekretaris', [
            "datakeluargas"=> $datakeluarga,
            "keluargas" => $keluarga
        ]);
    }
    
}