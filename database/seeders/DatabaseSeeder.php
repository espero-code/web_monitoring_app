<?php

namespace Database\Seeders;

use App\Models\MeasuredType;
use App\Models\Module;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (MeasuredType::count() === 0) {
            $datas = [
                ['name' => 'Température', 'description' => 'Mesure de la chaleur ou du froid.'],
                ['name' => 'Vitesse', 'description' => 'Mesure de la rapidité de déplacement.'],
                ['name' => 'Débit', 'description' => 'Mesure du volume de liquide ou de gaz passant par un point par unité de temps.'],
                ['name' => 'Pression', 'description' => 'Mesure de la force appliquée sur une surface.'],
                ['name' => 'Humidité', 'description' => 'Mesure de la quantité de vapeur d\'eau dans l\'air.'],
                ['name' => 'Poids', 'description' => 'Mesure de la masse d\'un objet.'],
                ['name' => 'Volume', 'description' => 'Mesure de l\'espace occupé par un objet ou une substance.'],
                ['name' => 'Longueur', 'description' => 'Mesure de la distance entre deux points.'],
                ['name' => 'Altitude', 'description' => 'Mesure de la hauteur par rapport au niveau de la mer.'],
                ['name' => 'Tension', 'description' => 'Mesure de la différence de potentiel électrique entre deux points.'],
                ['name' => 'Courant', 'description' => 'Mesure du flux de charge électrique.']
            ];

            foreach ($datas as $data) {
                MeasuredType::create($data);
            }
        }

        if (Module::count() === 0) {
            $modules = [
                ['name' => 'Thermometer', 'description' => 'Measures temperature.', 'measured_type_id' => MeasuredType::where('name', 'Température')->first()->id],
                ['name' => 'Anemometer', 'description' => 'Measures wind speed.', 'measured_type_id' => MeasuredType::where('name', 'Vitesse')->first()->id],
                ['name' => 'Flow Meter', 'description' => 'Measures the flow rate of liquids.', 'measured_type_id' => MeasuredType::where('name', 'Débit')->first()->id],
                ['name' => 'Barometer', 'description' => 'Measures atmospheric pressure.', 'measured_type_id' => MeasuredType::where('name', 'Pression')->first()->id],
                ['name' => 'Hygrometer', 'description' => 'Measures humidity.', 'measured_type_id' => MeasuredType::where('name', 'Humidité')->first()->id],
                ['name' => 'Weighing Scale', 'description' => 'Measures weight.', 'measured_type_id' => MeasuredType::where('name', 'Poids')->first()->id],
                ['name' => 'Volumeter', 'description' => 'Measures volume.', 'measured_type_id' => MeasuredType::where('name', 'Volume')->first()->id],
                ['name' => 'Ruler', 'description' => 'Measures length.', 'measured_type_id' => MeasuredType::where('name', 'Longueur')->first()->id],
                ['name' => 'Altimeter', 'description' => 'Measures altitude.', 'measured_type_id' => MeasuredType::where('name', 'Altitude')->first()->id],
                ['name' => 'Voltmeter', 'description' => 'Measures electrical potential difference.', 'measured_type_id' => MeasuredType::where('name', 'Tension')->first()->id],
                ['name' => 'Ammeter', 'description' => 'Measures electric current.', 'measured_type_id' => MeasuredType::where('name', 'Courant')->first()->id]
            ];

            foreach ($modules as $module) {
                $module['slug'] = Str::slug($module['name']);
                Module::create($module);
            }
        }

        $this->call([
            DataCollectedSeeder::class,
        ]);

    }
}
