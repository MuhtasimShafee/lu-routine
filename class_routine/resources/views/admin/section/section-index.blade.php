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
        <a href="{{route('section.create')}}" enctype="multipart/form-data">
            <button type="button" class="btn btn-info btn-sm">Add Section</button>

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
                <th class="line" scope="col">Section Name</th>
                {{-- <th class="line" scope="col">Batch Name</th> --}}
                <th class="line" scope="col">Action</th>
            </tr>
        </thead>

        <tbody class="table-success">

            @foreach ($section as $row)
            <tr>
                <td>{{str_limit($row->name,30)}}</td>
                {{-- <td>{{str_limit($row->batch_id,30)}}</td> --}}
                <td>
                    {{-- {{route('teacher.edit',[$row->id])}} --}}
                    <a class=" btn-bg-dark" href="{{route('section.edit',[$row->id])}}"> <button type="button" class="btn btn-info btn-sm">Edit</button>
                    </a>
                    {{-- {{route('teacher.delete',[$row->id])}} --}}
                    <a href="{{route('section.delete',[$row->id])}}">
                        <button type="button" class="btn btn-danger btn-sm">
                            Delete
                        </button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$section->links()}}
</div>

@endsection
