@extends('root')

@section('login')
    {{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
    {{--<div class="col-md-8">--}}
    <!-- Default form register -->
    <form class="text-center border border-light p-5 col-sm-8 offset-sm-2 mt-5 col-md-6 offset-md-0 col-lg-4 offset-lg-0" method="POST" action="{{ route('register') }}" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        @csrf

        <p class="h4 mb-4">ثبت نام</p>


        <!-- First name -->
        {{--<input type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="First name">--}}
        <input id="name" style="direction: rtl" type="text" class="form-control mb-4 {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"  placeholder="نام و نام خانوادگی">

        @if ($errors->has('name'))
            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
        @endif



        <div>
            <!-- E-mail -->

            <input id="email" type="email"  style="direction: rtl" class="form-control mb-4 {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  placeholder="پست الکترونیک">

            @if ($errors->has('email'))
                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            @endif
        </div>
        <!-- Password -->
        {{--<input type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">--}}
        <input id="password" style="direction: rtl" type="password" class="form-control mb-4 {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  placeholder="گذر واژه">

        @if ($errors->has('password'))
            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
        @endif

        <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
            {{ __('حداقل یک رقم و 8 کارکتر وارد کنید') }}
        </small>

        {{--<input id="password-confirm" style="direction: rtl" type="password-confirm" class="form-control mb-4 {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password-confirm"  placeholder="تکرار رمز عبور">--}}

        <input id="password-confirm"  style="direction: rtl" type="password" class="form-control mb-4" name="password_confirmation"  placeholder="تکرار رمز عبور">


        <!-- Sign up button -->
        {{--<button class="btn btn-info my-4 " style="width: 100%;" type="submit">Sign in</button>--}}
        <button type="submit" class="btn btn-info my-4 " style="width: 100%;" >
            {{ __('ثبت نام') }}
        </button>
        <!-- Social register -->
        {{--<p>{{ __(' : یا وارد شوید با') }}</p>--}}

        {{--<a type="button" class="light-blue-text mx-2">--}}
        {{--<i class="fab fa-facebook-f"></i>--}}
        {{--</a>--}}
        {{--<a type="button" class="light-blue-text mx-2">--}}
        {{--<i class="fab fa-twitter"></i>--}}
        {{--</a>--}}
        {{--<a type="button" class="light-blue-text mx-2">--}}
        {{--<i class="fab fa-linkedin-in"></i>--}}
        {{--</a>--}}
        {{--<a type="button" class="light-blue-text mx-2">--}}
        {{--<i class="fab fa-github"></i>--}}
        {{--</a>--}}

        {{--<hr>--}}


    </form>
    <!-- Default form register -->
    </div>
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
@endsection
