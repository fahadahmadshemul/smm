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
                            <h1 class="text-white">Welcome to {{$setting->website_title}}</h1>
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
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-7">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                            <h4>Contact us</h4>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class=" text-muted mb-4">
                                <h3 style="color: #ff9900">Mail Support 24/7</h3>
                                <p><a href="support@smm.com">support@smm.com</a></p>
                            </div>
                            <div class="">
                                <h3>Social Support </h3>
                                <p style="border:2px solid #2FA64D; border-radius:5px;padding:5px;">SUPPORT AVAILABLE TIME = 24/7</p>
                                <ul>
                                    <li><a href="">Facebook Live Support Page</a></li>
                                    <li><a href="">Facebook Group</a></li>
                                    <li><a href="">Youtube</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Your Chat plugin code -->
                <div id="fb-customer-chat" class="fb-customerchat">
                </div>
            </div>
        </div>
    </div>
    <!-- Messenger Chat plugin Code -->
    <div id="fb-root"></div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "105886852127305");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v13.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
@endsection