@extends('layout.master')
@section('menu3','active')
@section('header')
    @include('layout.nav')
@endsection 
@section('main')

<div class="background2" >
  <div class="carousel-caption d-flex flex-column align-items-center justify-content-center" style="height: 100vh">
    <div class="p-3" style="max-width: 900px;">
        <h5 class="text-white text-uppercase"> <h2 class="text-white">Nos Programmes</h2></h5>
        <h1 class="display-2 text-white text-uppercase mb-md-4">Regardez et interagissez avec la communauté</h1>
        <p style=" text-align:center;font-size:20px;">Regardez nos meilleurs programmes d'entraînement, interagissez avec la communauté,<br>et consultez nos dernières vidéos en cliquant ici.<br>Rejoignez-nous pour apprendre, grandir et explorer ensemble.</p>
        <button onclick="scrollToPosition('target')" class="btn btn-primary text-white" style="padding-right: 15px;padding-left: 15px;border:2px;border-radius:5px;width:20%">voir ici</button>
    </div>
</div>
</div>
<h1 id="target" style="color:var(--primary);padding-left:10% ">PROGRAMS</h1>
<div style="border-bottom:white 2px solid;margin-bottom:2%;margin-right:5%;margin-left:10%  "></div>

<div class="programcontainer" >
    
    @foreach ($video as $item)
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
    @endforeach
  </div>
  <div style='display:flex;justify-content:center'>{{$video->links()}}</div>
  <script> 
  function scrollToPosition() {
      const targetPosition = document.getElementById('target').offsetTop;
      

          window.scrollTo({
              top: targetPosition,
              behavior: 'smooth'})
  
  }
  
  </script>
@endsection