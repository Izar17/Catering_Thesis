@extends('admin.layout.layout')


@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Welcome {{ Auth::guard('admin')->user()->name }}</h3> {{-- Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances --}} <!-- https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user --> <!-- https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances --> <!-- https://laravel.com/docs/9.x/eloquent#retrieving-models -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">


                <div class="col-md-6 grid-margin transparent">


                    <div class="row">
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-tale">
                                <div class="card-body">
                                    <p class="mb-4">Total Products</p>
                                    <p class="fs-30 mb-2">{{ $productsCount }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-dark-blue">
                                <div class="card-body">
                                    <p class="mb-4">Total Orders</p>
                                    <p class="fs-30 mb-2">{{ $ordersCount }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-4 mb-lg-0 stretch-card transparent">
                            <div class="card">
                                <div class="card-body">
                                    <canvas id="myChart" width="400" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-md-6 grid-margin transparent">
                    <div class="row">
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-dark-blue">
                                <div class="card-body">
                                    <p class="mb-4">Total Coupons</p>
                                    <p class="fs-30 mb-2">{{ $couponsCount }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4  mb-lg-0stretch-card transparent">
                            <div class="card  card-light-danger">
                                <a href="earnings">
                                <div class="card-body" style="color:#fff;">
                                    <p class="mb-4">Earnings</p>
                                    <p class="fs-30 mb-2">₱{{ number_format($earningsCount, 0, '.', ',') }}</p>
                                </div>
                            </a>
                            </div>
                        </div>
                        <div class="col-md-12 stretch-card transparent">
                            <div class="card">
                                <div class="card-body">

                                    <canvas id="myBarChart" width="400" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                            <div class="card card-light-blue">
                                <div class="card-body">
                                    <p class="mb-4">Total Users</p>
                                    <p class="fs-30 mb-2">{{ $usersCount }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 stretch-card transparent">
                            <div class="card card-light-danger">
                                <div class="card-body">
                                    <p class="mb-4">Total Subscribers</p>
                                    <p class="fs-30 mb-2">0</p>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="col-md-6 grid-margin transparent">
                    <div class="row">
                        <div class="col-md-12 mb-4 stretch-card transparent">
                            <div class="card">
                                <div class="card-body">
                                    <canvas id="myPieChart" width="400" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('front/js/vendor/chart.js/dist/Chart.min.js') }}"></script>
        <script src="{{ asset('front/js/vendor/chart.js/dist/Chart.extension.js') }}"></script>

        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($labels) !!},
                    datasets: [{
                        label: 'My Line Graph',
                        data: {!! json_encode($data) !!},
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                }
            });
            var ctx = document.getElementById('myBarChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($labels) !!},
                    datasets: [{
                        label: 'My Bar Graph',
                        data: {!! json_encode($data) !!},
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                }
            });
            var ctx = document.getElementById('myPieChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: {!! json_encode($labels) !!},
                    datasets: [{
                        label: 'My Bar Graph',
                        data: {!! json_encode($data) !!},
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                }
            });
        </script>
        @include('admin.layout.footer')
        <!-- partial -->
    </div>
@endsection
