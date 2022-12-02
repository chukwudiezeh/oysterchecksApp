@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="{{asset('plugins/jquery-steps/jquery.steps.css')}}">
@endsection
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Profile Settings</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Manage your account</li>
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
                    <div class="card-body p-0">
                        <div id="user_map" class="pro-map" style="height: 220px"></div>
                    </div>
                    <!--end card-body-->
                    <div class="card-body">
                        <div class="dastone-profile">
                            <div class="row">
                                <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                                    <div class="dastone-profile-main">
                                        <div class="dastone-profile-pic">
                                            @if(auth()->user()->image == null)
                                            <div style="display: flex;width:128px;height:128px;background-color:rgba(59, 130, 246, 0.5);vertical-align:middle;align-items:center;justify-content:center;overflow:hidden" class="rounded-circle">
                                                <div class="fw-semibold text-white" style="font-size: 36px;font-weight:700">{{strtoupper(substr(auth()->user()->firstname,0,1))}}</div>
                                            </div>
                                            @else
                                            <img src="{{asset('assets/images/placeholder.png')}}" alt="" height="110" class="rounded-circle">
                                            <!-- <img src="{{auth()->user()->image}}" alt="logo-large" class="rounded-circle thumb-xs">  -->
                                            @endif
                                            <span class="dastone-profile_main-pic-change">
                                                <i class="fas fa-camera"></i>
                                            </span>
                                        </div>
                                        <div class="dastone-profile_user-detail">
                                            <h5 class="dastone-user-name">{{ucwords($user->firstname).' '. ucwords($user->lastname)}}</h5>
                                            <p class="mb-0 dastone-user-name-post">{{ucwords($user->client->company_name)}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-lg-4 ms-auto align-self-center">
                                    <ul class="list-unstyled personal-detail mb-0">
                                        <li class=""><i class="ti ti-mobile me-2 text-secondary font-16 align-middle"></i> <b> phone </b> : {{$user->phone}}</li>
                                        <li class="mt-2"><i class="ti ti-email text-secondary font-16 align-middle me-2"></i> <b> Email </b> : {{$user->email}}</li>
                                        <li class="mt-2"><i class="ti ti-briefcase text-secondary font-16 align-middle me-2"></i> <b> Business </b> : {{ucwords($user->client->company_name)}}</li>
                                    </ul>

                                </div>
                                <!--end col-->
                                <div class="col-lg-4 align-self-center">
                                    <ul class="list-unstyled personal-detail mb-0">
                                        <li class=""><i class="ti ti-medall me-2 text-secondary font-16 align-middle"></i> <b> Role </b> : {{$user->user_type == 2? 'Super Admin' : ''}}</li>
                                        <li class="mt-2"><i class="ti ti-pencil-alt text-secondary font-16 align-middle me-2"></i> <b> Date Registered </b> : {{date('jS F Y, h:iA', strtotime($user->created_at))}}</li>
                                        <!-- <li class="mt-2"><i class="ti ti-briefcase text-secondary font-16 align-middle me-2"></i> <b>  </b> : {{ucwords($user->client->company_name)}}</li> -->
                                    </ul>
                                    <!--end list -->
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end f_profile-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
        <div class="pb-4">
            <ul class="nav-border nav nav-pills mb-0" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="profile_tab" data-bs-toggle="pill" href="#profile">Profile Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="business_tab" data-bs-toggle="pill" href="#business">Business Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="business_activation_tab" data-bs-toggle="pill" href="#business_activation">Business Activation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="team_tab" data-bs-toggle="pill" href="#team">Team Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="account_settings_tab" data-bs-toggle="pill" href="#account_settings">Account Settings</a>
                </li>
            </ul>
        </div>
        <!--end card-body-->
        <div class="row">
            <div class="col-12">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active " id="profile" role="tabpanel" aria-labelledby="profile_tab">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Personal Information</h4>
                                    </div>
                                    <div class="card-body ">
                                        <form>
                                            <div class="row">
                                                <div class="col-12 col-md-6 col-lg-4 mb-3">
                                                    <label class="form-label form-label-lg" for="firstName">First Name</label>
                                                    <input type="text" class="form-control form-control-lg @error('firstName') is-invalid @enderror" id="firstName" name="firstName" placeholder="Enter First Name" value="{{$user->firstname}}">
                                                    @error('firstName')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-4 mb-3">
                                                    <label class="form-label form-label-lg" for="lastName">Last Name</label>
                                                    <input type="text" class="form-control form-control-lg @error('lastName') is-invalid @enderror" id="lastName" name="lastName" placeholder="Enter Last Name" value="{{$user->lastname}}">
                                                    @error('lastName')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-4 mb-3">
                                                    <label class="form-label form-label-lg" for="email">Email</label>
                                                    <input type="text" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter Email" value="{{$user->email}}">
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-4 mb-3">
                                                    <label class="form-label form-label-lg" for="phone">Phone</label>
                                                    <input type="text" class="form-control form-control-lg @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Enter Phone" value="{{$user->phone}}">
                                                    @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="my-3">
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                                <!-- <button type="button" class="btn btn-danger">Cancel</button> -->
                                            </div>
                                        </form>
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Change Password</h4>
                                    </div>
                                    <div class="card-body ">
                                        <form>
                                            <div class="row">
                                                <div class="col-12 col-md-6 col-lg-4 mb-3">
                                                    <label class="form-label form-label-lg" for="currentPassword">Current Password <span class="text-red ms-1">*</span></label>
                                                    <input type="text" class="form-control form-control-lg @error('currentPassword') is-invalid @enderror" id="currentPassword" name="currentPassword" placeholder="Enter Current Password" value="">
                                                    @error('currentPassword')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-4 mb-3">
                                                    <label class="form-label form-label-lg" for="newPassword">New Password</label>
                                                    <input type="text" class="form-control form-control-lg @error('newPassword') is-invalid @enderror" id="newPassword" name="newPassword" placeholder="Enter Last Name" value="">
                                                    @error('newPassword')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-4 mb-3">
                                                    <label class="form-label form-label-lg" for="newPasswordConfirmation">Confirm New Password</label>
                                                    <input type="text" class="form-control form-control-lg @error('newPasswordConfirmation') is-invalid @enderror" id="newPasswordConfirmation" name="newPasswordConfirmation" placeholder="Confirm New Password" value="">
                                                    @error('newPasswordConfirmation')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                            </div>

                                            <div class="my-3">
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                                <!-- <button type="button" class="btn btn-danger">Cancel</button> -->
                                            </div>
                                        </form>
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Activities</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="datatable-buttons" class="table table-striped table-hover dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th class="px-2 py-3">S/N</th>
                                                        <th class="px-2 py-3">Initiator</th>
                                                        <th class="px-2 py-3">Activity</th>
                                                        <th class="px-2 py-3">IP Address</th>
                                                        <th class="px-2 py-3">Device</th>
                                                        <th class="px-2 py-3">Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="px-0 py-0">
                                                            <a class="table-link" href="">
                                                                <div class="px-2 py-3">sgfewg</div>
                                                            </a>
                                                        </td>
                                                        <td class="px-0 py-0">
                                                            <a class="table-link" href="">
                                                                <div class="px-2 py-3">dshgf</div>
                                                            </a>
                                                        </td>
                                                        <td class="px-0 py-0">
                                                            <a class="table-link" href="">
                                                                <div class="px-2 py-3">dfggh</div>
                                                            </a>
                                                        </td>
                                                        <td class="px-0 py-0">
                                                            <a class="table-link" href="">
                                                                <div class="px-2 py-3">dfggh</div>
                                                            </a>
                                                        </td>
                                                        <td class="px-0 py-0">
                                                            <a class="table-link" href="">
                                                                <div class="px-2 py-3">dfggh</div>
                                                            </a>
                                                        </td>

                                                        <td class="px-0 py-0">
                                                            <a class="table-link" href="">
                                                                <div class="px-2 py-3">
                                                                    <a href="">View Details</a>
                                                                </div>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-0 py-0">
                                                            <a class="table-link" href="">
                                                                <div class="px-2 py-3">1234</div>
                                                            </a>
                                                        </td>
                                                        <td class="px-0 py-0">
                                                            <a class="table-link" href="">
                                                                <div class="px-2 py-3">dshgf</div>
                                                            </a>
                                                        </td>
                                                        <td class="px-0 py-0">
                                                            <a class="table-link" href="">
                                                                <div class="px-2 py-3">dfggh</div>
                                                            </a>
                                                        </td>
                                                        <td class="px-0 py-0">
                                                            <a class="table-link" href="">
                                                                <div class="px-2 py-3">dfggh</div>
                                                            </a>
                                                        </td>
                                                        <td class="px-0 py-0">
                                                            <a class="table-link" href="">
                                                                <div class="px-2 py-3">dfggh</div>
                                                            </a>
                                                        </td>

                                                        <td class="px-0 py-0">
                                                            <a class="table-link" href="">
                                                                <div class="px-2 py-3">
                                                                    <a href="">View Details</a>
                                                                </div>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end tab-pane-->
                    <div class="tab-pane fade " id="business" role="tabpanel" aria-labelledby="business_tab">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Business Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 d-flex py-4 px-4 border-bottom">
                                                <div class="m-0 font-14 me-3 text-muted col-2">Country:</div>
                                                <div class="font-14 col-8">$bvn_verification->country</div>
                                            </div>
                                            <div class="col-12 d-flex py-4 px-4 border-bottom">
                                                <div class="m-0 font-14 me-3 text-muted col-2">Country:</div>
                                                <div class="font-14 col-8">$bvn_verification->country</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                    <div class="tab-pane fade " id="business_activation" role="tabpanel" aria-labelledby="business_activation_tab">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Activate Your Business</h4>
                                    </div>
                                    <div class="card-body">
                                    <form id="form-vertical" class="form-horizontal form-wizard-wrapper">                                        
                                        <h3>Create Account</h3>
                                        <fieldset>                                                                                         
                                            <div class="form-group ">
                                                <label for="example-email-input1" class="col-form-label">Email</label>
                                                <div class="">
                                                    <input class="form-control" type="email" value="" id="example-email-input1" placeholder="@Example.com">
                                                </div>
                                            </div><!--end form-group--> 
                                            <div class="form-group ">
                                                <label for="example-password-input1" class="col-form-label">Password</label>
                                                <div class="">
                                                    <input class="form-control" type="password" id="example-password-input1" placeholder="Password">                                                       
                                                </div>                                                    
                                            </div><!--end form-group--> 
                                            <div class="form-group ">
                                                <label for="example-password-input01" class="col-form-label">Confirm Password</label>
                                                <div class="">
                                                    <input class="form-control" type="password" id="example-password-input01" placeholder="Confirm Password">                                                       
                                                </div>                                                    
                                            </div><!--end form-group--> 
                                            
                                            <div class="custom-control custom-checkbox my-3">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">I accept the terms and conditions</label>
                                            </div>                                                                               
                                        </fieldset><!--end fieldset--> 

                                        <h3>Basic Form</h3>
                                        <fieldset>
                                            <div class="form-group row">
                                                <div class="col-sm-12 col-lg-6">
                                                    <input class="form-control" type="text" id="name" placeholder="Name">                                                       
                                                </div> 
                                                <div class="col-sm-12 col-lg-6">
                                                    <input class="form-control" type="email" id="example-email-input3" placeholder="Email">
                                                </div>                                                   
                                            </div><!--end form-group--> 
                                            
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input class="form-control" type="text" id="subject2" placeholder="Subject">                                                       
                                                </div>                                                    
                                            </div><!--end form-group--> 
                                            <div class="form-group">
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Your message"></textarea>
                                            </div><!--end form-group-->  
                                            <div class="form-check  ms-1">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check  ms-1">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Female
                                                </label>
                                            </div>
                                        </fieldset><!--end fieldset--> 
                                        <h3>Confurm Detail</h3>
                                        <fieldset>
                                            <p>I agree with the Terms and Conditions.</p>
                                        </fieldset><!--end fieldset-->                                   
                                    </form><!--end form-->
                                    </div>
                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <div class="tab-pane fade" id="team" role="tabpanel" aria-labelledby="team_tab">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="ribbon4 rib4-primary">
                                            <span class="ribbon4-band ribbon4-band-primary text-white text-center">50% off</span>
                                        </div>
                                        <!--end ribbon-->
                                        <div class="row">
                                            <div class="col-auto">
                                                <img src="assets/images/dashboards/dastyle.jpg" alt="user" height="150" class="align-self-center mb-3 mb-lg-0">
                                            </div>
                                            <!--end col-->
                                            <div class="col align-self-center">
                                                <p class="font-18 fw-semibold mb-2">Dastyle - Admin & Dashboard Template</p>
                                                <p class="text-muted">Dastyle is a Bootstrap 4 admin dashboard,
                                                    It is fully responsive and included awesome
                                                    features to help build web applications fast and easy.
                                                </p>
                                                <a href="#" class="btn btn-soft-primary btn-sm">Live Priview</a>
                                                <a href="#" class="btn btn-soft-primary btn-sm">Download Now</a>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-auto">
                                                <img src="assets/images/dashboards/metrica.jpg" alt="user" height="150" class="align-self-center mb-3 mb-lg-0">
                                            </div>
                                            <!--end col-->
                                            <div class="col align-self-center">
                                                <p class="font-18 fw-semibold mb-2">Metrica - Admin & Dashboard Template</p>
                                                <p class="text-muted">Metrica is a Bootstrap 4 admin dashboard,
                                                    It is fully responsive and included awesome
                                                    features to help build web applications fast and easy.
                                                </p>
                                                <a href="#" class="btn btn-soft-primary btn-sm">Live Priview</a>
                                                <a href="#" class="btn btn-soft-primary btn-sm">Download Now</a>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-auto">
                                                <img src="assets/images/dashboards/crovex.jpg" alt="user" height="150" class="align-self-center mb-3 mb-lg-0">
                                            </div>
                                            <!--end col-->
                                            <div class="col align-self-center">
                                                <p class="font-18 fw-semibold mb-2">Crovex - Admin & Dashboard Template</p>
                                                <p class="text-muted">Crovex is a Bootstrap 4 admin dashboard,
                                                    It is fully responsive and included awesome
                                                    features to help build web applications fast and easy.
                                                </p>
                                                <a href="#" class="btn btn-soft-primary btn-sm">Live Priview</a>
                                                <a href="#" class="btn btn-soft-primary btn-sm">Download Now</a>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-auto">
                                                <img src="assets/images/dashboards/frogetor.jpg" alt="user" height="150" class="align-self-center mb-3 mb-lg-0">
                                            </div>
                                            <!--end col-->
                                            <div class="col align-self-center">
                                                <p class="font-18 fw-semibold mb-2">Frogetor - Admin & Dashboard Template</p>
                                                <p class="text-muted">Frogetor is a Bootstrap 4 admin dashboard,
                                                    It is fully responsive and included awesome
                                                    features to help build web applications fast and easy.
                                                </p>
                                                <a href="#" class="btn btn-soft-primary btn-sm">Live Priview</a>
                                                <a href="#" class="btn btn-soft-primary btn-sm">Download Now</a>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-auto">
                                                <img src="assets/images/dashboards/metrica.jpg" alt="user" height="150" class="align-self-center mb-3 mb-lg-0">
                                            </div>
                                            <!--end col-->
                                            <div class="col align-self-center">
                                                <p class="font-18 fw-semibold mb-2">Metrica - Admin & Dashboard Template</p>
                                                <p class="text-muted">Metrica is a Bootstrap 4 admin dashboard,
                                                    It is fully responsive and included awesome
                                                    features to help build web applications fast and easy.
                                                </p>
                                                <a href="#" class="btn btn-soft-primary btn-sm">Live Priview</a>
                                                <a href="#" class="btn btn-soft-primary btn-sm">Download Now</a>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-auto">
                                                <img src="assets/images/dashboards/dastyle.jpg" alt="user" height="150" class="align-self-center mb-3 mb-lg-0">
                                            </div>
                                            <!--end col-->
                                            <div class="col align-self-center">
                                                <p class="font-18 fw-semibold mb-2">Dastyle - Admin & Dashboard Template</p>
                                                <p class="text-muted">Dastyle is a Bootstrap 4 admin dashboard,
                                                    It is fully responsive and included awesome
                                                    features to help build web applications fast and easy.
                                                </p>
                                                <a href="#" class="btn btn-soft-primary btn-sm">Live Priview</a>
                                                <a href="#" class="btn btn-soft-primary btn-sm">Download Now</a>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-auto">
                                                <img src="assets/images/dashboards/frogetor.jpg" alt="user" height="150" class="align-self-center mb-3 mb-lg-0">
                                            </div>
                                            <!--end col-->
                                            <div class="col align-self-center">
                                                <p class="font-18 fw-semibold mb-2">Frogetor - Admin & Dashboard Template</p>
                                                <p class="text-muted">Frogetor is a Bootstrap 4 admin dashboard,
                                                    It is fully responsive and included awesome
                                                    features to help build web applications fast and easy.
                                                </p>
                                                <a href="#" class="btn btn-soft-primary btn-sm">Live Priview</a>
                                                <a href="#" class="btn btn-soft-primary btn-sm">Download Now</a>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-auto">
                                                <img src="assets/images/dashboards/crovex.jpg" alt="user" height="150" class="align-self-center mb-3 mb-lg-0">
                                            </div>
                                            <!--end col-->
                                            <div class="col align-self-center">
                                                <p class="font-18 fw-semibold mb-2">Crovex - Admin & Dashboard Template</p>
                                                <p class="text-muted">Crovex is a Bootstrap 4 admin dashboard,
                                                    It is fully responsive and included awesome
                                                    features to help build web applications fast and easy.
                                                </p>
                                                <a href="#" class="btn btn-soft-primary btn-sm">Live Priview</a>
                                                <a href="#" class="btn btn-soft-primary btn-sm">Download Now</a>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <div class="tab-pane fade" id="account_settings" role="tabpanel" aria-labelledby="account_settings_tab">
                        <div class="row">
                            <div class="col-lg-6 col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h4 class="card-title">Personal Information</h4>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end card-header-->
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center">First Name</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <input class="form-control" type="text" value="Rosa">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center">Last Name</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <input class="form-control" type="text" value="Dodson">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center">Company Name</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <input class="form-control" type="text" value="MannatThemes">
                                                <span class="form-text text-muted font-12">We'll never share your email with anyone else.</span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center">Contact Phone</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="las la-phone"></i></span>
                                                    <input type="text" class="form-control" value="+123456789" placeholder="Phone" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center">Email Address</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="las la-at"></i></span>
                                                    <input type="text" class="form-control" value="rosa.dodson@demo.com" placeholder="Email" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center">Website Link</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="la la-globe"></i></span>
                                                    <input type="text" class="form-control" value=" https://mannatthemes.com/" placeholder="Email" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center">USA</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <select class="form-select">
                                                    <option>London</option>
                                                    <option>India</option>
                                                    <option>USA</option>
                                                    <option>Canada</option>
                                                    <option>Thailand</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-9 col-xl-8 offset-lg-3">
                                                <button type="submit" class="btn btn-sm btn-outline-primary">Submit</button>
                                                <button type="button" class="btn btn-sm btn-outline-danger">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-6 col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Change Password</h4>
                                    </div>
                                    <!--end card-header-->
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center">Current Password</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <input class="form-control" type="password" placeholder="Password">
                                                <a href="#" class="text-primary font-12">Forgot password ?</a>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center">New Password</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <input class="form-control" type="password" placeholder="New Password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center">Confirm Password</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <input class="form-control" type="password" placeholder="Re-Password">
                                                <span class="form-text text-muted font-12">Never share your password.</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-9 col-xl-8 offset-lg-3">
                                                <button type="submit" class="btn btn-sm btn-outline-primary">Change Password</button>
                                                <button type="button" class="btn btn-sm btn-outline-danger">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Other Settings</h4>
                                    </div>
                                    <!--end card-header-->
                                    <div class="card-body">

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="Email_Notifications" checked>
                                            <label class="form-check-label" for="Email_Notifications">
                                                Email Notifications
                                            </label>
                                            <span class="form-text text-muted font-12 mt-0">Do you need them?</span>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="API_Access">
                                            <label class="form-check-label" for="API_Access">
                                                API Access
                                            </label>
                                            <span class="form-text text-muted font-12 mt-0">Enable/Disable access</span>
                                        </div>
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div> <!-- end col -->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end tab-pane-->
                </div>
                <!--end tab-content-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    @endsection

    @section('script')
    <script src="{{asset('plugins\jquery-steps\jquery.steps.min.js')}}"></script>
    <script src="{{asset('assets\pages\jquery.form-wizard.init.js')}}"></script>
    @endsection