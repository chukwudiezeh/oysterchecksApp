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
                                <div class="my-4 d-flex justify-content-between align-items-center">
                                    <h4 class="fw-semibold text-dark font-16">Transaction Report - {{$transaction->id}}</h4>
                                    <button type="button" class="btn btn-primary btn-square">Download Report</button>
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
                                    <div class="col-12 col-md-6 d-flex py-4 px-4 border-bottom">
                                        <div class="m-0 font-14 me-3 text-muted col-4 col-md-5">Transaction Reference:</div>
                                        <div class="font-14 col-8 col-md-7">{{$transaction->ref}}</div>
                                    </div>
                                    <div class="col-12 col-md-6 d-flex py-4 px-4 border-bottom gap-3">
                                        <div class="m-0 font-14 text-muted col-4 col-md-5">Status:</div>
                                        <div class="font-14 col-8 col-md-7">
                                        @if($transaction->status == 'processing')
                                        <span class="badge badge-soft-purple"> {{ucwords($transaction->status)}}</span>
                                        @elseif($transaction->status == 'successful')
                                        <span class="badge badge-soft-success"> {{ucwords($transaction->status)}}</span>
                                        @elseif($transaction->status == 'reversed')
                                        <span class="badge badge-soft-dark"> {{ucwords($transaction->status)}}</span>
                                        @elseif($transaction->status == 'failed')
                                        <span class="badge badge-soft-danger"> {{ucwords($transaction->status)}}</span>
                                        @elseif($transaction->status == 'declined')
                                        <span class="badge badge-soft-warning"> {{ucwords($transaction->status)}}</span>
                                        @else
                                        <span class="badge badge-soft-secondary"> {{ucwords($transaction->status)}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 d-flex py-4 px-4 border-bottom gap-3">
                                    <div class="m-0 font-14 text-muted col-4 col-md-5">Payment Method:</div>
                                    <div class="font-14 col-8 col-md-7">{{ucwords($transaction->payment_method)}}</div>
                                </div>
                                    <div class="col-12 col-md-6 d-flex py-4 px-4 border-bottom gap-3">
                                        <div class="m-0 font-14 text-muted col-4 col-md-5">Transaction Type:</div>
                                        <div class="font-14 col-8 col-md-7">@if($transaction->type == 'credit')
                                        <span class="badge badge-soft-success rounded-circle me-2 px-1 py-1 fw-bold">
                                            <i class="mdi mdi-arrow-up font-10"></i>
                                        </span>
                                        @else
                                        <span class="btn btn-soft-success btn-icon-circle btn-icon-circle-sm mr-2">
                                            <i class="mdi mdi-arrow-down font-16"></i>
                                        </span> 
                                        @endif
                                        {{ucwords($transaction->type)}}</div>
                                    </div>
                                    <div class="col-12 col-md-6 d-flex py-4 px-4 border-bottom gap-3">
                                        <div class="m-0 font-14 text-muted col-4 col-md-5">Paid at:</div>
                                        <div class="font-14 col-8 col-md-7">{{date('jS F Y, h:iA', strtotime($transaction->created_at))}}</div>
                                    </div>
                                    <div class="col-12 col-md-6 d-flex py-4 px-4 border-bottom gap-3">
                                        <div class="m-0 font-14 text-muted col-4 col-md-5">Purpose:</div>
                                        <div class="font-14 col-8 col-md-7">{{ucfirst($transaction->purpose)}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mt-5">
                            <div class="col-12">
                                <div class="py-3 px-4 bg-light">
                                    <h2 class="font-16 m-0 lh-base">Payment Breakdown</h2>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 col-md-6 d-flex py-4 px-4 border-bottom gap-3">
                                        <div class="m-0 font-14 text-muted col-4 col-md-5">Value Added Tax (%):</div>
                                        <div class="font-14 col-8 col-md-7">7.5%</div>
                                    </div>
                                    <div class="col-12 col-md-6 d-flex py-4 px-4 border-bottom gap-3">
                                        <div class="m-0 font-14 text-muted col-4 col-md-5">Amount (&#x20A6;):</div>
                                        <div class="font-14 col-8 col-md-7">{{moneyFormat($transaction->amount,'NG')}}</div>
                                    </div>
                                    <div class="col-12 col-md-6 d-flex py-4 px-4 border-bottom gap-3">
                                        <div class="m-0 font-14 text-muted col-4 col-md-5">Value Added Tax (&#x20A6;):</div>
                                        <div class="font-14 col-8 col-md-7">{{moneyFormat($transaction->tax,'NG')}}</div>
                                    </div>
                                    <div class="col-12 col-md-6 d-flex py-4 px-4 border-bottom gap-3">
                                        <div class="m-0 font-14 text-muted col-4 col-md-5">Total Amount Payable (&#x20A6;):</div>
                                        <div class="font-14 col-8 col-md-7">{{moneyFormat($transaction->total_amount_payable,'NG')}}</div>
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