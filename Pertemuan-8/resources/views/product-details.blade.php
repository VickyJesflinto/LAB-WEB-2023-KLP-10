@extends('layout.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="https://blog.tripcetera.com/id/wp-content/uploads/2020/10/pulau-padar.jpg" alt="Product Image"
                    class="img-fluid">
            </div>
            <div class="col-md-8">
                @foreach ($productdetails as $item)
                    <h2>{{ $item->productName }}</h2>
                    <p>{{ $item->productDescription }}</p>
                    <p>Code: {{ $item->productCode }}</p>
                    <p>Stock: {{ $item->quantityInStock }}</p>
                    <p>Price: ${{ $item->buyPrice }}</p>
                    <a href="#" class="btn btn-primary">Buy Now</a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
