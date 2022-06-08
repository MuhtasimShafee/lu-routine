<?php

namespace App\Http\Controllers\routine\days;

use App\Batch;
use App\Course;
use App\Models\Settings\Room;
use App\Section;
use App\Teacher;
use App\Models\Days\Monday;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MondayController extends Controller
{
    public function index()
    {
        //$monday = Monday::all();
        // $monday = Monday::with('teacher')->get();
        $timeSchedules = Monday::distinct()->orderBy('class_start', 'ASC')->get(['class_start', 'class_end']);
        $sections = Monday::select('section_id', 'batch_id')->with('section', 'batch', 'teacher')->distinct()->get();
        return view('admin.routine.days.monday.monday-index', compact('sections', 'timeSchedules'));
    }

    public function create()
    {
        $data['techers'] = Teacher::get();
        $data['rooms'] = Room::get();
        $data['courses'] = Course::get();
        $data['batches'] = Batch::get();
        $data['sections'] = Section::get();
        return view('admin.routine.days.monday.monday-create', compact('data'));
    }

    public function store(Request $request)
    {

        $routine['section_id'] = $request->section_id;
        $routine['batch_id'] = $request->batch_id;
        $routine['course_id'] = $request->course_id;
        $routine['teacher_id'] = $request->teacher_id;
        $routine['room_id'] = $request->room_id;
        $routine['class_start'] = $request->class_start;
        $routine['class_end'] = $request->class_end;


        $match = Monday::with(['teacher', 'course'])->where('teacher_id', $request->teacher_id)
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
            })

            ->orWhere(function ($query) use ($request) {
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

            return back()->with('error', 'This schedule is already booked by ' . $match[0]->teacher->teacher_name . ' | ' . $match[0]->course->course_code . ' | ' . $match[0]->class_start . '-' . $match[0]->class_end)->withInput($request->all());
        }

        Monday::create($routine);

        return redirect('dashboard/monday/create')->with('message', 'Data added successfully.');
    }

    public function edit($id)
    {
        $monday = Monday::findOrFail($id);
        $teacher = Teacher::all();
        return view('admin.routine.days.monday.monday-edit', compact('monday', 'teacher'));
    }

    public function update(Request $request, $id)
    {

        $monday = Monday::findOrFail($id);
        $input = $request->all();
        $nineAM_ninefiftyAM = $input['nineAM_ninefiftyAM'];
        $input['nineAM_ninefiftyAM'] = implode(',', $nineAM_ninefiftyAM);
        $monday->update($input);
        return redirect('dashboard/monday')->with('message', 'Data is successfully updated');
    }

    public function destroy($id)
    {
        $monday = Monday::findOrFail($id);
        $monday->delete();

        return redirect('dashboard/monday')->with('message', 'Data is successfully deleted');
    }

    /* public static function getSechdule($roomId, $courseId, $sectionId, $teacherId, $batchId, $class_start, $class_end)
    {

        $monday = Monday::with(['room:id,room_code', 'course:id,course_code'])->where('room_id', $roomId)->where('course_id', $courseId)->where('section_id', $sectionId)->where('teacher_id', $teacherId)->where('batch_id', $batchId)->where('class_start', $class_start)->where('class_end', $class_end)->first();

        if (!empty($monday)) {
            $schedule = $monday->room->room_code . '/' . $monday->course->course_code . '/' . $monday->teacher->teacher_code;
        } else {
            $schedule = "x";
        }

        return  $schedule;
    } */


    /////
    public static function getSechdule($sectionId,  $batchId, $class_start, $class_end)
    {

        $monday = Monday::with(['room:id,room_code', 'course:id,course_code'])->where('section_id', $sectionId)->where('batch_id', $batchId)->where('class_start', $class_start)->where('class_end', $class_end)->first();

        if (!empty($monday)) {
            $schedule = $monday->room->room_code . '/' . $monday->course->course_code . '/' . $monday->teacher->teacher_code;
        } else {
            $schedule = "x";
        }

        return  $schedule;
    }
}
