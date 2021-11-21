<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Sale;
use Illuminate\Http\Request;

class SalesController extends Controller
{

    public function index()
    {
        return $this->getSaleByType();
    }

    public function getSaleByType($month = false)
    {
        $daySale = Sale::where('status', true)->where('type', 'day');
        $daySaleExistance = $daySale->exists();
        $locale = session()->get('locale');
        $fallbackLocale = config('voyager.multilingual.default');

        $page = Page::with(['translations'])
            ->select('type', 'id', 'title', 'excerpt', 'body', 'image', 'slug', 'seo_title', 'meta_description', 'meta_keywords', 'status')
            ->where(['type' => 'sales', 'status' => Page::STATUS_ACTIVE])
            ->firstOrFail();

        $page = $page->translate($locale, $fallbackLocale);

        $type = $daySaleExistance && !$month ? 'day' : 'month';
        $sales = Sale::with('translations')
            ->where('status', true)
            ->where('type', $type)
            ->when($type === 'month', function ($query) {
                return $query->where('type', 'month')->orWhere('type', 'day');
            })
            ->orderBy('sort_id')
            ->get()
            ->translate($locale, $fallbackLocale);

        return view('sales.' . $type, compact('sales', 'type', 'page', 'daySaleExistance'));
    }

    public function getSaleMonth()
    {
        return $this->getSaleByType(true);
    }

    public function show(Sale $sale)
    {
        $daySale = Sale::where('status', true)->where('type', 'day');
        $daySaleExistance = $daySale->exists();

        $locale = session()->get('locale');
        $fallbackLocale = config('voyager.multilingual.default');

        $page = Page::with(['translations'])
            ->select('type', 'id', 'title', 'excerpt', 'body', 'image', 'slug', 'seo_title', 'meta_description', 'meta_keywords', 'status')
            ->where(['type' => 'sales', 'status' => Page::STATUS_ACTIVE])
            ->firstOrFail();

        $page = $page->translate($locale, $fallbackLocale);
        $sale = $sale->translate($locale, $fallbackLocale);
        return view('sales.show', compact('sale', 'page', 'daySaleExistance'));
    }
}
