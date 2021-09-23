@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
<div  id="app">
    <!-- TOP QUICK VIEW CARDS -->
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card items-center">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h5 class="font-weight-bolder simpleStyle1 mb-0 pb-0">{{$datetime->get('weekday')}}</h5>
                                <p class="title text-xl-left">{{$datetime->get('current_time')}}</p>
                                <span class="text-blue-200 text-sm simpleStyle1">{{$datetime->get('date')}}</span>
                            </div>
                        </div>
                        <div class="col-4 mt-3 text-end">
                            <img src="/assets/img/clock-drawn.png" width="50" height="50" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <weather></weather>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">New Clients</p>
                                <h5 class="font-weight-bolder mb-0">
                                    +3,462
                                    <span class="text-danger text-sm font-weight-bolder">-2%</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Sales</p>
                                <h5 class="font-weight-bolder mb-0">
                                    $103,430
                                    <span class="text-success text-sm font-weight-bolder">+5%</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- NEWS AND REDDIT -->
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <news></news>
        </div>
        <div class="col-lg-6 col-md-12">
            <reddit-threads></reddit-threads>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <trending-movies></trending-movies>
        </div>
    </div>

</div>

    <script src="{{asset('js/app.js')}}"></script>

@endsection
