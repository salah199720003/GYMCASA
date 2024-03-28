@extends('layout.master')
@section('header')
    @include('layout.nav')
@endsection 
@section('main')
<div style="display: flex;justify-content:center">
    <div class="form-container" style="width: 50%;background-color:white;border:white   5px solid;border-radius:2px">
        <h1 class=" display-4 text-primary text-uppercase" style="text-align:center;margin-top:20px;margin-bottom:0">Gymster</h1>
        <form method="POST" action="{{ route('adminvideo.store') }}" enctype="multipart/form-data" class="form-row" style="padding: 8% 10% 10% 10%;">
            @csrf
    <label class="form-label ">video</label>
    <input style="width: 50%" class="form-control" type="file" name="video">
    @error('video')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        <label class="form-label ">mignature</label>
    <input style="width: 50%" class="form-control" type="file" name="image">
    @error('image')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        <label class="form-label ">titre</label>
    <input style="width: 50%" class="form-control" name="titre">
    @error('titre')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        <label class="form-label " >description</label>
        <textarea class="form-control" name="description" cols="52" rows="10" style="width: 80%"></textarea>
        @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        <br>

    <button class="btn btn-primary" id="loadButton" onclick="showLoading()">upload</button>

    </form>
</div>
</div>
<div id="loadingOverlay" class="loading-overlay">
    <div class="spinner"></div>
  </div>
  <script>
  function showLoading() {
    var overlay = document.getElementById('loadingOverlay');
    overlay.style.display = 'block';
  }
  
  function hideLoading() {
    var overlay = document.getElementById('loadingOverlay');
    overlay.style.display = 'none';
  }
  </script>
@endsection