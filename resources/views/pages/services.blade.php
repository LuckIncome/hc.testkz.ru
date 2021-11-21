@extends('partials.layout')
@section('page_title',(!is_null($serviceType) && strlen($serviceType->title) > 1 ? $serviceType->title : __('general.allServices')))
@section('seo_title', (!is_null($serviceType) && strlen($serviceType->seo_title) > 1 ? $serviceType->seo_title : __('general.allServices')))
@section('meta_keywords',(!is_null($serviceType) && strlen($serviceType->meta_keywords) > 1 ? $serviceType->meta_keywords :__('general.allServices')))
@section('meta_description', (!is_null($serviceType) && strlen($serviceType->meta_description) > 1 ? $serviceType->meta_description : __('general.allServices')))
@section('image',$page->thumbic)
@section('url',url()->current())
@section('page_class','page')
@section('content')
    <div class="container-hc">
        <div class="bread">
            @include('partials.breadcrumbs',['title'=>$page->title,'titleLink'=>route('pages.get',$page->slug),'subtitle'=> !is_null($serviceType)? $serviceType->title : __('general.allServices')])
        </div>
        <div class="title-main">
            <img src="/img/icons/cross-links-icon.svg" alt="cross">
            <h3>{{(!is_null($serviceType) ? $page->title.' - '. $serviceType->title : __('general.allServices')) }}</h3>
        </div>
        <section class="analyses-all">
            <form action="{{route('services.type')}}" method="GET" class="services-inner__search page__search">
                <input type="text" name="search" value="{{$searchTerm}}" placeholder="@lang('general.servicePlaceholder')">
                <button type="submit" class="search__btn btn-watch">@lang('general.search')</button>
                <button type="submit" class="search__hidden-btn">
                    <svg width="15" height="15" viewbox="0 0 15 15" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M14.7719 13.6626L11.0742 9.94962C12.0249 8.85844 12.5459 7.48552 12.5459 6.05624C12.5459 2.71688 9.73177 0 6.27293 0C2.81409 0 0 2.71688 0 6.05624C0 9.3956 2.81409 12.1125 6.27293 12.1125C7.57143 12.1125 8.80883 11.7344 9.86677 11.0166L13.5926 14.7577C13.7484 14.9139 13.9578 15 14.1823 15C14.3947 15 14.5963 14.9218 14.7493 14.7796C15.0744 14.4776 15.0848 13.9768 14.7719 13.6626ZM6.27293 1.57989C8.82956 1.57989 10.9094 3.58793 10.9094 6.05624C10.9094 8.52456 8.82956 10.5326 6.27293 10.5326C3.7163 10.5326 1.63642 8.52456 1.63642 6.05624C1.63642 3.58793 3.7163 1.57989 6.27293 1.57989Z"
                            fill="#EA5C10"/>
                    </svg>
                </button>
            </form>
            <div class="analyses-all__hidden-btn">
                @lang('general.filter')
                <svg width="14" height="14" viewbox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0)">
                        <path
                            d="M5.33237 6.61554C5.47929 6.77542 5.55995 6.98427 5.55995 7.20033V13.5667C5.55995 13.9498 6.0223 14.1443 6.29596 13.8749L8.07192 11.8397C8.30957 11.5545 8.44065 11.4133 8.44065 11.1311V7.20177C8.44065 6.98572 8.52274 6.77686 8.66822 6.61697L13.7642 1.08747C14.1459 0.672645 13.852 0 13.2874 0H0.713153C0.148536 0 -0.146736 0.671205 0.236397 1.08747L5.33237 6.61554Z"
                            fill="#EA5C10"/>
                    </g>
                    <defs>
                        <clippath id="clip0111">
                            <rect width="14" height="14" fill="white"/>
                        </clippath>
                    </defs>
                </svg>
            </div>
            <div class="analyses-all__content">
                <ul class="nav nav-tabs analyses-all__left" data-mcs-theme="dark" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link @if(is_null($serviceType)) active @endif"
                           href="{{route('services.type','all')}}">@lang('general.allServices')
                        </a>
                    </li>
                    @foreach($serviceTypes as $srvType)
                        <li class="nav-item">
                            <a class="nav-link @if(!is_null($serviceType) && $serviceType->id === $srvType->id) active @endif"
                               href="{{route('services.type',$srvType->slug)}}">{{$srvType->title}}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content analyses-all__right" id="myTabContent">
                    <div id="acc">
                        @foreach($services as $service)
                            <div class="card">
                                <div class="card-header" id="h{{$service->id}}">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#tab{{$service->id}}"
                                                aria-expanded="false" aria-controls="tab{{$service->id}}">
                                            <div class="acc-arr">
                                                <svg width="13" height="13" viewbox="0 0 13 13" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <rect x="12.728" y="6.36426" width="1.5" height="8.99984"
                                                          rx="0.75" transform="rotate(135 12.728 6.36426)"
                                                          fill="#EA5C10"/>
                                                    <rect x="6.36377" y="12.728" width="1.49997" height="9"
                                                          rx="0.749987" transform="rotate(-135 6.36377 12.728)"
                                                          fill="#EA5C10"/>
                                                </svg>
                                            </div>
                                            <span>{{$service->title}}</span>
                                        </button>
                                    </h5>
                                </div>

                                <div id="tab{{$service->id}}" class="collapse" aria-labelledby="h{{$service->id}}" data-parent="#acc">
                                    <div class="card-body">
                                        <div class="services-inner__info">
                                            <picture>
                                                <img src="/img/icons/services-inner-invoice-icon.svg" alt="icon">
                                            </picture>
                                            <div class="info__price">
                                                <span>@lang('general.price')</span>
                                                <span class="info__qty">{{number_format($service->price,0,'',' ')}} @lang('general.unit')</span>
                                            </div>
                                            <a href="#" class="btn-request c-modal mobile-link-change" data-page="{{$service->title}}">@lang('general.signup')</a>
                                        </div>
                                        <div class="services-inner__text">{!! $service->content !!}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
