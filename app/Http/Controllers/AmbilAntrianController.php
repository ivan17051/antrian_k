<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AmbilAntrian;
use App\Poli;

class AmbilAntrianController extends Controller
{
    public function index()
    {
        return view('tampilanawal');
    }

    public function store(Request $request)
    {
        try {
            $antrian_baru = new AmbilAntrian($request->all());
            $antrian_baru->save();
        } catch (Exception $exception) {
            $this->flashError($exception->getMessage());
            return back();
        }

        $this->flashSuccess('Data Barang Berhasil Ditambahkan');
        return back();
    }

    public function update(Request $request, $id)
    {
        try {
            $barang = Barang::findOrFail($id);
            $barang->fill($request->all());
            isset($request->istitipan) ? $barang->istitipan = 1 : $barang->istitipan = 0;
            $barang->save();
        } catch (Exception $exception) {
            $this->flashError($exception->getMessage());
            return back();
        }

        $this->flashSuccess('Data Barang Berhasil Diubah');
        return back();
    }

    public function destroy(Request $request, $id)
    {
        try {
            $barang = Barang::findOrFail($id);
            $barang->delete();
        } catch (Exception $exception) {
            $this->flashError($exception->getMessage());
            return back();
        }

        $this->flashSuccess('Data Barang Berhasil Dihapus');
        return back();
    }
}
