<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Spp;
use App\Models\Kelas;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $idspp = Spp::all();
        $idkel = Kelas::all();
        $data = Siswa::all();
        return view('siswa.index', compact('data', 'idspp', 'idkel'))->with([
            'siswa' => Siswa::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $idspp = Spp::all();
        $idkel = Kelas::all();
        return view('siswa.create', compact('idspp', 'idkel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $idspp = Spp::all();
        $idkel = Kelas::all();
        Siswa::create([
            'nisn' => $request->nisn,
            'nis' => $request->nis,
            'nama' => $request->nama,
            'id_kelas' => $request->id_kelas,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'id_spp' => $request->id_spp,
        ]
        );

        return redirect('siswa')->with('success', 'Penambahan Data Siswa Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $idkel = Kelas::all();
        $idspp = Spp::all();
        return view('siswa.edit', compact('idkel', 'idspp'))->with([
            'siswa' => Siswa::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $idkel = Kelas::all();
        $idspp = Spp::all();

        $request->validate([
            'nisn' => 'required',   
            'nis' => 'required',
            'nama' => 'required',
            'id_kelas' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'id_spp' => 'required',
        ]);

        $siswa = Siswa::with('kelas', 'spp')->findOrFail($id);
        $siswa->nisn = $request->nisn;
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->id_kelas = $request->id_kelas;
        $siswa->alamat = $request->alamat;
        $siswa->no_telp = $request->no_telp;
        $siswa->id_spp = $request->id_spp;
        $siswa->save();

        return to_route('siswa.index')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();
        return back()->with('success', 'Data Berhasil Di Hapus !.');
    }
}
