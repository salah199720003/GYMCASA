@extends('layout.master')
@section('header')
    @include('layout.nav')
@endsection 
@section('main')
<h1 class="text-white" style="padding-left:10% ">{{$video->titre}}</h1>
<div style="border-bottom:white 2px solid;margin-bottom:2%;margin-right:5%;margin-left:10%  "></div>
<div class="videocontainer">
    <div style="grid-column:1"><div  style="position: relative;; padding-top: 56.25%;height:50%">
        <iframe id="res2" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" src="{{ asset('laravel/public/videos/'.$video->video) }}" frameborder="0" allowfullscreen></iframe></div><div  id="res1">
    <div style="display: flex;justify-content:center">
<button style=";font-size: 20px;;color:white;" 
onclick="toggleDescription()" class="btnempty2" id="arrow">voir plus ↓</button></div>
<div  id="linee"></div>
<div id="description" style="display: none;overflow:auto;;text-overflow: ellipsis;width:100%">
    <h5 class="text-white" style="margin:10px">Description</h5>
    <p  style="margin: 10px;max-width:fit-content;word-wrap: break-word;">{{$video->description}}</p>
    <span style="font-size:10px;padding:0px;margin:0px;color:grey">{{$video->created_at->format('Y-m-d')}}</span>
</div>
</div></div>
        <div class="extra" >
        <h4 class="text-white" id="recommande">Recommandé</h4><div style="display: grid;grid-template-columns;100%;">
   
    @foreach ($altvideo as $item)
    <a href="{{ route('video.show', $item->id) }}" style="text-decoration: none;">
      <div class="card cc" style="width: 100%;background-color:var(--dark); max-width: 300px; ;border:0;border-radius-:0">
        <div style="overflow: hidden; height: 150px;" class="image-container3">
          <img class="img3" src="{{asset('laravel/public/img/'.$item->image)}}" class="card-img-top" style="width: 100%; height: 100%; object-fit: cover;">
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
</div>

<div  id="res4" style=";border-top:white; 1px solid;;text-overflow: ellipsis;grid-column: span 2;width:68% " >
    <h4 class="text-white" style=";margin-top:1%">commentaires</h4>
    <div style="overflow:auto;">@foreach($comments as $item)
        <div style="border:white 0px solid;padding:5px;margin-bottom:5px;border-radius:5px">
        <h6 style="color:var(--primary);margin-bottom:1px"><i class="fa-regular fa-circle-user" style="color:white;font-size:20px"></i> {{$item->username}}</h6>
        <p style="word-wrap: break-word;color: rgb(214, 214, 214) ;padding-left:3%">{{$item->content}}</p>
        </div>
        @endforeach
    </div>
    @auth
    <div>
        <form action="{{route('commentaire.store')}}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <input type="hidden" name="username" value="{{Auth::user()->name}}">
            <input type="hidden" name="video_id" value="{{$video->id}}">
            <input name="content"   placeholder="  ecrire un commentaire...." class="form-control bc" style="max-width:100%;margin-top:30px;width: 75%;display:inline-flex;background-color:var(--dark);
            padding:0;border-top:0;border-right:0;border-left:0;border-bottom:white 2px solid;border-radius:0"><button class="btnempty" id="btnnn" >commenter</button>
        </form>
    </div>
 
    @else
    <div>voulez vous commentez?<a href='{{route('login')}}'>se connectez</a></div>
    @endauth
</div>
<div></div>
<div></div>
</div>

</div>


<script>
function responsive(){

const widthOfRes2 = document.getElementById('res2').getBoundingClientRect().width;

document.getElementById('res1').style.maxWidth = widthOfRes2 + 'px';
document.getElementById('res4').style.maxWidth = widthOfRes2 + 'px';
if(window.innerWidth<600){
    document.getElementById('btnnn').setAttribute('class','btn btn-primary')
    document.getElementById('recommande').style.borderBottom='white 1px solid'
}else{
    document.getElementById('btnnn').setAttribute('class','btnempty')
    document.getElementById('recommande').style.borderBottom='0'
}}

responsive()
window.addEventListener('resize', responsive);


    function toggleDescription() {
        var description = document.getElementById("description");
      
    if (description.style.opacity === "0" || description.style.opacity === "") {
    description.style.display = "block"
    description.style.opacity = "1"
    document.getElementById('arrow').innerText="voir moins ↑";
} else {
    const addedDiv = document.getElementById('addedDiv');
    if(addedDiv){
        addedDiv.style.display = 'none';
    }
    description.style.opacity = "0"
    document.getElementById('arrow').innerText="voir plus ↓";
    setTimeout(function () { description.style.display = "none"; }, 300);}
description.style.transition = "opacity 0.4s  ease-in-out"
}
</script>
@endsection