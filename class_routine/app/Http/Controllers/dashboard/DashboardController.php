<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Days\Sunday;
use App\Models\Days\Monday;
use App\Models\Days\Tuesday;
use App\Models\Days\Wednesday;
use App\Models\Days\Thursday;
use App\Models\Days\Saturday;
use App\Models\Days\Friday;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;

class DashboardController extends Controller
{
    public function index()
    {
        //$sunday = Sunday::all();
        // $sunday = Sunday::with('teacher')->get();
        $timeSchedulesSunday = Sunday::distinct()->orderBy('class_start', 'ASC')->get(['class_start', 'class_end']);
        $sectionsSunday = Sunday::select('section_id', 'batch_id')->with('section', 'batch', 'teacher')->distinct()->get();

        //$monday = Monday::all();
        // $monday = Monday::with('teacher')->get();
        $timeSchedulesMonday = Monday::distinct()->orderBy('class_start', 'ASC')->get(['class_start', 'class_end']);
        $sectionsMonday = Monday::select('section_id', 'batch_id')->with('section', 'batch', 'teacher')->distinct()->get();

        //$tuesday = Tuesday::all();
        // $tuesday = Tuesday::with('teacher')->get();
        $timeSchedulesTuesday = Tuesday::distinct()->orderBy('class_start', 'ASC')->get(['class_start', 'class_end']);
        $sectionsTuesday = Tuesday::select('section_id', 'batch_id')->with('section', 'batch', 'teacher')->distinct()->get();

        // $wednesday = Wednesday::all();
        $timeSchedulesWednesday = Wednesday::distinct()->orderBy('class_start', 'ASC')->get(['class_start', 'class_end']);
        $sectionsWednesday = Wednesday::select('section_id', 'batch_id')->with('section', 'batch', 'teacher')->distinct()->get();

        // $thursday = Thursday::all();
        $timeSchedulesThursday = Thursday::distinct()->orderBy('class_start', 'ASC')->get(['class_start', 'class_end']);
        $sectionsThursday = Thursday::select('section_id', 'batch_id')->with('section', 'batch', 'teacher')->distinct()->get();

        // $saturday = Saturday::all();
        $timeSchedulesSaturday = Saturday::distinct()->orderBy('class_start', 'ASC')->get(['class_start', 'class_end']);
        $sectionsSaturday = Saturday::select('section_id', 'batch_id')->with('section', 'batch', 'teacher')->distinct()->get();

        // $friday = Friday::all();
        $timeSchedulesFriday = Friday::distinct()->orderBy('class_start', 'ASC')->get(['class_start', 'class_end']);
        $sectionsFriday = Friday::select('section_id', 'batch_id')->with('section', 'batch', 'teacher')->distinct()->get();


        return view('admin.dashboard.routine-index', compact('sectionsSunday', 'timeSchedulesSunday', 'sectionsMonday', 'timeSchedulesMonday', 'sectionsTuesday', 'timeSchedulesTuesday', 'sectionsWednesday', 'timeSchedulesWednesday', 'sectionsThursday', 'timeSchedulesThursday', 'sectionsFriday', 'timeSchedulesFriday', 'sectionsSaturday', 'timeSchedulesSaturday'));
    }

    public function pdf()
    {

       //$sunday = Sunday::all();
       // $monday = Monday::all();
       $timeSchedulesSunday = Sunday::distinct()->orderBy('class_start', 'ASC')->get(['class_start', 'class_end']);
       $sectionsSunday = Sunday::select('section_id', 'batch_id')->with('section', 'batch', 'teacher')->distinct()->get();

       $timeSchedulesMonday = Monday::distinct()->orderBy('class_start', 'ASC')->get(['class_start', 'class_end']);
       $sectionsMonday = Monday::select('section_id', 'batch_id')->with('section', 'batch', 'teacher')->distinct()->get();
        //return view('admin.dashboard.pdf', compact('sunday', 'monday'));
        $data = [
            'timeSchedulesSunday' => $timeSchedulesSunday,
            'sectionsSunday' => $sectionsSunday,
            'timeSchedulesMonday' => $timeSchedulesMonday,
            'sectionsMonday' => $sectionsMonday
        ];
        $pdf = PDF::loadView('admin.dashboard.pdf', $data)->setPaper('a3', 'landscape');
        return $pdf->download('routine.pdf');
    }
    //sunday
    public static function getSechduleSunday($sectionId,  $batchId, $class_start, $class_end)
    {

        $sunday = Sunday::with(['room:id,room_code', 'course:id,course_code'])->where('section_id', $sectionId)->where('batch_id', $batchId)->where('class_start', $class_start)->where('class_end', $class_end)->first();

        if (!empty($sunday)) {
            $schedule = $sunday->room->room_code . '/' . $sunday->course->course_code . '/' . $sunday->teacher->teacher_code;
        } else {
            $schedule = "x";
        }

        return  $schedule;
    }


    //monday
    public static function getSechduleMonday($sectionId,  $batchId, $class_start, $class_end)
    {

        $monday = Monday::with(['room:id,room_code', 'course:id,course_code'])->where('section_id', $sectionId)->where('batch_id', $batchId)->where('class_start', $class_start)->where('class_end', $class_end)->first();

        if (!empty($monday)) {
            $schedule = $monday->room->room_code . '/' . $monday->course->course_code . '/' . $monday->teacher->teacher_code;
        } else {
            $schedule = "x";
        }

        return  $schedule;
    }

    //tuesday
    public static function getSechduleTuesday($sectionId,  $batchId, $class_start, $class_end)
    {

        $tuesday = Tuesday::with(['room:id,room_code', 'course:id,course_code'])->where('section_id', $sectionId)->where('batch_id', $batchId)->where('class_start', $class_start)->where('class_end', $class_end)->first();

        if (!empty($tuesday)) {
            $schedule = $tuesday->room->room_code . '/' . $tuesday->course->course_code . '/' . $tuesday->teacher->teacher_code;
        } else {
            $schedule = "x";
        }

        return  $schedule;
    }

    //wednesday
    public static function getSechduleWednesday($sectionId,  $batchId, $class_start, $class_end)
    {

        $wednesday = Wednesday::with(['room:id,room_code', 'course:id,course_code'])->where('section_id', $sectionId)->where('batch_id', $batchId)->where('class_start', $class_start)->where('class_end', $class_end)->first();

        if (!empty($wednesday)) {
            $schedule = $wednesday->room->room_code . '/' . $wednesday->course->course_code . '/' . $wednesday->teacher->teacher_code;
        } else {
            $schedule = "x";
        }

        return  $schedule;
    }

    //thursday
    public static function getSechduleThursday($sectionId,  $batchId, $class_start, $class_end)
    {

        $thursday = Thursday::with(['room:id,room_code', 'course:id,course_code'])->where('section_id', $sectionId)->where('batch_id', $batchId)->where('class_start', $class_start)->where('class_end', $class_end)->first();

        if (!empty($thursday)) {
            $schedule = $thursday->room->room_code . '/' . $thursday->course->course_code . '/' . $thursday->teacher->teacher_code;
        } else {
            $schedule = "x";
        }

        return  $schedule;
    }

    //saturday
    public static function getSechduleSaturday($sectionId,  $batchId, $class_start, $class_end)
    {

        $saturday = Saturday::with(['room:id,room_code', 'course:id,course_code'])->where('section_id', $sectionId)->where('batch_id', $batchId)->where('class_start', $class_start)->where('class_end', $class_end)->first();

        if (!empty($saturday)) {
            $schedule = $saturday->room->room_code . '/' . $saturday->course->course_code . '/' . $saturday->teacher->teacher_code;
        } else {
            $schedule = "x";
        }

        return  $schedule;
    }


    //friday
    public static function getSechduleFriday($sectionId,  $batchId, $class_start, $class_end)
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
