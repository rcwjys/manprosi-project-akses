<!-- Import Template -->
@extends('admin.template.main-template')

<!-- Set Title Halaman -->
@section('title', 'UPTD Puskesmas Babakan Tarogong')

@section('posts', 'active')

<!-- Import Layouting -->
@section('content')

    <main>
        <div class="container">
            <div class="container mt-3">
                @if (session()->has('postSuccessMessage'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('postSuccessMessage') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session()->has('postDeleted'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('postDeleted') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Add Medicine Button -->
                <a href="{{ url('/education/create') }}" class="btn btn-primary mt-5 medicine-add-btn">+ Tambah Data
                    Bacaan</a>

                <div class="row grid row-gap-3 col-gap-3 mt-4">
                    @foreach ($posts as $post)
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-capitalize">
                                        {{ $post->post_title }}
                                    </h5>
                                    <a href="{{ route('post-detail', ['post_id' => $post->post_id]) }}" class="card-link"
                                        style="color: #019F90;">Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>


@endsection
