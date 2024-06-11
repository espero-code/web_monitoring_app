<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ModuleFormRequest;
use Illuminate\Routing\Controller as BaseController;

class ModuleController extends BaseController
{
    public function index(): View
    {
        $modules = Module::orderBy('created_at', 'desc')->paginate(11);
        return view('modules/index', ['modules' => $modules]);
    }

    public function show($id): View
    {
        $module = Module::findOrFail($id);

        return view('modules/show',['module' => $module]);
    }
    public function create(): View
    {
        return view('modules/create');
    }

    public function edit($id): View
    {
        $module = Module::findOrFail($id);
        return view('modules/edit', ['module' => $module]);
    }

    public function store(ModuleFormRequest $req): RedirectResponse
    {
        $data = $req->validated();



        $module = Module::create($data);
        return redirect()->route('admin.modules.show', ['id' => $module->id]);
    }

    public function update(Module $module, ModuleFormRequest $req)
    {
        $data = $req->validated();

        $module->update($data);

        return redirect()->route('admin.modules.show', ['id' => $module->id]);
    }

    public function updateSpeed(Module $module, Request $req)
    {
        foreach ($req->all() as $key => $value) {
            $module->update([
                $key => $value
            ]);
        }

        return [
            'isSuccess' => true,
            'data' => $req->all()
        ];
    }

    public function delete(Module $module)
    {

        $module->delete();

        return [
            'isSuccess' => true
        ];
    }


}
