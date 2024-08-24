@extends('Website.Layouts.index')
@section('content-web')
    <div class="container" style="margin-top: 10rem">

        <div class="row">
            <div class="col-lg-12 col-md-6 mb-4">

                @if ($data->count() == 0)

                    <h1 class="text-center">Data Not Found</h1>
                    
                @endif
                @foreach ($data as $posts)
                <p>Postingan yang kamu cari : {{ $search ?? 'default' }}</p>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card shadow shadow-md p-2">
                            <div class="card-img-container">
                                <img src="{{ asset('images/' . $posts->image) }}" class="card-img-top" alt="Sample Post 1">
                                @if (Auth()->check())
                                    <a href="{{ route('detail', $posts->id) }}" class="eye-icon">
                                        <i class="fas fa-eye text-dark"></i>
                                    </a>
                                @else
                                    <a onclick="showLoginAlert()" class="eye-icon">
                                        <i class="fas fa-eye text-dark"></i>
                                    </a>
                                @endif
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $posts->title }}</h5>
                                <p class="card-text"> {!! Str::limit(strip_tags($posts->description), 100) !!}</p>
        
                                <p><i class="fa fa-user me-2"></i> {{ $posts->category }}</p>
                                <p class="card-date"><i class="fas fa-calendar-alt"></i> {{ $posts->tanggal }}</p>
                                <p class="card-comments">
                                    <i class="fas fa-comments"></i> Komentar: {{ $posts->comments->count() }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach


                <a href="{{ route('home') }}" class="btn btn-login my-3">Kembali <i class="fa-solid fa-right-long"></i></a>
            </div>
        </div>


    </div>
@endsection
