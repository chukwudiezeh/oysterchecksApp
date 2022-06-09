 @extends('layouts.app')
 @section('content')
 <div class="page-content">
     <div class="container-fluid">
         <div class="row">
             <div class="col-sm-12">
                 <div class="page-title-box">
                     <div class="row">
                         <div class="col">
                             <h4 class="page-title">{{$slug->name}}</h4>
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
         <div class="row ">
             <div class="col-lg-12">
                 <div class="row justify-content-center">
                     <div class="col-md-6 col-lg-4">
                         <div class="card report-card ">
                             <div class="card-body" style="background:rgb(36, 16, 82)">
                                 <div class="row d-flex justify-content-center">
                                     <div class="col">
                                         <p class="mb-0 fw-semibold text-white">Successful {{$slug->name}}</p>
                                         <h3 class="m-0 text-white">{{count($success)}}</h3>
                                     </div>
                                     <div class="col-auto align-self-center">
                                         <div class="report-main-icon bg-light-alt">
                                             <i data-feather="users" class="align-self-center text-muted icon-sm"></i>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <!--end card-body-->
                         </div>
                         <!--end card-->
                     </div>
                     <div class="col-md-6 col-lg-4">
                         <div class="card report-card">
                             <div class="card-body" style="background:rgb(36, 16, 82)">
                                 <div class="row d-flex justify-content-center">
                                     <div class="col">
                                         <p class="text-white mb-0 fw-semibold">Failed {{$slug->name}}</p>
                                         <h3 class="m-0 text-white">{{count($failed)}}</h3>
                                     </div>
                                     <div class="col-auto align-self-center">
                                         <div class="report-main-icon bg-light-alt">
                                             <i data-feather="users" class="align-self-center text-muted icon-sm"></i>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <!--end card-body-->
                         </div>
                         <!--end card-->
                     </div>
                     <div class="col-md-6 col-lg-4">
                         <div class="card report-card">
                             <div class="card-body" style="background:rgb(36, 16, 82)">
                                 <div class="row d-flex justify-content-center">
                                     <div class="col">
                                         <p class="text-white mb-0 fw-semibold">Pending Request</p>
                                         <h3 class="m-0 text-white">{{count($pending)}}</h3>
                                     </div>
                                     <div class="col-auto align-self-center">
                                         <div class="report-main-icon bg-light-alt">
                                             <i data-feather="users" class="align-self-center text-muted icon-sm"></i>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <!--end card-body-->
                         </div>
                         <!--end card-->
                     </div>
                     <!--end col-->
                     <!--end col-->
                 </div>
                 <!--end row-->
             </div>
         </div>
<div class="row">
         <div class="col-12">
             <div class="card">
                 <div class="card-header">
                     <h4 class="card-title">{{$slug->name}} log</h4>
                 </div>
                 <!--end card-header-->
                 <div class="card-body">
                     <table id="datatable-buttons" class="table table-striped dt-responsive nowrap " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                         <thead>
                             <tr>
                                 <th>SN</th>
                                 <th>Address Candidate</th>
                                 <th>Verification ID</th>
                                 <th>Status</th>
                                 <th>Initiated by</th>
                                 <th>Fee</th>
                                 <th>Date Requested</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($logs as $transaction)
                             <tr>
                                 <td>{{$loop->iteration}}</td>
                                 <td>{{$transaction->first_name}} {{$transaction->last_name}}</td>
                                 <td>{{$tansaction->addressVerificationDetails->reference_id}}</td>
                                 <td>
                                     @if(isset($tansaction->addressVerificationDetails->status))

                                     @if($transaction->addressVerificationDetails->status == 'pending')
                                     <span class="badge badge-soft-purple">Pending</span>
                                     @elseif($transaction->addressVerificationDetails->status == 'completed' && $transaction->addressVerification->task_status == 'VERIFIED')
                                     <span class="badge badge-soft-success"> {{$transaction->addressVerificationDetails->status}}</span>
                                     @elseif($transaction->addressVerificationDetails->status == 'awaiting_schedule')
                                     <span class="badge badge-soft-dark"> {{$transaction->addressVerificationDetails->status}}</span>
                                     @elseif($transaction->addressVerificationDetails->status == 'completed' && $transaction->addressVerificationDetails->task_status == 'NOT VERIFIED')
                                     <span class="badge badge-soft-warning"> {{$transaction->addressVerificationDetails->status}}</span>
                                     @else <span class="badge badge-soft-danger"> {{$transaction->addressVerificationDetails->status}}</span>
                                     @endif
                                     @else
                                     <span class="badge badge-soft-secondary">No verification Request</span>
                                     @endif
                                 </td>
                                 <td>{{$transaction->user->name}}</td>
                                 <td>{{$transaction->fee}}</td>
                                 <td>{{$transaction->created_at}}</td>

                                 <td>
                                     <div class="dropdown d-inline-block">
                                         <a class="dropdown-toggle arrow-none" id="dLabel11" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                             <i class="las la-ellipsis-v font-20 text-muted"></i>
                                         </a>
                                         <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel11" style="">
                                             <a class="dropdown-item" href="#">Creat Project</a>
                                             <a class="dropdown-item" href="#">Open Project</a>
                                             <a class="dropdown-item" href="#">Tasks Details</a>
                                         </div>
                                     </div>
                                 </td>
                                 <!-- <td> @if($transaction->status == 'successful')
                                     <a href="{{route('verify.details', encrypt($trans->id))}}">View Details</a>
                                     @endif
                                 </td> -->
                             </tr>
                             @endforeach
                             <tr>
                                                <td>#124</td>
                                                <td>Sixta Jones C.</td>
                                                <td>67900078321</td>
                                                <td><span class="badge badge-soft-success">Approved</span></td>
                                                <td>Chukwudi Ezeh</td>
                                                <td>6790</td>
                                                <td>65/34/30034</td>
                                                <td class="text-right">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="dropdown-toggle arrow-none" id="dLabel11" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                                            <i class="fa fa-ellipsis-h font-15 text-muted"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel11" style="">
                                                            <a class="dropdown-item" href="#">Creat Project</a>
                                                            <a class="dropdown-item" href="#">Open Project</a>
                                                            <a class="dropdown-item" href="#">Tasks Details</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#124</td>
                                                <td>Sixta Jones C.</td>
                                                <td>67900078321</td>
                                                <td><span class="badge badge-soft-success">Approved</span></td>
                                                <td>Chukwudi Ezeh</td>
                                                <td>6790</td>
                                                <td>65/34/30034</td>
                                                <td class="text-right">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="dropdown-toggle arrow-none" id="dLabel11" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                                            <i class="las la-ellipsis-v font-20 text-muted"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel11" style="">
                                                            <a class="dropdown-item" href="#">Creat Project</a>
                                                            <a class="dropdown-item" href="#">Open Project</a>
                                                            <a class="dropdown-item" href="#">Tasks Details</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#124</td>
                                                <td>Sixta Jones C.</td>
                                                <td>67900078321</td>
                                                <td><span class="badge badge-soft-success">Approved</span></td>
                                                <td>Chukwudi Ezeh</td>
                                                <td>6790</td>
                                                <td>65/34/30034</td>
                                                <td class="text-right">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="dropdown-toggle arrow-none" id="dLabel11" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                                            <i class="las la-ellipsis-v font-20 text-muted"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel11" style="">
                                                            <a class="dropdown-item" href="#">Creat Project</a>
                                                            <a class="dropdown-item" href="#">Open Project</a>
                                                            <a class="dropdown-item" href="#">Tasks Details</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                         </tbody>
                     </table>
                 </div>
             </div>
         </div> <!-- end col -->
     </div>
     @endsection
     @section('script')
     <script>
         $('#btnsubmit').on('click', function() {
             $('#btnsubmit').html('<span class="spinner-grow text-secondary spinner-grow-sm" role="status" aria-hidden="true"></span>Please Wait....');
             let reference = $('#reference').val();
             let first_name = $('#first_name').val();
             let last_name = $('#last_name').val();
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: "{{route('StoreVerify',$slug->slug)}}",
                 type: 'GET',
                 data: {
                     reference: reference,
                     first_name: reference,
                     last_name: last_name
                 },
                 cache: false,
                 dataType: "json",
                 success: function(response) {
                     // console.log(response.status);
                     if (response.status == 'success') {
                         console.log(response);
                         $('#btnsubmit').html('<span class="" role="status" aria-hidden="true">Verify Candidate</span>');
                         $('#result').html('<span class="btn btn-success" role="status" aria-hidden="true">Verification Completed Successfull</span>');
                         $('#details').attr('hidden', false);
                         window.location.reload();
                     }
                 },
             });
         });
     </script>

     @endsection