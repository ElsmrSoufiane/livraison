<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use App\Models\Panier;
use App\Models\Commande;
class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
  public function boot(): void
{
    View::composer('*', function ($view) {
        $nbrecommandes = 0;

        if (auth()->check()) {
            $userId = auth()->id();
            $panier = \App\Models\Panier::where('id_client', $userId)->first();

            if ($panier) {
                $nbrecommandes = \App\Models\Commande::where('id_panier', $panier->id)->count();
            }
        }

        $view->with('nbrecommandes', $nbrecommandes);
    });
}

}
