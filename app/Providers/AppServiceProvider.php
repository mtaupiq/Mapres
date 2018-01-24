<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Datakriteria;
use App\Antar_Kriteria;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        // if(Antar_Kriteria::count()==16){
        //     $kriteria = Datakriteria::all(); //OKE
        //     foreach ($kriteria as $k) {
        //         // step 1 
        //         $total_pembanding = Antar_Kriteria::where('id_kpertama', $k->id)->sum('bobot');

        //         $input_tp = Antar_Kriteria::where('id_kpertama',$k->id)->get();
        //         $input_tp->total_pembanding = $total_pembanding;
                // $f = $input_tp->bobot;
                // $input_tp->normalisasi = $f / $input_tp->total_pembanding;
                // $input_tp->update([
                //     'total_pembanding' => $input_tp->total_pembanding,
                //     // 'normalisasi'=> $input_tp->normalisasi 
                // ]); //normalisasi
                
        //     }
        // }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
