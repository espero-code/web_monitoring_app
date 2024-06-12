<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class DatabaseMigrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function measured_types_table_is_created_with_correct_columns()
    {
        // Vérifier que la table 'measured_types' existe
        $this->assertTrue(Schema::hasTable('measured_types'));

        // Vérifier que les colonnes sont correctes
        $columns = [
            'id',
            'name',
            'description',
            'min_value',
            'max_value',
            'created_at',
            'updated_at'
        ];

        foreach ($columns as $column) {
            $this->assertTrue(Schema::hasColumn('measured_types', $column));
        }
    }
}
