@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div>
        </div>
    </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @if (Auth::user()->role_id == '1')
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h4>Complaints And Suggestion</h4>
                            </div>
                            <div class="icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <a href="" class="small-box-footer">Click Here <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                @endif



                @if (Auth::user()->role_id == '1')
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h4>MailBox</h4>
                            </div>
                            <div class="icon">
                                <i class="fa fa-envelope-open"></i>
                            </div>
                            <a href="{{ route('view') }}" class="small-box-footer">Click Here <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                @endif

                @if (Auth::user()->role_id == '1')
                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h4 style="color:white;"> Users : {{ $totalUser }}</h4>
                                <h4></h4>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="" class="small-box-footer">Click Here <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                @endif


                @if (Auth::user()->role_id == '1')
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h4>Setting</h4>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">Click Here <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>
    </div>
    </div>
@endsection
