@extends('layouts.app')

@section('head')

    {{--    <link rel="stylesheet" href="{{asset('datepicker/bootstrap.min.css')}}">--}}
    <link rel="stylesheet" href="{{asset('datepicker/bootstrap-datepicker.min.css')}}">



    {{--timepicker--}}
    <link rel="stylesheet" href="{{asset('timepicker/stylesheets/wickedpicker.css')}}">

    <script>
        $(document).ready(function () {
            var twelveHour = $('.timepicker-12-hr').wickedpicker();
            $('.time').text('//JS Console: ' + twelveHour.wickedpicker('time'));
            $('.timepicker-24-hr').wickedpicker({twentyFour: true});
            $('.timepicker-12-hr-clearable').wickedpicker({clearable: true});
        });
    </script>
    <script type="text/javascript" src="{{asset('timepicker/src/wickedpicker.js')}}"></script>

@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-header text-right">
                        <div class="float-right">اضافه کردن طرح</div>
                        <div class="float-left"><a href="{{url('/home')}}"> بازگشت </a></div>
                    </div>
                    <div class="card-body">
                        @if(Session::has('message'))
                            <p class="text-right alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                        @endif
                        <form method="POST" action="/projects/new">
                            @csrf

                            <table class="table table-bordered table-hover text-center" dir="rtl">
                                <thead>
                                <tr>
                                    <th scope="col" colspan="5">مشخصات طرح</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td scope="row">عنوان طرح:</td>
                                    <td colspan="1"><input type="text" name="name" max="191" class="form-control"></td>
                                    <td>شماره نامه</td>
                                    <td colspan="2"><input type="text" name="letter_number" max="191"
                                                           class="form-control"></td>
                                </tr>
                                <tr>
                                    <td scope="row">انجمن برگزار کننده:</td>
                                    <td colspan="1">
                                        <select name="forum_name" id="" class="browser-default custom-select">
                                            <option selected disabled value="">انتخاب کنید.</option>
                                            @foreach($forums as $forum)
                                                <option value="{{$forum->name}}">{{$forum->name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td colspan="1">مکان برگزاری:</td>
                                    <td colspan="2"><input type="text" name="place" class="form-control"></td>
                                </tr>

                                <tr>
                                    <td scope="row">تاریخ شروع:</td>
                                    <td colspan="1"><input type="text" id="az" name="start_date" class="form-control">
                                    </td>
                                    <td>ساعت شروع:</td>
                                    <td colspan="2"><input dir="ltr"
                                                           class="timepicker-24-hr hasWickedpicker form-control"
                                                           onkeypress="return false;" aria-showingpicker="true"
                                                           type="text" placeholder="دقیقه:ساعت" name="start_time"></td>
                                </tr>
                                <tr>
                                    <td scope="row">تاریخ پایان:</td>
                                    <td colspan="1"><input type="text" id="ta" name="end_date" class="form-control">
                                    </td>
                                    <td>ساعت پایان:</td>
                                    <td colspan="2"><input dir="ltr"
                                                           class="timepicker-24-hr hasWickedpicker form-control"
                                                           onkeypress="return false;" aria-showingpicker="true"
                                                           type="text" placeholder="دقیقه:ساعت" name="end_time"></td>
                                </tr>

                                <tr>
                                    <td scope="row" width="15%">نوع طرح</td>
                                    <td>
                                        <select name="type" id="" class="browser-default custom-select">
                                            <option selected disabled value="">انتخاب کنید.</option>
                                            <option value="ترویجی">ترویجی</option>
                                            <option value="مسابقه ای">مسابقه ای</option>
                                            <option value="آموزشی">آموزشی</option>
                                        </select>
                                    </td>

                                    <td>سطح برگزاری</td>
                                    <td>
                                        <select name="level" id="" class="custom-select browser-default ">
                                            <option selected disabled value="">انتخاب کنید.</option>
                                            <option value="دانشگاهی">دانشگاهی</option>
                                            <option value="استانی">استانی</option>
                                            <option value="ملی">ملی</option>
                                            <option value="بین‌المللی">بین‌المللی</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td scope="row">هدف و ضرورت اجرای طرح</td>
                                    <td colspan="5"><textarea name="purpose" id="" cols="30" rows="8"
                                                              class="form-control"></textarea></td>
                                </tr>

                                <tr>
                                    <td scope="row">پیش بینی تعداد میهمان یا شرکت کننده:</td>
                                    <td><input type="number" name="capacity" min="0" class="form-control"></td>
                                    <td scope="row">مجموع ساعات:</td>
                                    <td><input type="number" name="total_hours" min="0" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td scope="row">استاد یا سخنران (به همراه رزومه و شماره تماس و ایمیل):</td>
                                    <td colspan="5"><textarea name="master" id="" cols="30" rows="5"
                                                              class="form-control"></textarea></td>
                                </tr>
                                <tr>
                                    <td scope="row">توضیحات:</td>
                                    <td colspan="5"><textarea name="description" id="" cols="30" rows="5"
                                                              class="form-control"></textarea></td>
                                </tr>
                                <tr>
                                    <td scope="row">برنامه های جانبی:</td>
                                    <td colspan="5"><textarea name="sideway_programs" id="" cols="30" rows="5"
                                                              class="form-control"></textarea></td>
                                </tr>
                                <tr>
                                    <td scope="row">نوآوری:</td>
                                    <td colspan="5"><textarea name="innovation" id="" cols="30" rows="5"
                                                              class="form-control"></textarea></td>
                                </tr>
                                <tr>
                                    <td scope="row">نام حامیان مالی و میزان و نوع حمایت آنها:</td>
                                    <td colspan="5"><textarea name="sponsors" id="" cols="30" rows="5"
                                                              class="form-control"></textarea></td>
                                </tr>
                                <tr>
                                    <td scope="row">ریز برنامه ها (زمانبندی):</td>
                                    <td colspan="5"><textarea name="detailed_programs" id="" cols="30" rows="5"
                                                              class="form-control"></textarea></td>
                                </tr>

                                <tr>
                                    <td scope="row">نظر کارشناس انجمن های علمی دانشجویی:</td>
                                    <td>
                                        <select name="expert_sign" id="" class="browser-default custom-select">
                                            <option selected disabled value=""></option>
                                            <option value="آقای زیبایی">آقای زیبایی</option>
                                            <option value="آقای اکبرزاده">آقای اکبرزاده</option>
                                        </select>
                                    </td>
                                    <td scope="row">نظر و تایید مدیر امور فرهنگی</td>
                                    <td>
                                        <select name="manager_sign" id="" class="browser-default custom-select">
                                            <option selected disabled value=""></option>
                                            <option value="آقای دکتر بانشی">آقای دکتر بانشی</option>
                                            <option value="آقای دکتر هوشمند">آقای دکتر هوشمند</option>
                                        </select>
                                    </td>
                                </tr>

                                </tbody>
                            </table>

                            <div class="form-group row mb-1">
                                <div class="col-md-6 offset-md-2">
                                    <button type="submit" class="btn btn-blue btn-block">
                                        {{ __('ثبت طرح و ورود به مرحله بعد >>') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="{{asset('datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('datepicker/bootstrap-datepicker.fa.min.js')}}"></script>

    <script>
        $(document).ready(function () {

            $("#az").datepicker({
                changeMonth: true,
                changeYear: true
            });

            $("#ta").datepicker({
                changeMonth: true,
                changeYear: true
            });

        });
    </script>

@endsection
