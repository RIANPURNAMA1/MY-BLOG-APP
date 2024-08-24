@extends('Website.Layouts.index')
@section('content-web')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">


    {{-- login --}}
    @include('Website.Page.Auth')

    <!-- Hero Section -->


    <div id="home" class="container hero d-flex align-items-center mt-4" style="padding-top: 6rem">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-4 col-md-12 text-center">
                <img src="{{ asset('images/business-3d-happy-robot-assistant-waving-hello.png') }}" alt="Robot Assistant"
                    class="img-fluid">
                <a class="navbar-brand fw-bold text-danger fs-1" href="#">RII<span class="text-dark">DEV</span></a>
                <p>Website Blogs Post</p>
            </div>
            <div class="col-lg-6 col-md-12">
                <h1>Mari Jelajah Website Blogs Kami!</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt reiciendis totam perspiciatis, repudiandae
                    nulla corrupti corporis voluptatum! Ipsam veritatis neque deleniti assumenda quos minus molestias quis,
                    maxime quam inventore ad.</p>
                <button class="btn-login">Lihat Postingan Kami</button>
            </div>
        </div>
    </div>

    @error('name')
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            swal("Error", "{{ $message }}", "error");
        </script>
    @enderror
    @error('email')
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            swal("Error", "{{ $message }}", "error");
        </script>
    @enderror
    @error('password')
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            swal("Error", "{{ $message }}", "error");
        </script>
    @enderror
    @if (session()->has('success'))
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            swal({
                title: "Good job!",
                text: "{{ session('success') }}",
                icon: "success",
                button: "Ok",
            }).then (function() {
                window.location.reload();
            });
        </script>
    @endif

    <!-- Category Section -->
    <div class="category mt-5 mb-5">
        <div class="container pt-5">
            <p class="categ"> Berdasarkan Kategori</p>
            <div class="row">
                <div class="col-12">
                    <h2>Jelajahi Berdasarkan Kategori</h2>
                    <div class="row d-flex justify-content-center mt-4">
                        <div class="col-categ col-lg-2 col-md-4 col-sm-6 text-center mb-3" style="margin-top: -1rem;">
                            <div class="category-box p-3 bg-light border rounded">
                                <h5><i class="fas fa-laptop-code me-2"></i>Teknologi</h5>
                                <p class="text-start">Lorem ipsum dolor sit amet consectetur.</p>
                                <div class="d-flex justify-content-start">
                                    <a href="{{ route('category', ['category' => 'technology']) }}"
                                        class="btn btn-outline-dark"> Read More <i class="fa-solid fa-right-long"></i> </a>
                                </div>
                            </div>
                        </div>
                        <div class=" col-categ col-lg-2 col-md-4 col-sm-6 text-center mb-3" style="margin-bottom: -1rem;">
                            <div class="category-box p-3 bg-light border rounded">
                                <h5><i class="fas fa-heartbeat me-2"></i>Health</h5>
                                <p class="text-start">Lorem ipsum dolor sit amet consectetur.</p>
                                <div class="d-flex justify-content-start">
                                    <a href="{{ route('category', ['category' => 'health']) }}"
                                        class="btn btn-outline-dark"> Read More <i class="fa-solid fa-right-long"></i> </a>
                                </div>
                            </div>
                        </div>
                        <div class=" col-categ col-lg-2 col-md-4 col-sm-6 text-center mb-3" style="margin-top: -1rem;">
                            <div class="category-box p-3 bg-light border rounded">
                                <h5><i class="fas fa-theater-masks me-2"></i>Entertainment</h5>
                                <p class="text-start">Lorem ipsum dolor sit amet consectetur.</p>
                                <div class="d-flex justify-content-start">
                                    <a href="{{ route('category', ['category' => 'entertainment']) }}"
                                        class="btn btn-outline-dark"> Read More <i class="fa-solid fa-right-long"></i> </a>
                                </div>
                            </div>
                        </div>
                        <div class=" col-categ col-lg-2 col-md-4 col-sm-6 text-center mb-3" style="margin-bottom: -1rem;">
                            <div class="category-box p-3 bg-light border rounded">
                                <h5><i class="fa fa-flask me-2 "></i>Science</h5>
                                <p class="text-start">Lorem ipsum dolor sit amet consectetur.</p>
                                <div class="d-flex justify-content-start">
                                    <a href="{{ route('category', ['category' => 'science']) }}"
                                        class="btn btn-outline-dark"> Read More <i class="fa-solid fa-right-long"></i> </a>
                                </div>

                            </div>
                        </div>
                        <div class=" col-categ col-lg-2 col-md-4 col-sm-6 text-center mb-3" style="margin-top: -1rem;">
                            <div class="category-box p-3 bg-light border rounded">
                                <h5><i class="fa fa-futbol me-2"></i>Sport</h5>
                                <p class="text-start">Lorem ipsum dolor sit amet consectetur.</p>
                                <div class="d-flex justify-content-start">
                                    <a href="{{ route('category', ['category' => 'sports']) }}"
                                        class="btn btn-outline-dark"> Read More <i class="fa-solid fa-right-long"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Postingan Section -->
    <div id="blog" class="postingan mt-5">
        <div class="container">
            <p class="categ">Postingan Terpopuler</p>
            <h2 class="mb-4">Semua Postingan Pada Website Blog Post Kami</h2>
            <div class="row">

                @if (count($data) == 0)
                    <p class="text-center"
                        style="height: 100px; width: 100%; font-size: 20px ; display: flex; justify-content: center; align-items: center ">
                        Tidak Ada Postingan</p>
                @endif
                @foreach ($data as $posts)
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card shadow shadow-md p-2">
                            <div class="card-img-container">
                                <div class="d-flex justify-content-center">

                                    <img src="{{ asset('images/' . $posts->image) }}" class="card-img-top" style="width: 200px ;" alt="Sample Post 1">
                                </div>
                                @if (Auth()->check())
                                    <a href="{{ route('detail', $posts->id) }}" class="eye-icon">
                                        <i class="fas fa-eye text-dark"></i>
                                    </a>
                                @else
                                    <a onclick="showLoginAlert()"
                                         class="eye-icon">
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
                                <a href="/detail/{{ $posts->id }}" class="btn btn-register detail-mobile">Detail Blog <i class="fa-solid fa-right-long"></i> </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="contact" id="contact">
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-6 col-md-12 shadow p-4 rounded-md m-2">
                    <h1 class="text-center">Contact Me</h1>
                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-register">Submit</button>
                    </form>
                </div>
                <div class="col-lg-5 col-md-12 bg-sosmed shadow-md m-2 text-light p-4">
                    <h1 class="text-center">Address</h1>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <p>Jl. Kaliurang KM 1,5, Depok, Sleman, Yogyakarta</p>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod asperiores non neque sapiente nostrum accusamus quos. Iusto obcaecati quod tenetur corporis commodi assumenda excepturi rem! Facere perspiciatis quis dolores magni?</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function showLoginAlert() {
            swal("Error", "Anda harus login terlebih dahulu", "error");
        }
    </script>
@endsection
