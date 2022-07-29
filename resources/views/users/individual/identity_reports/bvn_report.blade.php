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
                    <div class="card-header" id="hasChar">
                        <a href="{{ url()->previous() }}">
                            <i class="fa fa-arrow-left me-2 font-15"></i>
                            <span class="card-title">Back</span>
                        </a>
                    </div>
                    <!--end card-header-->
                    <div class="card-body" id="pdfContent">
                        <div class="row">
                            <div class="col-4 mb-4 ms-auto me-auto">
                                <img src="{{asset('/assets/images/logo.png')}}" style="width:100%" alt="Oysterchecks Logo" class="logo-light">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                @if($bvn_verification->status == 'pending')
                                <div class="alert custom-alert alert-purple icon-custom-alert shadow-sm fade show d-flex justify-content-between" role="alert">
                                    <div class="media">
                                        <i class="mdi mdi-clock-outline alert-icon text-purple align-self-center font-30 me-3"></i>
                                        <div class="media-body align-self-center">
                                            <h5 class="mb-1 fw-bold mt-0">Pending</h5>
                                            <span>A verification request haven't been made.</span>
                                        </div>
                                    </div>
                                </div>
                                @elseif($bvn_verification->status == 'found')
                                    @if(isset($bvn_verification->validations) && $bvn_verification->validations->validationMessages != "")
                                    <div class="alert custom-alert alert-warning icon-custom-alert shadow-sm fade show d-flex justify-content-between" role="alert">
                                        <div class="media">
                                            <i class="mdi mdi-shield-off-outline alert-icon text-warning align-self-center font-30 me-3"></i>
                                            <div class="media-body align-self-center">
                                                <h5 class="mb-1 fw-bold mt-0 text-warning">BVN Found and Not Verifi</h5>
                                                <span>Your Address verification request have been completed and marked not verified. Candidate does not live here or address does not exist or is not accessible.</span>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                <div class="alert custom-alert alert-success icon-custom-alert shadow-sm fade show d-flex justify-content-between" role="alert">
                                    <div class="media">
                                        <i class="mdi mdi-shield-check-outline alert-icon text-success align-self-center font-30 me-3"></i>
                                        <div class="media-body align-self-center">
                                            <h5 class="mb-1 fw-bold mt-0 text-success">BVN Found and Validated</h5>
                                            <span>Your verification request has been completed and validated.</span>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @else
                                <div class="alert custom-alert alert-danger icon-custom-alert shadow-sm fade show d-flex justify-content-between" role="alert">
                                    <div class="media">
                                        <i class="far fa-times-circle alert-icon text-danger align-self-center font-30 me-3"></i>
                                        <div class="media-body align-self-center">
                                            <h5 class="mb-1 fw-bold mt-0 text-danger">BVN Not Found</h5>
                                            <span>You provided an invalid BVN</span>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="my-4 d-flex justify-content-between align-items-center">
                                    <h4 class="fw-semibold text-dark font-16">Identity(BVN) Report - {{$bvn_verification->id}}</h4>
                                    <div>
                                        <a id="printBtn" class="btn btn-primary btn-square">Print</a>
                                        <a id="downloadBtn" class="btn btn-primary btn-square">Download Report</a>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="py-3 px-4 bg-light">
                                    <h2 class="font-16 m-0 lh-base">Transaction Details</h2>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 col-md-4 d-flex py-4 px-4 border-bottom">
                                        <div class="m-0 font-14 me-3 text-muted col-4">Verification ID:</div>
                                        <div class="font-14 col-8 text-break">{{$bvn_verification->ref}}</div>
                                    </div>
                                    <div class="col-12 col-md-4 d-flex py-4 px-4 border-bottom">
                                        <div class="m-0 font-14 me-3 text-muted col-4">Initiated At:</div>
                                        <div class="font-14 col-8">{{date('jS F Y, h:iA', strtotime($bvn_verification->requested_at))}}</div>
                                    </div>
                                    <div class="col-12 col-md-4 d-flex py-4 px-4 border-bottom">
                                        <div class="m-0 font-14 me-3 text-muted col-4">Initiated By:</div>
                                        <div class="font-14 col-8">{{auth()->user()->name}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-12">
                                <div class="py-3 px-4 bg-light">
                                    <h2 class="font-16 m-0 lh-base">Verification Details</h2>
                                </div>
                            </div>
                        @if($bvn_verification->status == 'found')
                            <div class="col-12">
                                <div class="row  border-bottom">
                                    <div class="col-6 col-lg-4 align-self-center py-4 mb-3 mb-lg-0 {{isset($bvn_verification->validations->selfie)? 'me-5': ''}}">
                                        <div class="dastone-profile-main">
                                            <div class="dastone-profile-main-pic">
                                                <img src="{{$bvn_verification->image}}" alt="" height="110" class="rounded-circle">
                                            </div>
                                        </div>
                                        <div class="py-2">Image from Source</div>
                                    </div>

                                    <div class="col-6 col-lg-4 align-self-center py-4 mb-3 mb-lg-0">
                                        <div class="dastone-profile-main">
                                            <div class="dastone-profile-main-pic">
                                                <img src="{{$bvn_verification->image}}" alt="" height="110" class="rounded-circle">
                                            </div>
                                        </div>
                                        <div class="py-2">Image Provided</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 col-md-6 d-flex py-4 px-4 border-bottom">
                                        <div class="m-0 font-14 me-3 text-muted col-4">First Name:</div>
                                        <div class="font-14 col-8">
                                            {{$bvn_verification->first_name}}
                                            @if(isset($bvn_verification->validations->data->firstName))
                                            @if($bvn_verification->validations->data->firstName->validated == true)
                                            <span class="ms-2 badge bg-success">Verified</span>
                                            @else
                                            <span class="ms-2 font-12 text-info" style="text-decoration: line-through;">{{$bvn_verification->validations->data->firstName->value}}</span>
                                            <span class="ms-3 badge bg-danger">Not Verified</span>
                                            @endif
                                            @endif
                                        </div>
                                    </div>
                                    @if($bvn_verification->middle_name != null)
                                    <div class="col-12 col-md-6 d-flex py-4 px-4 border-bottom">
                                        <div class="m-0 font-14 me-3 text-muted col-4">Middle Name:</div>
                                        <div class="font-14 col-8">{{$bvn_verification->middle_name}}</div>
                                    </div>
                                    @endif
                                    <div class="col-12 col-md-6 d-flex py-4 px-4 border-bottom">
                                        <div class="m-0 font-14 me-3 text-muted col-4">Last Name:</div>
                                        <div class="font-14 col-8">
                                            {{$bvn_verification->last_name}}
                                            @if(isset($bvn_verification->validations->data->lastName))
                                            @if($bvn_verification->validations->data->lastName->validated == true)
                                            <span class="ms-2 badge bg-success">Verified</span>
                                            @else
                                            <span class="ms-2 font-12 text-info" style="text-decoration: line-through;">{{$bvn_verification->validations->data->lastName->value}}</span>
                                            <span class="ms-3 badge bg-danger">Not Verified</span>
                                            @endif
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 d-flex py-4 px-4 border-bottom">
                                        <div class="m-0 font-14 me-3 text-muted col-4">Phone Number:</div>
                                        <div class="font-14 col-8">{{$bvn_verification->phone}}</div>
                                    </div>
                                    @if($bvn_verification->gender != null)
                                    <div class="col-12 col-md-6 d-flex py-4 px-4 border-bottom">
                                        <div class="m-0 font-14 me-3 text-muted col-4">Gender:</div>
                                        <div class="font-14 col-8">{{$bvn_verification->gender}}</div>
                                    </div>
                                    @endif
                                    <div class="col-12 col-md-6 d-flex py-4 px-4 border-bottom">
                                        <div class="m-0 font-14 me-3 text-muted col-4">Date of Birth:</div>
                                        <div class="font-14 col-8">
                                            {{date('jS F Y', strtotime($bvn_verification->dob))}}
                                            @if(isset($bvn_verification->validations->data->dateOfBirth))
                                            @if($bvn_verification->validations->data->dateOfBirth->validated == true)
                                            <span class="ms-2 badge bg-success">Verified</span>
                                            @else
                                            <span class="ms-2 font-12 text-info" style="text-decoration: line-through;">{{$bvn_verification->validations->data->dateOfBirth->value}}</span>
                                            <span class="ms-3 badge bg-danger">Not Verified</span>
                                            @endif
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 d-flex py-4 px-4 border-bottom">
                                        <div class="m-0 font-14 me-3 text-muted col-4">BVN:</div>
                                        <div class="font-14 col-8">{{$bvn_verification->pin}}</div>
                                    </div>
                                    @if($bvn_verification->enrollment_institution != null)
                                    <div class="col-12 col-md-6 d-flex py-4 px-4 border-bottom">
                                        <div class="m-0 font-14 me-3 text-muted col-4">Enrollment Institution:</div>
                                        <div class="font-14 col-8">{{$bvn_verification->enrollment_institution}}</div>
                                    </div>
                                    @endif
                                    @if($bvn_verification->enrollment_branch != null)
                                    <div class="col-12 col-md-6 d-flex py-4 px-4 border-bottom">
                                        <div class="m-0 font-14 me-3 text-muted col-4">Enrollment Branch:</div>
                                        <div class="font-14 col-8">{{$bvn_verification->enrollment_branch}}</div>
                                    </div>
                                    @endif

                                    <div class="col-12 col-md-6 d-flex py-4 px-4 border-bottom">
                                        <div class="m-0 font-14 me-3 text-muted col-4">Country:</div>
                                        <div class="font-14 col-8">{{$bvn_verification->country}}</div>
                                    </div>
                                </div>
                            </div>
                            @if($bvn_verification->selfie_validation == true)
                            <div class="col-12 mt-5">
                                <div class="py-3 px-4 bg-light">
                                    <h2 class="font-16 m-0 lh-base">Image Validation</h2>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 col-md-6 d-flex py-4 px-4 border-bottom">
                                        <div class="m-0 font-14 me-3 text-muted col-4">Confidence Level:</div>
                                        <div class="font-14 col-8">{{$bvn_verification->validations->selfie->selfieVerification->confidenceLevel}}%</div>
                                    </div>
                                    <div class="col-12 col-md-6 d-flex py-4 px-4 border-bottom">
                                        <div class="m-0 font-14 me-3 text-muted col-4">Threshold Level:</div>
                                        <div class="font-14 col-8">{{$bvn_verification->validations->selfie->selfieVerification->threshold}}%</div>
                                    </div>
                                    <div class="col-12 col-md-6 d-flex py-4 px-4 border-bottom">
                                        <div class="m-0 font-14 me-3 text-muted col-4">Match:</div>
                                        <div class="font-14 col-8">{{$bvn_verification->validations->selfie->selfieVerification->match == true ? Yes : No}}</div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if($bvn_verification->data_validation == true || $bvn_verification->selfie_validation == true)
                            @if($bvn_verification->validations->validationMessages != "")
                            <div class="col-12 mt-5">
                                <div class="py-3 px-4 bg-light">
                                    <h2 class="font-16 m-0 lh-base">Validation Messages</h2>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="alert custom-alert alert-warning icon-custom-alert shadow-sm fade show d-flex justify-content-between" role="alert">
                                    <div class="media">
                                        <i class="mdi mdi-shield-off-outline alert-icon text-warning align-self-center font-30 me-3"></i>
                                        <div class="media-body align-self-center">
                                            <h5 class="mb-1 fw-bold mt-0 text-warning">{{$bvn_verification->validations->validationMessages}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endif

                        @elseif($bvn_verification->status == 'not_found')

                        @else

                        @endif
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        @endsection
        @section('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{asset('/assets/js/poppins64/Poppins-Bold-bold.js')}}"></script>
        <script src="{{asset('/assets/js/poppins64/fa-solid-900-bold.js')}}"></script>

        <script>
            window.jsPDF = window.jspdf.jsPDF;
            window.html2canvas = html2canvas;
            let downloadBtn = document.getElementById('downloadBtn');
            downloadBtn.addEventListener("click", createPdf);

            let printBtn = document.getElementById('printBtn');
            printBtn.addEventListener("click", printPage);

            function createPdf() {
                html2canvas(document.getElementById('pdfContent')).then(canvas => {
                    let source = $('#pdfContent')[0];
                    const doc = new jsPDF({
                        unit: "pt",
                        orientation: 'portrait'
                    });

                    let margins = {
                        top: 30,
                        bottom: 30,
                        left: 50,
                        width: 500
                    }

                    let specialElementHandlers = {
                        '#hasCharr': function(element, renderer) {
                            return true;
                        }
                    };

                    doc.setFont('Poppins-Bold', 'bold');
                    doc.html(source, {
                        x: margins.left,
                        y: margins.top,
                        width: margins.width,
                        windowWidth: 600,
                        elementHandlers: specialElementHandlers,
                        callback: function() {
                            doc.save("another.pdf", margins)
                        }
                    });
                });
            }

            function printPage() {
                window.print();
                // setTimeout(() => {
                //     window.close();
                // }, 10000);
            }
        </script>

        @endsection