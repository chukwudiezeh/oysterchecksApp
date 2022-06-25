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
                                    <h4 class="my-4 fw-semibold text-dark font-16">Address Report - {{$address_verification->addressVerificationDetail->reference_id}}</h4>
                                    <button type="button" class="btn btn-primary btn-square">Download Report</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                @if($address_verification->addressVerificationDetail->status == 'pending')
                                <div class="alert custom-alert alert-purple icon-custom-alert shadow-sm fade show d-flex justify-content-between" role="alert">
                                    <div class="media">
                                        <i class="mdi mdi-clock-outline alert-icon text-purple align-self-center font-30 me-3"></i>
                                        <div class="media-body align-self-center">
                                            <h5 class="mb-1 fw-bold mt-0">Pending</h5>
                                            <span>Your address verification request is yet to be accepted by our agent or is currently in progress.</span>
                                        </div>
                                    </div>
                                </div>
                                @elseif($address_verification->addressVerificationDetail->status == 'completed' && $address_verification->addressVerificationDetail->task_status == 'VERIFIED')
                                <div class="alert custom-alert alert-success icon-custom-alert shadow-sm fade show d-flex justify-content-between" role="alert">
                                    <div class="media">
                                        <i class="mdi mdi-shield-check-outline alert-icon text-success align-self-center font-30 me-3"></i>
                                        <div class="media-body align-self-center">
                                            <h5 class="mb-1 fw-bold mt-0 text-success">Completed and Verified</h5>
                                            <span>Your Address verification request have been completed and confirmed verified.</span>
                                        </div>
                                    </div>
                                </div>
                                @elseif($address_verification->addressVerificationDetail->status == 'awaiting_reschedule')
                                <div class="alert custom-alert alert-info icon-custom-alert shadow-sm fade show d-flex justify-content-between" role="alert">
                                    <div class="media">
                                        <i class="fas fa-hourglass-start alert-icon text-info align-self-center font-30 me-3"></i>
                                        <div class="media-body align-self-center">
                                            <h5 class="mb-1 fw-bold mt-0 text-info">Awaitiing Reschedule</h5>
                                            <span>Your Address verification request is awaiting schedule as agent wasn't able to access the location due to violence in that area.</span>
                                        </div>
                                    </div>
                                </div>
                                @elseif($address_verification->addressVerificationDetail->status == 'completed' && $address_verification->addressVerificationDetail->task_status == 'NOT_VERIFIED')
                                <div class="alert custom-alert alert-warning icon-custom-alert shadow-sm fade show d-flex justify-content-between" role="alert">
                                    <div class="media">
                                        <i class="mdi mdi-shield-off-outline alert-icon text-warning align-self-center font-30 me-3"></i>
                                        <div class="media-body align-self-center">
                                            <h5 class="mb-1 fw-bold mt-0 text-warning">Completed and Not Verified</h5>
                                            <span>Your Address verification request have been completed and marked not verified. Candidate does not live here or address does not exist or is not accessible.</span>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="alert custom-alert alert-danger icon-custom-alert shadow-sm fade show d-flex justify-content-between" role="alert">
                                    <div class="media">
                                        <i class="far fa-times-circle alert-icon text-danger align-self-center font-30 me-3"></i>
                                        <div class="media-body align-self-center">
                                            <h5 class="mb-1 fw-bold mt-0 text-danger">Cancelled</h5>
                                            <span>Your Address verification request have been cancelled due to incomplete or incorrect address details</span>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row pb-4">
                            <div class="col-12">
                                <div class="pt-2 px-2 mb-2 font-15"><span class="text-muted mr-2">Verification Id :</span> <b>{{$address_verification->addressVerificationDetail->reference_id}}</b></div>
                            </div>
                            <div class="col-md-4">
                                <div class="mt-2 mb-2 px-2 font-15"><span class="text-muted mr-2">Verification Type :</span> <b>{{$slug->name}}</b></div>
                            </div>
                            <div class="col-md-4">
                                <div class="mt-2 mb-2 px-2 font-15"><span class="text-muted mr-2">Created At:</span> <b>{{$address_verification->addressVerificationDetail->created_at}}</b></div>
                            </div>
                            @if($address_verification->addressVerificationDetail->accepted_at != null)
                            <div class="col-md-4">
                                <div class="mt-2 mb-2 px-2 font-15"><span class="text-muted mr-2">Accepted At :</span> <b>{{$address_verification->addressVerificationDetail->accepted_at}}</b></div>
                            </div>
                            @endif
                            @if($address_verification->addressVerificationDetail->start_date != null)
                            <div class="col-md-4">
                                <div class="mt-2 mb-2 px-2 font-15"><span class="text-muted mr-2">Start Date :</span> <b>{{$address_verification->addressVerificationDetail->start_date}}</b></div>
                            </div>
                            @endif
                            @if($address_verification->addressVerificationDetail->end_date != null)
                            <div class="col-md-4">
                                <div class="mt-2 mb-2 px-2 font-15"><span class="text-muted mr-2">End Date :</span> <b>{{$address_verification->addressVerificationDetail->end_date}}</b></div>
                            </div>
                            @endif
                            @if($address_verification->addressVerificationDetail->completed_at != null)
                            <div class="col-md-4">
                                <div class="mt-2 mb-2 px-2 font-15"><span class="text-muted mr-2">Completed At :</span> <b>{{$address_verification->addressVerificationDetail->completed_at}}</b></div>
                            </div>
                            @endif
                            @if($address_verification->addressVerificationDetail->submitted_at != null)
                            <div class="col-md-4">
                                <div class="mt-2 mb-2 px-2 font-15"><span class="text-muted mr-2">Submitted At :</span> <b>{{$address_verification->addressVerificationDetail->submitted_at}}</b></div>
                            </div>
                            @endif
                            @if($address_verification->addressVerificationDetail->revalidation_date != null)
                            <div class="col-md-4">
                                <div class="mt-2 mb-2 px-2 font-15"><span class="text-muted mr-2">Revalidated At :</span> <b>{{$address_verification->addressVerificationDetail->revalidation_date}}</b></div>
                            </div>
                            @endif
                            <div class="col-md-4">
                                <div class="mt-2 mb-2 px-2 font-15"><span class="text-muted mr-2">Initiated At :</span> <b>{{Auth()->user()->name}}</b></div>
                            </div>
                            <div class="col-md-4">
                                <div class="mt-2 mb-2 px-2 font-15"><span class="text-muted mr-2">Estimated Turn Around Time :</span> <b>3 days</b></div>
                            </div>
                            <div class="col-12">
                                <div class="mt-2 mb-2 px-2 font-15"><span class="text-muted mr-2">Task Description :</span> <b>{{$address_verification->addressVerificationDetail->description}}</b></div>
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
                                                                <img src="{{asset('assets/candidates/'.$address_verification->image)}}" alt="" height="110" class="rounded-circle">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row border-bottom mb-5">

                                                    <div class="col-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">First Name : </div>
                                                        <div class="text-muted fw-normal font-15">{{$address_verification->first_name}}</div>
                                                    </div>
                                                    @if($address_verification->middle_name != null)
                                                    <div class="col-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">Middle Name : </div>
                                                        <div class="text-muted fw-normal font-15">{{$address_verification->middle_name}}</div>
                                                    </div>
                                                    @endif
                                                    <div class="col-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">Last Name : </div>
                                                        <div class="text-muted fw-normal font-15">{{$address_verification->last_name}}</div>
                                                    </div>
                                                    @if($address_verification->dob != null)
                                                    <div class="col-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">Date of Birth : </div>
                                                        <div class="text-muted fw-normal font-15">{{$address_verification->dob}}</div>
                                                    </div>
                                                    @endif
                                                    <div class="col-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">Phone : </div>
                                                        <div class="text-muted fw-normal font-15">{{$address_verification->phone}}</div>
                                                    </div>
                                                    @if($address_verification->email != null)
                                                    <div class="col-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">email : </div>
                                                        <div class="text-muted fw-normal font-15">{{$address_verification->email}}</div>
                                                    </div>
                                                    @endif
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
                                                    @if($address_verification->addressVerificationDetail->address['flatNumber'] != null)
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">Flat Number : </div>
                                                        <div class="text-muted fw-normal font-15">{{$address_verification->addressVerificationDetail->address['flatNumber']}}</div>
                                                    </div>
                                                    @endif
                                                    @if($address_verification->addressVerificationDetail->address['buildingName'])
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">Building Name : </div>
                                                        <div class="text-muted fw-normal font-15">{{$address_verification->addressVerificationDetail->address['buildingName']}}</div>
                                                    </div>
                                                    @endif

                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">Building Number : </div>
                                                        <div class="text-muted fw-normal font-15">{{$address_verification->addressVerificationDetail->address['buildingNumber']}}</div>
                                                    </div>

                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">Street : </div>
                                                        <div class="text-muted fw-normal font-15">{{$address_verification->addressVerificationDetail->address['street']}}</div>
                                                    </div>
                                                    @if($address_verification->addressVerificationDetail->address['subStreet'] != null)
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">Sub-Street : </div>
                                                        <div class="text-muted fw-normal font-15">{{$address_verification->addressVerificationDetail->address['subStreet']}}</div>
                                                    </div>
                                                    @endif

                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">State : </div>
                                                        <div class="text-muted fw-normal font-15">{{$address_verification->addressVerificationDetail->address['state']}}</div>
                                                    </div>
                                                    @if($address_verification->addressVerificationDetail->address['city'] != null)
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">City : </div>
                                                        <div class="text-muted fw-normal font-15">{{$address_verification->addressVerificationDetail->address['city']}}</div>
                                                    </div>
                                                    @endif
                                                    @if($address_verification->addressVerificationDetail->address['lga'] != null)
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">LGA : </div>
                                                        <div class="text-muted fw-normal font-15">{{$address_verification->addressVerificationDetail->address['lga']}}</div>
                                                    </div>
                                                    @endif
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">Country : </div>
                                                        <div class="text-muted fw-normal font-15">{{$address_verification->addressVerificationDetail->address['country']}}</div>
                                                    </div>
                                                    <div class="col-12 py-4 border-top pb-3">
                                                        <div class="fw-semibold m-0 font-15 mb-2">Address Location : </div>
                                                        <div class="w-100 overflow-hidden rounded"><iframe src="{{$address_verification->addressverificationDetail->map_address_url}}" width="100%" height="275" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
                                                    </div>
                                                    <div class="col-6 d-block col-sm-3 col-xl-2 d-sm-flex">
                                                        <div class="fw-semibold m-0 font-15 me-3">Longitude : </div>
                                                        <div class="text-muted fw-normal font-15">{{$address_verification->addressVerificationDetail->address['latlong']['lon']}}</div>
                                                    </div>
                                                    <div class="col-6 d-block col-sm-3 col-xl-2 d-sm-flex">
                                                        <div class="fw-semibold m-0 font-15 me-3">Latitude : </div>
                                                        <div class="text-muted fw-normal font-15">{{$address_verification->addressVerificationDetail->address['latlong']['lat']}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($address_verification->addressVerificationDetail->status != 'pending' ||  $address_verification->addressVerificationDetail->status != 'canceled' || $address_verification->addressVerificationDetail->status != 'awaiting_reschedule')
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
                                                    @empty($address_verification->addressverificationDetail->images)
                                                    <div class="col-12 text-center py-3">No Images Available</div>
                                                    @else
                                                    @foreach($address_verification->addressverificationDetail->images as $image)
                                                    <div class="mr-2" style="width: 8rem; height: 8rem;">
                                                        <img src="{{$image->filePath}}" data-bs-toggle="modal" data-bs-target="#imageView{{$loop->iteration}}" alt="" class="img-fluid rounded">
                                                    </div>
                                                    @endforeach
                                                    @endempty
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(!$address_verification->addressverificationDetail->images->isEmpty())
                            @foreach($address_verification->addressverificationDetail->images as $image)
                            <div class="modal fade" id="imageView" tabindex="-1" aria-labelledby="imageView{{$loop->iteration}}" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content" style="background:none">
                                        <div class="modal-header" style="background:none">
                                            <h6 class="modal-title m-0" id="imageView"></h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <!--end modal-header-->
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-12 text-center align-self-center">
                                                    <img src="{{$image->filePath}}" alt="" class="img-fluid" width="{{$image->width}}" height="{{$image->height}}">
                                                </div>
                                            </div>
                                            <!--end row-->
                                        </div>
                                        <!--end modal-body-->
                                    </div>
                                    <!--end modal-content-->
                                </div>
                                <!--end modal-dialog-->
                            </div>
                            @endforeach
                            @endif
                            @endif

                            @if($address_verification->addressVerificationDetail->status != 'pending' ||  $address_verification->addressVerificationDetail->status != 'canceled' || $address_verification->addressVerificationDetail->status != 'awaiting_reschedule')
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
                                                    @empty($address_verification->addressverificationDetail->notes)
                                                        <div class="col-12 text-center py-3">No Notes Available</div>
                                                    @else
                                                    @foreach($address_verification->addressverificationDetail->notes as $note)
                                                    <div class="col-12 py-2">
                                                        <div class="media">
                                                            <div class="me-3 align-self-center">
                                                                <i class="far fa-sticky-note font-20"></i>
                                                            </div>
                                                            <div class="media-body align-self-center">
                                                                <h6 class="m-0 font-15">{{$note->note}} </h6>
                                                                <p class="mb-0 text-muted font-13">{{$note->createdAt}}</p>
                                                            </div>
                                                            <!--end media body-->
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    @endempty
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($address_verification->addressVerificationDetail->status != 'pending' || $address_verification->addressVerificationDetail->status != 'canceled' || $address_verification->addressVerificationDetail->status != 'awaiting_reschedule')
                            <div class="col-12">
                                <div class="accordion" id="buildingDescription">
                                    <div class="accordion-item border-0">
                                        <h5 class="accordion-header m-0" id="headingFive">
                                            <button class="accordion-button fw-semibold font-15" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                                Building Description
                                            </button>
                                        </h5>
                                        <div id="collapseFive" class="accordion-collapse" aria-labelledby="headingFive" data-bs-parent="#notes" style="">
                                            <div class="accordion-body pt-0">
                                                <div class="row mb-5">

                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">Building has Gate : </div>
                                                        <div class="text-muted fw-normal font-15">{{$address_verification->addressVerificationDetail->gate_present == true ? 'Yes' : 'No'}}</div>
                                                    </div>
                                                    @if($address_verification->addressVerificationDetail->gate_present == true)
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">Color of Gate : </div>
                                                        <div class="text-muted fw-normal font-15">{{$address_verification->addressVerificationDetail->gate_color}}</div>
                                                    </div>
                                                    @endif
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">Building Type : </div>
                                                        <div class="text-muted fw-normal font-15">{{$address_verification->addressVerificationDetail->building_type}}</div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">Building Color : </div>
                                                        <div class="text-muted fw-normal font-15">{{$address_verification->addressVerificationDetail->building_color}}</div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">Closest Landmark : </div>
                                                        <div class="text-muted fw-normal font-15">{{$address_verification->addressVerificationDetail->closest_landmark}}</div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">Availability Confirmed By : </div>
                                                        <div class="text-muted fw-normal font-15">{{$address_verification->addressVerificationDetail->availability_confirmed_by}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($address_verification->addressVerificationDetail->status != 'pending' ||  $address_verification->addressVerificationDetail->status != 'canceled' || $address_verification->addressVerificationDetail->status != 'awaiting_reschedule')
                            <div class="col-12">
                                <div class="accordion" id="otherInformation">
                                    <div class="accordion-item border-0">
                                        <h5 class="accordion-header m-0" id="headingSix">
                                            <button class="accordion-button fw-semibold font-15" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                                                Other Information
                                            </button>
                                        </h5>
                                        <div id="collapseSix" class="accordion-collapse" aria-labelledby="headingSix" data-bs-parent="#otherInformation" style="">
                                            <div class="accordion-body pt-0">
                                                <div class="row mb-5">
                                                    @if($address_verification->addressVerificationDetail->additional_info != null)
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">Additional Info : </div>
                                                        <div class="text-muted fw-normal font-15">{{$address_verification->addressVerificationDetail->additional_info}}</div>
                                                    </div>
                                                    @elseif($address_verification->addressVerificationDetail->incident_report != null)
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">Incident Report : </div>
                                                        <div class="text-muted fw-normal font-15">{{$address_verification->addressVerificationDetail->incident_report}}</div>
                                                    </div>
                                                    @elseif($address_verification->addressVerificationDetail->reasons != null)
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">Reason for Incompletion : </div>
                                                        <div class="text-muted fw-normal font-15">{{$address_verification->addressVerificationDetail->reasons}}</div>
                                                    </div>
                                                    @else
                                                        <div class="col-12 text-center py-3">No Other Information Available</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($address_verification->addressVerificationDetail->status != 'pending' || $address_verification->addressVerificationDetail->status != 'canceled' || $address_verification->addressVerificationDetail->status != 'awaiting_reschedule')
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
                                                                <img src="{{$address_verification->addressVerificationDetail->agent->photo}}" alt="" height="110" class="rounded-circle">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row border-bottom mb-5">
                                                    <div class="col-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">Agent's Name : </div>
                                                        <div class="text-muted fw-normal font-15">{{$address_verification->addressVerificationDetail->agent['firstName']}} {{$address_verification->addressVerificationDetail->agent['lastName']}}</div>
                                                    </div>
                                                
                                                    <div class="col-12 col-md-12 d-block py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-5">Signature : </div>
                                                        <div class="dastone-profile-main">
                                                            <div class="dastone-profile-main-pic">
                                                                <img src="{{$address_verification->addressVerificationDetail->agent['signature']}}" alt="" height="80" class="rounded">
                                                            </div>
                                                        </div>
                                                
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
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