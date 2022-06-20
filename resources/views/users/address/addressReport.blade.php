@extends('layouts.app')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Adddress verification Report</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"></li>
                            </ol>
                        </div>
                        <!--end col-->
                        <div class="col-auto align-self-center">
                            <a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                                <span class="ay-name" id="Day_Name">Today:</span>&nbsp;
                                <span class="" id="Select_date">Jan 11</span>
                                <i data-feather="calendar" class="align-self-center icon-xs ms-1"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-outline-primary">
                                <i data-feather="download" class="align-self-center icon-xs"></i>
                            </a>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url()->previous() }}">
                            <i class="fa fa-arrow-left me-2 font-15"></i>
                            <span class="card-title">Back</span>
                        </a>
                    </div>
                    <!--end card-header-->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="my-4 fw-semibold text-dark font-16">Address Report - </h4>
                                    <button type="button" class="btn btn-primary btn-square">Download Report</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success border-0" role="alert">
                                    <strong>Well done!</strong> You successfully read this important alert message.
                                </div>
                            </div>
                        </div>
                        <div class="row pb-4">
                            <div class="col-12">
                                <div class="pt-2 px-2 mb-2"><span class="text-muted mr-2">Verification Id :</span> <b>629099ef334f1</b></div>

                            </div>
                            <div class="col-md-4">

                                <div class="mt-2 mb-2 px-2"><span class="text-muted mr-2">Verification Id :</span> <b>629099ef334f1</b></div>

                            </div>
                            <div class="col-md-4">

                                <div class="mt-2 mb-2 px-2"><span class="text-muted mr-2">Verification Id :</span> <b>629099ef334f1</b></div>


                            </div>
                            <div class="col-md-4">

                                <div class="mt-2 mb-2 px-2"><span class="text-muted mr-2">Verification Id :</span> <b>629099ef334f1</b></div>

                            </div>
                            <div class="col-md-4">
                                <div class="mt-2 mb-2 px-2"><span class="text-muted mr-2">Verification Id :</span> <b>629099ef334f1</b></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="accordion" id="personalInformation">
                                    <div class="accordion-item border-0">
                                        <h5 class="accordion-header m-0" id="headingOne">
                                            <button class="accordion-button fw-semibold font-16" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Personal Information
                                            </button>
                                        </h5>
                                        <div id="collapseOne" class="accordion-collapse" aria-labelledby="headingOne" data-bs-parent="#personalInformation" style="">
                                            <div class="accordion-body">
                                                <div class="row">
                                                    <div class="col-lg-4 align-self-center py-4 mb-3 mb-lg-0">
                                                        <div class="dastone-profile-main">
                                                            <div class="dastone-profile-main-pic">
                                                                <img src="{{asset('assets/images/users/user-4.jpg')}}" alt="" height="110" class="rounded-circle">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row border-bottom mb-5">

                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">Start : </div>
                                                        <div class="text-muted fw-normal font-15">15 Nov 2020</div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">Start : </div>
                                                        <div class="text-muted fw-normal font-15">15 Nov 2020</div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">Start : </div>
                                                        <div class="text-muted fw-normal font-15">15 Nov 2020</div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">Start : </div>
                                                        <div class="text-muted fw-normal font-15">15 Nov 2020</div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="accordion" id="addressDetails">
                                    <div class="accordion-item border-0">
                                        <h5 class="accordion-header m-0" id="headingTwo">
                                            <button class="accordion-button fw-semibold font-16" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                Address
                                            </button>
                                        </h5>
                                        <div id="collapseTwo" class="accordion-collapse" aria-labelledby="headingTwo" data-bs-parent="#addressDetails" style="">
                                            <div class="accordion-body pt-0">
                                                <div class="row mb-5">

                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">Start : </div>
                                                        <div class="text-muted fw-normal font-15">15 Nov 2020</div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">Start : </div>
                                                        <div class="text-muted fw-normal font-15">15 Nov 2020</div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">Start : </div>
                                                        <div class="text-muted fw-normal font-15">15 Nov 2020</div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">Start : </div>
                                                        <div class="text-muted fw-normal font-15">15 Nov 2020</div>
                                                    </div>
                                                    <div class="col-12 py-4 border-top pb-2">
                                                        <div class="fw-semibold m-0 font-15 mb-2">Address Location: </div>
                                                        <div class="w-100 overflow-hidden rounded"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253634.71658876745!2d3.140677243885328!3d6.641651376251026!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b90c7cc74c0b7%3A0x4dd12fb3e45324d5!2sAgege!5e0!3m2!1sen!2sng!4v1655352665310!5m2!1sen!2sng" width="100%" height="275" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
                                                    </div>
                                                    <div class="col-6 d-block col-sm-3 col-xl-2 d-sm-flex">
                                                        <div class="fw-semibold m-0 font-15 me-3">Start : </div>
                                                        <div class="text-muted fw-normal font-15">15 Nov 2020</div>
                                                    </div>
                                                    <div class="col-6 d-block col-sm-3 col-xl-2 d-sm-flex">
                                                        <div class="fw-semibold m-0 font-15 me-3">Start : </div>
                                                        <div class="text-muted fw-normal font-15">15 Nov 2020</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="accordion" id="images">
                                    <div class="accordion-item border-0">
                                        <h5 class="accordion-header m-0" id="headingThree">
                                            <button class="accordion-button fw-semibold font-15" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                                Images
                                            </button>
                                        </h5>
                                        <div id="collapseThree" class="accordion-collapse" aria-labelledby="headingThree" data-bs-parent="#images" style="">
                                            <div class="accordion-body">
                                                <div class="row mb-5">
                                                    <div class="mr-2" style="width: 8rem; height: 8rem; ">
                                                        <img src="assets/images/small/img-1.jpg" alt="" class="img-fluid rounded">
                                                    </div>
                                                    <div class="mr-2" style="width: 8rem; height: 8rem; ">
                                                        <img src="assets/images/small/img-1.jpg" alt="" class="img-fluid rounded">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="accordion" id="notes">
                                    <div class="accordion-item border-0">
                                        <h5 class="accordion-header m-0" id="headingFour">
                                            <button class="accordion-button fw-semibold font-15" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                                Notes
                                            </button>
                                        </h5>
                                        <div id="collapseFour" class="accordion-collapse" aria-labelledby="headingFour" data-bs-parent="#notes" style="">
                                            <div class="accordion-body">
                                                <div class="row mb-5">
                                                    <div class="col-12 py-4">
                                                        <div class="media">
                                                            <div class="me-3 align-self-center">
                                                                <i class="far fa-sticky-note font-20"></i>
                                                            </div>
                                                            <!-- <img src="assets/images/small/rgb.svg" height="30" class="me-3 align-self-center rounded" alt="..."> -->
                                                            <div class="media-body align-self-center">
                                                                <h6 class="m-0 font-15">Dastone - Admin Dashboard Dastone - Admin Dashboard Dastone - Admin Dashboard Dastone - Admin Dashboard Dastone - Admin Dashboard </h6>
                                                                <p class="mb-0 text-muted font-13">June 31, 2022</p>
                                                            </div>
                                                            <!--end media body-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="accordion" id="description">
                                    <div class="accordion-item border-0">
                                        <h5 class="accordion-header m-0" id="headingFive">
                                            <button class="accordion-button fw-semibold font-15" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                                Additional Information
                                            </button>
                                        </h5>
                                        <div id="collapseFive" class="accordion-collapse" aria-labelledby="headingFive" data-bs-parent="#notes" style="">
                                            <div class="accordion-body pt-0">
                                                <div class="row mb-5">

                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">Start : </div>
                                                        <div class="text-muted fw-normal font-15">15 Nov 2020</div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">Start : </div>
                                                        <div class="text-muted fw-normal font-15">15 Nov 2020</div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">Start : </div>
                                                        <div class="text-muted fw-normal font-15">15 Nov 2020</div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">Start : </div>
                                                        <div class="text-muted fw-normal font-15">15 Nov 2020</div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="accordion" id="agentDetails">
                                    <div class="accordion-item border-0">
                                        <h5 class="accordion-header m-0" id="headingSix">
                                            <button class="accordion-button fw-semibold font-15" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                                                Agent Details
                                            </button>
                                        </h5>
                                        <div id="collapseSix" class="accordion-collapse" aria-labelledby="headingSix" data-bs-parent="#agentDetails" style="">
                                            <div class="accordion-body pt-0">
                                            <div class="row">
                                                    <div class="col-lg-4 align-self-center py-4 mb-3 mb-lg-0">
                                                        <div class="dastone-profile-main">
                                                            <div class="dastone-profile-main-pic">
                                                                <img src="{{asset('assets/images/users/user-4.jpg')}}" alt="" height="110" class="rounded-circle">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row border-bottom mb-5">

                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">Start : </div>
                                                        <div class="text-muted fw-normal font-15">15 Nov 2020</div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">Start : </div>
                                                        <div class="text-muted fw-normal font-15">15 Nov 2020</div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">Start : </div>
                                                        <div class="text-muted fw-normal font-15">15 Nov 2020</div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">Start : </div>
                                                        <div class="text-muted fw-normal font-15">15 Nov 2020</div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        @endsection
        @section('script')
        <script>

        </script>

        @endsection