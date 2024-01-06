@extends('admin.template.main-template')

<!-- Set Title Halaman -->
@section('title', 'UPTD Puskesmas Babakan Tarogong')

<!-- Set class active -->
@section('formularium', 'active')

<!-- Import Layouting -->
@section('content')
    <main>
        <div class="container mt-5">
            <div class="card mx-auto" style="width: 60vw;">
                <div class="card-header text-center">
                    <h6>Formularium</h6>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th scope="col">Kelas Terapi</th>
                                <th scope="col">Sub Kelas Terapi</th>
                                <th scope="col">Nama Generik & Kekuatan Sediaan</th>
                                <th scope="col">Peresepan Maksimal</th>
                                <th scope="col">Keterangan</th>

                            </tr>
                            @foreach ($data as $data)
                                <tr>
                                    <td class="text-capitalize">
                                        {{ $data->medicineClass->therapyClassName }}
                                    </td>
                                    <td class="text-capitalize">
                                        {{ $data->medicineSubClass->subTherapyClassName }}
                                    </td>
                                    <td class="text-capitalize">
                                        {{ $data->medicineName }}
                                    </td>
                                    <td>
                                        {{ $data->recipe->recipe }}
                                    </td>
                                    <td>
                                        {{ $data->medicineInformation }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

@endsection
