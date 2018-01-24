<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Alternatif;
use App\Nilaireal;
use PDF;

class UserController extends Controller
{
    public function index()
    {
    	$data = User::all();
    	return view('datamaster.viewpengguna')->with('data', $data);
    }

    public function peserta(Request $request)
    {
        $data = Alternatif::when($request->keyword, function ($query) use ($request) {
        $query->where('nama_alternatif', 'like', "%{$request->keyword}%")
            ->orWhere('jurusan', 'like', "%{$request->keyword}%");
            })->where('cek',0)->paginate(10);

    	return view('datamaster.viewpeserta', compact('data','alter'));
    }

    public function show($id)
    {
        $data = Alternatif::find($id);
        $nilai = Nilaireal::all();
        return view('datamaster.detailpeserta', compact('data','nilai'));
    }

    public function detailpdf($id)
    {
        $data=Alternatif::find($id);
        $pdf = PDF::loadView('datamaster.detailpdf', compact('data'))->setPaper('f4','potrait');
        return view('datamaster.detailpdf', compact('data'));
        return $pdf->stream();
    }

    public function edit(Request $r, $id)
    {
        $data= User::find($id);

        $r->session()->flash('message','Data berhasil diubah !');
        return view('datamaster.registeredit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = User::find($id);

        $data->name = $request['name'];
        $data->username = $request['username'];
        $data->email = $request['email'];
        $data->hak_akses = $request['hak_akses'];
        $data->password = bcrypt($request['password']);
        $data->save();

        return redirect('userdata');
    }

    public function create()
    {
        return view('datamaster.register');
    }

    public function store(Request $request)
    {
        $data = new User;
        $data->name = $request['name'];
        $data->username = $request['username'];
        $data->email = $request['email'];
        $data->hak_akses = $request['hak_akses'];
        $data->password = bcrypt($request['password']);

        $request->session()->flash('message','Data berhasil ditambahkan !');
        return redirect('userdata');
    }

}
