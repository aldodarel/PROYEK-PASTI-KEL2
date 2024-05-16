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
use App\Baptis;
use App\Models\Sidi;
use App\Jadwal_Pelayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PendetaController extends Controller
{ 
    //
    function index(Request $request)
    {
        return view("Pendeta.index");
    }
    function datakeluarga(Request $request)
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
                "name" => "JUMLAH JEMAAT AKTIF",
                "jumlah" => Jemaat::all()->where("status", "Aktif")->count(),
                "color" => "bg-success",
                "icon" => "fa-user",
            ],
        ];
        // Change this pagination if you want to increase pagination
        $keluarga = Keluarga::with(['jemaat', 'jemaat.sektor'])->paginate(10);
        return view('Pendeta.datakeluarga', [
            "datakeluargas" => $datakeluarga,
            "keluargas" => $keluarga
        ]);
    }

    function formkeluarga(Request $request)
    {

        return view("Pendeta.formkeluarga");
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
            // 'no_telepon'    => ['required'],
            'tanggal_nikah'    => ['required'],
            'lampiran'    => ['required'],
            'alamat'    => ['required'],

        ]);

        $keluaraga = new Keluarga();
        $keluaraga->no_kk = $request->no_kk;
        $keluaraga->nama_keluarga = $request->nama_keluarga;
        $keluaraga->alamat = $request->alamat;
        // $keluaraga->no_telepon = $request->no_telepon;
        $keluaraga->tanggal_nikah = $request->tanggal_nikah;
        $keluaraga->lampiran = $fileName;
        
        if (!$keluaraga->save()) {
            if (count($arrName) > 1) {
                foreach ($arrName as $path) {
                    unlink(public_path() . $path);
                }
            }
        }
        return redirect()->route('pendeta.datakeluarga')->with('success', 'Data Keluarga Berhasil Disimpan!');
    }

    function detailkeluarga(Request $request, $id)
    {
        $keluarga = Keluarga::with(['jemaat', 'jemaat.sektor'])->where('no_kk', $id)->first();
        // echo ($keluarga);
        $lampiran = explode("#", $keluarga['lampiran']);
        $jemaat = DB::select('Select j.*, jk.status, s.nama as sektor_name FROM jemaat j INNER JOIN jemaat_keluarga jk ON j.nik = jk.nik INNER JOIN sektor s ON s.id =j.sektor_id WHERE jk.no_kk = ?', [$id]);
        return view('Pendeta.detailkeluarga', ["keluarga" => $keluarga, 'lampiran' => $lampiran,  'jemaats' => $jemaat]);
    }
    public function editdatakeluarga($id)
    {
        $keluarga = Keluarga::with(['jemaat', 'jemaat.sektor'])->where('no_kk', $id)->first();
        // echo ($keluarga);
        $lampiran = explode("#", $keluarga['lampiran']);
        $jemaat = DB::select('Select j.*, jk.status, s.nama as sektor_name FROM jemaat j INNER JOIN jemaat_keluarga jk ON j.nik = jk.nik INNER JOIN sektor s ON s.id =j.sektor_id WHERE jk.no_kk = ?', [$id]);
        return view('Pendeta.editdatakeluarga', ["keluarga" => $keluarga, 'lampiran' => $lampiran,  'jemaats' => $jemaat]);
    }
    function update(Request $request) {
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

        $no_kk = $request->no_kk;
        DB::table('keluarga')->where('no_kk', $no_kk)->update([
            'no_kk' => $request->no_kk,
            'nama_keluarga' => $request->nama_keluarga,
            // 'no_telepon' => $request->no_telepon,
            'tanggal_nikah' => $request->tanggal_nikah,
            'alamat' => $request->alamat,
            'status' => $request->status,
            'lampiran' => $fileName
        ]);
        return redirect()->route('pendeta.datakeluarga')->with('success', 'Data Keluarga Berhasil Diubah!');
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
        return view('Pendeta.datajemaat', [
            "datajemaats" => $datajemaat,
            "jemaats" => $jemaat
        ]);
    }

    function formjemaat(Request $request, $idKeluarga)
    {
        $sektors = Sektor::get();
        $keluarga = Keluarga::where('no_kk', $idKeluarga)->first();

        return view('Pendeta.formjemaat', ['sektors' => $sektors, 'keluarga' => $keluarga]);
    }

    function formjemaatprocess(Request $request, $idKeluarga)
    {
        $arrName = [];
        $arrNameProfile = [];
        $arrNameBaptis = [];
        $arrNameSidi = [];
        $profile = "profile/default.png";

        // lampiran jemaat
        if ($request->hasFile("lampiran")) {

            $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx'];
            $files = $request->file('lampiran');
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();

                if (in_array($extension, $allowedfileExtension)) {
                    $str = rand();
                    $result = md5($str);
                    $name = time() . "-" . $result . '.' . $extension;
                    $file->move(public_path() . '/lampiran/jemaat/', $name);
                    array_push($arrName, '/lampiran/jemaat/' . $name);
                }
            }
        }

        $fileName = join("#", $arrName);

        // lampiran Baptis

        if ($request->hasFile("surat_baptis")) {

            $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx'];
            $files = $request->file('surat_baptis');
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();

                if (in_array($extension, $allowedfileExtension)) {
                    $str = rand();
                    $result = md5($str);
                    $name = time() . "-" . $result . '.' . $extension;
                    $file->move(public_path() . '/lampiran/baptis/', $name);
                    array_push($arrNameBaptis, '/lampiran/baptis/' . $name);
                }
            }
        }

        $fileNameBaptis = join("#", $arrNameBaptis);

         // lampiran Sidi

         if ($request->hasFile("surat_sidi")) {

            $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx'];
            $files = $request->file('surat_sidi');
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();

                if (in_array($extension, $allowedfileExtension)) {
                    $str = rand();
                    $result = md5($str);
                    $name = time() . "-" . $result . '.' . $extension;
                    $file->move(public_path() . '/lampiran/sidi/', $name);
                    array_push($arrNameSidi, '/lampiran/sidi/' . $name);
                }
            }
        }

        $fileNameSidi = join("#", $arrNameSidi);

        //profile

        if ($request->hasFile("profile")) {

            $allowedfileExtension = ['jpg', 'png','jpeg'];
            $files = $request->file('profile');
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();

                if (in_array($extension, $allowedfileExtension)) {
                    $str = rand();
                    $result = md5($str);
                    $name = time() . "-" . $result . '.' . $extension;
                    $file->move(public_path() . '/profile/jemaat/', $name);
                    array_push($arrNameProfile, '/profile/jemaat/' . $name);
                }
            }
        }

        $fileNameProfile = join("#", $arrNameProfile);


        //validasi
        $jemaat = $request->validate([
            'nik'     => ['required'],
            'name'    => ['required'],
            'username'    => ['required'],
            'alamat'    => ['required'],
            'tempat_lahir'    => ['required'],
            'tanggal_lahir'    => ['required'],
            // 'tanggal_baptis'    => ['required'],
            // 'tanggal_sidih'    => ['required'],
            'profile'    =>  ['nullable'],
            'lampiran'    => ['required'],
            'no_telepon' => ['nullable']
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
        $jemaat->status_gereja = $request->status;
        $jemaat->status_pernikahan = $request->status_pernikahan;
        // $jemaat->tanggal_baptis = $request->tanggal_baptis;
        // $jemaat->tanggal_sidih = $request->tanggal_sidih;
        $jemaat->baptis = $request->baptis;
        echo($request->baptis);
        $jemaat->sidi = $request->sidi;
        echo($request->sidi);
        $jemaat->sektor_role = $request->sektor_role;
        $jemaat->profile = $fileNameProfile;
        $jemaat->sektor_id = $request->sektor_id;
        $jemaat->lampiran = $fileName;
        $jemaat->no_telepon = $request->no_telepon;
        


        if (!$jemaat->save()) {
            // unlink(public_path() . $profile);
            // foreach ($lampiran as $l) {
            //     unlink(public_path() . $l);
            if (count($arrName) > 1) {
                foreach ($arrName as $path) {
                    unlink(public_path() . $path);
                }
            }
            if (count($arrNameProfile) > 1) {
                foreach ($arrNameProfile as $path) {
                    unlink(public_path() . $path);
                }
            }
            }
        else {
            $jemaat_keluarga = new KeluargaJemaat();
            $jemaat_keluarga->nik = $request->nik;
            $jemaat_keluarga->no_kk = $idKeluarga;
            $jemaat_keluarga->status = $request->posisi_di_keluarga;
            $baptis = new Baptis();
            $baptis->tgl_baptis = $request->tanggal_baptis;
            $baptis->nama_pendeta_baptis =  $request->nama_pendeta;
            $baptis->no_surat_baptis = $request->nomor_surat_baptis;
            $baptis->file_surat_baptis = $fileNameBaptis;
            $baptis->nik = $request->nik;
            $sidi = new Sidi();
            $sidi->tgl_sidi = $request->tanggal_sidi;
            $sidi->nama_pendeta_sidi =  $request->nama_pendeta_sidi;
            $sidi->no_surat_sidi = $request->nomor_surat_sidi;
            $sidi->file_surat_sidi = $fileNameSidi;
            $sidi->nik = $request->nik;

            

            if (!$baptis->save() || !$jemaat_keluarga->save() || !$sidi->save()) {
                Jemaat::where("nik", $request->nik)->delete();
                unlink(public_path() . $profile);
                foreach ($lampiran as $l) {
                    unlink(public_path() . $l);
                }
            }

            return redirect('/pendeta/data/keluarga/' . $idKeluarga);
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
        return view('pendeta.datastatistik', [
            "datajemaats" => $datastatistik,
            "jemaats" => $jemaat,
            "categories" =>  $categories
        ]);
    }
    function detailjemaat(Request $request, $nik){
        $jemaat = Jemaat::where("nik", $nik)->first();
        $baptis= Baptis::where("nik", $nik)->first();
        $sidi= Sidi::where("nik", $nik)->first();
        $lampiran = explode("#", $jemaat['lampiran']);
        $file_surat_baptis = $baptis ? explode("#", $baptis['file_surat_baptis']) : [];
        $file_surat_sidi = $sidi ? explode("#", $sidi['file_surat_sidi']) : [];
        return view('Pendeta.detailjemaat', ['jemaat'=> $jemaat,'lampiran'=> $lampiran, 'baptis'=>$baptis, 'sidi'=>$sidi, 'file_surat_baptis'=>$file_surat_baptis, 'file_surat_sidi'=>$file_surat_sidi]);
    }
    
    function editdetailjemaat(Request $request, $nik){
        // $baptis= Baptis::where("id_baptis", 1)->first();
        $jemaat = Jemaat::where("nik", $nik)->first();
        $baptis= Baptis::where("nik", $nik)->first();
        $sidi= Sidi::where("nik", $nik)->first();
        $sektors = Sektor::get();
        $lampiran = explode("#", $jemaat['lampiran']);
        $file_surat_baptis = $baptis ? explode("#", $baptis['file_surat_baptis']) : [];
        $file_surat_sidi = $sidi ? explode("#", $sidi['file_surat_sidi']) : [];
        return view('Pendeta.editdatajemaat', ['jemaat'=> $jemaat,'lampiran'=> $lampiran, 'baptis'=>$baptis, 'sidi'=>$sidi, 'file_surat_baptis'=>$file_surat_baptis, 'file_surat_sidi'=>$file_surat_sidi, 'sektors' => $sektors]);
    }
    function updateJemaat(Request $request) {

        $nik = $request->nik;
        $jemaat = Jemaat::where("nik", $nik)->first();
        $baptis= Baptis::where("nik", $nik)->first();
        $sidi= Sidi::where("nik", $nik)->first();
        
    
        $arrName = [];
        $arrNameBaptis = [];
        $arrNameSidi = [];
    
        // lampiran jemaat
        if ($request->hasFile("lampiran")) {
            $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx'];
            $files = $request->file('lampiran');
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                if (in_array($extension, $allowedfileExtension)) {
                    $str = rand();
                    $result = md5($str);
                    $name = time() . "-" . $result . '.' . $extension;
                    $file->move(public_path() . '/lampiran/jemaat/', $name);
                    array_push($arrName, '/lampiran/jemaat/' . $name);
                }
            }
            $fileName = join("#", $arrName);
        } else{
            $fileName = $jemaat['lampiran'];
        }
    
        
    
        DB::table('jemaat')->where('nik', $nik)->update([
            'nik' => $request->nik,
            'name' => $request->name,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'status_gereja' => $request->status,
            'status_pernikahan' => $request->status_pernikahan,
            'tempat_lahir' => $request->tempat_lahir,
            'baptis' => $request->baptis,
            'sidi' => $request->sidi,
            'sektor_role' => $request->sektor_role,
            'no_telepon' => $request->no_telepon,
            'lampiran' => $fileName,
            'sektor_id' => $request->sektor_id
            // Tidak perlu mengupdate lampiran jika tidak diunggah
            // Jika diunggah, akan diupdate di atas
        ]);
    
        // Update file surat baptis jika ada
        if ($request->baptis == 'Ya') {
            if ($request->hasFile("file_surat_baptis")) {
                $files = $request->file('file_surat_baptis');
                $arrNameBaptis = [];
                foreach ($files as $file) {
                    $extension = $file->getClientOriginalExtension();
                    if (in_array($extension, $allowedfileExtension)) {
                        $str = rand();
                        $result = md5($str);
                        $name = time() . "-" . $result . '.' . $extension;
                        $file->move(public_path() . '/lampiran/baptis/', $name);
                        array_push($arrNameBaptis, '/lampiran/baptis/' . $name);
                    }
                }
                $fileNameBaptis = join("#", $arrNameBaptis);
            } else {
                // Jika tidak diunggah, jangan update file_surat_baptis
                $fileNameBaptis = $baptis['file_surat_baptis'];
            }
    
            DB::table('baptis')->updateOrInsert(
                ['nik' => $nik],
                [
                    'tgl_baptis' => $request->tgl_baptis,
                    'nama_pendeta_baptis' => $request->nama_pendeta_baptis,
                    'no_surat_baptis' => $request->nama_surat_baptis,
                    'file_surat_baptis' => $fileNameBaptis // Masukkan null jika tidak diunggah
                ]
            );
        } else {
            // Jika tidak ada baptis, hapus entri baptis yang ada jika ada
            DB::table('baptis')->where('nik', $nik)->delete();
        }
        
        // Update file surat sidi jika ada
        if ($request->sidi == 'Ya') {
            if ($request->hasFile("file_surat_sidi")) {
                $files = $request->file('file_surat_sidi');
                $arrNameSidi = [];
                foreach ($files as $file) {
                    $extension = $file->getClientOriginalExtension();
                    if (in_array($extension, $allowedfileExtension)) {
                        $str = rand();
                        $result = md5($str);
                        $name = time() . "-" . $result . '.' . $extension;
                        $file->move(public_path() . '/lampiran/sidi/', $name);
                        array_push($arrNameSidi, '/lampiran/sidi/' . $name);
                    }
                }
                $fileNameSidi = join("#", $arrNameSidi);
            } else {
                // Jika tidak diunggah, jangan update file_surat_sidi
                $fileNameSidi = $sidi['file_surat_sidi'];
            }
    
            DB::table('sidi')->updateOrInsert(
                ['nik' => $nik],
                [
                    'tgl_sidi' => $request->tgl_sidi,
                    'nama_pendeta_sidi' => $request->nama_pendeta_sidi,
                    'no_surat_sidi' => $request->nama_surat_sidi,
                    'file_surat_sidi' => $fileNameSidi // Masukkan null jika tidak diunggah
                ]
            );
        } else {
            // Jika tidak ada sidi, hapus entri sidi yang ada jika ada
            DB::table('sidi')->where('nik', $nik)->delete();
        }
    
        return back()->with('success', 'Data Jemaat Sudah Berhasil Diubah');
    }

    // Sektor

    // public function showsektor()
    // {
    //     $jadwal_ibadah = jadwal_ibadah::latest()->take(100)->get(); 
    //     $warta_jemaat = WartaJemaat::latest()->take(10)->get(); 
    //     $renungan = Renungan::latest()->take(10)->get(); 
    //     $sektors = Sektor::get();
    //     $jemaat = Jemaat::where('sektor_id', $sektor_id)
    //                 ->where('sektor_role', 'Penanggung Jawab')
    //                 ->get();
        

    //     return view('pendeta.sektorshow', compact('jadwal_ibadah','warta_jemaat','renungan','sektors','jemaat'));
    // }
    public function showsektoranggota()
{
    $sektors = Sektor::get();
    // Inisialisasi $jemaat dengan nilai kosong
    $jemaat = [];

    // Cek apakah sektor_id diset dalam permintaan
    if(request()->has('sektor_id')) {
        
        // Jika sektor_id diset, gunakan nilainya untuk mengambil data jemaat
        $sektor_id = request()->sektor_id;
        $jemaat1 = Jemaat::where('sektor_id',$sektor_id )
                        ->where('sektor_role', 'Penanggung Jawab')
                        ->get();
        $jemaat2 = Jemaat::where('sektor_id',$sektor_id )
                        ->where('sektor_role', 'Anggota')
                        ->get();
    } else{
        $sektor_id = 1;
        $jemaat1 = Jemaat::where('sektor_id',$sektor_id )
        ->where('sektor_role', 'Penanggung Jawab')
        ->get();
        $jemaat2 = Jemaat::where('sektor_id',$sektor_id )
                        ->where('sektor_role', 'Anggota')
                        ->get();
    }

    return view('pendeta.sektorshowanggota', compact('sektors', 'jemaat1','jemaat2'));
}

public function createsektor(){
    return view('pendeta.createsektor');
}
public function storesektor(Request $request)
{
    $data = $request->validate([
        'nama'     => ['required'],
        'keterangan'    => ['nullable']
    ]);

    Sektor::create($data);

    return redirect()->route('pendeta.sektor')->with('success','Sektor berhasil ditambahkan!');
}

public function showsektor()
    {
        $sektors = Sektor::get();
        return view('pendeta.sektorshow', compact('sektors'));
    }


    public function editsektor($id)
    {
        $sektor = DB::table('sektor')
        ->where('id', $id)
        ->get();
        return view('pendeta.editsektor', ['sektor'=>$sektor]);
    }

    function updatesektor(Request $request) {
        $id = $request->id;
        DB::table('sektor')->where('id', $id)->update([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan
        ]);
        return redirect()->route('pendeta.Sektor')->with('success', 'Data Sektor Sudah Berhasil Diubah');
    }


    // PELAYAN
    
    function pelayan()
    {
        $pelayan = PelayanGereja::with(['jemaat', 'jemaat.sektor'])->paginate(10);
        return view('Pendeta.datapelayan', [
            "pelayanas" => $pelayan
        ]);   
    }
    function formpelayan(Request $request)
    {

        return view("Pendeta.formdatapelayan");
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
        return redirect('/pendeta/pelayangereja')->with('success', 'Data Pelayan Berhasil Disimpan!');
    }
    public function showrenungan()
    {
        $jadwal_ibadah = jadwal_ibadah::latest()->take(100)->get(); 
        $warta_jemaat = WartaJemaat::latest()->take(10)->get(); 
        $renungan = Renungan::latest()->take(10)->get(); 
        

        return view('pendeta.renunganshow', compact('jadwal_ibadah','warta_jemaat','renungan'));
    }
    public function createrenungan()
    {
            return view('pendeta.createrenungan');
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

        return redirect()->route('pendeta.renunganshow')->with('success','Renungan berhasil ditambahkan!');
    }
    public function editrenungan($id)
    {
        $renungan = DB::table('renungan')
        ->where('id', $id)
        ->get();
        return view('pendeta.editrenungan', ['renungan'=>$renungan]);
    }
    function updaterenungan(Request $request) {
        $id = $request->id;
        DB::table('renungan')->where('id', $id)->update([
            'tanggal' => $request->tanggal,
            'title' => $request->title,
            'isi' => $request->isi,
            'ayat' => $request->ayat,
        ]);
        return redirect()->route('pendeta.renunganshow')->with('success', 'Renungan Sudah Berhasil Diubah');
    }

    // JADWAL IBADAH
    public function showjadwal()
{
    $jadwal_ibadah = Jadwal_Ibadah::latest()->take(100)->get();
    $warta_jemaat = WartaJemaat::latest()->take(10)->get();
    $jadwal_pelayanan = Jadwal_Pelayanan::latest()->get();
    return view('pendeta.jadwal', compact('jadwal_ibadah', 'warta_jemaat','jadwal_pelayanan'));
}

    public function createjadwal()
    {
            return view('pendeta.createjadwal');
    }
    public function storejadwal(Request $request)
    {
        $data = $request->validate([
            'name'     => ['required'],
            'tanggal'    => ['required'],
            'waktu'    => ['required'],
            'jenis' => ['required'],
            'jumlah_hadir'    => ['nullable'],

        ]);
        jadwal_ibadah::create($data);

        return redirect()->route('pendeta.jadwal')->with('success','Jadwal ibadah berhasil ditambahkan!');
    }

     public function editjadwal($id)
    {
        $warta_jemaat = DB::table('jadwal_ibadah')
        ->where('id', $id)
        ->get();
        return view('pendeta.editjadwal', ['jadwal_ibadah'=>$warta_jemaat]);
    }
    function updatejadwal(Request $request) {
        $id = $request->id;
        DB::table('jadwal_ibadah')->where('id', $id)->update([
            'name' => $request->name,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'jenis' => $request->jenis,
            'jumlah_hadir' => $request->jumlah_hadir,
        ]);
        return redirect()->route('pendeta.jadwal')->with('success', 'Jadwal Ibadah Sudah Berhasil Diubah');
    }

   // JADWAL PELAYANAN
    // public function showsektor()
    // {
    //     $sektors = Sektor::get();
    //     return view('pendeta.sektorshow', compact('sektors'));
    // }

        // public function showpelayanan()
        // {

        //     $pelayan_gereja = PelayanGereja::with('jemaat')->get();
        
        //     // Cek apakah nik diset dalam permintaan
        //     if(request()->has('nik')) {
                
        //         // Jika nik diset, gunakan nilainya untuk mengambil data ibadah
            
        //     }
        
        //     return view('pendeta.pelayanan', compact('pelayan_gereja'));
        // }
        public function showpelayanan()
{
    $pelayan_gereja = PelayanGereja::with(['jemaat', 'jadwalPelayanan.jadwalIbadah'])->get();
    // Inisialisasi $jadwal_pelayanan dengan nilai kosong
    $jadwal_pelayanan = [];

    // Cek apakah nik diset dalam permintaan
    if(request()->has('nik')) {
        $nik = request('nik');
        $pelayan_gereja = PelayanGereja::where('nik', $nik)->first();

        // Pastikan data PelayanGereja ditemukan
        if($pelayan_gereja) {
            $jadwal_pelayanan = $pelayan_gereja->jadwalPelayanan;
        } else {
            // Handle jika data PelayanGereja tidak ditemukan
            // Misalnya, kembalikan pesan error atau redirect ke halaman lain
        }
    }

    return view('pendeta.pelayanan', compact('jadwal_pelayanan'));
}

    
    public function createpelayanan()
    {
        $pelayan_gereja = PelayanGereja::with('jemaat')->get();
            return view('pendeta.createpelayanan', compact('pelayan_gereja'));
    }

public function storepelayanan(Request $request, $id_jadwal_ibadah)
{
    $status_pelayanan = $request->status_pelayanan; // Mendapatkan array dari status pelayanan
    $id_pelayan = $request->id_pelayan; // Mendapatkan array dari id pelayan
    
    // Memastikan jumlah status pelayanan dan id pelayan sama
    if (count($status_pelayanan) == count($id_pelayan)) {
        // Lakukan loop untuk menyimpan data dari kedua select box
        for ($i = 0; $i < count($status_pelayanan); $i++) {
            $data['status_pelayanan'] = $status_pelayanan[$i];
            $data['id_pelayan'] = $id_pelayan[$i];
            $data['id_jadwal_ibadah'] = $id_jadwal_ibadah; // Set the id_jadwal_ibadah from the parameter
            
            Jadwal_Pelayanan::create($data);
        }
        
        return redirect()->route('pendeta.jadwal')->with('success','Jadwal pelayanan berhasil ditambahkan!');
    } else {
        // Jika jumlah status pelayanan dan id pelayan tidak sama, kembalikan dengan pesan kesalahan
        return redirect()->back()->with('error','Jumlah status pelayanan dan id pelayan tidak cocok!');
    }
}
function detailpelayanan(Request $request, $id_jadwal_ibadah) {
    // Array status_pelayanan yang ingin dicari
    $status_pelayanan = ['Pengkotbah', 'Liturgis', 'Warta Jemaat', 'Doa Syafaat', 'Song Leader', 'Pemusik', 'Liturgis Sekolah Minggu'];
    $persembahan = ['Pengumpul Persembahan 1','Pengumpul Persembahan 2','Pengumpul Persembahan 3','Pengumpul Persembahan 4'];
    $penerima_tamu = ['Penerima Tamu 1','Penerima Tamu 2','Penerima Tamu 3'];

    // Inisialisasi array untuk menyimpan hasil pencarian
    $results = [];
    $results_persembahan = [];
    $results_penerima_tamu = [];

    // Lakukan pencarian untuk setiap status_pelayanan
    foreach ($status_pelayanan as $status) {
        $result = PelayanGereja::whereExists(function ($query) use ($id_jadwal_ibadah, $status) {
                $query->select(DB::raw(1))
                      ->from('jadwal_pelayanan')
                      ->whereColumn('pelayan_gereja.nik', 'jadwal_pelayanan.id_pelayan')
                      ->where('id_jadwal_ibadah', $id_jadwal_ibadah)
                      ->where('status_pelayanan', $status);
            })
            ->with('jemaat')
            ->get();

        // Simpan hasil pencarian ke dalam array
        $results[$status] = $result;
    }

    foreach ($persembahan as $status) {
        $result_persembahan = PelayanGereja::whereExists(function ($query) use ($id_jadwal_ibadah, $status) {
                $query->select(DB::raw(1))
                      ->from('jadwal_pelayanan')
                      ->whereColumn('pelayan_gereja.nik', 'jadwal_pelayanan.id_pelayan')
                      ->where('id_jadwal_ibadah', $id_jadwal_ibadah)
                      ->where('status_pelayanan', $status);
            })
            ->with('jemaat')
            ->get();

        // Simpan hasil pencarian ke dalam array
        $results_persembahan[$status] = $result_persembahan;
    }

    foreach ($penerima_tamu as $status) {
        $result_penerima_tamu = PelayanGereja::whereExists(function ($query) use ($id_jadwal_ibadah, $status) {
                $query->select(DB::raw(1))
                      ->from('jadwal_pelayanan')
                      ->whereColumn('pelayan_gereja.nik', 'jadwal_pelayanan.id_pelayan')
                      ->where('id_jadwal_ibadah', $id_jadwal_ibadah)
                      ->where('status_pelayanan', $status);
            })
            ->with('jemaat')
            ->get();

        // Simpan hasil pencarian ke dalam array
        $results_penerima_tamu[$status] = $result_penerima_tamu;
    }

    // Pass both arrays to the view
    return view('Pendeta.detailpelayanan', ['status_pelayanan' => $status_pelayanan, 'persembahan' => $persembahan, 'penerima_tamu' => $penerima_tamu,'results' => $results, 'results_persembahan' => $results_persembahan, 'results_penerima_tamu' => $results_penerima_tamu]);
}
public function editpelayanan($id_jadwal_ibadah){
    $pelayan_gereja = PelayanGereja::with('jemaat')->get();
     // Array status_pelayanan yang ingin dicari
     $status_pelayanan = ['Pengkotbah', 'Liturgis', 'Doa Syafaat', 'Warta Jemaat','Pengumpul Persembahan 1','Penerima Tamu 1', 'Pengumpul Persembahan 2','Penerima Tamu 2','Pengumpul Persembahan 3','Penerima Tamu 3','Pengumpul Persembahan 4', 'Pemusik','Song Leader',  'Liturgis Sekolah Minggu'];
 
     // Inisialisasi array untuk menyimpan hasil pencarian
     $results = [];
 
     // Lakukan pencarian untuk setiap status_pelayanan
     foreach ($status_pelayanan as $status) {
         $result = PelayanGereja::whereExists(function ($query) use ($id_jadwal_ibadah, $status) {
                 $query->select(DB::raw(1))
                       ->from('jadwal_pelayanan')
                       ->whereColumn('pelayan_gereja.nik', 'jadwal_pelayanan.id_pelayan')
                       ->where('id_jadwal_ibadah', $id_jadwal_ibadah)
                       ->where('status_pelayanan', $status);
             })
             ->with('jemaat')
             ->get();
 
         // Simpan hasil pencarian ke dalam array
         $results[$status] = $result;
     }
 
     // Pass both arrays to the view
     return view('Pendeta.editpelayanan', ['pelayan_gereja' => $pelayan_gereja, 'status_pelayanan' => $status_pelayanan,'results' => $results]);
            // return view('pendeta.editpelayanan', compact('pelayan_gereja'));
}
public function updatepelayanan(Request $request, $id){
    // Memperbarui jadwal pelayanan berdasarkan ID jadwal ibadah
    foreach ($request->status_pelayanan as $key => $status) {
        // Perbarui record yang sesuai berdasarkan status pelayanan
        DB::table('jadwal_pelayanan')
            ->where('id_jadwal_ibadah', $id)
            ->where('status_pelayanan', $status)
            ->update([
                'id_pelayan' => $request->id_pelayan[$key]
            ]);
    }

    // Redirect kembali dengan pesan sukses
    return redirect()->route('pendeta.detailpelayanan', ['id' => $id])->with('success', 'Jadwal Pelayanan Sudah Berhasil Diubah');
}

// TATA IBADAH
    function detailtataibadah()
    {
        $jadwal_ibadah = jadwal_ibadah::latest()->take(100)->get(); 
        $tata_ibadah = tata_ibadah::latest()->take(10)->get(); 
        $renungan = Renungan::latest()->take(10)->get();
        return view('pendeta.detailibadah', compact('jadwal_ibadah','tata_ibadah','renungan'));
    }
    public function createtata()
    {
            return view('pendeta.createtata');
    }
    function formibadah(Request $request)
    {

        return view("pendeta.tambahibadah");
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
        return redirect()->route('pendeta.detailibadah')->with('success', 'Tata Ibadah Sudah Berhasil Ditambahkan');
    }
    public function edittataibadah($id)
    {
        $tata_ibadah = DB::table('tata_ibadah')
        ->where('id', $id)
        ->get();
        return view('pendeta.edittataibadah', ['tata_ibadah'=>$tata_ibadah]);
    }
    function updatetataibadah(Request $request) {
        $id = $request->id;
        DB::table('tata_ibadah')->where('id', $id)->update([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal
        ]);
        return redirect()->route('pendeta.detailibadah')->with('success', 'Tata Ibadah Sudah Berhasil Diubah');
    }
}
