@extends('layouts.main')

<style>
    table {
        justify-content: center;
        align-content: center;
        text-align: center;
    }

    .title {
        padding-top: 50px;
    }

</style>
@section('container')
    <div class="title d-flex align-items-center justify-content-center">
        <h1>List Product</h1>
    </div>
    <hr>
    {{-- memeriksa apakah ada sesi (session) dengan kunci 'success' --}}
    @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Jenis Barang</th>
            <th>Aksi</th>
        </tr>
        @if ($tokos->count() > 0)
        {{-- lakukan perulangan bila data lebih > 0 --}}
            @foreach ($tokos as $toko)  
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $toko->nama }}</td>
                    <td class="align-middle">{{ $toko->harga }}</td>
                    <td class="align-middle">{{ $toko->jenis }}</td>
                    <td class="align-middle">
                        <a href="{{ route('toko.show', $toko->id) }}" class="btn btn-secondary">Detail</a>
                        <a href="{{ route('toko.edit', $toko->id) }}" class="btn btn-warning">Update</a>
                        <form action="{{ route('toko.destroy', $toko->id) }}" method="POST" class="btn btn-danger p-0 m-0" onsubmit="return confirm('Delete Product?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>                        
                    </td>
                </tr>
            @endforeach
            {{-- else jika tidak ada data ditemukan --}}
        @else
        <tr>
            <td class="text-center" colspan="5">Items Not Found</td>
        </tr>
        @endif
    </table>
@endsection
