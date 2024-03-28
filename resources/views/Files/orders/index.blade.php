@extends('layout.master')
@section('menu3','active')
@section('header')
    @include('layout.nav')
@endsection 
@section('main')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Ma Boutique</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categories.index') }}">Catégories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('produits.index') }}">Produits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('all.orders') }}">Commandes</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


    <div class="container py-2">
        <h1>All Orders</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>User ID</th>
                    <th>Total</th>
                    <th>Date</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->id_client }}</td>
                    <td>{{ $order->total }} MAD</td>
                    <td>{{ $order->created_at }}</td>
                    <td><a href="{{ route('orders.show', ['id' => $order->id]) }}">Details</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection