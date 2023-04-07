@extends('layout.edit')
@section('title')
Edit Kategori
@endsection

@section('conten')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Products</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ url('/produk') }}">Management Products</a></li>
       
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <div class="card-header">
                <i class="bi bi-ui-checks-grid" style="padding :10px"></i>
                Form Input
            </div>
            <form action="/update/produk/{{$producs->id}}" method="POST" enctype="multipart/form-data" class="row g-3 mt-3">
                @csrf
                @method('PUT')
                <div class="col-md-8 mt-3">
                    <label for="validationDefault01" class="form-label">Nama Produc </label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $producs->name }}">
                    @error('name')
                    <div class="invalid-feedback">
                        Belum di Isi!!
                    </div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="validationDefaultUsername" class="form-label">Gambar</label>
                    <div class="input-group">
                    <input type="file" class="form-control @error('ganbar') is-invalid @enderror" id="ganbar" name="ganbar" aria-describedby="inputGroupPrepend2" value="{{ $producs->ganbar }}">
                    @error('ganbar')
                    <div class="invalid-feedback">
                        Belum di Isi!!
                    </div>
                    @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="price" class="form-label">Harga Produk</label>
                    <input type="number"  class="form-control @error('price') is-invalid @enderror " id="price" name="price" value="{{ $producs->price }}">
                    @error('price')
                    <div class="invalid-feedback">
                        Harga harus di Isi!!
                    </div>
                    @enderror
                    </div>
                <div class="col-md-9">
                    <label for="validationDefault03" class="form-label">Kategori</label>
                <select class="form-select  @error('kategori_id') is-invalid @enderror" aria-label="Default select example" name="categori_id" id="categori_id">
                    <option selected>Pilih Kategori</option>
                    @foreach($categoris as $item)
                    <option value="{{ $item->id }}">{{ $producs->categori_id == $item->id ? 'selected' :'' }}
                    {{ $item->name }}</option>
                    @endforeach
                    </select>
                </div>
                    @error('kategori_id')
                    <div class="invalid-feedback">
                        Harus Pilih salah Satu!!
                    </div>
                    @enderror

                <div class="col-md-12">
                    <label for="validationDefault03" class="form-label">Deskripsi kategori</label>
                    <textarea  type="text" class="form-control @error('description') is-invalid @enderror" id="description" rows="3" name="description" >{{ $producs->description }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">
                        Belum di Isi!!
                    </div>
                    @enderror
                </div>
                <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Submit form</button>
                </div>
                </form>
@endsection