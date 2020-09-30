@extends('layouts.app')
@section('content')
<div class="container">
    <br><br><br>
    <div class="row">
        <div class="col-md-12" style="margin:auto; background:white; padding:20px; box-shadow:10px 10px 5px #888">
            <div class="panel-heading">
                <h2><a href="#">Image Processing App</a></h2>
                <p>This demo app will analyze any image that's uploaded</p>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <img class="img-thumbnail"
                        src="{{ ($faces == null) ? asset('img/sample.png') : asset('img/'.$filename) }}"
                        alt="Image">
                </div>
                <div class="col-md-8 border" style="padding:10px;">
                    <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a href="#pills-faces"
                            role="tab"
                            class="nav-link active"
                            id="pills-faces-tab"
                            data-toggle="pill"
                            aria-controls="pills-faces"
                            aria-selected="true">Face</a>
                        </li>
                        <li class="nav-item">
                            <a href="#pills-logos"
                            role="tab"
                            class="nav-link"
                            id="pills-logos-tab"
                            data-toggle="pill"
                            aria-controls="pills-logos"
                            aria-selected="true">Logo</a>
                        </li>
                        <li class="nav-item">
                            <a href="#pills-labels"
                            role="tab"
                            class="nav-link"
                            id="pills-labels-tab"
                            data-toggle="pill"
                            aria-controls="pills-labels"
                            aria-selected="true">Label</a>
                        </li>
                        <li class="nav-item">
                            <a href="#pills-properties"
                            role="tab"
                            class="nav-link"
                            id="pills-properties-tab"
                            data-toggle="pill"
                            aria-controls="pills-properties"
                            aria-selected="true">Properties</a>
                        </li>
                        <li class="nav-item">
                            <a href="#pills-web"
                            role="tab"
                            class="nav-link"
                            id="pills-web-tab"
                            data-toggle="pill"
                            aria-controls="pills-web"
                            aria-selected="true">Web</a>
                        </li>
                        <li class="nav-item">
                            <a href="#pills-safeSearch"
                            role="tab"
                            class="nav-link"
                            id="pills-safeSearch-tab"
                            data-toggle="pill"
                            aria-controls="pills-safeSearch"
                            aria-selected="true">Safe Search</a>
                        </li>
                        <li class="nav-item">
                            <a href="#pills-landmarks"
                            role="tab"
                            class="nav-link"
                            id="pills-landmarks-tab"
                            data-toggle="pill"
                            aria-controls="pills-landmarks"
                            aria-selected="true">Landmark</a>
                        </li>
                    </ul>
                    <hr>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-faces" role="tabpanel" aria-labelledby="pills-faces-tab">
                            <div class="row">
                                <div class="col-12">
                                    @include('image-processing.faces')
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="pills-labels" role="tabpanel" aria-labelledby="pills-labels-tab">
                            <div class="row">
                                <div class="col-12">
                                    @include('image-processing.labels')
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="pills-logos" role="tabpanel" aria-labelledby="pills-logos-tab">
                            <div class="row">
                                <div class="col-12">
                                    @include('image-processing.logos')
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="pills-web" role="tabpanel" aria-labelledby="pills-web-tab">
                            <div class="row">
                                <div class="col-12">
                                    @include('image-processing.web')
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="pills-safeSearch" role="tabpanel" aria-labelledby="pills-safeSearch-tab">
                            <div class="row">
                                <div class="col-12">
                                    @include('image-processing.safeSearch')
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="pills-properties" role="tabpanel" aria-labelledby="pills-properties-tab">
                            <div class="row">
                                <div class="col-12">
                                    @include('image-processing.properties')
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="pills-landmarks" role="tabpanel" aria-labelledby="pills-landmarks-tab">
                            <div class="row">
                                <div class="col-12">
                                    @include('image-processing.landmarks')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
