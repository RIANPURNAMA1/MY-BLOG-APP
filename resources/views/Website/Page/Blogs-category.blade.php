@extends('Website.Layouts.index')
@section('content-web')

<div class="container p-5">
       <h1 class=" " style="padding-top:5rem ">Category Blog : {{ $data->first()->category ?? 'Tidak ada Category'}} <a href="{{ route('home') }}" class="btn ">Kembali <i class="fa-solid fa-right-long"></i></a></h1>
       <hr class="my-2">
       @foreach ($data as $posts)
       <div class="col-lg-12 col-md-6 mb-4">
           <div class="card mb-3" style="">
               <div class="row g-0">
                   <div class="col-md-4">
                       <img src="{{ asset('images/' . $posts->image) }}" class="img-fluid rounded-start" alt="{{ $posts->title }}">
                   </div>
                   <div class="col-md-8">
                       <div class="card-body">
                           <h5 class="card-title">{{ $posts->title }}</h5>
                           <p class="card-text">{!! Str::limit(strip_tags($posts->description), 100) !!}</p>
                           <p class="card-text"><small class="text-body-secondary">{{ $posts->tanggal }}</small></p>
                           <p class="card-text"><i class="fa fa-user me-2"></i>{{ $posts->category }}</p>
                           <p class="card-comments">
                               <i class="fas fa-comments"></i> Komentar: 5
                           </p>
                           <a href="/detail/{{ $posts->id }}" class="btn btn-register">Detail Blog</a>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       @endforeach
   </div>
   

@endsection