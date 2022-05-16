@extends('template.dashboard')
@section('title', 'Farel Shop | Admin Dashboard')

@section('css')
<link rel="stylesheet" href="{{ asset('/assets/css/pages/dashboard.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('/assets/css/sb-admin-2.min.css') }}"> --}}
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Product Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Produk</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $product_count }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-box fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Pemasukan (Tahunan)
                        </div>
                        @if ($earn !== null)
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp {{ number_format($earn->total) }}</div>
                        @endif
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Orders Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pesanan Tertunda</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pending_count }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Done Orders Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Pesanan Selesai</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $completed_count }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Notifications</h1>
</div>

{{-- Content Row --}}
<div class="row">
    <div class="col-12 my-1">
        <div class="card">
            <div class="card-body py-2">
                <div class="d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                        </div>
                    </div>
                    <a href="#" class="text-decoration-none">
                        <div class="small text-gray-500">December 12, 2019</div>
                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection
