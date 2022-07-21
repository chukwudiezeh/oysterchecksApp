@extends('layouts.app')
 @section('content')
 <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="page-title">{{strtoupper($slug['slug'])}} Verification</h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"></li>
                                        </ol>
                                    </div><!--end col-->
                                    <div class="col-auto align-self-center">
                                        <a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                                            <span class="ay-name" id="Day_Name">Today:</span>&nbsp;
                                            <span class="" id="Select_date">Jan 11</span>
                                            <i data-feather="calendar" class="align-self-center icon-xs ms-1"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-outline-primary">
                                            <i data-feather="download" class="align-self-center icon-xs"></i>
                                        </a>
                                    </div><!--end col-->  
                                </div><!--end row-->                                                              
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>
                    <div class="row ">
                        <div class="col-lg-12">
                            <div class="row justify-content-center">
                                <div class="col-md-6 col-lg-4">
                                    <div class="card report-card ">
                                        <div class="card-body" style="background:rgb(36, 16, 82)">
                                            <div class="row d-flex justify-content-center">
                                                <div class="col">
                                                    <p class="mb-0 fw-semibold text-white">Successful {{$slug['slug']}} verifications</p>
                                                    <h3 class="m-0 text-white">{{count($success)}}</h3>
                                                </div>
                                                <div class="col-auto align-self-center">
                                                    <div class="report-main-icon bg-light-alt">
                                                        <i data-feather="users" class="align-self-center text-muted icon-sm"></i>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--end card-body--> 
                                    </div><!--end card--> 
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="card report-card">
                                        <div class="card-body" style="background:rgb(36, 16, 82)">
                                            <div class="row d-flex justify-content-center">
                                                <div class="col">
                                                    <p class="text-white mb-0 fw-semibold">Failed {{$slug['slug']}}  verifications</p>
                                                    <h3 class="m-0 text-white">{{count($failed)}}</h3>
                                                </div>
                                                <div class="col-auto align-self-center">
                                                    <div class="report-main-icon bg-light-alt">
                                                        <i data-feather="users" class="align-self-center text-muted icon-sm"></i>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--end card-body--> 
                                    </div><!--end card--> 
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
                                        </div><!--end card-body--> 
                                    </div><!--end card--> 
                              </div> <!--end col--> 
                              
                              <!--end col-->                               
                            </div><!--end row-->                
                        </div>
        </div>
        
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{$slug->slug}} Verification log
                        
                         </h4>
                         <form method="post" action="{{route('IdentitySort',$slug->slug)}}">
                        @csrf
                        <span style="float:right; top:-10px">   <li class="nav-item dropdown " style="list-style:none">
                                <a class="nav-link dropdown-toggle card-title" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Sort Data <i class="la la-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><button type="submit" name="sort" value="success" class="dropdown-item"> Sort By Successful</button></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><button type="submit"  name="sort"  value="failed" class="dropdown-item" >Sort By Failed</button></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><button type="submit"  name="sort"  value="pending" class="dropdown-item" href="#">Sort By Pending</button></li>
                                </ul>
                            </li>
                            </span>
                        </form>
                      
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-hover dt-responsive nowrap " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th class="px-2 py-3">S/N</th>
                                    <th class="px-2 py-3">Verification ID</th>
                                    <th class="px-2 py-3">Name</th>
                                    <th class="px-2 py-3">Fee</th>
                                    <th class="px-2 py-3">Status</th>
                                    <th class="px-2 py-3">Verified by</th>
                                    <th class="px-2 py-3">Initiated At</th>
                                     <th class="px-2 py-3">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                          
                            @foreach ($logs as $trans)
                                <tr>
                                    <td class="px-0 py-0"><div class="px-2 py-3">{{$loop->iteration}}</div></td>
                                    <td class="px-0 py-0"><div class="px-2 py-3">{{$trans->service_reference}}</div></td>
                                    <td class="px-0 py-0"><div class="px-2 py-3">{{$trans->user->name}}</div></td>
                                    <td class="px-0 py-0"><div class="px-2 py-3">{{$trans->fee}}</div></td>
                                    <td class="px-0 py-0"><div class="px-2 py-3">@if($trans->status == 'successful') <span class="text-success"> {{$trans->status}}</span> @elseif($trans->status == 'pending')<span class="text-warning"> {{$trans->status}}</span>  @else <span class="text-danger"> {{$trans->status}}</span> @endif  </div></td>
                                    <td class="px-0 py-0"><div class="px-2 py-3">{{$trans->created_at}}</div></td>
                                    <td class="px-0 py-0"><div class="px-2 py-3"> @if($trans->status == 'successful')
                                    <a href="{{route('verify.details', encrypt($trans->id))}}">View Details</a>
                                     @endif
                                    </div></td>
                                   
                                </tr>
                                 @endforeach
                                </tbody>
                            </table>        
                        </div>  
                    </div>
                </div>
            </div> <!-- end col -->
        </div> 
                    
@endsection
