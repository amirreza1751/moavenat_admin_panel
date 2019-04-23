@extends('layouts.app')

@section('head')

@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">



                <div class="card">
                    <div class="card-header text-right">
                        <div class="float-right">مدیریت کاربران</div>
                        <div class="float-left"><a href="{{url('/home')}}"> بازگشت </a> </div>
                    </div>
                    <div class="card-body row">






                        <div class="manage-judgments container text-right col-lg-5">
                            <div class="manage-judgements-header text-center"><h3>انتساب نوع طرح به داوران</h3></div>
                            <div class="manage-judgements-body pt-4">

                                <form method="post" action="{{url('/permissions/judgment')}}">
                                    @csrf
                                    <div class="row">

                                        <div class="container col col-lg-5">
                                            <div >
                                                <div class="project_types_header">
                                                    <span class="ml-3">نوع طرح</span>
                                                    <span class="ml-3">وضعیت</span>
                                                </div>

                                                <div class="custom-control custom-checkbox">
                                                    <input   type="checkbox" class="custom-control-input" id="defaultUnchecked1" value="1" name="assign[tarviji]">
                                                    <label class="custom-control-label" for="defaultUnchecked1">
                                                        ترویجی
                                                    </label>
                                                </div>

                                                <div class="custom-control custom-checkbox">
                                                    <input  type="checkbox" value="1" class="custom-control-input" id="defaultUnchecked2" name="assign[amuzeshi]">
                                                    <label class="custom-control-label" for="defaultUnchecked2">
                                                        آموزشی
                                                    </label>
                                                </div>

                                                <div class="custom-control custom-checkbox">
                                                    <input  type="checkbox" class="custom-control-input" class="custom-control-input" id="defaultUnchecked3" value="1" name="assign[mosabeghei]">
                                                    <label class="custom-control-label" for="defaultUnchecked3">
                                                        مسابقه ای
                                                    </label>
                                                </div>

                                            </div>


                                        </div>

                                        <div class="container col col-lg-7">
                                            <select required name="user" id="" class="browser-default custom-select text-right">
                                                <option value="" selected disabled>.داور مورد نظر را انتخاب کنید</option>
                                                @foreach($referees as $referee)
                                                    <option value="{{$referee->id}}">{{$referee->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    @if(Session::has('message1'))
                                        <p class="alert {{ Session::get('alert-class1', 'alert-info') }}">
                                            <span class="float-right">{{ " " . Session::get('message1')." " }}</span><span style="padding: 5px"> به روز رسانی شد </span></p>
                                    @endif


                                    <div class="form-group row mt-5">
                                        <button type="submit" class="btn btn-block btn-blue"> ثبت</button>
                                    </div>
                                </form>

                            </div>
                        </div>










                    <div class="manage-judgments container text-right col-lg-5">
                        <div class="manage-judgements-header text-center" ><h3>انتساب نقش به کاربران</h3></div>
                        <div class="manage-judgements-body pt-4 " >

                            <form method="post" action="{{url('/users/roles')}}">
                                @csrf
                                <div class="row">

                                    <div class="container col col-lg-5">


                                        <div >
                                            <div class="project_types_header">
                                                <span >نقش</span>
                                                <span class="mr-5">وضعیت</span>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input  class="custom-control-input" id="defaultUnchecked4" type="checkbox" value="1" name="assign[dabir]">
                                                <label class="custom-control-label" for="defaultUnchecked4">
                                                    دبیر کمیته علمی
                                                </label>
                                            </div>

                                            <div class="custom-control custom-checkbox">
                                                <input  class="custom-control-input" id="defaultUnchecked5" type="checkbox" value="1" name="assign[davar]">
                                                <label class="custom-control-label" for="defaultUnchecked5">
                                                    داور
                                                </label>
                                            </div>

                                            <div class="custom-control custom-checkbox">
                                                <input  class="custom-control-input" id="defaultUnchecked6" type="checkbox" value="1" name="assign[staff]">
                                                <label class="custom-control-label" for="defaultUnchecked6">
                                                    مسئول ثبت انجمن ها
                                                </label>
                                            </div>

                                        </div>


                                    </div>

                                    <div class="container col col-lg-7">
                                        <select required name="user" id="" class="browser-default custom-select text-right">
                                            <option value="" selected disabled>.کاربر مورد نظر را انتخاب کنید</option>
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                @if(Session::has('message2'))
                                    <p class="alert {{ Session::get('alert-class2', 'alert-info') }}">
                                        <span class="float-right">{{ " " . Session::get('message2')." " }}</span><span style="padding: 5px"> به روز رسانی شد </span></p>
                                @endif


                                <div class="form-group row mt-5">
                                    <button type="submit" class="btn btn-block btn-blue"> ثبت</button>
                                </div>
                            </form>

                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection