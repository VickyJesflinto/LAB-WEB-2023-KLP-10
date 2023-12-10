@extends('layouts.app')

@section('content')
    <style>
        .card {
            height: 100%;
        }
        
        .card-title {
            letter-spacing: 0.5px;
            line-height: 1.5;
        }
        
        .card-body {
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        
        .card-text {
            flex-grow: 1;
            overflow: hidden;
        }
   
        .grid-container {
            display: flex;
            grid-template-columns: repeat(3, 1fr);
            width: 100%;
            max-height: 100vh; /* Tentukan ketinggian maksimum grid yang dapat di-scroll */
            overflow-y: auto; /* Tambahkan overflow-y untuk membuat grid dapat di-scroll */
        }
        
    </style>

    <div class="grid-container col-12">
        <div class="row ">
            @foreach ($products as $item)
                <div class="col-md-6 mb-6 mb-4" style="height: 650px; width:390px">
                    <div class="card">
                        <img src="{{ asset('/image/'.$item->imagePath) }}"
                        alt="Product Image" width="364px" height="350px" style="border-radius: 6px">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->productName }}
                                <span class="badge text-bg-primary">{{ $item->productLine }}</span>
                            </h5>
                            <p class="card-text">{{ substr($item->productDescription, 0, 100) }}...</p>
                            <h6 class="text-end mb-3">Stock: {{ $item->quantityInStock }}</h6>
                            <h6 class="text-end mb-3">IDR {{ $item->buyPrice }}</h6>
                            <div class="row" style="justify-content:space-around">
                                <div class="col-md-4">
                                    <form class="" action="{{ route('carts.addToCart', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary" style="margin-bottom: 10px;">
                                            <i class="bi bi-cart-plus me-2" width="16" height="16"></i>Add
                                    </form>
                                </div>
                                <div class="col-md-4">
                                    <form class="" action="{{ route('favorite.addToFavorite', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary" style="margin-bottom: 10px;">
                                            <i class="bi bi-heart-fill me-2" width="16" height="16"></i>Like
                                    </form>
                                </div>
                            </div>
                            <a href="/product/{{ $item->id }}" class="btn btn-primary mt-auto">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection