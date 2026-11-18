<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use Illuminate\Http\Request;

class RakController extends Controller
{
    public function index()
    {
        $raks = Rak::orderBy('kode', 'asc')->get();
        return view('rak.index', compact('raks'));
    }

    public function create()
    {
        return view('rak.form', ['rak' => null]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode'      => 'required|max:10|unique:rak,kode',
            'lorong'    => 'required',
            'kapasitas' => 'required|integer|min:1',
            'terisi'    => 'required|integer|min:0|lte:kapasitas',
            'tipe'      => 'required',
        ], $this->pesan());

        Rak::create($data);

        return redirect()->route('rak.index');
    }

    public function edit($kode)
    {
        $rak = Rak::findOrFail($kode);
        return view('rak.form', compact('rak'));
    }

    public function update(Request $request, $kode)
    {
        $rak = Rak::findOrFail($kode);

        $data = $request->validate([
            'lorong'    => 'required',
            'kapasitas' => 'required|integer|min:1',
            'terisi'    => 'required|integer|min:0|lte:kapasitas',
            'tipe'      => 'required',
        ], $this->pesan());

        $rak->update($data);

        return redirect()->route('rak.index');
    }

    public function destroy($kode)
    {
        Rak::findOrFail($kode)->delete();
        return redirect()->route('rak.index');
    }

    private function pesan()
    {
        return [
            'kode.required'      => 'Kode rak wajib diisi',
            'kode.unique'        => 'Kode rak sudah ada',
            'lorong.required'    => 'Lorong wajib dipilih',
            'kapasitas.required' => 'Kapasitas wajib diisi',
            'terisi.required'    => 'Isi rak wajib diisi (boleh 0)',
            'terisi.lte'         => 'Isi rak tidak boleh lebih dari kapasitas',
            'tipe.required'      => 'Tipe rak wajib dipilih',
        ];
    }
}