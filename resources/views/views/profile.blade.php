@extends('layout.master')

@section('header')
    @include('layout.nav')
@endsection

@section('main')

    <div class="container mt-4">
    <div class="card bg-dark" style="background-image: url('{{ asset('laravel/public/img/carousel-1.jpg') }}'); background-size: cover; background-position: center;">
            <div class="card-body">
                <h1 class="card-title  text-primary">Welcome <strong>{{ auth()->user()->name }}</strong> to Your Profile</h1>
                <hr>

                <div class="row">
                    <div class="col-md-4 mx-auto">
                        <h5 class="text-primary">Your Information</h5>
                        <table class="table table-borderless">
                      
                        <tr >
                              
                               
                                <td class="w-50"><img  src="{{asset('laravel/public/profile/'.$detailsuser->image)}}" style="border: 1px solid;height:200px;width:200px;border-radius:100%" alt="user image"></td>
                               
                            </tr>
                       
                            <tr style="color:white;">
                                <th class="w-50">Name</th>
                                <td class="w-50">{{ auth()->user()->name }}</td>
                            </tr>
                            <tr style="color:white;">
                                <th class="w-50">Email</th>
                                <td class="w-50">{{ auth()->user()->email }}</td>
                            </tr>
                          
                            <tr style="color:white;">
                                <th class="w-50">Adresse</th>
                                <td class="w-50">{{ $detailsuser->adresse }}</td>
                            </tr>
                            <tr style="color:white;">
                                <th class="w-50">sexe</th>
                                <td class="w-50">{{ $detailsuser->sexe }}</td>
                            </tr>
                          
                            <tr style="color:white;">
                                <th class="w-50">Poids</th>
                                <td class="w-50">{{ $detailsuser->poids }} kg</td>
                            </tr>
                            <tr style="color:white;">
                                <th class="w-50">reservations</th>
                            <td class="w-50"> sabor</td>
                            </tr>
                            <tr style="color:white;"> 
                                <th class="w-50">commandes</th>
                                <td class="w-50">yassin</td>
                            </tr>
                            <tr style="color:white;">
                                <th class="w-50">programmes</th>
                                <td class="w-50">sabor</td> {{-- ta 7yd smiti--}}
                            </tr>
                            <tr >
                                <td> <form id="logoutForm" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" 
                            onmouseover="changeColor('#FF4500')" 
                            onmouseout="changeColor('#FFA500')"   
                            style="background-color: #FFA500; color: black; border: none; padding: 10px 20px; cursor: pointer; transition: background-color 0.3s ease;">
                        Logout
                    </button>
                    
                </form>

                <script>
                    function changeColor(color) {
                        var button = document.getElementById('logoutForm').querySelector('button');
                        button.style.backgroundColor = color;
                    }
                </script></td>
                <td>
                <a href="{{ route('profile.edit') }}" class="btn btn-warning">Edit</a>
                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-md-8">
                   
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection