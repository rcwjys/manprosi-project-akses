<!-- Import Template -->
@extends('admin.template.main-template')

<!-- Set Title Halaman -->
@section('title', 'UPTD Puskesmas Babakan Tarogong')

<!-- Set class active -->
@section('medicineUnit', 'active')

<!-- Import Layouting -->
@section('content')
    <main>
        <div class="container">
            <div class="container mt-3">
                @if (session()->has('MedicineUnitSucessfulyCreated'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('MedicineUnitSucessfulyCreated') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('medicineUnitSuccessfulyUpdated'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('medicineUnitSuccessfulyUpdated') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Add Medicine Button -->
                <a href="{{ url('/create-medicine-unit-data') }}" class="btn btn-primary mt-5 medicine-add-btn">+ Tambah
                    Data
                    Unit </a>
                <div class="card mt-3">
                    <div class="card-header text-center">
                        <h6>Data Unit Satuan Obat</h6>
                    </div>
                    <table class="table table-fluid table-striped">
                        <tr>
                            <th>
                                Satuan Unit Obat
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
                        @foreach ($medicineUnits as $medicineUnit)
                            <tr>
                                <td>
                                    {{ $medicineUnit->medicineUnit }}
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($medicineUnit['created_at'])->format('j F Y | H:i') }}
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($medicineUnit['updated_at'])->format('j F Y | H:i') }}
                                </td>
                                <td>
                                    <a href="{{ url('/edit-medicine-unit-data/' . $medicineUnit->medicineUnitId) }}"
                                        name="edit-btn">
                                        <i class="fa-regular fa-pen-to-square fa-lg"
                                            style="color: #019f90; font-size: 1.5em"></i>
                                    </a>
                                    <a href="{{ url('/medicine-units-data/delete-data/' . $medicineUnit->medicineUnitId) }}"
                                        name="del-btn">
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
