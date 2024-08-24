@extends('Admin.Layouts.index')

@section('content')

@if (session()->has('success'))
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        swal("Success", "{{ session('success') }}", "success").then(function() {
            window.location.href = "{{ route('admin.index') }}";
        });
    </script>
@endif

<div class="container my-4">
    <h1>Edit Blog</h1>
    <form action="{{ route('admin.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image" onchange="previewImage(event)">
            
            <!-- Preview Gambar Baru -->
            <img id="preview" class="img-fluid mt-2" width="150" style="display: none;">
            
            <!-- Preview Gambar Lama -->
            <p><i>Gambar Lama</i></p>
            @if ($blog->image)
                <img src="{{ asset('images/' . $blog->image) }}" alt="Blog Image" class="img-fluid mt-2" width="150">
            @endif
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $blog->title }}" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" name="category" id="category">
                <option value="general">General</option>
                <option value="entertainment">Entertainment</option>
                <option value="health">Health</option>
                <option value="science">Science</option>
                <option value="sports">Sports</option>
                <option value="technology">Technology</option>
            </select>
            @error('category')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="5" required>{{ $blog->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $blog->tanggal }}" required>
        </div>

        <button type="submit" class="btn-register">Update Blog</button>
        <button type="button" class="btn-login" onclick="window.history.back()">Kembali</button>
    </form>
</div>

<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    // Inisialisasi CKEditor
    CKEDITOR.replace('description');
    
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('preview');
            output.src = reader.result;
            output.style.display = 'block'; // Tampilkan gambar preview
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

@endsection
