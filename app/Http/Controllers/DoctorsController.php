<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Page;
use App\Models\Speciality;
use Illuminate\Http\Request;
use PhpParser\Comment\Doc;

class DoctorsController extends Controller
{
    public function index()
    {
        $locale = session()->get('locale');
        $fallbackLocale = config('voyager.multilingual.default');
        $page = Page::with(['translations'])
            ->select('type', 'id', 'title', 'excerpt', 'body', 'image', 'slug', 'seo_title', 'meta_description', 'meta_keywords', 'status')
            ->where(['type' => 'docs', 'status' => Page::STATUS_ACTIVE])
            ->firstOrFail();
        $page = $page->translate($locale, $fallbackLocale);
        $searchTerm = null;
        $doctors = Doctor::with('translations')->where('status',true);
        if (\request()->has('search')) {
            $searchTerm = \request()->get('search');
            $doctors = $doctors->where('name', 'like', '%' . $searchTerm . '%')
                ->orWhere('spec','LIKE', '%'.$searchTerm.'%')
                ->orWhere(function($q) use ($searchTerm){
                    $q->whereTranslation('spec', 'like', '%' . $searchTerm . '%');
                })->orWhere(function ($q) use ($searchTerm) {
                    $q->whereTranslation('name', 'like', '%' . $searchTerm . '%');
                })->orWhereHas('specialities', function ($q) use ($searchTerm){
                    $q->where('title','like','%'.$searchTerm.'%')
                        ->orWhere('slug','like','%'.$searchTerm.'%')
                        ->orWhere('alternate','like','%'.$searchTerm.'%')
                        ->orWhere(function($q) use ($searchTerm){
                            $q->whereTranslation('title', 'like', '%' . $searchTerm . '%');
                        })->orWhere(function($q) use ($searchTerm){
                            $q->whereTranslation('alternate', 'like', '%' . $searchTerm . '%');
                        });
                })
                ->orderByDesc('featured')
                ->orderBy('sort_id')->limit(5)->get();
        }else {
            $doctors = $doctors->orderByDesc('featured')
                ->orderBy('sort_id')->limit(5)->get();
        }

        $doctors = $doctors->translate($locale,$fallbackLocale);

        $specialities = Speciality::with('translations')->where('status',true);
//            ->whereHas('doctors');
        if (\request()->has('search')) {
            $specialities = $specialities->where('title', 'like', '%' . $searchTerm . '%')
                ->orWhere('alternate', 'like', '%' . $searchTerm . '%')
                ->orWhere('slug', 'like', '%' . $searchTerm . '%')
                ->orWhere(function ($q) use ($searchTerm) {
                    $q->whereTranslation('title', 'like', '%' . $searchTerm . '%');
                })->orWhere(function ($q) use ($searchTerm) {
                    $q->whereTranslation('alternate', 'like', '%' . $searchTerm . '%');
                });
        }
        $specialities = $specialities
            ->orderBy('sort_id')
            ->get();
        $specialities = $specialities->translate($locale,$fallbackLocale);

        return view('doctors.index', compact('page','doctors','specialities', 'searchTerm'));
    }

    public function specList()
    {
        $locale = session()->get('locale');
        $fallbackLocale = config('voyager.multilingual.default');
        $page = Page::with(['translations'])
            ->select('type', 'id', 'title', 'excerpt', 'body', 'image', 'slug', 'seo_title', 'meta_description', 'meta_keywords', 'status')
            ->where(['type' => 'specs', 'status' => Page::STATUS_ACTIVE])
            ->firstOrFail();
        $page = $page->translate($locale, $fallbackLocale);
        $searchTerm = null;
        $specialities = Speciality::with('translations')->where('status',true)->whereHas('doctors');
        if (\request()->has('search')) {
            $searchTerm = \request()->get('search');
            $specialities = $specialities->where('title', 'like', '%' . $searchTerm . '%')
                ->orWhere('alternate', 'like', '%' . $searchTerm . '%')
                ->orWhere('slug', 'like', '%' . $searchTerm . '%')
                ->orWhere(function ($q) use ($searchTerm) {
                    $q->whereTranslation('title', 'like', '%' . $searchTerm . '%');
                })->orWhere(function ($q) use ($searchTerm) {
                    $q->whereTranslation('alternate', 'like', '%' . $searchTerm . '%');
                });
        }
        $specialities = $specialities->orderBy('sort_id')->get()->translate($locale,$fallbackLocale);
        return view('doctors.specList', compact('page','specialities', 'searchTerm'));
    }

    public function getSpecialityPage($spec)
    {
        $locale = session()->get('locale');
        $fallbackLocale = config('voyager.multilingual.default');
        $page = Page::with(['translations'])
            ->select('type', 'id', 'title', 'excerpt', 'body', 'image', 'slug', 'seo_title', 'meta_description', 'meta_keywords', 'status')
            ->where(['type' => 'docs', 'status' => Page::STATUS_ACTIVE])
            ->firstOrFail();
        $page = $page->translate($locale, $fallbackLocale);

        $searchTerm = null;
        $speciality = Speciality::with(['translations','doctors.translations'])->where('slug',$spec)->where('status',true)->firstOrFail();
        $doctors = $speciality->doctors;
        $doctors = $doctors->translate($locale,$fallbackLocale);

        return view('doctors.specs', compact('page','doctors','speciality','searchTerm'));
    }

    public function getDoctorsPage($docSlug)
    {
        $locale = session()->get('locale');
        $fallbackLocale = config('voyager.multilingual.default');
        $page = Page::with(['translations'])
            ->select('type', 'id', 'title', 'excerpt', 'body', 'image', 'slug', 'seo_title', 'meta_description', 'meta_keywords', 'status')
            ->where(['type' => 'docs', 'status' => Page::STATUS_ACTIVE])
            ->firstOrFail();
        $page = $page->translate($locale, $fallbackLocale);
        $doctor = Doctor::with('translations')->where('slug',$docSlug)->firstOrFail();
        $doctor = $doctor->translate($locale,$fallbackLocale);

        return view('doctors.show',compact('page','doctor'));
    }

}
