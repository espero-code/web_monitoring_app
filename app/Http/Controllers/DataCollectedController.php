<?php

namespace App\Http\Controllers;

use App\Models\DataCollected;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\DataCollectedFormRequest;
use Illuminate\Routing\Controller as BaseController;

class DataCollectedController extends BaseController
{
    public function index(): View
    {
        $data_collecteds = DataCollected::orderBy('created_at', 'desc')->paginate(10);
        return view('data_collecteds/index', ['data_collecteds' => $data_collecteds]);
    }

    public function show($id): View
    {
        $data_collected = DataCollected::findOrFail($id);
        return view('data_collecteds/show',['data_collected' => $data_collected]);
    }
    public function create(): View
    {
        return view('data_collecteds/create');
    }

    public function edit($id): View
    {
        $data_collected = DataCollected::findOrFail($id);
        return view('data_collecteds/edit', ['data_collected' => $data_collected]);
    }

    public function store(DataCollectedFormRequest $req): RedirectResponse
    {
        $data = $req->validated();



        $data_collected = DataCollected::create($data);
        return redirect()->route('admin.data_collected.show', ['id' => $data_collected->id]);
    }

    public function update(DataCollected $data_collected, DataCollectedFormRequest $req)
    {
        $data = $req->validated();



        $data_collected->update($data);

        return redirect()->route('admin.data_collected.show', ['id' => $data_collected->id]);
    }

    public function updateSpeed(DataCollected $data_collected, Request $req)
    {
        foreach ($req->all() as $key => $value) {
            $data_collected->update([
                $key => $value
            ]);
        }

        return [
            'isSuccess' => true,
            'data' => $req->all()
        ];
    }

    public function delete(DataCollected $data_collected)
    {

        $data_collected->delete();

        return [
            'isSuccess' => true
        ];
    }


}
