<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Title-->
    <title>LU ROUTINE </title>
    @include('user.partials.head')
</head>

<body>
    <!--top area start-->
@include('user.partials.see-routine-nav')

    <!--main area start-->
    <main>

        
<!--Sunday-->
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
                    
                    @foreach ($timeSchedulesSunday as $timeSchedule)
                    @if(($timeSchedule->class_end > "13:00") && $tableHead)
                    @php $tableHead = false; @endphp
                    <th width="10px" class="rotate" rowspan="{{ (count($sectionsSunday) +1) }}">
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

                    
                    @foreach($sectionsSunday  as $row => $data)
                        <tr>
                            @if ($row == 0 || $row % 12 == 0)
                            <th rowspan="12" style="writing-mode: vertical-rl; text-orientation: upright; text-align:center">Sunday</th>
                            @endif
                            <th>{{$data->section->name }}</th>
                            <td>{{$data->batch->name }}</td>
                            @foreach ($timeSchedulesSunday as $timeSchedule)

                            {{-- @if($timeSchedule->class_end > "12:00" && $timeSchedule->class_start < "14:00" && $table)
                                @php $table = false; @endphp
                                <td class="rotate" rowspan="{{ count($sections) }}">
                                    <span><b>Prayer & Lunch Break (1.00 pm - 1.50 pm)</b></span>
                                </td>
                            @endif --}}

                            {{-- <td>{{$data->teacher->teacher_name}}</td> --}}
                            
                            
                                <td> 
                                    {{ app\Http\Controllers\user\FrontController::getSechduleSunday( $data->section_id, $data->batch_id, $timeSchedule->class_start, $timeSchedule->class_end) }} 
                                </td>
                            @endforeach
                            
                        </tr>
                    @endforeach
               
                
            </tbody>
        </table>

<!--Monday-->

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
                    
                    @foreach ($timeSchedulesMonday as $timeSchedule)
                    @if(($timeSchedule->class_end > "13:00") && $tableHead)
                    @php $tableHead = false; @endphp
                    <th width="10px" class="rotate" rowspan="{{ (count($sectionsMonday) +1) }}">
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
    
                    
                    @foreach($sectionsMonday as $row => $data)
                        <tr>
                            @if ($row == 0 || $row % 12 == 0)
                            <th rowspan="12" style="writing-mode: vertical-rl; text-orientation: upright; text-align:center">Monday</th>
                            @endif
                            <th>{{$data->section->name }}</th>
                            <td>{{$data->batch->name }}</td>
                            @foreach ($timeSchedulesMonday as $timeSchedule)
    
                            {{-- @if($timeSchedule->class_end > "12:00" && $timeSchedule->class_start < "14:00" && $table)
                                @php $table = false; @endphp
                                <td class="rotate" rowspan="{{ count($sections) }}">
                                    <span><b>Prayer & Lunch Break (1.00 pm - 1.50 pm)</b></span>
                                </td>
                            @endif --}}
    
                            {{-- <td>{{$data->teacher->teacher_name}}</td> --}}
                            
                            
                                <td> 
                                    {{ app\Http\Controllers\user\FrontController::getSechduleMonday( $data->section_id, $data->batch_id, $timeSchedule->class_start, $timeSchedule->class_end) }} 
                                </td>
                            @endforeach
                            
                        </tr>
                    @endforeach
               
                
            </tbody>
        </table>
<!--Tuesday-->
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
                    
                    @foreach ($timeSchedulesTuesday as $timeSchedule)
                    @if(($timeSchedule->class_end > "13:00") && $tableHead)
                    @php $tableHead = false; @endphp
                    <th width="10px" class="rotate" rowspan="{{ (count($sectionsTuesday) +1) }}">
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

                    
                    @foreach($sectionsTuesday  as $row => $data)
                        <tr>
                            @if ($row == 0 || $row % 12 == 0)
                            <th rowspan="12" style="writing-mode: vertical-rl; text-orientation: upright; text-align:center">Tuesday</th>
                            @endif
                            <th>{{$data->section->name }}</th>
                            <td>{{$data->batch->name }}</td>
                            @foreach ($timeSchedulesTuesday as $timeSchedule)

                            {{-- @if($timeSchedule->class_end > "12:00" && $timeSchedule->class_start < "14:00" && $table)
                                @php $table = false; @endphp
                                <td class="rotate" rowspan="{{ count($sections) }}">
                                    <span><b>Prayer & Lunch Break (1.00 pm - 1.50 pm)</b></span>
                                </td>
                            @endif --}}

                            {{-- <td>{{$data->teacher->teacher_name}}</td> --}}
                            
                            
                                <td> 
                                    {{ app\Http\Controllers\user\FrontController::getSechduleTuesday( $data->section_id, $data->batch_id, $timeSchedule->class_start, $timeSchedule->class_end) }} 
                                </td>
                            @endforeach
                            
                        </tr>
                    @endforeach
               
                
            </tbody>
        </table>

        <!--Wednesday-->

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
                    
                    @foreach ($timeSchedulesWednesday as $timeSchedule)
                    @if(($timeSchedule->class_end > "13:00") && $tableHead)
                    @php $tableHead = false; @endphp
                    <th width="10px" class="rotate" rowspan="{{ (count($sectionsWednesday) +1) }}">
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

                    
                    @foreach($sectionsWednesday as $row => $data)
                        <tr>
                            @if ($row == 0 || $row % 12 == 0)
                            <th rowspan="12" style="writing-mode: vertical-rl; text-orientation: upright; text-align:center">Wednesday</th>
                            @endif
                            <th>{{$data->section->name }}</th>
                            <td>{{$data->batch->name }}</td>
                            @foreach ($timeSchedulesWednesday as $timeSchedule)

                            {{-- @if($timeSchedule->class_end > "12:00" && $timeSchedule->class_start < "14:00" && $table)
                                @php $table = false; @endphp
                                <td class="rotate" rowspan="{{ count($sections) }}">
                                    <span><b>Prayer & Lunch Break (1.00 pm - 1.50 pm)</b></span>
                                </td>
                            @endif --}}

                            {{-- <td>{{$data->teacher->teacher_name}}</td> --}}
                            
                            
                                <td> 
                                    {{ app\Http\Controllers\user\FrontController::getSechduleWednesday( $data->section_id, $data->batch_id, $timeSchedule->class_start, $timeSchedule->class_end) }} 
                                </td>
                            @endforeach
                            
                        </tr>
                    @endforeach
               
                
            </tbody>
        </table>

        <!--Thursday-->

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
                    
                    @foreach ($timeSchedulesThursday as $timeSchedule)
                    @if(($timeSchedule->class_end > "13:00") && $tableHead)
                    @php $tableHead = false; @endphp
                    <th width="10px" class="rotate" rowspan="{{ (count($sectionsThursday) +1) }}">
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

                    
                    @foreach($sectionsThursday  as $row => $data)
                        <tr>
                            @if ($row == 0 || $row % 12 == 0)
                            <th rowspan="12" style="writing-mode: vertical-rl; text-orientation: upright; text-align:center">Thursday</th>
                            @endif
                            <th>{{$data->section->name }}</th>
                            <td>{{$data->batch->name }}</td>
                            @foreach ($timeSchedulesThursday as $timeSchedule)

                            {{-- @if($timeSchedule->class_end > "12:00" && $timeSchedule->class_start < "14:00" && $table)
                                @php $table = false; @endphp
                                <td class="rotate" rowspan="{{ count($sections) }}">
                                    <span><b>Prayer & Lunch Break (1.00 pm - 1.50 pm)</b></span>
                                </td>
                            @endif --}}

                            {{-- <td>{{$data->teacher->teacher_name}}</td> --}}
                            
                            
                                <td> 
                                    {{ app\Http\Controllers\user\FrontController::getSechduleThursday( $data->section_id, $data->batch_id, $timeSchedule->class_start, $timeSchedule->class_end) }} 
                                </td>
                            @endforeach
                            
                        </tr>
                    @endforeach
               
                
            </tbody>
        </table>


        <!--Saturday-->
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
                    
                    @foreach ($timeSchedulesSaturday as $timeSchedule)
                    @if(($timeSchedule->class_end > "13:00") && $tableHead)
                    @php $tableHead = false; @endphp
                    <th width="10px" class="rotate" rowspan="{{ (count($sectionsSaturday) +1) }}">
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

                    
                    @foreach($sectionsSaturday as $row => $data)
                        <tr>
                            @if ($row == 0 || $row % 12 == 0)
                            <th rowspan="12" style="writing-mode: vertical-rl; text-orientation: upright; text-align:center">Saturday</th>
                            @endif
                            <th>{{$data->section->name }}</th>
                            <td>{{$data->batch->name }}</td>
                            @foreach ($timeSchedulesSaturday as $timeSchedule)

                            {{-- @if($timeSchedule->class_end > "12:00" && $timeSchedule->class_start < "14:00" && $table)
                                @php $table = false; @endphp
                                <td class="rotate" rowspan="{{ count($sections) }}">
                                    <span><b>Prayer & Lunch Break (1.00 pm - 1.50 pm)</b></span>
                                </td>
                            @endif --}}

                            {{-- <td>{{$data->teacher->teacher_name}}</td> --}}
                            
                            
                                <td> 
                                    {{ app\Http\Controllers\user\FrontController::getSechduleSaturday( $data->section_id, $data->batch_id, $timeSchedule->class_start, $timeSchedule->class_end) }} 
                                </td>
                            @endforeach
                            
                        </tr>
                    @endforeach
               
                
            </tbody>
        </table>

        <!--Friday-->

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
                    
                    @foreach ($timeSchedulesFriday as $timeSchedule)
                    @if(($timeSchedule->class_end > "13:00") && $tableHead)
                    @php $tableHead = false; @endphp
                    <th width="10px" class="rotate" rowspan="{{ (count($sectionsFriday) +1) }}">
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

                    
                    @foreach($sectionsFriday as $row => $data)
                        <tr>
                            @if ($row == 0 || $row % 12 == 0)
                            <th rowspan="12" style="writing-mode: vertical-rl; text-orientation: upright; text-align:center">Friday</th>
                            @endif
                            <th>{{$data->section->name }}</th>
                            <td>{{$data->batch->name }}</td>
                            @foreach ($timeSchedulesFriday as $timeSchedule)

                            {{-- @if($timeSchedule->class_end > "12:00" && $timeSchedule->class_start < "14:00" && $table)
                                @php $table = false; @endphp
                                <td class="rotate" rowspan="{{ count($sections) }}">
                                    <span><b>Prayer & Lunch Break (1.00 pm - 1.50 pm)</b></span>
                                </td>
                            @endif --}}

                            {{-- <td>{{$data->teacher->teacher_name}}</td> --}}
                            
                            
                                <td> 
                                    {{ app\Http\Controllers\user\FrontController::getSechduleFriday( $data->section_id, $data->batch_id, $timeSchedule->class_start, $timeSchedule->class_end) }} 
                                </td>
                            @endforeach
                            
                        </tr>
                    @endforeach
               
                
            </tbody>
        </table>


    </main>
    <!--main area end-->
@include('user.partials.footer')
</body>

</html>
