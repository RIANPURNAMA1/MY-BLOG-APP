@extends('Website.Layouts.index')

@section('content-web')
@if (session()->has('success'))
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        swal("Success", "{{ session('success') }}", "success");
    </script>
@endif
<div class="container p-5">
    <h1 class="" style="padding-top:5rem ">Detail Blog</h1>
    <hr class="my-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="">Blogs</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $data->title }}</li>
        </ol>
    </nav>
    <label for="content" class="form-label">Detail Blogs</label>
    <!-- Tampilkan detail blog -->
    <div class="col-lg-12 col-md-6 mb-4">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('images/' . $data->image) }}" class="img-fluid rounded-start" alt="{{ $data->title }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $data->title }}</h5>
                        <p class="card-text">{!! $data->description !!}</p>
                        <p class="card-text"><small class="text-body-secondary">{{ $data->tanggal }}</small></p>
                        <p class="card-text"><i class="fa fa-user me-2"></i>{{ $data->category }}</p>
                        <p class="card-comments">
                            <i class="fas fa-comments"></i> Komentar: {{ $comments->total() }} <!-- Display total comments -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-3">
        <i class="">Silahkan Berikan komentar anda</i>
        <form id="comment-form" action="{{ route('comments.store', $data->id) }}" method="POST">
            @csrf
            <input type="hidden" id="comment-id" name="comment_id" value="">
            <textarea name="content" id="content" class="form-control" rows="5"></textarea>
            <div class="modal-footer p-3">
                <button type="submit" class="btn btn-login">Submit</button>
            </div>
        </form>
    </div>

   <!-- Tampilkan komentar -->
<div class="comments-section mt-4">
    <h3>Comments</h3>
    <hr>

    @if ($comments->isEmpty()) <!-- Check if comments are empty -->
        <p>Tidak ada komentar yang tersedia silahkan beri komentar !</p>
    @endif
    @forelse ($comments as $comment)
        @if ($comment->user && $comment->content) <!-- Check if user exists -->
            <div class="card mb-2">
                <div class="card-body">
                    <h6 class="card-title">{{ $comment->user->name }}</h6>
                    <p class="card-text">{{ $comment->content }}</p>
                    <p class="card-text"><small class="text-body-secondary">{{ $comment->created_at->format('d M, Y - H:i') }}</small></p>
                </div>
                @if ($comment->user_id == Auth::user()->id)
                    <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                        <a href="{{ route('comments.edit', $comment->id) }}" class="m-3 btn btn-login edit-comment" style="width: max-content;" data-comment-id="{{ $comment->id }}" data-comment-content="{{ $comment->content }}">
                            <i class="fas fa-edit"></i> Edit
                        </a>   
                        <button type="submit" class="btn btn-login delete-comment"><i class="fas fa-trash"></i> Delete</button>
                    </form>
                @endif
            </div>
        @endif
    @empty
        <p>No comments yet.</p>
    @endforelse
</div>

    <!-- Pagination Links -->
    <div class="mt-4">
        {{ $comments->links('pagination::bootstrap-4') }} <!-- This will generate pagination links -->
    </div>

    <a href="{{ route('home') }}" class="btn btn-register my-3">Kembali <i class="fa-solid fa-right-long"></i></a>
</div>

@include('Website.Components.Footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $(".edit-comment").click(function() {
            // Ambil data dari tombol edit
            var commentId = $(this).data('comment-id');
            var commentContent = $(this).data('comment-content');
        });
    });
</script>

@endsection