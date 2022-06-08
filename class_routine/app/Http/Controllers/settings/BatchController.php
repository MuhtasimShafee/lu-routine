<?php

namespace App\Http\Controllers\settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Batch;

class BatchController extends Controller
{
    public function index()
    {
        $batch = Batch::latest()->paginate(5);
        return view('admin.batch.batch-index', compact('batch'));
    }

    public function create()
    {
        return view('admin.batch.batch-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    =>  'required',
            
        ]);

        $form_data = array(
            'name'   => $request->name,
            
            
        );

        Batch::create($form_data);
        return redirect('dashboard/batch')->with('message', 'batch created successfully.');
    }

    public function edit($id)
    {
        $batch = Batch::findOrFail($id);
        return view('admin.batch.batch-edit', compact('batch'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'    =>  'required',
        ]);

        $batch = Batch::findOrFail($id);
        $batch->name = $request->name;
        $batch->save();
        return redirect('dashboard/batch')->with('message', 'Data is successfully updated');
    }

    public function destroy($id)
    {
        $batch = Batch::findOrFail($id);
        $batch->delete();

        return redirect('dashboard/batch')->with('message', 'Data is successfully deleted');
    }
}
