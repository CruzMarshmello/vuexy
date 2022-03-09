@extends('admin.layouts.contentLayoutMaster')

@section('title', 'Dashboard')

@section('vendor-style')
{{-- vendor css files --}}
<link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
@endsection
@section('page-style')
{{-- Page css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/dashboard-ecommerce.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
@endsection

@section('content')
<!-- Dashboard Ecommerce Starts -->
<section id="dashboard-ecommerce">
    <div class="row match-height">
        <!-- Medal Card -->
        <div class="col-xl-4 col-md-6 col-12">
            <div class="card card-congratulation-medal">
                <div class="card-body">
                    <h5>Congratulations 🎉 </h5>
                    <p class="card-text font-small-3">Revenue of {{ \Carbon\Carbon::now()->format("Y") }} !!</p>
                    <h3 class="mb-75 mt-2 pt-50 text-primary" id="grand-total"></h3>
                    <button type="button" id="btnOrder" class="btn btn-primary"
                        {{ (Auth::user()->hasPermission('create orders') || Auth::user()->hasPermission('read orders') || Auth::user()->hasPermission('update orders') || Auth::user()->hasPermission('delete orders')) ? '' : 'disabled' }}>
                        View Orders
                    </button>
                    <img src="{{asset('images/illustration/badge.svg')}}" class="congratulation-medal" alt="Medal Pic" />
                </div>
            </div>
        </div>
        <!--/ Medal Card -->

        <!-- Statistics Card -->
        <div class="col-xl-8 col-md-6 col-12">
            <div class="card card-statistics">
                <div class="card-header">
                    <h4 class="card-title">Statistics</h4>
                    <div class="d-flex align-items-center">
                        <p class="card-text font-small-2 mr-25 mb-0" id="now"></p>
                    </div>
                </div>
                <div class="card-body statistics-body">
                    <div class="row">
                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                            <div class="media">
                                <div class="avatar bg-light-primary mr-2">
                                    <div class="avatar-content">
                                        <i data-feather="grid" class="avatar-icon"></i>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0" id="counter-category"></h4>
                                    <p class="card-text font-small-3 mb-0">Categories</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                            <div class="media">
                                <div class="avatar bg-light-info mr-2">
                                    <div class="avatar-content">
                                        <i data-feather="box" class="avatar-icon"></i>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0" id="counter-product"></h4>
                                    <p class="card-text font-small-3 mb-0">Products</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                            <div class="media">
                                <div class="avatar bg-light-success mr-2">
                                    <div class="avatar-content">
                                        <i data-feather="user" class="avatar-icon"></i>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0" id="counter-customer"></h4>
                                    <p class="card-text font-small-3 mb-0">Customers</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="media">
                                <div class="avatar bg-light-warning mr-2">
                                    <div class="avatar-content">
                                        <i data-feather="shopping-cart" class="avatar-icon"></i>
                                    </div>
                                </div>
                                <div class="media-body my-auto">
                                    <h4 class="font-weight-bolder mb-0" id="counter-order-waiting"></h4>
                                    <p class="card-text font-small-3 mb-0">Orders</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Statistics Card -->
    </div>

    <div class="row match-height">
        <div class="col-lg-4 col-12">
            <div class="row match-height">
                <!-- Bar Chart - Orders -->
                <div class="col-lg-6 col-md-3 col-6">
                    <div class="card">
                        <div class="card-body pb-50">
                            <h6>Orders</h6>
                            <h2 class="font-weight-bolder mb-1">2,76k</h2>
                            <div id="statistics-order-chart"></div>
                        </div>
                    </div>
                </div>
                <!--/ Bar Chart - Orders -->

                <!-- Line Chart - Profit -->
                <div class="col-lg-6 col-md-3 col-6">
                    <div class="card card-tiny-line-stats">
                        <div class="card-body pb-50">
                            <h6>Profit</h6>
                            <h2 class="font-weight-bolder mb-1">6,24k</h2>
                            <div id="statistics-profit-chart"></div>
                        </div>
                    </div>
                </div>
                <!--/ Line Chart - Profit -->

                <!-- Earnings Card -->
                <div class="col-lg-12 col-md-6 col-12">
                    <div class="card earnings-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h4 class="card-title mb-1">Earnings</h4>
                                    <div class="font-small-2">This Month</div>
                                    <h5 class="mb-1">$4055.56</h5>
                                    <p class="card-text text-muted font-small-2">
                                        <span class="font-weight-bolder">68.2%</span><span> more earnings than last month.</span>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <div id="earnings-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Earnings Card -->
            </div>
        </div>

        <!-- Revenue Report Card -->
        <div class="col-lg-8 col-12">
            <div class="card card-revenue-budget">
                <div class="row mx-0">
                    <div class="col-md-8 col-12 revenue-report-wrapper">
                        <div class="d-sm-flex justify-content-between align-items-center mb-3">
                            <h4 class="card-title mb-50 mb-sm-0">Revenue Report</h4>
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center mr-2">
                                    <span class="bullet bullet-primary font-small-3 mr-50 cursor-pointer"></span>
                                    <span>Earning</span>
                                </div>
                                <div class="d-flex align-items-center ml-75">
                                    <span class="bullet bullet-warning font-small-3 mr-50 cursor-pointer"></span>
                                    <span>Expense</span>
                                </div>
                            </div>
                        </div>
                        <div id="revenue-report-chart"></div>
                    </div>
                    <div class="col-md-4 col-12 budget-wrapper">
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle budget-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                2020
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);">2020</a>
                                <a class="dropdown-item" href="javascript:void(0);">2019</a>
                                <a class="dropdown-item" href="javascript:void(0);">2018</a>
                            </div>
                        </div>
                        <h2 class="mb-25">$25,852</h2>
                        <div class="d-flex justify-content-center">
                            <span class="font-weight-bolder mr-25">Budget:</span>
                            <span>56,800</span>
                        </div>
                        <div id="budget-chart"></div>
                        <button type="button" class="btn btn-primary">Increase Budget</button>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Revenue Report Card -->
    </div>

    <div class="row match-height">
        <!-- Company Table Card -->
        <div class="col-lg-8 col-12">
            <div class="card card-company-table">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Most Page</th>
                                    <th>Views</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mostPages as $key => $mostPage)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar bg-light-info mr-1">
                                                <div class="avatar-content">
                                                    @php
                                                        $explode = explode('/',$mostPage['url']);
                                                    @endphp
                                                    @if ($explode[1] == '')
                                                    <i data-feather="home" class="font-medium-3"></i>
                                                @elseif ($explode[1] == 'categories')
                                                    <i data-feather="grid" class="font-medium-3"></i>
                                                @elseif ($explode[1] == 'products')
                                                    <i data-feather="box" class="font-medium-3"></i>
                                                @else
                                                    <i data-feather="more-horizontal" class="font-medium-3"></i>
                                                    @endif
                                                </div>
                                            </div>
                                            <a href="{{ url('').$mostPage['url'] }}" target="_blank" class="text-white">
                                                {{ $mostPage['pageTitle'] }}
                                            </a>
                                        </div>
                                    </td>
                                    <td>{{ number_format($mostPage['pageViews']) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Company Table Card -->

        <!-- Developer Meetup Card -->
        <div class="col-lg-4 col-md-6 col-12">
            <div class="card card-developer-meetup">
                <div class="meetup-img-wrapper rounded-top text-center">
                    <img src="{{asset('images/illustration/email.svg')}}" alt="Meeting Pic" height="170" />
                </div>
                <div class="card-body">
                    <div class="meetup-header d-flex align-items-center">
                        <div class="meetup-day">
                            <h6 class="mb-0">U</h6>
                            <h3 class="mb-0">T</h3>
                        </div>
                        <div class="my-auto">
                            <h4 class="card-title mb-25">User Types</h4>
                            <p class="card-text mb-0">Google Analytics Dimension</p>
                        </div>
                    </div>
                    @foreach ($userTypes as $key => $userType)
                    <div class="media {{ ($key != 0)? 'mt-2' : '' }}">
                        <div class="avatar bg-light-primary rounded mr-1">
                            <div class="avatar-content">
                                <i data-feather="{{ ($key == 0)? 'user-plus' : 'user' }}" class="avatar-icon font-medium-3"></i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h6 class="mb-0">{{ $userType['type'] }}</h6>
                            <small>{{ $userType['sessions'] }}</small>
                        </div>
                    </div>
                    @endforeach
                    <div class="mt-1">
                        Behavior section, people who visit your website are categorized under the dimension of User Type
                    </div>
                </div>
            </div>
        </div>
        <!--/ Developer Meetup Card -->

        <!-- Browser States Card -->
        <div class="col-lg-4 col-md-6 col-12">
            <div class="card card-browser-states">
                <div class="card-header">
                    <div>
                        <h4 class="card-title">Browser States</h4>
                        <p class="card-text font-small-2">Counter August 2020</p>
                    </div>
                    <div class="dropdown chart-dropdown">
                        <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-toggle="dropdown"></i>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="browser-states">
                        <div class="media">
                            <img src="{{asset('images/icons/google-chrome.png')}}" class="rounded mr-1" height="30" alt="Google Chrome" />
                            <h6 class="align-self-center mb-0">Google Chrome</h6>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="font-weight-bold text-body-heading mr-1">54.4%</div>
                            <div id="browser-state-chart-primary"></div>
                        </div>
                    </div>
                    <div class="browser-states">
                        <div class="media">
                            <img src="{{asset('images/icons/mozila-firefox.png')}}" class="rounded mr-1" height="30" alt="Mozila Firefox" />
                            <h6 class="align-self-center mb-0">Mozila Firefox</h6>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="font-weight-bold text-body-heading mr-1">6.1%</div>
                            <div id="browser-state-chart-warning"></div>
                        </div>
                    </div>
                    <div class="browser-states">
                        <div class="media">
                            <img src="{{asset('images/icons/apple-safari.png')}}" class="rounded mr-1" height="30" alt="Apple Safari" />
                            <h6 class="align-self-center mb-0">Apple Safari</h6>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="font-weight-bold text-body-heading mr-1">14.6%</div>
                            <div id="browser-state-chart-secondary"></div>
                        </div>
                    </div>
                    <div class="browser-states">
                        <div class="media">
                            <img src="{{asset('images/icons/internet-explorer.png')}}" class="rounded mr-1" height="30" alt="Internet Explorer" />
                            <h6 class="align-self-center mb-0">Internet Explorer</h6>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="font-weight-bold text-body-heading mr-1">4.2%</div>
                            <div id="browser-state-chart-info"></div>
                        </div>
                    </div>
                    <div class="browser-states">
                        <div class="media">
                            <img src="{{asset('images/icons/opera.png')}}" class="rounded mr-1" height="30" alt="Opera Mini" />
                            <h6 class="align-self-center mb-0">Opera Mini</h6>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="font-weight-bold text-body-heading mr-1">8.4%</div>
                            <div id="browser-state-chart-danger"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Browser States Card -->

        {{-- <img src="{{asset('images/icons/google-chrome.png')}}" class="rounded mr-1" height="30" alt="Google Chrome" />
        <img src="{{asset('images/icons/mozila-firefox.png')}}" class="rounded mr-1" height="30" alt="Mozila Firefox" />
        <img src="{{asset('images/icons/apple-safari.png')}}" class="rounded mr-1" height="30" alt="Apple Safari" />
        <img src="{{asset('images/icons/internet-explorer.png')}}" class="rounded mr-1" height="30" alt="Internet Explorer" />
        <img src="{{asset('images/icons/opera.png')}}" class="rounded mr-1" height="30" alt="Opera Mini" /> --}}

        <!-- Goal Overview Card -->
        <div class="col-lg-4 col-md-6 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Goal Overview</h4>
                    <i data-feather="help-circle" class="font-medium-3 text-muted cursor-pointer"></i>
                </div>
                <div class="card-body p-0">
                    <div id="goal-overview-radial-bar-chart" class="my-2"></div>
                    <div class="row border-top text-center mx-0">
                        <div class="col-6 border-right py-1">
                            <p class="card-text text-muted mb-0">Completed</p>
                            <h3 class="font-weight-bolder mb-0">786,617</h3>
                        </div>
                        <div class="col-6 py-1">
                            <p class="card-text text-muted mb-0">In Progress</p>
                            <h3 class="font-weight-bolder mb-0">13,561</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Goal Overview Card -->

        <!-- Transaction Card -->
        <div class="col-lg-4 col-md-6 col-12">
            <div class="card card-transaction">
                <div class="card-header">
                    <h4 class="card-title">Transactions</h4>
                    <div class="dropdown chart-dropdown">
                        <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-toggle="dropdown"></i>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="transaction-item">
                        <div class="media">
                            <div class="avatar bg-light-primary rounded">
                                <div class="avatar-content">
                                    <i data-feather="pocket" class="avatar-icon font-medium-3"></i>
                                </div>
                            </div>
                            <div class="media-body">
                                <h6 class="transaction-title">Wallet</h6>
                                <small>Starbucks</small>
                            </div>
                        </div>
                        <div class="font-weight-bolder text-danger">- $74</div>
                    </div>
                    <div class="transaction-item">
                        <div class="media">
                            <div class="avatar bg-light-success rounded">
                                <div class="avatar-content">
                                    <i data-feather="check" class="avatar-icon font-medium-3"></i>
                                </div>
                            </div>
                            <div class="media-body">
                                <h6 class="transaction-title">Bank Transfer</h6>
                                <small>Add Money</small>
                            </div>
                        </div>
                        <div class="font-weight-bolder text-success">+ $480</div>
                    </div>
                    <div class="transaction-item">
                        <div class="media">
                            <div class="avatar bg-light-danger rounded">
                                <div class="avatar-content">
                                    <i data-feather="dollar-sign" class="avatar-icon font-medium-3"></i>
                                </div>
                            </div>
                            <div class="media-body">
                                <h6 class="transaction-title">Paypal</h6>
                                <small>Add Money</small>
                            </div>
                        </div>
                        <div class="font-weight-bolder text-success">+ $590</div>
                    </div>
                    <div class="transaction-item">
                        <div class="media">
                            <div class="avatar bg-light-warning rounded">
                                <div class="avatar-content">
                                    <i data-feather="credit-card" class="avatar-icon font-medium-3"></i>
                                </div>
                            </div>
                            <div class="media-body">
                                <h6 class="transaction-title">Mastercard</h6>
                                <small>Ordered Food</small>
                            </div>
                        </div>
                        <div class="font-weight-bolder text-danger">- $23</div>
                    </div>
                    <div class="transaction-item">
                        <div class="media">
                            <div class="avatar bg-light-info rounded">
                                <div class="avatar-content">
                                    <i data-feather="trending-up" class="avatar-icon font-medium-3"></i>
                                </div>
                            </div>
                            <div class="media-body">
                                <h6 class="transaction-title">Transfer</h6>
                                <small>Refund</small>
                            </div>
                        </div>
                        <div class="font-weight-bolder text-success">+ $98</div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Transaction Card -->
    </div>
</section>
<!-- Dashboard Ecommerce ends -->
@endsection

@section('vendor-script')
{{-- vendor files --}}
<script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@endsection
@section('page-script')
{{-- Page js files --}}
<script src="{{ asset(mix('js/scripts/pages/dashboard-ecommerce.js')) }}"></script>
<script>
    $(function() {
        loadData()

        setInterval(loadData, 60000);

        function loadData() {
            const url = '{{ url("/") }}'
            $.ajax({
                url: url + '/admin/dashboards/load-data',
                type: 'get',
            }).done(function(response) {
                console.log(response);
                if (response.status == 'success') {
                    $('#grand-total').empty().append('Bath ' + response.grandTotal);

                    $('#now').empty().append(response.now);
                    $('#counter-category').empty().append(response.counterCategory);
                    $('#counter-product').empty().append(response.counterProduct);
                    $('#counter-customer').empty().append(response.counterCustomer);
                    $('#counter-order-waiting').empty().append(response.counterOrderWaiting);
                }
            });
        }

        $('.card-congratulation-medal').on('click', '#btnOrder', function() {
            window.location.href = '{{ route("admin.orders.index") }}';
        });
    })
</script>
@endsection
