<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Filter;
use App\Models\FilterLocale;

class FiltersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filters = Filter::join('filter_locales', 'filter_locales.filter_id', '=', 'filters.id')
                ->where('filter_locales.locale', 'en')
                ->where('filter_locales.name', 'like', '%'.$request->search_name.'%')
                ->where('filters.parent_id', 0)
                ->orderBy('filters.sort_order', 'asc')
                ->select('filters.*')
                ->paginate(15);

        $request->flash();

        $breadcrumbs = [
          ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
          ['name' => 'Filters']
        ];

        return view('admin.filters.index', compact('filters', 'breadcrumbs'));
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
          ['link' => 'admin/filters', 'name' => 'Filters'],
          ['name' => 'Create']
        ];

        return view('admin.filters.create', compact('breadcrumbs'));
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
            'english_name' => 'required|different:thai_name',
            'thai_name' => 'required|different:english_name',
            'sort_order' => 'required|numeric|min:0',
            'options' => 'required',
            'options.*.english_name' => 'required',
            'options.*.thai_name' => 'required',
            'options.*.sort_order' => 'required|numeric|min:0'
        ]);

        $filter = new Filter();
        $filter->sort_order = $request->sort_order;
        $filter->parent_id = 0;
        $filter->save();

        $filterLocale = new FilterLocale();
        $filterLocale->locale = 'en';
        $filterLocale->name = $request->english_name;
        $filterLocale->filter_id = $filter->id;
        $filterLocale->save();

        $filterLocale = new FilterLocale();
        $filterLocale->locale = 'th';
        $filterLocale->name = $request->thai_name;
        $filterLocale->filter_id = $filter->id;
        $filterLocale->save();

        foreach ($request->options as $key => $array) {
            $option = new Filter();
            $option->sort_order = $array['sort_order'];
            $option->parent_id = $filter->id;
            $option->save();

            $optionLocale = new FilterLocale();
            $optionLocale->locale = 'en';
            $optionLocale->name = $array['english_name'];
            $optionLocale->filter_id = $option->id;
            $optionLocale->save();

            $optionLocale = new FilterLocale();
            $optionLocale->locale = 'th';
            $optionLocale->name = $array['thai_name'];
            $optionLocale->filter_id = $option->id;
            $optionLocale->save();
        }

        return redirect()->back()->with('success', 'Filter has been add successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $filter = Filter::where('id', $id)
                ->where('parent_id', 0)->first();

        if (!$filter) {
            abort(404);
        }

        $breadcrumbs = [
          ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
          ['link' => 'admin/filters', 'name' => 'Filters'],
          ['name' => 'Show']
        ];

        return view('admin.filters.show', compact('filter', 'breadcrumbs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $filter = Filter::where('id', $id)
                ->where('parent_id', 0)->first();

        if (!$filter) {
            abort(404);
        }

        $breadcrumbs = [
          ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
          ['link' => 'admin/filters', 'name' => 'Filters'],
          ['name' => 'Edit']
        ];

        return view('admin.filters.edit', compact('filter', 'breadcrumbs'));
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
        // dd($request->all());
        $filter = Filter::where('id', $id)->first();

        if (!$filter) {
            abort(404);
        }

        $request->validate([
            'english_name' => 'required|different:thai_name',
            'thai_name' => 'required|different:english_name',
            'sort_order' => 'required|numeric|min:0',
            'options' => 'required',
            'options.*.english_name' => 'required',
            'options.*.thai_name' => 'required',
            'options.*.sort_order' => 'required|numeric|min:0'
        ]);

        $filter->sort_order = $request->sort_order;
        $filter->save();

        $filterLocale = $filter->locale('en');
        $filterLocale->name = $request->english_name;
        $filterLocale->save();

        $filterLocale = $filter->locale('th');
        $filterLocale->name = $request->thai_name;
        $filterLocale->save();

        $id = [];
        foreach ($request->options as $key => $array) {
            if ($array['id']) {
                $option = Filter::where('id', $array['id'])->first();
                $option->sort_order = $array['sort_order'];
                $option->save();

                $optionLocale = $option->locale('en');
                $optionLocale->name = $array['english_name'];
                $optionLocale->save();

                $optionLocale = $option->locale('th');
                $optionLocale->name = $array['thai_name'];
                $optionLocale->save();
            } else {
                $option = new Filter();
                $option->sort_order = $array['sort_order'];
                $option->parent_id = $filter->id;
                $option->save();

                $optionLocale = new FilterLocale();
                $optionLocale->locale = 'en';
                $optionLocale->name = $array['english_name'];
                $optionLocale->filter_id = $option->id;
                $optionLocale->save();

                $optionLocale = new FilterLocale();
                $optionLocale->locale = 'th';
                $optionLocale->name = $array['thai_name'];
                $optionLocale->filter_id = $option->id;
                $optionLocale->save();
            }

            $id[] = $option->id;
        }

        $options = Filter::whereNotIn('id', $id)
                ->where('parent_id', $filter->id)
                ->get();

        foreach ($options as $key => $option) {
            foreach ($option->filterLocales as $key => $filterLocale) {
                $filterLocale->delete();
            }

            $option->products()->detach();

            $option->delete();
        }

        return redirect()->back()->with('success', 'Filter has been update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $filter = Filter::where('id', $id)->first();

        if (!$filter) {
            abort(404);
        }

        foreach ($filter->children as $key => $option) {
            foreach ($option->filterLocales as $key => $filterLocale) {
                $filterLocale->delete();
            }

            $option->products()->detach();

            $option->delete();
        }

        foreach ($filter->filterLocales as $key => $filterLocale) {
            $filterLocale->delete();
        }

        $filter->categories()->detach();

        $filter->delete();

        return redirect()->back()->with('success', 'Filter has been delete successfully.');
    }
}
