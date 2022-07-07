@extends('layouts.app')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Wallet Transactions</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">This Page shows an overview of your transactions and allows you manage and fund your wallet.</li>
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
        <!--end row-->
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> My Wallet</h4>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-12 col-lg-4">
                                <div class="card report-card">
                                    <div class="card-body d-lg-block d-sm-flex">
                                        <div class="col">
                                            <h5 class="card-title mb-2">Available Balance</h5>
                                            <h3 class="card-text">{{moneyFormat($balances->prev_balance, 'NG')}}</h3>
                                        </div>
                                        <div class="col mt-lg-4">
                                            <h5 class="card-title mb-2">Book Balance</h5>
                                            <h3 class="card-text">{{moneyFormat($balances->prev_balance, 'NG')}}</h3>
                                        </div>

                                        <div class="col align-self-center mt-lg-4">
                                            <button type="button" class="btn btn-primary btn-lg w-100" data-bs-toggle="modal" data-bs-target="#fundWallet">
                                                Fund Wallet
                                            </button>
                                        </div>
                                        <!-- <a href="#" class="">Fund Wallet</a> -->
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Payment Transactions log</h4>

                    </div>
                    <!--end card-header-->
                    <div class="card-body">
                        <table id="datatable-buttons" class=" orders table table-striped table-bordered dt-responsive nowrap " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Ref</th>
                                    <th>External Ref</th>
                                    <th>Amount</th>
                                    <th>Purpose</th>
                                    <th>Type</th>
                                    <th>Prev Balance</th>
                                    <th>Avail Balance</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $trans )
                                <tr>
                                    <td>{{$trans->id}}</td>
                                    <td>{{$trans->ref}}</td>
                                    <td>{{$trans->external_ref}}</td>
                                    <td>{{moneyFormat($trans->amount, 'NG')}}</td>
                                    <td>{{$trans->purpose}}</td>
                                    @if($trans->type == 'DEBIT') <td class="badge badge-soft-danger">{{$trans->type}}</td> @else <td class="badge badge-soft-success"> {{$trans->type}}</td>@endif
                                    <td>{{moneyFormat($trans->prev_balance, 'NG')}}</td>
                                    <td>{{moneyFormat($trans->avail_balance, 'NG')}}</td>
                                    <td> {{$trans->created_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->


            <div class="modal fade" id="fundWallet" tabindex="-1" aria-labelledby="fundWalletLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-white">
                            <h6 class="modal-title m-0" id="fundWalletLabel" style="color:#303e67">Fund Wallet</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!--end modal-header-->
                        <div class="modal-body">
                            <form method="POST" action="" id="fundWalletForm" class="form-parsley" novalidate>
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <label class="mb-2 font-14" for="customAmount">Add Money to Wallet ({{naira()}})</label>
                                            <input type="number" class="form-control" name="customAmount" id="customAmount" aria-describedby="Add Money to Wallet" placeholder="Enter Amount" required data-parsley-min="5000">
                                            <small id="help" class="form-text text-muted">Wallet can be funded with a minimum of {{naira()}}5,000</small>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-5">
                                            <label class="mb-2 font-14" for="paymentMethod">Payment Method</label>
                                            <div class="col-md-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethod1" value="card" checked required>
                                                    <label class="form-check-label" for="paymentMethod1">Card/Bank Payment</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethod2" value="bank_transfer" required>
                                                    <label class="form-check-label" for="paymentMethod2">Bank Transfer</label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" id="fundWalletSubmitDiv">
                                        <div class="mb-2">
                                            <button type="submit" id="fundWalletSubmit" class="btn btn-primary btn-lg w-100" disabled>
                                                Pay Securely
                                            </button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                        <!--end modal-body-->
                    </div>
                    <!--end modal-content-->
                </div>
                <!--end modal-dialog-->
            </div>
            <div class="modal fade" id="instructionsModal" tabindex="-1" aria-labelledby="instructionsModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-white">
                            <h6 class="modal-title m-0" id="instructionsModalLabel" style="color:#303e67"></h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="instructionsModalBody">
                        </div>
                        <div class="modal-footer gap-5 justify-content-center">
                            <button type="button" id="proceedModal" class="btn btn-soft-primary btn-sm"></button>
                            <button type="submit" class="btn btn-soft-danger btn-sm" id="cancelModal"></button>
                        </div>
                        <!--end modal-footer-->
                    </div>
                </div>
            </div>

        </div><!-- container -->

        @endsection
        @section('script')
        <script src="{{asset('plugins/parsleyjs/parsley.min.js')}}"></script>
        <script src="{{asset('assets/pages/jquery.validation.init.js')}}"></script>
        @endsection