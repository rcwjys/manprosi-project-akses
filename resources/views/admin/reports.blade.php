@extends('admin.template.main-template')

<!-- Set Title Halaman -->
@section('title', 'Halaman Laporan Stock Obat | UPTD Puskesmas Babakan Tarogong')

<!-- Set class active -->
@section('laporan', 'active')

<!-- Import Layouting -->
@section('content')
    <main>
        <div class="container mt-5">
            <div class="card mx-auto" style="width: 60vw;">
                <div class="card-header text-center">
                    <h6>Laporan Stok Obat</h6>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th scope="col">Nama Obat</th>
                                <th scope="col">Stok Obat</th>
                                <th scope="col">Informasi Obat</th>
                                <th scope="col">Expired Obat</th>
                                <th scope="col">Masa Periode Obat</th>

                            </tr>
                            @foreach ($medicines as $medicine)
                                @if (!($medicine->medicineStock < 25))
                                    <tr>
                                        <td class="text-capitalize">
                                            {{ $medicine->medicineName }}
                                        </td>
                                        <td>
                                            {{ $medicine->medicineStock }}
                                        </td>
                                        <td>
                                            {{ $medicine->medicineInformation }}
                                        </td>
                                        <td>
                                            {{ $medicine->expiredDate }}
                                        </td>
                                        <td>
                                            {{ $medicine->medicinePeriod }}
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td class="text-capitalize bg-danger text-white">
                                            {{ $medicine->medicineName }}
                                        </td>
                                        <td class="bg-danger text-white">
                                            {{ $medicine->medicineStock }}
                                        </td>
                                        <td class="bg-danger text-white">
                                            {{ $medicine->medicineInformation }}
                                        </td>
                                        <td class="bg-danger text-white">
                                            {{ $medicine->expiredDate }}
                                        </td>
                                        <td class="bg-danger text-white">
                                            {{ $medicine->medicinePeriod }}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

@endsection
