@extends('layouts.frontend_layout')
@section('title')
    {{$content->page_name}}
@endsection
@section('content')
    <!-- Main content -->
    <div class="main-content">
        <!-- Header -->
            <div class="header bg-gradient-primary py-3 py-lg-4 pt-lg-8">
            <div class="container">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                            <h1 class="text-white">{{$content->page_name}}</h1>
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
        <div class="container">
            <div>
                <div class="py-5 pt-5">
                    {!!$content->page_description!!}
                </div>
            </div>
        </div>
    </div>
@endsection