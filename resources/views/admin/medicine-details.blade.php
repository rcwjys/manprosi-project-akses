@extends('admin.template.main-template')

<!-- Set Title Halaman -->
@section('title', 'UPTD Puskesmas Babakan Tarogong')

@section('persediaan', 'active')

<!-- Import Layouting -->
@section('content')

    <main>
        <div class="container mt-5">
            @if (session()->has('updateMedicineDataSucessfuly'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('updateMedicineDataSucessfuly') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card mx-auto" style="width: 60vw;">
                <div class="card-header text-center">
                    <h6 class="text-capitalize">Detail Obat {{ $medicine->medicineName }}</h6>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th scope="row" style="width: 40vw;">Nama Obat </th>
                                <td>:</td>
                                <td class="text-capitalize">{{ $medicine->medicineName }} </td>
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
                                <td>{{ \Carbon\Carbon::parse($medicine['expiredDate'])->format('j F Y') }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 40vw;">Waktu Ketahanan Obat </th>
                                <td>:</td>
                                <td>{{ $medicine->medicinePeriod }} </td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 40vw;">Harga Beli Obat </th>
                                <td>:</td>
                                <td>Rp. {{ $medicine->buyingPrice }} </td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 40vw;">Harga Jual Obat </th>
                                <td>:</td>
                                <td>Rp. {{ $medicine->sellingPrice }} </td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 40vw;">Resep Obat</th>
                                <td>:</td>
                                <td>{{ $recipe->recipe->recipe }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 40vw;">Kelas Terapi Obat</th>
                                <td>:</td>
                                <td>{{ $medicineClass->medicineClass->therapyClassName }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 40vw;">Sub Kelas Terapi Obat</th>
                                <td>:</td>
                                <td>{{ $medicineSubClass->medicineSubClass->subTherapyClassName }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 40vw;">Satuan Obat</th>
                                <td>:</td>
                                <td>{{ $unit->unit->medicineUnit }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a type="button" class="btn mt-5 mx-3 my-3 back-btn"
                        href="{{ route('admin.medicine-data') }}">Kembali</a>

                    <a class="btn btn-warning mt-4 submit-button edit-button"
                        href="{{ url('/edit-medicine-data/' . $medicine->medicineId) }}" name="edit-btn">Edit Data Obat
                    </a>

                    <a type="button" class="btn btn-danger mt-4 delete-button ml-3"
                        href="{{ url('/delete-medicine-data/' . $medicine->medicineId) }}">Hapus Data Obat
                        Kelas</a>
                </div>
            </div>
        </div>
    </main>

@endsection
