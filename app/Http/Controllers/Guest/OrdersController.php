<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Cashier;
use Carbon\Carbon;
use PDF;

use Mail;
use App\Mail\ConfirmOrder;

use App\Models\Category;
use App\Models\Information;
use App\Models\ContactUs;

use App\Models\Product;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\User;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryLinks = Category::where('parent_id', 0)
                    ->orderBy('sort_order', 'asc')
                    ->get();

        $informationLinks = Information::where('status', 'Enabled')
                    ->orderBy('sort_order', 'asc')
                    ->get();

        $contactUsLink = ContactUs::where('id', 1)->first();

        $breadcrumbs = [
            ['link' => '/', 'name' => __('order.home')],
            ['name' => __('order.track order')]
        ];

        return view('guest.orders.index', compact('categoryLinks', 'informationLinks', 'contactUsLink', 'breadcrumbs'));
    }

    public function check(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'email' => 'required|email'
        ]);

        $order = Order::where('code', $request->code)
                ->where('email', $request->email)
                ->first();

        if (!$order) {
            return redirect()->back()->with(['error' => __('order.error')]);
        } else {
            return redirect()->route('guest.orders.show', ['code' => $request->code, 'email' => $request->email]);
        }
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
        if ($request->omiseToken != '') {
            define('OMISE_PUBLIC_KEY', env('OMISE_PUBLIC_KEY'));
            define('OMISE_SECRET_KEY', env('OMISE_SECRET_KEY'));

            $cart = session()->get('cart');
            $summary = session()->get('summary');
            $address = session()->get('address');

            $charge = Cashier::charge(array(
                'amount' => round($summary['grandTotal']) * 100,
                'currency' => 'thb',
                'card' => $request->omiseToken
            ));

            if ($charge['status'] == 'successful') {
                foreach ($cart as $key => $item) {
                    $product = Product::where('id', $key)->first();

                    if ($product) {
                        $product->quantity = $product->quantity - $item['quantity'];
                        $product->save();
                    }
                }

                if ($summary['coupon']['code'] != '') {
                    $coupon = Coupon::where('code', $summary['coupon']['code'])->first();

                    if ($coupon) {
                        $coupon->amount = $coupon->amount - 1;
                        $coupon->save();
                    }
                }

                $order = new Order();
                $order->save();

                $code = Carbon::now()->format('Ymd').$order->id;

                $order->code = $code;
                $order->email = $address['email'];
                $order->shipping = serialize($address['shipping']);
                $order->billing = serialize($address['billing']);
                $order->cart = serialize($cart);
                $order->summary = serialize($summary);
                $order->transaction = $charge['transaction'];
                $order->brand = $charge['card']['brand'];
                $order->status = 'Order Placed';

                $user = User::where('email', $address['email'])->first();
                if ($user) {
                    $order->user_id = $user->id;
                }

                $order->save();

                if ($user) {
                    $details = [
                        'subject' => 'Your Order #'.$order->code,
                        'full_name' => $user->full_name,
                        'link' => 'orders/'.$order->code.'/'.urlencode($order->email)
                    ];
                } else {
                    $details = [
                        'subject' => 'Your Order #'.$order->code,
                        'full_name' => '',
                        'link' => 'orders/'.$order->code.'/'.urlencode($order->email)
                    ];
                }

                Mail::to($order->email)->send(new ConfirmOrder($details));

                session()->forget('cart');
                session()->forget('summary');
                session()->forget('address');

                return redirect()->route('guest.orders.show', ['code' => $order->code, 'email' => $order->email]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($code, $email)
    {
        $order = Order::where('code', $code)
                ->where('email', $email)
                ->first();

        if (!$order) {
            abort(404);
        }

        $categoryLinks = Category::where('parent_id', 0)
                            ->orderBy('sort_order', 'asc')
                            ->get();

        $informationLinks = Information::where('status', 'Enabled')
                            ->orderBy('sort_order', 'asc')
                            ->get();

        $contactUsLink = ContactUs::where('id', 1)->first();

        $breadcrumbs = [
            ['link' => '/', 'name' => __('order.home')],
            ['link' => '', 'name' => __('order.track order')],
            ['name' => '#'.$code]
        ];

        return view('guest.orders.show', compact('order', 'categoryLinks', 'informationLinks', 'contactUsLink', 'breadcrumbs'));
    }

    public function print($code, $email, $type)
    {
        $order = Order::where('code', $code)
                ->where('email', $email)
                ->first();

        if (!$order) {
            abort(404);
        }

        if ($type == 'invoice') {
            $type = __('order.invoice');
        } else {
            $type = __('order.tax');
        }

        $contactUs = ContactUs::where('id', 1)->first();

        $data = [
            'type' => $type,
            'contactUs' => $contactUs,
            'order' => $order,
        ];

        $pdf = PDF::loadView('guest.orders.download', $data);
        return @$pdf->download($type.'-'.$code.'.pdf');
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
