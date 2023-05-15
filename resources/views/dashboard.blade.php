@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Home')

@section('content')
    <h4>Home Page</h4>

    <div class="card">
        <div class="card-header d-flex justify-content-between mb-lg-n4">
            <div class="card-title mb-0">
                <h5 class="mb-0">Earning Reports</h5>
                <small class="text-muted">Weekly Earnings Overview</small>
            </div>
            <div class="dropdown">
                <button class="btn p-0" type="button" id="earningReportsId" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="earningReportsId">
                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="p-3 mt-2">
                <div class="row gap-4 gap-sm-0">
                    <div class="col-12 col-sm-3">
                        <div class="d-flex gap-2 align-items-center">
                            <div class="badge rounded bg-label-primary p-1"><i class="ti ti-currency-dollar ti-sm"></i>
                            </div>
                            <h6 class="mb-0">Earnings</h6>
                        </div>
                        <h4 class="my-2 pt-1">$545.69</h4>
                        <div class="progress w-75" style="height:4px">
                            <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="65"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-3">
                        <div class="d-flex gap-2 align-items-center">
                            <div class="badge rounded bg-label-info p-1"><i class="ti ti-chart-pie-2 ti-sm"></i></div>
                            <h6 class="mb-0">Profit</h6>
                        </div>
                        <h4 class="my-2 pt-1">$256.34</h4>
                        <div class="progress w-75" style="height:4px">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-3">
                        <div class="d-flex gap-2 align-items-center">
                            <div class="badge rounded bg-label-danger p-1"><i class="ti ti-brand-paypal ti-sm"></i></div>
                            <h6 class="mb-0">Expense</h6>
                        </div>
                        <h4 class="my-2 pt-1">$74.19</h4>
                        <div class="progress w-75" style="height:4px">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 65%" aria-valuenow="65"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-3">
                        <div class="d-flex gap-2 align-items-center">
                            <div class="badge rounded bg-label-danger p-1"><i class="ti ti-brand-paypal ti-sm"></i></div>
                            <h6 class="mb-0">Expense</h6>
                        </div>
                        <h4 class="my-2 pt-1">$74.19</h4>
                        <div class="progress w-75" style="height:4px">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 65%" aria-valuenow="65"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
