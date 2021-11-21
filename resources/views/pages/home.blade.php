@extends('partials.layout')
@section('page_title',(strlen($page->title) > 1 ? $page->title : ''))
@section('seo_title', (strlen($page->seo_title) > 1 ? $page->seo_title : ''))
@section('meta_keywords',(strlen($page->meta_keywords) > 1 ? $page->meta_keywords : ''))
@section('meta_description', (strlen($page->meta_description) > 1 ? $page->meta_description : ''))
@section('image',$page->thumbic)
@section('url',url()->current())
@section('page_class','page')
@section('content')
    <!-- Header top slider start -->
    <section class="top-sl container-fluid">
        <div class="header-slider">
            @foreach($homeSliders as $homeSlider)
                <div class="header-slider__slide">
                    <picture>
                        <source srcset="{{$homeSlider->webpImage}}" type="image/webp"/>
                        <source srcset="{{\Voyager::image($homeSlider->image)}}" type="image/jpg"/>
                        <img src="{{\Voyager::image($homeSlider->image)}}"
                             alt="{{$homeSlider->title}}">
                    </picture>
                    <div class="container">
                        <div class="header-slider__inner">
                            <div class="header-slider__title">{{$homeSlider->title}}</div>
                            <div class="header-slider__subtitle">{{$homeSlider->text ?? $homeSlider->excerpt}}</div>
                            <a href="{{strtolower(class_basename($homeSlider->getModel())) === 'sale'
? route('sales.show',$homeSlider->slug)
: ($homeSlider->btn_link ?? route('pages.get',\App\Models\Page::where('type','methodics')->first()->slug))}}"
                               class="btn-white">{{$homeSlider->btn_text ?? __('general.learnMore')}}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="slider-dots header-slider-menu">
            <div class="container inner-dots">
                <ul>
                    @foreach($homeSliders as $key=>$homeSlider)
                        <li class="slider-dots__item @if($loop->first) active @endif"
                            data-index="{{$key}}">{{$homeSlider->subtitle ?? $homeSlider->title}}</li>
                    @endforeach
                </ul>

            </div>

        </div>
    </section>
    <!-- Header top slider end -->
    <!-- Mobile links start -->
    <section class="mobile-links">
        <div class="container">
            <div class="mobile-links__content">
                <a href="{{route('pages.get',$pages['services']->first()->slug)}}" class="links-item">
                    <picture>
                        <img src="/img/icons/cross-links-icon.svg" alt="cross">
                    </picture>
                    <h3>{{$pages['services']->first()->title}}</h3>
                </a>
                <a href="{{route('pages.get',$pages['docs']->first()->slug)}}" class="links-item">
                    <picture>
                        <img src="/img/icons/doctor-links-icon.svg" alt="doctor">
                    </picture>
                    <h3>{{$pages['docs']->first()->title}}</h3>
                </a>
                <a href="{{route('pages.get',$pages['analyzes']->first()->slug)}}" class="links-item">
                    <picture>
                        <img src="/img/icons/syringe-links-icon.svg" alt="syringe">
                    </picture>
                    <h3>{{$pages['analyzes']->first()->title}}</h3>
                </a>
                <a href="{{route('pages.get',$pages['checkup']->first()->slug)}}" class="links-item">
                    <picture>
                        <img src="/img/icons/note-links-icon.svg" alt="note">
                    </picture>
                    <h3>{{$pages['checkup']->first()->title}}</h3>
                </a>
            </div>
        </div>
    </section>
    <!-- Mobile links end -->
    <!-- Main links start -->
    <section class="links">
            <div class="container">
                    <div class="nav nav-tabs links__block" id="nav-tab" role="tablist" onclick="window.scrollTo(0,780)">
                        <div class="links__item nav-item nav-link active" id="nav-one-tab" data-toggle="tab" href="#nav-one"
                             role="tab" aria-controls="nav-one" aria-selected="true">
                            <a href="{{route('pages.get',$pages['services']->first()->slug)}}"><img
                                    src="/img/icons/cross-links-icon.svg" alt="icon">
                                <span>{{$pages['services']->first()->title}}</span></a>
                        </div>
                        <div class="links__item nav-item nav-link" id="nav-two-tab" data-toggle="tab" href="#nav-two"
                             role="tab" aria-controls="nav-two" aria-selected="false">
                            <a href="{{route('pages.get',$pages['docs']->first()->slug)}}">
                                <img src="/img/icons/doctor-links-icon.svg" alt="icon">
                                <span>{{$pages['docs']->first()->title}}</span></a>
                        </div>
                        <div class="links__item nav-item nav-link" id="nav-three-tab" data-toggle="tab" href="#nav-three"
                             role="tab" aria-controls="nav-three" aria-selected="false">
                            <a href="{{route('pages.get',$pages['analyzes']->first()->slug)}}">
                                <img src="/img/icons/syringe-links-icon.svg" alt="icon">
                                <span>{{$pages['analyzes']->first()->title}}</span>
                            </a>
                        </div>
                        <div class="links__item nav-item nav-link" id="nav-four-tab" data-toggle="tab" href="#nav-four"
                             role="tab" aria-controls="nav-four" aria-selected="false">
                            <a href="{{route('pages.get',$pages['checkup']->first()->slug)}}">
                                <img src="/img/icons/note-links-icon.svg" alt="icon">
                                <span>{{$pages['checkup']->first()->title}}</span>
                            </a>
                        </div>
                        <div class="links__item search-inp">
                            <svg width="17" height="16" viewbox="0 0 17 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.2845 14.8619L11.7345 10.3119C12.6159 9.22325 13.1465 7.83992 13.1465 6.33328C13.1465 2.84132 10.3052 0 6.81323 0C3.32127 0 0.47998 2.84128 0.47998 6.33325C0.47998 9.82521 3.3213 12.6665 6.81326 12.6665C8.3199 12.6665 9.70323 12.1359 10.7919 11.2545L15.3418 15.8045C15.4718 15.9345 15.6425 15.9998 15.8132 15.9998C15.9839 15.9998 16.1545 15.9345 16.2845 15.8045C16.5452 15.5438 16.5452 15.1225 16.2845 14.8619ZM6.81326 11.3332C4.05595 11.3332 1.81331 9.09057 1.81331 6.33325C1.81331 3.57593 4.05595 1.3333 6.81326 1.3333C9.57058 1.3333 11.8132 3.57593 11.8132 6.33325C11.8132 9.09057 9.57055 11.3332 6.81326 11.3332Z"
                                    fill="#7A7A7A"/>
                            </svg>
                            <input type="text" placeholder="@lang('general.servicePlaceholder')">
                        </div>
                    </div>
            </div>
    </section>
    <section class="links__content">
        <div class="container">
            <div class="tab-content" id="nav-tabContent">
                <div class="links__content-item tab-pane fade show active" id="nav-one" role="tabpanel"
                     aria-labelledby="nav-one-tab">
                    @foreach($serviceTypes as $serviceType)
                        <div class="item__row">
                            <div class="item__title title-submain">{{$serviceType->title}}</div>
                            <ul class="item__list">
                                @foreach($serviceType->featuredServices as $service)
                                    <li>
                                        <a href="{{route('services.type',$serviceType->slug)}}">{{$service->getTranslatedAttribute('title',$locale,$fallbackLocale)}}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <a href="{{route('services.type',$serviceType->slug)}}"
                               class="btn-watch">@lang('general.showAll')</a>
                        </div>
                    @endforeach
                </div>
                <div class="links__content-item tab-pane fade" id="nav-two" role="tabpanel"
                     aria-labelledby="nav-two-tab">
                    <div class="item__row">
                        <ul class="item__list">
                            @foreach($specialities as $spec)
                                <li><a href="{{route('doctors.spec',$spec->slug)}}">{{$spec->title}}</a></li>
                            @endforeach
                        </ul>
                        <a href="{{route('doctors.specList')}}" class="btn-watch">@lang('general.showAll')</a>
                    </div>
                </div>
                <div class="links__content-item tab-pane fade" id="nav-three" role="tabpanel"
                     aria-labelledby="nav-three-tab">
                    @foreach($researches as $research)
                        <div class="item__row">
                            <div class="item__title title-submain">{{$research->title}}</div>
                            <ul class="item__list">
                                @foreach($research->analyzes as $analyze)
                                    <li>
                                        <a href="{{route('pages.get',$research->slug)}}">{{$analyze->getTranslatedAttribute('title',$locale,$fallbackLocale)}}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <a href="{{route('analyzes.research',$research->slug)}}"
                               class="btn-watch">@lang('general.showAll')</a>
                        </div>
                    @endforeach
                </div>
                <div class="links__content-item tab-pane fade" id="nav-four" role="tabpanel"
                     aria-labelledby="nav-four-tab">
                    @foreach($checkupTypes as $checkupType)
                        <div class="item__row">
                            <div class="item__title title-submain">{{$checkupType->title}}</div>
                            <ul class="item__list">
                                @foreach($checkupType->checkups as $checkup)
                                    <li>
                                        <a href="{{route('pages.get',$pages['checkup']->first()->slug)}}">{{$checkup->getTranslatedAttribute('title',$locale,$fallbackLocale)}}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <a href="{{route('pages.get',$pages['checkup']->first()->slug)}}"
                               class="btn-watch">@lang('general.showAll')</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Main links end -->
    <!-- Contacts start -->
    <section class="contacts">
        <div class="container">
            <div class="contacts__title title-main fl-center">
                <img src="/img/icons/contacts-icon.svg" alt="contacts">
                <span>{{strtoupper(__('general.contacts'))}}</span>
            </div>
            <div class="contacts__phones">
                @foreach($phones as $phone)
                    <a href="{{$phone->link}}">{{$phone->value}}</a>
                @endforeach
            </div>
            <div class="contacts__map">
                <a href="{{route('pages.get','kontakty')}}">
                    <svg width="10" height="14" viewbox="0 0 10 14" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5 0C2.24302 0 0 2.18306 0 4.86633C0 8.23893 5.00492 14 5.00492 14C5.00492 14 10 8.07307 10 4.86633C10 2.18306 7.75707 0 5 0ZM6.5086 6.2912C6.09263 6.69597 5.54636 6.8984 5 6.8984C4.45373 6.8984 3.90729 6.69597 3.49148 6.2912C2.65961 5.48165 2.65961 4.16437 3.49148 3.35474C3.89429 2.96252 4.43011 2.74651 5 2.74651C5.56989 2.74651 6.10562 2.96261 6.5086 3.35474C7.34047 4.16437 7.34047 5.48165 6.5086 6.2912Z"
                            fill="#7B549E"/>
                    </svg>
                    @lang('general.weInMap')</a>
            </div>
            <div class="contacts__btn">
                <a href="#" class="c-modal" data-page="{{$page->title}}">@lang('general.feedbackBtn')</a>
            </div>
        </div>
    </section>
    <!-- Contacts end -->
    <!-- Doctors start -->
    <section class="doctors container">
        <div class="doctors__title title-main fl-center">
            <img src="/img/icons/doctor-icon.svg" alt="contacts">
            <span>{{$pages['docs']->first()->title}}</span>
        </div>
        <div class="doctors__content">
            @foreach($docs as $doc)
                <a href="{{route('doctors.show',[$doc->slug])}}" class="doctors__item">
                    <picture>
                        <source srcset="{{$doc->webpImage}}" type="image/webp"/>
                        <source srcset="{{\Voyager::image($doc->image)}}" type="image/jpg"/>
                        <img src="{{\Voyager::image($doc->image)}}" class="item__photo"
                             alt="{{$doc->spec}}">
                    </picture>
                    <div class="item__title">{{explode(' ',$doc->name)[0].' '.explode(' ',$doc->name)[1]}}<br>{{explode(' ',$doc->name)[2]}}</div>
                    <div class="item__subtitle">{{$doc->spec}}</div>
                </a>
            @endforeach
        </div>
        <div class="doctors__btn">
            <a href="{{route('doctors.index')}}" class="btn-watch">@lang('general.showAll')</a>
        </div>
    </section>
    <!-- Doctors end -->
    <!-- News block start -->
    <section class="news">
        <div class="news__top">
            <div class="container">
                <div class="news__title title-main fl-center">
                    <img src="/img/icons/news-icon.svg" alt="icon">
                    <span>@lang('general.pressCenter')</span>
                </div>
            </div>
        </div>
        <div class="news__bottom container">
            <div class="news__content">
                @php($corpSlug = \App\Models\Page::where('type','corporate')->first()->slug)
                <div class="news__left w-bl">
                    <div class="left__title news__subtitle"><a href="{{route('pages.get',$corpSlug)}}">@lang('general.corpSection')</a></div>
                    <div class="left__content ">
                        <div class="left__news">
                            @foreach($news as $post)
                                <a href="{{route('corporate.post',[$corpSlug, $post->slug])}}"
                                   class="left__item news__item">
                                    <picture>
                                        <source srcset="{{$post->webpImage}}" type="image/webp"/>
                                        <source srcset="{{\Voyager::image($post->image)}}" type="image/jpg"/>
                                        <img src="{{\Voyager::image($post->image)}}"
                                             alt="{{$post->seo_title}}">
                                    </picture>
                                    <div class="item__text">
                                        <div class="item__title">{{$post->title}}</div>
                                        <div class="item__subtitle">{{Str::limit($post->excerpt,120,'...')}}</div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <a href="{{route('pages.get',$corpSlug)}}" class="news-link">@lang('general.openCorpSection')
                            <svg width="11"
                                 height="8" viewbox="0 0 11 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.3536 4.35355C10.5488 4.15829 10.5488 3.84171 10.3536 3.64645L7.17157 0.464466C6.97631 0.269204 6.65973 0.269204 6.46447 0.464466C6.2692 0.659728 6.2692 0.976311 6.46447 1.17157L9.29289 4L6.46447 6.82843C6.2692 7.02369 6.2692 7.34027 6.46447 7.53553C6.65973 7.7308 6.97631 7.7308 7.17157 7.53553L10.3536 4.35355ZM0 4.5H10V3.5H0V4.5Z"
                                    fill="#EA5C10"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="news__right w-bl">
                    @php($saleSlug = \App\Models\Page::where('type','sales')->first()->slug)
                    <div class="right__title news__subtitle"><a href="{{route('pages.get',$saleSlug)}}">@lang('general.salesSection')</a></div>
                    <div class="right__content">
                        <div class="right__news">
                            @foreach($sales as $sale)
                                <a href="{{route('sales.show',$sale->slug)}}" class="right__item news__item">
                                    <picture>
                                        <source srcset="{{$sale->webpImage}}" type="image/webp"/>
                                        <source srcset="{{\Voyager::image($sale->image)}}" type="image/jpg"/>
                                        <img src="{{\Voyager::image($sale->image)}}"
                                             alt="{{$sale->title}}">
                                    </picture>
                                    <div class="item__text">
                                        <div class="item__title">{{$sale->title}}</div>
                                        <div class="item__subtitle">{{$sale->excerpt}}</div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <a href="{{route('pages.get',$saleSlug)}}" class="news-link">@lang('general.openSalesSection')
                            <svg width="11" height="8"
                                 viewbox="0 0 11 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.3536 4.35355C10.5488 4.15829 10.5488 3.84171 10.3536 3.64645L7.17157 0.464466C6.97631 0.269204 6.65973 0.269204 6.46447 0.464466C6.2692 0.659728 6.2692 0.976311 6.46447 1.17157L9.29289 4L6.46447 6.82843C6.2692 7.02369 6.2692 7.34027 6.46447 7.53553C6.65973 7.7308 6.97631 7.7308 7.17157 7.53553L10.3536 4.35355ZM0 4.5H10V3.5H0V4.5Z"
                                    fill="#EA5C10"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- News block end -->
    <!-- Media gallery start -->
    <section class="gallery">
        <div class="gallery__top">
            <div class="container">
                <div class="gallery__title title-main fl-center">
                    <img src="/img/icons/gallery-icon.svg" alt="image">
                    <span>@lang('general.galleryTitle')</span>
                </div>
            </div>
        </div>
        <div class="gallery__bottom">
            <div class="gallery__slider container">
                @foreach($galleries as $gallery)
                    <a href="{{Voyager::image($gallery->image)}}" class="gallery__item fb-item"
                       data-fancybox="gallery-{{$gallery->id}}"
                       data-caption="{{$gallery->title}}"
                       style="background:url('{{Voyager::image($gallery->thumbic)}}') center center/cover no-repeat">
                        <div class="item__icon">
                            <img src="/img/icons/gallery-pic-icon.svg" alt="icon">
                        </div>
                        <div class="item__text">{{$gallery->title}}</div>
                        <div class="bl-block"></div>
                        <div class="hidden-images">
                            @foreach(json_decode($gallery->images) as $img)
                                <img src="{{Voyager::image($img)}}" data-caption="{{$gallery->title}}"
                                     data-fancybox="gallery-{{$gallery->id}}" alt="{{$gallery->title}}">
                            @endforeach
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Media gallery end -->
    <!-- Method start -->
    <section class="method">
        <div class="method__slider">
            <div class="method__item"
                 style="background: url('../img/method-slider-img1.jpg') center center/cover no-repeat;">
                <div class="item__shell">
                    <div class="method__title">@lang('general.methodicTitle')</div>
                    <div class="method__descr">@lang('general.methodicText')</div>
                    <a href="{{route('pages.get','metodiki')}}" class="method__btn">@lang('general.learnMore')</a>
                </div>
            </div>
            @foreach($methodics as $methodic)
                <div class="method__item"
                     style="background: url('{{Voyager::image($methodic->image)}}') center center/cover no-repeat;">
                    <div class="item__shell">
                        <div class="method__title">{{$methodic->title}}</div>
                        <div class="method__descr">{{$methodic->excerpt}}</div>
                        <a href="{{route('pages.get','metodiki')}}" class="method__btn">@lang('general.learnMore')</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- Method end -->
@endsection
