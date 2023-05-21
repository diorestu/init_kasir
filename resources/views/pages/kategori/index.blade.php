@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Kategori')


@section('content')
    <x-breadcrumb title='Kategori' parent1='Master' />
    <div class="d-flex justify-content-end justify-content-md-between align-items-end">
        <x-page-header title='Kategori' parent1='Master' />
        <div class="d-flex justify-content-end mb-3">
            <!-- End Offcanvas -->
            <button class="btn btn-dark btn-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEnd"
                aria-controls="offcanvasEnd"><i class="ti ti-playlist-add"></i>&nbsp;Tambah Data</button>
            <x-add-barang-page />
            <div class="form-group ms-2">
                <div class="search-box position-relative">
                    <input type="text" class="form-control" id="search" name="cari" placeholder="Cari disini...">
                    <i class="fa fa-search search-icon"></i>
                </div>
            </div>
        </div>
    </div>
    <x-table :head="['no', 'nama kategori', '']"></x-table>
@endsection

@push('addon-script')
    <script>
        $(function() {
            options.order = [
                [1, 'asc']
            ]
            options.ajax = "{{ route('master.kategori.index') }}";
            options.columns = [{
                    data: 'DT_RowIndex',
                    width: '5%',
                    searchable: false,
                    orderable: false,
                    class: 'text-center'
                },
                {
                    data: 'kategori'
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
