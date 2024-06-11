<?php

namespace App\Http\Controllers;


use App\Models\DataCollected;
use App\Models\Module;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function index($slug = null)
    {
        // Définir la valeur par défaut
        $defaultPerPage = 5;

        // Récupérer la valeur de totalPerPage depuis la requête ou la session
        $totalPerPage = request()->get('totalPerPage', session('totalPerPage', $defaultPerPage));

        // Stocker la valeur dans la session
        session(['totalPerPage' => $totalPerPage]);

        $modules = Module::all();

        if ($slug) {
            $module = Module::where('slug', $slug)->with('measuredType')->firstOrFail();
        } else {
            $module = Module::with('measuredType')->first();
            $slug = $module ? $module->slug : null;
        }

        $measuredType = $module->measuredType;

        if ($module) {
            $datas = DataCollected::where('module_id', $module->id)
                ->orderBy('created_at', 'desc')
                ->paginate($totalPerPage)
                ->onEachSide(2)
                ;
        } else {
            $datas = collect(); // Créer une collection vide si aucun module n'est trouvé
        }

        // Récupérer les labels (temps) et les valeurs (valeurs calculées)
        $labels = $datas->pluck('created_at')->map(function ($date) {
            return $date->diffForHumans();
        });

        $values = $datas->pluck('measured_value');


        return view("home/index", [
            'modules' => $modules,
            'module' => $module,
            'measuredType' => $measuredType,
            'slug' => $slug,
            'datas' => $datas,
            'labels' => $labels,
            'values' => $values,
            'totalPerPage' => $totalPerPage
        ]);
    }

    public function get_module_datas($slug = null)
    {
        // Définir la valeur par défaut
        $defaultPerPage = 30;

        // Récupérer la valeur de totalPerPage depuis la requête ou la session
        $totalPerPage = request()->get('totalPerPage', session('totalPerPage', $defaultPerPage));

        // Stocker la valeur dans la session
        session(['totalPerPage' => $totalPerPage]);

        $modules = Module::all();

        if ($slug) {
            $module = Module::where('slug', $slug)->with('measuredType')->firstOrFail();
        } else {
            $module = Module::with('measuredType')->first();
            $slug = $module ? $module->slug : null;
        }

        $measuredType = $module->measuredType;

        if ($module) {
            $datas = DataCollected::where('module_id', $module->id)
                ->orderBy('created_at', 'desc')
                ->paginate($totalPerPage);
        } else {
            $datas = collect(); // Créer une collection vide si aucun module n'est trouvé
        }

        // Récupérer les labels (temps) et les valeurs (valeurs calculées)
        $labels = $datas->pluck('created_at')->map(function ($date) {
            return $date->diffForHumans();
        });

        $values = $datas->pluck('measured_value');

        return response()->json([
            'modules' => $modules,
            'module' => $module,
            'measuredType' => $measuredType,
            'slug' => $slug,
            'datas' => $datas,
            'labels' => $labels,
            'values' => $values,
            'totalPerPage' => $totalPerPage
        ]);
    }


}
