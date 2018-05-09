<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Red;
use App\Logo;
use App\Dato;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Schema::defaultStringLength(191);

        $redes= Red::orderBy('id','asc')->get();
        $favicon= Logo::where('tipo','favicon')->first();
        $logofoot= Logo::where('tipo','footer')->first();
        $logohead= Logo::where('tipo','header')->first();
        $telefono= Dato::where('tipo','telefono')->first();
        $direccion= Dato::where('tipo','direccion')->first();
        $mail= Dato::where('tipo','mail')->first();

        view()->share([
            'redes' => $redes,
            'favicon' => $favicon,
            'logofoot' => $logofoot,
            'logohead' => $logohead,
            'telefono' => $telefono,
            'direccion' => $direccion,
            'mail' => $mail
        ]);
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
