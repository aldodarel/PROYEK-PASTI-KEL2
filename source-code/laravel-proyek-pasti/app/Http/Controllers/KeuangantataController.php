<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keuangan;
use App\LaporanKeuangan;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class KeuangantataController extends Controller
{
    public function index(){
        $datakeuangan = Keuangan::all()->where('status_keuangan','Aktif');
        return view('tatausaha.datakeuangan',compact('datakeuangan'));
    }
    
    public function index2(){
        $datakeuangan = Keuangan::all()->where('status_keuangan','Non-Aktif');
        return view('tatausaha.datakeuangannonaktif',compact('datakeuangan'));
    } 

    function formkeuangan(Request $request)
    {
        return view("tatausaha.formtambahkeuangan");
    }

    function formkeuanganprocess(Request $request)
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
                    $file->move(public_path() . '/lampiran/keuangan/', $name);
                    array_push($arrName, '/lampiran/keuangan/' . $name);
                }
            }
        }
        $fileName = join("#", $arrName);
        $nik = $request->nik;

        $keuangan = new Keuangan();
        $keuangan->kategori = $request->kategori;
        $keuangan->keterangan = $request->keterangan;
        $keuangan->jenis_keuangan = $request->jenis_keuangan;
        $keuangan->tanggal = $request->tanggal;
        $keuangan->nominal = $request->nominal;
        $keuangan->lampiran = $fileName;

        if (!$keuangan->save()) {
            if (count($arrName) > 1) {
                foreach ($arrName as $path) {
                    unlink(public_path() . $path);
                }
            }
        }
        return redirect()->route('tatausaha.datakeuangan');
    }

    public function ubahkeuangan($id){
        $keuangan = DB::table('keuangan')->where('id', $id)->get();
        return view('tatausaha.formubahkeuangan', ['keuangan'=>$keuangan]);
    }

    public function updatekeuangan(Request $request, $id){
        $keuangan = Keuangan::find($id);
        $keuangan->update($request->all());

        return redirect()->route('tatausaha.datakeuangan')->with('success', 'Data Keuangan berhasil diperbarui');
    }

    public function ubahstatuskeuangan($id){
        $keuangan = Keuangan::find($id);
        $keuangan->update(['status_keuangan'=>'Non-Aktif']);

        return redirect()->route('tatausaha.datakeuangan')->with('success', 'Data Keuangan berhasil diperbarui');
    }

    public function ubahstatuskeuangan2($id){
        $keuangan = Keuangan::find($id);
        $keuangan->update(['status_keuangan'=>'Aktif']);

        return redirect()->route('tatausaha.datakeuangannonaktif')->with('success', 'Data Keuangan berhasil diperbarui');
    }
    
    public function laporan(){
        $laporankeuangan = LaporanKeuangan::all()->where('status_laporan','Aktif');
        return view("tatausaha.laporankeuangan",compact('laporankeuangan'));
    }

    public function laporan2(){
        $laporankeuangan = LaporanKeuangan::all()->where('status_laporan','Non-Aktif');
        return view("tatausaha.laporankeuangannonaktif",compact('laporankeuangan'));
    }

    public function laporankeuangan(Request $request){
        return view("tatausaha.formtambahlaporankeuangan");
    }

    public function laporankeuanganprocess(Request $request){
        $arrName = [];
        $id = $request->id;

        $laporankeuangan = new LaporanKeuangan();
        $laporankeuangan->nama_laporan = $request->nama_laporan;
        $laporankeuangan->tanggal_awal = $request->tanggal_awal;
        $laporankeuangan->tanggal_akhir = $request->tanggal_akhir;
        $laporankeuangan->kategori_laporan = $request->kategori_laporan;
        $laporankeuangan->saldo_sebelum = $request->saldo_sebelum;

        if (!$laporankeuangan->save()) {
            if (count($arrName) > 1) {
                foreach ($arrName as $path) {
                    unlink(public_path() . $path);
                }
            }
        }
        return redirect()->route("tatausaha.laporankeuangan");
    }

    public function ubahlaporankeuangan($id){
        $laporankeuangan = DB::table('laporan_keuangan')->where('id', $id)->get();
        return view('tatausaha.formubahlaporankeuangan', ['laporankeuangan'=>$laporankeuangan]);
    }

    public function ubahlaporankeuanganprocess(Request $request, $id){
        $laporankeuangan = LaporanKeuangan::find($id);
        $laporankeuangan->update($request->all());

        return redirect()->route('tatausaha.laporankeuangan')->with('success', 'Data Keuangan berhasil diperbarui');
    }

    public function ubahstatuslaporan($id){
        $laporankeuangan = LaporanKeuangan::find($id);
        $laporankeuangan->update(['status_laporan'=>'Non-Aktif']);

        return redirect()->route('tatausaha.laporankeuangan')->with('success', 'Data Keuangan berhasil diperbarui');
    }

    public function ubahstatuslaporan2($id){
        $laporankeuangan = LaporanKeuangan::find($id);
        $laporankeuangan->update(['status_laporan'=>'Aktif']);

        return redirect()->route('tatausaha.laporankeuangannonaktif')->with('success', 'Data Keuangan berhasil diperbarui');
    }

    public function pemasukan(){
        $danapemasukan = Keuangan::where("jenis_keuangan", "pemasukan")->get();
        return view('tatausaha.danapemasukan',compact('danapemasukan'));
    }
    
    public function pengeluaran(){
        $danapengeluaran = Keuangan::where("jenis_keuangan", "pengeluaran")->get();
        return view('tatausaha.danapengeluaran',compact('danapengeluaran'));
    }

    public function carilaporanmingguan(){  
        return view('tatausaha.formcarilaporanmingguan');
           
    }

    public function processcarilaporanmingguan(){
        if(request('tahun')){
            $laporankeuangan = DB::select("SELECT * FROM laporan_keuangan WHERE YEAR(tanggal_awal) = " .request("tahun"). " AND kategori_laporan = 'Mingguan' AND status_laporan='Aktif'");
            return view('tatausaha.laporankeuanganmingguan',compact('laporankeuangan'));
        }else{
            return view('tatausaha.formcarilaporanmingguan');
        }
    }

    public function carilaporanbulanan(){  
        return view('tatausaha.formcarilaporanbulanan');
           
    }

    public function processcarilaporanbulanan(){
        if(request('tahun')){
            $laporankeuangan = DB::select("SELECT * FROM laporan_keuangan WHERE YEAR(tanggal_awal) = " .request("tahun"). " AND kategori_laporan = 'Bulanan' AND status_laporan='Aktif'");
            return view('tatausaha.laporankeuanganbulanan',compact('laporankeuangan'));
        }else{
            return view('tatausaha.formcarilaporanbulanan');
        }
    }

    public function carilaporantahunan(){  
        return view('tatausaha.formcarilaporantahunan');
           
    }

    public function processcarilaporantahunan(){
        if(request('tahun')){
            $laporankeuangan = DB::select("SELECT * FROM laporan_keuangan WHERE YEAR(tanggal_awal) = " .request("tahun"). " AND kategori_laporan = 'Tahunan' AND status_laporan='Aktif'");
            return view('tatausaha.laporankeuangantahunan',compact('laporankeuangan'));
        }else{
            return view('tatausaha.formcarilaporantahunan');
        }
    }

    public function laporanmingguan($tanggal_awal,$tanggal_akhir, $id){
        LaporanKeuangan::find($id);
        LaporanKeuangan::find($tanggal_awal);
        LaporanKeuangan::find($tanggal_akhir);
       

        $namalaporan = LaporanKeuangan::all()->where('id', $id);
           
        $laporanmingguan1 = Keuangan::where('kategori','Persembahan')->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('jenis_keuangan','Pemasukan')->where('status_keuangan','Aktif')->get();
        $laporanmingguan2 = Keuangan::where('kategori','Bakti Bulanan dan Pembangunan')->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('jenis_keuangan','Pemasukan')->where('status_keuangan','Aktif')->get();
        $laporanmingguan3 = Keuangan::where('kategori','Administrasi')->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('jenis_keuangan','Pemasukan')->where('status_keuangan','Aktif')->get();
        $laporanmingguan4 = Keuangan::where('kategori','Ucapan Syukur')->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('jenis_keuangan','Pemasukan')->where('status_keuangan','Aktif')->get();
        $laporanmingguan5 = Keuangan::where('kategori','Penggalangan Dana')->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('jenis_keuangan','Pemasukan')->where('status_keuangan','Aktif')->get();
        $laporanmingguan6 = Keuangan::where('kategori','Penggalangan Dana Eksternal')->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('jenis_keuangan','Pemasukan')->where('status_keuangan','Aktif')->get();
        $totalpemasukan = Keuangan::select("jenis_keuangan", DB::raw('SUM(nominal) as total'))
            ->groupBy("jenis_keuangan")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])
            ->where('jenis_keuangan','Pemasukan')->where('status_keuangan','Aktif')->get();       
        $totalpengeluaran = Keuangan::select("jenis_keuangan", DB::raw('SUM(nominal) as total'))
            ->groupBy("jenis_keuangan")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])
            ->where('jenis_keuangan','Pengeluaran')->where('status_keuangan','Aktif')->get();
        
        
        $laporanmingguan7 = Keuangan::where('kategori','Biaya Pelayanan Rutin')->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('jenis_keuangan','Pengeluaran')->where('status_keuangan','Aktif')->get();
        $laporanmingguan8 = Keuangan::where('kategori','Operasional Gereja')->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('jenis_keuangan','Pengeluaran')->get();
        $laporanmingguan9 = Keuangan::where('kategori','Tahun Gerejawi dan Ulang Tahun Gereja')->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('jenis_keuangan','Pengeluaran')->where('status_keuangan','Aktif')->get();
        $laporanmingguan10 = Keuangan::where('kategori','Pembangunan')->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('jenis_keuangan','Pengeluaran')->where('status_keuangan','Aktif')->get();
        $laporanmingguan11 = Keuangan::where('kategori','Penggalangan Dana')->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('jenis_keuangan','Pengeluaran')->where('status_keuangan','Aktif')->get();
        $laporanmingguan12 = Keuangan::where('kategori','Diakonia')->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('jenis_keuangan','Pengeluaran')->where('status_keuangan','Aktif')->get();
        $laporanmingguan13= Keuangan::where('kategori','Pendidikan')->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('jenis_keuangan','Pengeluaran')->where('status_keuangan','Aktif')->get();
        $laporanmingguan14 = Keuangan::where('kategori','Seksi Nyanyian dan Koor')->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('jenis_keuangan','Pengeluaran')->where('status_keuangan','Aktif')->get();
        $laporanmingguan15 = Keuangan::where('kategori','Pembinaan Kategorial')->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('jenis_keuangan','Pengeluaran')->where('status_keuangan','Aktif')->get();
        $laporanmingguan16 = Keuangan::where('kategori','Biaya Natal dan Tahun Baru')->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('jenis_keuangan','Pengeluaran')->where('status_keuangan','Aktif')->get();
        $laporanmingguan17 = Keuangan::where('kategori','Pihak Lain')->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('jenis_keuangan','Pengeluaran')->where('status_keuangan','Aktif')->get();
        $laporanmingguan18 = Keuangan::where('kategori','Hari Besar Gereja')->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('jenis_keuangan','Pengeluaran')->where('status_keuangan','Aktif')->get();
        $laporanmingguan19 = Keuangan::where('kategori','Pembangunan Jangka Panjang')->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('jenis_keuangan','Pengeluaran')->where('status_keuangan','Aktif')->get();

        return view('tatausaha.laporanmingguan', [
            'laporanmingguan1' => $laporanmingguan1,'laporanmingguan2'=> $laporanmingguan2,
            'laporanmingguan3' => $laporanmingguan3,'laporanmingguan4' => $laporanmingguan4, 
            'laporanmingguan5' => $laporanmingguan5,'laporanmingguan6' => $laporanmingguan6,
            'laporanmingguan7' => $laporanmingguan7,'laporanmingguan8' => $laporanmingguan8,
            'laporanmingguan9' => $laporanmingguan9,'laporanmingguan10' => $laporanmingguan10,
            'laporanmingguan11' => $laporanmingguan11, 'laporanmingguan12' => $laporanmingguan12,
            'laporanmingguan13' => $laporanmingguan13,'laporanmingguan14' => $laporanmingguan14,
            'laporanmingguan15' => $laporanmingguan15,'laporanmingguan16' => $laporanmingguan16,
            'laporanmingguan17' => $laporanmingguan17,'laporanmingguan18' => $laporanmingguan18,
            'laporanmingguan19' => $laporanmingguan19,'totalpengeluaran'=>$totalpengeluaran,
            'totalpemasukan' => $totalpemasukan, 'namalaporan'=>$namalaporan
        ]);

    }

    public function laporanbulanan($tanggal_awal,$tanggal_akhir, $id){
        LaporanKeuangan::find($id);
        LaporanKeuangan::find($tanggal_awal);
        LaporanKeuangan::find($tanggal_akhir);

        $namalaporan = LaporanKeuangan::all()->where('id', $id);

        $laporanbulanan1 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Persembahan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $laporanbulanan2 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Bakti Bulanan dan Pembangunan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $laporanbulanan3 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Administrasi')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $laporanbulanan4 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Ucapan Syukur')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $laporanbulanan5 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Penggalangan Dana')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $laporanbulanan6 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Penggalangan Dana Eksternal')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $totalpemasukan = Keuangan::select("jenis_keuangan", DB::raw('SUM(nominal) as total'))
            ->groupBy("jenis_keuangan")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('jenis_keuangan','Pemasukan')->where('status_keuangan','Aktif')->get();
        $totalkategori1 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Persembahan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $totalkategori2 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Bakti Bulanan dan Pembangunan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $totalkategori3 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Administrasi')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $totalkategori4 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Ucapan Syukur')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $totalkategori5 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Penggalangan Dana')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $totalkategori6 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Penggalangan Dana Eksternal')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();

        
        $laporanbulanan7 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Biaya Pelayanan Rutin')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporanbulanan8 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Operasional Gereja')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporanbulanan9 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Tahun Gerejawi dan Ulang Tahun Gereja')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporanbulanan10 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Pembangunan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporanbulanan11 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Penggalangan Dana')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporanbulanan12 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Diakonia')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporanbulanan13 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Pendidikan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporanbulanan14 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Seksi Nyanyian dan Koor')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporanbulanan15 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Pembinaan Kategorial')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporanbulanan16 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Biaya Natal dan Tahun Baru')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporanbulanan17 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Pihak Lain')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporanbulanan18 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Hari Besar Gereja')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $laporanbulanan19 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Pembangunan Jangka Panjang')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalpengeluaran = Keuangan::select("jenis_keuangan", DB::raw('SUM(nominal) as total'))
        ->groupBy("jenis_keuangan")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('jenis_keuangan','Pengeluaran')->where('status_keuangan','Aktif')->get();
        $totalkategori7 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Biaya Pelayanan Rutin')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori8 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Operasional Gereja')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori9 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Tahun Gerejawi dan Ulang Tahun Gereja')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori10 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Pembangunan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori11 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Penggalangan Dana')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori12= Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Diakonia')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori13 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Pendidikan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori14 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Seksi Nyanyian dan Koor')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori15 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Pembinaan Kategorial')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori16 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Biaya Natal dan Tahun Baru')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori17 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Pihak Lain')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori18 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Hari Besar Gereja')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori19 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Pembangunan Jangka Panjang')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();

        return view('tatausaha.laporanbulanan', [
            'laporanbulanan1' => $laporanbulanan1,'laporanbulanan2'=> $laporanbulanan2,
            'laporanbulanan3' => $laporanbulanan3,'laporanbulanan4'=> $laporanbulanan4,
            'laporanbulanan5' => $laporanbulanan5,'laporanbulanan6'=> $laporanbulanan6,
            'laporanbulanan7' => $laporanbulanan7,'laporanbulanan8'=> $laporanbulanan8,
            'laporanbulanan9' => $laporanbulanan9,'laporanbulanan10'=> $laporanbulanan10,
            'laporanbulanan11' => $laporanbulanan11,'laporanbulanan12'=> $laporanbulanan12,
            'laporanbulanan13' => $laporanbulanan13,'laporanbulanan14'=> $laporanbulanan14,
            'laporanbulanan15' => $laporanbulanan15,'laporanbulanan16'=> $laporanbulanan16,
            'laporanbulanan17' => $laporanbulanan17,'laporanbulanan18'=> $laporanbulanan18,
            'laporanbulanan19' => $laporanbulanan19,'totalpengeluaran'=> $totalpengeluaran,
            'totalpemasukan' => $totalpemasukan, 'namalaporan'=>$namalaporan,
            'totalkategori1'=>$totalkategori1,'totalkategori2'=>$totalkategori2,
            'totalkategori3'=>$totalkategori3,'totalkategori4'=>$totalkategori4,
            'totalkategori5'=>$totalkategori5,'totalkategori6'=>$totalkategori6,
            'totalkategori7'=>$totalkategori7,'totalkategori8'=>$totalkategori8,
            'totalkategori9'=>$totalkategori9,'totalkategori10'=>$totalkategori10,
            'totalkategori11'=>$totalkategori11,'totalkategori12'=>$totalkategori12,
            'totalkategori13'=>$totalkategori13,'totalkategori14'=>$totalkategori14,
            'totalkategori15'=>$totalkategori15,'totalkategori16'=>$totalkategori16,
            'totalkategori17'=>$totalkategori17,'totalkategori18'=>$totalkategori18,
            'totalkategori19'=>$totalkategori19
        ]);  
    }

    public function laporantahunan($tanggal_awal,$tanggal_akhir, $id){
        LaporanKeuangan::find($id);
        LaporanKeuangan::find($tanggal_awal);
        LaporanKeuangan::find($tanggal_akhir);

        $namalaporan = LaporanKeuangan::all()->where('id', $id);

        $laporantahunan1 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Persembahan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $laporantahunan2 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Bakti Bulanan dan Pembangunan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $laporantahunan3 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Administrasi')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $laporantahunan4 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Ucapan Syukur')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $laporantahunan5 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Penggalangan Dana')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $laporantahunan6 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Penggalangan Dana Eksternal')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
        $totalpemasukan = Keuangan::select("jenis_keuangan", DB::raw('SUM(nominal) as total'))
            ->groupBy("jenis_keuangan")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('jenis_keuangan','Pemasukan')->where('status_keuangan','Aktif')->get();
            $totalkategori1 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Persembahan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
            $totalkategori2 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Bakti Bulanan dan Pembangunan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
            $totalkategori3 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Administrasi')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
            $totalkategori4 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Ucapan Syukur')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
            $totalkategori5 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Penggalangan Dana')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();
            $totalkategori6 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
            ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Penggalangan Dana Eksternal')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pemasukan')->get();

        $laporantahunan7 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Biaya Pelayanan Rutin')->where('status_keuangan','Aktif')->get();
        $laporantahunan8 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Operasional Gereja')->where('status_keuangan','Aktif')->get();
        $laporantahunan9 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Tahun Gerejawi dan Ulang Tahun Gereja')->where('status_keuangan','Aktif')->get();
        $laporantahunan10 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Pembangunan')->where('status_keuangan','Aktif')->get();
        $laporantahunan11 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Penggalangan Dana')->where('status_keuangan','Aktif')->get();
        $laporantahunan12 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Diakonia')->where('status_keuangan','Aktif')->get();
        $laporantahunan13 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Pendidikan')->where('status_keuangan','Aktif')->get();
        $laporantahunan14 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Seksi Nyanyian dan Koor')->where('status_keuangan','Aktif')->get();
        $laporantahunan15 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Pembinaan Kategorial')->where('status_keuangan','Aktif')->get();
        $laporantahunan16 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Biaya Natal dan Tahun Baru')->where('status_keuangan','Aktif')->get();
        $laporantahunan17 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Pihak Lain')->where('status_keuangan','Aktif')->get();
        $laporantahunan18 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Hari Besar Gereja')->where('status_keuangan','Aktif')->get();
        $laporantahunan19 = Keuangan::select("kategori", DB::raw('SUM(nominal) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('kategori','Pembangunan Jangka Panjang')->where('status_keuangan','Aktif')->get();
        $totalpengeluaran = Keuangan::select("jenis_keuangan", DB::raw('SUM(nominal) as total'))
        ->groupBy("jenis_keuangan")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('jenis_keuangan','Pengeluaran')->where('status_keuangan','Aktif')->get();
        $totalkategori7 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Biaya Pelayanan Rutin')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori8 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Operasional Gereja')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori9 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Tahun Gerejawi dan Ulang Tahun Gereja')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori10 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Pembangunan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori11 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Penggalangan Dana')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori12= Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Diakonia')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori13 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Pendidikan')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori14 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Seksi Nyanyian dan Koor')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori15 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Pembinaan Kategorial')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori16 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Biaya Natal dan Tahun Baru')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori17 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Pihak Lain')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori18 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Hari Besar Gereja')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();
        $totalkategori19 = Keuangan::select("kategori", DB::raw('count(kategori) as total'))
        ->groupBy("kategori")->whereBetween('tanggal',[$tanggal_awal,$tanggal_akhir])->where('Kategori','Pembangunan Jangka Panjang')->where('status_keuangan','Aktif')->where('jenis_keuangan','Pengeluaran')->get();

        return view('tatausaha.laporantahunan', [
            'laporantahunan1' => $laporantahunan1,'laporantahunan2'=> $laporantahunan2,
            'laporantahunan3' => $laporantahunan3,'laporantahunan4'=> $laporantahunan4,
            'laporantahunan5' => $laporantahunan5,'laporantahunan6'=> $laporantahunan6,
            'laporantahunan7' => $laporantahunan7,'laporantahunan8'=> $laporantahunan8,
            'laporantahunan9' => $laporantahunan9,'laporantahunan10'=> $laporantahunan10,
            'laporantahunan11' => $laporantahunan11,'laporantahunan12'=> $laporantahunan12,
            'laporantahunan13' => $laporantahunan13,'laporantahunan14'=> $laporantahunan14,
            'laporantahunan15' => $laporantahunan15,'laporantahunan16'=> $laporantahunan16,
            'laporantahunan17' => $laporantahunan17,'laporantahunan18'=> $laporantahunan18,
            'laporantahunan19' => $laporantahunan19,'totalpengeluaran'=> $totalpengeluaran,
            'totalpemasukan' => $totalpemasukan, 'namalaporan'=>$namalaporan,
            'totalkategori1'=>$totalkategori1,'totalkategori2'=>$totalkategori2,
            'totalkategori3'=>$totalkategori3,'totalkategori4'=>$totalkategori4,
            'totalkategori5'=>$totalkategori5,'totalkategori6'=>$totalkategori6,
            'totalkategori7'=>$totalkategori7,'totalkategori8'=>$totalkategori8,
            'totalkategori9'=>$totalkategori9,'totalkategori10'=>$totalkategori10,
            'totalkategori11'=>$totalkategori11,'totalkategori12'=>$totalkategori12,
            'totalkategori13'=>$totalkategori13,'totalkategori14'=>$totalkategori14,
            'totalkategori15'=>$totalkategori15,'totalkategori16'=>$totalkategori16,
            'totalkategori17'=>$totalkategori17,'totalkategori18'=>$totalkategori18,
            'totalkategori19'=>$totalkategori19
        ]);  
    }
}
