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
            @include('partials.breadcrumbs',['title'=>$page->title])
        </div>
        <div class="title-main corporate-title">
            <h3>{{$page->title}}</h3>
        </div>
        <section class="stock__menu">
            <a href="#" class="stock__menu-btn stock__menu-btn_active">@lang('general.salesOfDay')</a>
            <a href="{{route('sales.month')}}" class="stock__menu-btn">@lang('general.salesOfMonth')</a>
        </section>
    </div>
    @foreach($sales as $sale)
        <section class="stock__info-item">
            <div class="stock__info-head">
                <div class="stock__info-bg">
                    <div class="container-hc">
                        <div class="stock__info-title">{{$sale->title}}</div>
                        <div class="stock__info-text">{{$sale->excerpt}}</div>
                        <a class="stock__info-btn btn-request mobile-link-change">@lang('general.signup')</a>
                    </div>
                </div>
            </div>
            <div class="container-hc">
                <div class="stock__info-body">
                    <div class="stock__info-body_content">
                        {!! $sale->content_1 !!}
                        <div class="stock__info-body_price">
                            <img src="/img/invoice.png" alt="">
                            <div>
                                <span>@lang('general.price')</span>
                                <h3>{{number_format($sale->price,0,'',' ')}} @lang('general.unit')</h3>
                            </div>
                        </div>
                    </div>
                    <div class="stock__info-body_content">
                        {!! $sale->content_2 !!}
                        <div class="stock__info-btn_block">
                            <a class="stock__info-body-btn btn-request">@lang('general.feedbackBtn')</a>
                            @if(strlen($sale->file) > 1 && !empty(json_decode($sale->file)))
                                <a href="{{Voyager::image(json_decode($sale->file)[0]->download_link)}}"
                                   class="stock__info-body-downlod" download>@lang('general.salesTerm')
                                    <svg width="16" height="14" viewbox="0 0 16 14" fill="none"
                                                                                       xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M14.8555 8.99994C14.5399 8.99994 14.2841 9.2238 14.2841 9.49995V12.4999C14.2841 12.7761 14.0283 13 13.7127 13H2.28414C1.96854 13 1.7127 12.7761 1.7127 12.4999V9.49995C1.7127 9.2238 1.45687 8.99994 1.14126 8.99994C0.825661 8.99994 0.569824 9.2238 0.569824 9.49995V12.4999C0.569824 13.3284 1.33733 13.9999 2.28411 13.9999H13.7127C14.6595 13.9999 15.427 13.3284 15.427 12.4999V9.49995C15.427 9.2238 15.1711 8.99994 14.8555 8.99994Z"
                                            fill="#EA5C10"/>
                                        <path
                                            d="M11.2479 8.6465C11.0265 8.45938 10.6754 8.45938 10.454 8.6465L8.57113 10.293V0.500009C8.57113 0.223857 8.31529 0 7.99969 0C7.68409 0 7.42825 0.223857 7.42825 0.500009V10.293L5.54653 8.6465C5.31952 8.45466 4.95778 8.46017 4.73854 8.65877C4.52465 8.85254 4.52465 9.15972 4.73854 9.35349L7.59566 11.8535C7.81855 12.049 8.18036 12.0494 8.40378 11.8544C8.40412 11.8541 8.40445 11.8538 8.40482 11.8535L11.2619 9.35349C11.4812 9.15486 11.4749 8.83833 11.2479 8.6465Z"
                                            fill="#EA5C10"/>
                                    </svg></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
@endsection
