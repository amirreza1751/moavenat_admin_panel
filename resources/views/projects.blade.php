@extends('layouts.app')





@section('head')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.js"></script>
    <script>
        $(document).ready(function () {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
    </script>
    {{--<style>--}}
        {{--.pagination{--}}

        {{--}--}}
    {{--</style>--}}
@endsection


@section('content')
    <?php
    $permissions_array = Auth()->user()->getDirectPermissions();
    $permissions = array();
    if (isset($permissions_array)){
        for ($k=0;$k<sizeof($permissions_array);$k++){
            array_push($permissions, $permissions_array[$k]['name']);
        }
    }
    ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-right" >
                        <div class="float-right">لیست طرح ها</div>
                        <div class="float-left"><a href="{{url('/home')}}"> بازگشت </a> </div>
                    </div>
                    <div class="card-body text-right">
                        @if(Session::has('message'))
                            <p  class="text-right alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                        @endif
                        <table class="table table-bordered  table-responsive-sm" dir="rtl">
                            <thead class="table-dark">
                                <tr class="text-center">
                                    <td>ردیف</td>
                                    <td>شناسه</td>
                                    <td>عنوان طرح</td>
                                    <td>نوع طرح</td>
                                    <td>مکان برگزاری</td>
                                    <td>شماره نامه</td>
                                    <td>سطح برگزاری</td>
                                    <td>ظرفیت</td>
                                    <td>انجمن برگزارکننده</td>
                                    @if(Auth()->user()->hasAnyRole(['admin','dabir']))<td>امتیاز </td>@endif
                                     @if(Auth()->user()->hasAnyRole(['admin','dabir', 'davar']))<td>داوری طرح</td>@endif
                                    @if(Auth()->user()->hasAnyRole(['admin','dabir']))<td>ثبت نهایی امتیاز</td>@endif
                                </tr>
                            </thead>

                            <tbody>
                        @foreach($projects as $project)
                            @if(in_array($project->type, $permissions))


                                <tr class="text-center clickable-row @if($project->grade > 0 ) {{ "alert-success" }} @endif" style="cursor: pointer;" data-href='{{url('/projects')}}{{"/" . $project->id}}'>
                                    <td>{{++$loop->index}}</td>
                                    <td>{{ $project->id }}</td>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->type }}</td>
                                    <td>{{ $project->place }}</td>
                                    <td>{{ $project->letter_number }}</td>
                                    <td>{{ $project->level }}</td>
                                    <td>{{ $project->capacity }}</td>
                                    <td>{{ $project->forum->name }}</td>
                                    @if(Auth()->user()->hasAnyRole(['admin','dabir']))<td>{{ $project->grade}}</td>@endif
                                    @if(Auth()->user()->hasAnyRole(['dabir', 'davar']))<td style="z-index: 10"><a href="/projects/judge/{{ $project->id }}" class="btn btn-secondary btn-rounded btn-sm"><i class="fas fa-pencil-alt"></i></a></td>@endif
                                    @if(Auth()->user()->hasAnyRole(['admin','dabir']))<td style="z-index: 10"><a href="/projects/finalJudge/{{ $project->id }}" class="btn btn-info btn-rounded btn-sm"><i class="fas fa-pencil-alt"></i></a></td>@endif

                                </tr>
                            @endif
                        @endforeach
                            </tbody>
                        </table>

                        {{--<div class="row">--}}
                            {{--<div class="col-sm-2 offset-sm-5 alert-danger text-center" >{{$projects->links()}}</div>--}}
                        {{--</div>--}}
                        {{$projects->links()}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
