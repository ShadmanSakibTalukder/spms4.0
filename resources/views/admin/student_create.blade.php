@extends('layouts.app')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    {{-- notify --}}
                    @if(Session::get('notify'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('notify') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    {{-- notify --}}
                    
                    <div class="card">
                        <div class="card-header text-center">
                            <h4>Student Register</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.student.create') }}" method="post">
                                @csrf
                                <div class="py-2">
                                    <label for="">Name</label>
                                    <input type="text" placeholder="Name" class="form-control" name="name" value="{{ old('name') }}"
                                        required>
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                </div>
                                <div class="py-2">
                                    <label for="">Student ID</label>
                                    <input type="text" placeholder="Student ID" class="form-control" name="user_id" value="{{ old('user_id') }}"
                                        required>
                                    <span class="text-danger">{{ $errors->first('user_id') }}</span>
                                </div>
                                <div class="py-2">
                                    <label for="">Email</label>
                                    <input type="text" placeholder="Email" class="form-control" name="email" value="{{ old('email') }}"
                                        required>
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                </div>
                                <div class="py-2">
                                    <label for="">Password</label>
                                    <input type="password" placeholder="Password" class="form-control" name="password"
                                        required>
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                </div>
                                <div class="py-2">
                                    <label for="">Password Confirm</label>
                                    <input type="password" placeholder="Re-enter Password" class="form-control" name="confirm_password"
                                        required>
                                    <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                                </div>
                                <div class="py-2 text-center">
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
