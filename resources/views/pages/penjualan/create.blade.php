@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')
@section('title', 'Merk')

@section('content')
    <div class="row row-bordered">
        <div class="col-12 col-lg-8">
            <x-table :head="['no', 'item', 'qty', 'nominal', '']"></x-table>
        </div>
        <div class="col-12 col-lg-4">
            <div class="card mb-2">
                <div class="card-body px-3">
                    <h6 class="text-end fw-bolder mb-0">{{ \Session::get('id_sales') }}</h6>
                    <hr class="mt-1 mb-2">
                    <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-4 col-form-label">Tanggal</label>
                        <div class="col-md-8">
                            <input class="form-control" type="date" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
                                id="html5-text-input" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-4 col-form-label">Customer</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="Vuexy" id="html5-text-input" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-4 col-form-label">Metode Bayar</label>
                        <div class="col-md-8">
                            <select id="selectpickerBasic" class="selectpicker w-100" data-style="btn-default">
                                <option>BCA</option>
                                <option>Mandiri</option>
                                <option>QRIS</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-2">
                <div class="card-body py-2 px-3">
                    <h6 class="mb-0 fw-light text-muted">GRAND TOTAL</h6>
                    <div class="text-end">
                        <h3 class="mb-0 fw-bolder text-muted">Rp 300.000</h3>
                    </div>
                </div>
            </div>
            <form>
                <button type="submit" class="btn-submit btn btn-dark w-100">Submit Transaksi</button>
            </form>
        </div>
    </div>
@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
@endpush

@push('addon-script')
    <script type="text/javascript" src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script>
        $(".selectpicker").select2();
    </script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".btn-submit").click(function(e) {
            e.preventDefault();
            var name = "DIO";

            $.ajax({
                type: 'POST',
                url: "{{ route('transaksi.penjualan.store') }}",
                data: {
                    name: name,
                },
                success: function(data) {
                    console.log(data)
                }
            });

        });
    </script>
@endpush
