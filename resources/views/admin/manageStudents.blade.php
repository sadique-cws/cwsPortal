@extends('admin/master')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-9">
                <h5 class="m-0 h3">Manange {{ $title }} Students</h5>
            </div>
            <div class="col-3">
                <div class="btn-group float-end">
                    <a href="{{ route("admin.manage.student.active") }}" class="btn btn-success">Active</a>
                    <a href="{{ route("admin.manage.student.new") }}" class="btn btn-info">New</a>
                    <a href="{{ route("admin.manage.student.passout") }}" class="btn btn-danger">Passout</a>
                </div>
            </div>
        </div>
        <table class="table table-hovered table-bordered mt-3">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Contact</th>
                <th>FatherName</th>
                <th>email</th>
                <th>Joining Date</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->contact }}</td>
                    <td>{{ $student->father_name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ date("D d-M-Y",strtotime($student->created_at)) }}</td>
                    <td>{{ $student->address }}, {{ $student->city }} ({{ $student->state }})</td>
                    <td>
                        @if ($student->status != "2")
                            <a href="{{ route('admin.passout.student',['id'=>$student->id]) }}" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                        @endif
                        

                        <a href="" class="btn btn-dark btn-sm"><i class="bi bi-pencil"></i></a>
                        <a href="" class="btn btn-primary btn-sm"><i class="bi bi-eye"></i></a>
                        
                        @if ($student->status == "0")
                            <a href="{{ route('admin.approve.student',['id'=>$student->id]) }}" class="btn btn-success btn-sm"><i class="bi bi-check"></i> Approve</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection