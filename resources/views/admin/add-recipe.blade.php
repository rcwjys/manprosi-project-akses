<!-- Import Template -->
@extends('admin.template.main-template')

<!-- Set Title Halaman -->
@section('title', 'UPTD Puskesmas Babakan Tarogong')

@section('recipe', 'active')

<!-- Import Layouting -->
@section('content')
    <main>
        <div class="container mt-5">
            <form action="{{ route('admin.storeRecipeData') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col">
                        <label for="inputPassword4">Resep Obat</label>
                        <input type="text" name="recipe" class="form-control @error('recipe') is-invalid @enderror"
                            required value="{{ old('recipe') }}" id="inputPassword4" placeholder="Resep">
                        @error('recipe')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <a href="{{ url('/medicine-recipe') }}" class="btn btn-primary back-btn">Kembali</a>

                <button type="submit" name="submit" class="btn btn-primary submit-button ml-3">Tambah</button>
            </form>
        </div>
    </main>

@endsection
