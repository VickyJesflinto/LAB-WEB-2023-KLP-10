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
        @foreach ($favorites as $item)
            <div class="col-md-6 mb-6 mb-4" style="height: 460px; width:390px">
                <div class="card">
                    <img src="{{ asset('/image/notfound.jpg') }}"
                    alt="Product Image" width="363px" height="320px" style="border-radius: 6px">
                    <div class="card-body">
                        <h5 class="card-title">Product ID :
                            <span class="badge text-bg-primary">{{ $item->product_id }}</span>
                        </h5>
                        <h6 class="text-end mb-3">User ID: {{ $item->user_id }} </h6>
                        <div class="col-md-auto">
                            <form class="" action="{{ route('favorite.delete', $item->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary bi-x" style="margin-bottom: 10px;">Delete
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection