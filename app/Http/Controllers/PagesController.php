<?php

namespace App\Http\Controllers;

use App\Models\Analysis;
use App\Models\Article;
use App\Models\Certificate;
use App\Models\Checkup;
use App\Models\CheckupType;
use App\Models\Contact;
use App\Models\CorpBlock;
use App\Models\CorpVideo;
use App\Models\Doctor;
use App\Models\Gallery;
use App\Models\Icontext;
use App\Models\Partner;
use App\Models\Research;
use App\Models\Sale;
use App\Models\ServiceType;
use App\Models\Slider;
use App\Models\Methodic;
use App\Models\Page;
use App\Models\Service;
use App\Models\Speciality;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.main');
    }

    public function getPage($slug = 'home')
    {
        $locale = session()->get('locale');
        $fallbackLocale = config('voyager.multilingual.default');
        if (strpos(url()->current(), 'home') !== false) {
            abort(404);
        } else {
            $page = Page::with(['translations'])
                ->select('type', 'id', 'title', 'excerpt', 'body', 'image', 'slug', 'seo_title', 'meta_description', 'meta_keywords', 'status')
                ->where(['slug' => $slug, 'status' => Page::STATUS_ACTIVE])
                ->firstOrFail();
        }

        $page = $page->translate($locale, $fallbackLocale);
        switch ($page->type) {
            case 'home':
                $saleSliders = Sale::with('translations')
                    ->select('id','title','excerpt','image','slug')
                    ->where('in_slider',true)
                    ->where('status', true)
                    ->orderBy('sort_id')
                    ->get()
                    ->translate($locale, $fallbackLocale);

                $methodicSliders = Methodic::with('translations')
                    ->select('id','title','excerpt','image')
                    ->where('in_slider',true)
                    ->where('status', true)
                    ->orderBy('sort_id')
                    ->get()
                    ->translate($locale, $fallbackLocale);

                $homeSliders = Slider::with('translations')
                    ->where('type', $page->type)
                    ->where('status', true)
                    ->orderBy('sort_id')
                    ->get()
                    ->translate($locale, $fallbackLocale);

                $homeSliders = $saleSliders->merge($methodicSliders)->merge($homeSliders)->take(10);

                $docs = Doctor::with('translations')
                    ->where('status', true)
                    ->orderByDesc('featured')
                    ->orderBy('sort_id')
                    ->take(5)
                    ->get()->translate($locale, $fallbackLocale);

                $methodics = Methodic::with('translations')
                    ->where('status', true)
                    ->orderBy('sort_id')
                    ->take(4)
                    ->get()
                    ->translate($locale, $fallbackLocale);

               $serviceTypes = ServiceType::with('translations')->with('services', function ($q) {
                    $q->orderByDesc('featured')->limit(9);
                })
                    ->where('status', true)
                    ->orderBy('sort_id')
                    ->take(4)
                    ->get();

                $specialities = Speciality::with('translations')
                    ->where('status', true)
                    ->whereHas('doctors')
                    ->orderBy('sort_id')
                    ->take(9)
                    ->get()
                    ->translate($locale, $fallbackLocale);

                $researches = Research::with(['translations', 'limitAnalyzes.translations'])
                    ->whereHas('limitAnalyzes')
                    ->where('status', true)
                    ->orderBy('sort_id')
                    ->take(4)
                    ->get();

                $checkupTypes = CheckupType::with(['translations', 'checkups.translations'])
                    ->where('status', true)
                    ->orderBy('sort_id')
                    ->get()
                    ->translate($locale, $fallbackLocale);

                $galleries = Gallery::with('translations')
                    ->where('status', true)
                    ->orderBy('sort_id')
                    ->get()
                    ->translate($locale, $fallbackLocale);

                $news = Article::with('translations')
                    ->where('status', true)
                    ->orderBy('sort_id')
                    ->orderByDesc('created_at')
                    ->limit(2)
                    ->get()
                    ->translate($locale, $fallbackLocale);

                $sales = Sale::with('translations')
                    ->select('id', 'title', 'excerpt', 'slug', 'image', 'status', 'sort_id')
                    ->where('status', true)
                    ->orderBy('sort_id')
                    ->limit(2)
                    ->get()
                    ->translate($locale, $fallbackLocale);

                return view('pages.' . $page->type, compact('page', 'homeSliders', 'docs', 'methodics', 'serviceTypes', 'specialities', 'researches', 'checkupTypes', 'galleries', 'news','sales'));
                break;
            case 'about':
                $aboutSliders = Slider::with('translations')->where('type', $page->type)->where('status', true)->orderBy('sort_id')->get();
                $aboutSliders = $aboutSliders->translate($locale, $fallbackLocale);
                $iconTexts = Icontext::with('translations')->where('type', '!=', 'corporate')->where('status', true)->orderBy('sort_id')->get();
                $iconTexts = $iconTexts->translate($locale, $fallbackLocale);
                $numbers = $iconTexts->where('type', 'numbers');
                $advantages = $iconTexts->where('type', 'advantages');
                $certificateInstance = Certificate::whereNotNull('images')->first();
                return view('pages.' . $page->type, compact('page', 'aboutSliders', 'numbers', 'advantages', 'certificateInstance'));
                break;
            case 'checkup':
                $checkupTypes = CheckupType::with(['translations', 'checkupFaqs', 'checkups.checkupPrices'])->where('status', true)->orderBy('sort_id')->get();
                $checkupTypes = $checkupTypes->translate($locale, $fallbackLocale);
                $iconTexts = Icontext::with('translations')->where('type','checkup')->where('status',true)->orderBy('sort_id')->get();
                $iconTexts = $iconTexts->translate($locale,$fallbackLocale);
                return view('pages.' . $page->type, compact('page', 'checkupTypes','iconTexts'));
                break;
            case 'corporate':
                $iconTexts = Icontext::with('translations')->where('type', '!=', 'numbers')->where('status', true)->orderBy('sort_id')->get();
                $iconTexts = $iconTexts->translate($locale, $fallbackLocale);
                $numbers = $iconTexts->where('type', 'corporates');
                $advantages = $iconTexts->where('type', 'advantages');
                $partners = Partner::with('translations')->where('status', true)->orderBy('sort_id')->get()->translate($locale, $fallbackLocale);
                $videos = CorpVideo::where('status', true)->orderBy('sort_id')->get();
                $corpBlocks = CorpBlock::with('translations')->where('status', true)->orderBy('sort_id')->get()->translate($locale, $fallbackLocale);
                $news = Article::with('translations')->where('status', true)->orderBy('sort_id')->get()->translate($locale, $fallbackLocale);
                return view('pages.' . $page->type, compact('page', 'numbers', 'advantages', 'partners', 'videos', 'corpBlocks', 'news'));
                break;
            case 'methodics':
                $methodics = Methodic::with('translations')->where('status', true)->orderBy('sort_id')->get();
                $methodics = $methodics->translate($locale, $fallbackLocale);
                return view('pages.' . $page->type, compact('page', 'methodics'));
                break;
            case 'posts':
                return view('pages.' . $page->type, compact('page'));
                break;
            case 'contacts':
                $map = Contact::where('type', 'map')->where('status', true)->first();
                return view('pages.' . $page->type, compact('page', 'map'));
                break;
            case 'simple':
                return view('pages.' . $page->type, compact('page'));
                break;
            default :
                return view('pages.' . $page->type, compact('page'));
                break;
        }
    }

    public function getCorporatePost($corpSlug, $postSlug)
    {
        $locale = session()->get('locale');
        $fallbackLocale = config('voyager.multilingual.default');

        $page = Page::with(['translations'])
            ->select('type', 'id', 'title', 'excerpt', 'body', 'image', 'slug', 'seo_title', 'meta_description', 'meta_keywords', 'status')
            ->where(['slug' => $corpSlug, 'status' => Page::STATUS_ACTIVE])
            ->firstOrFail()->translate($locale, $fallbackLocale);
        $post = Article::where('slug',$postSlug)->firstOrFail();

        $otherPosts = Article::where('status', true)->where('id', '<>', $post->id)->get()->translate($locale, $fallbackLocale);

        return view('pages.article', compact('post', 'otherPosts', 'page'));
    }

    public function setLocale($locale)
    {

        if (in_array($locale, config()->get('voyager.multilingual.locales'))) {
            session()->put('locale', $locale);
        }

        return redirect()->back();
    }

    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false], 400);
        }
        if (!Subscriber::where('email',$request->email)->exists()){
            $subscriber = new Subscriber();
            $subscriber->email = $request->email;
            $subscriber->save();
        }

        return response()->json(['success' => true], 200);
    }

    public function feedback(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'agreement' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false], 400);
        }

        $users = User::where('role_id', 1)->select('email')->get()->pluck('email')->toArray();
        $page = $request->has('page') ? $request->get('page') : null;
        $url = $request->has('url') ? $request->get('url') : null;
//        \Mail::send('emails.callback', [
//            'name' => $request->name,
//            'phone' => $request->phone,
//            'page' => $page,
//            'url' => $url,
//        ], function ($m) use ($users) {
//            $m->to($users)
//                ->from(env('MAIL_USERNAME','noreply@dpl.kz'))
//                ->subject('Новая заявка c сайта');
//        });

        return response()->json(['success' => true], 200);
    }
    public function feedbackInline(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false], 400);
        }
        $users = User::where('role_id', 1)->select('email')->get()->pluck('email')->toArray();
        $page = $request->has('page') ? $request->get('page') : null;
        $url = $request->has('url') ? $request->get('url') : null;
        $comments = $request->has('comments') ? $request->get('comments') : null;
        $email = $request->has('email') ? $request->get('email') : null;
//        \Mail::send('emails.callback', [
//            'name' => $request->name,
//            'phone' => $request->phone,
//            'email' => $email,
//            'comments' => $comments,
//            'page' => $page,
//            'url' => $url,
//        ], function ($m) use ($users) {
//            $m->to($users)
//                ->from(env('MAIL_USERNAME','noreply@dpl.kz'))
//                ->subject('Новая заявка c сайта');
//        });

        return response()->json(['success' => true], 200);
    }
}
