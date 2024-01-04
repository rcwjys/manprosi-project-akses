<!-- Import Template -->
@extends('admin.template.main-template')

<!-- Set Title Halaman -->
@section('title', 'Halaman Detail Data Karyawan | UPTD Puskesmas Babakan Tarogong')

<!-- Set class active -->
@section('kelola pegawai', 'active')

<!-- Import Layouting -->
@section('content')

    <main>
        <div class="container mt-5">
            <div class="card mx-auto" style="width: 60vw;">
                <div class="card-header text-center">
                    <h6>Detail Pegawai</h6>
                </div>
                <div class="table-responsive">
                    <form action="{{ route('employee.update', ['id' => $employeeEdit->employeeId]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th scope="row">Nama Pegawai</th>
                                    <td>:</td>
                                    <td>
                                        <input type="text" name="employeeName" class="form-control" id="employeeName"
                                            value="{{ $employeeEdit->employeeName }}">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td>:</td>
                                    <td>
                                        <input type="email" name="employeeEmail" class="form-control" id="employeeEmail"
                                            value="{{ $employeeEdit->employeeEmail }}">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Phone</th>
                                    <td>:</td>
                                    <td>
                                        <input type="number" name="employeePhone" class="form-control" id="employeePhone"
                                            value="{{ $employeeEdit->employeePhone }}">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Address</th>
                                    <td>:</td>
                                    <td>
                                        <input type="text" name="employeeAddress" class="form-control"
                                            id="employeeAddress" value="{{ $employeeEdit->employeeAddress }}">
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                        <a type="button" class="btn mt-5 mx-3 my-3 back-btn" href="{{ url('/employee') }}">Kembali</a>
                        <button type="submit" name="submit"
                            class="btn btn-warning mt-4 submit-button edit-button">Edit</button>
                        <a type="button" class="btn btn-danger mt-4 delete-button ml-3"
                            href="{{ route('employee.delete', ['id' => $employeeEdit->employeeId]) }}">Hapus Data
                            Pegawai</a>

                    </form>
                </div>
            </div>
        @endsection
</main>
