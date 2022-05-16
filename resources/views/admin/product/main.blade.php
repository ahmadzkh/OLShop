@extends('template.dashboard')
@section('title', 'Farel Shop | Products')
@section('css')
@endsection
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Produk</h1>
    <form action="" method="get" class="d-sm-flex mb-0">
        @csrf
        <div class="input-group">
            <input type="text" name="search" autocomplete="off" class="form-control" placeholder="Cari Produk" aria-label="Cari Produk" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
        </div>
    </form>
</div>

<div class="row">
    @foreach ($products as $product)
    <div class="col-2">
        <div class="card">
            <img src="{{ $product->getImage() }}" class="card-img-top" alt="{{ $product->name }}">
            <div class="card-body">
                <a href="{{ route('admin.product.detail', $product->slug) }}" class="text-decoration-none">
                    <h5 class="card-title">{{ $product->name }}</h5>
                </a>
                <p class="card-text">Rp {{ number_format($product->price, '2', ',', '.') }}</p>
                <hr>
                <p class="card-text"><small class="text-muted">{{ \Carbon\Carbon::parse($product->created_at)->diffForHumans() }}</small></p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
@section('script')
@endsection
