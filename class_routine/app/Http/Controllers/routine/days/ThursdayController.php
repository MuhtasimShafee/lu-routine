<?php

namespace App\Http\Controllers\routine\days;

use App\Batch;
use App\Course;
use App\Models\Days\Thursday;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings\Room;
use App\Section;
use App\Teacher;

class ThursdayController extends Controller
{
    public function index()
    {
        // $thursday = Thursday::all();
        $timeSchedules = Thursday::distinct()->orderBy('class_start', 'ASC')->get(['class_start', 'class_end']);
        $sections = Thursday::select('section_id', 'batch_id')->with('section', 'batch', 'teacher')->distinct()->get();
        return view('admin.routine.days.thursday.thursday-index', compact('sections', 'timeSchedules'));
    }

    public function create()
    {
        $data['techers'] = Teacher::get();
        $data['rooms'] = Room::get();
        $data['courses'] = Course::get();
        $data['batches'] = Batch::get();
        $data['sections'] = Section::get();

        return view('admin.routine.days.thursday.thursday-create', compact('data'));
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


        $match = Thursday::with(['teacher', 'course'])->where('teacher_id', $request->teacher_id)
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

        Thursday::create($routine);

        return redirect('dashboard/thursday/create')->with('message', 'Data added successfully.');
    }

    public function edit($id)
    {
        $thursday = Thursday::findOrFail($id);
        return view('admin.routine.days.thursday.thursday-edit', compact('thursday'));
    }

    public function update(Request $request, $id)
    {
        $thursday = Thursday::findOrFail($id);
        $thursday->session   = $request->session;
        $thursday->day  = $request->day;
        $thursday->section  = $request->section;
        $thursday->batch  = $request->batch;
        $thursday->nineAM_ninefiftyAM  = $request->nineAM_ninefiftyAM;
        $thursday->tenAM_tenfiftyAM  = $request->tenAM_tenfiftyAM;
        $thursday->elevenAM_elevenfiftyAM  = $request->elevenAM_elevenfiftyAM;
        $thursday->twelvePM_twelvefiftyPM  = $request->twelvePM_twelvefiftyPM;
        $thursday->twoPM_twofiftyPM  = $request->twoPM_twofiftyPM;
        $thursday->threePM_threefiftyPM  = $request->threePM_threefiftyPM;
        $thursday->fourPM_fourfiftyPM  = $request->fourPM_fourfiftyPM;
        $thursday->break  = $request->break;
        $thursday->save();
        return redirect('dashboard/thursday')->with('message', 'Data is successfully updated');
    }

    public function destroy($id)
    {
        $thursday = Thursday::findOrFail($id);
        $thursday->delete();

        return redirect('dashboard/thursday')->with('message', 'Data is successfully deleted');
    }

    public static function getSechdule($sectionId,  $batchId, $class_start, $class_end)
    {

        $thursday = Thursday::with(['room:id,room_code', 'course:id,course_code'])->where('section_id', $sectionId)->where('batch_id', $batchId)->where('class_start', $class_start)->where('class_end', $class_end)->first();

        if (!empty($thursday)) {
            $schedule = $thursday->room->room_code . '/' . $thursday->course->course_code . '/' . $thursday->teacher->teacher_code;
        } else {
            $schedule = "x";
        }

        return  $schedule;
    }
}
