<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Alternatif;
use App\AlternatifKriteria;
use App\Datakriteria;
use App\Hasil;
use App\HitungPe;
use App\Nilai_Eigen;
use App\Nilaireal;
use App\WA;
use App\IndeksRasio;
use App\Antar_Kriteria;
use App\Analisa;
use storage;
use PDF;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $cr = DB::table('analisa')->where('id',1)->value('cr');
        if ($cr <= 0.1) {
            $data = DB::table('alternatif')->where('cek',1)->paginate(10);
            $k1 = DB::table('data_kriteria')->where('id', 1)->value('nama_kriteria');
            $k2 = DB::table('data_kriteria')->where('id', 2)->value('nama_kriteria');
            $k3 = DB::table('data_kriteria')->where('id', 3)->value('nama_kriteria');
            $k4 = DB::table('data_kriteria')->where('id', 4)->value('nama_kriteria');
            return view('alternatif.viewdata',compact('k1','k2','k3','k4'))->with('data', $data);
         }else{
            $req->session()->flash('message',"Input Nilai Peserta belum bisa dilakukan, karena nilai CR = $cr (tidak memenuhi syarat). Silahkan ulangi pengambilan nilai bobot antar kriteria terlebih dahulu !");
        return view('alternatif.sessi');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alternatif.createdata');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'foto' => 'required',
            'dokpres' =>'required',
            'kti' => 'required',
            'transkrip' => 'required',
            'nim' => 'required|unique:alternatif',
            'nama_alternatif' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'jurusan' => 'required',
            'fakultas' => 'required',
            'penghasilan_ortu' => 'required',
            'ipk' => 'required',
            'video' => 'required'
        ]);


        $a = date("Y-m-d", strtotime($request['tanggal_lahir']));

        $data = new Alternatif;
        if ($data->foto = $request->hasFile('foto')) {
            $foto = $request->file('foto');
            $ext = $foto->getClientOriginalExtension();

            if ($data->foto = $request->file('foto')->isValid()) {
                $foto_name = date('YmdHis').".$ext";
                $upload_path = 'uploadfile/foto';
                $data->foto = $request->file('foto')->move($upload_path, $foto_name);
                $input['foto'] = $foto_name;
            }
        }

        if ($data->transkrip = $request->hasFile('transkrip')) {
            $transkrip = $request->file('transkrip');
            $ext = $transkrip->getClientOriginalExtension();

            if ($data->transkrip = $request->file('transkrip')->isValid()) {
                $transkrip_name = date('YmdHis').".$ext";
                $upload_path = 'uploadfile/transkrip';
                $data->transkrip = $request->file('transkrip')->move($upload_path, $transkrip_name);
                $input['transkrip'] = $transkrip_name;
            }
        }

        if ($data->kti = $request->hasFile('kti')) {
            $kti = $request->file('kti');
            $ext = $kti->getClientOriginalExtension();

            if ($data->kti = $request->file('kti')->isValid()) {
                $kti_name = date('YmdHis').".$ext";
                $upload_path = 'uploadfile/kti';
                $data->kti = $request->file('kti')->move($upload_path, $kti_name);
                $input['kti'] = $kti_name;
            }
        }

        if ($data->dokpres = $request->hasFile('dokpres')) {
            $dokpres = $request->file('dokpres');
            $ext = $dokpres->getClientOriginalExtension();

            if ($data->dokpres = $request->file('dokpres')->isValid()) {
                $dokpres_name = date('YmdHis').".$ext";
                $upload_path = 'uploadfile/dokpres';
                $data->dokpres = $request->file('dokpres')->move($upload_path, $dokpres_name);
                $input['dokpres'] = $dokpres_name;
            }
        }
        
        $data->nim = $request['nim'];
        $data->nama_alternatif = $request['nama_alternatif'];
        $data->jk = $request['jk'];
        $data->tempat_lahir = $request['tempat_lahir'];
        $data->tanggal_lahir = $a;
        $data->fakultas = $request['fakultas'];
        $data->jurusan = $request['jurusan'];
        $data->semester = $request['semester'];
        $data->penghasilan_ortu = $request['penghasilan_ortu'];
        $data->ipk = $request['ipk'];
        $data->video = $request['video'];
        $data->prestasi = $request['prestasi'];
        $data->cek = 1;
        $data->save();

        $real = new Nilaireal;
        $real->nilai_k1 = 0;
        $real->nilai_k2 = 0;
        $real->nilai_k3 = 0;
        $real->nilai_k4 = 0;
        $data->nilaireal()->save($real);

        $hp = new HitungPe;
        $hp->nilai_k1 = 0;
        $hp->nilai_k2 = 0;
        $hp->nilai_k3 = 0;
        $hp->nilai_k4 = 0;
        $data->hitungpe()->save($hp);

        $wa = new WA;
        $wa->nilai_k1 = 0;
        $wa->nilai_k2 = 0;
        $wa->nilai_k3 = 0;
        $wa->nilai_k4 = 0;
        $data->wa()->save($wa);

        $al = new AlternatifKriteria;
        $al->al_k1 = 0;
        $al->al_k2 = 0;
        $al->al_k3 = 0;
        $al->al_k4 = 0;
        $data->alterkriteria()->save($al);

        $hasil = new Hasil;
        $hasil->hasil_pedoman = 0;
        $hasil->hasil_ahp = 0;
        $data->hasil()->save($hasil);

        $request->session()->flash('message',"Selamat $data->nama_alternatif, anda telah terdaftar sebagai calon mahasiswa berprestasi !");

        return redirect('syarat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function show($id)
    {
        $data=Alternatif::find($id);

        return view('alternatif.detaildata', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req, $id)
    {   
          
        $data = Nilaireal::find($id);
        $k1 = DB::table('data_kriteria')->where('id', 1)->value('nama_kriteria');
        $k2 = DB::table('data_kriteria')->where('id', 2)->value('nama_kriteria');
        $k3 = DB::table('data_kriteria')->where('id', 3)->value('nama_kriteria');
        $k4 = DB::table('data_kriteria')->where('id', 4)->value('nama_kriteria');

        return view('alternatif.inputnilai', compact('data','k1','k2','k3','k4'));
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
        $this->validate($request, [
            'nilai_k1' => 'required',
            'nilai_k2' =>'required',
            'nilai_k3' => 'required',
            'nilai_k4' => 'required',
        ]);

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

        $request->session()->flash('message',"Input Nilai Peserta Atas Nama $z->nama_alternatif Berhasil !");

        return redirect('alternatif');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $re, $id)
    {
        $data = Alternatif::find($id)->delete();

        $re->session()->flash('message','Data berhasil dihapus !');
        return redirect('peserta');
    }

    public function pdf($id)
    {
        $data=Alternatif::find($id);
        $pdf = PDF::loadView('alternatif.pdf', compact('data'))->setPaper('a4','potrait');
        return $pdf->stream();
    }

    public function cek()
    {
        $kriteria = Datakriteria::all(); //OKE
        $n = $kriteria->count();
        $ri = IndeksRasio::where('n',$n)->first(); //Jalan

        foreach ($kriteria as $k) {
                // step 1 
                $total_pembanding = Antar_Kriteria::where('id_kpertama', $k->id)->sum('bobot');

                $input_tp = Antar_Kriteria::where('id_kpertama',$k->id)->first();
                $input_tp->total_pembanding = $total_pembanding;
                $f = $input_tp->bobot;
                $input_tp->normalisasi = $f / $input_tp->total_pembanding;
                $input_tp->save(); //normalisasi
                
        }

        return $total_pembanding;
    }
}