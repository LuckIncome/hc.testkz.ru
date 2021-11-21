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
            @include('partials.breadcrumbs',['title'=>(strlen($page->seo_title) > 1 ? $page->seo_title : '')])
        </div>
        <div class="title-main about-inner">
            <img src="/img/icons/about-house-icon.svg" alt="house">
            <h3>{{$page->title}}</h3>
        </div>
    </div>
    <section class="about-inner">
        <div class="about-inner__slider">
            @foreach($aboutSliders as $slider)
                <div class="about-inner__item"
                     style="background:url('{{Voyager::image($slider->image)}}') center center/cover no-repeat;">
                    <div class="h-elem"></div>
                    <div class="container-hc">
                        <div class="item__content">
                            <div class="item__title">{{$slider->title}}</div>
                            <div class="item__subtitle">{{$slider->text}}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section class="about-inner__numbers">
        <div class="container-hc">
            @foreach($numbers as $number)
                <div class="numbers__item">
                    <picture>
                        <img src="{{Voyager::image($number->icon)}}" alt="{{str_replace('<br>',' ', $number->title)}}">
                    </picture>
                    <div class="numbers__title">{!! $number->title !!}</div>
                </div>
            @endforeach
        </div>
    </section>
    <section class="about-inner__info">
        <div class="h-elem"></div>
        <div class="container-hc">
            <div class="about-inner__info-content">
                <hr>
                <div class="info__text">{!! $page->body !!}</div>
{{--                <a href="#" class="info__btn">@lang('general.more')</a>--}}
            </div>

        </div>

    </section>
    <section class="about-inner__services">
        <div class="container-hc">
            @foreach($advantages as $adv)
                <div class="services__item">
                    <div class="services__title">
                        <picture>
                            <img src="{{Voyager::image($adv->icon)}}" alt="{{str_replace('<br>',' ', $adv->title)}}">
                        </picture>
                        <span>{!! $adv->title !!}</span>
                    </div>
                    <div class="services__text">{!! $adv->text !!}</div>
                </div>
            @endforeach
        </div>
    </section>
    <section class="about-inner__certificates">
        <div class="container-hc">
            <div class="about-inner__certificates-title">@lang('general.certificates')</div>
            <div class="about-inner__certificates-slider">
                @foreach(json_decode($certificateInstance->images) as $certificate)
                    <a href="{{Voyager::image($certificate)}}" data-fancybox="gallery" data-caption="Certificates"
                       class="about-inner__certificates-item">
                        <picture>
                            <source srcset="{{$certificateInstance->getWebpThumb($certificate)}}" type="image/webp"/>
                            <source srcset="{{\Voyager::image($certificateInstance->getThumbnail($certificate,'small'))}}" type="image/jpg"/>
                            <img src="{{\Voyager::image($certificateInstance->getThumbnail($certificate,'small'))}}" alt="Certificate">
                        </picture>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    <section class="about-inner__info-bottom">
        <div class="h-elem"></div>
        <div class="container-hc">
            <div class="about-inner__info-bottom__content">
                <hr>
                <div class="about-inner__info-bottom__text">{{$page->excerpt}}</div>
            </div>
        </div>
    </section>
@endsection
