@extends('admin/master')

@section('content')
    <div class="row">
        <div class="col-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h2 class="display-4">{{ $countStudent }}</h2>
                    <h6>Total Students</h6>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <h2 class="display-4">50+</h2>
                    <h6>Total Due</h6>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h2 class="display-4">50+</h2>
                    <h6>Total Course</h6>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table">
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach ($due_payment as $due)
                    <tr>
                        <td>{{ $due->id }}</td>
                        <td>{{ $due->student->name }}</td>
                        <td>{{ $due->amount }}</td>
                        <td>{{ $due->due_date }}</td>
                        <td><span class="badge bg-danger text-white rounded-pill">{{ $due->status }}</span></td>
                        <td>
                            <a href="{{ route('admin.make.cashpayment',['std_id'=>$due->student_id,'id'=>$due->id]) }}" class="btn btn-success">Paid</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection