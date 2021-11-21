@extends('partials.layout')
@section('page_title', __('general.pageNotFound'))
@section('seo_title', __('general.pageNotFound'))
@section('meta_keywords',__('general.pageNotFound'))
@section('meta_description', __('general.pageNotFound'))
@section('image',env('APP_URL').'/images/og.jpg')
@section('url',url()->current())
@section('page_class','page')
@section('content')
    <div class="container-hc">
        <section class="error-page">
            <h1 class="main-text">404</h1>
            <p>@lang('general.dearUser')</p>
            <br>
            <p>@lang('general.notFoundTitle')</p>
            <p>@lang('general.notFoundText')</p>
            <br>
            <a href="/" class="btn-request">@lang('general.backToHome')</a>
        </section>
    </div>
@endsection
