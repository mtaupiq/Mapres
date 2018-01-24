<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\AlternatifKriteria;
use App\Nilai_Eigen;
use App\WA;
use App\Alternatif;
use App\Hasil;
use PDF;


class EigenalternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = DB::table('wa')->where('nilai_k1',">",0)->paginate(15);
        $data = Alternatif::where('cek',0)->paginate(15);
        $k1 = DB::table('data_kriteria')->where('id', 1)->value('nama_kriteria');
        $k2 = DB::table('data_kriteria')->where('id', 2)->value('nama_kriteria');
        $k3 = DB::table('data_kriteria')->where('id', 3)->value('nama_kriteria');
        $k4 = DB::table('data_kriteria')->where('id', 4)->value('nama_kriteria');
        
        $k = WA::all();
        $jum1 = $k->sum('nilai_k1');
        $jum2 = $k->sum('nilai_k2');
        $jum3 = $k->sum('nilai_k3');
        $jum4 = $k->sum('nilai_k4');

        return view('penilaian.eigenak', compact('t','nama','data','k1','k2','k3','k4','jum1','jum2','jum3','jum4'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = WA::find($id)->delete();

        $request->session()->flash('message','Data berhasil dihapus !');
        return redirect('peserta');
    }

    public function alterkriteria()
    {
        $data = AlternatifKriteria::where('al_k1',">",0)->paginate(10);
        $k1 = DB::table('data_kriteria')->where('id', 1)->value('nama_kriteria');
        $k2 = DB::table('data_kriteria')->where('id', 2)->value('nama_kriteria');
        $k3 = DB::table('data_kriteria')->where('id', 3)->value('nama_kriteria');
        $k4 = DB::table('data_kriteria')->where('id', 4)->value('nama_kriteria');

        return view('penilaian.alterkriteria', compact('data','k1','k2','k3','k4'));
    }

    public function eigenkriteria()
    {
        $data = Nilai_Eigen::all();
        $jumlah = $data->sum('nilai');

        $ci = DB::table('analisa')->where('id',1)->value('ci');
        $cr = DB::table('analisa')->where('id',1)->value('cr');
        return view('penilaian.eigenkriteria',compact('data','jumlah','ci','cr'));
    }

    public function rekomendasi()
    {
        $data = Hasil::where('hasil_ahp',">",0)->orderBy('hasil_ahp','desc')->paginate(3);
        return view('penilaian.rekomendasi')->with('data',$data);
    }

    public function pdfrekomendasi()
    {
        $data=Hasil::where('hasil_ahp',">",0)->orderBy('hasil_ahp','desc')->paginate(3);
        $pdf = PDF::loadView('penilaian.rekomendasipdf', compact('data'))->setPaper('f4','landscape');
        return view('penilaian.rekomendasipdf', compact('data'));
        return $pdf->stream();
    }
}
