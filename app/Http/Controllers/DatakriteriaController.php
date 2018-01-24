<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Datakriteria;
use App\Antar_Kriteria;
use App\IndeksRasio;
use App\Nilai_Eigen;
use App\Analisa;
use Session;

class DatakriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Datakriteria::all();
        $nama_kriteria = Datakriteria::pluck('nama_kriteria');
        return view('datakriteria.viewdata',compact('nama_kriteria'))->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('datakriteria.createdata');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Datakriteria;
        $data->nama_kriteria = $request['nama_kriteria'];
        $data->save();

        return redirect('datakriteria');
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
        $data = Datakriteria::find($id);
        return view('datakriteria.editdata', compact('data'));
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
        $data = Datakriteria::find($id);
        $data->persentase_kriteria = $request['persentase_kriteria'];
        $data->save();
        
        return redirect('datakriteria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}
