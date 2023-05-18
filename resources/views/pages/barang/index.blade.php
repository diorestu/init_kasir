@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Home')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-baseline">
        <h4 class="fw-bold mb-3">
            <span class="text-muted fw-light">Master /</span> Barang
        </h4>
        <div class="form-group ms-2">
            <div class="search-box position-relative">
                <input type="text" class="form-control" id="search" name="cari" placeholder="Cari disini...">
                <i class="fa fa-search search-icon"></i>
            </div>
        </div>
    </div>
    <div class="card rounded-0">
        <div class="card-datatable table-responsive pt-0">
            <table class="datatable table">
                <thead class="table-light">
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('page-script')
    <script type="text/javascript">
        $(function() {
            var table = $('.datatable').DataTable({
                ajax: "{{ route('master.barang.index') }}",
                lengthMenu: [5, 10, 15, 25, 50],
                "dom": '<"my-0"t><"d-flex justify-content-between align-items-center mx-3"<"d-flex justify-content-start" li>p>',
                "language": {
                    "sSearch": "Cari:",
                    "emptyTable": "Data Tidak Tersedia",
                    "paginate": {
                        "previous": '<i class="fa fa-sm fa-chevron-left"></i>',
                        "next": '<i class="fa fa-sm fa-chevron-right"></i>'
                    },
                    "decimal": ",",
                    "emptyTable": "Tidak Ada Data Tersedia",
                    "info": "|&nbsp;&nbsp;&nbsp;&nbsp;Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
                    "infoEmpty": "|&nbsp;&nbsp;&nbsp;&nbsp;Menampilkan 0 s/d 0 dari 0 data",
                    "infoFiltered": "(difiliter dari _MAX_ data)",
                    "infoPostFix": "",
                    "thousands": ".",
                    "lengthMenu": "Tampilkan _MENU_ data",
                    "loadingRecords": "Memuat...",
                    "processing": "",
                    "search": "Cari:",
                    "zeroRecords": "Tidak ada data yang sesuai",
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'nama'
                    },
                    {
                        data: 'deskripsi'
                    },
                ]
            });

            $('#search').keyup(function() {
                table.search($(this).val()).draw();
            });
        });
    </script>
@endsection
