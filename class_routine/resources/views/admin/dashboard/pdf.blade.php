<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Title-->
    <title>LU ROUTINE</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        .page-break {
            page-break-after: always;
        }
        h3{
            text-align: center;
            margin: 30px;
        }
        p{
            text-align: center;
            font-size: 20px;
            text-decoration: underline;
        }
        
    </style>
</head>

<body>
    <!--main area start-->
    <main>

        <h3>Department of Computer Science & Engineering</h3>
        <p>Summer-2021, Class Schedule</p>

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
                            
                            {{-- <th class="rotate" rowspan="{{ (count($sectionsSunday)) }}">Sunday</th> --}}
                            
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
                                    {{ app\Http\Controllers\dashboard\DashboardController::getSechduleSunday( $data->section_id, $data->batch_id, $timeSchedule->class_start, $timeSchedule->class_end) }} 
                                </td>
                            @endforeach
                            
                        </tr>
                    @endforeach
               
                
            </tbody>
        </table>

        <div class="page-break"></div>

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
                                {{ app\Http\Controllers\dashboard\DashboardController::getSechduleMonday( $data->section_id, $data->batch_id, $timeSchedule->class_start, $timeSchedule->class_end) }} 
                            </td>
                        @endforeach
                        
                    </tr>
                @endforeach
           
            
        </tbody>
    </table>

    </main>
    <!--main area end-->
</body>

</html>
