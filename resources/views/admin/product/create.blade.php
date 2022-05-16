@extends('template.dashboard')
@section('title', 'Farel Shop | Products')
@section('css')
<script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>
@endsection
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-5">
    <h1 class="h3 mb-0 text-gray-800">Tambah Produk Baru</h1>
</div>

<div class="container-fluid">
    <div class="row justify-content-between">
        <div class="col-xl-5 col-md-7 mb-3">
            <form action="{{ route('admin.product.store') }}" method="post" class="px-3 py-3">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control form-control-md" id="name">
                </div>
                <div class="mb-3">
                    <label for="spesifikasi" class="form-label">Spesifikasi</label>
                    <input type="text" class="form-control form-control-md" id="spesifikasi">
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="text" class="form-control form-control-md" id="harga">
                </div>
                <div class="mb-3">
                    <label for="editor" class="mb-2">Deskripsi</label>
                    <textarea name="deskripsi" id="editor">{{ old('deskripsi') }}</textarea>
                </div>
                <div class="mb-5">
                    <label for="image" class="form-label">Gambar</label>
                    <input type="file" name="image" class="form-control form-control-md" id="image">
                </div>
                <div class="mb-3 text-end">
                    <div class="row justify-content-between">
                        <div class="col-5">
                            <a href="{{ route('admin.product.main') }}" class="btn btn-secondary w-100">Cancel</a>
                        </div>
                        <div class="col-5">
                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-xl-5 col-md-7 py-4 px-4">
            <img src="{{ asset('assets/img/undraw_posting_photo.svg') }}" alt="" width="250" class="text-center">
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
        console.error(error);
    });
</script>
@endsection
