<?php

namespace App\Http\Controllers\routine\days;

use App\Batch;
use App\Course;
use App\Models\Settings\Room;
use App\Section;
use App\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Days\Tuesday;

class TuesdayController extends Controller
{
    public function index()
    {
        // $tuesday = Tuesday::all();
        $timeSchedules = Tuesday::distinct()->orderBy('class_start', 'ASC')->get(['class_start', 'class_end']);
        $sections = Tuesday::select('section_id', 'batch_id')->with('section', 'batch', 'teacher')->distinct()->get();
        return view('admin.routine.days.tuesday.tuesday-index', compact('sections', 'timeSchedules'));
    }

    public function create()
    {
        $data['techers'] = Teacher::get();
        $data['rooms'] = Room::get();
        $data['courses'] = Course::get();
        $data['batches'] = Batch::get();
        $data['sections'] = Section::get();
        return view('admin.routine.days.tuesday.tuesday-create', compact('data'));
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


        $match = Tuesday::with(['teacher', 'course'])->where('teacher_id', $request->teacher_id)
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

        Tuesday::create($routine);

        return redirect('dashboard/tuesday/create')->with('message', 'Data added successfully.');
    }

    public function edit($id)
    {
        $tuesday = Tuesday::findOrFail($id);
        return view('admin.routine.days.tuesday.tuesday-edit', compact('tuesday'));
    }

    public function update(Request $request, $id)
    {
        $tuesday = Tuesday::findOrFail($id);
        $tuesday->session   = $request->session;
        $tuesday->day  = $request->day;
        $tuesday->section  = $request->section;
        $tuesday->batch  = $request->batch;
        $tuesday->nineAM_ninefiftyAM  = $request->nineAM_ninefiftyAM;
        $tuesday->tenAM_tenfiftyAM  = $request->tenAM_tenfiftyAM;
        $tuesday->elevenAM_elevenfiftyAM  = $request->elevenAM_elevenfiftyAM;
        $tuesday->twelvePM_twelvefiftyPM  = $request->twelvePM_twelvefiftyPM;
        $tuesday->twoPM_twofiftyPM  = $request->twoPM_twofiftyPM;
        $tuesday->threePM_threefiftyPM  = $request->threePM_threefiftyPM;
        $tuesday->fourPM_fourfiftyPM  = $request->fourPM_fourfiftyPM;
        $tuesday->break  = $request->break;
        $tuesday->save();
        return redirect('dashboard/tuesday')->with('message', 'Data is successfully updated');
    }

    public function destroy($id)
    {
        $tuesday = Tuesday::findOrFail($id);
        $tuesday->delete();

        return redirect('dashboard/tuesday')->with('message', 'Data is successfully deleted');
    }

    /* public static function getSechdule($roomId, $courseId, $sectionId, $teacherId, $batchId, $class_start, $class_end){
        
        $tuesday = Tuesday::with(['room:id,room_code', 'course:id,course_code'])->where('room_id', $roomId)->where('course_id',$courseId)->where('section_id',$sectionId)->where('teacher_id',$teacherId)->where('batch_id',$batchId)->where('class_start', $class_start)->where('class_end',$class_end)->first();
        
        if(!empty($tuesday)){
            $schedule = $tuesday->room->room_code.'/'.$tuesday->course->course_code.'/'.$tuesday->teacher->teacher_code;
        }else{
            $schedule = "x";
        }

        return  $schedule;
    } */

    public static function getSechdule($sectionId,  $batchId, $class_start, $class_end)
    {

        $tuesday = Tuesday::with(['room:id,room_code', 'course:id,course_code'])->where('section_id', $sectionId)->where('batch_id', $batchId)->where('class_start', $class_start)->where('class_end', $class_end)->first();

        if (!empty($tuesday)) {
            $schedule = $tuesday->room->room_code . '/' . $tuesday->course->course_code . '/' . $tuesday->teacher->teacher_code;
        } else {
            $schedule = "x";
        }

        return  $schedule;
    }
}
