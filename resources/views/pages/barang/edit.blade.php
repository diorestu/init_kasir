@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Home')


@section('content')
    <x-breadcrumb title='Edit Barang' parent1='Master' parent2='Barang' />
    <div class="d-flex justify-content-end justify-content-md-between align-items-end">
        <x-page-header title='Edit Barang' parent1='Master' parent2='Barang' />
    </div>
    <x-card>
        <form action="{{ route('master.barang.update', $data->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="defaultFormControlInput" placeholder=""
                            name="nama" aria-describedby="defaultFormControlHelp" required value="{{ $data->nama }}" />
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="mb-3">
                        <label for="defaultSelect" class="form-label">Kategori Produk</label>
                        <select id="defaultSelect" class="form-select" name="kategori_id">
                            <option disabled selected>Pilih Satu</option>
                            @foreach (App\Models\Kategori::get() as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $data->kategori_id ? 'selected' : '' }}>
                                    {{ $item->kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="mb-3">
                        <label for="selectProduct" class="form-label">Merek Produk</label>
                        <select id="selectProduct" class="form-select" name="merek_id">
                            <option disabled selected>Pilih Satu</option>
                            @foreach (App\Models\Merk::get() as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $data->merek_id ? 'selected' : '' }}>
                                    {{ $item->merek }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Keterangan Produk</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi">{{ $data->deskripsi }}</textarea>
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
