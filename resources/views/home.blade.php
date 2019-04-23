@extends('layouts.app')

@section('head')

@endsection

@section('content')
    <div class="container-fluid">

        <!-- Heading -->
        <div class="card mb-4 wow fadeIn">

            <!--Card content-->
            <div class="card-body d-sm-flex justify-content-between">



                <h4 class="mb-2 mb-sm-0 pt-1 ">

                    <span style="float: right">خانه</span>
                </h4>

            </div>

        </div>
        <!-- Heading -->

        <!--Grid row-->
        <div class="row wow fadeIn">

            <!--Grid column-->
            <div class="col-lg-6 col-md-6 mb-4">

                <!--Card-->
                <div class="card">
                    @if(Session::has('message'))
                        <p  class="text-right alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif

                    <!-- Card header -->
                    <div class="card-header">نمودار مجموع هزینه های دریافتی انجمن ها</div>

                    <!--Card content-->
                    <div class="card-body">

                        <canvas id="barChart"></canvas>

                    </div>

                </div>
                <!--/.Card-->

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-6 col-md-6 mb-4">

                <!--Card-->
                <div class="card">

                    <!-- Card header -->
                    <div class="card-header">نمودار دایره ای فراوانی نوع طرح ها</div>

                    <!--Card content-->
                    <div class="card-body">

                        <canvas id="pieChart"></canvas>

                    </div>

                </div>
                <!--/.Card-->

            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->


    </div>
@endsection
