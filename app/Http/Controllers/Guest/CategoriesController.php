<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Carbon\Carbon;

use App\Models\Category;
use App\Models\Product;
use App\Models\Filter;

use App\Models\Information;
use App\Models\ContactUs;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function show($slug)
    {
        $category = Category::join('category_locales', 'category_locales.category_id', '=', 'categories.id')
                    ->where('category_locales.slug', $slug)
                    ->select('categories.*')
                    ->first();

        if (!$category) {
            abort(404);
        }

        $categoryLinks = Category::where('parent_id', 0)
                    ->orderBy('sort_order', 'asc')
                    ->get();

        $informationLinks = Information::where('status', 'Enabled')
                    ->orderBy('sort_order', 'asc')
                    ->get();

        $contactUsLink = ContactUs::where('id', 1)->first();

        if (count($category->children) > 0 || count($category->filters) > 0) {
            $pageConfigs = [
              'contentLayout' => "content-detached-left-sidebar",
              'pageClass' => 'ecommerce-application',
            ];
        } else {
            $pageConfigs = [
              'pageClass' => 'ecommerce-application',
            ];
        }

        $breadcrumbs = [
            ['link' => '/', 'name' => __('category.home')],
            ['name' => $category->locale(session()->get('locale'))->name]
        ];

        return view('guest.categories.show', compact('category', 'categoryLinks', 'informationLinks', 'contactUsLink', 'pageConfigs', 'breadcrumbs'));
    }

    public function loadMore(Request $request, $slug)
    {
        if (!$request->options) {
            $products = Product::rightJoin('product_images', 'product_images.product_id', '=', 'products.id')
                        ->join('category_product', 'category_product.product_id', '=', 'products.id')
                        ->join('categories', 'categories.id', '=', 'category_product.category_id')
                        ->join('category_locales', 'category_locales.category_id', '=', 'categories.id')
                        ->where('category_locales.slug', $slug)
                        ->where('products.status', 'Enabled')
                        ->orderBy('products.id', 'desc')
                        ->groupBy('products.id')
                        ->select('products.*')
                        ->paginate(15);
        } else {
            $options = explode(',', $request->options);

            foreach ($options as $key => $option) {
                $filter = Filter::where('id', $option)->first();

                if ($filter) {
                    $array[$filter->parent_id][] = $filter->id;
                }
            }

            $index = 0;
            foreach ($array as $key => $option) {
                $filterProducts[$index] = Product::rightJoin('product_images', 'product_images.product_id', '=', 'products.id')
                                ->join('category_product', 'category_product.product_id', '=', 'products.id')
                                ->join('categories', 'categories.id', '=', 'category_product.category_id')
                                ->join('category_locales', 'category_locales.category_id', '=', 'categories.id')
                                ->where('category_locales.slug', $slug)
                                ->join('filter_product', 'filter_product.product_id', '=', 'products.id')
                                ->whereIn('filter_product.filter_id', $option)
                                ->where('products.status', 'Enabled')
                                ->orderBy('products.id', 'desc')
                                ->groupBy('products.id')
                                ->pluck('products.id')
                                ->toArray();
                $index++;
            }

            foreach ($filterProducts as $key => $filterProduct) {
                if ($key > 0) {
                    $filterProducts[0] = array_intersect($filterProducts[0], $filterProduct);
                }
            }

            $products = Product::whereIn('id', $filterProducts[0])
                        ->orderBy('id', 'desc')
                        ->paginate(15);
        }

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
                $sale = '<div class="badge badge-danger">'.__('category.sale').'</div> <del class="text-muted">'.__('category.en bath').' '.number_format($price).' '.__('category.th bath').'</del>';
                $total = '<p class="text-danger">'.__('category.en bath').' '.number_format($price - ($price * $product->percentage / 100)).' '.__('category.th bath').'</p>';
            } else {
                $sale = '';
                $total = __('category.en bath').' '.number_format($price).' '.__('category.th bath');
            }

            $output .= '<div class="card ecommerce-card">
                        <div class="item-img text-center">
                        <a href="'.route('guest.products.show', ['slug' => $product->locale(session()->get('locale'))->slug]).'">
                        <img class="img-fluid card-img-top" src="'.$image.'" alt="'.$product->locale(session()->get('locale'))->name.'" />
                        </a>
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
                        <span class="add-to-cart">'.__('category.details').'</span>
                        </a>
                        </div>
                        </div>';
        }

        $loadMore = '';
        if (count($products) > 0) {
            if ($products->currentPage() < $products->lastPage()) {
                $page = $products->currentPage()+1;

                $loadMore = '<blockquote class="blockquote text-center">
                            <button type="button" class="btn btn-lg btn-icon btn-icon rounded-circle btn-primary" data-page="'.$page.'">
                            <i data-feather="chevrons-down"></i>
                            </button>
                            </blockquote>';
            }
        } else {
            $loadMore = '<blockquote class="blockquote text-center">
                        <p class="mb-0">'.__('category.not find').'</p>
                        <footer class="blockquote-footer"><cite title="Source Title">'.env('APP_URL').'</cite></footer>
                        </blockquote>';
        }

        return response()->json(['products' => $products,'output' => $output,'loadMore' => $loadMore]);
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
