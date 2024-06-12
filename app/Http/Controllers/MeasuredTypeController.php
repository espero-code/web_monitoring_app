<?php

namespace App\Http\Controllers;

use App\Models\MeasuredType;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\MeasuredTypeFormRequest;
use Illuminate\Routing\Controller as BaseController;

class MeasuredTypeController extends BaseController
{
    public function index(): View
    {
        $measured_types = MeasuredType::orderBy('created_at', 'desc')->paginate(10);
        return view('measured_types/index', ['measured_types' => $measured_types]);
    }

    public function show($id): View
    {
        $measured_type = MeasuredType::findOrFail($id);

        return view('measured_types/show',['measured_type' => $measured_type]);
    }
    public function create(): View
    {
        return view('measured_types/create');
    }

    public function edit($id): View
    {
        $measured_type = MeasuredType::findOrFail($id);
        return view('measured_types/edit', ['measured_type' => $measured_type]);
    }

    public function store(MeasuredTypeFormRequest $req): RedirectResponse
    {
        $data = $req->validated();

        $measured_type = MeasuredType::create($data);
        return redirect()->route('admin.measured_types.show', ['id' => $measured_type->id]);
    }

    public function update(MeasuredType $measured_type, MeasuredTypeFormRequest $req)
    {

        $data = $req->validated();


        $measured_type->update($data);


        return redirect()->route('admin.measured_types.show', ['id' => $measured_type->id]);
    }

    public function updateSpeed(MeasuredType $measured_type, Request $req)
    {
        foreach ($req->all() as $key => $value) {
            $measured_type->update([
                $key => $value
            ]);
        }

        return [
            'isSuccess' => true,
            'data' => $req->all()
        ];
    }

    public function delete(MeasuredType $measured_type)
    {

        $measured_type->delete();

        return [
            'isSuccess' => true
        ];
    }


}
