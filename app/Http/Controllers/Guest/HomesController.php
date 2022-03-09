<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Carbon\Carbon;

use App\Models\Slideshow;
use App\Models\Product;

use App\Models\Category;
use App\Models\Information;
use App\Models\ContactUs;

class HomesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slideshows = Slideshow::where('status', 'Enabled')
                    ->orderBy('sort_order', 'asc')
                    ->get();

        $categoryLinks = Category::where('parent_id', 0)
                    ->orderBy('sort_order', 'asc')
                    ->get();

        $informationLinks = Information::where('status', 'Enabled')
                    ->orderBy('sort_order', 'asc')
                    ->get();

        $contactUsLink = ContactUs::where('id', 1)->first();

        $pageConfigs = [
          // 'contentLayout' => "content-detached-right-sidebar",
          'pageClass' => 'ecommerce-application',
          'pageHeader' => false
        ];

        return view('guest.homes.index', compact('slideshows', 'categoryLinks', 'informationLinks', 'contactUsLink', 'pageConfigs'));
    }

    public function loadMore(Request $request)
    {
        $products = Product::rightJoin('product_images', 'product_images.product_id', '=', 'products.id')
                    ->where('products.parent_id', 0)
                    ->where('products.status', 'Enabled')
                    ->orderBy('products.id', 'desc')
                    ->groupBy('products.id')
                    ->select('products.*')
                    ->paginate(15);

        $output = '';
        foreach ($products as $key => $product) {
            foreach ($product->productImages as $key => $productImage) {
                if ($key == 0) {
                    $image = $productImage->path;
                }
            }

            if (count($product->children) > 0) {
                foreach ($product->children as $key => $option) {
                    if ($key == 0) {
                        $price = $option->price;
                    }
                }
            } else {
                $price = $product->price;
            }

            $now = Carbon::now()->format('Y-m-d');
            if ($product->start_date <= $now && $product->end_date >= $now) {
                $sale = '<div class="badge badge-danger">'.__('home.sale').'</div> <del class="text-muted">'.__('home.en bath').' '.number_format($price).' '.__('home.th bath').'</del>';
                $total = '<p class="text-danger">'.__('home.en bath').' '.number_format($price - ($price * $product->percentage / 100)).' '.__('home.th bath').'</p>';
            } else {
                $sale = '';
                $total = __('home.en bath').' '.number_format($price).' '.__('home.th bath');
            }

            $output .= '<div class="card ecommerce-card">
                        <div class="item-img text-center">
                        <a href="">
                        <img class="img-fluid card-img-top" src="'.$image.'" alt="'.$product->locale(session()->get('locale'))->name.'" /></a>
                        </div>
                        <div class="card-body">
                        <div class="item-wrapper">
                        <div class="item-rating">'.$sale.'</div>
                        <div>
                        <h3 class="item-price">'.$total.'</h3>
                        </div>
                        </div>
                        <h6 class="item-name">
                        <a class="text-body" href="'.route('guest.products.show', ['slug' => $product->locale(session()->get('locale'))->slug]).'">'.$product->locale(session()->get('locale'))->name.'</a>
                        </h6>
                        <p class="card-text item-description">'.Str::limit($product->locale(session()->get('locale'))->description, 80).'</p>
                        </div>
                        <div class="item-options text-center">
                        <a href="'.route('guest.products.show', ['slug' => $product->locale(session()->get('locale'))->slug]).'" class="btn btn-primary btn-cart">
                        <i data-feather="eye"></i>
                        <span class="add-to-cart">'.__('home.details').'</span>
                        </a>
                        </div>
                        </div>';
        }

        return response()->json(['output' => $output]);
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
