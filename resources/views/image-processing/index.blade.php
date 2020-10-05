@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
    <br><br><br>
        <div class="col-md-6 offset-md-3" style="margin:auto; background:white; padding:20px; box-shadow:0px 0px 25px #889">
            <div class="card">
                <div class="card-header">
                    <h2>Image Processing App</h2>
                    <p>This demo app will analyze any image that's uploaded</p>
                </div>

                <div class="card-body">
                    <form action="{{ route('analyze') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="image" accept="image/*" class="form-control" style="height: 100%; width:100%;">
                        <br>
                        <button class="btn btn-lg btn-block btn-outline-primary" type="submit" style="border-radius: 0px;">Analyze Image</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
