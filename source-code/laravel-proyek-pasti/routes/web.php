<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Pengunjung
Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/tataibadah', 'HomeController@ibadah')->name('home.ibadah');
Route::get('/Renungan', 'HomeController@renungan')->name('home.renungan');
Route::get('/Berita', 'BeritaController@show')->name('Berita.index');



Route::get('/DataGereja', 'DataGerejaController@index')->name('DataGereja.index');
// Route::get('/Renungan', 'RenunganController@index')->name('Renungan.index');
Route::get('/renungan/{id}', 'RenunganController@detail')->name('Renungan.detail');
Route::get('/Tentang', 'TentangController@index')->name('Tentang.index');

Route::middleware(['beforeauth'])->group(function () {
    Route::get('/login', 'AuthController@index')->name('auth.index');
    Route::post('/login', 'AuthController@login')->name('auth.login');
});
// Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/logout', 'AuthController@logout')->name('auth.logout');
    Route::get('/BeritaGereja', 'BeritaController@index')->name('BeritaGereja.index');
    Route::get('/Berita', 'BeritaController@show')->name('Berita.index');

    Route::get('/beritaGereja/{id}', 'BeritaController@detail')->name('BeritaGereja.detail');
    Route::get('/tambah-berita', 'BeritaController@create')->name('Berita.create');
    Route::post('/tambah-berita', 'BeritaController@store')->name('Berita.store');
    Route::get('/ubah-berita/{id}', 'BeritaController@edit')->name('Berita.edit');
    Route::post('/ubah-berita/{id}', 'BeritaController@update')->name('Berita.update');

    Route::get('/Beritapendeta', 'BeritaController@showpendeta')->name('Berita.indexpendeta');
    Route::get('/tambah-beritapendeta', 'BeritaController@creatependeta')->name('Berita.creatependeta');
    Route::post('/tambah-beritapendeta', 'BeritaController@storependeta')->name('Berita.storependeta');
    Route::get('/ubah-beritapendeta/{id}', 'BeritaController@editpendeta')->name('Berita.editpendeta');
    Route::post('/ubah-beritapendeta/{id}', 'BeritaController@update')->name('Berita.update');

    Route::get('/Beritabenda', 'BeritaController@showbenda')->name('Berita.indexbenda');
    Route::get('/tambah-beritabenda', 'BeritaController@createbenda')->name('Berita.createbenda');
    Route::post('/tambah-beritabenda', 'BeritaController@storebenda')->name('Berita.storebenda');
    Route::get('/ubah-beritabenda/{id}', 'BeritaController@editbenda')->name('Berita.editbenda');
    Route::post('/ubah-beritabenda/{id}', 'BeritaController@update')->name('Berita.update');

    Route::get('/Beritasekre', 'BeritaController@showsekre')->name('Berita.indexsekre');
    Route::get('/tambah-beritasekre', 'BeritaController@createsekre')->name('Berita.createsekre');
    Route::post('/tambah-beritasekre', 'BeritaController@storesekre')->name('Berita.storesekre');
    Route::get('/ubah-beritasekre/{id}', 'BeritaController@editsekre')->name('Berita.editsekre');
    Route::post('/ubah-beritasekre/{id}', 'BeritaController@update')->name('Berita.update');

    Route::get('/{nik}/profile', 'AuthController@profile')->name('auth.profile');
    Route::get('/bendahara/{nik}/profile', 'AuthController@profilebenda')->name('auth.profile');
    Route::get('/jemaat/{nik}/profile', 'AuthController@profilejemaat')->name('auth.profile');
    Route::get('/pendeta/{nik}/profile', 'AuthController@profilependeta')->name('auth.profile');
    Route::get('/sekretaris/{nik}/profile', 'AuthController@profilesekretaris')->name('auth.profile');
    Route::get('/penatua/{nik}/profile', 'AuthController@profilepenatua')->name('auth.profile');

    Route::post('/bendahara/profile/{nik}/edit', 'AuthController@editprofile')->name('auth.editprofile');
    Route::post('/jemaat/profile/{nik}/edit', 'AuthController@editprofilebenda')->name('auth.editprofile');
    Route::post('/jemaat/profile/{nik}/edit', 'AuthController@editprofile')->name('auth.editprofile');
    Route::get('/jemaat', 'HomeController@dashboardjemaat')->name('jemaat.index');
    Route::get("/jemaat/data/jemaat/{nik}", "JemaatController@detailjemaat")->name("jemaat.detailjemaat");
    Route::get("/jemaat/data/keluarga/{id}", 'JemaatController@detailkeluarga')->name('jemaat.detailkeluarga');
    Route::get("jemaat/data/keluarga", 'JemaatController@datakeluarga')->name('jemaat.datakeluarga');

        Route::get("jemaat/data/keluarga/add", 'JemaatController@formkeluarga')->name('jemaat.formkeluarga');
        Route::post("jemaat/data/keluarga/add", 'JemaatController@formkeluargaprocess')->name('jemaat.formkeluarga');
        Route::get("jemaat/data/keluarga/{id}", 'JemaatController@detailkeluarga')->name('jemaat.detailkeluarga');
        Route::get("jemaat/editdatakeluarga/{id}", 'JemaatController@editdatakeluarga')->name('jemaat.editdatakeluarga');
        Route::post('jemaat/editdatakeluarga/{id}', 'JemaatController@update')->name('jemaat.update');
        Route::get("jemaat/data/jemaat/add/{idKeluarga}", 'JemaatController@formjemaat')->name('jemaat.formjemaat');
        Route::post("jemaat/data/jemaat/add/{idKeluarga}", 'JemaatController@formjemaatprocess')->name('jemaat.formjemaat');
        Route::get("jemaat/data/jemaat/{nik}", "JemaatController@detailjemaat")->name("jemaat.detailjemaat");
        Route::get("jemaat/data/jemaat", 'JemaatController@datajemaat')->name('jemaat.datajemaat');
        Route::get("jemaat/data/jemaat/edit/{nik}", "JemaatController@editdetailjemaat")->name("jemaat.editdetailjemaat");
        Route::post("jemaat/data/jemaat/edit", "JemaatController@updateJemaat")->name("jemaat.updateJemaat");
        Route::get("jemaat/data/statistik", 'JemaatController@datastatistik')->name('jemaat.datastatistik');
        Route::get("jemaat/data/keuangan", 'KeuanganJemaatController@index')->name('jemaat.datakeuangan');
        Route::get("jemaat/data/keuangan/nonaktif", 'KeuanganJemaatController@index2')->name('jemaat.datakeuangannonaktif');
        Route::get("jemaat/data/keuangan/add", 'KeuanganJemaatController@formkeuangan')->name('jemaat.formtambahkeuangan');
        Route::post("jemaat/data/keuangan/add", 'KeuanganJemaatController@formkeuanganprocess')->name('jemaat.formtambahkeuangan');
        Route::get("jemaat/data/keuangan/edit/{id}", 'KeuanganJemaatController@ubahkeuangan')->name('jemaat.formubahkeuangan');
        Route::post("jemaat/data/keuangan/update/{id}", 'KeuanganJemaatController@updatekeuangan')->name('jemaat.formupdatekeuangan');
        Route::get("jemaat/data/keuangan/edit/status/{id}", 'KeuanganJemaatController@ubahstatuskeuangan')->name('jemaat.formubahstatus');
        Route::get("jemaat/data/keuangan/edit/status/nonaktif/{id}", 'KeuanganJemaatController@ubahstatuskeuangan2')->name('jemaat.formubahstatus2');
        Route::get("/jemaat/data/dana-pemasukan", 'KeuanganJemaatController@pemasukan')->name('jemaat.danapemasukan');
        Route::get("/jemaat/data/dana-pengeluaran", 'KeuanganJemaatController@pengeluaran')->name('jemaat.danapengeluaran');
        Route::get("jemaat/data/laporan-keuangan", 'KeuanganJemaatController@laporan')->name('jemaat.laporankeuangan');
        Route::get("jemaat/data/laporan-keuangan/nonaktif", 'KeuanganJemaatController@laporan2')->name('jemaat.laporankeuangannonaktif');
        Route::get("jemaat/data/laporan-keuangan/edit/status/{id}", 'KeuanganJemaatController@ubahstatuslaporan')->name('jemaat.formubahstatuslaporan');
        Route::get("jemaat/data/laporan-keuangan/edit/status/nonaktif/{id}", 'KeuanganJemaatController@ubahstatuslaporan2')->name('jemaat.formubahstatuslaporan2');
        Route::get("jemaat/data/laporan-keuangan/add", 'KeuanganJemaatController@laporankeuangan')->name('jemaat.formtambahlaporankeuangan');
        Route::post("jemaat/data/laporan-keuangan/add", 'KeuanganJemaatController@laporankeuanganprocess')->name('jemaat.formtambahlaporankeuangan');
        Route::get("jemaat/data/laporan-keuangan/edit/{id}", 'KeuanganJemaatController@ubahlaporankeuangan')->name('penatua.formubahlaporankeuangan');
        Route::post("jemaat/data/laporan-keuangan/update/{id}", 'KeuanganJemaatController@ubahlaporankeuanganprocess')->name('jemaat.formubahlaporankeuangan');
        Route::get("jemaat/data/laporan-keuangan/cari-mingguan", 'KeuanganJemaatController@carilaporanmingguan')->name('jemaat.formcarilaporanmingguan');
        Route::get("jemaat/data/laporan-keuangan/cari-mingguan/", 'KeuanganJemaatController@processcarilaporanmingguan')->name('penatua.formcarilaporanmingguan');
        Route::get("jemaat/data/laporan-keuangan/cari-bulanan", 'KeuanganJemaatController@carilaporanbulanan')->name('jemaat.formcarilaporanbulanan');
        Route::get("jemaat/data/laporan-keuangan/cari-bulanan/", 'KeuanganJemaatController@processcarilaporanbulanan')->name('jemaat.formcarilaporanbulanan');
        Route::get("jemaat/data/laporan-keuangan/cari-tahunan", 'KeuanganJemaatController@carilaporantahunan')->name('jemaat.formcarilaporantahunan');
        Route::get("jemaat/data/laporan-keuangan/cari-tahunan/", 'KeuanganJemaatController@processcarilaporantahunan')->name('jemaat.formcarilaporantahunan');
        Route::get("jemaat/data/laporan-keuangan-mingguan/{tanggal_awal}/{tanggal_akhir}/{id}", 'KeuanganJemaatController@laporanmingguan')->name('jemaat.laporanmingguan');
        Route::get("jemaat/data/laporan-keuangan-bulanan/{tanggal_awal}/{tanggal_akhir}/{id}", 'KeuanganJemaatController@laporanbulanan')->name('jemaat.laporanbulanan');
        Route::get("jemaat/data/laporan-keuangan-tahunan/{tanggal_awal}/{tanggal_akhir}/{id}", 'KeuanganJemaatController@laporantahunan')->name('jemaat.laporantahunan');

        Route::prefix('pendeta')->group(function () {
        Route::get('/', 'HomeController@dashboard')->name('pendeta.index');
        Route::get("/data/keluarga", 'PendetaController@datakeluarga')->name('pendeta.datakeluarga');
        Route::get("/data/keluarga/add", 'PendetaController@formkeluarga')->name('pendeta.formkeluarga');
        Route::post("/data/keluarga/add", 'PendetaController@formkeluargaprocess')->name('pendeta.formkeluarga');
        Route::get("/data/keluarga/{id}", 'PendetaController@detailkeluarga')->name('pendeta.detailkeluarga');
        Route::get("/editdatakeluarga/{id}", 'PendetaController@editdatakeluarga')->name('pendeta.editdatakeluarga');
        Route::post('/editdatakeluarga/{id}', 'PendetaController@update')->name('pendeta.update');
        Route::get("/data/jemaat/add/{idKeluarga}", 'PendetaController@formjemaat')->name('pendeta.formjemaat');
        Route::post("/data/jemaat/add/{idKeluarga}", 'PendetaController@formjemaatprocess')->name('pendeta.formjemaat');
        Route::get("/data/jemaat/{nik}", "PendetaController@detailjemaat")->name("pendeta.detailjemaat");
        Route::get("/data/jemaat", 'PendetaController@datajemaat')->name('pendeta.datajemaat');
        Route::get("/data/jemaat/edit/{nik}", "PendetaController@editdetailjemaat")->name("pendeta.editdetailjemaat");
        Route::post("/data/jemaat/edit", "PendetaController@updateJemaat")->name("pendeta.updateJemaat");
        Route::get("/data/statistik", 'PendetaController@datastatistik')->name('pendeta.datastatistik');
        Route::get('/pelayangereja', 'PendetaController@pelayan')->name('Pendeta.datapelayan');
        Route::get("/data/pelayan/add", 'PendetaController@formpelayan')->name('pendeta.formdatapelayan');
        Route::post("/data/pelayan/add", 'PendetaController@formpelayanprocess')->name('pendeta.formdatapelayan');
        Route::get('/renungan', 'PendetaController@showrenungan')->name('pendeta.renunganshow');
        Route::get('/tambah-renungan', 'PendetaController@createrenungan')->name('pendeta.createrenungan');
        Route::post("/tambah-renungan", 'PendetaController@storerenungan')->name('pendeta.storerenungan');
        Route::get('/editrenungan/{id}', 'PendetaController@editrenungan')->name('pendeta.editrenungan');
        Route::post('/editrenungan/{id}', 'PendetaController@updaterenungan')->name('pendeta.updaterenungan');
        Route::get('/jadwal', 'PendetaController@showjadwal')->name('pendeta.jadwal');
        Route::get('/tambah-jadwal', 'PendetaController@createjadwal')->name('pendeta.createjadwal');
        Route::post("/tambah-jadwal", 'PendetaController@storejadwal')->name('pendeta.storejadwal');
        Route::get("/editjadwal/{id}", 'PendetaController@editjadwal')->name('pendeta.editjadwal');
        Route::post('/editjadwal/{id}', 'PendetaController@updatejadwal')->name('pendeta.updatejadwal');
        Route::get("/detail/ibadah", 'PendetaController@detailtataibadah')->name('pendeta.detailibadah');
        Route::get('/createpelayanan/{id}', 'PendetaController@createpelayanan')->name('pendeta.createpelayanan');
        Route::post('/createpelayanan/{id}', 'PendetaController@storepelayanan')->name('pendeta.storepelayanan');
        Route::get('/pelayanan', 'PendetaController@showpelayanan')->name('pendeta.pelayanan');
        Route::post('/pelayanan', 'PendetaController@showpelayanan')->name('pendeta.getpelayanan');
        Route::get('/jadwal/editpelayanan/{id}', 'PendetaController@editpelayanan')->name('pendeta.editpelayanan');
        Route::post('/jadwal/editpelayanan/{id}', 'PendetaController@updatepelayanan')->name('pendeta.updatepelayanan');
        Route::get('/jadwal/pelayanan/{id}', 'PendetaController@detailpelayanan')->name('pendeta.detailpelayanan');
        Route::get("/tambah-tata", 'PendetaController@createtata')->name('pendeta.createtata');
        Route::post("/tambah-tata", 'PendetaController@tatastore')->name('pendeta.createtata');
        Route::get('/tataibadah/{id}', 'PendetaController@edittataibadah')->name('pendeta.edittataibadah');
        Route::post('/tataibadah/{id}', 'PendetaController@updatetataibadah')->name('pendeta.updaetataibadah');
        Route::get('/data/sektor/anggota', 'PendetaController@showsektoranggota')->name('pendeta.sektor');
        Route::post('/data/sektor/anggota', 'PendetaController@showsektoranggota')->name('pendeta.getsektor');
        Route::get('/data/sektor', 'PendetaController@showsektor')->name('pendeta.Sektor');
        Route::get('/editsektor/{id}', 'PendetaController@editsektor')->name('pendeta.editsektor');
        Route::post('/editsektor/{id}', 'PendetaController@updatesektor')->name('pendeta.updatesektor');
        Route::get('/data/sektor/add', 'PendetaController@createsektor')->name('pendeta.createsektor');
        Route::post('/data/sektor/add', 'PendetaController@storesektor')->name('pendeta.storesektor');

        Route::get("/data/keuangan", 'KeuanganController@index')->name('pendeta.datakeuangan');
        Route::get("/data/keuangan/nonaktif", 'KeuanganController@index2')->name('pendeta.datakeuangannonaktif');
        Route::get("/data/keuangan/add", 'KeuanganController@formkeuangan')->name('pendeta.formtambahkeuangan');
        Route::post("/data/keuangan/add", 'KeuanganController@formkeuanganprocess')->name('pendeta.formtambahkeuangan');
        Route::get("/data/keuangan/edit/{id}", 'KeuanganController@ubahkeuangan')->name('pendeta.formubahkeuangan');
        Route::post("/data/keuangan/update/{id}", 'KeuanganController@updatekeuangan')->name('pendeta.formupdatekeuangan');
        Route::get("/data/keuangan/edit/status/{id}", 'KeuanganController@ubahstatuskeuangan')->name('pendeta.formubahstatus');
        Route::get("/data/keuangan/edit/status/nonaktif/{id}", 'KeuanganController@ubahstatuskeuangan2')->name('pendeta.formubahstatus2');
        Route::get("/data/dana-pemasukan", 'KeuanganController@pemasukan')->name('pendeta.danapemasukan');
        Route::get("/data/dana-pengeluaran", 'KeuanganController@pengeluaran')->name('pendeta.danapengeluaran');
        Route::get("/data/laporan-keuangan", 'KeuanganController@laporan')->name('pendeta.laporankeuangan');
        Route::get("/data/laporan-keuangan/nonaktif", 'KeuanganController@laporan2')->name('pendeta.laporankeuangannonaktif');
        Route::get("/data/laporan-keuangan/edit/status/{id}", 'KeuanganController@ubahstatuslaporan')->name('pendeta.formubahstatuslaporan');
        Route::get("/data/laporan-keuangan/edit/status/nonaktif/{id}", 'KeuanganController@ubahstatuslaporan2')->name('pendeta.formubahstatuslaporan2');
        Route::get("/data/laporan-keuangan/add", 'KeuanganController@laporankeuangan')->name('pendeta.formtambahlaporankeuangan');
        Route::post("/data/laporan-keuangan/add", 'KeuanganController@laporankeuanganprocess')->name('pendeta.formtambahlaporankeuangan');
        Route::get("/data/laporan-keuangan/edit/{id}", 'KeuanganController@ubahlaporankeuangan')->name('pendeta.formubahlaporankeuangan');
        Route::post("/data/laporan-keuangan/update/{id}", 'KeuanganController@ubahlaporankeuanganprocess')->name('pendeta.formubahlaporankeuangan');
        Route::get("/data/laporan-keuangan/cari-mingguan", 'KeuanganController@carilaporanmingguan')->name('pendeta.formcarilaporanmingguan');
        Route::get("/data/laporan-keuangan/cari-mingguan/", 'KeuanganController@processcarilaporanmingguan')->name('pendeta.formcarilaporanmingguan');
        Route::get("/data/laporan-keuangan/cari-bulanan", 'KeuanganController@carilaporanbulanan')->name('pendeta.formcarilaporanbulanan');
        Route::get("/data/laporan-keuangan/cari-bulanan/", 'KeuanganController@processcarilaporanbulanan')->name('pendeta.formcarilaporanbulanan');
        Route::get("/data/laporan-keuangan/cari-tahunan", 'KeuanganController@carilaporantahunan')->name('pendeta.formcarilaporantahunan');
        Route::get("/data/laporan-keuangan/cari-tahunan/", 'KeuanganController@processcarilaporantahunan')->name('pendeta.formcarilaporantahunan');
        Route::get("/data/laporan-keuangan-mingguan/{tanggal_awal}/{tanggal_akhir}/{id}", 'KeuanganController@laporanmingguan')->name('pendeta.laporanmingguan');
        Route::get("/data/laporan-keuangan-bulanan/{tanggal_awal}/{tanggal_akhir}/{id}", 'KeuanganController@laporanbulanan')->name('pendeta.laporanbulanan');
        Route::get("/data/laporan-keuangan-tahunan/{tanggal_awal}/{tanggal_akhir}/{id}", 'KeuanganController@laporantahunan')->name('pendeta.laporantahunan');
    });
    Route::prefix('tatausaha')->group(function () {
        Route::get('/', 'HomeController@dashboardtatausaha')->name('tatausaha.index');
        Route::get("/data/keluarga", 'TatausahaController@datakeluarga')->name('tatausaha.datakeluargatatausaha');
        Route::get("/data/keluarga/add", 'TatausahaController@formkeluarga')->name('tatausaha.formkeluargatatausaha');
        Route::post("/data/keluarga/add", 'TatausahaController@formkeluargaprocess')->name('tatausaha.formkeluarga');
        Route::get("/data/keluarga/search", 'TatausahaController@search')->name('tatausaha.datakeluargasearch');
        Route::get("/data/keluarga/{id}", 'TatausahaController@detailkeluarga')->name('tatausaha.detailkeluarga');
        Route::get("/editdatakeluarga/{id}", 'TatausahaController@editdatakeluarga')->name('tatausaha.editdatakeluarga');
        Route::post('/editdatakeluarga/{id}', 'TatausahaController@update')->name('tatausaha.update');
        Route::get("/data/jemaat/add/{idKeluarga}", 'TatausahaController@formjemaat')->name('tatausaha.formjemaat');
        Route::post("/data/jemaat/add/{idKeluarga}", 'TatausahaController@formjemaatprocess')->name('tatausaha.formjemaat');
        Route::get("/data/jemaat/{nik}", "TatausahaController@detailjemaat")->name("tatausaha.detailjemaat");
        Route::get("/data/jemaat", 'TatausahaController@datajemaat')->name('tatausaha.datajemaattatausaha');
        Route::get("/data/jemaat/edit/{nik}", "TatausahaController@editdetailjemaat")->name("tatausaha.editdetailjemaat");
        Route::post("/data/jemaat/edit", "TatausahaControllers@updateJemaat")->name("tatausaha.updateJemaat");
        Route::get("/data/statistik", 'TatausahaController@datastatistik')->name('tatausaha.datastatistik');
        Route::get('/pelayangereja', 'TatausahaController@pelayan')->name('tatausaha.datapelayantatausaha');
        Route::get("/data/pelayan/add", 'TatausahaController@formpelayan')->name('tatausaha.formdatapelayantatausaha');
        Route::post("/data/pelayan/add", 'TatausahaController@formpelayanprocess')->name('tatausaha.formdatapelayanusaha');
        Route::get("/editdatapelayan/{id}", 'TatausahaController@editdatapelayan')->name('tatausaha.editpelayan');
        Route::post('/editdatapelayan/{id}', 'TatausahaController@updatedatapelayan')->name('tatausaha.update');
        Route::get('/jadwal', 'TatausahaController@showjadwal')->name('tatausaha.jadwal');
        Route::get('/tambah-jadwal', 'TatausahaController@createjadwal')->name('tatausaha.createjadwal');
        Route::post("/tambah-jadwal", 'TatausahaController@storejadwal')->name('tatausaha.storejadwal');
        Route::get("/editjadwal/{id}", 'TatausahaController@editjadwal')->name('tatausaha.editjadwal');
        Route::post('/editjadwal/{id}', 'TatausahaController@updatejadwal')->name('tatausaha.updatejadwal');
        Route::get('/renungan', 'TatausahaController@showrenungan')->name('tatausaha.renunganshow');
        Route::get('/tambah-renungan', 'TatausahaController@createrenungan')->name('tatausaha.createrenungan');
        Route::post("/tambah-renungan", 'TatausahaController@storerenungan')->name('tatausaha.storerenungan');
        Route::get('/editrenungan/{id}', 'TatausahaController@editrenungan')->name('tatausaha.editrenungan');
        Route::post('/editrenungan/{id}', 'TatausahaController@updaterenungan')->name('tatausaha.updaterenungan');
        Route::get("/detail/ibadah", 'TatausahaController@detailtataibadah')->name('tatausaha.detailibadah');
        Route::get("/tambah-tata", 'TatausahaController@createtata')->name('tatausaha.createtata');
        Route::post("/tambah-tata", 'TatausahaController@tatastore')->name('tatausaha.createtata');
        Route::get('/tataibadah/{id}', 'TatausahaController@edittataibadah')->name('tatausaha.edittataibadah');
        Route::post('/tataibadah/{id}', 'TatausahaController@updatetataibadah')->name('tatausaha.updaetataibadah');

        Route::get("/data/keuangan", 'KeuangantataController@index')->name('tatausaha.datakeuangan');
        Route::get("/data/keuangan/nonaktif", 'KeuangantataController@index2')->name('tatausaha.datakeuangannonaktif');
        Route::get("/data/keuangan/add", 'KeuangantataController@formkeuangan')->name('tatausaha.formtambahkeuangan');
        Route::post("/data/keuangan/add", 'KeuangantataController@formkeuanganprocess')->name('tatausaha.formtambahkeuangan');
        Route::get("/data/keuangan/edit/{id}", 'KeuangantataController@ubahkeuangan')->name('tatausaha.formubahkeuangan');
        Route::post("/data/keuangan/update/{id}", 'KeuangantataController@updatekeuangan')->name('tatausaha.formupdatekeuangan');
        Route::get("/data/keuangan/edit/status/{id}", 'KeuangantataController@ubahstatuskeuangan')->name('tatausaha.formubahstatus');
        Route::get("/data/keuangan/edit/status/nonaktif/{id}", 'KeuangantataController@ubahstatuskeuangan2')->name('tatausaha.formubahstatus2');
        Route::get("/data/dana-pemasukan", 'KeuangantataController@pemasukan')->name('tatausaha.danapemasukan');
        Route::get("/data/dana-pengeluaran", 'KeuangantataController@pengeluaran')->name('tatausaha.danapengeluaran');
        Route::get("/data/laporan-keuangan", 'KeuangantataController@laporan')->name('tatausaha.laporankeuangan');
        Route::get("/data/laporan-keuangan/nonaktif", 'KeuangantataController@laporan2')->name('tatausaha.laporankeuangannonaktif');
        Route::get("/data/laporan-keuangan/edit/status/{id}", 'KeuangantataController@ubahstatuslaporan')->name('tatausaha.formubahstatuslaporan');
        Route::get("/data/laporan-keuangan/edit/status/nonaktif/{id}", 'KeuangantataController@ubahstatuslaporan2')->name('tatausaha.formubahstatuslaporan2');
        Route::get("/data/laporan-keuangan/add", 'KeuangantataController@laporankeuangan')->name('tatausaha.formtambahlaporankeuangan');
        Route::post("/data/laporan-keuangan/add", 'KeuangantataController@laporankeuanganprocess')->name('tatausaha.formtambahlaporankeuangan');
        Route::get("/data/laporan-keuangan/edit/{id}", 'KeuangantataController@ubahlaporankeuangan')->name('tatausaha.formubahlaporankeuangan');
        Route::post("/data/laporan-keuangan/update/{id}", 'KeuangantataController@ubahlaporankeuanganprocess')->name('tatausaha.formubahlaporankeuangan');
        Route::get("/data/laporan-keuangan/cari-mingguan", 'KeuangantataController@carilaporanmingguan')->name('tatausaha.formcarilaporanmingguan');
        Route::get("/data/laporan-keuangan/cari-mingguan/", 'KeuangantataController@processcarilaporanmingguan')->name('tatausaha.formcarilaporanmingguan');
        Route::get("/data/laporan-keuangan/cari-bulanan", 'KeuangantataController@carilaporanbulanan')->name('tatausaha.formcarilaporanbulanan');
        Route::get("/data/laporan-keuangan/cari-bulanan/", 'KeuangantataController@processcarilaporanbulanan')->name('tatausaha.formcarilaporanbulanan');
        Route::get("/data/laporan-keuangan/cari-tahunan", 'KeuangantataController@carilaporantahunan')->name('tatausaha.formcarilaporantahunan');
        Route::get("/data/laporan-keuangan/cari-tahunan/", 'KeuangantataController@processcarilaporantahunan')->name('tatausaha.formcarilaporantahunan');
        Route::get("/data/laporan-keuangan-mingguan/{tanggal_awal}/{tanggal_akhir}/{id}", 'KeuangantataController@laporanmingguan')->name('tatausaha.laporanmingguan');
        Route::get("/data/laporan-keuangan-bulanan/{tanggal_awal}/{tanggal_akhir}/{id}", 'KeuangantataController@laporanbulanan')->name('tatausaha.laporanbulanan');
        Route::get("/data/laporan-keuangan-tahunan/{tanggal_awal}/{tanggal_akhir}/{id}", 'KeuangantataController@laporantahunan')->name('tatausaha.laporantahunan');
    });
    Route::prefix('penatua')->group(function () {
        Route::get('/', 'HomeController@dashboardpenatua')->name('penatua.index');
        Route::get("/data/keluarga", 'PenatuaController@datakeluarga')->name('penatua.datakeluarga');
        Route::get("/data/keluarga/add", 'PenatuaController@formkeluarga')->name('penatua.formkeluarga');
        Route::post("/data/keluarga/add", 'PenatuaController@formkeluargaprocess')->name('penatua.formkeluarga');
        Route::get("/data/keluarga/{id}", 'PenatuaController@detailkeluarga')->name('penatua.detailkeluarga');
        Route::get("/editdatakeluarga/{id}", 'PenatuaController@editdatakeluarga')->name('penatua.editdatakeluarga');
        Route::post('/editdatakeluarga/{id}', 'PenatuaController@update')->name('penatua.update');
        Route::get("/data/jemaat/add/{idKeluarga}", 'PenatuaController@formjemaat')->name('penatua.formjemaat');
        Route::post("/data/jemaat/add/{idKeluarga}", 'PenatuaController@formjemaatprocess')->name('penatua.formjemaat');
        Route::get("/data/jemaat/{nik}", "PenatuaController@detailjemaat")->name("penatua.detailjemaat");
        Route::get("/data/jemaat", 'PenatuaController@datajemaat')->name('penatua.datajemaat');
        Route::get('/pelayangereja', 'PenatuaController@pelayan')->name('penatua.datapelayan');
        Route::get("/data/pelayan/add", 'PenatuaController@formpelayan')->name('penatua.formdatapelayan');
        Route::post("/data/pelayan/add", 'PenatuaController@formpelayanprocess')->name('penatua.formdatapelayan');
        Route::get("/data/statistik", 'PenatuaController@datastatistik')->name('penatua.datastatistik');
        Route::get('/renungan', 'PenatuaController@showrenungan')->name('penatua.renunganshow');
        Route::get('/tambah-renungan', 'PenatuaController@createrenungan')->name('penatua.createrenungan');
        Route::post("/tambah-renungan", 'PenatuaController@storerenungan')->name('penatua.storerenungan');
        Route::get('/editrenungan/{id}', 'PenatuaController@editrenungan')->name('penatua.editrenungan');
        Route::post('/editrenungan/{id}', 'PenatuaController@updaterenungan')->name('penatua.updaterenungan');
        Route::get('/jadwal', 'PenatuaController@showjadwal')->name('penatua.jadwal');
        Route::get("/editjadwal/{id}", 'PenatuaController@editjadwal')->name('penatua.editjadwal');
        Route::post('/editjadwal/{id}', 'PenatuaController@updatejadwal')->name('penatua.updatejadwal');
        Route::get("/data/keuangan", 'KeuanganpenatuaController@index')->name('penatua.datakeuangan');
        Route::get("/data/keuangan/nonaktif", 'KeuanganpenatuaController@index2')->name('penatua.datakeuangannonaktif');
        Route::get("/data/keuangan/add", 'KeuanganpenatuaController@formkeuangan')->name('penatua.formtambahkeuangan');
        Route::post("/data/keuangan/add", 'KeuanganpenatuaController@formkeuanganprocess')->name('penatua.formtambahkeuangan');
        Route::get("/data/keuangan/edit/{id}", 'KeuanganpenatuaController@ubahkeuangan')->name('penatua.formubahkeuangan');
        Route::post("/data/keuangan/update/{id}", 'KeuanganpenatuaController@updatekeuangan')->name('penatua.formupdatekeuangan');
        Route::get("/data/keuangan/edit/status/{id}", 'KeuanganpenatuaController@ubahstatuskeuangan')->name('penatua.formubahstatus');
        Route::get("/data/keuangan/edit/status/nonaktif/{id}", 'KeuanganpenatuaController@ubahstatuskeuangan2')->name('penatua.formubahstatus2');
        Route::get("/data/dana-pemasukan", 'KeuanganpenatuaController@pemasukan')->name('penatua.danapemasukan');
        Route::get("/data/dana-pengeluaran", 'KeuanganpenatuaController@pengeluaran')->name('penatua.danapengeluaran');
        Route::get("/data/laporan-keuangan", 'KeuanganpenatuaController@laporan')->name('penatua.laporankeuangan');
        Route::get("/data/laporan-keuangan/nonaktif", 'KeuanganpenatuaController@laporan2')->name('penatua.laporankeuangannonaktif');
        Route::get("/data/laporan-keuangan/edit/status/{id}", 'KeuanganpenatuaController@ubahstatuslaporan')->name('penatua.formubahstatuslaporan');
        Route::get("/data/laporan-keuangan/edit/status/nonaktif/{id}", 'KeuanganpenatuaController@ubahstatuslaporan2')->name('penatua.formubahstatuslaporan2');
        Route::get("/data/laporan-keuangan/add", 'KeuanganpenatuaController@laporankeuangan')->name('penatua.formtambahlaporankeuangan');
        Route::post("/data/laporan-keuangan/add", 'KeuanganpenatuaController@laporankeuanganprocess')->name('penatua.formtambahlaporankeuangan');
        Route::get("/data/laporan-keuangan/edit/{id}", 'KeuanganpenatuaController@ubahlaporankeuangan')->name('penatua.formubahlaporankeuangan');
        Route::post("/data/laporan-keuangan/update/{id}", 'KeuanganpenatuaController@ubahlaporankeuanganprocess')->name('penatua.formubahlaporankeuangan');
        Route::get("/data/laporan-keuangan/cari-mingguan", 'KeuanganpenatuaController@carilaporanmingguan')->name('penatua.formcarilaporanmingguan');
        Route::get("/data/laporan-keuangan/cari-mingguan/", 'KeuanganpenatuaController@processcarilaporanmingguan')->name('penatua.formcarilaporanmingguan');
        Route::get("/data/laporan-keuangan/cari-bulanan", 'KeuanganpenatuaController@carilaporanbulanan')->name('penatua.formcarilaporanbulanan');
        Route::get("/data/laporan-keuangan/cari-bulanan/", 'KeuanganpenatuaController@processcarilaporanbulanan')->name('penatua.formcarilaporanbulanan');
        Route::get("/data/laporan-keuangan/cari-tahunan", 'KeuanganpenatuaController@carilaporantahunan')->name('penatua.formcarilaporantahunan');
        Route::get("/data/laporan-keuangan/cari-tahunan/", 'KeuanganpenatuaController@processcarilaporantahunan')->name('penatua.formcarilaporantahunan');
        Route::get("/data/laporan-keuangan-mingguan/{tanggal_awal}/{tanggal_akhir}/{id}", 'KeuanganpenatuaController@laporanmingguan')->name('penatua.laporanmingguan');
        Route::get("/data/laporan-keuangan-bulanan/{tanggal_awal}/{tanggal_akhir}/{id}", 'KeuanganpenatuaController@laporanbulanan')->name('penatua.laporanbulanan');
        Route::get("/data/laporan-keuangan-tahunan/{tanggal_awal}/{tanggal_akhir}/{id}", 'KeuanganpenatuaController@laporantahunan')->name('penatua.laporantahunan');

    });
    Route::prefix('bendahara')->group(function () {
        Route::get('/', 'HomeController@dashboardbendahara')->name('bendahara.index');
        Route::get("/data/keluarga", 'BendaharaController@datakeluarga')->name('bendahara.datakeluarga');
        Route::get("/data/keluarga/add", 'BendaharaController@formkeluarga')->name('bendahara.formkeluarga');
        Route::post("/data/keluarga/add", 'BendaharaController@formkeluargaprocess')->name('bendahara.formkeluarga');
        Route::get("/data/keluarga/{id}", 'BendaharaController@detailkeluarga')->name('bendahara.detailkeluarga');
        Route::get("/editdatakeluarga/{id}", 'BendaharaController@editdatakeluarga')->name('bendahara.editdatakeluarga');
        Route::post('/editdatakeluarga/{id}', 'BendaharaController@update')->name('bendahara.update');
        Route::get("/data/statistik", 'BendaharaController@datastatistik')->name('bendahara.datastatistik');
        Route::get("/data/jemaat/add/{idKeluarga}", 'BendaharaController@formjemaat')->name('bendahara.formjemaat');
        Route::post("/data/jemaat/add/{idKeluarga}", 'BendaharaController@formjemaatprocess')->name('bendahara.formjemaat');
        Route::get("/data/jemaat/edit/{nik}", "BendaharaController@editdetailjemaat")->name("bendahara.editdetailjemaat");
        Route::post("/data/jemaat/edit", "BendaharaController@updateJemaat")->name("bendahara.updateJemaat");
        Route::get("/data/jemaat/{nik}", "BendaharaController@detailjemaat")->name("bendahara.detailjemaat");
        Route::get("/data/jemaat", 'BendaharaController@datajemaat')->name('bendahara.datajemaat');
        Route::get('/pelayangereja', 'BendaharaController@pelayan')->name('bendahara.datapelayan');
        Route::get("/data/pelayan/add", 'BendaharaController@formpelayan')->name('bendahara.formdatapelayan');
        Route::post("/data/pelayan/add", 'BendaharaController@formpelayanprocess')->name('bendahara.formdatapelayan');
        Route::get("/data/keuangan", 'KeuanganbendaharaController@index')->name('bendahara.datakeuangan');
        Route::get("/data/keuangan/nonaktif", 'KeuanganbendaharaController@index2')->name('bendahara.datakeuangannonaktif');
        Route::get("/data/keuangan/add", 'KeuanganbendaharaController@formkeuangan')->name('bendahara.formtambahkeuangan');
        Route::post("/data/keuangan/add", 'KeuanganbendaharaController@formkeuanganprocess')->name('bendahara.formtambahkeuangan');
        Route::get("/data/keuangan/edit/{id}", 'KeuanganbendaharaController@ubahkeuangan')->name('bendahara.formubahkeuangan');
        Route::post("/data/keuangan/update/{id}", 'KeuanganbendaharaController@updatekeuangan')->name('bendahara.formupdatekeuangan');
        Route::get("/data/keuangan/edit/status/{id}", 'KeuanganbendaharaController@ubahstatuskeuangan')->name('bendahara.formubahstatus');
        Route::get("/data/keuangan/edit/status/nonaktif/{id}", 'KeuanganbendaharaController@ubahstatuskeuangan2')->name('bendahara.formubahstatus2');
        Route::get("/data/dana-pemasukan", 'KeuanganbendaharaController@pemasukan')->name('bendahara.danapemasukan');
        Route::get("/data/dana-pengeluaran", 'KeuanganbendaharaController@pengeluaran')->name('bendahara.danapengeluaran');
        Route::get("/data/laporan-keuangan", 'KeuanganbendaharaController@laporan')->name('bendahara.laporankeuangan');
        Route::get("/data/laporan-keuangan/nonaktif", 'KeuanganbendaharaController@laporan2')->name('bendahara.laporankeuangannonaktif');
        Route::get("/data/laporan-keuangan/edit/status/{id}", 'KeuanganbendaharaController@ubahstatuslaporan')->name('bendahara.formubahstatuslaporan');
        Route::get("/data/laporan-keuangan/edit/status/nonaktif/{id}", 'KeuanganbendaharaController@ubahstatuslaporan2')->name('bendahara.formubahstatuslaporan2');
        Route::get("/data/laporan-keuangan/add", 'KeuanganbendaharaController@laporankeuangan')->name('bendahara.formtambahlaporankeuangan');
        Route::post("/data/laporan-keuangan/add", 'KeuanganbendaharaController@laporankeuanganprocess')->name('bendahara.formtambahlaporankeuangan');
        Route::get("/data/laporan-keuangan/edit/{id}", 'KeuanganbendaharaController@ubahlaporankeuangan')->name('bendahara.formubahlaporankeuangan');
        Route::post("/data/laporan-keuangan/update/{id}", 'KeuanganbendaharaController@ubahlaporankeuanganprocess')->name('bendahara.formubahlaporankeuangan');
        Route::get("/data/laporan-keuangan/cari-mingguan", 'KeuanganbendaharaController@carilaporanmingguan')->name('bendahara.formcarilaporanmingguan');
        Route::get("/data/laporan-keuangan/cari-mingguan/", 'KeuanganbendaharaController@processcarilaporanmingguan')->name('bendahara.formcarilaporanmingguan');
        Route::get("/data/laporan-keuangan/cari-bulanan", 'KeuanganbendaharaController@carilaporanbulanan')->name('bendahara.formcarilaporanbulanan');
        Route::get("/data/laporan-keuangan/cari-bulanan/", 'KeuanganbendaharaController@processcarilaporanbulanan')->name('bendahara.formcarilaporanbulanan');
        Route::get("/data/laporan-keuangan/cari-tahunan", 'KeuanganbendaharaController@carilaporantahunan')->name('bendahara.formcarilaporantahunan');
        Route::get("/data/laporan-keuangan/cari-tahunan/", 'KeuanganbendaharaController@processcarilaporantahunan')->name('bendahara.formcarilaporantahunan');
        Route::get("/data/laporan-keuangan-mingguan/{tanggal_awal}/{tanggal_akhir}/{id}", 'KeuanganbendaharaController@laporanmingguan')->name('bendahara.laporanmingguan');
        Route::get("/data/laporan-keuangan-bulanan/{tanggal_awal}/{tanggal_akhir}/{id}", 'KeuanganbendaharaController@laporanbulanan')->name('bendahara.laporanbulanan');
        Route::get("/data/laporan-keuangan-tahunan/{tanggal_awal}/{tanggal_akhir}/{id}", 'KeuanganbendaharaController@laporantahunan')->name('bendahara.laporantahunan');

    });
    Route::prefix('sekretaris')->group(function () {
        Route::get('/', 'HomeController@dashboardsekretaris')->name('sekretaris.index');
        Route::get("/data/keluarga", 'SekretarisController@datakeluarga')->name('sekretaris.datakeluarga');
        Route::get("/data/keluarga/add", 'SekretarisController@formkeluarga')->name('sekretaris.formkeluarga');
        Route::post("/data/keluarga/add", 'SekretarisController@formkeluargaprocess')->name('sekretaris.formkeluarga');
        Route::get("/data/keluarga/{id}", 'SekretarisController@detailkeluarga')->name('sekretaris.detailkeluarga');
        Route::get("/editdatakeluarga/{id}", 'SekretarisController@editdatakeluarga')->name('sekretaris.editdatakeluarga');
        Route::post('/editdatakeluarga/{id}', 'SekretarisController@update')->name('sekretaris.update');
        Route::get("/data/jemaat/add/{idKeluarga}", 'SekretarisController@formjemaat')->name('sekretaris.formjemaat');
        Route::post("/data/jemaat/add/{idKeluarga}", 'SekretarisController@formjemaatprocess')->name('sekretaris.formjemaat');
        Route::get("/data/jemaat/{nik}", "SekretarisController@detailjemaat")->name("sekretaris.detailjemaat");
        Route::get("/data/jemaat", 'SekretarisController@datajemaat')->name('sekretaris.datajemaat');
        Route::get("/data/statistik", 'SekretarisController@datastatistik')->name('sekretaris.datastatistik');
        Route::get('/pelayangereja', 'SekretarisController@pelayan')->name('sekretaris.datapelayan');
        Route::get("/data/jemaat/edit/{nik}", "SekretarisController@editdetailjemaat")->name("sekretaris.editdetailjemaat");
        Route::post("/data/jemaat/edit", "SekretarisController@updateJemaat")->name("sekretaris.updateJemaat");
        Route::get("/data/pelayan/add", 'SekretarisController@formpelayan')->name('sekretaris.formdatapelayan');
        Route::post("/data/pelayan/add", 'SekretarisController@formpelayanprocess')->name('sekretaris.formdatapelayan');
        Route::get("/data/keuangan", 'KeuangansekreController@index')->name('sekretaris.datakeuangan');
        Route::get("/data/keuangan/nonaktif", 'KeuangansekreController@index2')->name('sekretaris.datakeuangannonaktif');
        Route::get("/data/keuangan/add", 'KeuangansekreController@formkeuangan')->name('sekretaris.formtambahkeuangan');
        Route::post("/data/keuangan/add", 'KeuangansekreController@formkeuanganprocess')->name('sekretaris.formtambahkeuangan');
        Route::get("/data/keuangan/edit/{id}", 'KeuangansekreController@ubahkeuangan')->name('sekretaris.formubahkeuangan');
        Route::post("/data/keuangan/update/{id}", 'KeuangansekreController@updatekeuangan')->name('sekretaris.formupdatekeuangan');
        Route::get("/data/keuangan/edit/status/{id}", 'KeuangansekreController@ubahstatuskeuangan')->name('sekretaris.formubahstatus');
        Route::get("/data/keuangan/edit/status/nonaktif/{id}", 'KeuangansekreController@ubahstatuskeuangan2')->name('sekretaris.formubahstatus2');
        Route::get("/data/dana-pemasukan", 'KeuangansekreController@pemasukan')->name('sekretaris.danapemasukan');
        Route::get("/data/dana-pengeluaran", 'KeuangansekreController@pengeluaran')->name('sekretaris.danapengeluaran');
        Route::get("/data/laporan-keuangan", 'KeuangansekreController@laporan')->name('sekretaris.laporankeuangan');
        Route::get("/data/laporan-keuangan/nonaktif", 'KeuangansekreController@laporan2')->name('sekretaris.laporankeuangannonaktif');
        Route::get("/data/laporan-keuangan/edit/status/{id}", 'KeuangansekreController@ubahstatuslaporan')->name('sekretaris.formubahstatuslaporan');
        Route::get("/data/laporan-keuangan/edit/status/nonaktif/{id}", 'KeuangansekreController@ubahstatuslaporan2')->name('sekretaris.formubahstatuslaporan2');
        Route::get("/data/laporan-keuangan/add", 'KeuangansekreController@laporankeuangan')->name('sekretaris.formtambahlaporankeuangan');
        Route::post("/data/laporan-keuangan/add", 'KeuangansekreController@laporankeuanganprocess')->name('sekretaris.formtambahlaporankeuangan');
        Route::get("/data/laporan-keuangan/edit/{id}", 'KeuangansekreController@ubahlaporankeuangan')->name('sekretaris.formubahlaporankeuangan');
        Route::post("/data/laporan-keuangan/update/{id}", 'KeuangansekreController@ubahlaporankeuanganprocess')->name('sekretaris.formubahlaporankeuangan');
        Route::get("/data/laporan-keuangan/cari-mingguan", 'KeuangansekreController@carilaporanmingguan')->name('sekretaris.formcarilaporanmingguan');
        Route::get("/data/laporan-keuangan/cari-mingguan/", 'KeuangansekreController@processcarilaporanmingguan')->name('sekretaris.formcarilaporanmingguan');
        Route::get("/data/laporan-keuangan/cari-bulanan", 'KeuangansekreController@carilaporanbulanan')->name('sekretaris.formcarilaporanbulanan');
        Route::get("/data/laporan-keuangan/cari-bulanan/", 'KeuangansekreController@processcarilaporanbulanan')->name('sekretaris.formcarilaporanbulanan');
        Route::get("/data/laporan-keuangan/cari-tahunan", 'KeuangansekreController@carilaporantahunan')->name('sekretaris.formcarilaporantahunan');
        Route::get("/data/laporan-keuangan/cari-tahunan/", 'KeuangansekreController@processcarilaporantahunan')->name('sekretaris.formcarilaporantahunan');
        Route::get("/data/laporan-keuangan-mingguan/{tanggal_awal}/{tanggal_akhir}/{id}", 'KeuangansekreController@laporanmingguan')->name('sekretaris.laporanmingguan');
        Route::get("/data/laporan-keuangan-bulanan/{tanggal_awal}/{tanggal_akhir}/{id}", 'KeuangansekreController@laporanbulanan')->name('sekretaris.laporanbulanan');
        Route::get("/data/laporan-keuangan-tahunan/{tanggal_awal}/{tanggal_akhir}/{id}", 'KeuangansekreController@laporantahunan')->name('sekretaris.laporantahunan');

    });
// });
Route::fallback(function () {
    abort(404);
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login_form');

// Route untuk memproses login
Route::post('/login', [LoginController::class, 'login'])->name('login_process');
