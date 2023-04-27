<!--    HEADER SECTION-->
<header class="py-1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-1">
                <div class="logo-image d-flex justify-content-between align-items-center">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('images/logo/logo.png') }}" alt="">
                    </a>
                    <div class="d-lg-none">
                        <i class="fa-solid fa-bars" onclick="mobileClick()"></i>
                    </div>
                </div>
            </div>
            <div class="col-11 d-none d-lg-block">
                <div class="d-flex align-items-center justify-content-end">
                    <div class="menubar">
                        <ul>
                            @auth
                                @if (auth()->user()->user_type == 'admin')
                                    <li>
                                        <a href="{{ route('admin.student.create') }}">
                                            Add Student
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.faculity.create') }}">
                                            Add Faculity
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.course.create') }}">
                                            Add Course
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            PLO Analysis
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            PLO Achievement Stats
                                        </a>
                                    </li>
                                @endif
                                @if (auth()->user()->user_type == 'faculty')
                                    <li>
                                        <a href="{{ route('faculty.mark.create') }}">
                                            Add CO
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('faculty.total.co') }}">
                                            View CO
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            PLO Analysis
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            PLO Achievement Stats
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Spider Chart Analysis
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            Data Entry
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            View course Outline
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Enrollment Stats
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            GPA Analysis
                                        </a>
                                    </li>
                                @endif
                                 @if (auth()->user()->user_type == 'student')
                                    <li>
                                        <a href="{{ route('student.result.show') }}">
                                            View CO
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            PLO Analysis
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            PLO Achievement Stats
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Spider Chart Analysis
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            Data Entry
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            View course Outline
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Enrollment Stats
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            GPA Analysis
                                        </a>
                                    </li>
                                @endif
                            @endauth

                            @guest
                                <li>
                                    <a href="#">
                                        PLO Analysis
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        PLO Achievement Stats
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Spider Chart Analysis
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        Data Entry
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        View course Outline
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Enrollment Stats
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        GPA Analysis
                                    </a>
                                </li>
                            @endguest 
                        </ul>
                    </div>
                    <div class="menubar right">
                        <ul>
                            <li class="sub-btn">
                                <a href="#">Accounts
                                    <i class="fa-solid fa-angle-down"></i>
                                </a>
                                <div class="sub-menu">
                                    @auth
                                        @if (Auth::user()->user_type == 'admin')
                                            <a href="{{ url('/admin/dashboard') }}">Admin Dashboard</a>
                                            @elseif (Auth::user()->user_type == "faculty")
                                            <a href="{{ url('/faculty/dashboard') }}">Faculty Dashboard</a>
                                            @elseif (Auth::user()->user_type == "student")
                                            <a href="{{ url('/dashboard') }}">Student Dashboard</a>
                                            @else
                                            <a href="{{ route('login') }}">Login</a>
                                        @endif
                                    @endauth
                                    @guest
                                        <a href="{{ route('login') }}">Login</a>
                                    @endguest
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit">
                                            <a>Logout</a>
                                        </button>
                                    </form>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--    HEADER SECTION END-->

<!--    MOBILE MENU-->
<div id="mobile-menu" class="mobile-menu">
    <!-- accordion-->
    <div class="accordion accordion-flush" id="accordionFlushExample">

        <div class="mobile-logo mb-3">
            <a href="#">
                <img src="images/logo/logo.png" alt="mobile-logo">
            </a>
            <i id="mobile-cross" class="fa fa-times" onClick="mobileClick()"></i>
        </div>
        <div class="accordion-item custom ">
            <h2 class="accordion-header" id="flush-headingThree">
                <a href="#">
                    <button class="accordion-button custom collapsed none" type="button">
                        PLO Analysis
                    </button>
                </a>
            </h2>
        </div>
        <div class="accordion-item custom">
            <h2 class="accordion-header" id="flush-headingThree">
                <a href="#">
                    <button class="accordion-button custom collapsed none" type="button">
                        PLO Achievement Stats
                    </button>
                </a>
            </h2>
        </div>
        <div class="accordion-item custom">
            <h2 class="accordion-header" id="flush-headingThree">
                <a href="#">
                    <button class="accordion-button custom collapsed none" type="button">

                        Spider Chart Analysis
                    </button>
                </a>
            </h2>
        </div>
        <div class="accordion-item custom">
            <h2 class="accordion-header" id="flush-headingThree">
                <a href="#">
                    <button class="accordion-button custom collapsed none" type="button">
                        View Course Outline
                    </button>
                </a>
            </h2>
        </div>
        <div class="accordion-item custom">
            <h2 class="accordion-header" id="flush-headingThree">
                <a href="#">
                    <button class="accordion-button custom collapsed none" type="button">
                        Enrollment Stats
                    </button>
                </a>
            </h2>
        </div>
        <div class="accordion-item custom">
            <h2 class="accordion-header" id="flush-headingThree">
                <a href="#">
                    <button class="accordion-button custom collapsed none" type="button">
                        GPA Analysis
                    </button>
                </a>
            </h2>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button custom collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#two" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Accounts
                </button>
            </h2>
            <div id="two" class="accordion-collapse collapse" aria-labelledby="two"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body custom">
                    <ul>
                        <li><a href="#"><i class="fa fa-chevron-right"></i>Dashboard</a></li>

                        <li><a href="#"><i class="fa fa-chevron-right"></i>Faculty Dashboard</a></li>
                        <li><a href="#"><i class="fa fa-chevron-right"></i>Student Dashboard</a></li>
                        <li><a href="#"><i class="fa fa-chevron-right"></i>Admin Panel</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="mobileOverlay" class="mobile-overlay" onClick="mobileClick()"></div>
<!--    MOBILE MENU END-->
