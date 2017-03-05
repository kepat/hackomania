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
                    <a class="navbar-brand" href="#">IMAGE</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a id="add_album" data-model="payment_modal" data-title="Payment Options" href="#">
                                <i class="fa fa-plus-square"></i>
                                REQUEST ALBUM
                            </a>
                        </li>
                    </ul>
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
                                <h4 class="title">Images</h4>
                                <p class="category">Listing</p>
                            </div>
                            <div class="content container-fluid">
                                @foreach ($meetups as $meetup)
                                    <div class="col-md-3">
                                        <img class="image-thumbnail" data-toggle="tooltip" data-placement="auto"
                                             title="N/A" name="image" id="{{$meetup->id}}"
                                             src="{{ $meetup->photo->photo_link }}"/>
                                    </div>
                                @endforeach
                                @foreach ($instagrams as $instagram)
                                    <div class="col-md-3">
                                        <img class="image-thumbnail" data-toggle="tooltip" data-placement="auto"
                                             @if($instagram->caption)
                                             title="{{ $instagram->caption->text }}"
                                             @else
                                             title="N/A"
                                             @endif
                                             name="image" id="{{ $instagram->id }}"
                                             src="{{ $instagram->images->low_resolution->url }}"/>
                                    </div>
                                @endforeach
                                @foreach ($facebooks as $facebook)
                                    <div class="col-md-3">
                                        <img class="image-thumbnail" data-toggle="tooltip" data-placement="auto"
                                             title="N/A" name="image" id="{{$facebook['id']}}"
                                             src="{{ $facebook['images'][0]['source'] }}"/>
                                    </div>
                                @endforeach
                            </div>
                        </div>
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