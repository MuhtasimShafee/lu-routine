<?php

namespace App\Http\Controllers\routine\days;


// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
// use App\Batch;
// use App\Course;
// use App\Models\Days\Wednesday;
// use App\Models\Settings\Room;
// use App\Section;
// use App\Teacher;
use App\Batch;
use App\Course;
use App\Models\Days\Wednesday;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings\Room;
use App\Section;
use App\Teacher;

class WednesdayController extends Controller
{
    public function index()
    {
        // $wednesday = Wednesday::all();
        $timeSchedules = Wednesday::distinct()->orderBy('class_start', 'ASC')->get(['class_start', 'class_end']);
        $sections = Wednesday::select('section_id', 'batch_id')->with('section', 'batch', 'teacher')->distinct()->get();
        return view('admin.routine.days.wednesday.wednesday-index', compact('timeSchedules', 'sections'));
    }

    public function create()
    {
        $data['techers'] = Teacher::get();
        $data['rooms'] = Room::get();
        $data['courses'] = Course::get();
        $data['batches'] = Batch::get();
        $data['sections'] = Section::get();
        return view('admin.routine.days.wednesday.wednesday-create', compact('data'));
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


        $match = Wednesday::with(['teacher', 'course'])->where('teacher_id', $request->teacher_id)
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

        Wednesday::create($routine);

        return redirect('dashboard/wednesday/create')->with('message', 'Data added successfully.');
    }

    public function edit($id)
    {
        $wednesday = Wednesday::findOrFail($id);
        return view('admin.routine.days.wednesday.wednesday-edit', compact('wednesday'));
    }

    public function update(Request $request, $id)
    {
        $wednesday = Wednesday::findOrFail($id);
        $wednesday->session   = $request->session;
        $wednesday->day  = $request->day;
        $wednesday->section  = $request->section;
        $wednesday->batch  = $request->batch;
        $wednesday->nineAM_ninefiftyAM  = $request->nineAM_ninefiftyAM;
        $wednesday->tenAM_tenfiftyAM  = $request->tenAM_tenfiftyAM;
        $wednesday->elevenAM_elevenfiftyAM  = $request->elevenAM_elevenfiftyAM;
        $wednesday->twelvePM_twelvefiftyPM  = $request->twelvePM_twelvefiftyPM;
        $wednesday->twoPM_twofiftyPM  = $request->twoPM_twofiftyPM;
        $wednesday->threePM_threefiftyPM  = $request->threePM_threefiftyPM;
        $wednesday->fourPM_fourfiftyPM  = $request->fourPM_fourfiftyPM;
        $wednesday->break  = $request->break;
        $wednesday->save();
        return redirect('dashboard/wednesday')->with('message', 'Data is successfully updated');
    }

    public function destroy($id)
    {
        $wednesday = Wednesday::findOrFail($id);
        $wednesday->delete();

        return redirect('dashboard/wednesday')->with('message', 'Data is successfully deleted');
    }

    public static function getSechdule($sectionId,  $batchId, $class_start, $class_end)
    {

        $wednesday = Wednesday::with(['room:id,room_code', 'course:id,course_code'])->where('section_id', $sectionId)->where('batch_id', $batchId)->where('class_start', $class_start)->where('class_end', $class_end)->first();

        if (!empty($wednesday)) {
            $schedule = $wednesday->room->room_code . '/' . $wednesday->course->course_code . '/' . $wednesday->teacher->teacher_code;
        } else {
            $schedule = "x";
        }

        return  $schedule;
    }
}
