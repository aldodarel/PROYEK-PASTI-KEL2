<?php

namespace App\Http\Controllers;

use App\jadwal_ibadah;
use App\WartaJemaat;
use App\Renungan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
        public function index()
    {
        $jadwal_ibadah = jadwal_ibadah::latest()->take(6)->get(); 
        $warta_jemaat = WartaJemaat::latest()->take(6)->get();
        $renungan = Renungan::latest()->take(9)->get(); 
        

        return view('FE/BeritaGereja.index', compact('jadwal_ibadah','warta_jemaat','renungan'));
    }
    public function detail($id)
    {
        $jadwal_ibadah = jadwal_ibadah::latest()->take(6)->get(); 
        $renungan = Renungan::latest()->take(9)->get(); 
        $warta_jemaat = DB::table('warta_jemaat')
        ->where('id', $id)
        ->get();
        return view('FE/BeritaGereja.detail', ['warta_jemaat'=>$warta_jemaat], compact('jadwal_ibadah','warta_jemaat','renungan'));
    }
    public function show()
    {
        $jadwal_ibadah = jadwal_ibadah::latest()->take(3)->get(); 
        $warta_jemaat = WartaJemaat::latest()->take(10)->get(); 

        return view('Berita.index', compact('jadwal_ibadah','warta_jemaat'));
    }
    public function create()
    {
            return view('Berita.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'tanggal'     => ['required'],
            'nama'     => ['required'],
            'isi'    => ['required'],
            'lampiran'    => ['required'],

        ]);

        if ($request->lampiran) {
            $data['lampiran'] = $request->lampiran->store('gallery');
        }

        WartaJemaat::create($data);

        return redirect()->route('Berita.index')->with('success','Berita berhasil ditambahkan');
    }
    public function edit($id)
    {
        $warta_jemaat = DB::table('warta_jemaat')
        ->where('id', $id)
        ->get();
        return view('Berita.edit', ['warta_jemaat'=>$warta_jemaat]);
    }

    public function showbenda()
    {
        $jadwal_ibadah = jadwal_ibadah::latest()->take(3)->get(); 
        $warta_jemaat = WartaJemaat::latest()->take(10)->get(); 

        return view('Berita.indexbenda', compact('jadwal_ibadah','warta_jemaat'));
    }
    public function createbenda()
    {
            return view('Berita.createbenda');
    }
    public function storebenda(Request $request)
    {
        $data = $request->validate([
            'tanggal'     => ['required'],
            'nama'     => ['required'],
            'isi'    => ['required'],
            'lampiran'    => ['required'],

        ]);

        if ($request->lampiran) {
            $data['lampiran'] = $request->lampiran->store('gallery');
        }

        WartaJemaat::create($data);

        return redirect()->route('Berita.indexbenda')->with('success','Berita berhasil ditambahkan');
    }
    public function editbenda($id)
    {
        $warta_jemaat = DB::table('warta_jemaat')
        ->where('id', $id)
        ->get();
        return view('Berita.editbenda', ['warta_jemaat'=>$warta_jemaat]);
    }

    
    public function showpendeta()
    {
        $jadwal_ibadah = jadwal_ibadah::latest()->take(3)->get(); 
        $warta_jemaat = WartaJemaat::latest()->take(10)->get(); 

        return view('Berita.indexpendeta', compact('jadwal_ibadah','warta_jemaat'));
    }
    public function creatependeta()
    {
            return view('Berita.creatependeta');
    }
    public function storependeta(Request $request)
    {
        $data = $request->validate([
            'tanggal'     => ['required'],
            'nama'     => ['required'],
            'isi'    => ['required'],
            'lampiran'    => ['required'],

        ]);

        if ($request->lampiran) {
            $data['lampiran'] = $request->lampiran->store('gallery');
        }

        WartaJemaat::create($data);

        return redirect()->route('Berita.indexpendeta')->with('success','Berita berhasil ditambahkan');
    }
    public function editpendeta($id)
    {
        $warta_jemaat = DB::table('warta_jemaat')
        ->where('id', $id)
        ->get();
        return view('Berita.editpendeta', ['warta_jemaat'=>$warta_jemaat]);
    }

    
    public function showsekre()
    {
        $jadwal_ibadah = jadwal_ibadah::latest()->take(3)->get(); 
        $warta_jemaat = WartaJemaat::latest()->take(10)->get(); 

        return view('Berita.indexsekre', compact('jadwal_ibadah','warta_jemaat'));
    }
    public function createsekre()
    {
            return view('Berita.createsekre');
    }
    public function storesekre(Request $request)
    {
        $data = $request->validate([
            'tanggal'     => ['required'],
            'nama'     => ['required'],
            'isi'    => ['required'],
            'lampiran'    => ['required'],

        ]);

        if ($request->lampiran) {
            $data['lampiran'] = $request->lampiran->store('gallery');
        }

        WartaJemaat::create($data);

        return redirect()->route('Berita.indexsekre')->with('success','Berita berhasil ditambahkan');
    }
    public function editsekre($id)
    {
        $warta_jemaat = DB::table('warta_jemaat')
        ->where('id', $id)
        ->get();
        return view('Berita.editsekre', ['warta_jemaat'=>$warta_jemaat]);
    }

    public function update(Request $request)
    {
        $old = WartaJemaat::find($request->id);
        $oldid = $old['lampiran'];

        $pdfFiles = $request->file('lampiran')->store('public/gallery');
        Storage::delete($oldid);


        DB::table('warta_jemaat')->where('id', $request->id)->update([
            'tanggal' => $request->tanggal,
            'nama' => $request->nama,
            'isi' => $request->isi,
            'lampiran' => $pdfFiles,
        ]);

        return back()->with('success','Berita berhasil ditambahkan');

    }
    // public function update(Request $request, WartaJemaat $beritum)
    // {
    //     $data = $request->validate([
    //         'tanggal'     => ['required'],
    //         'isi'    => ['required'],
    //         'lampiran'    => ['nullable','file'],

    //     ]);

    //     if ($request->lampiran) {
    //         $data['lampiran'] = $request->lampiran->store('gallery');
    //     }

    //     $beritum->update($data);

    //     return back()->with('success','Berita berhasil diperbarui');
    // }

}
