@extends('layouts.main')

@section('content')
    <div class="container-middle main-color">
        <div class="row-middle">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                        @include('elements.message')
                    </div>
                    <div class="col-lg-4"></div>
                </div>

                <div class="text-center">
                    <span class="font-white font-title-login"> SIGN UP </span>
                </div>

                {!! Form::open(['route' => 'users.store']) !!}

                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope icon-image"></i></span>
                                {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4"></div>
                </div>
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user icon-image"></i></span>
                                {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4"></div>
                </div>
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock icon-image"></i></span>
                                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4"></div>
                </div>
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock icon-image"></i></span>
                                {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Retype Password']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4"></div>
                </div>
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-block btn-login font-white">SIGN UP</button>
                        </div>
                    </div>
                    <div class="col-lg-4"></div>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
@stop