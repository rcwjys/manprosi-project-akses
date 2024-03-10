<!-- Import Template -->
@extends('admin.template.main-template')

<!-- Set Title Halaman -->
@section('title', 'UPTD Puskesmas Babakan Tarogong')

@section('posts', 'active')

<!-- Import Layouting -->
@section('content')


    <main>
        <div class="container mt-5">
            <div class="card">
                <div class="card-header">
                    Tambah Data Bacaan
                </div>
                <form action="{{ url('/education/create') }}" method="POST" class="px-5 py-5">
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputEmail1">Judul Postingan</label>
                        <input type="text" value="{{ old('post_title') }}" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" name="post_title" required>
                        @error('post_title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Isi Postingan</label>
                        <textarea class="form-control @error('post_body') is-invalid @enderror " name="post_body"
                            id="exampleFormControlTextarea1" rows="5" required></textarea>
                        @error('post_body')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="hidden" value="{{ session('employeeId') }}" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp" name="employeeId" required>
                    </div>

                    <a href="/education" class="btn btn-primary mt-5 mr-3 back-btn">Kembali</a>

                    <button type="submit" name="submit" class="btn btn-primary submit-button ml-2 mt-5">Tambah</button>
                </form>
            </div>
        </div>
    </main>

@endsection
