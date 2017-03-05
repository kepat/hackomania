@extends('layouts.main')

@section('content')

    @include('elements.navigator')

    <div class="main-panel">

        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ route('dashboard') }}">DASHBOARD</a>

                </div>
                <div class="collapse navbar-collapse">
                    @include('elements.account')
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                @include('elements.message')
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Payment</h4>
                                <p class="category">Monthly Payment</p>
                            </div>
                            <div class="content container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('comment', 'Comment') !!}
                                            {!! Form::text('comment', '', ['class' => 'form-control', 'placeholder' => 'Comment']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('address', 'Billing Address') !!}
                                            {!! Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'Billing Address']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('dashboard') }}">
                            <button type="submit" class="btn btn-info btn-fill pull-right">Pay</button>
                        </a>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

        @include('elements.footer')

    </div>

@stop

@section('script')
    @include('dashboards.script.index')
@stop