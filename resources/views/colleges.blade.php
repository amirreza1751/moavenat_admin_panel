@extends('layouts.app')

@section('head')

@endsection

@section('content')

    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalDelete"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold ml-5 text-danger">حذف</h4>
                    <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <p class="text-center h4">آیا مطمئن هستید؟</p>

                </div>
                <div class="modal-footer d-flex justify-content-center deleteButtonsWrapper">
                    <button type="button" class="btn btn-danger btnYesClass" id="btnYes" data-dismiss="modal">بله
                    </button>
                    <button type="button" class="btn btn-default btnNoClass" id="btnNo" data-dismiss="modal">خیر</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <!-- Heading -->
        <div class="card mb-4 wow fadeIn">

            <!--Card content-->
            <div class="card-body d-sm-flex justify-content-between">



                <h4 class="mb-2 mb-sm-0 pt-1">
                    <a href="{{ url('/home') }}">خانه</a>
                    <span>/</span>
                    <span>مشاهده دانشکده ها</span>
                </h4>

            </div>

        </div>
        <!-- Heading -->

        <!--Grid row-->
        <div class="row wow fadeIn" >


            <!--Grid column-->
            <div class="col-md-8 offset-md-2 mb-4">

                <div class="card">
                    @if(Session::has('message'))
                        <p  class="text-right alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
                    <div class="card-body">
                        <div class="text-right">
                            <a href="/colleges/add" class="btn aqua-gradient btn-rounded btn-sm"><i
                                        class="fas fa-plus-square ml-1"></i>اضافه کردن</a>
                        </div>
                        <table class="table table-bordered  table-responsive-sm" dir="rtl">
                            <thead class="table-dark">
                            <tr class="text-center">
                                <td>ردیف</td>
                                <td>نام دانشکده</td>
                                <td>ویرایش</td>
                                <td>حذف</td>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($colleges as $college)
                                <tr class="text-center clickable-row ">
                                    <td>{{++$loop->index}}</td>
                                    <td>{{ $college->name }}</td>
                                    <td><a class="btn btn-info btn-rounded btn-sm" href="/colleges/edit/{{$college->id}}"><i class="fas fa-edit"></i></a></td>
                                    <td>
                                        <a class="btn btn-danger btn-rounded btn-sm buttonDelete" data-toggle="modal"
                                           data-target="#modalDelete"
                                           disabled><i class="fas fa-trash ml-1"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--Grid row-->


    </div>

@endsection