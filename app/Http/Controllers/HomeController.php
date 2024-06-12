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

    /**
     * Display the home page with module data.
     *
     * @param string|null $slug
     * @return \Illuminate\View\View
     */
    public function index($slug = null)
    {
        $data = $this->fetchModuleData($slug, 5);
        return view('home/index', $data);
    }

    /**
     * Return the module data in JSON format.
     *
     * @param string|null $slug
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_module_datas($slug = null)
    {
        $data = $this->fetchModuleData($slug, 5);
        return response()->json($data);
    }

    /**
     * Fetch the module data and format it for display.
     *
     * @param string|null $slug
     * @param int $defaultPerPage
     * @return array
     */
    private function fetchModuleData($slug, $defaultPerPage)
    {
        // Get the totalPerPage value from the request or session
        $totalPerPage = request()->get('totalPerPage', session('totalPerPage', $defaultPerPage));

        // Store the value in the session
        session(['totalPerPage' => $totalPerPage]);

        // Retrieve all modules
        $modules = Module::all();

        // Retrieve the specified module by slug or the first module if no slug is provided
        $module = $slug
            ? Module::where('slug', $slug)->with('measuredType')->firstOrFail()
            : Module::with('measuredType')->first();

        $measuredType = $module ? $module->measuredType : null;

        // Fetch data collected for the module
        $datas = $module
            ? DataCollected::where('module_id', $module->id)
                ->orderBy('created_at', 'desc')
                ->paginate($totalPerPage)
                ->onEachSide(2)
            : collect(); // Create an empty collection if no module is found

        // Initialize labels and values arrays
        $labels = [];
        $values = [];

        // Loop through the data to extract labels and values
        foreach ($datas as $data) {
            array_unshift($labels, $data->created_at->diffForHumans());
            array_unshift($values, $data->measured_value);
        }


        return [
            'modules' => $modules,
            'module' => $module,
            'measuredType' => $measuredType,
            'slug' => $module ? $module->slug : null,
            'datas' => $datas,
            'labels' => $labels,
            'values' => $values,
            'totalPerPage' => $totalPerPage,
        ];
    }
    
}
