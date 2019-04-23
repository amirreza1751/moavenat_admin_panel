@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12" >
                <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
                    <div class="card-header text-right" >
                        <div class="float-right">لیست اعضای انجمن {{$forum->name}}</div>
                        <div class="float-left"><a href="{{url('/home')}}"> بازگشت </a> </div>
                    </div>
                    <?php $i=1; ?>
                    <div class="card-body ">
                        <div class="col-md-12 " >
                            <table class="table table-bordered  table-responsive-sm" dir="rtl">
                                <thead class="table-dark">
                                <tr class="text-center">
                                    <td style="width:10% ">ردیف</td>
                                    <td style="width:20% ">نام و نام خانوادگی</td>
                                    <td style="width:15% ">شماره دانشجویی</td>
                                    <td style="width:15% ">رشته تحصیلی</td>
                                    <td style="width:20% ">تلفن</td>
                                    <td style="width:10% ">تعداد رای</td>
                                    <td style="width:10% ">سمت</td>

                                </tr>
                                </thead>

                                <tbody>
                                @foreach($staffs as $staff)
                                    <tr class="text-center clickable-row ">
                                        <td style="width:10% ">{{++$loop->index}}</td>
                                        <td style="width:20% ">{{$staff->fname}}</td>
                                        <td style="width:15% ">{{$staff->student_id}}</td>
                                        <td style="width:15% ">{{$staff->field}}</td>
                                        <td style="width:20% ">{{$staff->phone_number}}</td>
                                        <td style="width:10% ">{{$staff->votes}}</td>
                                        <td style="width:10% ">{{$staff->forum_post}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
