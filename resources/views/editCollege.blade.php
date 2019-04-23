@extends('layouts.app')

@section('head')

@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">

                <div class="card">
                    <div class="card-header text-right">
                        <div class="float-right">ویرایش دانشکده</div>
                        <div class="float-left"><a href="{{url('/home')}}"> بازگشت </a> </div>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="/colleges/edit/{{$college->id}}">
                            @csrf
                            <div class="form-group row">

                                <div class="col-md-6 offset-md-3">
                                    <input value="{{$college->name}}" id="college-name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"  required autofocus>

                                    @if ($errors->any())
                                        <span class="invalid-feedback">
                                        @foreach($errors->all() as $error)
                                                <p>{{ $error }}</p>
                                            @endforeach
                                    </span>
                                    @endif
                                </div>
                                <label for="college-name" class="col-sm-2 col-form-label text-md-right">{{ __('نام دانشکده') }}</label>
                            </div>


                            <div class="form-group row mb-1">
                                <div class="col-md-6 offset-md-2">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('ویرایش دانشکده') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
