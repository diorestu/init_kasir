@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Ubah Kategori')


@section('content')
    <x-breadcrumb title='Edit Kategori' parent1='Master' parent2='Kategori' />
    <div class="d-flex justify-content-end justify-content-md-between align-items-end">
        <x-page-header title='Edit Kategori' parent1='Master' parent2='Kategori' />
    </div>
    <x-card>
        <form action="{{ route('master.kategori.update', $data->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="defaultFormControlInput" placeholder=""
                            name="kategori" aria-describedby="defaultFormControlHelp" required
                            value="{{ $data->kategori }}" />
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Keterangan Produk</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="keterangan">{{ $data->keterangan }}</textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-dark w-100">Submit Data</button>
        </form>
    </x-card>
@endsection

@push('addon-script')
    @if (Session::has('success'))
        <script type="text/javascript">
            Swal.fire({
                position: 'top-end',
                showConfirmButton: false,
                toast: true,
                //  title: 'Berhasil',
                text: "{{ \Session::get('success') }}",
                icon: 'success',
                timer: 1000
            });
        </script>
    @endif
    @if (Session::has('error'))
        <script type="text/javascript">
            Swal.fire({
                position: 'top-end',
                showConfirmButton: false,
                toast: true,
                //  title: 'Gagal',
                text: "{{ \Session::get('error') }}",
                icon: 'error',
                timer: 1000
            });
        </script>
    @endif
@endpush
