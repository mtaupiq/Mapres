<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Datakriteria;
use App\Antar_Kriteria;
use App\IndeksRasio;
use App\Nilai_Eigen;
use App\Analisa;
use Session;

class AntarKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nama_kriteria = Datakriteria::pluck('nama_kriteria','id');
        $data = Antar_Kriteria::orderBy('id_kpertama')->get();
        $antar = Antar_Kriteria::all();
        return view('antarkriteria.viewdata', compact('nama_kriteria','data','antar'))->with('data',$data);
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
    public function store(Request $request) //satu
    {
        $validator = \Validator::make($request->all(), [
                'id_kpertama' => 'required',
                'id_kkedua' => 'required',
                'bobot' => 'required'
        ]);

        
        if ($validator->passes()) {

            $id_kpertama = $request->id_kpertama;
            $id_kkedua = $request->id_kkedua;
            $bobot = $request->bobot;
            $reverse_bobot = (double)(1/$bobot);
            $antar_kriteria = Antar_Kriteria::where('id_kpertama',$id_kpertama)
                                                    ->where('id_kkedua',$id_kkedua);
            if ($antar_kriteria->count() > 0) {

                $antar_kriteria->update([
                    'bobot' => $bobot
                ]);
                $reverse_antar_kriteria = Antar_Kriteria::where('id_kpertama',$id_kkedua)
                                                    ->where('id_kkedua',$id_kpertama);
                if ($reverse_antar_kriteria->count() > 0) {
                    
                    $reverse_antar_kriteria->update([
                        'bobot' => $reverse_bobot
                    ]);  
                    
                    return redirect()->route('weighting.eigen');
                }
                } else {

                $antar_kriteria = new Antar_Kriteria;
                $antar_kriteria->id_kpertama = $id_kpertama;
                $antar_kriteria->id_kkedua = $id_kkedua;
                $antar_kriteria->bobot = $bobot;
                $antar_kriteria->total_pembanding = 0;
                $antar_kriteria->normalisasi = 0;
                if ($antar_kriteria->save()) {
                    if ($id_kpertama != $id_kkedua) {
                        $reverse_antar_kriteria = new Antar_Kriteria;
                        $reverse_antar_kriteria->id_kpertama = $id_kkedua; 
                        $reverse_antar_kriteria->id_kkedua = $id_kpertama;
                        $reverse_antar_kriteria->bobot = $reverse_bobot;
                        $reverse_antar_kriteria->total_pembanding = 0;
                        $reverse_antar_kriteria->normalisasi = 0;
                        if ($reverse_antar_kriteria->save()) {
                            
                            if(Antar_Kriteria::count() == 16) {
                            return redirect()->route('weighting.eigen');
                        }
                            $request->session()->flash('message', 'Bobot Antar Kriteria berhasil diinput !');
                            return redirect('antarkriteria');
                        }
                    } else {
                        $request->session()->flash('message', 'Bobot Antar Kriteria berhasil diinput !');
                            return redirect('antarkriteria');
                    }
                }
            }
        }
        else
        {
            dd($validator->errors());
        }

        
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
        $nama = Datakriteria::pluck('nama_kriteria','id');
        $antar = Antar_Kriteria::find($id);
        return view('antarkriteria.editdata', compact('nama','antar'));
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

    public function eigen(Request $req)
    {
        $kriteria = Datakriteria::all(); 
        $n = $kriteria->count();
        $total_bobot = 0;
        $ri = IndeksRasio::where('n',$n)->first()->nilai; 

        foreach ($kriteria as $k) {
            $antar_kriteria = Antar_Kriteria::where('id_kpertama',$k->id)->orderBy('id_kkedua')->get();
            $bobot[$k->id] = $antar_kriteria;
            $row_bobot[$k->id] = $antar_kriteria->sum('bobot');
            $total_bobot += $row_bobot[$k->id];
        }
        //hitung eigen dengan membagi semua bobot dengan total bobot
        foreach ($row_bobot as $key => $row_b) {
            $eigen[] = $row_b/$total_bobot;
            $for_db_eigen[$key] = $row_b/$total_bobot;
        }

        //hitung aw/w
        $no = 0;
        foreach ($row_bobot as $key => $row_b) {
            
            $aws[$no]=0;
            
            foreach ($bobot[$key] as $wk => $b) {
                $aws[$no] += ($b->bobot*$eigen[$wk]); 
            }
            $no++;
        }

        //menghitung aw/w
        foreach ($eigen as $key => $ei) {
            $aww[$key] = ($aws[$key]/$ei);
        }

        //hitung lamda max (rata-rata)
        $aww_col = collect($aww);
        $lamda_max = $aww_col->sum()/$n;

        // hitung CI
        $ci = ($lamda_max-$n)/($n-1);

        //hitung CR
        $cr = $ci/$ri; 

        if (Analisa::count() < 1) {
            $ras = new Analisa;
            $ras->ci = $ci;
            $ras->ri = $ri;
            $ras->cr = $cr;
            $ras->save();
        }else{
            $ras = Analisa::find(1);
            $ras->ci = $ci;
            $ras->ri = $ri;
            $ras->cr = $cr;
            $ras->save();
        }

        if ($cr <= 0.1) {
            
            // dd($for_db_eigen);
            $for_db_eigen = collect($for_db_eigen);
            $max = $for_db_eigen->max();
            foreach ($for_db_eigen as $key => $db_eigen) {
               
                // dd($db_eigen);
                $eigen_vector = Nilai_Eigen::firstOrNew(['id_kriteria' => $key]);
                $eigen_vector->id_kriteria = $key;
                $eigen_vector->nilai = $db_eigen;
                $eigen_vector->save();
            }

            $req->session()->flash('message',"Nilai Bobot Antar Kriteria memenuhi syarat karena nilai CR = $cr, silahkan input nilai data peserta !");
            return redirect('alternatif');

        } else {
            $req->session()->flash('message',"Nilai Bobot Antar Kriteria tidak memenuhi syarat karena nilai CR = $cr, silahkan ulangi pengambilan bobot prioritas !");

            return redirect('antarkriteria');
    }

    
    }
}
