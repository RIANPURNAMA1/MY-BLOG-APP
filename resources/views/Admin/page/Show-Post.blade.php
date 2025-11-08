@extends('Admin.Layouts.index')

@section('content')
   <div class="container">
    <h2 class="my-3 text-center ">DetailPostngan</h2>
    <hr>
   </div>
<div class="container d-flex align-items-center" >
    <div class="card mb-3" style="">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="{{asset('gambar/'. $blog->image)}}" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">{{ $blog->title }}</h5>
              <p class="card-text">{!! $blog->description!!}</p>
              <p class="card-text"><small class="text-body-secondary">{{$blog->tanggal}}</small></p>
              <p class="card-text"><small class="text-body-secondary">{{$blog->created_at}}</small></p>
              <button class="btn-login my-4" onclick="window.location.href='/admin'">Kembali</button>
            </div>
          </div>
        </div>
      </div>

</div>
@endsection