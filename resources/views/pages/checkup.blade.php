@extends('partials.layout')
@section('page_title',(strlen($page->title) > 1 ? $page->title : ''))
@section('seo_title', (strlen($page->seo_title) > 1 ? $page->seo_title : ''))
@section('meta_keywords',(strlen($page->meta_keywords) > 1 ? $page->meta_keywords : ''))
@section('meta_description', (strlen($page->meta_description) > 1 ? $page->meta_description : ''))
@section('image',$page->thumbic)
@section('url',url()->current())
@section('page_class','page')
@section('content')
    <div class="container-hc">
        <div class="bread">
            @include('partials.breadcrumbs',['title'=>(strlen($page->title) > 1 ? $page->title : '')])
        </div>
        <div class="title-main">
            <img src="/img/icons/note-links-icon.svg" alt="note">
            <h3>{{$page->title}}</h3>
        </div>
    </div>
    <section class="checkup">
        <div class="container-hc">
                <ul class="nav stock__menu" id="myTab" role="tablist">
                    @foreach($checkupTypes as $checkupType)
                        <li class="nav-item">
                            <a class="stock__menu-btn @if($loop->first) active @endif"
                               id="checkup-{{$checkupType->id}}-tab" data-toggle="tab"
                               href="#checkup-{{$checkupType->id}}" role="tab"
                               aria-controls="checkup-{{$checkupType->id}}"
                               aria-selected="{{$loop->first ? 'true' : 'false'}}">{{mb_strtoupper($checkupType->title)}}</a>
                        </li>
                    @endforeach
                </ul>
        </div>
        <div class="tab-content" id="myTabContent">
            @foreach($checkupTypes as $checkupType)
                <div class="tab-pane fade @if($loop->first) show active @endif" id="checkup-{{$checkupType->id}}"
                     role="tabpanel" aria-labelledby="checkup-{{$checkupType->id}}-tab">
                    <div class="checkup__content">
                        <div
                            class="checkup__content-top @if($checkupType->checkups->count() < 4) content-ch @elseif($checkupType->checkups->count() > 8) cont-fc @else @endif">
                            <div class="container-hc">
                                <div class="top-title">@lang('general.checkupDiagnostic')</div>
                                <div class="top-subtitle">{{mb_strtoupper($checkupType->title)}}</div>
                                <ul class="nav nav-tabs @if($checkupType->checkups->count() > 5) content-focus @endif"
                                    id="myTab1" role="tablist">
                                    @foreach($checkupType->checkups as $checkup)
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link"
                                               id="ch_{{$checkup->id.'_'.$checkupType->id}}-tab" data-toggle="tab"
                                               href="#ch_{{$checkup->id.'_'.$checkupType->id}}"
                                               role="tab" aria-controls="ch_{{$checkup->id.'_'.$checkupType->id}}"
                                               aria-selected="false"
                                               style="background: url('{{Voyager::image($checkup->image)}}') center center/cover no-repeat;">
                                                <div
                                                    class="top-item__text @if(strlen($checkup->getTranslatedAttribute('title',$locale,$fallbackLocale)) > 29) item-text-ch @elseif(strlen($checkup->getTranslatedAttribute('title',$locale,$fallbackLocale)) === 29) item-text-ch2 @endif">{{$checkup->getTranslatedAttribute('title',$locale,$fallbackLocale)}}</div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="top-info">{{$checkupType->subtitle}}</div>
                            </div>
                        </div>
                        <div class="container-hc">
                            <div class="tab-content" id="myTabContent">
                                @foreach($checkupType->checkups as $checkup)
                                    <div class="tab-pane fade tb-content"
                                         id="ch_{{$checkup->id.'_'.$checkupType->id}}" role="tabpanel"
                                         aria-labelledby="ch_{{$checkup->id.'_'.$checkupType->id}}-tab">
                                        <nav class="checkup__steps">
                                            <div class="nav nav-tabs" id="nav-tab1" role="tablist">
                                                <a class="nav-link active step f-step"
                                                   id="ch_{{$checkup->id.'_'.$checkupType->id}}-1-tab" data-toggle="tab"
                                                   href="#ch_{{$checkup->id.'_'.$checkupType->id}}-1" role="tab"
                                                   aria-controls="ch_{{$checkup->id.'_'.$checkupType->id}}-1"
                                                   aria-selected="true">
                                                    <div class="platinum-step-1 st-cl">
                                                        @lang('general.checkupStep1')
                                                    </div>


                                                    <svg width="19pt" height="75pt" viewbox="0 0 19 75" version="1.1"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <g id="#fefefeff">
                                                        </g>
                                                        <g id="#f67531ff">
                                                            <path fill="#f67531" opacity="1.00"
                                                                  d=" M 0.00 1.04 L 0.01 0.01 L 2.22 0.23 C 7.28 11.80 12.25 23.41 17.40 34.94 C 18.56 37.76 16.22 40.10 15.24 42.55 C 11.07 52.86 6.35 62.93 2.14 73.22 C 1.60 73.52 0.53 74.12 0.00 74.42 L 0.00 1.04 Z"/>
                                                        </g>
                                                    </svg>

                                                </a>
                                                <a class="nav-link step s-step"
                                                   id="ch_{{$checkup->id.'_'.$checkupType->id}}-2-tab" data-toggle="tab"
                                                   href="#ch_{{$checkup->id.'_'.$checkupType->id}}-2" role="tab"
                                                   aria-controls="ch_{{$checkup->id.'_'.$checkupType->id}}-2"
                                                   aria-selected="false">
                                                    <div class="platinum-step-1  st-cl">
                                                        @lang('general.checkupStep2')
                                                    </div>
                                                    <svg width="19pt" height="75pt" viewbox="0 0 19 75" version="1.1"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <g>
                                                        </g>
                                                        <g>
                                                            <path fill="#f67531" opacity="1.00"
                                                                  d=" M 0.00 1.04 L 0.01 0.01 L 2.22 0.23 C 7.28 11.80 12.25 23.41 17.40 34.94 C 18.56 37.76 16.22 40.10 15.24 42.55 C 11.07 52.86 6.35 62.93 2.14 73.22 C 1.60 73.52 0.53 74.12 0.00 74.42 L 0.00 1.04 Z"/>
                                                        </g>
                                                    </svg>
                                                </a>
                                                <a class="nav-link step t-step"
                                                   id="ch_{{$checkup->id.'_'.$checkupType->id}}-3-tab" data-toggle="tab"
                                                   href="#ch_{{$checkup->id.'_'.$checkupType->id}}-3" role="tab"
                                                   aria-controls="ch_{{$checkup->id.'_'.$checkupType->id}}-3"
                                                   aria-selected="false">
                                                    <div class="platinum-step-1  st-cl">
                                                        @lang('general.checkupStep3')
                                                    </div>
                                                </a>
                                            </div>
                                        </nav>

                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane fade show active"
                                                 id="ch_{{$checkup->id.'_'.$checkupType->id}}-1" role="tabpanel"
                                                 aria-labelledby="platinum1-1-tab">
                                                <div
                                                    class="pl1-title tabs-title">{{$checkup->getTranslatedAttribute('title',$locale,$fallbackLocale)}}</div>
                                                <div class="pl1-content">
                                                    <div class="pl1-left">
                                                        {!! $checkup->getTranslatedAttribute('content_1',$locale,$fallbackLocale) !!}
                                                        <div class="pl1-bottom">
                                                            @if($checkup->checkupPrices && $checkup->checkupPrices->first() && strlen($checkup->checkupPrices->first()->getTranslatedAttribute('title',$locale,$fallbackLocale)) > 1)
                                                                <div
                                                                    class="pl1-bottom__title">{{$checkup->checkupPrices->first()->getTranslatedAttribute('title',$locale,$fallbackLocale)}}</div>
                                                            @endif
                                                            <div class="services-inner__info">
                                                                @if($checkup->checkupPrices && $checkup->checkupPrices->first())
                                                                    <picture>
                                                                        <img
                                                                            src="/img/icons/services-inner-invoice-icon.svg"
                                                                            alt="icon">
                                                                    </picture>
                                                                    <div class="info__price">
                                                                        <span>@lang('general.price')</span>
                                                                        <span
                                                                            class="info__qty">{{number_format($checkup->checkupPrices->first()->price,0,'',' ')}} @lang('general.unit')</span>
                                                                    </div>
                                                                @endif
                                                                <a href="#" class="btn-request c-modal mobile-link-change"
                                                                   data-page="{{$checkup->title.'-'.$checkupType->title}}">@lang('general.signup')</a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="pl1-right">
                                                        {!! $checkup->getTranslatedAttribute('content_2',$locale,$fallbackLocale) !!}
                                                        <div class="pl1-bottom">
                                                            @if($checkup->checkupPrices && $checkup->checkupPrices->skip(1)->first() && strlen($checkup->checkupPrices->skip(1)->first()->getTranslatedAttribute('title',$locale,$fallbackLocale)) > 1)
                                                                <div
                                                                    class="pl1-bottom__title">{{$checkup->checkupPrices->skip(1)->first()->getTranslatedAttribute('title',$locale,$fallbackLocale) }}</div>
                                                            @endif
                                                            @if($checkup->checkupPrices && $checkup->checkupPrices->skip(1)->first())
                                                                <div class="services-inner__info">
                                                                    <picture>
                                                                        <img
                                                                            src="/img/icons/services-inner-invoice-icon.svg"
                                                                            alt="icon">
                                                                    </picture>
                                                                    <div class="info__price">
                                                                        <span>@lang('general.price')</span>
                                                                        <span
                                                                            class="info__qty">{{number_format($checkup->checkupPrices->skip(1)->first()->price,0,'',' ')}} @lang('general.unit')</span>
                                                                    </div>
                                                                    <a href="#" class="btn-request c-modal mobile-link-change"
                                                                       data-page="{{$checkup->title.'-'.$checkupType->title}}">@lang('general.signup')</a>
                                                                </div>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="ch_{{$checkup->id.'_'.$checkupType->id}}-2"
                                                 role="tabpanel"
                                                 aria-labelledby="platinum1-2-tab">
                                                <div
                                                    class="pl1-1-title tabs-title">{{$checkup->getTranslatedAttribute('title',$locale,$fallbackLocale)}}</div>
                                                <div class="pl1-1__content">
                                                    <div class="pl1-1-left">
                                                        <div class="pl1-1-text">{{$checkupType->description}}</div>
                                                        {!! $checkupType->content_1 !!}
                                                    </div>
                                                    <div class="pl1-1-right">
                                                        {!! $checkupType->content_2 !!}
                                                        <div class="pl1-1-btn">
                                                            <a href="#" class="btn-request c-modal mobile-link-change"
                                                               data-page="{{$checkup->title.'-'.$checkupType->title}}">@lang('general.feedbackBtn')</a>
                                                            @if(strlen($checkupType->file) > 1 && !empty(json_decode($checkupType->file)))
                                                                <a href="{{Voyager::image(json_decode($checkupType->file)[0]->download_link)}}"
                                                                   download
                                                                   class="btn-download">@lang('general.download')
                                                                    <svg width="16" height="14" viewbox="0 0 16 14"
                                                                         fill="none"
                                                                         xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M14.8555 8.99994C14.5399 8.99994 14.2841 9.2238 14.2841 9.49995V12.4999C14.2841 12.7761 14.0283 13 13.7127 13H2.28414C1.96854 13 1.7127 12.7761 1.7127 12.4999V9.49995C1.7127 9.2238 1.45687 8.99994 1.14126 8.99994C0.825661 8.99994 0.569824 9.2238 0.569824 9.49995V12.4999C0.569824 13.3284 1.33733 13.9999 2.28411 13.9999H13.7127C14.6595 13.9999 15.427 13.3284 15.427 12.4999V9.49995C15.427 9.2238 15.1711 8.99994 14.8555 8.99994Z"
                                                                            fill="#EA5C10"/>
                                                                        <path
                                                                            d="M11.2479 8.6465C11.0265 8.45938 10.6754 8.45938 10.454 8.6465L8.57113 10.293V0.500009C8.57113 0.223857 8.31529 0 7.99969 0C7.68409 0 7.42825 0.223857 7.42825 0.500009V10.293L5.54653 8.6465C5.31952 8.45466 4.95778 8.46017 4.73854 8.65877C4.52465 8.85254 4.52465 9.15972 4.73854 9.35349L7.59566 11.8535C7.81855 12.049 8.18036 12.0494 8.40378 11.8544C8.40412 11.8541 8.40445 11.8538 8.40482 11.8535L11.2619 9.35349C11.4812 9.15486 11.4749 8.83833 11.2479 8.6465Z"
                                                                            fill="#EA5C10"/>
                                                                    </svg>
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="tab-pane fade pl1-3"
                                                 id="ch_{{$checkup->id.'_'.$checkupType->id}}-3"
                                                 role="tabpanel"
                                                 aria-labelledby="ch_{{$checkup->id.'_'.$checkupType->id}}-3-tab">
                                                <div
                                                    class="pl1-3__title tab3-title">{{$checkup->getTranslatedAttribute('title',$locale,$fallbackLocale)}}</div>
                                                <div class="accordion accPl3"
                                                     id="acc_ch_{{$checkup->id.'_'.$checkupType->id}}3">
                                                    @foreach($checkupType->checkupFaqs as $checkupFaq)
                                                        <div class="card">
                                                            <div class="card-header"
                                                                 id="h_ch_{{$checkup->id.'_'.$checkupType->id}}3-{{$checkupFaq->id}}">
                                                                <h2 class="mb-0">
                                                                    <button class="btn btn-link collapsed" type="button"
                                                                            data-toggle="collapse"
                                                                            data-target="#col_ch_{{$checkup->id.'_'.$checkupType->id}}3-{{$checkupFaq->id}}"
                                                                            aria-expan-ded="true"
                                                                            aria-controls="col_ch_{{$checkup->id.'_'.$checkupType->id}}3-{{$checkupFaq->id}}">
                                                                        <div class="acc-arr">
                                                                            <svg width="13" height="13"
                                                                                 viewbox="0 0 13 13"
                                                                                 fill="none"
                                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                                <rect x="12.728" y="6.36426" width="1.5"
                                                                                      height="8.99984" rx="0.75"
                                                                                      transform="rotate(135 12.728 6.36426)"
                                                                                      fill="#EA5C10"/>
                                                                                <rect x="6.36377" y="12.728"
                                                                                      width="1.49997"
                                                                                      height="9"
                                                                                      rx="0.749987"
                                                                                      transform="rotate(-135 6.36377 12.728)"
                                                                                      fill="#EA5C10"/>
                                                                            </svg>
                                                                        </div>
                                                                        <span>{{$checkupFaq->getTranslatedAttribute('title',$locale,$fallbackLocale)}}</span>
                                                                    </button>
                                                                </h2>
                                                            </div>
                                                            <div
                                                                id="col_ch_{{$checkup->id.'_'.$checkupType->id}}3-{{$checkupFaq->id}}"
                                                                class="collapse"
                                                                aria-labelledby="h_ch_{{$checkup->id.'_'.$checkupType->id}}3-{{$checkupFaq->id}}"
                                                                data-parent="#acc_ch_{{$checkup->id.'_'.$checkupType->id}}3">
                                                                <div class="card-body">
                                                                    <div
                                                                        class="services-inner__text">{!! $checkupFaq->getTranslatedAttribute('content',$locale,$fallbackLocale) !!}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="pl3-items">
                                                    @foreach($iconTexts as $iconText)
                                                        <div class="item">
                                                            <picture>
                                                                <img src="{{Voyager::image($iconText->icon)}}"
                                                                     alt="icon">
                                                            </picture>
                                                            <div class="item-text">{!! $iconText->title !!}</div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- Mobile only, content start -->
    <section class="checkup-mobile">
        <div class="container">
            <nav>
                <div class="nav nav-tabs top-tabs" id="nav-tab" role="tablist">
                    @foreach($checkupTypes as $checkupType)
                        <a class="nav-item nav-link @if($loop->first) active @endif"
                           id="main-tab{{$checkupType->id}}-tab" data-toggle="tab" href="#main-tab{{$checkupType->id}}"
                           role="tab" aria-controls="main-tab{{$checkupType->id}}"
                           aria-selected={{$loop->first ? 'true' : 'false'}}>{{mb_strtoupper($checkupType->title)}}</a>
                    @endforeach
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContentMobile">
                @foreach($checkupTypes as $checkupType)
                    <div class="tab-pane fade @if($loop->first) show active @endif" id="main-tab{{$checkupType->id}}"
                         role="tabpanel"
                         aria-labelledby="main-tab{{$checkupType->id}}-tab">
                        <nav>
                            <div class="nav nav-tabs middle-tab" id="sub-main-tab-{{$checkupType->id}}" role="tablist">
                                @foreach($checkupType->checkups as $checkup)
                                    <a class="nav-item nav-link @if($loop->first) active @endif"
                                       id="main-tab{{$checkupType->id}}-{{$checkup->id}}-tab"
                                       data-toggle="tab"
                                       href="#main-tab{{$checkupType->id}}-{{$checkup->id}}" role="tab"
                                       aria-controls="main-tab{{$checkupType->id}}-{{$checkup->id}}"
                                       aria-selected="{{$loop->first ? 'true' : 'false'}}">{{$checkup->getTranslatedAttribute('title',$locale,$fallbackLocale)}}</a>
                                @endforeach
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-SubtabContent-{{$checkupType->id}}">
                            @foreach($checkupType->checkups as $checkup)
                                <div class="tab-pane fade @if($loop->first) show active @endif"
                                     id="main-tab{{$checkupType->id}}-{{$checkup->id}}" role="tabpanel"
                                     aria-labelledby="main-tab{{$checkupType->id}}-{{$checkup->id}}-tab">
                                    <nav class="checkup__steps">
                                        <div class="nav nav-tabs" id="mob-{{$checkupType->id}}-{{$checkup->id}}"
                                             role="tablist">
                                            <a class="nav-link active step f-step"
                                               id="mob{{$checkupType->id}}-{{$checkup->id}}1-tab" data-toggle="tab"
                                               href="#mob{{$checkupType->id}}-{{$checkup->id}}1" role="tab"
                                               aria-controls="mob{{$checkupType->id}}-{{$checkup->id}}"
                                               aria-selected="true">
                                                <div class="platinum-step-1 st-cl">@lang('general.checkupStep1')</div>


                                                <svg width="19pt" height="75pt" viewbox="0 0 19 75" version="1.1"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <g id="#fweffeffww">
                                                    </g>
                                                    <g id="#fw7f51ffww">
                                                        <path fill="#f67531" opacity="1.00"
                                                              d=" M 0.00 1.04 L 0.01 0.01 L 2.22 0.23 C 7.28 11.80 12.25 23.41 17.40 34.94 C 18.56 37.76 16.22 40.10 15.24 42.55 C 11.07 52.86 6.35 62.93 2.14 73.22 C 1.60 73.52 0.53 74.12 0.00 74.42 L 0.00 1.04 Z"/>
                                                    </g>
                                                </svg>

                                            </a>
                                            <a class="nav-link step s-step"
                                               id="mob{{$checkupType->id}}-{{$checkup->id}}2-tab" data-toggle="tab"
                                               href="#mob{{$checkupType->id}}-{{$checkup->id}}2"
                                               role="tab" aria-controls="mob{{$checkupType->id}}-{{$checkup->id}}2"
                                               aria-selected="false">
                                                <div class="platinum-step-1  st-cl">@lang('general.checkupStep2')</div>
                                                <svg width="19pt" height="75pt" viewbox="0 0 19 75" version="1.1"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <g>
                                                    </g>
                                                    <g>
                                                        <path fill="#f67531" opacity="1.00"
                                                              d=" M 0.00 1.04 L 0.01 0.01 L 2.22 0.23 C 7.28 11.80 12.25 23.41 17.40 34.94 C 18.56 37.76 16.22 40.10 15.24 42.55 C 11.07 52.86 6.35 62.93 2.14 73.22 C 1.60 73.52 0.53 74.12 0.00 74.42 L 0.00 1.04 Z"/>
                                                    </g>
                                                </svg>
                                            </a>
                                            <a class="nav-link step t-step"
                                               id="mob{{$checkupType->id}}-{{$checkup->id}}3-tab" data-toggle="tab"
                                               href="#mob{{$checkupType->id}}-{{$checkup->id}}3"
                                               role="tab" aria-controls="mob{{$checkupType->id}}-{{$checkup->id}}3"
                                               aria-selected="false">
                                                <div class="platinum-step-1 st-cl">@lang('general.checkupStep2')</div>
                                            </a>
                                        </div>
                                    </nav>
                                    <div class="tab-content"
                                         id="nav-tabContentMob{{$checkupType->id}}-{{$checkup->id}}">
                                        <div class="tab-pane fade show active"
                                             id="mob{{$checkupType->id}}-{{$checkup->id}}1" role="tabpanel"
                                             aria-labelledby="mob{{$checkupType->id}}-{{$checkup->id}}1-tab">
                                            <div
                                                class="pl1-title tabs-title">{{$checkup->getTranslatedAttribute('title',$locale,$fallbackLocale)}}</div>
                                            <div class="pl1-content">
                                                <div class="pl1-left">
                                                    {!! $checkup->getTranslatedAttribute('content_1',$locale,$fallbackLocale) !!}
                                                </div>
                                                <div class="pl1-right">
                                                    {!! $checkup->getTranslatedAttribute('content_2',$locale,$fallbackLocale) !!}
                                                    <div class="pl1-bottom">
                                                        @if($checkup->checkupPrices->count() > 0)
                                                            <div class="pl1-bottom__info">
                                                                @foreach($checkup->checkupPrices as $checkupPrice)
                                                                    <div class="pl1-bottom__item">
                                                                        @if(strlen($checkupPrice->getTranslatedAttribute('title',$locale,$fallbackLocale)) > 1)
                                                                            <div
                                                                                class="pl1-bottom__title">{{$checkupPrice->getTranslatedAttribute('title',$locale,$fallbackLocale)}}</div>
                                                                        @endif
                                                                        <div class="services-inner__info">
                                                                            <picture>
                                                                                <img
                                                                                    src="/img/icons/services-inner-invoice-icon.svg"
                                                                                    alt="icon">
                                                                            </picture>
                                                                            <div class="info__price">
                                                                                <span>@lang('general.price')</span>
                                                                                <span
                                                                                    class="info__qty">{{number_format($checkupPrice->price,0,'',' ')}} @lang('general.unit')</span>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                        <a href="#" class="btn-request c-modal mobile-link-change"
                                                           data-page="{{$checkup->title.'-'.$checkupType->title}}">@lang('general.signup')</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="mob{{$checkupType->id}}-{{$checkup->id}}2"
                                             role="tabpanel"
                                             aria-labelledby="mob{{$checkupType->id}}-{{$checkup->id}}2-tab">
                                            <div
                                                class="pl1-1-title tabs-title">{{$checkup->getTranslatedAttribute('title',$locale,$fallbackLocale)}}</div>
                                            <div class="pl1-1__content">
                                                <div class="pl1-1-left">
                                                    <div class="pl1-1-text">{{$checkupType->description}}</div>
                                                    {!! $checkupType->content_1 !!}
                                                </div>
                                                <div class="pl1-1-right">
                                                    {!! $checkupType->content_2 !!}
                                                    <div class="pl1-1-btn">
                                                        <a href="#" class="btn-request c-modal mobile-link-change"
                                                           data-page="{{$checkup->title.'-'.$checkupType->title}}">@lang('general.feedbackBtn')</a>
                                                        @if(strlen($checkupType->file) > 1 && !empty(json_decode($checkupType->file)))
                                                            <a href="{{Voyager::image(json_decode($checkupType->file)[0]->download_link)}}"
                                                               download class="btn-download">@lang('general.download')
                                                                <svg width="16" height="14" viewbox="0 0 16 14"
                                                                     fill="none"
                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M14.8555 8.99994C14.5399 8.99994 14.2841 9.2238 14.2841 9.49995V12.4999C14.2841 12.7761 14.0283 13 13.7127 13H2.28414C1.96854 13 1.7127 12.7761 1.7127 12.4999V9.49995C1.7127 9.2238 1.45687 8.99994 1.14126 8.99994C0.825661 8.99994 0.569824 9.2238 0.569824 9.49995V12.4999C0.569824 13.3284 1.33733 13.9999 2.28411 13.9999H13.7127C14.6595 13.9999 15.427 13.3284 15.427 12.4999V9.49995C15.427 9.2238 15.1711 8.99994 14.8555 8.99994Z"
                                                                        fill="#EA5C10"/>
                                                                    <path
                                                                        d="M11.2479 8.6465C11.0265 8.45938 10.6754 8.45938 10.454 8.6465L8.57113 10.293V0.500009C8.57113 0.223857 8.31529 0 7.99969 0C7.68409 0 7.42825 0.223857 7.42825 0.500009V10.293L5.54653 8.6465C5.31952 8.45466 4.95778 8.46017 4.73854 8.65877C4.52465 8.85254 4.52465 9.15972 4.73854 9.35349L7.59566 11.8535C7.81855 12.049 8.18036 12.0494 8.40378 11.8544C8.40412 11.8541 8.40445 11.8538 8.40482 11.8535L11.2619 9.35349C11.4812 9.15486 11.4749 8.83833 11.2479 8.6465Z"
                                                                        fill="#EA5C10"/>
                                                                </svg>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="tab-pane fade pl1-3" id="mob{{$checkupType->id}}-{{$checkup->id}}3"
                                             role="tabpanel"
                                             aria-labelledby="mob{{$checkupType->id}}-{{$checkup->id}}3-tab">
                                            <div
                                                class="pl1-3__title tab3-title">{{$checkup->getTranslatedAttribute('title',$locale,$fallbackLocale)}}</div>
                                            <div class="accordion accPl3" id="accMob{{$checkupType->id}}">
                                                @foreach($checkupType->checkupFaqs as $checkupFaq)
                                                    <div class="card">
                                                        <div class="card-header"
                                                             id="hMob{{$checkupType->id}}-{{$checkupFaq->id}}">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-link collapsed" type="button"
                                                                        data-toggle="collapse"
                                                                        data-target="#colMob{{$checkupType->id}}-{{$checkupFaq->id}}"
                                                                        aria-expanded="true"
                                                                        aria-controls="colMob{{$checkupType->id}}-{{$checkupFaq->id}}">
                                                                    <div class="acc-arr">
                                                                        <svg width="13" height="13" viewbox="0 0 13 13"
                                                                             fill="none"
                                                                             xmlns="http://www.w3.org/2000/svg">
                                                                            <rect x="12.728" y="6.36426" width="1.5"
                                                                                  height="8.99984" rx="0.75"
                                                                                  transform="rotate(135 12.728 6.36426)"
                                                                                  fill="#EA5C10"/>
                                                                            <rect x="6.36377" y="12.728" width="1.49997"
                                                                                  height="9" rx="0.749987"
                                                                                  transform="rotate(-135 6.36377 12.728)"
                                                                                  fill="#EA5C10"/>
                                                                        </svg>
                                                                    </div>
                                                                    <span>{{$checkupFaq->getTranslatedAttribute('title',$locale,$fallbackLocale)}}</span>
                                                                </button>
                                                            </h2>
                                                        </div>
                                                        <div id="colMob{{$checkupType->id}}-{{$checkupFaq->id}}"
                                                             class="collapse"
                                                             aria-labelledby="hMob{{$checkupType->id}}-{{$checkupFaq->id}}"
                                                             data-parent="#accMob{{$checkupType->id}}">
                                                            <div class="card-body">
                                                                <div class="services-inner__text">
                                                                    {!! $checkupFaq->getTranslatedAttribute('content',$locale,$fallbackLocale) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <a href="#" class="btn-watch mobile-link-change">@lang('general.signup')</a>
                                            <div class="pl3-items">
                                                @foreach($iconTexts as $iconText)
                                                    <div class="item">
                                                        <picture>
                                                            <img src="{{Voyager::image($iconText->icon)}}" alt="icon">
                                                        </picture>
                                                        <div class="item-text">{!! $iconText->title !!}</div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Mobile only, content end-->
@endsection
