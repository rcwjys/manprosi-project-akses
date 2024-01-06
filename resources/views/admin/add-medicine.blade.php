@extends('admin.template.main-template')

<!-- Set Title Halaman -->
@section('title', 'UPTD Puskesmas Babakan Tarogong')

@section('persediaan', 'active')

<!-- Import Layouting -->
@section('content')

    <main>
        <div class="container mt-5">
            <div class="card">
                <div class="card-header">
                    Tambah Data Persediaan Obat
                </div>
                <form action="{{ url('/store-medicine-data') }}" method="POST" class="px-5 py-5">
                    @csrf
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="exampleInputEmail1">Nama Obat</label>
                            <input type="text" value="{{ old('medicineName') }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp" name="medicineName" required>
                            @error('medicineName')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="exampleInputEmail1">Stok Obat</label>
                            <input type="number" value="{{ old('medicineStock') }}" class="form-control"
                                name="medicineStock" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Keterangan Obat</label>
                        <input type="text" value="{{ old('medicineInformation') }}" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp" name="medicineInformation" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Expired</label>
                        <input type="date" value="{{ old('expiredDate') }}" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" name="expiredDate" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Ketahanan Obat</label>
                        <input type="text" value="{{ old('medicinePeriod') }}" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp" name="medicinePeriod" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Resep Obat</label>
                        <select class="form-control" name="recipeId">
                            <option value="" selected disabled>Resep Obat</option>
                            @foreach ($medicineRecipe as $recipe)
                                <option value="{{ $recipe->recipeId }}">{{ $recipe->recipe }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Satuan Unit Obat</label>
                        <select class="form-control" name="medicineUnitId">
                            <option value="" selected disabled>Satuan Unit Obat</option>
                            @foreach ($medicineUnit as $medicineUnit)
                                <option value="{{ $medicineUnit->medicineUnitId }}">
                                    {{ $medicineUnit->medicineUnit }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Kelas Obat</label>
                        <select class="form-control" name="therapyClassId">
                            <option value="" selected disabled>Kelas Obat</option>
                            @foreach ($medicineClass as $class)
                                <option value="{{ $class->therapyClassId }}">{{ $class->therapyClassName }} </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">Sub Kelas Obat</label>
                        <select class="form-control" name="subTherapyClassId">
                            <option value="" selected disabled>Sub Kelas Obat</option>
                            @foreach ($medicineSubClass as $subClass)
                                <option value="{{ $subClass->subTherapyClassId }}">{{ $subClass->subTherapyClassName }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <a href="{{ route('admin.medicine-data') }}" class="btn btn-primary mt-5 mr-3 back-btn">Kembali</a>

                    <button type="submit" name="submit" class="btn btn-primary submit-button ml-2 mt-5">Tambah</button>
                </form>
            </div>
        </div>
    </main>

@endsection
