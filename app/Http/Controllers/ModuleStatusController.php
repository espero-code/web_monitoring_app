<?php
namespace App\Http\Controllers;

use App\Events\ModuleStatusUpdated;
use App\Models\DataCollected;
use App\Models\Module;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\Controller as BaseController;

class ModuleStatusController extends BaseController
{
    public function generateModuleStatus()
    {
        $modules = Module::all();
        foreach ($modules as $module) {
            $status = $this->checkModuleStatus();

            // Logique pour sauvegarder l'état dans ModuleHistory
            $data = DataCollected::create([
                'module_id' => $module->id,
                'measured_value' => rand(10, 100), // Valeur mesurée factice, à remplacer par la logique réelle
                'running_time' => rand(2, 10000), // Durée de fonctionnement factice, à remplacer par la logique réelle
                'data_count' => rand(1, 1000), // Nombre de données envoyées factice, à remplacer par la logique réelle
                'running_status' => $status,
                'created_at' => now(),
            ]);

            $module->status = $status;

            $module->save();
            
            Log::info($data);

            // Diffuser l'événement
            event(new ModuleStatusUpdated($module, $status));

            Log::info("Status for module {$module->id}: {$status}");
        }

        return response()->json(['message' => 'Module statuses generated successfully.']);
    }

    private function checkModuleStatus()
    {
        // Logique pour vérifier l'état d'un module
        // Remplacer par la logique réelle pour vérifier si le module est en marche ou en panne
        return rand(0, 1) ? true : false;
    }
}
