@extends('frontend.layouts.base')

@section('page-title', 'Donate')

@section('main-content')
    <section>
        <div class="donate-breadcrumb-img" style="background-image: url('{{ asset('_common/img/donate.jpg') }}')">
            <div class="donate-breadcrumb-text-wrap" >
                <div class="container">
                    <h2>SUPPORT</h2>
                    <p>Metta stands as a non-profit Buddhist education and information service, thriving
                        solely on the generosity of donations. Your support is pivotal in sustaining Metta,
                    </p>
                    <p>
                        If you prefer to contribute via mail, we encourage you to utilize our manual donation
                        form. Your generosity helps maintain Metta commitment to providing valuable
                        resources to the global community.
                    </p>
                    <p>
                        We express our heartfelt gratitude for your support, which enables us to continue our
                        mission of disseminating Buddhist teachings and fostering a community of learning and
                        understanding.
                    </p>
                    <p>
                        Thank you for being an integral part of the Metta community.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container py-5">
            <div class="donate-wrap">
                <div class="donate-logo">
                    <img src="{{ asset('_common/img/wheel.png') }}">
                </div>
                <div class="my-btn-div">
                    <a href="#" class="my-btn btn-01 fs-4 rounded-3 px-5" data-bs-toggle="modal" data-bs-target="#DonateModal" >Donate</a>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-center flex-column text-center">
               <div>
                   <h5>For who wants to donate, please use the following bank account:</h5>
                   <h6 style="margin-top: 1.5rem;">SWIFT/BIC Code: {{ $data['donationInfo']?->prop('bankSwiftCode', null) ?? '-' }}</h6>
                   <ul>
                       <li>Bank Name: {{ $data['donationInfo']?->prop('bankName', null) ?? '-' }}</li>
                       <li>Account Name: {{ $data['donationInfo']?->prop('bankAccountName', null) ?? '-' }}</li>
                       <li>Account No: {{ $data['donationInfo']?->prop('bankAccountNo', null) ?? '-' }}</li>
                       <li>Branch: {{ $data['donationInfo']?->prop('bankBranch', null) ?? '-' }}</li>
                   </ul>
               </div>
               <div class="py-3">

{{--                   <ul>--}}
{{--                       <li>Address:</li>--}}
{{--                       <li>Phone:</li>--}}
{{--                   </ul>--}}
               </div>
                <div class="info">
                    Note: Please indicate your purpose of payment (loan or donation) in the payment slip.
                    <span>Thank you.</span>
                </div>
            </div>

        </div>
    </section>



    <!-- ===== Donate Modal==== start-->

    <!-- Donate Modals Start-->
    <div class="donate-modal modal fade" id="DonateModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="text-center pd-top">
                    <h2>Thank You</h2>
                    <h5>Your support keeps us going</h5>
                </div>
                <div class="modal-body">
                    <div class="my-container">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="py-3">
                            <form class="row">
                               <h4>Donation Form</h4>
                                <div class="col-md-6">
                                    <h6>Payment Method</h6>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Bank transfer
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Bkash/Nagad
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h6>Donation Amount</h6>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">$</span>
                                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <input type="text" class="form-control" id="floatingName" placeholder="Full Name">
                                </div>

                                <div class="mb-3 col-md-6">
                                    <input type="email" class="form-control" id="floatingEmail" placeholder="name@example.com">
                                </div>

                                <div class="mb-3 col-md-6">
                                    <select id="inputState" class="form-select">
                                        <option selected>Country</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <input type="text" class="form-control" id="phoneNumber" placeholder="Phone number*">
                                </div>

                                <div class="mb-3 col-md-12">
                                    <input type="text" class="form-control" id="message" placeholder="Your message">
                                </div>

                                <div class="mb-3 col-12">
                                    <button type="submit" class="btn btn-02 rounded-0">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Donate Modal End-->
@endsection
