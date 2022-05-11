<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8" />
         <title>{{ config('app.name', 'Oysterchecks') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Oysterchecks Comprehensive and Exceptional background checks, KYC & AML compliance Solutions</" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{secure_asset('/assets/images/favicon.png')}}">
    <!-- Page Title  -->
    <title>Login | Oysterchecks</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{secure_asset('/assets/assets/css/dashlite.css?ver=2.2.0')}}">
    <link id="skin-default" rel="stylesheet" href="{{secure_asset('/assets/assets/css/theme.css?ver=2.2.0')}}">
</head>

<body class="nk-body npc-default pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-split nk-split-page nk-split-md">
                        <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white">
                            <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                                <a href="#" class="toggle btn-white btn btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
                            </div>
                            <div class="nk-block nk-block-middle nk-auth-body">
                                <div class="brand-logo pb-5">
                                    <a href="html/index.html" class="logo-link">
                                        <img class="logo-light logo-img logo-img-lg" width="150px" src="{{secure_asset('/assets/images/logo.png')}}" srcset="{{secure_asset('/assets/images/logo.png')}} 2x" alt="logo">
                                        <img class="logo-dark logo-img logo-img-lg" width="150px" src="{{secure_asset('/assets/images/logo.png')}}" srcset="{{secure_asset('/assets/images/logo.png')}} 2x" alt="logo-dark">
                                    </a>  
                                </div>
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Sign-In</h5>
                                        <div class="nk-block-des">
                                            <p>Access Oysterchecks  using your email and password.</p>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                               <!-- Session Status -->
  

        <!-- Validation Errors -->
        <form method="POST" action="{{ route('login') }}">
            @csrf
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Email or Username</label>
                                        </div>
                                        <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="default-01" placeholder="Enter your email address or username">

                                         @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <small><strong>{{ $message }}</strong>  </small>
                                    </span>
                                         @enderror

                                    </div><!-- .foem-group -->
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Password</label>
                                            <a class="link link-primary link-sm" tabindex="-1" href="#">Forgot Password?</a>
                                        </div>
                                        <div class="form-control-wrap">
                                            <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input   type="password"  name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" placeholder="Enter your passcode">
                                             @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="">{{ $message }}</strong>
                                    </span>
                                @enderror
                                        </div>
                                    </div><!-- .foem-group -->
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block">Sign in</button>
                                    </div>
                                </form><!-- form -->
                                <div class="form-note-s2 pt-4"> Need an Account? <a href="{{route('contact-us')}}">Contact Support</a>
                                </div>
                            </div><!-- .nk-block -->
                            <div class="nk-block nk-auth-footer">
                                <div class="nk-block-between">
                                    <ul class="nav nav-sm">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Terms & Condition</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Privacy Policy</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Help</a>
                                        </li>
                                        <li class="nav-item dropup">
                                            <a class="dropdown-toggle dropdown-indicator has-indicator nav-link" data-toggle="dropdown" data-offset="0,10"><small>English</small></a>
                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                <ul class="language-list">
                                                    <li>
                                                        <a href="#" class="language-item">
                                                            <img src="./images/flags/english.png" alt="" class="language-flag">
                                                            <span class="language-name">English</span>
                                                        </a>
                                                    </li>
                                                   
                                                </ul>
                                            </div>
                                        </li>
                                    </ul><!-- .nav -->
                                </div>
                                <div class="mt-3">
                                    <p>&copy; Oysterchecks {{Date('Y')}}. All Rights Reserved.</p>
                                </div>
                            </div><!-- .nk-block -->
                        </div><!-- .nk-split-content -->
                        <div class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right" data-content="athPromo" data-toggle-screen="lg" data-toggle-overlay="true">
                            <div class="slider-wrap w-100 w-max-550px p-3 p-sm-5 m-auto">
                                <div class="slider-init" data-slick='{"dots":true, "arrows":false}'>
                                    <div class="slider-item">
                                        <div class="nk-feature nk-feature-center">
                                            <div class="nk-feature-img">
                                                <img class="round" src="{{secure_asset('/landing_assets/img/landing1.png')}}" srcset="{{secure_asset('/landing_assets/img/landing1.png')}} 2x" alt="">
                                            </div>
                                            <div class="nk-feature-content py-1 p-sm-3">
                                                <h4>Comprehensive Background Checks</h4>
                                                <p>Tired Of Poor And Shallow Background Checks?
                                              Relax and get to enjoy comprehensive background checks from us. Oysterchecks is dedicated in 
                                              conducting extensive background checks which are
                                               essential in the recruitment process. </p>
                                            </div>
                                        </div>
                                    </div><!-- .slider-item -->
                                    <div class="slider-item">
                                        <div class="nk-feature nk-feature-center">
                                            <div class="nk-feature-img">
                                                <img class="round" src="{{secure_asset('/landing_assets/img/landing2.png')}}" srcset="{{secure_asset('/landing_assets/img/landing2.png')}} 2x" alt="">
                                            </div>
                                            <div class="nk-feature-content py-2 p-sm-3">
                                                <h4>Had Enough Of Inconsistent KYC Check Results?</h4>
                                                <p>Oysterchecks addresses these shortcomings by performing KYC checks on people, ID documents and companies in a more effective way. .</p>
                                            </div>
                                        </div>
                                    </div><!-- .slider-item -->
                                    <!-- .slider-item -->
                                </div><!-- .slider-init -->
                                <div class="slider-dots"></div>
                                <div class="slider-arrows"></div>
                            </div><!-- .slider-wrap -->
                        </div><!-- .nk-split-content -->
                    </div><!-- .nk-split -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{secure_asset('/assets/assets/js/bundle.js?ver=2.2.0')}}"></script>
    <script src="{{secure_asset('/assets/assets/js/scripts.js?ver=2.2.0')}}"></script>

</html>