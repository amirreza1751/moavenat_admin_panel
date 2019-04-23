@extends('layouts.app')

@section('head')

@endsection

@section('content')
    <div class="container-fluid">

        <!-- Heading -->
        {{--<div class="card mb-4 wow fadeIn">--}}

            {{--<!--Card content-->--}}
            {{--<div class="card-body d-sm-flex justify-content-between">--}}

                {{----}}

                {{--<h4 class="mb-2 mb-sm-0 pt-1">--}}
                    {{--<a href="{{ url('/home') }}">خانه</a>--}}
                    {{--<span>/</span>--}}
                    {{--<span>ویرایش حساب کاربری</span>--}}
                {{--</h4>--}}

            {{--</div>--}}

        {{--</div>--}}
        <!-- Heading -->

        <!--Grid row-->
        <div class="row wow fadeIn">


            <!--Grid column-->
            <div class="col-md-5 offset-4 mb-4">

                <div class="card">
                    <h4 class="col-6 offset-3 pt-4 ">ویرایش حساب کاربری</h4>
{{--                    <p class="h4 mb-4">{{ __('ورود') }}</p>--}}
                    <div class="card-body">
                        <form class="pr-5 pl-5 pb-5 pt-2" method="POST" action="/users/edit-account">
                            @csrf

                            <div class="md-form">
                                <input style="direction: rtl"  type="text" name="name" id="username" class="form-control" value="{{Auth()->user()->name}}">
                                <label for="username">{{ __('نام و نام خانوادگی') }}</label>
                            </div>


                            <div class="md-form">
                                <input style="direction: rtl" required type="email" name="email" id="email" class=" form-control" value="{{Auth()->user()->email}}">
                                <label for="email"> {{ __('پست الکترونیکی') }}</label>
                            </div>

                            <div class="md-form">
                                <input style="direction: rtl" type="password" name="password" id="password" class="form-control">
                                <label for="password">{{ __('رمز عبور') }}</label>
                            </div>

                            <div class="md-form">
                                <input style="direction: rtl" type="password" name="password-confirmation" id="password-confirm" class=" form-control">
                                <label for="password-confirm">{{ __('تکرار رمز عبور') }}</label>
                            </div>
                            @foreach ($errors->all() as $message)
                                <p  class="text-right alert alert-danger">{{ $message }}</p>
                             @endforeach
                            @if(Session::has('message'))
                                <p  class="text-right alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                            @endif
                            <button class="btn btn-info my-4 btn-block" type="submit">{{ __('ویرایش اطلاعات ') }} </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Grid row-->


    </div>

@endsection