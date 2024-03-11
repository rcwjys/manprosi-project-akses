<!-- Import Template -->
@extends('template.main-template')

<!-- Set Title Halaman -->
@section('title', 'UPTD Puskesmas Babakan Tarogong')

<!-- Set class active -->
@section('education', 'active')

<!-- Import Layouting -->
@section('content')

    <main>
        <div class="container mt-5">
            <h1 class="text-capitalize">{{ $post->post_title }}</h1>
            <p class="text-muted">Diupload Pada : {{ $uploadDate }} | Oleh: {{ $post->employee->employeeName }}</p>
            <p class="mt-3">{{ $post->post_body }}</p>

            <a type="button" class="btn mt-3 back-btn" href="/public-education">Kembali</a>
        </div>
    </main>



@endsection
