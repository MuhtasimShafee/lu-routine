<?php

namespace App\Http\Controllers\routine\days;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Days\Saturday;
use App\Models\Settings\Room;
use App\Section;
use App\Teacher;
use App\Batch;
use App\Course;

class SaturdayController extends Controller
{
    public function index()
    {
        // $saturday = Saturday::with('teacher')->get();
        $timeSchedules = Saturday::distinct()->orderBy('class_start', 'ASC')->get(['class_start', 'class_end']);
        $sections = Saturday::select('section_id', 'batch_id')->with('section', 'batch', 'teacher')->distinct()->get();
        return view('admin.routine.days.saturday.saturday-index', compact('sections', 'timeSchedules'));
    }

    public function create()
    {
        $data['techers'] = Teacher::get();
        $data['rooms'] = Room::get();
        $data['courses'] = Course::get();
        $data['batches'] = Batch::get();
        $data['sections'] = Section::get();

        return view('admin.routine.days.saturday.saturday-create', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'section_id'    =>  'required',
            'batch_id'   =>  'required',
            'course_id'   =>  'required',
            'teacher_id'   =>  'required',
            'room_id'   =>  'required',
            'class_start'   =>  'required',
            'class_end'   =>  'required',
        ]);

        $form_data = array(
            'section_id'   => $request->section_id,
            'batch_id'  => $request->batch_id,
            'course_id'  => $request->course_id,
            'teacher_id'  => $request->teacher_id,
            'room_id'  => $request->room_id,
            'class_start'  => $request->class_start,
            'class_end'  => $request->class_end,
        );

        $match = Saturday::where('teacher_id', $request->teacher_id)
            ->where(function ($query) use ($request) {
                $query->where(function ($query) use ($request) {

                    $query->where('class_start', '>=', $request->class_start)->where('class_end', '<=', $request->class_end);
                })

                    ->orWhere(function ($q) use ($request) {
                        $q->where('class_start', '<', $request->class_start)->where('class_end', '>', $request->class_start);
                    })

                    ->orwhere(function ($query) use ($request) {

                        $query->where(function ($q) use ($request) {
                            $q->where('class_start', '>', $request->class_start)->where('class_end', '<', $request->class_end);
                        })

                            ->orWhere(function ($q) use ($request) {
                                $q->where('class_start', '<', $request->class_end)->where('class_end', '>', $request->class_end);
                            });
                    });
            })->orWhere(function ($query) use ($request) {
                $query->where('room_id', $request->room_id)
                    ->where(function ($query) use ($request) {
                        $query->where(function ($query) use ($request) {

                            $query->where('class_start', '>=', $request->class_start)->where('class_end', '<=', $request->class_end);
                        })

                            ->orWhere(function ($q) use ($request) {
                                $q->where('class_start', '<', $request->class_start)->where('class_end', '>', $request->class_start);
                            })

                            ->orwhere(function ($query) use ($request) {

                                $query->where(function ($q) use ($request) {
                                    $q->where('class_start', '>', $request->class_start)->where('class_end', '<', $request->class_end);
                                })

                                    ->orWhere(function ($q) use ($request) {
                                        $q->where('class_start', '<', $request->class_end)->where('class_end', '>', $request->class_end);
                                    });
                            });
                    });
            })
            ->get();

        if (count($match) > 0) {
            return back()->with('error', 'This schedule is already exits.')->withInput($request->all());
        }

        Saturday::create($form_data);
        return redirect('dashboard/saturday/create')->with('message', 'Data added successfully.');
    }

    public function edit($id)
    {
        $saturday = Saturday::findOrFail($id);
        return view('admin.routine.days.saturday.saturday-edit', compact('saturday'));
    }

    public function update(Request $request, $id)
    {
        $saturday = Saturday::findOrFail($id);
        $saturday->session   = $request->session;
        $saturday->day  = $request->day;
        $saturday->section  = $request->section;
        $saturday->batch  = $request->batch;
        $saturday->nineAM_ninefiftyAM  = $request->nineAM_ninefiftyAM;
        $saturday->tenAM_tenfiftyAM  = $request->tenAM_tenfiftyAM;
        $saturday->elevenAM_elevenfiftyAM  = $request->elevenAM_elevenfiftyAM;
        $saturday->twelvePM_twelvefiftyPM  = $request->twelvePM_twelvefiftyPM;
        $saturday->twoPM_twofiftyPM  = $request->twoPM_twofiftyPM;
        $saturday->threePM_threefiftyPM  = $request->threePM_threefiftyPM;
        $saturday->fourPM_fourfiftyPM  = $request->fourPM_fourfiftyPM;
        $saturday->break  = $request->break;
        $saturday->save();
        return redirect('dashboard/saturday')->with('message', 'Data is successfully updated');
    }

    public function destroy($id)
    {
        $saturday = Saturday::findOrFail($id);
        $saturday->delete();

        return redirect('dashboard/saturday')->with('message', 'Data is successfully deleted');
    }

    public static function getSechdule($sectionId,  $batchId, $class_start, $class_end)
    {

        $saturday = Saturday::with(['room:id,room_code', 'course:id,course_code'])->where('section_id', $sectionId)->where('batch_id', $batchId)->where('class_start', $class_start)->where('class_end', $class_end)->first();

        if (!empty($saturday)) {
            $schedule = $saturday->room->room_code . '/' . $saturday->course->course_code . '/' . $saturday->teacher->teacher_code;
        } else {
            $schedule = "x";
        }

        return  $schedule;
    }
}
