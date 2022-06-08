@extends('admin.index')
@section('content')

<link href="{{asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>  
<script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>

<div class="card card-custom">
    @if(Session::has('message'))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
    @endif
    @if(Session::has('error'))
        <div class="alert alert-danger">
            {{Session::get('error')}}
        </div>
    @endif
    <div class="card-header">
        <h3 class="card-title">
            Add Data for Tuesday
        </h3>
        <div class="card-toolbar">
            <div class="example-tools justify-content-center">
                <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
            </div>
        </div>
    </div>
    <!--begin::Form-->
    
    <form action="{{route('tuesday.store')}}" method="POST">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Section</label>
                        <select name="section_id" class="form-select form-select-md section_id" id="section_id">
                         
                            @foreach($data['sections'] as $section)
                                <option {{ old('section_id') == $section->id ? 'SELECTED' : '' }} value="{{ $section->id }}">{{ $section->name }}</option>
                            @endforeach
                            
                        </select>
                    </div>
                </div>  

                <div class="col">
                    <div class="form-group">
                        <label>Batch</label>
                        <select name="batch_id" class="form-select form-select-md batch_id" id="batch_id">
                            @foreach($data['batches'] as $batch)
                                <option {{ old('batch_id') == $batch->id ? 'SELECTED' : '' }} value="{{ $batch->id }}">{{ $batch->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label>Course</label>
                        <select name="course_id" class="form-select form-select-md course_id" id="course_id">
                            @foreach($data['courses'] as $course)
                                <option {{ old('course_id') == $course->id ? 'SELECTED' : '' }} value="{{ $course->id }}">{{ $course->course_title }} ({{ $course->course_code }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="col">
                    <div class="form-group">
                        <label>Teacher</label>
                        <select name="teacher_id" class="form-select form-select-md teacher_id" id="teacher_id">
                            @foreach($data['techers'] as $techer)
                                <option {{ old('teacher_id') == $techer->id ? 'SELECTED' : '' }} value="{{ $techer->id }}">{{ $techer->teacher_name }} ({{ $techer->teacher_code }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Room</label>
                        <select name="room_id" class="form-select form-select-md room_id" id="room_id" >
                            @foreach($data['rooms'] as $room)
                                <option {{ old('room_id') == $room->id ? 'SELECTED' : '' }} value="{{ $room->id }}">{{ $room->room_title }} ({{ $room->room_code }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>  

                <div class="col">
                    <div class="form-group">
                        <label>Start Time</label>
                        <input type="time" value="{{ old('class_start') }}" name="class_start" class="form-control form-control-sm class_start" id="class_start" />                            
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label>End Time</label>
                        <input type="time" value="{{ old('class_end') }}" name="class_end" class="form-control form-control-sm class_end" id="class_end" />
                    </div>
                </div>


                <div class="col">
                    <div class="form-group" style="margin-top: 25px;">
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
        
    </form>
    <!--end::Form-->

    <script>
        startTime.addEventListener("#class_end", function() {
            valueSpan.innerText = startTime.value;
        }, false);

        startTime.addEventListener("#class_start", function() {
            valueSpan.innerText = startTime.value;
        }, false);
    </script>
</div>
@endsection
