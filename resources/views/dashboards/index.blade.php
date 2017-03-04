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
                    <a class="navbar-brand" href="#">LICENSE</a>
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
                    <button id="btnDisplayImages" type="button" class="btn btn-info btn-fill pull-left">Display Images</button>
                    {{--<div class="col-md-12">--}}
                    {{--<div class="card">--}}
                    {{--<div class="header">--}}
                    {{--<h4 class="title">License</h4>--}}
                    {{--<p class="category">Listing</p>--}}
                    {{--</div>--}}

                    {{--<div class="container-fluid table-filter">--}}
                    {{--<div class="col-sm-6">--}}
                    {{--<div class="pull-left">--}}
                    {{--Show--}}
                    {{--<select id="record_size" title="record_size" class="input-sm">--}}
                    {{--<option value="5">5</option>--}}
                    {{--<option value="10">10</option>--}}
                    {{--<option value="25">25</option>--}}
                    {{--<option value="50">50</option>--}}
                    {{--</select>--}}
                    {{--entries--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-sm-6">--}}
                    {{--<div class="pull-right">--}}
                    {{--Search:--}}
                    {{--<input id="record_search" type="search" class="input-sm"--}}
                    {{--placeholder="Search">--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="content table-responsive table-full-width">--}}
                    {{--<table class="table table-hover table-striped">--}}
                    {{--<thead>--}}
                    {{--<tr>--}}
                    {{--<th>--}}
                    {{--Key--}}
                    {{--<i id="sort_key" data-field="key" aria-hidden="true"></i>--}}
                    {{--</th>--}}
                    {{--<th>--}}
                    {{--Expiry Date--}}
                    {{--<i id="sort_expires_at" data-field="expires_at" aria-hidden="true"></i>--}}
                    {{--</th>--}}
                    {{--<th>--}}
                    {{--Max Device--}}
                    {{--<i id="sort_max_device" data-field="max_device" aria-hidden="true"></i>--}}
                    {{--</th>--}}
                    {{--<th>--}}
                    {{--Actions--}}
                    {{--</th>--}}
                    {{--</tr>--}}
                    {{--</thead>--}}
                    {{--<tbody id="table-body">--}}
                    {{--</tbody>--}}
                    {{--</table>--}}
                    {{--</div>--}}

                    {{--<div class="container-fluid table-footer">--}}
                    {{--<div class="col-sm-6">--}}
                    {{--<div id="record_details" class="pull-left">--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-sm-6">--}}
                    {{--<div id="record_navigation" class="pull-right">--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>

        @include('elements.footer')

    </div>

@stop

@section('script')
    @include('dashboards.script.index')
@stop