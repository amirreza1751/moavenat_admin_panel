@extends('layouts.app')

@section('head')
    {{--<link rel="stylesheet" href="/bootstrap-jalali-datepicker-master/demo/css/bootstrap.min.css" />--}}
    {{--<link rel="stylesheet" href="/bootstrap-jalali-datepicker-master/bootstrap-datepicker.css" />--}}
    {{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.js"></script>--}}
    {{--<script src="/bootstrap-jalali-datepicker-master/bootstrap-datepicker.js"></script>--}}
    {{--<script src="/bootstrap-jalali-datepicker-master/bootstrap-datepicker.fa.js"></script>--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <script>
        $(document).ready(function() {

            @for($i=0; $i<count($referees); $i++)
                @for($j=0; $j<count($referees[$i]); $j++)
            @php
                $ii=$i+1;
                $jj=$j+1;
            @endphp
                    $("#{{$ii}}-{{$jj}}").click(function () {
                        var ref_name = $(this).attr("ref_name");
                        var proj_id = $(this).attr("proj_id");
                        var st_name = $(this).attr("st_name");

                        // alert(ref_name + " " + proj_id + " " + st_name);
                        $.get("http://localhost:8000/api/judgment/get_grades",
                            {
                                ref_name: ref_name,
                                st_name: st_name,
                                proj_id: proj_id
                            },
                            function(data, status){
                                // alert("Data: " + data[0]['st_name'] + "\nStatus: " + status);
                                $("#scores").text(data[0]['st_name'] + ": " + data[0]['final_score']);
                                $("#scores").append("<br/>");

                                // for(var temp in data[0]['sub_score']){
                                //     // $("#scores").append(sub_score[temp]['subject']);
                                //     // console.log(temp);
                                // }
                                var i;
                                var j;
                                for(i = 0; i< data[0]['sub_score'].length; i++){
                                    $("#scores").append(  data[0]['sub_score'][i]['subject'] + ": " + data[0]['sub_score'][i]['sub_score']+ "&nbsp;&nbsp;&nbsp;&nbsp;"+ "<br/>");
                                    for(j = 0; j< data[0]['sub_score'][i]['sub_score_l2'].length; j++){
                                        $("#scores").append(data[0]['sub_score'][i]['sub_score_l2'][j]['subject_l2'] + ": " + data[0]['sub_score'][i]['sub_score_l2'][j]['sub_score_l2'] + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "<br/>");
                                    }
                                }
                                console.log(data);
                            });
                    });
                @endfor
            @endfor

        });
    </script>

    {{--<script src="/js/suggestedGrades.js"></script>--}}
@endsection

@section('content')
<div class="container_fluide">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-right">
                    <div class="float-right">داوری نهایی طرح {{ $project->name }}</div>
                    <div class="float-left"><a href="{{url('/projects')}}"> بازگشت </a> </div>
                </div>
                <div class="card-body">
                    @if(Session::has('message'))
                        <p  class="text-right alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
                    <div class="row" style="padding: 10px;">
                        <div class="col-sm-3 bg-primary3 rounded p-0" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                            <div class="scores_header bg-primary2 text-center p-3">
                                <h4 class="">ریز نمرات</h4>
                            </div>
                            <div id="scores" class="text-right p-3">

                            </div>
                        </div>
                        <div class="col-sm-9">
                            <form method="POST" action="/projects/finalJudgement/{{$project->id}}">
                                @csrf

                                <table class="table table-bordered text-right table-responsive" dir="rtl" >
                                    <thead class="table-dark">
                                    <tr class="text-center">
                                        <td >داور</td>
                                        <td >کار تیمی</td>
                                        <td >سطح‌برگزاری</td>
                                        <td >تبلیغات</td>
                                        <td >جذب‌مخاطب</td>
                                        <td >مدت‌زمان‌برگزاری</td>
                                        <td >نوآوری‌و‌ابتکار</td>
                                        <td >حامیان‌مالی‌ورفاهی</td>
                                        <td >مدعوین‌ویژه</td>
                                        <td >برنامه‌های‌جانبی</td>
                                        <td >گواهی</td>
                                    </tr>
                                    </thead>

                                    <tbody>

                {{--test--}}
                                    @for($i=0; $i<count($referees); $i++)
                                        @if(count($referees[$i])!=0)
                                            <tr>
                                                <td>{{$referees[$i][0]->username}}</td>
                                                {{--@foreach($referee as $temp)--}}

                                                @for($j=0; $j<count($referees[$i]); $j++)
                                                    @php
                                                        $ii=$i+1;
                                                        $jj=$j+1;
                                                    @endphp
                                                    <td class="text-center"><input st_name="{{$referees[$i][$j]->st_name}}" ref_name="{{$referees[$i][0]->username}}" proj_id="{{$referees[$i][$j]->project_id}}" class="text-center" type="text" id="{{$ii."-".$jj}}" value="{{$referees[$i][$j]->final_score}}"style="width: 50px"></td>
                                                @endfor
                                                {{--@endforeach--}}
                                            </tr>
                                        @endif
                                    @endfor



                        {{--نمره نهایی--}}
                                    <tr>
                                        <td>نمره نهایی</td>
                                        @if( ! empty($referees_final[0]))
                                            @for($i=0; $i<count($referees_final); $i++)
                                                <td class="text-center"><input type="text" required  class="text-center" value="{{$referees_final[$i]->final_score}}" name="{{$i}}" style="width: 50px;"></td>
                                            @endfor

                                        @else
                                            @for($i=0; $i<10; $i++)
                                                <td class="text-center"><input type="text" required  class="text-center" value="" name="{{$i}}" style="width: 50px;"></td>
                                            @endfor
                                        @endif
                                    </tr>
                        {{--نمره نهایی--}}

                {{--test--}}
                                    </tbody>
                                </table>


                                <div class="form-group row mb-1">
                                    <div class="col-md-6 offset-2 ">
                                        <button type="submit" class="btn btn-blue btn-block">
                                            {{ __('ثبت نهایی امتیاز طرح') }}
                                        </button>
                                    </div>
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
