<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Spp;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $idspp = Spp::all();
        $idsiswa = Siswa::all();
        $iduser = User::all();
        $data = Transaksi::all();
        return view('transaksi.index', compact('data','idspp', 'idsiswa', 'iduser'))->with([
            'transaksi' => Transaksi::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $idspp = Spp::all();
        $idsiswa = Siswa::all();
        $iduser = User::all();
        return view('transaksi.create', compact('idspp', 'idsiswa','iduser'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $idspp = Spp::all();
        $idsiswa = Siswa::all();
        $iduser = User::all();
        Transaksi::create([
            'id_transaksi' => $request->id_pembayaran,
            'id_petugas' => $request->id_petugas,
            'nisn' => $request->nisn,
            'tgl_bayar' => $request->tgl_bayar,
            'bulan_dibayar' => $request->bulan_dibayar,
            'tahun_dibayar' => $request->tahun_dibayar,
            'id_spp' => $request->id_spp,
            'jumlah_bayar' => $request->jumlah_bayar,
            ]
        );

        return redirect('transaksi')->with('success', 'Penambahan Data Transaksi Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $idsiswa = Siswa::all();
        $idspp = Spp::all();
        $iduser = User::all();
        return view('transaksi.edit', compact('idsiswa', 'idspp', 'iduser'))->with([
            'transaksi' => Transaksi::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $idsiswa = Siswa::all();
        $idspp = Spp::all();
        $iduser = User::all();

        $request->validate([
            'id_petugas' => 'required',
            'nisn' => 'required',
            'tgl_bayar' => 'required',
            'bulan_dibayar' => 'required',
            'tahun_dibayar' => 'required',
            'id_spp' => 'required',
            'jumlah_bayar' => 'required',
        ]);

        $transaksi = Transaksi::with('siswa', 'spp')->findOrFail($id);
        $transaksi->id_petugas = $request->id_petugas;
        $transaksi->nisn = $request->nisn;
        $transaksi->tgl_bayar = $request->tgl_bayar;
        $transaksi->bulan_dibayar = $request->bulan_dibayar;
        $transaksi->tahun_dibayar = $request->tahun_dibayar;
        $transaksi->id_spp = $request->id_spp;
        $transaksi->jumlah_bayar = $request->jumlah_bayar;
        $transaksi->save();

        return to_route('transaksi.index')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->delete();
        return back()->with('success', 'Data Berhasil Di Hapus !.');
    }
}
