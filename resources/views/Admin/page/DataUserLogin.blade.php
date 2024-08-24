@extends('Admin.Layouts.index')

@section('content')
<h1 class="mt-4 mb-2">Data User Login Masuk</h1>

@if (session()->has('success'))
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        swal("Success", "{{ session('success') }}", "success");
    </script>
@endif

@if ($users->count() == 0)

    <i class="text-center">Tidak ada user</i>

@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{$user->role}}</td>
            <td>
               <form action="{{route('delete.user', $user->id)}}" method="POST">
                @csrf
                   <button type="submit" class="btn btn-login"><i class="fas fa-trash"></i> Delete</button>
               </form>
            </td>
        </tr>
        @endforeach

@endsection