@extends('layouts.app')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Transaction Details</h4>
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
                                    <h4 class="my-4 fw-semibold text-dark font-16">Transaction Report - {{$transaction->id}}</h4>
                                    <button type="button" class="btn btn-primary btn-square">Download Report</button>
                                </div>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-12">
                                <div>
                                    
                                </div>
                            </div>
                            @if($address_verification->addressVerificationDetail->guarantor != null)
                            <div class="col-12">
                                <div class="accordion" id="guarantorInformation">
                                    <div class="accordion-item border-0">
                                        <h5 class="accordion-header m-0" id="headingOneTwo">
                                            <button class="accordion-button fw-semibold font-16" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneTwo" aria-expanded="true" aria-controls="collapseOneTwo">
                                                Guarantor's information
                                            </button>
                                        </h5>
                                        <div id="collapseOneTwo" class="accordion-collapse" aria-labelledby="headingOneTwo" data-bs-parent="#guarantorInformation" style="">
                                            <div class="accordion-body">
                                                <div class="row">
                                                    <div class="col-lg-4 align-self-center py-4 mb-3 mb-lg-0">
                                                        <div class="dastone-profile-main">
                                                            <div class="dastone-profile-main-pic">
                                                                <img src="{{$address_verification->addresVerificationDetail->guarantor['photo']}}" alt="" height="110" class="rounded-circle">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row border-bottom mb-5">

                                                    <div class="col-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">First Name : </div>
                                                        <div class="fw-normal font-15 col-8">{{$address_verification->addresVerificationDetail->guarantor['firstName']}}</div>
                                                    </div>
                                                    <div class="col-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Last Name : </div>
                                                        <div class="fw-normal font-15 col-8">{{$address_verification->addresVerificationDetail->guarantor['lastName']}}</div>
                                                    </div>
                                                    <div class="col-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Phone : </div>
                                                        <div class="fw-normal font-15 col-8">{{$address_verificationaddresVerificationDetail->guarantor['mobile']}}</div>
                                                    </div>
                                                    @if($address_verification->addresVerificationDetail->guarantor['email'] != null)
                                                    <div class="col-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">email : </div>
                                                        <div class="fw-normal font-15 col-8">{{$address_verification->addresVerificationDetail->guarantor['email']}}</div>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($address_verification->addressVerificationDetail->guarantor != null)
                            <div class="col-12">
                                <div class="accordion" id="businessInformation">
                                    <div class="accordion-item border-0">
                                        <h5 class="accordion-header m-0" id="headingOneThree">
                                            <button class="accordion-button fw-semibold font-16" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneThree" aria-expanded="true" aria-controls="collapseOneThree">
                                                Business information
                                            </button>
                                        </h5>
                                        <div id="collapseOneThree" class="accordion-collapse" aria-labelledby="headingOneThree" data-bs-parent="#businessInformation" style="">
                                            <div class="accordion-body">
                                                <div class="row border-bottom mb-5">
                                                    <div class="col-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Name : </div>
                                                        <div class="fw-normal font-15 col-8">{{$address_verification->addresVerificationDetail->business['name']}}</div>
                                                    </div>
                                                    <div class="col-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Last Name : </div>
                                                        <div class="fw-normal font-15 col-8">{{$address_verification->addresVerificationDetail->business['email']}}</div>
                                                    </div>
                                                    <div class="col-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Phone : </div>
                                                        <div class="fw-normal font-15 col-8">{{$address_verificationaddresVerificationDetail->business['mobile']}}</div>
                                                    </div>
                                                    <div class="col-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Registration Number : </div>
                                                        <div class="fw-normal font-15 col-8">{{$address_verification->addresVerificationDetail->business['registrationNumber']}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
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
                                                    <div class="col-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Flat Number : </div>
                                                        <div class="fw-normal font-15 col-8">{{$address_verification->addressVerificationDetail->address['flatNumber']}}</div>
                                                    </div>
                                                    @endif
                                                    @if($address_verification->addressVerificationDetail->address['buildingName'])
                                                    <div class="col-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Building Name : </div>
                                                        <div class="fw-normal font-15 col-8">{{$address_verification->addressVerificationDetail->address['buildingName']}}</div>
                                                    </div>
                                                    @endif

                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Building Number : </div>
                                                        <div class="fw-normal font-15 col-8">{{$address_verification->addressVerificationDetail->address['buildingNumber']}}</div>
                                                    </div>

                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Street : </div>
                                                        <div class="fw-normal font-15 col-8">{{$address_verification->addressVerificationDetail->address['street']}}</div>
                                                    </div>
                                                    @if($address_verification->addressVerificationDetail->address['subStreet'] != null)
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Sub-Street : </div>
                                                        <div class="fw-normal font-15 col-8">{{$address_verification->addressVerificationDetail->address['subStreet']}}</div>
                                                    </div>
                                                    @endif

                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">State : </div>
                                                        <div class="fw-normal font-15 col-8">{{$address_verification->addressVerificationDetail->address['state']}}</div>
                                                    </div>
                                                    @if($address_verification->addressVerificationDetail->address['city'] != null)
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">City : </div>
                                                        <div class="fw-normal font-15 col-8">{{$address_verification->addressVerificationDetail->address['city']}}</div>
                                                    </div>
                                                    @endif
                                                    @if($address_verification->addressVerificationDetail->address['lga'] != null)
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">LGA : </div>
                                                        <div class="fw-normal font-15 col-8">{{$address_verification->addressVerificationDetail->address['lga']}}</div>
                                                    </div>
                                                    @endif
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Country : </div>
                                                        <div class="fw-normal font-15 col-8">{{$address_verification->addressVerificationDetail->address['country']}}</div>
                                                    </div>
                                                    <div class="col-12 py-4 border-top pb-3">
                                                        <div class="fw-semibold m-0 font-15 mb-2">Address Location : </div>
                                                        <div class="w-100 overflow-hidden rounded"><iframe src="{{$address_verification->addressverificationDetail->map_address_url}}" width="100%" height="275" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
                                                    </div>
                                                    <div class="col-6 d-block col-sm-3 col-xl-3 d-sm-flex">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted">Longitude : </div>
                                                        <div class="fw-normal font-15">{{$address_verification->addressVerificationDetail->address['latlong']['lon']}}</div>
                                                    </div>
                                                    <div class="col-6 d-block col-sm-3 col-xl-3 d-sm-flex">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted">Latitude : </div>
                                                        <div class="fw-normal font-15">{{$address_verification->addressVerificationDetail->address['latlong']['lat']}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($address_verification->addressVerificationDetail->status != 'pending' || $address_verification->addressVerificationDetail->status != 'canceled' || $address_verification->addressVerificationDetail->status != 'awaiting_reschedule')
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
                                                    @empty($address_verification->addressVerificationDetail->images)
                                                    <div class="col-12 text-center py-3">No Images Available</div>
                                                    @else
                                                    @foreach($address_verification->addressVerificationDetail->images as $image)
                                                    <div class="mr-2" style="width: 8rem; height: 8rem;">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#imageView{{$loop->iteration}}">
                                                            <img src="{{$image['filePath']}}" alt="" class="img-fluid rounded">
                                                        </a>
                                                    </div>
                                                    @endforeach
                                                    @endempty
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(!empty($address_verification->addressVerificationDetail->images))
                            @foreach($address_verification->addressVerificationDetail->images as $image)
                            <div class="modal fade" id="imageView{{$loop->iteration}}" tabindex="-1" aria-labelledby="imageView{{$loop->iteration}}" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content" style="background:none">
                                        <div class="modal-header border-0" style="background:none">
                                            <h6 class="modal-title m-0" id="imageView"></h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <!--end modal-header-->
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-12 text-center align-self-center">
                                                    <img src="{{$image['filePath']}}" alt="" class="img-fluid" width="{{$image['width']}}" height="{{$image['height']}}">
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

                            @if($address_verification->addressVerificationDetail->status != 'pending' || $address_verification->addressVerificationDetail->status != 'canceled' || $address_verification->addressVerificationDetail->status != 'awaiting_reschedule')
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
                                                    @empty($address_verification->addressVerificationDetail->notes)
                                                    <div class="col-12 text-center py-3">No Notes Available</div>
                                                    @else
                                                    @foreach($address_verification->addressVerificationDetail->notes as $note)
                                                    <div class="col-12 py-2">
                                                        <div class="media">
                                                            <div class="me-3 align-self-center">
                                                                <i class="far fa-sticky-note font-20"></i>
                                                            </div>
                                                            <div class="media-body align-self-center">
                                                                <h6 class="m-0 font-15">{{$note['note']}} </h6>
                                                                <p class="mb-0 text-muted font-13">{{$note['createdAt']}}</p>
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
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Building has Gate : </div>
                                                        <div class="fw-normal font-15 col-8">{{$address_verification->addressVerificationDetail->gate_present == true ? 'Yes' : 'No'}}</div>
                                                    </div>
                                                    @if($address_verification->addressVerificationDetail->gate_present == true)
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Color of Gate : </div>
                                                        <div class="fw-normal font-15 col-8">{{$address_verification->addressVerificationDetail->gate_color}}</div>
                                                    </div>
                                                    @endif
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Building Type : </div>
                                                        <div class="fw-normal font-15 col-8">{{$address_verification->addressVerificationDetail->building_type}}</div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Building Color : </div>
                                                        <div class="fw-normal font-15 col-8">{{$address_verification->addressVerificationDetail->building_color}}</div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Closest Landmark : </div>
                                                        <div class="fw-normal font-15 col-8">{{$address_verification->addressVerificationDetail->closest_landmark}}</div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Availability Confirmed By : </div>
                                                        <div class="fw-normal font-15 col-8">{{$address_verification->addressVerificationDetail->availability_confirmed_by}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($address_verification->addressVerificationDetail->status != 'pending' || $address_verification->addressVerificationDetail->status != 'canceled' || $address_verification->addressVerificationDetail->status != 'awaiting_reschedule')
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
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Additional Info : </div>
                                                        <div class="fw-normal font-15 col-8">{{$address_verification->addressVerificationDetail->additional_info}}</div>
                                                    </div>
                                                    @elseif($address_verification->addressVerificationDetail->incident_report != null)
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Incident Report : </div>
                                                        <div class="fw-normal font-15 col-8">{{$address_verification->addressVerificationDetail->incident_report}}</div>
                                                    </div>
                                                    @elseif($address_verification->addressVerificationDetail->reasons != null)
                                                    <div class="col-xs-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Reason for Incompletion : </div>
                                                        <div class="fw-normal font-15 col-8">{{$address_verification->addressVerificationDetail->reasons}}</div>
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
                                                                <img src="{{$address_verification->addressVerificationDetail->agent['photo']}}" alt="" height="110" class="rounded-circle">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row border-bottom mb-5">
                                                    <div class="col-12 col-md-6 d-flex py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3 text-muted col-4">Agent's Name : </div>
                                                        <div class="fw-normal font-15 col-8">{{$address_verification->addressVerificationDetail->agent['firstName']}} {{$address_verification->addressVerificationDetail->agent['lastName']}}</div>
                                                    </div>
                                                    <div class="col-12 col-md-12 d-block py-4 border-top">
                                                        <div class="fw-semibold m-0 font-15 me-3">Signature : </div>
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