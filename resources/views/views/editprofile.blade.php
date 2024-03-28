<!-- resources/views/profile/edit.blade.php -->

@extends('layout.master')

@section('header')
    @include('layout.nav')
@endsection

@section('main')
    <div class="container mt-4">
        <div class="card bg-dark">
            <div class="card-body" style="background-image: url('{{ asset('laravel/public/img/carousel-1.jpg') }}'); background-size: cover; background-position: center;">
                <h1 class="card-title  text-primary"> {{ auth()->user()->name }} Edit Your Profile</h1>
                <hr>

                <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <div class="row">
                        <div class="col-md-4 ">
                            <h5 class="text-primary">Edit Information</h5>
                            <table class="table table-borderless">
                                <tr>
                                    <th class="w-50">Name</th>
                                    <td class="w-50">
                                        <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <th class="w-50">Email</th>
                                    <td class="w-50">
                                        <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <th class="w-50">Age</th>
                                    <td class="w-50">
                                        <input type="number" name="Age" value={{ $detailsuser->age }} class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <th class="w-50">Adresse</th>
                                    <td class="w-50">
                                        <input type="text" name="adresse" value={{ $detailsuser->adresse}}  class="form-control" >
                                    </td>
                                </tr>
                                <tr>
                                    <th class="w-50">sexe</th>
                                    <td class="w-50">
                                        <select class="form-control" style="background-color:white !important">
                                            <option value="male" @if( $detailsuser->sexe=='male' ){ {{'selected'}}} @endif>male</option>
                                            <option value="female" @if( $detailsuser->sexe=='female' ){ {{'selected'}}} @endif> female</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="w-50">Poids</th>
                                    <td class="w-50">
                                        <input type="number" name="poids" value={{ $detailsuser->poids}}   class="form-control">
                                    </td>
                                </tr>
                               
                                
                                <tr>
                                    <td colspan="2" class="text-center">
                                        <button type="submit" class="btn btn-success">Save Changes</button>
                                    </td>
                                </tr>

                               
                            </table>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
