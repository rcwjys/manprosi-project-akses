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
                    Edit Data Postingan
                </div>
                <form action="{{ url('/education/update/' . $post->post_id) }}" method="POST" class="px-5 py-5">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label for="exampleInputEmail1">Judul Postingan</label>
                        <input type="text" value="{{ $post->post_title }}" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" name="post_title" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Deskripsi Postingan</label>
                        <input type="text" value="{{ $post->post_description }}" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp" name="post_description" required>
                        @error('post_description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Isi Postingan</label>
                        <input type="text" value="{{ $post->post_body }}" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" name="post_body" required>
                    </div>

                    <div class="form-group">
                        <input type="hidden" value="{{ $post->employee->employeeId }}" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp" name="employeeId" required>
                    </div>


                    <a href="{{ url('/education/detail-post/' . $post->post_id) }}"
                        class="btn btn-primary mt-5 mr-3 back-btn">Kembali</a>

                    <button type="submit" name="submit" class="btn btn-primary submit-button ml-2 mt-5">Update</button>
                </form>
            </div>
        </div>
    </main>

@endsection
