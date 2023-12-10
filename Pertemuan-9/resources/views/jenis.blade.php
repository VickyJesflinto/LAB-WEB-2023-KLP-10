@extends('layouts.main')
<style>
    h1 {
        padding-top: 20px;
    }
</style>
@section('container')
    <div class="container mt-4">
        <div class="text-center">
            <h1 class="mb-4">Product Search Results</h1>
            <hr class="my-4">
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <ul class="list-group">
                    @forelse ($tokos as $toko)
                        <center>
                            <li class="list-group-item">
                                <a href="{{ route('toko.show', $toko->id) }}" style="color: gray;">{{ $toko->nama }}</a>
                            </li>
                        </center>
                    @empty
                        <center>
                            <li class="list-group-item">No Result Found!</li>
                        </center>
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('toko.index') }}" class="btn search">Back</a>
        </div>

    </div>
@endsection