<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

use App\Models\Category;
use App\Models\Information;
use App\Models\ContactUs;

use App\Models\Product;
use App\Models\Coupon;
use App\Models\AddressBook;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = session()->get('cart');

        if (!$cart) {
            return redirect()->route('guest.homes.index');
        }

        foreach ($cart as $key => $item) {
            $product = Product::where('id', $key)->first();

            if ($item['quantity'] > $product->quantity && $product->quantity != 0) {
                $quantity = $product->quantity;
                $cart[$key]['quantity'] = $quantity;

                $price = $quantity * $cart[$key]['price'];
                $discount = $price * $cart[$key]['percentage'] / 100;
                $cart[$key]['total'] = $price - $discount;

                session()->put('cart', $cart);
            } elseif ($item['quantity'] > $product->quantity && $product->quantity == 0) {
                unset($cart[$key]);

                session()->put('cart', $cart);
            }
        }

        if (count($cart) == 0) {
            return redirect()->route('guest.homes.index');
        }

        $deliveryAndReturns = Information::where('id', 2)->first();

        $categoryLinks = Category::where('parent_id', 0)
                    ->orderBy('sort_order', 'asc')
                    ->get();

        $informationLinks = Information::where('status', 'Enabled')
                    ->orderBy('sort_order', 'asc')
                    ->get();

        $contactUsLink = ContactUs::where('id', 1)->first();

        $pageConfigs = [
            'pageClass' => 'ecommerce-application',
        ];

        $breadcrumbs = [
            ['link' => '/', 'name' => __('cart.home')],
            ['name' => __('cart.cart and payment')]
        ];

        return view('guest.carts.index', compact('deliveryAndReturns', 'categoryLinks', 'informationLinks', 'contactUsLink', 'pageConfigs', 'breadcrumbs'));
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
    public function addToCart(Request $request)
    {
        $product = Product::where('id', $request->id)->first();
        $now  = Carbon::now()->format('Y-m-d');

        if ($product->parent_id !=  0) {
            $item['name']['en'] = $product->parent->locale('en')->name.' ('.$product->locale('en')->name.')';
            $item['name']['th'] = $product->parent->locale('th')->name.' ('.$product->locale('th')->name.')';

            $item['slug']['en'] = $product->parent->locale('en')->slug;
            $item['slug']['th'] = $product->parent->locale('th')->slug;

            $item['price'] = $product->price;

            if ($product->parent->start_date <= $now && $product->parent->end_date >= $now) {
                $item['percentage'] = $product->parent->percentage;
            } else {
                $item['percentage'] = 0;
            }

            foreach ($product->parent->productImages as $key => $productImage) {
                if ($key == 0) {
                    $item['path'] = $productImage->path;
                }
            }
        } else {
            $item['name']['en'] = $product->locale('en')->name;
            $item['name']['th'] = $product->locale('th')->name;

            $item['slug']['en'] = $product->locale('en')->slug;
            $item['slug']['th'] = $product->locale('th')->slug;

            $item['price'] = $product->price;

            if ($product->start_date <= $now && $product->end_date >= $now) {
                $item['percentage'] = $product->percentage;
            } else {
                $item['percentage'] = 0;
            }

            foreach ($product->productImages as $key => $productImage) {
                if ($key == 0) {
                    $item['path'] = $productImage->path;
                }
            }
        }

        $cart = session()->get('cart');

        if (!$cart || !isset($cart[$request->id])) {
            $item['quantity'] = $request->quantity;

            $price = $item['quantity'] * $item['price'];
            $discount = $price * $item['percentage'] / 100;
            $item['total'] = $price - $discount;

            $cart[$product->id] = $item;

            session()->put('cart', $cart);
        } else {
            $quantity = $cart[$request->id]['quantity'] + $request->quantity;
            $cart[$request->id]['quantity'] = $quantity;

            $price = $quantity * $cart[$request->id]['price'];
            $discount = $price * $cart[$request->id]['percentage'] / 100;
            $cart[$request->id]['total'] = $price - $discount;

            session()->put('cart', $cart);
        }

        return response()->json(['status' => 'success','count' => count(session()->get('cart'))]);
    }

    public function updateToCart(Request $request)
    {
        $cart = session()->get('cart');
        $product = Product::where('id', $request->key)->first();

        if ($request->quantity == 0) {
            unset($cart[$request->key]);

            session()->put('cart', $cart);

            return response()->json(['status' => 'remove success', 'count' => count(session()->get('cart'))]);
        } elseif ($request->quantity > $product->quantity && $product->quantity == 0) {
            unset($cart[$request->key]);

            session()->put('cart', $cart);

            return response()->json(['status' => 'out of stock', 'count' => count(session()->get('cart'))]);
        } elseif ($request->quantity > $product->quantity && $product->quantity != 0) {
            $quantity = $product->quantity;
            $cart[$request->key]['quantity'] = $quantity;

            $price = $quantity * $cart[$request->key]['price'];
            $discount = $price * $cart[$request->key]['percentage'] / 100;
            $cart[$request->key]['total'] = $price - $discount;

            session()->put('cart', $cart);

            return response()->json(['status' => 'not enough', 'quantity' => $cart[$request->key]['quantity'], 'total' => number_format($cart[$request->key]['total'])]);
        } else {
            $cart[$request->key]['quantity'] = $request->quantity;

            $price = $request->quantity * $cart[$request->key]['price'];
            $discount = $price * $cart[$request->key]['percentage'] / 100;
            $cart[$request->key]['total'] = $price - $discount;

            session()->put('cart', $cart);

            return response()->json(['status' => 'success', 'total' => number_format($cart[$request->key]['total'])]);
        }
    }

    public function removeToCart(Request $request)
    {
        $cart = session()->get('cart');

        unset($cart[$request->key]);

        session()->put('cart', $cart);

        return response()->json(['status' => 'success', 'count' => count(session()->get('cart'))]);
    }

    public function applyCoupon(Request $request)
    {
        $coupon = Coupon::where('code', $request->code)
                ->where('status', 'Enabled')
                ->first();

        $now = Carbon::now()->format('Y-m-d');

        if (!$coupon) {
            return response()->json(['status' => 'can not code']);
        } elseif ($coupon->stat_date < $now && $coupon->end_date < $now) {
            return response()->json(['status' => 'expired']);
        } elseif ($coupon->start_date > $now && $coupon->end_date > $now) {
            return response()->json(['status' => 'period']);
        } elseif ($coupon->amount <= 0) {
            return response()->json(['status' => 'full']);
        } else {
            $summary = session()->get('summary');
            $summary['coupon']['code'] = $request->code;
            $summary['coupon']['percentage'] = $coupon->percentage;

            session()->put('summary', $summary);

            return response()->json(['status' => 'success']);
        }
    }

    public function summary()
    {
        $cart = session()->get('cart');
        $summary = session()->get('summary');

        $total = 0;
        foreach ($cart as $key => $item) {
            $total = $total + $item['total'];
        }

        if (!$summary) {
            $summary['total'] = $total;
            $summary['coupon']['code'] = '';
            $summary['coupon']['percentage'] = 0;
            $summary['grandTotal'] = $total;
        } else {
            if ($summary['coupon']['code'] != '') {
                $coupon = Coupon::where('code', $summary['coupon']['code'])
                        ->where('status', 'Enabled')
                        ->first();

                $now = Carbon::now()->format('Y-m-d');

                if (!$coupon) {
                    $summary['total'] = $total;
                    $summary['coupon']['code'] = '';
                    $summary['coupon']['percentage'] = 0;
                    $summary['grandTotal'] = $total;
                } elseif ($coupon->start_date < $now && $coupon->end_date < $now) {
                    $summary['total'] = $total;
                    $summary['coupon']['code'] = '';
                    $summary['coupon']['percentage'] = 0;
                    $summary['grandTotal'] = $total;
                } elseif ($coupon->start_date > $now && $coupon->end_date > $now) {
                    $summary['total'] = $total;
                    $summary['coupon']['code'] = '';
                    $summary['coupon']['percentage'] = 0;
                    $summary['grandTotal'] = $total;
                } elseif ($coupon->amount <= 0) {
                    $summary['total'] = $total;
                    $summary['coupon']['code'] = '';
                    $summary['coupon']['percentage'] = 0;
                    $summary['grandTotal'] = $total;
                } else {
                    $summary['total'] = $total;
                    $discount = $summary['total'] * $summary['coupon']['percentage'] / 100;
                    $summary['grandTotal'] = $summary['total'] - $discount;
                }
            } else {
                $summary['total'] = $total;
                $summary['coupon']['code'] = '';
                $summary['coupon']['percentage'] = 0;
                $summary['grandTotal'] = $total;
            }
        }

        session()->put('summary', $summary);
        $summary = session()->get('summary');

        return response()->json(['status' => 'success', 'total' => number_format($summary['total']), 'discount' => number_format($summary['total'] * $summary['coupon']['percentage'] / 100), 'grandTotal' => number_format($summary['grandTotal'])]);
    }

    public function shipping($id)
    {
        $addressBook = AddressBook::where('id', $id)->first();

        return response()->json(['addressBook' => $addressBook]);
    }

    public function billing($id)
    {
        $addressBook = AddressBook::where('id', $id)->first();

        return response()->json(['addressBook' => $addressBook]);
    }

    public function address(Request $request)
    {
        $validator = Validator::make($request->all(), [
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
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error','errors' => $validator->errors()]);
        } else {
            $address['shipping']['full_name'] = $request->shipping_full_name;
            $address['shipping']['address_1'] = $request->shipping_address_1;
            $address['shipping']['address_2'] = $request->shipping_address_2;
            $address['shipping']['sub_district'] = $request->shipping_sub_district;
            $address['shipping']['district'] = $request->shipping_district;
            $address['shipping']['province'] = $request->shipping_province;
            $address['shipping']['postal_code'] = $request->shipping_postal_code;
            $address['shipping']['country'] = $request->shipping_country;
            $address['shipping']['telephone'] = $request->shipping_telephone;

            $address['billing']['full_name'] = $request->billing_full_name;
            $address['billing']['address_1'] = $request->billing_address_1;
            $address['billing']['address_2'] = $request->billing_address_2;
            $address['billing']['sub_district'] = $request->billing_sub_district;
            $address['billing']['district'] = $request->billing_district;
            $address['billing']['province'] = $request->billing_province;
            $address['billing']['postal_code'] = $request->billing_postal_code;
            $address['billing']['country'] = $request->billing_country;
            $address['billing']['telephone'] = $request->billing_telephone;

            $address['email'] = $request->email;

            session()->put('address', $address);

            return response()->json(['status' => 'success']);
        }
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
