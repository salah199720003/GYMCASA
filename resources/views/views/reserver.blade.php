@extends('layout.master')
@section('header')
<style>

    .aaaa{
        width: 50
    }
    @media(max-width:600px){
        .aaaa{
            width: 100%;
        }
    }
</style>
    @include('layout.nav')

@endsection 
@section('main')
<div style="display: flex;justify-content:center">
<div class="form-container aaaa" style="background-color:white;border:white   5px solid;border-radius:2px">
    <h1 class=" display-4 text-primary text-uppercase" style="text-align:center;margin-top:20px;margin-bottom:0">Gymster</h1>
    <form method="POST" action="{{ route('reserver.store') }}" class="form-row" style="padding: 8% 10% 10% 10%;">
        @csrf
        <h2>reserver une seance</h2>
        <div class="form-group">
            <input value="{{Auth::user()->id}}" name="id_user" hidden>
            <label  class="form-label text-orange" style="color:var(--dark)">Name</label>
            <input disabled value="{{Auth::user()->name}}"  type="name" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}" required autocomplete="email" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email" class="form-label text-orange" style="color: var(--dark)">Email adress</label>
            <input disabled value="{{Auth::user()->email}}" id="email" type="email" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label  class="form-label text-orange"style="color: var(--dark)">Date</label>
            <input  type="date" class="form-control " name="date" required min="<?= date('Y-m-d') ?>">
            
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
       <br>
        <button type="submit" class="btn btn-orange w-100" style="background-color:var(--primary);color:white
        ">Reserver</button>       
    </form>
            
          </div>
        </div>
        </div>
  @endsection