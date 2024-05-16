<?php

namespace App\Http\Controllers;

use App\jadwal_ibadah;
use App\WartaJemaat;
use App\Jemaat;
use App\Renungan;
use App\Keluarga;
use App\PelayanGereja;
use App\KeluargaJemaat;
use App\tata_ibadah;
use App\Sektor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TataUsahaController extends Controller
{
    function index(Request $request)
    {
        $keluarga = Keluarga::with(['jemaat', 'jemaat.sektor'])->paginate(10);

        if ($request->cari) {
            if ($request->cari == "Laki-laki") {
                $keluarga = Keluarga::where('jenis_kelamin',1)->latest()->paginate(10);
            } elseif ($request->cari == "Perempuan") {
                $keluarga = Keluarga::where('jenis_kelamin',2)->latest()->paginate(10);
            } else {
                $keluarga = Keluarga::where(function ($keluarga) use ($request) {
                    $keluarga->orWhere('no_kk', 'like', "%$request->cari%");
                    $keluarga->orWhere('nama_keluarga', 'like', "%$request->cari%");
                    $keluarga->orWhere('alamat', 'like', "%$request->cari%");
                    $keluarga->orWhere('no_telepon', 'like', "%$request->cari%");
                    $keluarga->orWhere('status', 'like', "%$request->cari%");
                    $keluarga->orWhere('tanggal_nikah', 'like', "%$request->cari%");
                })->latest()->paginate(10);
            }
        }
        $keluarga->appends(request()->input())->links();
        return view("tatausaha.index");
    }
    function datakeluarga(Request $request)
    {
        $datakeluarga = [
            [
                "name" => "JUMLAH KELUARGA",
                "jumlah" => Keluarga::count(),
                "color" => "bg-danger",
            ],
            [
                "name" => "JUMLAH JEMAAT",
                "jumlah" => Jemaat::all()->count(),
                "color" => "bg-primary",
            ],
            [
                "name" => "JUMLAH JEMAAT AKTIF",
                "jumlah" => Jemaat::all()->where("status", "Aktif")->count(),
                "color" => "bg-info",
            ],
        ];
        // Change this pagination if you want to increase pagination
        $keluarga = Keluarga::with(['jemaat', 'jemaat.sektor'])->paginate(10);
        return view('tatausaha.datakeluargatatausaha', [
            "datakeluargas" => $datakeluarga,
            "keluargas" => $keluarga
        ]);
    }
    function formkeluarga(Request $request)
    {

        return view("tatausaha.formkeluargatatausaha");
    }
    function search(Request $request){ 
        $datakeluarga = [
            [
                "name" => "JUMLAH KELUARGA",
                "jumlah" => Keluarga::count(),
                "color" => "bg-danger",
            ],
            [
                "name" => "JUMLAH JEMAAT",
                "jumlah" => Jemaat::all()->count(),
                "color" => "bg-primary",
            ],
            [
                "name" => "JUMLAH JEMAAT AKTIF",
                "jumlah" => Jemaat::all()->where("status", "Aktif")->count(),
                "color" => "bg-info",
            ],
        ];
        $search = $request-> get ('/tatausaha/data/keluarga/search/');
        $keluarga = Keluarga::where('nama_keluarga', 'like', '%'. $search. '%')->paginate(5);

        return view ('tatausaha.datakeluargasearch', ["keluargas" => $keluarga, "datakeluargas" => $datakeluarga]);
        
    }
    function formkeluargaprocess(Request $request)
    {

        $arrName = [];
        if ($request->hasFile("lampiran")) {

            $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx'];
            $files = $request->file('lampiran');
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();

                if (in_array($extension, $allowedfileExtension)) {
                    $str = rand();
                    $result = md5($str);
                    $name = time() . "-" . $result . '.' . $extension;
                    $file->move(public_path() . '/lampiran/keluarga/', $name);
                    array_push($arrName, '/lampiran/keluarga/' . $name);
                }
            }
        }
        $fileName = join("#", $arrName);
        $keluaraga = $request->validate([
            'no_kk'     => ['required'],
            'nama_keluarga'    => ['required'],
            'alamat'    => ['required'],
            'no_telepon'    => ['required'],
            'tanggal_nikah'    => ['required'],
            'lampiran'    => ['required'],
            'alamat'    => ['required'],

        ]);

        $keluaraga = new Keluarga();
        $keluaraga->no_kk = $request->no_kk;
        $keluaraga->nama_keluarga = $request->nama_keluarga;
        $keluaraga->alamat = $request->alamat;
        $keluaraga->no_telepon = $request->no_telepon;
        $keluaraga->tanggal_nikah = $request->tanggal_nikah;
        $keluaraga->lampiran = $fileName;


        if (!$keluaraga->save()) {
            if (count($arrName) > 1) {
                foreach ($arrName as $path) {
                    unlink(public_path() . $path);
                }
            }
        }
        return redirect()->route('tatausaha.datakeluargatatausaha')->with('success', 'Data Keluarga Sudah Berhasil Ditambahkan');
    }

    function detailkeluarga(Request $request, $id)
    {
        $keluarga = Keluarga::with(['jemaat', 'jemaat.sektor'])->where('no_kk', $id)->first();
        // echo ($keluarga);
        $lampiran = explode("#", $keluarga['lampiran']);
        $jemaat = DB::select('Select j.*, jk.status, s.nama as sektor_name FROM jemaat j INNER JOIN jemaat_keluarga jk ON j.nik = jk.nik INNER JOIN sektor s ON s.id =j.sektor_id WHERE jk.no_kk = ?', [$id]);
        return view('tatausaha.detailkeluarga', ["keluarga" => $keluarga, 'lampiran' => $lampiran,  'jemaats' => $jemaat]);
    }
    public function editdatakeluarga($id)
    {
        $keluarga = Keluarga::with(['jemaat', 'jemaat.sektor'])->where('no_kk', $id)->first();
        // echo ($keluarga);
        $lampiran = explode("#", $keluarga['lampiran']);
        $jemaat = DB::select('Select j.*, jk.status, s.nama as sektor_name FROM jemaat j INNER JOIN jemaat_keluarga jk ON j.nik = jk.nik INNER JOIN sektor s ON s.id =j.sektor_id WHERE jk.no_kk = ?', [$id]);
        return view('tatausaha.editdatakeluarga', ["keluarga" => $keluarga, 'lampiran' => $lampiran,  'jemaats' => $jemaat]);
    }
    function update(Request $request) {
        $no_kk = $request->no_kk;
        DB::table('keluarga')->where('no_kk', $no_kk)->update([
            'no_kk' => $request->no_kk,
            'nama_keluarga' => $request->nama_keluarga,
            'no_telepon' => $request->no_telepon,
            'tanggal_nikah' => $request->tanggal_nikah,
            'alamat' => $request->alamat,
            'status' => $request->status
        ]);
        return redirect()->route('tatausaha.datakeluargatatausaha')->with('success', 'Data Keluarga Sudah Berhasil Diubah');
    }
    function datajemaat(){
        $datajemaat = [
            [
                "name" => "JUMLAH JEMAAT",
                "jumlah" => Jemaat::count(),
                "color" => "bg-danger",
            ],
            [
                "name" => "JUMLAH LAKI LAKI",
                "jumlah" => Jemaat::all()->where("jenis_kelamin", "Laki-laki")->count(),
                "color" => "bg-primary",
            ],
            [
                "name" => "JUMLAH PEREMPUAN",
                "jumlah" => Jemaat::all()->where("jenis_kelamin", "Perempuan")->count(),
                "color" => "bg-info",
            ],
        ];
        // Change this pagination if you want to increase pagination
        $jemaat = Jemaat::paginate(10);
        return view('tatausaha.datajemaattatausaha', [
            "datajemaats" => $datajemaat,
            "jemaats" => $jemaat
        ]);
    }

    function formjemaat(Request $request, $idKeluarga)
    {
        $sektors = Sektor::get();
        $keluarga = Keluarga::where('no_kk', $idKeluarga)->first();

        return view('tatausaha.formjemaat', ['sektors' => $sektors, 'keluarga' => $keluarga]);
    }

    function formjemaatprocess(Request $request, $idKeluarga)
    {
        $lampiran = [];
        $profile = "profile/default.png";
        if ($request->hasFile('lampiran')) {
            foreach ($request->file('lampiran') as $file) {
                $str = rand();
                $result = md5($str);
                $extension = $file->getClientOriginalExtension();
                $name = time() . "-" . $result . '.' . $extension;
                $file->move(public_path() . '/lampiran/jemaat/', $name);
                array_push($lampiran, '/lampiran/jemaat/' . $name);
            }
        }

        if ($request->hasFile("profile")) {
            $file = $request->file("profile");
            $extension = $file->getClientOriginalExtension();
            $str = rand();
            $result = md5($str);
            $name = time() . "-" . $result . '.' . $extension;

            $file->move(public_path() . '/profile/jemaat/', $name);

            $profile = '/profile/jemaat/' . $name;
        }
        $jemaat = $request->validate([
            'nik'     => ['required'],
            'name'    => ['required'],
            'username'    => ['required'],
            'alamat'    => ['required'],
            'tempat_lahir'    => ['required'],
            'tanggal_lahir'    => ['required'],
            'tanggal_baptis'    => ['required'],
            'tanggal_sidih'    => ['required'],
            'profile'    => ['required'],
            'lampiran'    => ['required']
        ]);

        $jemaat = new Jemaat();
        $jemaat->nik = $request->nik;
        $jemaat->name = $request->name;
        $jemaat->username = $request->username;
        $jemaat->jenis_kelamin = $request->jenis_kelamin;
        echo( $request->jenis_kelamin);
        $jemaat->password = '$2y$10$6CKLlz1uX4TVdHzxgs1VseEzAuW7EncHNo2Pa/bsNWN2UMHCRqDtG';
        $jemaat->alamat = $request->alamat;
        $jemaat->alamat = $request->alamat;
        $jemaat->tempat_lahir = $request->tempat_lahir;
        $jemaat->tanggal_lahir = $request->tanggal_lahir;
        $jemaat->status = $request->status;
        $jemaat->status_pernikahan = $request->status_pernikahan;
        $jemaat->tanggal_baptis = $request->tanggal_baptis;
        $jemaat->tanggal_sidih = $request->tanggal_sidih;
        $jemaat->sektor_role = $request->sektor_role;
        $jemaat->profile = $profile;
        $jemaat->sektor_id = $request->sektor_id;
        $jemaat->lampiran = join("#", $lampiran);

        if (!$jemaat->save()) {
            unlink(public_path() . $profile);
            foreach ($lampiran as $l) {
                unlink(public_path() . $l);
            }
        } else {
            $jemaat_keluarga = new KeluargaJemaat();
            $jemaat_keluarga->nik = $request->nik;
            $jemaat_keluarga->no_kk = $idKeluarga;
            $jemaat_keluarga->status = $request->posisi_di_keluarga;

            if (!$jemaat_keluarga->save()) {
                Jemaat::where("nik", $request->nik)->delete();
                unlink(public_path() . $profile);
                foreach ($lampiran as $l) {
                    unlink(public_path() . $l);
                }
            }

            return redirect('/tatausaha/data/keluarga/' . $idKeluarga)->with('success', 'Data Jemaat Sudah Berhasil Ditambahkan');
        }
    }

    function datastatistik(){
        $datastatistik = [
                [
                    "name"=> "JUMLAH JEMAAT",
                    "jumlah"=> Jemaat::count(),
                    "color"=> "bg-success",
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

        $sektor = \App\Sektor::all();

        //Data Untuk Grafik
        $categories = [];

        foreach($sektor as $si){
            $categories[] = $si->nama;
        }

        // Change this pagination if you want to increase pagination
        $jemaat = Jemaat::paginate(10);
        return view('tatausaha.datastatistik', [
            "datajemaats" => $datastatistik,
            "jemaats" => $jemaat,
            "categories" =>  $categories
        ]);
    }
    function detailjemaat(Request $request, $nik){
        $jemaat = Jemaat::where("nik", $nik)->first();
        $lampiran = explode("#", $jemaat['lampiran']);
        return view('tatausaha.detailjemaat', ['jemaat'=> $jemaat,'lampiran'=> $lampiran]);
    }
    function editdetailjemaat(Request $request, $nik){
        $jemaat = Jemaat::where("nik", $nik)->first();
        $lampiran = explode("#", $jemaat['lampiran']);
        return view('tatausaha.editdatajemaat', ['jemaat'=> $jemaat,'lampiran'=> $lampiran]);
    }
    function updateJemaat(Request $request) {
        $nik = $request->nik;
        DB::table('jemaat')->where('nik', $nik)->update([
            'nik' => $request->nik,
            'name' => $request->name,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'status' => $request->status,
            'status_pernikahan' => $request->status_pernikahan,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_baptis' => $request->tanggal_baptis,
            'tanggal_sidih' => $request->tanggal_sidih,
            'sektor_role' => $request->sektor_role
        ]);
        

        return back()->with('success', 'Data Jemaat Sudah Berhasil Diubah');
    }
    function pelayan()
    {
        $pelayan = PelayanGereja::with(['jemaat', 'jemaat.sektor'])->paginate(10);
        return view('tatausaha.datapelayantatausaha', [
            "pelayanas" => $pelayan
        ]);   
    }
    function formpelayan(Request $request)
    {

        return view("tatausaha.formdatapelayantatausaha");
    }
    function formpelayanprocess(Request $request)
    {
        $arrName = [];

        $pelayanas = new PelayanGereja();
        $pelayanas->nik = $request->nik;
        $pelayanas->peran = $request->peran;
        $pelayanas->tanggal_terima_jabatan = $request->tanggal_terima_jabatan;
        $pelayanas->tanggal_akhir_jabatan = $request->tanggal_akhir_jabatan;
        
        if (!$pelayanas->save()) {
            if (count($arrName) > 1) {
                foreach ($arrName as $path) {
                    unlink(public_path() . $path);
                }
            }
        }
        return redirect('/tatausaha/pelayangereja')->with('success', 'Data Pelayan Berhasil Disimpan!');
    }
    public function editdatapelayan($id)
    {
        $pelayan = PelayanGereja::with(['jemaat', 'jemaat.sektor'])->where('nik', $id)->first();
        // echo ($keluarga);
       
        return view('tatausaha.editpelayan', [
            "pelayanas" => $pelayan
        ]);   
    }
    function updatedatapelayan(Request $request) {
        $nik = $request->nik;
        DB::table('pelayan_gereja')->where('nik', $nik)->update([
            'nik' => $request->nik,
            'peran' => $request->peran,
            'tanggal_terima_jabatan' => $request->tanggal_terima_jabatan,
            'tanggal_akhir_jabatan' => $request->tanggal_akhir_jabatan,
           
        ]);
        return redirect('tatausaha/pelayangereja')->with('success', 'Data Pelayan Sudah Berhasil Diubah');
    }
    public function showjadwal()
    {
        $jadwal_ibadah = jadwal_ibadah::latest()->take(100)->get(); 
        $warta_jemaat = WartaJemaat::latest()->take(10)->get(); 

        return view('tatausaha.jadwal', compact('jadwal_ibadah','warta_jemaat'));
    }
    public function createjadwal()
    {
            return view('tatausaha.createjadwal');
    }
    public function storejadwal(Request $request)
    {
        $data = $request->validate([
            'name'     => ['required'],
            'tanggal'    => ['required'],
            'waktu'    => ['required'],
            'pengulangan'    => ['required'],

        ]);

        

        jadwal_ibadah::create($data);

        return redirect()->route('tatausaha.jadwal')->with('success','Jadwal ibadah berhasil ditambahkan!');
    }
    public function editjadwal($id)
    {
        $warta_jemaat = DB::table('jadwal_ibadah')
        ->where('id', $id)
        ->get();
        return view('tatausaha.editjadwal', ['jadwal_ibadah'=>$warta_jemaat]);
    }
    function updatejadwal(Request $request) {
        $id = $request->id;
        DB::table('jadwal_ibadah')->where('id', $id)->update([
            'name' => $request->name,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'pengulangan' => $request->pengulangan,
        ]);
        return redirect()->route('tatausaha.jadwal')->with('success', 'Jadwal Ibadah Sudah Berhasil Diubah');
    }
    public function showrenungan()
    {
        $jadwal_ibadah = jadwal_ibadah::latest()->take(100)->get(); 
        $warta_jemaat = WartaJemaat::latest()->take(10)->get(); 
        $renungan = Renungan::latest()->take(10)->get(); 
        

        return view('tatausaha.renunganshow', compact('jadwal_ibadah','warta_jemaat','renungan'));
    }
    public function createrenungan()
    {
            return view('tatausaha.createrenungan');
    }
    public function storerenungan(Request $request)
    {
        $data = $request->validate([
            'tanggal'     => ['required'],
            'title'    => ['required'],
            'isi'    => ['required'],
            'ayat'    => ['required'],

        ]);

        Renungan::create($data);

        return redirect()->route('tatausaha.renunganshow')->with('success','Renungan berhasil ditambahkan!');
    }
    public function editrenungan($id)
    {
        $renungan = DB::table('renungan')
        ->where('id', $id)
        ->get();
        return view('tatausaha.editrenungan', ['renungan'=>$renungan]);
    }
    function updaterenungan(Request $request) {
        $id = $request->id;
        DB::table('renungan')->where('id', $id)->update([
            'tanggal' => $request->tanggal,
            'title' => $request->title,
            'isi' => $request->isi,
            'ayat' => $request->ayat,
        ]);
        return redirect()->route('tatausaha.renunganshow')->with('success', 'Renungan Sudah Berhasil Diubah');
    }
    function detailtataibadah()
    {
        $jadwal_ibadah = jadwal_ibadah::latest()->take(100)->get(); 
        $tata_ibadah = tata_ibadah::latest()->take(10)->get(); 
        $renungan = Renungan::latest()->take(10)->get();
        return view('tatausaha.detailibadah', compact('jadwal_ibadah','tata_ibadah','renungan'));
    }
    public function createtata()
    {
            return view('tatausaha.createtata');
    }
    function formibadah(Request $request)
    {

        return view("tatausaha.tambahibadah");
    }

    function tatastore(Request $request)
    {

        $arrName = [];
        
        if ($request->hasFile('lampiran')) {
            foreach ($request->file('lampiran') as $file) {
                $str = rand();
                $result = md5($str);
                $extension = $file->getClientOriginalExtension();
                $name = time() . "-" . $result . '.' . $extension;
                $file->move(public_path() . '/lampiran/tataibadah/', $name);
                array_push($arrName, '/lampiran/tataibadah/' . $name);
            }
        }
        $fileName = join("#", $arrName);

        $ibadah = new tata_ibadah();
        $ibadah->nama = $request->nama;
        $ibadah->tanggal = $request->tanggal;
        $ibadah->lampiran = $fileName;

        if (!$ibadah->save()) {
            foreach ($arrName as $l) {
                unlink(public_path() . $l);
            }
        }
        return redirect()->route('tatausaha.detailibadah')->with('success', 'Tata Ibadah Sudah Berhasil Ditambahkan');
    }
    public function edittataibadah($id)
    {
        $tata_ibadah = DB::table('tata_ibadah')
        ->where('id', $id)
        ->get();
        return view('tatausaha.edittataibadah', ['tata_ibadah'=>$tata_ibadah]);
    }
    function updatetataibadah(Request $request) {
        $id = $request->id;
        DB::table('tata_ibadah')->where('id', $id)->update([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal
        ]);
        return redirect()->route('tatausaha.detailibadah')->with('success', 'Tata Ibadah Sudah Berhasil Diubah');
    }
}
