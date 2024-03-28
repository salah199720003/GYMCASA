@extends('layout.master')

@section('header')
    @include('layout.nav')
@endsection 

@section('main')
<a href="{{ route('adminvideo.create') }}" class="btn btn-primary mb-3" style="margin-left:10%">Post Video</a>
<div class="programcontainer" >
    @foreach ($videos as $item)
        <div class="col">
            <a href="{{ route('video.show', $item->id) }}" style="text-decoration: none;">
                <div class="card cc" style="width: 100%;background-color:var(--dark); max-width: 300px; ;border:0;border-radius-:0">
                  <div style="overflow: hidden; height: 150px;" class="image-container3">
                    <img class="img3" src="laravel/public/img/{{ $item->image }}" class="card-img-top" style="width: 100%; height: 100%; object-fit: cover;">
                    <div class="play-button"></div>  
                </div>
                  <div class="card-body" style="background-color: var(--dark);margin:0px;padding:0px">
                    <p class=" pp" style="margin:0">{{ $item->titre }}</p>
                    <span style="font-size:10px;padding:0px;margin:0px;color:grey">{{$item->created_at->format('Y-m-d')}}</span>
                  </div>
                </div>
              </a>
            <form action="{{ route('adminvideo.destroy', $item->id) }}" method="post">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger mt-2">Delete</button>
</form>
        </div>
    @endforeach
</div>
@endsection
