<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = Order::where('code', 'like', '%'.$request->search_code.'%')
                ->orderBy('id', 'desc')
                ->paginate(15);

        $request->flash();

        $breadcrumbs = [
            ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
            ['name' => 'Orders']
        ];

        return view('admin.orders.index', compact('orders', 'breadcrumbs'));
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
        $order = Order::where('id', $id)->first();

        if (!$order) {
            abort(404);
        }

        $breadcrumbs = [
            ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
            ['link' => 'admin/orders', 'name' => 'Orders'],
            ['name' => 'Show']
        ];

        return view('admin.orders.show', compact('order', 'breadcrumbs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::where('id', $id)->first();

        if (!$order) {
            abort(404);
        }

        $breadcrumbs = [
            ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
            ['link' => 'admin/orders', 'name' => 'Orders'],
            ['name' => 'Edit']
        ];

        return view('admin.orders.edit', compact('order', 'breadcrumbs'));
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
        $order = Order::where('id', $id)->first();

        if (!$order) {
            abort(404);
        }

        $request->validate([
            'shipping_full_name' => 'required',
            'shipping_address_1' => 'required',
            'shipping_sub_district' => 'required',
            'shipping_district' => 'required',
            'shipping_province' => 'required',
            'shipping_postal_code' => 'required',
            'shipping_country' => 'required',
            'shipping_telephone' => 'required',
            'billing_full_name' => 'required',
            'billing_address_1' => 'required',
            'billing_sub_district' => 'required',
            'billing_district' => 'required',
            'billing_province' => 'required',
            'billing_postal_code' => 'required',
            'billing_country' => 'required',
            'billing_telephone' => 'required',
        ]);

        $order->parcel = $request->parcel;

        $address['shipping']['full_name'] = $request->shipping_full_name;
        $address['shipping']['address_1'] = $request->shipping_address_1;
        $address['shipping']['address_2'] = $request->shipping_address_2;
        $address['shipping']['sub_district'] = $request->shipping_sub_district;
        $address['shipping']['district'] = $request->shipping_district;
        $address['shipping']['province'] = $request->shipping_province;
        $address['shipping']['postal_code'] = $request->shipping_postal_code;
        $address['shipping']['country'] = $request->shipping_country;
        $address['shipping']['telephone'] = $request->shipping_telephone;

        $order->shipping = serialize($address['shipping']);

        $address['billing']['full_name'] = $request->billing_full_name;
        $address['billing']['address_1'] = $request->billing_address_1;
        $address['billing']['address_2'] = $request->billing_address_2;
        $address['billing']['sub_district'] = $request->billing_sub_district;
        $address['billing']['district'] = $request->billing_district;
        $address['billing']['province'] = $request->billing_province;
        $address['billing']['postal_code'] = $request->billing_postal_code;
        $address['billing']['country'] = $request->billing_country;
        $address['billing']['telephone'] = $request->billing_telephone;

        $order->billing = serialize($address['billing']);

        $order->save();

        return redirect()->back()->with('success', 'Order has been update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::where('id', $id)->first();

        if (!$order) {
            abort(404);
        }

        $order->delete();

        return redirect()->back()->with('success', 'Order has been delete successfully.');
    }
}
