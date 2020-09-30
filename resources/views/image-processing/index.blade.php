@extends('layouts.app')
@section('content')
<div class="container">
    <br><br><br>
    <div class="row">
        <div class="col-md-6 offset-md-3" style="margin:auto; background:white; padding:20px; box-shadow:10px 10px 5px #888">
            <div class="panel-heading">
                <h2>Image Processing App</h2>
                <p>This demo app will analyze any image that's uploaded</p>
            </div>
            <hr>
            <form action="{{ route('analyze') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="image" accept="image/*" class="form-control">
                <br>
                <button class="btn btn-lg btn-block btn-outline-success" type="submit" style="border-radius: 0px;">Analyze Image</button>
            </form>
        </div>
    </div>
</div>
@endsection
