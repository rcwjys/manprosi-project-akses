<!-- Import Template -->
@extends('admin.template.main-template')

<!-- Set Title Halaman -->
@section('title', 'Edit Detail Pesan | UPTD Puskesmas Babakan Tarogong')

@section('messages', 'active')

<!-- Import Layouting -->
@section('content')
    <div class="container mt-5">
        <form action="/message/edit" method="POST">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Email Customer</label>
                    <input type="text" name="customerEmail"
                        class="form-control @error('emailCustomer') is-invalid @enderror" required
                        value="{{ $message->customerEmail }}" id="inputPassword4" placeholder="Email Customer">
                    @error('customerEmail')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">No Telepon Customer</label>
                    <input type="text" name="customerPhoneNumber"
                        class="form-control @error('customerPhoneNumber') is-invalid @enderror" required
                        value="{{ $message->customerPhoneNumber }}" id="inputPassword4" placeholder="Email Customer">
                    @error('customerEmail')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <input type="hidden" name="messageId" value="{{ $message->messageId }}">
            </div>
            <a type="button" class="btn back-btn mt-5" href="{{ url("/messages/$message->messageId") }}">Kembali</a>
            <button type="submit" name="submit" class="btn btn-primary mt-5 submit-button ml-3">Edit</button>
        </form>
    </div>
@endsection
