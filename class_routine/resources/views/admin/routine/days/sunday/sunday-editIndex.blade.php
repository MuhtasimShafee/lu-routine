@extends('admin.index')
@section('content')
<style>
    .create {
        display: block;
        margin-bottom: 20px;

    }

    .create a button {
        padding: 10px 20px;
        font-size: 16px;
        border: 0px;
        background: #36ccba !important;
        text-align: center;
    }

</style>
<div class="col-xl-12">
    <div class="create">
        <a href="{{route('sunday.index')}}" enctype="multipart/form-data">
            <button type="button" class="btn btn-info btn-sm">See Sunday</button>
        </a>
        <a href="{{route('sunday.create')}}" enctype="multipart/form-data">
            <button type="button" class="btn btn-info btn-sm">Add Sunday</button>
        </a>
    </div>

    @if(Session::has('message'))
    <div class="alert alert-success">
        {{Session::get('message')}}
    </div>
    @endif

    <table class="table" style="text-align: center;">
        <thead>
            <tr>
                <th class="line" scope="col">Section</th>
                <th class="line" scope="col">Batch</th>
                <th class="line" scope="col">Course</th>
                <th class="line" scope="col">Teacher</th>
                <th class="line" scope="col">Room</th>
                <th class="line" scope="col">class Start</th>
                <th class="line" scope="col">class End</th>
                <th class="line" scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="table-success">

            @foreach ($sunday as $row)
            <tr>
                <td>{{str_limit($row->section->name,30)}}</td>
                <td>{{str_limit($row->batch->name,30)}}</td>
                <td>{{str_limit($row->course->course_title,30)}}</td>
                <td>{{str_limit($row->teacher->teacher_name,30)}}</td>
                <td>{{str_limit($row->room->room_title,30)}}</td>
                <td>{{str_limit($row->class_start,30)}}</td>
                <td>{{str_limit($row->class_end,30)}}</td>
                <td>
                    <a class=" btn-bg-dark" href="{{route('sunday.edit',[$row->id])}}"> <button type="button" class="btn btn-info btn-sm">Edit</button>
                    </a>
                    <a href="{{route('sunday.delete',[$row->id])}}">
                        <button type="button" class="btn btn-danger btn-sm">
                            Delete
                        </button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$sunday->links()}}
</div>

@endsection