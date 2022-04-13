@extends('homepages/base')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="card">
                    <div class="card-body">
                        <h5>Apply Here</h5>
                        <form action="" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                                @error('name')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">contact</label>
                                <input type="text" name="contact" value="{{ old("contact") }}" class="form-control">
                                @error('contact')
                                    <p class="text-danger small">{{ $message }}</p>
                                 @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">father_name</label>
                                <input type="text" name="father_name" value="{{ old("father_name") }}" class="form-control">
                                @error('father_name')
                                    <p class="text-danger small">{{ $message }}</p>
                                 @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">email</label>
                                <input type="text" name="email" value="{{ old("email") }}" class="form-control">
                                @error('email')
                                    <p class="text-danger small">{{ $message }}</p>
                                 @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">address</label>
                                <input type="text" name="address" value="{{ old("address") }}" class="form-control">
                                @error('address')
                                    <p class="text-danger small">{{ $message }}</p>
                                 @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">city</label>
                                <input type="text" name="city" value="{{ old("city") }}" class="form-control">
                                @error('city')
                                    <p class="text-danger small">{{ $message }}</p>
                                 @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">state</label>
                                <input type="text" name="state" value="{{ old("state") }}" class="form-control">
                                @error('state')
                                    <p class="text-danger small">{{ $message }}</p>
                                 @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">education</label>
                                <input type="text" name="education" value="{{ old("education") }}" class="form-control">
                                @error('education')
                                    <p class="text-danger small">{{ $message }}</p>
                                 @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">dob</label>
                                <input type="date" name="dob" value="{{ old("dob") }}" class="form-control">
                                @error('dob')
                                    <p class="text-danger small">{{ $message }}</p>
                                 @enderror
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-success w-100">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection