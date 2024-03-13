<!-- Import Template -->
@extends('template.main-template')

<!-- Set Title Halaman -->
@section('title', 'UPTD Puskesmas Babakan Tarogong')

<!-- Set class active -->
@section('medicine', 'active')

<!-- Import Layouting -->
@section('content')

    <script src="{{ asset('js/app.js') }}" type="module" async></script>

    <main>
        <div class="container">
            <div class="container mt-3">
                @if (count($medicines) === 0)
                    <h1 class="mt-5 text-center">Obat Tidak Tersedia</h1>
                @else
                    <div class="top-section d-flex justify-content-between align-items-center">
                        <div class="page-title">
                            <h1 class="mt-5">Persediaan Obat </h1>
                        </div>
                        <div class="cart-section">

                            {{-- Cart Modal --}}
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModalCenteredScrollable"
                                style="background-color: #019F90; border-color:#019F90">
                                Keranjang
                            </button>
                            <div class="modal fade" id="exampleModalCenteredScrollable" data-bs-keyboard="false"
                                tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                                            </svg>
                                            <h5 class="modal-title ml-2">
                                                Keranjang Saya
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="" method="POST">
                                            <div class="modal-body" style="max-height: 400px; overflow-y: auto;">
                                                @csrf
                                                <p class="fw-bold">Data Diri</p>
                                                <hr>
                                                <div class="form-group">
                                                    <label for="receipentName">Nama Penerima</label>
                                                    <input type="text" class="form-control" id="receipentName"
                                                        name="receipentName" aria-describedby="emailHelp"
                                                        placeholder="Contoh: Michelle Widya" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="receipentNumber">No Telepon</label>
                                                    <input type="text" class="form-control" name="receipentNumber"
                                                        id="receipentNumber" aria-describedby="emailHelp"
                                                        placeholder="Contoh: 082135567550" maxlength="12" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="receipentAddress">Alamat Pegawai </label>
                                                    <textarea class="form-control"
                                                        placeholder="Contoh: Jl. Raya Cendana No. 14, Kel. Cilandak Barat, Kec. Cilandak, Jakarta Selatan, DKI Jakarta, 12345"
                                                        name="receipentAddress" id="receipentAddress" rows="3" required></textarea>
                                                </div>

                                                <p class="fw-bold text-capitalize">belanjaan kamu</p>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 60%;">Barang</th>
                                                                <th style="width: 20%">Harga Per Item</th>
                                                                <th style="width: 20%">Kuantitas</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="table-body" id="cart-container">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-subtle"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit"
                                                    class="btn btn-primary submit-button">Checkout</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- End of Cart Modal --}}
                        </div>
                    </div>

                    <div class="row grid row-gap-3 col-gap-3 mt-4">
                        @foreach ($medicines as $medicine)
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-capitalize" id="medicine-name">
                                            {{ $medicine->medicineName }}
                                            @if ($medicine->medicineStock > 0)
                                                <span
                                                    class="medicine-status mt-2 badge text-bg-success text-uppercase">Tersedia</span>
                                            @else
                                                <span
                                                    class="medicine-status mt-2 badge text-bg-danger text-uppercase">HABIS</span>
                                            @endif
                                        </h5>

                                        <p class="text-muted">
                                            {{ $medicine->medicineInformation }}
                                        </p>

                                        <p id="medicine-price">
                                            Rp. <span class="fw-bold"
                                                id="medicine-price">{{ $medicine->sellingPrice }}</span>
                                        </p>

                                        <div class="mt-2 action-section d-flex justify-content-between align-items-center">
                                            <div class="details-section">
                                                <a href="{{ url('/detail-persediaan-obat/' . $medicine->medicineId) }}"
                                                    class="card-link" style="color: #019F90;">Details
                                                </a>
                                            </div>

                                            <div class="order-section">
                                                <a href="" type="button" class="btn btn-primary" id="order-button"
                                                    style="background-color: #019F90; border-color: #019F90; font-weight: bold;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </main>



@endsection
