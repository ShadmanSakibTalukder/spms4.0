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
                            <h4>Create Course</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.course.create') }}" method="post">
                                @csrf
                                <div class="py-2">
                                    <label for="">Select Feculty</label>
                                    <select name="user_id" id="" class="form-control">
                                        <option value="">--select one--</option>
                                        @foreach ($faculity as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('user_id') }}</span>
                                </div>
                                <div class="py-2">
                                    <label for="">Course Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                        required>
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                </div>
                                <div class="py-2">
                                    <label for="">Course ID</label>
                                    <input type="text" class="form-control" name="course_id" value="{{ old('course_id') }}"
                                        required>
                                    <span class="text-danger">{{ $errors->first('course_id') }}</span>
                                </div>
                                <div class="py-2">
                                    <label for="">Section</label>
                                    <input type="text" class="form-control" name="section" value="{{ old('section') }}"
                                        required>
                                    <span class="text-danger">{{ $errors->first('section') }}</span>
                                </div>
                                <!-- <div class="py-2">
                                    <label for="">Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                       
                                    </select>
                                    <span class="text-danger">{{ $errors->first('status') }}</span>
                                </div> -->

                                <div class="py-2 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
