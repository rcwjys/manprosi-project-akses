@extends('admin.template.main-template')

<!-- Set Title Halaman -->
@section('title', 'Halaman Detail Obat | UPTD Puskesmas Babakan Tarogong')

@section('persediaan', 'active')

<!-- Import Layouting -->
@section('content')

    <main>
        <div class="container mt-5">
<<<<<<< HEAD
            @if (session()->has('updateMedicineDataSucessfuly'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('updateMedicineDataSucessfuly') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card mx-auto" style="width: 60vw;">
                <div class="card-header text-center">
                    <h6 class="text-capitalize">Detail Obat {{ $medicine->medicineName }}</h6>
=======

            <div class="card mx-auto" style="width: 60vw;">
                <div class="card-header text-center">
                    <h6>Detail Obat {{ $medicine->medicineName }}</h6>
>>>>>>> d5febd9015cd0ca6bd1b6b71e204e3d423038165
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th scope="row" style="width: 40vw;">Nama Obat </th>
                                <td>:</td>
<<<<<<< HEAD
                                <td class="text-capitalize">{{ $medicine->medicineName }} </td>
=======
                                <td>{{ $medicine->medicineName }} </td>
>>>>>>> d5febd9015cd0ca6bd1b6b71e204e3d423038165
                            </tr>
                            <tr>
                                <th scope="row" style="width: 40vw;">Jumlah Stok </th>
                                <td>:</td>
                                <td>{{ $medicine->medicineStock }} </td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 40vw;">Informasi Obat </th>
                                <td>:</td>
                                <td>{{ $medicine->medicineInformation }} </td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 40vw;">Waktu Expired </th>
                                <td>:</td>
<<<<<<< HEAD
                                <td>{{ \Carbon\Carbon::parse($medicine['expiredDate'])->format('j F Y') }}</td>
=======
                                <td>{{ $medicine->expiredDate }} </td>
>>>>>>> d5febd9015cd0ca6bd1b6b71e204e3d423038165
                            </tr>
                            <tr>
                                <th scope="row" style="width: 40vw;">Waktu Ketahanan Obat </th>
                                <td>:</td>
                                <td>{{ $medicine->medicinePeriod }} </td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 40vw;">Resep Obat</th>
                                <td>:</td>
<<<<<<< HEAD
                                <td>{{ $recipe->recipe->recipe }}</td>
=======
                                <td></td>
>>>>>>> d5febd9015cd0ca6bd1b6b71e204e3d423038165
                            </tr>
                            <tr>
                                <th scope="row" style="width: 40vw;">Kelas Terapi Obat</th>
                                <td>:</td>
<<<<<<< HEAD
                                <td>{{ $medicineClass->medicineClass->therapyClassName }}</td>
=======
                                <td></td>
>>>>>>> d5febd9015cd0ca6bd1b6b71e204e3d423038165
                            </tr>
                            <tr>
                                <th scope="row" style="width: 40vw;">Sub Kelas Terapi Obat</th>
                                <td>:</td>
<<<<<<< HEAD
                                <td>{{ $medicineSubClass->medicineSubClass->subTherapyClassName }}</td>
=======
                                <td></td>
>>>>>>> d5febd9015cd0ca6bd1b6b71e204e3d423038165
                            </tr>
                            <tr>
                                <th scope="row" style="width: 40vw;">Satuan Obat</th>
                                <td>:</td>
<<<<<<< HEAD
                                <td>{{ $unit->unit->medicineUnit }}</td>
=======
                                <td></td>
>>>>>>> d5febd9015cd0ca6bd1b6b71e204e3d423038165
                            </tr>
                        </tbody>
                    </table>
                    <a type="button" class="btn mt-5 mx-3 my-3 back-btn"
                        href="{{ route('admin.medicine-data') }}">Kembali</a>

                    <a class="btn btn-warning mt-4 submit-button edit-button"
<<<<<<< HEAD
                        href="{{ url('/edit-medicine-data/' . $medicine->medicineId) }}" name="edit-btn">Edit Data Obat
                    </a>

                    <a type="button" class="btn btn-danger mt-4 delete-button ml-3"
                        href="{{ url('/delete-medicine-data/' . $medicine->medicineId) }}">Hapus Data Obat
                        Kelas</a>
=======
                        href="{{ url('/edit-medicine-data/' . $medicine->medicineId) }}" name="edit-btn">Edit Sub Kelas
                    </a>

                    <a type="button" class="btn btn-danger mt-4 delete-button ml-3"
                        href="{{ url('/delete-medicine-data/' . $medicine->medicineId) }}">Hapus Data Sub
                        Kelas</a>

>>>>>>> d5febd9015cd0ca6bd1b6b71e204e3d423038165
                </div>
            </div>
        </div>
    </main>

@endsection
