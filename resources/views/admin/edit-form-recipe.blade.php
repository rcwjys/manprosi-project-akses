@extends('admin.template.main-template')

<!-- Set Title Halaman -->
@section('title', 'UPTD Puskesmas Babakan Tarogong')

<!-- Set class active -->
@section('recipe', 'active')

<!-- Import Layouting -->
@section('content')

    <main>
        <div class="container mt-5">
            <form action="{{ url('update-recipe-data/' . $recipeData->recipeId) }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col">
                        <label for="inputPassword4">Resep Obat</label>
                        <input type="text" name="recipe" class="form-control @error('recipe') is-invalid @enderror"
                            required id="inputPassword4" value="{{ $recipeData->recipe }}">
                        <input type="hidden" name="_method" value="put">
                    </div>
                </div>
                <a href="{{ url('/medicine-recipe') }}" class="btn btn-primary back-btn">Kembali</a>

                <button type="submit" name="submit" class="btn btn-primary submit-button ml-3">Update</button>
            </form>
        </div>
    </main>

@endsection
