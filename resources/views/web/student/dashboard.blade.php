@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-10 col-md-10 col-sm-12 m-auto">
                    <div class="card my-4">
                        <div class="card-body bg-primary text-white">
                            Welcome {{ Auth::user()->name }}
                        </div>
                    </div>
                    <!-- <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Course Name</th>
                                        <th scope="col">Course ID</th>
                                        <th scope="col">Faculty Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        @foreach ($enroled_course as $course)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $course->name }}</td>
                                            <td>{{ $course->course_id }}</td>
                                            <td>{{ App\Models\User::where('id', $course->user_id)->first()->name }}</td>
                                            </tr>
                                        @endforeach
                                  
                                </tbody>
                            </table>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
@endsection
