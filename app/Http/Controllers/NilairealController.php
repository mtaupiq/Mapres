<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Datakriteria;
use App\Nilaireal;
use App\HitungPe;
use App\AlternatifKriteria;
use App\WA;
use App\Hasil;
use App\Alternatif;
use App\Antar_Kriteria;
use App\IndeksRasio;
use App\Nilai_Eigen;
use App\Analisa;

class NilairealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $data = Nilaireal::find($id);
        $k1 = DB::table('data_kriteria')->where('id', 1)->value('nama_kriteria');
        $k2 = DB::table('data_kriteria')->where('id', 2)->value('nama_kriteria');
        $k3 = DB::table('data_kriteria')->where('id', 3)->value('nama_kriteria');
        $k4 = DB::table('data_kriteria')->where('id', 4)->value('nama_kriteria');

        return view('alternatif.viewdata', compact('data','k1','k2','k3','k4'));
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
        $z = Alternatif::find($id);
        $z->cek = 0;
        $z->save();

        $data = Nilaireal::find($id);
        $data->nilai_k1 = $request['nilai_k1'];
        $data->nilai_k2 = $request['nilai_k2'];
        $data->nilai_k3 = $request['nilai_k3'];
        $data->nilai_k4 = $request['nilai_k4'];
        
        $z->nilaireal()->save($data);

        //eigen alternatif cek ulang

        $de = Nilaireal::all(); 
        $max1 = $de->max('nilai_k1');
        $max2 = $de->max('nilai_k2');
        $max3 = $de->max('nilai_k3');
        $max4 = $de->max('nilai_k4');

        $pk1 = DB::table('data_kriteria')->where('id',1)->value('persentase_kriteria');
        $pk2 = DB::table('data_kriteria')->where('id',2)->value('persentase_kriteria');
        $pk3 = DB::table('data_kriteria')->where('id',3)->value('persentase_kriteria');
        $pk4 = DB::table('data_kriteria')->where('id',4)->value('persentase_kriteria');

        $hp = HitungPe::find($id);
        $hp->nilai_k1 = (($data->nilai_k1)/$max1)*100*($pk1/100);
        $hp->nilai_k2 = (($data->nilai_k2)/$max2)*100*($pk2/100);
        $hp->nilai_k3 = (($data->nilai_k3)/$max3)*100*($pk3/100);
        $hp->nilai_k4 = (($data->nilai_k4)/$max4)*100*($pk4/100);
        
        $z->hitungpe()->save($hp);

        $get = Nilaireal::all(); 
        $sum1 = $get->sum('nilai_k1');
        $sum2 = $get->sum('nilai_k2');
        $sum3 = $get->sum('nilai_k3');
        $sum4 = $get->sum('nilai_k4');

        $nk1 = $hp->nilai_k1;
        $nk2 = $hp->nilai_k2;
        $nk3 = $hp->nilai_k3;
        $nk4 = $hp->nilai_k4;

        $wa = WA::find($id);
        $wa->nilai_k1 = $data->nilai_k1/$sum1;
        $wa->nilai_k2 = $data->nilai_k2/$sum2;
        $wa->nilai_k3 = $data->nilai_k3/$sum3;
        $wa->nilai_k4 = $data->nilai_k4/$sum4;

        $z->wa()->save($wa); //DONE

        $ne1 = DB::table('nilai_eigen')->where('id', 1)->value('nilai');
        $ne2 = DB::table('nilai_eigen')->where('id', 2)->value('nilai');
        $ne3 = DB::table('nilai_eigen')->where('id', 3)->value('nilai');
        $ne4 = DB::table('nilai_eigen')->where('id', 4)->value('nilai');

        $wak1 = $wa->nilai_k1;
        $wak2 = $wa->nilai_k2;
        $wak3 = $wa->nilai_k3;
        $wak4 = $wa->nilai_k4;

        $alt_k = AlternatifKriteria::find($id);
        $alt_k->al_k1 = $wak1*$ne1;
        $alt_k->al_k2 = $wak2*$ne2;
        $alt_k->al_k3 = $wak3*$ne3;
        $alt_k->al_k4 = $wak4*$ne4;

        $z->alterkriteria()->save($alt_k);

        $a = $alt_k->al_k1;
        $b = $alt_k->al_k2;
        $c = $alt_k->al_k3;
        $d = $alt_k->al_k4;

        $hasil = Hasil::find($id);
        $hasil->hasil_pedoman = $nk1+$nk2+$nk3+$nk4;
        $hasil->hasil_ahp = $a+$b+$c+$d;

        $z->hasil()->save($hasil);

        $ripit = Alternatif::count();
        for ($i=1; $i < $ripit ; $i++) {
            $g = Alternatif::all();
            $s = Alternatif::find($i);
            // $s->cek = 0;
            // $s->save(); 
            
            $satu = Nilaireal::find($i);
            $satu1 = $satu->nilai_k1;
            $satu2 = $satu->nilai_k2;
            $satu3 = $satu->nilai_k3;
            $satu4 = $satu->nilai_k4;


            $m = Nilaireal::all(); 
            $mx1 = $m->max('nilai_k1');
            $mx2 = $m->max('nilai_k2');
            $mx3 = $m->max('nilai_k3');
            $mx4 = $m->max('nilai_k4');

            $k1 = DB::table('data_kriteria')->where('id',1)->value('persentase_kriteria');
            $k2 = DB::table('data_kriteria')->where('id',2)->value('persentase_kriteria');
            $k3 = DB::table('data_kriteria')->where('id',3)->value('persentase_kriteria');
            $k4 = DB::table('data_kriteria')->where('id',4)->value('persentase_kriteria');

            $hap = HitungPe::find($i);
            $hap->nilai_k1 = (($satu1)/$mx1)*100*($k1/100);
            $hap->nilai_k2 = (($satu2)/$mx2)*100*($k2/100);
            $hap->nilai_k3 = (($satu3)/$mx3)*100*($k3/100);
            $hap->nilai_k4 = (($satu4)/$mx4)*100*($k4/100);
            
            $s->hitungpe()->save($hap);

            $j = $hap->nilai_k1;
            $k = $hap->nilai_k2;
            $l = $hap->nilai_k3;
            $m = $hap->nilai_k4;

            $getdata = Nilaireal::all(); 
            $sm1 = $getdata->sum('nilai_k1');
            $sm2 = $getdata->sum('nilai_k2');
            $sm3 = $getdata->sum('nilai_k3');
            $sm4 = $getdata->sum('nilai_k4');

            $waj = WA::find($i);
            $waj->nilai_k1 = $satu1/$sm1;
            $waj->nilai_k2 = $satu2/$sm2;
            $waj->nilai_k3 = $satu3/$sm3;
            $waj->nilai_k4 = $satu4/$sm4;

            $s->wa()->save($waj); //DONE

            $n1 = DB::table('nilai_eigen')->where('id', 1)->value('nilai');
            $n2 = DB::table('nilai_eigen')->where('id', 2)->value('nilai');
            $n3 = DB::table('nilai_eigen')->where('id', 3)->value('nilai');
            $n4 = DB::table('nilai_eigen')->where('id', 4)->value('nilai');

            $waka1 = $waj->nilai_k1;
            $waka2 = $waj->nilai_k2;
            $waka3 = $waj->nilai_k3;
            $waka4 = $waj->nilai_k4;

            $alter = AlternatifKriteria::find($i);
            $alter->al_k1 = $waka1*$n1;
            $alter->al_k2 = $waka2*$n2;
            $alter->al_k3 = $waka3*$n3;
            $alter->al_k4 = $waka4*$n4;

            $s->alterkriteria()->save($alter);

            $aa = $alter->al_k1;
            $ba = $alter->al_k2;
            $ca = $alter->al_k3;
            $da = $alter->al_k4;

            $has = Hasil::find($i);
            $has->hasil_pedoman = $j + $k + $l + $m;
            $has->hasil_ahp = $aa+$ba+$ca+$da;

            $s->hasil()->save($has);

        }

        return redirect('alternatif');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Nilaireal::find($id)->delete();

        $request->session()->flash('message','Data berhasil dihapus !');
        return redirect('peserta');
    }

    public function max()
    {
        $data=Datakriteria::max('persentase_kriteria');
        return $data;

    }

    public function nilaieigen()
    {
        $a = DB::table('antar_kriteria')->where('id_kpertama',1)->sum('bobot');
        $b = DB::table('antar_kriteria')->where('id_kpertama',2)->sum('bobot');
        $c = DB::table('antar_kriteria')->where('id_kpertama',3)->sum('bobot');
        $d = DB::table('antar_kriteria')->where('id_kpertama',4)->sum('bobot');

        $tes = Antar_Kriteria::where('id_kpertama',1)->count();
        // // $d = DB::table('nilai_eigen')->where('id',1)->sum('bobot');
        return $a;

        // $kriteria = Datakriteria::all(); //OKE
        // $n = $kriteria->count(); //ngerti
        // $total_bobot = 0; //Ieu timana?
        // $ri = IndeksRasio::where('n',$n)->first()->nilai; //Jalan

        // foreach ($kriteria as $k) {
        //     $antar_kriteria = Antar_Kriteria::where('id_kpertama',$k->id)->orderBy('id_kkedua')->get();
        //     $bobot[$k->id] = $antar_kriteria;
        //     $row_bobot[$k->id] = $antar_kriteria->sum('bobot');
        //     $total_bobot += $row_bobot[$k->id];
        // }

        // //hitung eigen dengan membagi semua bobot dengan total bobot
        // foreach ($row_bobot as $key => $row_b) {
        //     $eigen[] = $row_b/$total_bobot;
        //     $for_db_eigen[$key] = $row_b/$total_bobot;
        // }
        
        // //hitung aw/w
        // $no = 0;
        // foreach ($row_bobot as $key => $row_b) {
        //     $aws[$no]=0;
        //     foreach ($bobot[$key] as $wk => $b) {
        //         $aws[$no] += ($b->value*$eigen[$wk]); 
        //     }
        //     $no++;
        // }

        // //menghitung aw/w
        // foreach ($eigen as $key => $ei) {
        //     $aww[$key] = $aws[$key]/$ei;
        // }

        // //hitung lamda max
        // $aww_col = collect($aww);
        // $lamda_max = $aww_col->sum()/$n;

        // // hitung CI
        // $ci = ($lamda_max-$n)/($n-1);

        // //hitung CR
        // $cr = $ci/$ri; //Jalan

        // if ($cr <= 0.1) {

        //     // dd($for_db_eigen);
        //     $for_db_eigen = collect($for_db_eigen);
        //     $max = $for_db_eigen->max();
        //     foreach ($for_db_eigen as $key => $db_eigen) {

        //         // dd($db_eigen);
        //         $eigen_vector = Nilai_Eigen::firstOrNew(['id_kriteria' => $key]);
        //         $eigen_vector->id_kriteria = $key;
        //         $eigen_vector->nilai = $db_eigen;
        //         $eigen_vector->save();
        //     }

        // }
        // if (Analisa::count() < 1) {
        //     $ras = new Analisa;
        //     $ras->ci = $ci;
        //     $ras->ri = $ri;
        //     $ras->cr = $cr;
        //     $ras->save();
        // }else{
        //     $ras = Analisa::find(1);
        //     $ras->ci = $ci;
        //     $ras->ri = $ri;
        //     $ras->cr = $cr;
        //     $ras->save();
        // }

        // return $ci;

    }
}
