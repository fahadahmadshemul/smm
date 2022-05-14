@extends('layouts.frontend_layout')
@section('title')
    Login
@endsection
@section('content')
    <!-- Main content -->
    <div class="main-content">
        <!-- Header -->
            <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
            <div class="container">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                            <h1 class="text-white">Create an Account</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <style>
            .custom-checkbox .custom-control-input:checked~.custom-control-label::after {
        background:#22ab59;
        border-radius: 2px;
    }
        
        .myLoginBtn {
            padding: 0.5em 1.25rem;
        }
        </style>
        <!-- Page content -->
        <div class="container mt--8 pb-5">
            <!-- Table -->
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    @php
                        $signup_success = Session::get('signup_success');
                    @endphp
                    @if ($signup_success)
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <span class="alert-icon"><i class="fas fa-check"></i></span>
                            <span class="alert-text"><strong>{{$signup_success}}</strong></span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endif
                    @php
                        Session::put('signup_success', NULL);
                    @endphp
                    <div class="card bg-secondary border-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <small>Sign up with credentials</small>
                            </div>
                            <form role="form" action="{{route('save-register')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                                        </div>
                                        <input type="text"  placeholder="Original Full Name" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus/>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                        </div>
                                        <input  placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" />
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                                        </div>
                                        <input  placeholder="Phone No" id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="email" />
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                        </div>
                                        <input  placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" />
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label text-muted" for="countrycode">Select Country</label>
                                    <select  class="form-control select2-hidden-accessible @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}">
                                        @foreach ($sub_locations as $item)
                                            <option value="{{$item->id}}">{{$item->sub_location_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                              
                                <div class="custom-control custom-checkbox mt-5">
                                    <input type="checkbox" name="Tos" id="tos" class="custom-control-input" onchange="valueChanged()" required>
                                    <label for="tos" class="custom-control-label">I agree to smm <a target="_blank" href="">Terms of Service</a> and <a target="_blank" href="">Privacy Policy.</a></label>
                                    <div id="tos-error" class="invalid-message mb-1">&nbsp;</div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mt-4 myLoginBtn" id="create_account" name="create_account">Create
                                        Account
                                    </button>
                                </div>
                            </form> 
                            
                            <div style="text-align: center;padding: 20px 10px 10px 10px">
                               <p> <a href="{{route('user.login')}}" class="hvr-green">Already have an account?</a></p>
                              <a href="{{route('user.login')}}" class="login-btn">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    
    </div>
    </div>
@endsection