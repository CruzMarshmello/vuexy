<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Coupon;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $coupons = Coupon::where('name', 'like', '%'.$request->search_name.'%')
                ->orderBy('start_date', 'desc')
                ->paginate(15);

        $request->flash();

        $breadcrumbs = [
            ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
            ['name' => 'Coupons']
        ];

        return view('admin.coupons.index', compact('coupons', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [
            ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
            ['link' => 'admin/coupons', 'name' => 'Coupons'],
            ['name' => 'Create']
        ];

        return view('admin.coupons.create', compact('breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:coupons,name',
            'code' => 'required|min:5|alpha_dash|unique:coupons,code',
            'daterange' => 'required',
            'percentage' => 'required|numeric|min:0',
            'amount' => 'required|numeric|min:0'
        ]);

        $coupon = new Coupon();
        $coupon->name = $request->name;
        $coupon->code = $request->code;

        $daterange = explode(' to ', $request->daterange);
        if (count($daterange) > 1) {
            $coupon->start_date = $daterange[0];
            $coupon->end_date = $daterange[1];
        } else {
            $coupon->start_date = $daterange[0];
            $coupon->end_date = $daterange[0];
        }

        $coupon->percentage = $request->percentage;
        $coupon->amount = $request->amount;
        $coupon->status = $request->status;
        $coupon->save();

        return redirect()->back()->with('success', 'Coupon has been add successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coupon = Coupon::where('id', $id)->first();

        if (!$coupon) {
            abort(404);
        }

        $breadcrumbs = [
            ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
            ['link' => 'admin/coupons', 'name' => 'Coupons'],
            ['name' => 'Show']
        ];

        return view('admin.coupons.show', compact('coupon', 'breadcrumbs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = Coupon::where('id', $id)->first();

        if (!$coupon) {
            abort(404);
        }

        $breadcrumbs = [
            ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
            ['link' => 'admin/coupons', 'name' => 'Coupons'],
            ['name' => 'Edit']
        ];

        return view('admin.coupons.edit', compact('coupon', 'breadcrumbs'));
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
        $coupon = Coupon::where('id', $id)->first();

        if (!$coupon) {
            abort(404);
        }

        $request->validate([
            'name' => 'required|unique:coupons,name,'.$coupon->id,
            'code' => 'required|min:5|alpha_dash|unique:coupons,code,'.$coupon->id,
            'daterange' => 'required',
            'percentage' => 'required|numeric|min:0',
            'amount' => 'required|numeric|min:0'
        ]);

        $coupon->name = $request->name;
        $coupon->code = $request->code;

        $daterange = explode(' to ', $request->daterange);
        if (count($daterange) > 1) {
            $coupon->start_date = $daterange[0];
            $coupon->end_date = $daterange[1];
        } else {
            $coupon->start_date = $daterange[0];
            $coupon->end_date = $daterange[0];
        }

        $coupon->percentage = $request->percentage;
        $coupon->amount = $request->amount;
        $coupon->status = $request->status;
        $coupon->save();

        return redirect()->back()->with('success', 'Coupon has been update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = Coupon::where('id', $id)->first();

        if (!$coupon) {
            abort(404);
        }

        $coupon->delete();

        return redirect()->back()->with('success', 'Coupon has been delete successfully.');
    }
}
