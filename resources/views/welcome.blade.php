@extends('layouts.frontend_layout')
@section('title')
    Home
@endsection
@section('content')
<div class="main-content">
    <!-- Header -->
    <style>
        @media  only screen and (min-width: 768px) {
            .responsive-head-text {
                display: inline-block !important;
                width: 60% !important;
            }
        }
        @media  only screen and (max-width: 768px) {
            .responsive-head-text {
                display: block;
                width: 100%;
            }
        }		
		.home_banner_gif {
			width: 90%;
			border-radius: 10px;
			
		}
		.dis{
		    text-align:center;
		}
    </style>
<div>
    <div class="header pt-5 pb-7" style="background-color: #009688 !important">
     <div class="container">
            <div class="header-body">
               <div class="row align-items-center" style="margin-top: 60px">
                    <div class="col-lg-6">
                        <div class="pr-5">
                            <h1 class="display-2 text-white font-weight-bold mb-0" >{{Session::get('refer_id')}}Micro Job & Best Freelance Site to Make Money Online</h1><br>
                            <h2 class="display-5 text-white">Small Gigs. Big Results.</h2>
                             
                            <div class="mt-3">
                                {{-- <a href="https://workupjob.com/login" class="btn btn-neutral my-2 btn-sm" style="padding: 5px 8px 5px 8px;">Login</a>
                                <a href="https://workupjob.com/register" class="btn btn-sm my-2 text-white" style="background:#22ab59;padding: 5px 8px 5px 8px;">Create Account</a>
                                <a href="https://workupjob.com/register" class="btn btn-neutral my-2" style="padding: 5px 8px 5px 8px;">Get started</a> --}}
                            </div>
                        </div>
                    </div>                
					<div class="col-lg-6">
                        <div class="pr-5">
                            <img class="home_banner_gif" src="{{asset('/')}}public/frontend/images/site.gif">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <div class="bg-success" style="    border-radius: 100% 0% 10% 0% / 100% 100% 0% 10%; height: 70px; background: #00235e !important;"></div>
            {{-- <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg> --}}
        </div>
    </div>
    <section class="py-6 pb-9" style="background-color: #00235e!important;">
        <div class="container">
            <div class="text-center">
                <h2 class="display-4 " style="color:#FDFEFE";>{{$setting->website_title}}</h2>
                <p class="responsive-head-text lead text-white"style="text-align:justify;">SMM Site is a Micro Job & freelance services marketplace where you can easily earn more money and also businesses can find and hire individual contractors to do some work remotely, order a micro job, communication and get tasks done quickly 
                   and is the best micro job site in the world where freelancers around the world directly connect with business owners and get hired. It helps you to earn money online.
                </p>
                <p class="text-white mt-4"></p>
            </div>
        </div>
    </section>
    <section class="section section-lg pt-lg-0 mt--7">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card card-lift--hover shadow border-0">
                                <div class="card-body py-5">
                                    <div class="icon icon-shape bg-gradient-primary text-white rounded-circle mb-4">
                                        <i class="fas fa-tasks"></i>
                                    </div>
                                    <h4 class="h3 text-primary text-uppercase">Work</h4>
                                    <p class="description mt-3">
                                    <p> - Select jobs you like</p>
                                    <p> - Complete these tasks</p>
                                    <p> - Explore required tasks</p>
                                    <p> - Send required proofs</p>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-lift--hover shadow border-0">
                                <div class="card-body py-5">
                                    <div class="icon icon-shape bg-gradient-success text-white rounded-circle mb-4">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                    <h4 class="h3 text-success text-uppercase">Job</h4>
                                    <p class="description mt-3">
                                    <p> - Post your job on your desire</p>
                                    <p> - Set requirements & Estimated Budget</p>
                                    <p> - Rate each task</p>
                                    <p> - Reach to Thousand workers </p>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-lift--hover shadow border-0">
                                <div class="card-body py-5">
                                    <div class="icon icon-shape bg-gradient-warning text-white rounded-circle mb-4">
                                        <i class="fas fa-coins"></i>
                                    </div>
                                    <h4 class="h3 text-uppercase" style="color:#20b6fc">Withdraw/Deposit</h4>
                                    <p class="description mt-3">
                                    <p> - Select Payment Method</p>
                                    <p> - Set your amount</p>
                                    <p> - Place your order</p>
                                    <p> - Get Payment/Deposit Fund </p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-6" style="background-color: white">
        
        <div class="container">
            <div class="row row-grid align-items-center">
                <div class="col-md-6 order-md-2">
                     <img src="https://workupjob.com/assets/img/brand/co.jpg" class="img-fluid">
                </div>
                <div class="col-md-6 order-md-1">
                    <div class="pr-md-5">
                        
                         <h1><b>How to Earn Money from Online ?</b></h1>
                        <p style="text-align:justify;">This is how Small Gigs are great work! They are easy to do and require little time to finish. There are jobs like take a survey, categorize images, help promote content and many others. Get credited immediately after task is reviewed and dont wait a month or more for a pay out.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-6" style="background-color: white">
        <div class="container">
            <div class="row row-grid align-items-center">
                <div class="col-md-6">
                    <img src="https://workupjob.com/assets/img/brand/home_job_banner.jpg" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <div class="pr-md-5">
                        <h1>Ask people to help you</h1>
                        
                        <p style="text-align:justify;">This is where Small Gigs come in handy! We accept jobs that help Business owners promote their business (website, app, social media) or help them do something they cannot do by themselves; where they need more people and their knowledge to achieve goals.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-7 section-nucleo-icons bg-white overflow-hidden">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="display-4">YOU CAN EARN MORE BY REFERRAL</h2>
                    <p class="lead">
                        Post your Affiliate Link on blogs, websites, forums, social media or write Workupjob review - Refer new clients or freelancers and earn commission for each referral.
                    </p>
                    <div class="btn-wrapper">
                        <a href="{{route('user.register')}}" style="background:#;border-radius:30px;padding: 0.5em 1.25rem;" class="btn btn-primary">Start Now</a>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <img src="https://workupjob.com/assets/img/brand/home_refer_banner.jpg" width="50%">
            </div>
        </div>
    </section>
    <div class="text-center">
        <img class="gateway-branding" style="height: 100px" src="{{asset('/')}}public/frontend/images/payment_methods.png">
    </div>
</div>


@endsection