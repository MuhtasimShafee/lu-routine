<?php

namespace App\Models\Days;

use App\Course;
use App\Batch;
use App\Models\Settings\Room;
use App\Section;
use App\Teacher;
use Illuminate\Database\Eloquent\Model;

class Tuesday extends Model
{
    protected $guarded = [];
    public function teacher(){
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }

    public function room(){
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }

    public function course(){
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }


    public function batch(){
        return $this->belongsTo(Batch::class, 'batch_id', 'id');
    }

    public function section(){
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }
}
