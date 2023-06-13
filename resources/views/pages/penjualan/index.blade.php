@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Home')


@section('content')
    <x-breadcrumb title='Penjualan' parent1='Transaksi' />
    <div class="d-flex justify-content-end justify-content-md-between align-items-end">
        <x-page-header title='Penjualan' parent1='Transaksi' />
    </div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <select id="selectpickerBasic" class="selectpicker w-100" data-style="btn-default">
                <option>BCA</option>
                <option>Mandiri</option>
                <option>QRIS</option>
            </select>
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
    <x-table :head="['no', 'nama produk', 'stok', 'harga jual', 'harga beli', '']"></x-table>
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
            ];
            options.ajax = "{{ route('kelola.stok.index') }}";
            options.columns = [{
                    data: 'DT_RowIndex',
                    width: '5%',
                    searchable: false,
                    orderable: false,
                    class: 'text-center'
                },
                {
                    data: 'barang.nama'
                },
                {
                    data: 'qty',
                    render: $.fn.dataTable.render.number('.', ',', 0, '')
                },
                {
                    data: 'harga_jual',
                    render: $.fn.dataTable.render.number('.', ',', 0, 'Rp ')
                },
                {
                    data: 'harga_beli',
                    render: $.fn.dataTable.render.number('.', ',', 0, 'Rp ')
                },
                {
                    data: 'action',
                    width: '5%',
                    orderable: false,
                    searchable: false,
                    class: 'text-center'
                }
            ];
            var table = $('.datatable').DataTable(options);

            $('#search').keyup(function() {
                table.search($(this).val()).draw();
            });
        });
    </script>
@endpush
