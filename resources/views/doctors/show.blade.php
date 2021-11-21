@extends('partials.layout')
@section('page_title',(strlen($doctor->name) > 1 ? $doctor->name : ''))
@section('seo_title', (strlen($doctor->seo_title) > 1 ? $doctor->seo_title : ''))
@section('meta_keywords',(strlen($doctor->meta_keywords) > 1 ? $doctor->meta_keywords : ''))
@section('meta_description', (strlen($doctor->meta_description) > 1 ? $doctor->meta_description : ''))
@section('image',$doctor->thumbic)
@section('url',url()->current())
@section('page_class','page')
@section('content')
    <div class="container-hc">
        <div class="bread">
            <ul>
                <li><a href="/">@lang('general.home')</a></li>
                <span><img src="/img/icons/bread-arrow-icon.svg" alt="arrow"></span>
                <li><a href="{{route('pages.get',$page->slug)}}">{{$page->title}}</a></li>
                <span><img src="/img/icons/bread-arrow-icon.svg" alt="arrow"></span>
                <li>
                    @foreach($doctor->specialities as $spec)
                        <a href="{{route('doctors.spec',$spec->slug)}}">{{$spec->title}}</a>@if(!$loop->last) , @endif
                    @endforeach
                </li>
                <span><img src="/img/icons/bread-arrow-icon.svg" alt="arrow"></span>
                <li class="current"><span>{{$doctor->name}}</span></li>
            </ul>
        </div>
        <section class="docs-card">
            <div class="docs-card__content">
                <div class="docs-card__hidden-title">
                    <div class="docs-card__title">{{$doctor->name}}</div>
                    <div class="docs-card__subtitle">
                        @foreach($doctor->specialities as $spec)
                            <a href="{{route('doctors.spec',$spec->slug)}}">{{$spec->title}}@if(!$loop->last) , @endif</a>
                        @endforeach
                    </div>
                </div>
                <div class="docs-card__left">
                    <picture>
                        <source srcset="{{$doctor->webpImage}}" type="image/webp"/>
                        <source srcset="{{\Voyager::image($doctor->image)}}" type="image/jpg"/>
                        <img src="{{\Voyager::image($doctor->image)}}" alt="{{$doctor->spec .' - '.$doctor->name}}">
                    </picture>
                </div>
                <div class="docs-card__right">
                    <div class="docs-card__title mobile-none">{{$doctor->name}}</div>
                    <div class="docs-card__subtitle mobile-none">
                        @foreach($doctor->specialities as $spec)
                            <a href="{{route('doctors.spec',$spec->slug)}}">{{$spec->title}}@if(!$loop->last) , @endif</a>
                        @endforeach
                    </div>
                    <div class="docs-card__info">{!! $doctor->content !!}</div>
                    <div
                        class="docs-card__info @if($doctor->second_price && $doctor->second_price > 0)  d-flex flex-direction-column @endif">
                        <div class="docs-card__price">
                            <svg width="32" height="37" viewbox="0 0 32 37" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M21.9334 25.5435H10.0661C9.4542 25.5435 8.95813 26.0288 8.95813 26.6274C8.95813 27.2261 9.4542 27.7114 10.0661 27.7114H21.9334C22.5453 27.7114 23.0414 27.2261 23.0414 26.6274C23.0414 26.0288 22.5453 25.5435 21.9334 25.5435Z"
                                    fill="#9F9F9F"/>
                                <path
                                    d="M29.0543 0H2.94609C2.3342 0 1.83813 0.485335 1.83813 1.08398V32.723C1.83813 33.0104 1.95491 33.2861 2.16269 33.4895L5.42628 36.6825C5.85889 37.1058 6.56045 37.1058 6.99314 36.6825L9.47326 34.256L11.9533 36.6825C12.1611 36.8857 12.4429 37 12.7368 37C13.0306 37 13.3125 36.8858 13.5202 36.6825L16.0002 34.256L18.4803 36.6825C18.6881 36.8857 18.9699 37 19.2637 37C19.5576 37 19.8394 36.8857 20.0472 36.6825L22.5272 34.256L25.0073 36.6825C25.2237 36.8941 25.5072 37 25.7907 37C26.0743 37 26.3579 36.8942 26.5742 36.6825L29.8378 33.4895C30.0456 33.2862 30.1623 33.0104 30.1623 32.723V1.08398C30.1623 0.485335 29.6663 0 29.0543 0ZM25.7907 34.383L23.3106 31.9565C23.1028 31.7532 22.821 31.639 22.5272 31.639C22.2332 31.639 21.9515 31.7532 21.7437 31.9565L19.2636 34.383L16.7835 31.9565C16.3509 31.5332 15.6494 31.5332 15.2167 31.9565L12.7365 34.383L10.2565 31.9565C10.0487 31.7532 9.76694 31.639 9.47303 31.639C9.17921 31.639 8.89742 31.7532 8.68964 31.9565L6.20952 34.383L4.05389 32.274V2.16796H27.9463V32.274H27.9464L25.7907 34.383Z"
                                    fill="#9F9F9F"/>
                                <path
                                    d="M11.7286 7.915H19.8136V9.805H11.7286V7.915ZM16.9036 18.625H14.6386V12.745H11.7286V10.855H19.8136V12.745H16.9036V18.625Z"
                                    fill="#9F9F9F"/>
                            </svg>
                            <div class="docs-card__price-info">
                                <div class="price-info__title">@lang('general.priceFirst')</div>
                                <div class="price-info__numbers">
                                    {{number_format($doctor->price,0,'',' ')}} @lang('general.unit')
                                </div>
                            </div>
                        </div>
                        @if($doctor->second_price && $doctor->second_price > 0)
                            <div class="docs-card__price">
                                <svg width="32" height="37" viewbox="0 0 32 37" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21.9334 25.5435H10.0661C9.4542 25.5435 8.95813 26.0288 8.95813 26.6274C8.95813 27.2261 9.4542 27.7114 10.0661 27.7114H21.9334C22.5453 27.7114 23.0414 27.2261 23.0414 26.6274C23.0414 26.0288 22.5453 25.5435 21.9334 25.5435Z"
                                        fill="#9F9F9F"/>
                                    <path
                                        d="M29.0543 0H2.94609C2.3342 0 1.83813 0.485335 1.83813 1.08398V32.723C1.83813 33.0104 1.95491 33.2861 2.16269 33.4895L5.42628 36.6825C5.85889 37.1058 6.56045 37.1058 6.99314 36.6825L9.47326 34.256L11.9533 36.6825C12.1611 36.8857 12.4429 37 12.7368 37C13.0306 37 13.3125 36.8858 13.5202 36.6825L16.0002 34.256L18.4803 36.6825C18.6881 36.8857 18.9699 37 19.2637 37C19.5576 37 19.8394 36.8857 20.0472 36.6825L22.5272 34.256L25.0073 36.6825C25.2237 36.8941 25.5072 37 25.7907 37C26.0743 37 26.3579 36.8942 26.5742 36.6825L29.8378 33.4895C30.0456 33.2862 30.1623 33.0104 30.1623 32.723V1.08398C30.1623 0.485335 29.6663 0 29.0543 0ZM25.7907 34.383L23.3106 31.9565C23.1028 31.7532 22.821 31.639 22.5272 31.639C22.2332 31.639 21.9515 31.7532 21.7437 31.9565L19.2636 34.383L16.7835 31.9565C16.3509 31.5332 15.6494 31.5332 15.2167 31.9565L12.7365 34.383L10.2565 31.9565C10.0487 31.7532 9.76694 31.639 9.47303 31.639C9.17921 31.639 8.89742 31.7532 8.68964 31.9565L6.20952 34.383L4.05389 32.274V2.16796H27.9463V32.274H27.9464L25.7907 34.383Z"
                                        fill="#9F9F9F"/>
                                    <path
                                        d="M11.7286 7.915H19.8136V9.805H11.7286V7.915ZM16.9036 18.625H14.6386V12.745H11.7286V10.855H19.8136V12.745H16.9036V18.625Z"
                                        fill="#9F9F9F"/>
                                </svg>
                                <div class="docs-card__price-info">
                                    <div class="price-info__title">@lang('general.priceSecond')</div>
                                    <div class="price-info__numbers">
                                        {{number_format($doctor->second_price,0,'',' ')}} @lang('general.unit')
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <a href="#" class="docs-card__btn btn-request c-modal mobile-link-change"
                       data-page="{{$doctor->name}}">@lang('general.signup')</a>
                </div>
            </div>
        </section>
    </div>
@endsection
