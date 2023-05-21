@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
@endsection

<div class="card rounded-0 shadow-sm border mb-3">
    <div class="card-datatable table-responsive pt-0">
        <table class="table table-hover table-sm table-striped-columns datatable" width="100%">
            <thead class="table-light">
                <tr>
                    @foreach ($head as $item)
                        <th>{{ $item }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                {{ $slot }}
            </tbody>
        </table>
    </div>
</div>

@push('addon-script')
    <script type="text/javascript">
        var options = {
            lengthMenu: [10, 15, 25, 50],
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
            }
        };
    </script>
@endpush
