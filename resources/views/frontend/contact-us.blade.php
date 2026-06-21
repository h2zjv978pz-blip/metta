@extends('frontend.layouts.base')

@section('page-title', 'Contact Us')

@section('main-content')
    <section>
        <div class="breadcrumb-img" style="background-image: url('{{ asset('_common/img/blog_11.jpg') }}')">
            <div class="breadcrumb-text-wrap">
                <span>contact</span>
                <h2>Contact Information</h2>
            </div>
        </div>
        <div class="container pd-top pd-bottom">
            <div class="title">
                <img src="{{ asset('_common/img/title-icon.png') }}">
                <span>CONTACT US</span>
                <h2>GET IN TOUCH</h2>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-info-box">
                        <i class="pe-7s-map-2"></i>
                        <h6>Head Office</h6>
                        <div class="text-center">House#100 A, Road-6A Banani Old Dohs, Banani, Dhaka <br> Cell: 01711034941, 01845160729</div>
                    </div>
                    <div class="contact-info-box mt-4">
                        <i class="pe-7s-mail"></i>
                        <h6>Mail Us</h6>
                        <div class="text-center">info@mettabd.org</div>
                    </div>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <div class="success-popup d-none">
                        <i class="fa-regular fa-circle-check"></i>
                        <div>Message submitted successfully. Thank You.</div>
                        <button type="button" class="btn success-popup-close">OK</button>
                    </div>
                    <form class="contact_form" id="contact_form" name="ContactForm" method="post" action="https://archcellbd.com/tasks/store-contact-message">
                        @csrf
                        <div class="input-field mb-3">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required="">
                        </div>
                        <div class="input-field mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required="">
                        </div>
                        <div class="input-field mb-4">
                            <textarea class="form-control" id="email-message" name="message" placeholder="Your Message" rows="6" required=""></textarea>
                        </div>
                        <div class="text-center mb-4">
                            <button class="my-btn btn-02 rounded-0" type="submit">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mt-4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3650.6466757564813!2d90.39793999999999!3d23.795592999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjPCsDQ3JzQ0LjEiTiA5MMKwMjMnNTIuNiJF!5e0!3m2!1sen!2sbd!4v1689377638104!5m2!1sen!2sbd" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>


        </div>
    </section>
@endsection
