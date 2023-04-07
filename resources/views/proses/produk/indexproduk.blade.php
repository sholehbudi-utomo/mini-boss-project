@extends('layout.app')
@section('title')
    Manajemen | Product
@endsection
@section('conten')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tables</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <div class="card-header">
                <i class="bi bi-ui-checks-grid" style="padding :10px"></i>
                Form Input
            </div>
            <form action="{{ route("add") }}" method="POST" enctype="multipart/form-data" class="row g-3 mt-3">
              @csrf
                <div class="col-md-8 mt-3">
                  <label for="validationDefault01" class="form-label">Nama Produc </label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>
                  @error('name')
                    <div class="invalid-feedback">
                      Belum di Isi!!
                    </div>
                    @enderror
                </div>
                <div class="col-md-4">
                  <label for="validationDefaultUsername" class="form-label">Gambar</label>
                  <div class="input-group">
                    <input type="file" class="form-control @error('ganbar') is-invalid @enderror" id="ganbar" name="ganbar" aria-describedby="inputGroupPrepend2" required>
                    @error('ganbar')
                    <div class="invalid-feedback">
                      Belum di Isi!!
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-3">
                    <label for="price" class="form-label">Harga Produk</label>
                    <input type="number"  class="form-control @error('price') is-invalid @enderror " id="price" name="price">
                    @error('price')
                    <div class="invalid-feedback">
                      Harga harus di Isi!!
                    </div>
                    @enderror
                  </div>
                <div class="col-md-9">
                    <label for="validationDefault03" class="form-label">Kategori</label>
                <select class="form-select  @error('kategori_id') is-invalid @enderror" aria-label="Default select example" name="categori_id">
                    <option selected>Pilih Kategori</option>
                    @foreach($categoris as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                  <textarea  type="text" class="form-control @error('description') is-invalid @enderror" id="description" rows="3" name="description" ></textarea>
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
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Table Kategori
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Discription</th>
                        <th>Categori</th>
                        <th>Price</th>
                        <th>Picture</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr >
                        <th>Name</th>
                        <th>Discription</th>
                        <th>Categori</th>
                        <th>Price</th>
                        <th>Picture</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </tfoot>
                <tbody>
                   @foreach ($producs as $item)
                   <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->categoris->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td> <img src="file/produk/{{ $item->ganbar }}" width="50px"> </td>
                    <td><a href="/view/produk/{{ $item->id }}" class="btn btn-warning btn-sm w-50 position-relative"><i class="fa fa-pencil"></i></a></td>
                    <td><a href="/delete/{{ $item->id }}"class="btn btn-danger btn-sm w-50"><i class="fa fa-trash"></i></a></td>
                </tr> 
                       
                   @endforeach
                     
                   
                </tbody>
            </table>
        </div>
    </div>
</div>    
@endsection