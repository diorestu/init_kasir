@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Home')


@section('content')
    <x-breadcrumb title='Barang' parent1='Master' />
    <div class="d-flex justify-content-end justify-content-md-between align-items-end">
        <x-page-header title='Barang' parent1='Master' />
        {{-- <div class="d-flex justify-content-end mb-3">
            <!-- End Offcanvas -->
            <button class="btn btn-dark btn-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#addBarangPage"
                aria-controls="addBarangPage"><i class="ti ti-playlist-add"></i>&nbsp;Tambah Data</button>
            <x-add-barang-page />
            <div class="form-group ms-2">
                <div class="search-box position-relative">
                    <input type="text" class="form-control" id="search" name="cari" placeholder="Cari disini...">
                    <i class="fa fa-search search-icon"></i>
                </div>
            </div>
        </div> --}}
    </div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="d-flex">
            <div style="min-width: 200px !important;">
                <select id="selectMerk" class="selectpicker w-100" data-style="btn-default">
                    <option value="" selected disabled>Pilih Salah Satu</option>
                    <option value="Fujitsu">Fujitsu</option>
                    <option value="ABC">ABC</option>
                    <option value="Alkaline">Alkaline</option>
                    <option value="Unilever">Unilever</option>
                </select>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('transaksi.penjualan.create') }}" class="btn btn-label-primary btn-sm px-2">
                <i class="ti ti-playlist-add ti-md"></i></a>
            <div class="form-group ms-2">
                <div class="search-box position-relative">
                    <input type="text" class="form-control" id="search" name="cari" placeholder="Cari disini...">
                    <i class="fa fa-search search-icon"></i>
                </div>
            </div>
        </div>
    </div>
    <x-table :head="['no', 'nama produk', 'merk', 'kategori', '']"></x-table>
@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
@endpush

@push('addon-script')
    <script type="text/javascript" src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script>
        $(".selectpicker").select2();
    </script>
    <script>
        $(function() {
            options.order = [
                [1, 'asc']
            ]
            options.ajax = "{{ route('master.barang.index') }}";
            options.columns = [{
                    data: 'DT_RowIndex',
                    width: '5%',
                    searchable: false,
                    orderable: false,
                    class: 'text-center'
                },
                {
                    data: 'nama'
                },
                {
                    data: 'merk.merek'
                },
                {
                    data: 'kategori.kategori'
                },
                {
                    data: 'action',
                    width: '5%',
                    orderable: false,
                    searchable: false,
                    class: 'text-center px-2'
                }
            ];
            var table = $('.datatable').DataTable(options);

            $('#search').keyup(function() {
                table.search($(this).val()).draw();
            });
            $('#selectMerk').change(function() {
                table.search($(this).val()).draw();
            });
        });
    </script>
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
                text: "{!! \Session::get('error') !!}",
                icon: 'error',
                timer: 1000
            });
        </script>
    @endif
@endpush
