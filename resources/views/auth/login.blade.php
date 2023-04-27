@extends('layouts.app')

@section('content')
    <!--    SIGN IN SECTION-->
    <section class="signin-section py-5">
        <div class="container">
            <div class="signin-box">
               <h4>Sign In</h4>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="py-2">
                       <label for="">User Type</label>
                        <div class="input-box">
                        <select name="user_type" id="">
                            <option value="student">Student</option>
                            <option value="faculty">Faculty</option>
                            <option value="admin">Higher Authority</option>
                        </select>
                    </div>
                    </div>
                   <div class="py-2">
                       <label for="">User Id</label>
                        <div class="input-box">
                            <input type="number" placeholder="User Id" value="{{ old('user_id') }}" name="user_id">
                            <i data-feather="user" class="input-icon"></i>
                        </div>
                        @error('user_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                   </div>
                   <div class="py-3">
                        <label for="">Password</label>
                            <div class="input-box">
                            <input type="password" placeholder="Password" name="password">
                            <i data-feather="lock" class="input-icon"></i>
                        </div>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                   </div>
                    <div class="signin-btn py-3">
                        <button type="submit">Sign In</button>
                    </div>
                     <div class="have-an-accound">
                       <p>Don't Have any account ? Contact with Faculty 
                           <a href="{{ route('contactus') }}">Contact us</a>
                       </p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--    SIGN IN SECTION END-->
@endsection
