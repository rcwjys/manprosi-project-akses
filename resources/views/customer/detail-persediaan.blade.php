<!-- Import Template -->
@extends('template.main-template')

<!-- Set Title Halaman -->
@section('title', 'UPTD Puskesmas Babakan Tarogong')

<!-- Set class active -->
@section('medicine', 'active')

<!-- Import Layouting -->
@section('content')

    <main>
        <div class="container mt-5">

            <div class="card mx-auto" style="width: 60vw;">
                <div class="card-header text-center">
                    <h6>Detail Obat {{ $medicine->medicineName }}</h6>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th scope="row" style="width: 40vw;">Nama Obat </th>
                                <td>:</td>
                                <td>{{ $medicine->medicineName }} </td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 40vw;">Informasi Obat </th>
                                <td>:</td>
                                <td>{{ $medicine->medicineInformation }} </td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 40vw;">Waktu Ketahanan Obat </th>
                                <td>:</td>
                                <td>{{ $medicine->medicinePeriod }} </td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 40vw;">Status Obat </th>
                                <td>:</td>
                                @if ($medicine->medicineStock > 0)
                                    <td class="text-success text-uppercase font-weight-bold">Tersedia</td>
                                @else
                                    <td class="text-danger text-uppercase font-weight-bold">Tidak Tersedia </td>
                                @endif

                            </tr>
                        </tbody>
                    </table>
                    <a type="button" class="btn mt-5 mx-3 my-3 back-btn"
                        href="{{ route('customer.medicinePage') }}">Kembali</a>
                </div>
            </div>
        </div>
    </main>



@endsection
