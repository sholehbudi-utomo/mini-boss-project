@extends('layout.app')
@section('title')
    List | Products
@endsection
@section('conten')
<section style="background-color: #eee;">
    <div class="text-center container py-5">
      <h4 class="mt-4 mb-5"><strong>Bestsellers</strong></h4>
      <div class="row row-cols-1 row-cols-md-3 g-4">  
        @foreach ($data as $item)
        <div class="col">
          <div class="card">
            <div class="bg-image hover-zoom ripple" data-mdb-ripple-color="light">
              <img src="file/produk/{{ $item->ganbar }}"
                class="w-100" />
              <a href="#!">
                <div class="mask">
                  <div class="d-flex justify-content-start align-items-end h-100">
                  </div>
                </div>
                <div class="hover-overlay">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </div>
              </a>
            </div>
            <div class="card-body">
             
                <h3 class="card-title mb-3">{{ $item->name }}</h3>
              
                <h5>{{ $item->categoris->name }}</h5>

                <p>{{ $item->description }}</p>
      
              <h6 class="mb-3">
                <strong class="ms-2 text-danger">Rp {{ $item->price }}</strong>
              </h6>
            </div>
          </div>
        </div>
         @endforeach
      </div>
    </div>
  </section>
    
@endsection
