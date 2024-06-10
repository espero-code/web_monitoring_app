<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_collecteds', function (Blueprint $table) {
            $table->id();
            $table->float('measured_value');
            $table->double('running_time');
            $table->boolean('running_status');
            $table->integer('data_count');
            $table->timestamps();
        });

        Schema::table('data_collecteds', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Module::class)->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_collecteds');
    }
};
