<?php

namespace App\Http\Controllers\settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Section;

class SectionController extends Controller
{
    public function index()
    {
        $section = Section::latest()->paginate(5);
        return view('admin.section.section-index', compact('section'));
    }

    public function create()
    {
        return view('admin.section.section-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    =>  'required',
            'batch_id'   =>  'required'
        ]);

        $form_data = array(
            'name'   => $request->name,
            'batch_id'  => $request->batch_id
            
        );

        Section::create($form_data);
        return redirect('dashboard/section')->with('message', 'section created successfully.');
    }


    public function edit($id)
    {
        $section = Section::findOrFail($id);
        return view('admin.section.section-edit', compact('section'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'    =>  'required',
            // 'batch_id'   =>  'required'
        ]);

        $section = Section::findOrFail($id);
        $section->name = $request->name;
        $section->batch_id = $request->batch_id;
        $section->save();
        return redirect('dashboard/section')->with('message', 'Data is successfully updated');
    }

    public function destroy($id)
    {
        $section = Section::findOrFail($id);
        $section->delete();

        return redirect('dashboard/section')->with('message', 'Data is successfully deleted');
    }
}
