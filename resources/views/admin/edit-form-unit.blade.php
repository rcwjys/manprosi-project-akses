@extends('admin.template.main-template')

<!-- Set Title Halaman -->
@section('title', 'Unit Obat | UPTD Puskesmas Babakan Tarogong')

<!-- Set class active -->
@section('medicineUnit', 'active')

<!-- Import Layouting -->
@section('content')

    <main>
        <div class="container mt-5">
            <form action="{{ url('/update-medicine-unit-data/' . $medicineUnit->medicineUnitId) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col">
                        <label for="inputPassword4">Satuan Unit Obat</label>
                        <input type="text" name="medicineUnit" class="form-control @error('recipe') is-invalid @enderror"
                            required value="{{ $medicineUnit->medicineUnit }}" id="inputPassword4"
                            placeholder="Satuan Unit Obat">
                        @error('medicineUnit')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <a href="{{ url('/medicine-units-data') }}" class="btn btn-primary back-btn">Kembali</a>

                <button type="submit" name="submit" class="btn btn-primary submit-button ml-3">Update</button>
            </form>
        </div>
    </main>

@endsection
