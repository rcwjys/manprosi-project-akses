<!-- Import Template -->
@extends('admin.template.main-template')

<!-- Set Title Halaman -->
@section('title', 'UPTD Puskesmas Babakan Tarogong')

@section('posts', 'active')

<!-- Import Layouting -->
@section('content')


    <main>
        <div class="container mt-5">
            @if (session()->has('postUpdate'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('postUpdate') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card mx-auto" style="width: 60vw;">
                <div class="card-header text-center">
                    <h6>Detail Berita</h6>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th scope="row" style="width: 40vw;">Judul</th>
                                <td>:</td>
                                <td>{{ $post->post_title }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Content</th>
                                <td>:</td>
                                <td>
                                    {{ $post->post_body }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Diunggah Pada</th>
                                <td>:</td>
                                <td><?= date('l jS \of F Y', strtotime($post->created_at)) . ' ' . '|' . ' ' . date('h:i:s A', strtotime($post->created_at)) ?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Author</th>
                                <td>:</td>
                                <td>
                                    {{ $post->employee->employeeName }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <a type="button" class="btn mt-5 mx-3 my-3 back-btn" href="/education">Kembali</a>


                    <a class="btn btn-warning mt-4 submit-button edit-button" href="/education/edit/{{ $post->post_id }}"
                        name="edit-btn">Edit
                        Postingan</a>

                    <a type="button" class="btn btn-danger mt-4 delete-button ml-3"
                        href="{{ route('admin.delete-post', ['post_id' => $post->post_id]) }}">Hapus Data Postingan</a>

                </div>
            </div>
        </div>
    </main>



@endsection
