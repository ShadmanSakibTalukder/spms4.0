@extends('layouts.app')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    {{-- notify --}}
                    @if (Session::get('notify'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ Session::get('notify') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header text-center">
                            <h4>Create CO Analysis</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('faculty.mark.create') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6 py-2">
                                        <label for="">Student ID</label>
                                        <select name="user_id" id="" class="form-control" required>
                                            <option value="">--select one--</option>
                                            @foreach ($student as $item)
                                                <option value="{{ $item->id }}">{{ $item->user_id }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('user_id') }}</span>
                                    </div>
                                   
                                    <div class="col-12 col-md-6 py-2">
                                         <label for="">Education Year</label>
                                        <select name="edu_year" class="form-control" required>
                                            <option value="">--select one--</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                        </select>
                                        <span class="text-danger">{{ $errors->first('edu_year') }}</span>
                                    </div>
                                    <div class="col-12 col-md-6 py-2">
                                        <label for="">Semester</label>
                                            <select name="semester" class="form-control" required>
                                                <option value="">--select one--</option>
                                                <option value="Summer">Summer</option>
                                                <option value="Spring">Spring</option>
                                                <option value="Autumn">Autumn</option>
                                            </select>
                                            <span class="text-danger">{{ $errors->first('semester') }}</span>
                                    </div>
                                     <div class="col-12 col-md-6 py-2">
                                        <label for="">Course</label>
                                            <select name="course_id" class="form-control" required>
                                                <option value="">--select one--</option>
                                                @foreach ($course as $item)
                                                <option value="{{ $item->id }}">{{ $item->course_id }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->first('course_id') }}</span>
                                    </div>
                                    <div class="col-12 col-md-6 py-2">
                                       <label for="">Section</label>
                                        <input class="form-control" type="text" name="section" placeholder="Section" required>
                                        <span class="text-danger">{{ $errors->first('section') }}</span>
                                    </div>
                                    <div class="col-12 col-md-6 py-2">
                                        <label for="">Grade</label>
                                        <input type="text" class="form-control" name="grade" required>
                                        <span class="text-danger">{{ $errors->first('grade') }}</span>
                                    </div>
                                </div>
                                <div class="py-2 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                     <div class="card mt-4 py-2">
                        <div class="text-end">
                        <label for=""><b>Upload CSV file: </b></label>
                        <input type="file">
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
