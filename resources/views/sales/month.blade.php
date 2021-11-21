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
            @if($daySaleExistance)
                <a href="{{route('sales.index')}}" class="stock__menu-btn">@lang('general.salesOfDay')</a>
            @endif
            <a href="#" class="stock__menu-btn stock__menu-btn_active">@lang('general.salesOfMonth')</a>
        </section>
        <section class="stock__info-items">
            @foreach($sales as $sale)
                <a href="{{route('sales.show',$sale->slug)}}" class="stock__item-card">
                    <picture>
                        <source srcset="{{$sale->webpImage}}" type="image/webp"/>
                        <source srcset="{{\Voyager::image($sale->image)}}" type="image/jpg"/>
                        <img src="{{\Voyager::image($sale->image)}}"
                             alt="{{$sale->seo_title}}">
                    </picture>
                    <div class="stock__item-card_title">{{$sale->title}}</div>
                </a>
            @endforeach
        </section>
    </div>
@endsection
