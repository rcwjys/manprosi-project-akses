<!-- Import Template -->
@extends('template.main-template')

<!-- Set Title Halaman -->
@section('title', 'UPTD Puskesmas Babakan Tarogong')

<!-- Set class active -->
@section('education', 'active')

<!-- Import Layouting -->
@section('content')

    <main>
        @if (count($posts) < 1)
            <h1 class="text-center mt-5">Data Tidak Tersedia</h1>
        @else
            <div class="container mt-5">
                <h1 class="">Halaman Edukasi</h1>
                <div class="row mt-3">
                    @foreach ($posts as $post)
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $post->post_title }}</h5>
                                    <p class="card-text">
                                        {{ $post->post_description }}
                                    </p>
                                    <a href="{{ url('/public-education/' . $post->post_id) }}" type="button"
                                        class="btn btn-primary"
                                        style="background-color: #019F90; border-color: #019F90">Baca
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </main>

@endsection
