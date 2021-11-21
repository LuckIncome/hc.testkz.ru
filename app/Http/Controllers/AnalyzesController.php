<?php

namespace App\Http\Controllers;

use App\Models\Analysis;
use App\Models\Doctor;
use App\Models\Page;
use App\Models\Research;
use App\Models\Speciality;
use Illuminate\Http\Request;

class AnalyzesController extends Controller
{
    public function index()
    {
        $locale = session()->get('locale');
        $fallbackLocale = config('voyager.multilingual.default');
        $page = Page::with(['translations'])
            ->select('type', 'id', 'title', 'excerpt', 'body', 'image', 'slug', 'seo_title', 'meta_description', 'meta_keywords', 'status')
            ->where(['type' => 'analyzes', 'status' => Page::STATUS_ACTIVE])
            ->firstOrFail();
        $page = $page->translate($locale, $fallbackLocale);

        $searchTerm = null;
        $researches = Research::with('translations')->where('status', true);
        if (\request()->has('search')) {
            $searchTerm = \request()->get('search');
            $researches = $researches->where('title', 'like', '%' . $searchTerm . '%')
                ->orWhere(function($q) use ($searchTerm){
                    $q->whereTranslation('title', 'like', '%' . $searchTerm . '%');
                })
                ->orWhere('slug','LIKE', '%'.$searchTerm.'%')
                ->orWhereHas('analyzes', function ($q) use ($searchTerm){
                    $q->where('title','like','%'.$searchTerm.'%')
                        ->orWhere(function($q) use ($searchTerm){
                            $q->whereTranslation('title', 'like', '%' . $searchTerm . '%');
                        });
                });
        }
        $researches = $researches->orderBy('sort_id')->get();
        $researches = $researches->translate($locale, $fallbackLocale);

        return view('analisis.researches', compact('page', 'researches', 'searchTerm'));
    }

    public function getResearchPage($researchSlug)
    {
        $locale = session()->get('locale');
        $fallbackLocale = config('voyager.multilingual.default');
        $page = Page::with(['translations'])
            ->select('type', 'id', 'title', 'excerpt', 'body', 'image', 'slug', 'seo_title', 'meta_description', 'meta_keywords', 'status')
            ->where(['type' => 'analyzes', 'status' => Page::STATUS_ACTIVE])
            ->firstOrFail();
        $page = $page->translate($locale, $fallbackLocale);
        if ($researchSlug === 'top') {
            $research = null;
            $analyzes = Analysis::with('translations')->where('featured', true)->where('status', true)->orderBy('sort_id')->get();
        } else {
            $research = Research::with(['translations', 'analyzes.translations'])->where('slug', $researchSlug)->where('status', true)->orderBy('sort_id')->firstOrFail();
            $analyzes = $research->analyzes;
        }
        $researches = Research::with('translations')->where('status', true)->orderBy('sort_id')->get();
        $researches = $researches->translate($locale, $fallbackLocale);
        $searchTerm = null;
        if (\request()->has('search')) {
            $searchTerm = \request()->get('search');
            $analyzes = Analysis::with('translations')->where('status', true)->where('title', 'like', '%' . $searchTerm . '%')
                ->orWhere(function ($q) use ($searchTerm) {
                    $q->whereTranslation('title', 'like', '%' . $searchTerm . '%');
                })->orderBy('sort_id')->get();
        }

        $analyzes = $analyzes->translate($locale, $fallbackLocale);
        return view('analisis.analisis', compact('page', 'researches', 'research', 'analyzes','searchTerm'));
    }
}
