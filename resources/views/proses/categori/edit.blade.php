@extends('layout.edit')
@section('title')
Edit Kategori
@endsection

@section('conten')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Kategori</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ url('/categori') }}">Categori</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <div class="card-header">
                <i class="bi bi-ui-checks-grid" style="padding :10px"></i>
                Form Input
            </div>
            <form action="/update/categori/{{ $edit->id }}" method="POST" enctype="multipart/form-data" class="row g-3 mt-3">
              @csrf
              @method('put')
                <div class="col-md-8 mt-3">
                  <label for="validationDefault01" class="form-label">Nama Kategori</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ $edit->name}}">
                </div>
                <div class="col-md-4">
                  <label for="validationDefaultUsername" class="form-label">Gambar</label>
                  <div class="input-group">
                    <input type="file" class="form-control" id="gambar" name="gambar" aria-describedby="inputGroupPrepend2" value="{{ $edit->gambar}}">
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="validationDefault03" class="form-label">Deskripsi kategori</label>
                  <textarea  type="text" class="form-control" id="description" rows="3" name="description" >{{ $edit->description }}</textarea>
                </div> 
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="submit">Submit form</button>
                </div>
              </form>
        </div>
    </div>
</div>    
@endsection