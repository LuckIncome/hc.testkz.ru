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
        <div class="title-main">
            <img src="/img/icons/syringe-links-icon.svg" alt="syringe">
            <h3>{{$page->title}}</h3>
        </div>
        <section class="analyses-inner">
            <form action="{{route('analyzes.research','top')}}" method="GET" class="analyses-inner__search page__search">
                <input type="text" name="search" value="{{$searchTerm}}" placeholder="@lang('general.searchAnalizes')">
                <button type="submit" class="search__btn btn-watch">@lang('general.search')</button>
                <button type="submit" class="search__hidden-btn">
                    <svg width="15" height="15" viewbox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M14.7719 13.6626L11.0742 9.94962C12.0249 8.85844 12.5459 7.48552 12.5459 6.05624C12.5459 2.71688 9.73177 0 6.27293 0C2.81409 0 0 2.71688 0 6.05624C0 9.3956 2.81409 12.1125 6.27293 12.1125C7.57143 12.1125 8.80883 11.7344 9.86677 11.0166L13.5926 14.7577C13.7484 14.9139 13.9578 15 14.1823 15C14.3947 15 14.5963 14.9218 14.7493 14.7796C15.0744 14.4776 15.0848 13.9768 14.7719 13.6626ZM6.27293 1.57989C8.82956 1.57989 10.9094 3.58793 10.9094 6.05624C10.9094 8.52456 8.82956 10.5326 6.27293 10.5326C3.7163 10.5326 1.63642 8.52456 1.63642 6.05624C1.63642 3.58793 3.7163 1.57989 6.27293 1.57989Z"
                            fill="#EA5C10"/>
                    </svg>
                </button>
            </form>
            <div class="analyses-inner__content">
                <ul class="analyses-inner__list">
                    @foreach($researches as $research)
                        <li class="list__item"><a href="{{route('analyzes.research',$research->slug)}}">{{$research->title}}</a></li>
                    @endforeach
                    <a href="{{route('analyzes.research','top')}}" class="watch-all-btn">@lang('general.showAll')</a>
                </ul>
            </div>
        </section>
    </div>
@endsection
