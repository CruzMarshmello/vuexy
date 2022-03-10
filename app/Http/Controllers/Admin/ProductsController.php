<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Image;
use Illuminate\Support\Facades\Storage;

use App\Models\Category;
use App\Models\Filter;
use App\Models\ProductImage;
use App\Models\Product;
use App\Models\ProductLocale;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::join('product_locales', 'product_locales.product_id', '=', 'products.id')
                    ->where('product_locales.locale', 'en')
                    ->where('product_locales.name', 'like', '%'.$request->search_name.'%')
                    ->where('products.parent_id', 0)
                    ->orderBy('products.id', 'desc')
                    ->select('products.*')
                    ->paginate(15);

        $request->flash();

        $breadcrumbs = [
          ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
          ['name' => 'Products']
        ];

        return view('admin.products.index', compact('products', 'breadcrumbs'));
    }

    public function dropzone(request $request)
    {
        $files = $request->file('file');
        if ($files) {
            foreach ($files as $key => $file) {
                $productImage = new ProductImage();
                $productImage->save();

                $rename = $productImage->id.'-'.Str::random(8).'.jpg';
                $destination = '/products/'.$rename;

                $image = Image::make($file)->fit(1200);
                Storage::disk('public')->put($destination, $image->stream('jpg', 100));

                $productImage->path = Storage::url($destination);
                $productImage->save();

                $ids[] = $productImage->id;
                $paths[] = $productImage->path;
            }

            return response()->json(['ids' => $ids, 'paths' => $paths]);
        }
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
          ['link' => 'admin/products', 'name' => 'Products'],
          ['name' => 'Create']
        ];

        $categories = Category::where('parent_id', 0)
                    ->orderBy('sort_order', 'asc')
                    ->get();

        $filters = Filter::where('parent_id', 0)
                ->orderBy('sort_order', 'asc')
                ->get();

        return view('admin.products.create', compact('categories', 'filters', 'breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->options) {
            if ($request->daterange || $request->percentage) {
                $request->validate([
                    'english_name' => 'required|different:thai_name',
                    'english_slug' => 'required|alpha_dash|different:thai_slug|unique:product_locales,slug',
                    'english_meta_title' => 'required',
                    'thai_name' => 'required|different:english_name',
                    'thai_slug' => 'required|alpha_dash|different:english_slug|unique:product_locales,slug',
                    'thai_meta_title' => 'required',
                    'options.*.english_name' => 'required',
                    'options.*.thai_name' => 'required',
                    'options.*.quantity' => 'required|numeric|min:0',
                    'options.*.price' => 'required|numeric|min:0',
                    'daterange' => 'required',
                    'percentage' => 'required|numeric|min:0'
                ]);
            } else {
                $request->validate([
                    'english_name' => 'required|different:thai_name',
                    'english_slug' => 'required|alpha_dash|different:thai_slug|unique:product_locales,slug',
                    'english_meta_title' => 'required',
                    'thai_name' => 'required|different:english_name',
                    'thai_slug' => 'required|alpha_dash|different:english_slug|unique:product_locales,slug',
                    'thai_meta_title' => 'required',
                    'options.*.english_name' => 'required',
                    'options.*.thai_name' => 'required',
                    'options.*.quantity' => 'required|numeric|min:0',
                    'options.*.price' => 'required|numeric|min:0'
                ]);
            }
        } else {
            if ($request->daterange || $request->percentage) {
                $request->validate([
                    'english_name' => 'required|different:thai_name',
                    'english_slug' => 'required|alpha_dash|different:thai_slug|unique:product_locales,slug',
                    'english_meta_title' => 'required',
                    'thai_name' => 'required|different:english_name',
                    'thai_slug' => 'required|alpha_dash|different:english_slug|unique:product_locales,slug',
                    'thai_meta_title' => 'required',
                    'quantity' => 'required|numeric|min:0',
                    'price' => 'required|numeric|min:0',
                    'daterange' => 'required',
                    'percentage' => 'required|numeric|min:0'
                ]);
            } else {
                $request->validate([
                    'english_name' => 'required|different:thai_name',
                    'english_slug' => 'required|alpha_dash|different:thai_slug|unique:product_locales,slug',
                    'english_meta_title' => 'required',
                    'thai_name' => 'required|different:english_name',
                    'thai_slug' => 'required|alpha_dash|different:english_slug|unique:product_locales,slug',
                    'thai_meta_title' => 'required',
                    'quantity' => 'required|numeric|min:0',
                    'price' => 'required|numeric|min:0'
                ]);
            }
        }

        $product = new Product();
        $product->sku = $request->sku;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->status = $request->status;
        $product->parent_id = 0;

        if ($request->daterange) {
            $daterange = explode(' to ', $request->daterange);

            if (count($daterange) > 1) {
                $product->start_date = $daterange[0];
                $product->end_date = $daterange[1];
            } else {
                $product->start_date = $daterange[0];
                $product->end_date = $daterange[0];
            }

            $product->percentage = $request->percentage;
        }

        $product->save();

        $productLocale = new ProductLocale();
        $productLocale->locale = 'en';
        $productLocale->name = $request->english_name;
        $productLocale->slug = $request->english_slug;
        $productLocale->description = $request->english_description;
        $productLocale->meta_title = $request->english_meta_title;
        $productLocale->meta_keyword = $request->english_meta_keyword;
        $productLocale->meta_description = $request->english_meta_description;
        $productLocale->product_id = $product->id;
        $productLocale->save();

        $productLocale = new ProductLocale();
        $productLocale->locale = 'th';
        $productLocale->name = $request->thai_name;
        $productLocale->slug = $request->thai_slug;
        $productLocale->description = $request->thai_description;
        $productLocale->meta_title = $request->thai_meta_title;
        $productLocale->meta_keyword = $request->thai_meta_keyword;
        $productLocale->meta_description = $request->thai_meta_description;
        $productLocale->product_id = $product->id;
        $productLocale->save();

        if ($request->options) {
            foreach ($request->options as $key => $array) {
                $option = new Product();
                $option->sku = $array['sku'];
                $option->quantity = $array['quantity'];
                $option->price = $array['price'];
                $option->parent_id = $product->id;
                $option->save();

                $optionLocale = new ProductLocale();
                $optionLocale->locale = 'en';
                $optionLocale->name = $array['english_name'];
                $optionLocale->product_id = $option->id;
                $optionLocale->save();

                $optionLocale = new ProductLocale();
                $optionLocale->locale = 'th';
                $optionLocale->name = $array['thai_name'];
                $optionLocale->product_id = $option->id;
                $optionLocale->save();
            }
        }

        if ($request->categories) {
            $product->categories()->sync($request->categories);
        }

        if ($request->filters) {
            $product->filters()->sync($request->filters);
        }

        if ($request->paths) {
            foreach ($request->paths as $key => $path) {
                $productImage = ProductImage::where('path', $path)->first();
                $productImage->product_id = $product->id;
                $productImage->save();
            }
        }

        return redirect()->back()->with('success', 'Product has been add successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id', $id)->first();

        if (!$product) {
            abort(404);
        }

        $categories = Category::where('parent_id', 0)->get();
        $filters = Filter::where('parent_id', 0)->get();

        $breadcrumbs = [
          ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
          ['link' => 'admin/products', 'name' => 'Products'],
          ['name' => 'Show']
        ];

        return view('admin.products.show', compact('product', 'categories', 'filters', 'breadcrumbs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id', $id)->first();

        if (!$product) {
            abort(404);
        }

        $categories = Category::where('parent_id', 0)->get();
        $filters = Filter::where('parent_id', 0)->get();

        $breadcrumbs = [
          ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
          ['link' => 'admin/products', 'name' => 'Products'],
          ['name' => 'Edit']
        ];

        return view('admin.products.edit', compact('product', 'categories', 'filters', 'breadcrumbs'));
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
        $product = Product::where('id', $id)->first();

        if (!$product) {
            abort(404);
        }

        $englishId = $product->locale('en')->id;
        $thaiId = $product->locale('th')->id;

        if ($request->options && is_array($request->options)) {
            if ($request->daterange || $request->percentage) {
                $request->validate([
                    'english_name' => 'required|different:thai_name',
                    'english_slug' => 'required|alpha_dash|different:thai_slug|unique:product_locales,slug,'.$englishId,
                    'english_meta_title' => 'required',
                    'thai_name' => 'required|different:english_name',
                    'thai_slug' => 'required|alpha_dash|different:english_slug|unique:product_locales,slug,'.$thaiId,
                    'thai_meta_title' => 'required',
                    'options.*.english_name' => 'required',
                    'options.*.thai_name' => 'required',
                    'options.*.quantity' => 'required|numeric|min:0',
                    'options.*.price' => 'required|numeric|min:0',
                    'daterange' => 'required',
                    'percentage' => 'required|numeric|min:0'
                ]);
            } else {
                $request->validate([
                    'english_name' => 'required|different:thai_name',
                    'english_slug' => 'required|alpha_dash|different:thai_slug|unique:product_locales,slug,'.$englishId,
                    'english_meta_title' => 'required',
                    'thai_name' => 'required|different:english_name',
                    'thai_slug' => 'required|alpha_dash|different:english_slug|unique:product_locales,slug,'.$thaiId,
                    'thai_meta_title' => 'required',
                    'options.*.english_name' => 'required',
                    'options.*.thai_name' => 'required',
                    'options.*.quantity' => 'required|numeric|min:0',
                    'options.*.price' => 'required|numeric|min:0'
                ]);
            }
        } else {
            if ($request->daterange || $request->percentage) {
                $request->validate([
                    'english_name' => 'required|different:thai_name',
                    'english_slug' => 'required|alpha_dash|different:thai_slug|unique:product_locales,slug,'.$englishId,
                    'english_meta_title' => 'required',
                    'thai_name' => 'required|different:english_name',
                    'thai_slug' => 'required|alpha_dash|different:english_slug|unique:product_locales,slug,'.$thaiId,
                    'thai_meta_title' => 'required',
                    'quantity' => 'required|numeric|min:0',
                    'price' => 'required|numeric|min:0',
                    'daterange' => 'required',
                    'percentage' => 'required|numeric|min:0'
                ]);
            } else {
                $request->validate([
                    'english_name' => 'required|different:thai_name',
                    'english_slug' => 'required|alpha_dash|different:thai_slug|unique:product_locales,slug,'.$englishId,
                    'english_meta_title' => 'required',
                    'thai_name' => 'required|different:english_name',
                    'thai_slug' => 'required|alpha_dash|different:english_slug|unique:product_locales,slug,'.$thaiId,
                    'thai_meta_title' => 'required',
                    'quantity' => 'required|numeric|min:0',
                    'price' => 'required|numeric|min:0'
                ]);
            }
        }

        $product->sku = $request->sku;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->status = $request->status;

        if ($request->daterange) {
            $daterange = explode(' to ', $request->daterange);

            if (count($daterange) > 1) {
                $product->start_date = $daterange[0];
                $product->end_date = $daterange[1];
            } else {
                $product->start_date = $daterange[0];
                $product->end_date = $daterange[0];
            }

            $product->percentage = $request->percentage;
        } else {
            $product->start_date = null;
            $product->end_date = null;
            $product->percentage = null;
        }

        $product->save();

        $productLocale = $product->locale('en');
        $productLocale->name = $request->english_name;
        $productLocale->slug = $request->english_slug;
        $productLocale->description = $request->english_description;
        $productLocale->meta_title = $request->english_meta_title;
        $productLocale->meta_keyword = $request->english_meta_keyword;
        $productLocale->meta_description = $request->english_meta_description;
        $productLocale->save();

        $productLocale = $product->locale('th');
        $productLocale->name = $request->thai_name;
        $productLocale->slug = $request->thai_slug;
        $productLocale->description = $request->thai_description;
        $productLocale->meta_title = $request->thai_meta_title;
        $productLocale->meta_keyword = $request->thai_meta_keyword;
        $productLocale->meta_description = $request->thai_meta_description;
        $productLocale->save();

        $id = [];
        if ($request->options && is_array($request->options)) {
            foreach ($request->options as $key => $array) {
                if ($array['id']) {
                    $option = Product::where('id', $array['id'])->first();
                    $option->sku = $array['sku'];
                    $option->quantity = $array['quantity'];
                    $option->price = $array['price'];
                    $option->save();

                    $optionLocale = $option->locale('en');
                    $optionLocale->name = $array['english_name'];
                    $optionLocale->save();

                    $optionLocale = $option->locale('th');
                    $optionLocale->name = $array['thai_name'];
                    $optionLocale->save();
                } else {
                    $option = new Product();
                    $option->sku = $array['sku'];
                    $option->quantity = $array['quantity'];
                    $option->price = $array['price'];
                    $option->parent_id = $product->id;
                    $option->save();

                    $optionLocale = new ProductLocale();
                    $optionLocale->locale = 'en';
                    $optionLocale->name = $array['english_name'];
                    $optionLocale->product_id = $option->id;
                    $optionLocale->save();

                    $optionLocale = new ProductLocale();
                    $optionLocale->locale = 'th';
                    $optionLocale->name = $array['thai_name'];
                    $optionLocale->product_id = $option->id;
                    $optionLocale->save();
                }

                $id[] = $option->id;
            }

            $options = Product::whereNotIn('id', $id)
                    ->where('parent_id', $product->id)
                    ->get();

            foreach ($options as $key => $option) {
                foreach ($option->productLocales as $key => $optionLocale) {
                    $optionLocale->delete();
                }

                $option->delete();
            }
        } else {
            foreach ($product->children as $key => $option) {
                foreach ($option->productLocales as $key => $productLocale) {
                    $productLocale->delete();
                }

                $option->delete();
            }
        }

        if ($request->categories) {
            $product->categories()->sync($request->categories);
        } else {
            $product->categories()->detach();
        }

        if ($request->filters) {
            $product->filters()->sync($request->filters);
        } else {
            $product->filters()->detach();
        }

        // dd($request->paths);

        if (is_array($request->paths)) {
            $id = [];
            foreach ($request->paths as $key => $path) {
                $productImage = ProductImage::where('path', $path)->first();
                $productImage->product_id = $product->id;
                $productImage->save();

                array_push($id, $productImage->id);
            }

            $productImages = ProductImage::whereNotIn('id', $id)
                            ->where('product_id', $product->id)
                            ->get();

            foreach ($productImages as $key => $productImage) {
                Storage::disk('public')->delete(Str::replace('/storage/', '', $productImage->path));

                $productImage->delete();
            }
        } else {
            foreach ($product->productImages as $key => $productImage) {
                Storage::disk('public')->delete(Str::replace('/storage/', '', $productImage->path));

                $productImage->delete();
            }
        }

        return redirect()->back()->with('success', 'Product has been update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id', $id)->first();

        if (!$product) {
            abort(404);
        }

        foreach ($product->children as $key => $option) {
            foreach ($option->productLocales as $key => $optionLocale) {
                $optionLocale->delete();
            }

            $option->delete();
        }

        foreach ($product->productLocales as $key => $productLocale) {
            $productLocale->delete();
        }

        $product->categories()->detach();
        $product->filters()->detach();

        foreach ($product->productImages as $key => $productImage) {
            Storage::disk('public')->delete(Str::replace('/storage/', '', $productImage->path));

            $productImage->delete();
        }

        $product->delete();

        return redirect()->back()->with('success', 'Product has been delete successfully.');
    }
}
