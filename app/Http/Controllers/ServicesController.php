<?php

namespace App\Http\Controllers;

use App\Models\Analysis;
use App\Models\Page;
use App\Models\Research;
use App\Models\Service;
use App\Models\ServiceType;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function getServiceTypePage($typeSlug = 'all')
    {
        $locale = session()->get('locale');
        $fallbackLocale = config('voyager.multilingual.default');
        $page = Page::with(['translations'])
            ->select('type', 'id', 'title', 'excerpt', 'body', 'image', 'slug', 'seo_title', 'meta_description', 'meta_keywords', 'status')
            ->where(['type' => 'services', 'status' => Page::STATUS_ACTIVE])
            ->firstOrFail();
        $page = $page->translate($locale, $fallbackLocale);
        if ($typeSlug === 'all') {
            $serviceType = null;
            $services = Service::with('translations')->where('status', true)->where('is_top',true)->orderBy('sort_id')->get();
        } else {
            $serviceType = ServiceType::with(['translations', 'services.translations'])->where('slug', $typeSlug)->where('status', true)->orderBy('sort_id')->firstOrFail();
            $services = $serviceType->services;
        }
        $serviceTypes = ServiceType::with('translations')->where('status', true)->orderBy('sort_id')->get();
        $serviceTypes = $serviceTypes->translate($locale, $fallbackLocale);
        $searchTerm = null;
        if (\request()->has('search')) {
            $searchTerm = \request()->get('search');
            $services = Service::with('translations')->where('status', true)->where('title', 'like', '%' . $searchTerm . '%')
                ->orWhere(function ($q) use ($searchTerm) {
                    $q->whereTranslation('title', 'like', '%' . $searchTerm . '%');
                })->orderBy('sort_id')->get();
        }

        $services = $services->translate($locale, $fallbackLocale);
        return view('pages.services', compact('page', 'serviceTypes', 'serviceType', 'services','searchTerm'));
    }
}
