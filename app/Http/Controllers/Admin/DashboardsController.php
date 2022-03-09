<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Analytics;
use Spatie\Analytics\Period;

use App\Models\Category;
use App\models\Product;
use App\Models\User;
use App\Models\Order;

class DashboardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageViews = Analytics::fetchTotalVisitorsAndPageViews(Period::days(6));

        $mostPages = Analytics::fetchMostVisitedPages(Period::days(30), 8);

        $userTypes = Analytics::fetchUserTypes(Period::years(1));

        $topBrowsers = Analytics::fetchTopBrowsers(Period::years(1), 5);

        $summary = 0;
        foreach ($topBrowsers as $key => $topBrowser) {
            $summary += $topBrowser['sessions'];
        }

        $browsers = array();
        foreach ($topBrowsers as $key => $topBrowser) {
            $browsers[$key]['name'] = $topBrowser['browser'];
            $browsers[$key]['percentage'] = ($topBrowser['sessions']*100)/$summary;
        }

        $pageConfigs = ['pageHeader' => false];

        return view('admin.dashboards.index', compact('pageViews', 'mostPages', 'userTypes', 'browsers', 'pageConfigs'));
    }

    public function loadData()
    {
        $year = Carbon::now()->format('Y');
        $firstYear = new Carbon('first day of January '.$year);
        $firstYear = $firstYear->toDateTimeString();
        $lastYear = new Carbon('last day of December '.$year);
        $lastYear = $lastYear->toDateTimeString();

        $orders = Order::whereBetween('created_at', [$firstYear,$lastYear])->get();
        $grandTotal = 0;
        foreach ($orders as $key => $order) {
            $summary = unserialize($order->summary);
            $grandTotal += $summary['grandTotal'];
        }

        $now = Carbon::now()->format("Y-m-d H:i:s");
        $counterCategory = Category::get()->count();
        $counterProduct = Product::where('parent_id', 0)->count();
        $counterCustomer = User::where('role', 'User')->count();
        $counterOrderWaiting = Order::where('parcel', null)->count();

        $start = new Carbon('first day of January '.$year);
        $start = $start->toDateTimeString();
        $end = new Carbon('last day of January '.$year);
        $end = $end->toDateTimeString();

        $orders = Order::whereBetween('created_at', [$start,$end])->get();
        $january = 0;
        foreach ($orders as $key => $order) {
            $summary = unserialize($order->summary);
            $january += $summary['grandTotal'];
        }

        $start = new Carbon('first day of February '.$year);
        $start = $start->toDateTimeString();
        $end = new Carbon('last day of February '.$year);
        $end = $end->toDateTimeString();

        $orders = Order::whereBetween('created_at', [$start,$end])->get();
        $february = 0;
        foreach ($orders as $key => $order) {
            $summary = unserialize($order->summary);
            $february += $summary['grandTotal'];
        }

        $start = new Carbon('first day of March '.$year);
        $start = $start->toDateTimeString();
        $end = new Carbon('last day of March '.$year);
        $end = $end->toDateTimeString();

        $orders = Order::whereBetween('created_at', [$start,$end])->get();
        $march = 0;
        foreach ($orders as $key => $order) {
            $summary = unserialize($order->summary);
            $march += $summary['grandTotal'];
        }

        $start = new Carbon('first day of April '.$year);
        $start = $start->toDateTimeString();
        $end = new Carbon('last day of April '.$year);
        $end = $end->toDateTimeString();

        $orders = Order::whereBetween('created_at', [$start,$end])->get();
        $april = 0;
        foreach ($orders as $key => $order) {
            $summary = unserialize($order->summary);
            $april += $summary['grandTotal'];
        }

        $start = new Carbon('first day of May '.$year);
        $start = $start->toDateTimeString();
        $end = new Carbon('last day of May '.$year);
        $end = $end->toDateTimeString();

        $orders = Order::whereBetween('created_at', [$start,$end])->get();
        $may = 0;
        foreach ($orders as $key => $order) {
            $summary = unserialize($order->summary);
            $may += $summary['grandTotal'];
        }

        $start = new Carbon('first day of June '.$year);
        $start = $start->toDateTimeString();
        $end = new Carbon('last day of June '.$year);
        $end = $end->toDateTimeString();

        $orders = Order::whereBetween('created_at', [$start,$end])->get();
        $june = 0;
        foreach ($orders as $key => $order) {
            $summary = unserialize($order->summary);
            $june += $summary['grandTotal'];
        }

        $start = new Carbon('first day of July '.$year);
        $start = $start->toDateTimeString();
        $end = new Carbon('last day of July '.$year);
        $end = $end->toDateTimeString();

        $orders = Order::whereBetween('created_at', [$start,$end])->get();
        $july = 0;
        foreach ($orders as $key => $order) {
            $summary = unserialize($order->summary);
            $july += $summary['grandTotal'];
        }

        $start = new Carbon('first day of August '.$year);
        $start = $start->toDateTimeString();
        $end = new Carbon('last day of August '.$year);
        $end = $end->toDateTimeString();

        $orders = Order::whereBetween('created_at', [$start,$end])->get();
        $august = 0;
        foreach ($orders as $key => $order) {
            $summary = unserialize($order->summary);
            $august += $summary['grandTotal'];
        }

        $start = new Carbon('first day of September '.$year);
        $start = $start->toDateTimeString();
        $end = new Carbon('last day of September '.$year);
        $end = $end->toDateTimeString();

        $orders = Order::whereBetween('created_at', [$start,$end])->get();
        $september = 0;
        foreach ($orders as $key => $order) {
            $summary = unserialize($order->summary);
            $september += $summary['grandTotal'];
        }

        $start = new Carbon('first day of October '.$year);
        $start = $start->toDateTimeString();
        $end = new Carbon('last day of October '.$year);
        $end = $end->toDateTimeString();

        $orders = Order::whereBetween('created_at', [$start,$end])->get();
        $october = 0;
        foreach ($orders as $key => $order) {
            $summary = unserialize($order->summary);
            $october += $summary['grandTotal'];
        }

        $start = new Carbon('first day of November '.$year);
        $start = $start->toDateTimeString();
        $end = new Carbon('last day of November '.$year);
        $end = $end->toDateTimeString();

        $orders = Order::whereBetween('created_at', [$start,$end])->get();
        $november = 0;
        foreach ($orders as $key => $order) {
            $summary = unserialize($order->summary);
            $november += $summary['grandTotal'];
        }

        $start = new Carbon('first day of December '.$year);
        $start = $start->toDateTimeString();
        $end = new Carbon('last day of December '.$year);
        $end = $end->toDateTimeString();

        $orders = Order::whereBetween('created_at', [$start,$end])->get();
        $december = 0;
        foreach ($orders as $key => $order) {
            $summary = unserialize($order->summary);
            $december += $summary['grandTotal'];
        }

        $earning[] = $january;
        $earning[] = $february;
        $earning[] = $march;
        $earning[] = $april;
        $earning[] = $may;
        $earning[] = $june;
        $earning[] = $july;
        $earning[] = $august;
        $earning[] = $september;
        $earning[] = $october;
        $earning[] = $november;
        $earning[] = $december;

        return response()->json([
            'status' => 'success',
            'grandTotal' => number_format($grandTotal),
            'now' => $now,
            'counterCategory' => number_format($counterCategory),
            'counterProduct' => number_format($counterProduct),
            'counterCustomer' => number_format($counterCustomer),
            'counterOrderWaiting' => number_format($counterOrderWaiting),
            'earning' => $earning
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
