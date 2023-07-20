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

        return view('admin.adminawal', $data);
    }

    public function show($idpoli, Request $request)
    {

        $data['poli'] = Poli::findOrFail($idpoli);
        if (is_null($request->tanggal)) {
            $data['tanggal'] = date('Y-m-d');
        } else {
            $data['tanggal'] = $request->tanggal;
        }

        $data['antrian'] = Antrian::where('idpoli', $idpoli)->where('tanggal',$data['tanggal'])->get();
        $data['now'] = $data['antrian']->where('iscalled', 1)->where('tanggal',$data['tanggal'])->max('noantrian');
        $data['last'] = $data['antrian']->where('tanggal',$data['tanggal'])->max('noantrian');

        // dd($data, $request->tanggal, $request->tanggal);
        return view('admin.adminantrian', $data);
    }

    public function store(Request $request)
    {
        try {
            $antrian_baru = new Antrian($request->all());
            $max = Antrian::where('idpoli', $request->idpoli)->where('tanggal', $request->tanggal)->max('noantrian');
            $poli = Poli::findOrFail($request->idpoli);

            $antrian_baru->noantrian = $max + 1;
            $antrian_baru->namapoli = $poli->namapoli;

            $antrian_baru->save();
        } catch (Exception $exception) {
            $this->flashError($exception->getMessage());
            return back();
        }

        // $this->flashSuccess('Berhasil Ambil Antrian');
        return view('tampilanawal',['cetak'=>$antrian_baru->id]);
    }

    public function update(Request $request, $status)
    {
        try {
            if ($status == '1') {
                $antrian = Antrian::where('idpoli', $request->idpoli)->where('tanggal', $request->tanggal)
                    ->where('iscalled', 0)->orderBy('noantrian')->first();
                $antrian->iscalled = $status;

            } elseif ($status == '0') {
                $antrian = Antrian::where('idpoli', $request->idpoli)->where('tanggal', $request->tanggal)
                    ->where('iscalled', 1)->orderBy('noantrian', 'desc')->first();
                $antrian->iscalled = $status;

            }

            $antrian->save();
        } catch (Exception $exception) {
            $this->flashError($exception->getMessage());
            return back();
        }

        // $this->flashSuccess('Data Berhasil Diubah');
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

    public function cetak($id){
        $antrian = Antrian::findOrFail($id);
        return view('cetak', ['antrian'=>$antrian]);
    }
}