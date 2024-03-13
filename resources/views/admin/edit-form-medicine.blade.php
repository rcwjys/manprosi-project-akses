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
                <form action="{{ url('/update-medicine-data/' . $medicine->medicineId) }}" method="POST" class="px-5 py-5">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="exampleInputEmail1">Nama Obat</label>
                            <input type="text" value="{{ $medicine->medicineName }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp" name="medicineName" required>
                        </div>

                        <div class="form-group col-6">
                            <label for="exampleInputEmail1">Stok Obat</label>
                            <input type="number" value="{{ $medicine->medicineStock }}" class="form-control"
                                name="medicineStock" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Keterangan Obat</label>
                        <input type="text" value="{{ $medicine->medicineInformation }}" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp" name="medicineInformation" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Expired</label>
                        <input type="date" value="{{ $medicine->expiredDate }}" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp" name="expiredDate" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Ketahanan Obat</label>
                        <input type="text" value="{{ $medicine->medicinePeriod }}" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp" name="medicinePeriod" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga Beli Obat</label>
                        <input type="text" value="{{ $medicine->buyingPrice }}" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp" name="buyingPrice" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga Jual Obat</label>
                        <input type="text" value="{{ $medicine->sellingPrice }}" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp" name="sellingPrice" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Resep Obat</label>
                        <select class="form-control" name="recipeId">
                            <option value="{{ $recipe->recipe->recipeId }}" selected>
                                {{ $recipe->recipe->recipe }}</option>
                            @foreach ($recipeData as $recipeData)
                                @if (!($recipe->recipe->recipe == $recipeData->recipe))
                                    <option value="{{ $recipeData->recipeId }}">{{ $recipeData->recipe }} </option>
                                @else
                                    @continue
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Satuan Unit Obat</label>
                        <select class="form-control" name="medicineUnitId">
                            <option value="{{ $unit->unit->medicineUnitId }}" selected>
                                {{ $unit->unit->medicineUnit }}
                            </option>
                            @foreach ($unitData as $unitData)
                                @if (!($unit->unit->medicineUnit == $unitData->medicineUnit))
                                    <option value="{{ $unitData->medicineUnitId }}">{{ $unitData->medicineUnit }}
                                    </option>
                                @else
                                    @continue
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Kelas Obat</label>
                        <select class="form-control" name="therapyClassId">
                            <option value="{{ $medicineClass->medicineClass->therapyClassId }}" selected>
                                {{ $medicineClass->medicineClass->therapyClassName }}
                            </option>
                            @foreach ($classData as $classData)
                                @if (!($medicineClass->medicineClass->therapyClassName == $classData->therapyClassName))
                                    <option value="{{ $classData->therapyClassId }}">{{ $classData->therapyClassName }}
                                    </option>
                                @else
                                    @continue
                                @endif
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">Sub Kelas Obat</label>
                        <select class="form-control" name="subTherapyClassId">
                            <option value="{{ $medicineSubClass->medicineSubClass->subTherapyClassId }}" selected>
                                {{ $medicineSubClass->medicineSubClass->subTherapyClassName }}
                            </option>
                            @foreach ($subClassData as $subClassData)
                                @if (!($medicineSubClass->medicineSubClass->subTherapyClassName == $subClassData->subTherapyClassName))
                                    <option value="{{ $subClassData->subTherapyClassId }}">
                                        {{ $subClassData->subTherapyClassName }}
                                    </option>
                                @else
                                    @continue
                                @endif
                            @endforeach
                        </select>
                    </div>


                    <a href="{{ route('admin.medicine-data') }}" class="btn btn-primary mt-5 mr-3 back-btn">Kembali</a>

                    <button type="submit" name="submit" class="btn btn-primary submit-button ml-2 mt-5">Update</button>
                </form>
            </div>
        </div>
    </main>

@endsection
