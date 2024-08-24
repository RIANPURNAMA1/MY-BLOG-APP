@extends('Website.Layouts.index')

@section('content-web')
<div class="container p-5 " style="margin-top: 6rem">
    <h1>Edit Comment</h1>
    <hr class="my-2">
    
    @if (session()->has('success'))
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
            });
        </script>
    @endif
    <form action="{{ route('comments.update', $comment->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="content" class="form-label">Comment Content</label>
            <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content', $comment->content) }}</textarea>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-login">Update Comment</button>
            <a href="{{ route('detail', $comment->blog->id) }}" class="btn btn-register mx-2">Kembali <i class="fa-solid fa-right-long"></i></a>
        </div>
    </form>
</div>

@endsection