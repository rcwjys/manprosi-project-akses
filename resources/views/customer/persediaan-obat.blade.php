<!-- Import Template -->
@extends('template.main-template')

<!-- Set Title Halaman -->
@section('title', 'Persediaan Obat | UPTD Puskesmas Babakan Tarogong')

<!-- Set class active -->
@section('medicine', 'active')

<!-- Import Layouting -->
@section('content')


    <main>
        <div class="container">
            <div class="container mt-3">

                <div class="row grid row-gap-3 col-gap-3 mt-4">
                    @foreach ($medicines as $medicine)
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?= $medicine->medicineName ?>
                                    </h5>
                                    <a href="{{ url('/detail-persediaan-obat/' . $medicine->medicineId) }}" class="card-link"
                                        style="color: #019F90;">Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>


@endsection
