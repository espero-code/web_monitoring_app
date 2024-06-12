<?php

namespace Tests\Feature;

use App\Models\Module;
use App\Models\DataCollected;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_the_homepage_with_default_values()
    {
        $module = Module::factory()->create(['slug' => 'test-slug']);
        DataCollected::factory()->create(['module_id' => $module->id]);

        $response = $this->get(route('home'));

        $response->assertStatus(200);
        $response->assertViewHas('modules');
        $response->assertViewHas('module');
        $response->assertViewHas('measuredType');
        $response->assertViewHas('datas');
        $response->assertViewHas('labels');
        $response->assertViewHas('values');
        $response->assertViewHas('totalPerPage', 5);
    }

    /** @test */
    public function it_displays_the_homepage_with_a_specific_slug()
    {
        $module = Module::factory()->create(['slug' => 'test-slug']);
        DataCollected::factory()->create(['module_id' => $module->id]);

        $response = $this->get(route('module_by_slug', ['slug' => 'test-slug']));

        $response->assertStatus(200);
        $response->assertViewHas('module', function ($viewModule) use ($module) {
            return $viewModule->id === $module->id;
        });
    }

    /** @test */
    public function it_returns_module_data_as_json()
    {
        $module = Module::factory()->create(['slug' => 'test-slug']);
        DataCollected::factory()->create(['module_id' => $module->id]);

        $response = $this->getJson(route('home.get_module_datas', ['slug' => 'test-slug']));

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'modules',
            'module',
            'measuredType',
            'slug',
            'datas',
            'labels',
            'values',
            'totalPerPage'
        ]);
    }
}
