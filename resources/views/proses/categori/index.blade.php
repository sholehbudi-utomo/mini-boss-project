@extends('layout.app')
@section('title')
    Management | Categori
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
                  <label for="validationDefault01" class="form-label">Nama Kategori</label>
                  <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="col-md-4">
                  <label for="validationDefaultUsername" class="form-label">Gambar</label>
                  <div class="input-group">
                    <input type="file" class="form-control" id="gambar" name="gambar" aria-describedby="inputGroupPrepend2" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="validationDefault03" class="form-label">Deskripsi kategori</label>
                  <textarea  type="text" class="form-control" id="description" rows="3" name="description" ></textarea>
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
                        <th>Picture</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr >
                        <th>Name</th>
                        <th>Discription</th>
                        <th>Picture</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($kategori as $kategori)
                    <tr> <td>{{ $kategori->name }}</td>
                        <td>{{ $kategori->description }}</td>
                        <td> <img src="file/categori/{{ $kategori->gambar }}" width="50px"> </td>
                        <td><a href="/view/categori/{{ $kategori->id }}" class="btn btn-warning btn-sm w-50 position-relative"><i class="fa fa-pencil"></i></a></td>
                        <td><a href="/delete/{{ $kategori->id }}"class="btn btn-danger btn-sm w-50"><i class="fa fa-trash"></i></a></td>
                    </tr>  
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>    
@endsection