<!-- Import Template -->
@extends('admin.template.main-template')

<!-- Set Title Halaman -->
@section('title', 'Pesan | UPTD Puskesmas Babakan Tarogong')

@section('persediaan', 'active')

<!-- Import Layouting -->
@section('content')

    <main>
        <div class="container">
            <div class="container mt-3">
<<<<<<< HEAD
                @if (session()->has('medicineSuccessfulyDeleted'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('medicineSuccessfulyDeleted') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session()->has('medicineDataSuccessfulyCreated'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('medicineDataSuccessfulyCreated') }}
=======
                @if (session()->has('deleteSubClassMessage'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('deleteSubClassMessage') }}
>>>>>>> d5febd9015cd0ca6bd1b6b71e204e3d423038165
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Add Medicine Button -->
                <a href="{{ url('/create-medicine-data') }}" class="btn btn-primary mt-5 medicine-add-btn">+ Tambah Data
                    Obat </a>


                <div class="row grid row-gap-3 col-gap-3 mt-4">
                    @foreach ($medicines as $medicine)
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
<<<<<<< HEAD
                                    <h5 class="card-title text-capitalize">
=======
                                    <h5 class="card-title">
>>>>>>> d5febd9015cd0ca6bd1b6b71e204e3d423038165
                                        {{ $medicine->medicineName }}
                                    </h5>
                                    <a href="{{ url('/medicine-data/details/' . $medicine->medicineId) }}" class="card-link"
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
