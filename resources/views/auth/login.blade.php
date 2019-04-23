@extends('root')

@section('login')



    <!-- Default form login -->
    <form method="POST" action="{{ route('login') }}" class="text-center border border-light p-5 col-sm-8 offset-sm-2  col-md-6 offset-md-0 col-lg-4 offset-lg-0"
          style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        @csrf
        <p class="h4 mb-4">{{ __('ورود') }}</p>

        <!-- Email -->
        <input type="email" style="direction: rtl" id="defaultLoginFormEmail" class="form-control mb-4 {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="پست الکترونیک">

        @if ($errors->has('email'))
            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
        @endif
    <!-- Password -->
        <input type="password" style="direction: rtl" id="defaultLoginFormPassword" class="form-control mb-4" {{ $errors->has('password') ? ' is-invalid' : '' }} name="password" placeholder="گذرواژه">

        @if ($errors->has('password'))
            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
        @endif

        <div class="d-flex justify-content-around">
            {{--<div>--}}
            {{--<!-- Remember me -->--}}
            {{--<div class="custom-control custom-checkbox">--}}
            {{--<input type="checkbox" style="float: left" class="form-check-input" id="materialLoginFormRemember" name="remember" >--}}

            {{--<label class="form-check-label"--}}
            {{--for="materialLoginFormRemember">{{ __('مرا به خاطر بسپار') }}</label>--}}
            {{--</div>--}}
            {{--</div>--}}
            <div>
                <!-- Forgot password -->
                <a  href="{{ route('password.request') }}">  {{ __('رمز عبور خود را فراموش کرده اید؟') }} </a>

            </div>
        </div>

        <!-- Sign in button -->
        <button class="btn btn-info  my-4" style="width: 100%" type="submit">{{ __('ورود') }}</button>


        <p>{{ __('عضو نیستید ؟') }}
            <a href="/register">{{ __('ثبت نام') }}</a>
        </p>


        {{--<!-- Social login -->--}}
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

    </form>
    <!-- Default form login -->





@endsection
