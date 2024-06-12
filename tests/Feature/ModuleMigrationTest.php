<?php

namespace Tests\Feature;

use App\Models\Module;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ModuleMigrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function modules_table_is_created_with_correct_columns()
    {
        // Vérifier que la table 'modules' existe
        $this->assertTrue(Schema::hasTable('modules'));

        // Vérifier que les colonnes sont correctes
        $columns = [
            'id',
            'name',
            'slug',
            'description',
            'status',
            'measured_type_id',
            'created_at',
            'updated_at'
        ];

        foreach ($columns as $column) {
            $this->assertTrue(Schema::hasColumn('modules', $column));
        }
    }

    /** @test */
    public function measured_type_id_column_has_foreign_key_constraint()
    {
        // Créer un module
        $module = Module::factory()->create();

        // Vérifier que la colonne 'measured_type_id' a une contrainte de clé étrangère
        $this->assertTrue(Schema::hasForeignKey('modules', 'measured_type_id'));
    }
}
