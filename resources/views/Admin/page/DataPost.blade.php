@extends('Admin.Layouts.index')

@section('content')
@include('Admin.page.Tambah-Post')

@if ($errors->any())
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @foreach ($errors->all() as $error)
        <script>
            swal("Error", "{{ $error }}", "error");
        </script>
    @endforeach
@endif

@if (session()->has('success'))
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        swal("Success", "{{ session('success') }}", "success"),then(function() {
            window.location.reload();
        });
    </script>
@endif

<div class="row mt-4">
    <div class="col-lg-3 col-md-12 col-sm-12 my-3">
        <div class="card p-3 shadow shadow-sm text-center">
            <h3><i class="fas fa-file-alt"></i> Data Post</h3>
            <h1>{{ $blogs->count() }}</h1>
        </div>
    </div>
    <div class="col-lg-3 col-md-12 col-sm-12 my-3">
        <div class="card p-3 shadow shadow-sm text-center">
            <h3><i class="fas fa-users"></i> User Login</h3>
            <h1>{{ $users->count() }}</h1>
        </div>
    </div>
    <div class="col-lg-3 col-md-12 col-sm-12 my-3">
        <div class="card p-3 shadow shadow-sm text-center">
            <h3><i class="fas fa-envelope"></i> Pesan Masuk</h3>
            <h1>{{ $pesan->count() }}</h1>
        </div>
    </div>
</div>

<h4 class="mt-5 fw-bold">Halaman data post Admin</h4>
<hr class="my-4">
<div>
    <div class="btn btn-register my-3" id="tambah-data"> <i class="fas fa-plus"></i> Tambah Data</div>
</div>

<div class="table-responsive">
    <table id="myTable" class="display table table-striped">
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>Tanggal</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $blog)
            <tr>
                <td><img src="{{ asset('gambar/' . $blog->image) }}" alt="{{ $blog->title }}" width="100" height="100" style="object-fit: cover; background-position: center"></td>
                <td>{{ $blog->title }}</td>
                <td>{{ $blog->category}}</td>
                <td>{{ $blog->tanggal }}</td>
                <td>
                    <a href="{{route('admin.show', $blog->id)}}" class="btn btn-info"><i class="fas fa-eye"></i> View</a>
                    <a href="{{route('admin.edit', $blog->id)}}" class="btn btn-primary"> <i class="fas fa-edit"></i> Edit</a>
                    <button type="button" class="btn btn-danger delete-btn" data-id="{{ $blog->id }}"><i class="fas fa-trash"></i> Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch; /* Enables momentum scrolling on iOS */
    }

    /* Optional: Add some padding to the table */
    .table-responsive table {
        width: 100%; /* Ensures the table takes full width */
        min-width: 1000px; /* Sets a minimum width for the table */
    }
</style>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();

        $('#tambah-data').click(function() {
            $('#modal-tambah').modal('show');
        })

        $("#close").click(function(){
            $('#modal-tambah').modal('hide');
        })

        $("#edit").click(function(){
            $('#modal-Edit').modal('show');
        })

        $('.delete-btn').click(function() {
            var blogId = $(this).data('id');
            var url = "{{ route('admin.destroy', ':id') }}".replace(':id', blogId);

            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this blog post!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            _token: "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            if (response.success) {
                                swal("Poof! Your blog post has been deleted!", {
                                    icon: "success",
                                }).then(() => {
                                    location.reload();
                                });
                            } else {
                                swal("Failed to delete the blog post.", {
                                    icon: "error",
                                });
                            }
                        }
                    });
                } else {
                    swal("Your blog post is safe!");
                }
            });
        });
    });
</script>
@endsection
