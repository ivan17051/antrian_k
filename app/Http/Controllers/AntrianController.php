<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antrian;
use App\Models\Poli;
use DB;

class AntrianController extends Controller
{
    public function index()
    {
        return view('tampilanawal');
    }

    public function index2()
    {
        $data['now'] = Antrian::where('iscalled', 1)->select('idpoli', 'namapoli', DB::raw('MAX(noantrian) as nonow'))->groupBy('idpoli', 'namapoli')->get();
        $data['last'] = Antrian::select('idpoli', 'namapoli', DB::raw('MAX(noantrian) as nolast'))->groupBy('idpoli', 'namapoli')->get();
        
        // dd($data);
        return view('admin.adminawal', $data);
    }

    public function show($idpoli){
        $data['poli'] = Poli::findOrFail($idpoli);
        $data['antrian'] = Antrian::where('idpoli', $idpoli)->get();
        $data['now'] = $data['antrian']->where('iscalled',1)->max('noantrian');
        $data['last'] = $data['antrian']->max('noantrian');
        
        return view('admin.adminantrian', $data);
    }

    public function store(Request $request)
    {
        try {
            $antrian_baru = new Antrian($request->all());
            $max = Antrian::where('idpoli',$request->idpoli)->max('noantrian');
            $poli = Poli::findOrFail($request->idpoli);
            
            $antrian_baru->noantrian = $max+1;
            $antrian_baru->namapoli = $poli->namapoli;
            $antrian_baru->tanggal = date("Y-m-d");
            
            // dd($antrian_baru);
            $antrian_baru->save();
        } catch (Exception $exception) {
            $this->flashError($exception->getMessage());
            return back();
        }

        // $this->flashSuccess('Berhasil Ambil Antrian');
        return back();
    }

    public function update(Request $request, $id)
    {
        try {
            $antrian = Antrian::findOrFail($id);
            $antrian->fill($request->all());
            $antrian->save();
        } catch (Exception $exception) {
            $this->flashError($exception->getMessage());
            return back();
        }

        $this->flashSuccess('Data Berhasil Diubah');
        return back();
    }

    public function destroy(Request $request, $id)
    {
        try {
            $antrian = Antrian::findOrFail($id);
            $antrian->delete();
        } catch (Exception $exception) {
            $this->flashError($exception->getMessage());
            return back();
        }

        $this->flashSuccess('Data Berhasil Dihapus');
        return back();
    }
}
