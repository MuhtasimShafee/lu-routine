<?php

namespace App\Http\Controllers\routine\days;

use App\Batch;
use App\Course;
use App\Models\Days\Friday;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings\Room;
// use App\Section;
use App\Section;
use App\Teacher;

class FridayController extends Controller
{
    public function index()
    {
        // $friday = Friday::all();
        $timeSchedules = Friday::distinct()->orderBy('class_start', 'ASC')->get(['class_start', 'class_end']);
        $sections = Friday::select('section_id', 'batch_id')->with('section', 'batch', 'teacher')->distinct()->get();
        return view('admin.routine.days.friday.friday-index', compact('timeSchedules', 'sections'));
    }

    public function create()
    {
        $data['techers'] = Teacher::get();
        $data['rooms'] = Room::get();
        $data['courses'] = Course::get();
        $data['batches'] = Batch::get();
        $data['sections'] = Section::get();
        return view('admin.routine.days.friday.friday-create', compact('data'));
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


        $match = Friday::with(['teacher', 'course'])->where('teacher_id', $request->teacher_id)
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

        Friday::create($routine);

        return redirect('dashboard/friday/create')->with('message', 'Data added successfully.');
    }

    public function edit($id)
    {
        $friday = Friday::findOrFail($id);
        return view('admin.routine.days.friday.friday-edit', compact('friday'));
    }

    public function update(Request $request, $id)
    {
        $friday = Friday::findOrFail($id);
        $friday->session   = $request->session;
        $friday->day  = $request->day;
        $friday->section  = $request->section;
        $friday->batch  = $request->batch;
        $friday->nineAM_ninefiftyAM  = $request->nineAM_ninefiftyAM;
        $friday->tenAM_tenfiftyAM  = $request->tenAM_tenfiftyAM;
        $friday->elevenAM_elevenfiftyAM  = $request->elevenAM_elevenfiftyAM;
        $friday->twelvePM_twelvefiftyPM  = $request->twelvePM_twelvefiftyPM;
        $friday->twoPM_twofiftyPM  = $request->twoPM_twofiftyPM;
        $friday->threePM_threefiftyPM  = $request->threePM_threefiftyPM;
        $friday->fourPM_fourfiftyPM  = $request->fourPM_fourfiftyPM;
        $friday->break  = $request->break;
        $friday->save();
        return redirect('dashboard/friday')->with('message', 'Data is successfully updated');
    }

    public static function getSechdule($sectionId,  $batchId, $class_start, $class_end)
    {

        $friday = Friday::with(['room:id,room_code', 'course:id,course_code'])->where('section_id', $sectionId)->where('batch_id', $batchId)->where('class_start', $class_start)->where('class_end', $class_end)->first();

        if (!empty($friday)) {
            $schedule = $friday->room->room_code . '/' . $friday->course->course_code . '/' . $friday->teacher->teacher_code;
        } else {
            $schedule = "x";
        }

        return  $schedule;
    }
}
