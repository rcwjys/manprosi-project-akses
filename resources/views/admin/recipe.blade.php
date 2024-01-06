<!-- Import Template -->
@extends('admin.template.main-template')

<!-- Set Title Halaman -->
@section('title', 'UPTD Puskesmas Babakan Tarogong')

<!-- Set class active -->
@section('recipe', 'active')

<!-- Import Layouting -->
@section('content')
    <main>
        <div class="container">
            <div class="container mt-3">
                @if (session()->has('recipeSuccessfulyDeleted'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('recipeSuccessfulyDeleted') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session()->has('recipeDataSuccessfulyUpdated'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('recipeDataSuccessfulyUpdated') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session()->has('recipeDataSuccessfulyCreated'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('recipeDataSuccessfulyCreated') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session()->has('recipeFailedDeleted'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('recipeFailedDeleted') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Add Medicine Button -->
                <a href="{{ route('admin.createRecipeData') }}" class="btn btn-primary mt-5 medicine-add-btn">+ Tambah Data
                    Resep </a>
                <div class="card mt-3">
                    <div class="card-header text-center">
                        <h6>Data Resep</h6>
                    </div>
                    <table class="table table-fluid table-striped">
                        <tr>
                            <th>
                                Resep Obat
                            </th>
                            <th>
                                Waktu Dibuat
                            </th>
                            <th>
                                Waktu Diupdate
                            </th>
                            <th>
                                Action
                            </th>

                        </tr>
                        @foreach ($recipes as $recipe)
                            <tr>
                                <td>
                                    {{ $recipe->recipe }}
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($recipe['created_at'])->format('j F Y | H:i') }}
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($recipe['updated_at'])->format('j F Y | H:i') }}
                                </td>
                                <td>
                                    <a href="{{ url('edit-recipe-data/' . $recipe->recipeId) }}" name="edit-btn">
                                        <i class="fa-regular fa-pen-to-square fa-lg"
                                            style="color: #019f90; font-size: 1.5em"></i>
                                    </a>
                                    <a href="{{ url('/delete-recipe-data/' . $recipe->recipeId) }}" name="del-btn">
                                        <i class="fa-regular fa-trash-can fa-lg ml-3"
                                            style="color: #019f90; font-size: 1.5em"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </main>

@endsection
