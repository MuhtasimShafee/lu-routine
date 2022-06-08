<?php

namespace App\Http\Controllers\routine\days;

use App\Batch;
use App\Course;
use App\Models\Days\Sunday;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings\Room;
use App\Section;
use App\Teacher;

class SundayController extends Controller
{
    public function index()
    {
        // $sunday = Sunday::with('teacher')->get();
        $timeSchedules = Sunday::distinct()->orderBy('class_start', 'ASC')->get(['class_start', 'class_end']);
        $sections = Sunday::select('section_id', 'batch_id')->with('section', 'batch', 'teacher')->distinct()->get();

        return view('admin.routine.days.sunday.sunday-index', compact('sections', 'timeSchedules'));
    }

    public function create()
    {
        $data['techers'] = Teacher::get();
        $data['rooms'] = Room::get();
        $data['courses'] = Course::get();
        $data['batches'] = Batch::get();
        $data['sections'] = Section::get();

        return view('admin.routine.days.sunday.sunday-create', compact('data'));
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


        $match = Sunday::with(['teacher', 'course'])->where('teacher_id', $request->teacher_id)
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
            ->orWhere(function ($query) use ($request) {
                $query->where('section_id', $request->section_id)
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

        Sunday::create($routine);

        return redirect('dashboard/sunday/create')->with('message', 'Data added successfully.');
    }

    public function editIndex()
    {
        $sunday = Sunday::latest()->paginate(5);
        return view('admin.routine.days.sunday.sunday-editIndex', compact('sunday'));
    }

    public function edit($id)
    {
        $sunday = Sunday::findOrFail($id);
        $data['techers'] = Teacher::get();
        $data['rooms'] = Room::get();
        $data['courses'] = Course::get();
        $data['batches'] = Batch::get();
        $data['sections'] = Section::get();

        return view('admin.routine.days.sunday.sunday-edit', compact('sunday','data'));
    }

    public function update(Request $request, $id)
    {
        $sunday = Sunday::findOrFail($id);
        $sunday->section_id   = $request->section_id;
        $sunday->batch_id  = $request->batch_id;
        $sunday->course_id  = $request->course_id;
        $sunday->teacher_id  = $request->teacher_id;
        $sunday->room_id  = $request->room_id;
        $sunday->class_start  = $request->class_start;
        $sunday->class_end  = $request->class_end;

        $sunday->save();
        return redirect('dashboard/sunday')->with('message', 'Data is successfully updated');
    }

    public function destroy($id)
    {
        $sunday = Sunday::findOrFail($id);
        $sunday->delete();

        return redirect('dashboard/sunday')->with('message', 'Data is successfully deleted');
    }



    /**
     * Get Class roma & course name
     * $Params  $roomId,$courseId, sectionID, $TeacherId, $batchId, $start_time, $end_time
     * @Method GET
     * function anme getSechdule
     */

    public static function getSechdule($sectionId,  $batchId, $class_start, $class_end)
    {

        $sunday = Sunday::with(['room:id,room_code', 'course:id,course_code'])->where('section_id', $sectionId)->where('batch_id', $batchId)->where('class_start', $class_start)->where('class_end', $class_end)->first();

        if (!empty($sunday)) {
            $schedule = $sunday->room->room_code . '/' . $sunday->course->course_code . '/' . $sunday->teacher->teacher_code;
        } else {
            $schedule = "x";
        }

        return  $schedule;
    }
}
