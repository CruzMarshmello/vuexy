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
        <!-- Revenue Report Card -->
        <div class="col-lg-6 col-12">
            <div class="card card-revenue-budget">
                <div class="row mx-0">
                    <div class="col-md-12 col-12">
                        <!-- revenue-report-wrapper -->
                        <div class="d-sm-flex justify-content-between align-items-center mb-3 mt-2">
                            <h4 class="card-title mb-50 mb-sm-0">Revenue Report of {{ \Carbon\Carbon::now()->format("Y") }}</h4>
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center mr-2">
                                    <span class="bullet bullet-primary font-small-3 mr-50 cursor-pointer"></span>
                                    <span>Earning</span>
                                </div>
                            </div>
                        </div>
                        <div id="revenue-report-chart"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Revenue Report Card -->

        <!-- Revenue Report Card -->
        <div class="col-lg-6 col-12">
            <div class="card card-revenue-budget">
                <div class="row mx-0">
                    <div class="col-md-12 col-12">
                        <!-- revenue-report-wrapper -->
                        <div class="d-sm-flex justify-content-between align-items-center mb-3 mt-2">
                            <h4 class="card-title mb-50 mb-sm-0">Visitor Report <small class="text-muted">GA : 7 Day Period</small></h4>
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center mr-2">
                                    <span class="bullet bullet-primary font-small-3 mr-50 cursor-pointer"></span>
                                    <span>Visitor</span>
                                </div>
                                <div class="d-flex align-items-center ml-75">
                                    <span class="bullet bullet-warning font-small-3 mr-50 cursor-pointer"></span>
                                    <span>Page Views</span>
                                </div>
                            </div>
                        </div>
                        <div id="visitor-report-chart"></div>
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
                                    <th>Most Page <small class="text-muted">GA : 30 Day Period</small></th>
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
                            <p class="card-text mb-0"><small class="text-muted">GA : 1 Year Period</small></p>
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
                        <p class="card-text font-small-2"><small class="text-muted">GA : 1 Year Period</small></p>
                    </div>
                </div>
                <div class="card-body">
                    @foreach ($browsers as $key => $browser)
                    <div class="browser-states">
                        <div class="media">
                            @if ($browser['name'] == 'Chrome')
                            <img src="{{asset('images/icons/google-chrome.png')}}" class="rounded mr-1" height="30" alt="Google Chrome" />
                            @elseif ($browser['name'] == 'Safari')
                            <img src="{{asset('images/icons/apple-safari.png')}}" class="rounded mr-1" height="30" alt="Apple Safari" />
                            @elseif ($browser['name'] == 'Firefox')
                            <img src="{{asset('images/icons/mozila-firefox.png')}}" class="rounded mr-1" height="30" alt="Mozila Firefox" />
                            @elseif ($browser['name'] == 'Internet Explorer')
                            <img src="{{asset('images/icons/internet-explorer.png')}}" class="rounded mr-1" height="30" alt="Internet Explorer" />
                            @elseif ($browser['name'] == 'Edge')
                            <img src="{{asset('images/icons/microsoft-edge.png')}}" class="rounded mr-1" height="30" alt="Opera Mini" />
                            @elseif ($browser['name'] == 'Opera')
                            <img src="{{asset('images/icons/opera.png')}}" class="rounded mr-1" height="30" alt="Opera Mini" />
                            @elseif ($browser['name'] == 'Safari (in-app)')
                            <img src="{{asset('images/icons/safari-in-app.png')}}" class="rounded mr-1" height="30" alt="Safari (in-app)" />
                            @elseif ($browser['name'] == 'Android Webview')
                            <img src="{{asset('images/icons/android-webview.png')}}" class="rounded mr-1" height="30" alt="Android Webview" />
                            @else
                            <img src="{{asset('images/icons/internet.png')}}" class="rounded mr-1" height="30" alt="Google Chrome" />
                            @endif
                            <h6 class="align-self-center mb-0">{{ $browser['name'] }}</h6>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="font-weight-bold text-body-heading mr-1">{{ number_format($browser['percentage']) }}%</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!--/ Browser States Card -->
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
{{-- <script src="{{ asset(mix('js/scripts/pages/dashboard-ecommerce.js')) }}"></script> --}}
<script>
    $(function() {

        loadData()

        setTimeout(function() {
            toastr['success'](
                'You have successfully logged in to Vuexy. Now you can start to explore!',
                '👋 Welcome Administrator!', {
                    closeButton: true,
                    tapToDismiss: false,
                }
            );
        }, 2000);

        setInterval(loadData, 60000);

        //------------ Revenue Report Chart ------------
        //----------------------------------------------
        $('#revenue-report-chart').empty();
        var $textMutedColor = '#b9b9c3';
        var $visitorReportChart = document.querySelector('#visitor-report-chart');
        var visitorReportChartOptions;
        var visitorReportChart;

        visitorReportChartOptions = {
            chart: {
                height: 230,
                stacked: true,
                type: 'bar',
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    columnWidth: '17%',
                    endingShape: 'rounded'
                },
                distributed: true
            },
            colors: [window.colors.solid.primary, window.colors.solid.warning],
            series: [{
                name: 'Visitors',
                data: [
                    @foreach($pageViews as $key => $pageView)
                    '{{ $pageView["visitors"] }}',
                    @endforeach
                ]
            }, {
                name: 'Page Views',
                data: [
                    @foreach($pageViews as $key => $pageView)
                    '{{ $pageView["pageViews"] }}',
                    @endforeach
                ]
            }],
            dataLabels: {
                enabled: false
            },
            legend: {
                show: false
            },
            grid: {
                padding: {
                    top: -20,
                    bottom: -10
                },
                yaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            xaxis: {
                categories: [
                    @foreach($pageViews as $key => $pageView)
                    '{{ $pageView["date"]->format("M d") }}',
                    @endforeach
                ],
                labels: {
                    style: {
                        colors: $textMutedColor,
                        fontSize: '0.86rem'
                    }
                },
                axisTicks: {
                    show: false
                },
                axisBorder: {
                    show: false
                }
            },
            yaxis: {
                labels: {
                    style: {
                        colors: $textMutedColor,
                        fontSize: '0.86rem'
                    }
                }
            }
        };
        visitorReportChart = new ApexCharts($visitorReportChart, visitorReportChartOptions);
        visitorReportChart.render();

        function loadData() {
            const url = '{{ url("/") }}'
            $.ajax({
                url: url + '/admin/dashboards/load-data',
                type: 'get',
            }).done(function(response) {
                if (response.status == 'success') {
                    $('#grand-total').empty().append('Bath ' + response.grandTotal);

                    $('#now').empty().append(response.now);
                    $('#counter-category').empty().append(response.counterCategory);
                    $('#counter-product').empty().append(response.counterProduct);
                    $('#counter-customer').empty().append(response.counterCustomer);
                    $('#counter-order-waiting').empty().append(response.counterOrderWaiting);

                    //------------ Revenue Report Chart ------------
                    //----------------------------------------------
                    $('#revenue-report-chart').empty();
                    var $textMutedColor = '#b9b9c3';
                    var $revenueReportChart = document.querySelector('#revenue-report-chart');
                    var revenueReportChartOptions;
                    var revenueReportChart;
                    const earning = response.earning;

                    revenueReportChartOptions = {
                        chart: {
                            height: 230,
                            stacked: true,
                            type: 'line',
                            toolbar: {
                                show: false
                            }
                        },
                        colors: [window.colors.solid.primary],
                        series: [{
                            name: 'Earning',
                            data: [earning[0], earning[1], earning[2], earning[3], earning[4], earning[5], earning[6], earning[7], earning[8], earning[9], earning[10], earning[11]]
                        }],
                        dataLabels: {
                            enabled: false
                        },
                        legend: {
                            show: false
                        },
                        grid: {
                            padding: {
                                top: -20,
                                bottom: -10
                            },
                            yaxis: {
                                lines: {
                                    show: true
                                }
                            }
                        },
                        xaxis: {
                            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                            labels: {
                                style: {
                                    colors: $textMutedColor,
                                    fontSize: '0.86rem'
                                }
                            },
                            axisTicks: {
                                show: false
                            },
                            axisBorder: {
                                show: false
                            }
                        },
                        yaxis: {
                            labels: {
                                style: {
                                    colors: $textMutedColor,
                                    fontSize: '0.86rem'
                                }
                            }
                        }
                    };
                    revenueReportChart = new ApexCharts($revenueReportChart, revenueReportChartOptions);
                    revenueReportChart.render();
                }
            });
        }

        $('.card-congratulation-medal').on('click', '#btnOrder', function() {
            window.location.href = '{{ route("admin.orders.index") }}';
        });
    })
</script>
@endsection
