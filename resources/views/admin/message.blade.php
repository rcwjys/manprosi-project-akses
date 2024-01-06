<!-- Import Template -->
@extends('admin.template.main-template')

<!-- Set Title Halaman -->
@section('title', 'UPTD Puskesmas Babakan Tarogong')

@section('pesan', 'active')

<!-- Import Layouting -->
@section('content')

    @if ($messages->count() >= 1)

        <div class="container mt-5">
            <div class="card">
                <div class="card-header text-center">
                    <h6>Data Pesan Customer</h6>
                </div>
                @if (session()->has('deleteMessageSuccessFully'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('deleteMessageSuccessFully') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session()->has('editMessage'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('editMessage') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th scope="col">Nama Customer</th>
                            <th scope="col">Waktu Kirim</th>
                        </tr>
                        @foreach ($messages as $message)
                            <tr>
                                <td>
                                    <a href="{{ route('message-detail', ['messageId' => $message->messageId]) }}"
                                        class="text-black">{{ $message->customerName }}</a>
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($message['created_at'])->format('j F Y | H:i') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="card mx-auto mt-5" style="width: 60vw;">
                    @if (session()->has('deleteMessageSuccessFully'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('deleteMessageSuccessFully') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card-header text-center">
                        <h6>Pesan</h6>
                    </div>
                    <h3 class="text-center py-5 px-5">Maaf, data pesan tidak tersedia</h3>
                </div>
    @endif
    </div>
    </div>
@endsection
