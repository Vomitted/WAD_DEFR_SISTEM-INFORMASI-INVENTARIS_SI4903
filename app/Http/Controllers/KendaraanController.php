<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index()
    {
        $data = Kendaraan::all();

        return view('index', compact('data'));
    }

    public function create()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_kendaraan' => 'required',
            'nama_kendaraan' => 'required',
            'nomor_seri' => 'required|unique:kendaraan,nomor_seri',
            'kondisi' => 'required',
            'perawatan_terakhir' => 'required|date',
        ]);

        Kendaraan::create($request->only([
            'jenis_kendaraan',
            'nama_kendaraan',
            'nomor_seri',
            'kondisi',
            'perawatan_terakhir'
        ]));

        return redirect()->route('kendaraan.index');
    }

    public function edit($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        return view('form', compact('kendaraan'));
    }

    public function update(Request $request, $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        $request->validate([
            'jenis_kendaraan' => 'required',
            'nama_kendaraan' => 'required',
            'nomor_seri' => 'required|unique:kendaraan,nomor_seri,' . $id,
            'kondisi' => 'required',
            'perawatan_terakhir' => 'required|date',
        ]);

        $kendaraan->update($request->only([
            'jenis_kendaraan',
            'nama_kendaraan',
            'nomor_seri',
            'kondisi',
            'perawatan_terakhir'
        ]));

        return redirect()->route('kendaraan.index');
    }

    public function destroy($id)
    {
        Kendaraan::findOrFail($id)->delete();

        return redirect()->route('kendaraan.index');
    }
}