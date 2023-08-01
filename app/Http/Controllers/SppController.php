<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Spp::all();
        return view('spp.index', compact('data'))->with([
            'spp' => Spp::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('spp.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Spp::create([
            'id_spp' => $request->id_spp,
            'tahun' => $request->tahun,
            'nominal' => $request->nominal,
        ]
        );

        return redirect('spp')->with('success', 'Penambahan Data SPP Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Spp $spp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('spp.edit')->with([
            'spp' => Spp::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tahun' => 'required',
            'nominal' => 'required',
        ]);

        $spp = Spp::findOrFail($id);
        $spp->tahun = $request->tahun;
        $spp->nominal = $request->nominal;
        $spp->save();

        return to_route('spp.index')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $spp = Spp::find($id);
        $spp->delete();
        return back()->with('success', 'Data Berhasil Di Hapus !.');
    }
}
