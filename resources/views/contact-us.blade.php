@extends('layouts.app')

@section('content')
    <!--    PAGE HEAD SECTION-->
    <section class="page-head-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2>Contact</h2>
                    <p>
                        <a href="#">Home </a>
                        <span>/</span>
                        <span>Contact</span>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!--   PAGE HEAD SECTION  -->


    <!--    CONTACT SECTION-->
    <section class="contact-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="contact-form">
                        <h4>Contact Us</h4>
                        <form action="#">
                            <input type="text" placeholder="Name">
                            <input type="email" placeholder="Email">
                            <input type="email" placeholder="Address">
                            <textarea name="" id="" cols="30" rows="10" placeholder="Massage"></textarea>
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-lg-6 mt-5 mt-lg-0">
                    <div class="contact-info">
                        <h4>Call us 24/7</h4>
                        <h2>+11229</h2>
                        <p>
                            Samabaya Bank Bhaban, (8th Floor) 9/D, Motijheel, C/A. Dhaka-1000.
                        </p>
                        <ul>
                            <li>
                                <i data-feather="phone-call" class="contact-icon-f"></i>
                                +880123456789
                            </li>
                            <li>
                                <i data-feather="mail" class="contact-icon-f"></i>
                                
                                info@spms.Com
                            </li>
                        </ul>
                        <div class="social-icons mt-3">
                            <a href="#">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#">
                                <i class="fa-brands fa-pinterest-p"></i>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--    CONTACT SECTION END-->
@endsection
