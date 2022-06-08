@extends('admin.index')
@section('content')	
<style>
    .create {
        display: block;
        margin-bottom: 20px;
        margin-top: 10px;
    }

    .create a button {
        padding: 10px 20px;
        font-size: 16px;
        border: 0px;
        background: #36ccba !important;
        text-align: center;
    }

    .rotate-table-grid th span {
        transform-origin: 4%;
        transform: rotate(-90deg);
        white-space: nowrap;
        display: block;
        position: absolute;
        bottom: 2%;
        font-size: 14px;
    }

    .rotate {
        position: relative;
        width: 50px;
    }

</style>
<div class="col-xl-12">
    <div class="create">
        <a href="{{route('wednesday.create')}}">
            <button type="button" class="btn btn-info btn-sm">Add Data</button>

        </a>
    </div>
@if(Session::has('message'))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
        @endif
        <table class="table table-bordered border-primary rotate-table-grid">
            @php 
                $table = true; 
                $tableHead = true;
            @endphp
            <thead>
                <tr>
                    <th>#</th>
                    <th>Section</th>
                    <th>Batch</th>
                    {{-- <th scope="col">Teacher</th> --}}
                    
                    @foreach ($timeSchedules as $timeSchedule)
                    @if(($timeSchedule->class_end > "13:00") && $tableHead)
                    @php $tableHead = false; @endphp
                    <th width="10px" class="rotate" rowspan="{{ (count($sections) +1) }}">
                        <span><b>Prayer & Lunch Break (01:00 pm - 02:00 pm)</b></span>
                    </th>
                    @endif  
                        <th>{{ date('h:i:A', strtotime($timeSchedule->class_start)) }} - {{ date('h:i:A', strtotime($timeSchedule->class_end ))}}</th>
                    @endforeach

                    {{-- @foreach ($timeSchedules as $timeSchedule) 
                    @if(($timeSchedule->class_end > "12:50") && $tableHead)
                        @php $tableHead = false; @endphp
                        <th width="10px" class="rotate" rowspan="{{ (count($sections) +1) }}">
                            <span><b>Prayer & Lunch Break (1.00 pm - 1.50 pm)</b></span>
                        </th>
                        @endif                       
                        <th>{{ date('h:i:A', strtotime($timeSchedule->class_start)) }} - {{ date('h:i:A', strtotime($timeSchedule->class_end ))}}</th>
                        <th>Prayer & Lunch Break (1.00 pm - 1.50 pm)</th>
                    @endforeach --}}
                   
                   
                </tr>

                    
                    @foreach($sections as $row => $data)
                        <tr>
                            @if ($row == 0 || $row % 12 == 0)
                            <th rowspan="12" style="writing-mode: vertical-rl; text-orientation: upright; text-align:center">Wednesday</th>
                            @endif
                            <th>{{$data->section->name }}</th>
                            <td>{{$data->batch->name }}</td>
                            @foreach ($timeSchedules as $timeSchedule)

                            {{-- @if($timeSchedule->class_end > "12:00" && $timeSchedule->class_start < "14:00" && $table)
                                @php $table = false; @endphp
                                <td class="rotate" rowspan="{{ count($sections) }}">
                                    <span><b>Prayer & Lunch Break (1.00 pm - 1.50 pm)</b></span>
                                </td>
                            @endif --}}

                            {{-- <td>{{$data->teacher->teacher_name}}</td> --}}
                            
                            
                                <td> 
                                    {{ app\Http\Controllers\routine\days\WednesdayController::getSechdule( $data->section_id, $data->batch_id, $timeSchedule->class_start, $timeSchedule->class_end) }} 
                                </td>
                            @endforeach
                            
                        </tr>
                    @endforeach
               
                
            </tbody>
        </table>
@endsection
