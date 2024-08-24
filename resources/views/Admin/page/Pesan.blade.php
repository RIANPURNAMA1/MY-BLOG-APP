@extends('Admin.Layouts.index')

@section('content')

<h1 class="mt-4">Contact Form Submission</h1>
@if (session()->has('success'))
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        swal("Success", "{{ session('success') }}", "success");
    </script>
@endif

@if ($pesan->count() == 0)

    <i class="text-center">Tidak ada pesan</i>

@endif
@foreach ($pesan  as $data )
<div class="card p-3 my-2">
    <label for="" class="form-label">{{$data->name}}</label>
    <label for="" class="form-label">{{ $data->email }}</label>
    <textarea name="" id="" class="form-control" readonly>{{$data->message}}</textarea>
    <label for="" class="form-label my-2">{{$data->created_at}}</label>
    <form action="{{route('contact.destroy', $data->id)}}" method="POST">
        @csrf
        <button type="submit" class="btn btn-login" style="width:max-content;"> <i class="fa-solid fa-trash"></i> Hapus Pesan</button>
    </form>
</div>
@endforeach

@endsection