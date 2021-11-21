@extends('partials.layout')
@section('page_title',__('general.cartTitle'))
@section('seo_title', __('general.cartTitle'))
@section('meta_keywords',__('general.cartTitle'))
@section('meta_description', __('general.cartTitle'))
@section('image','')
@section('url',url()->current())
@section('page_class','page')
@section('content')
    <div class="container-hc">
        <div class="bread">
            @include('partials.breadcrumbs',['title'=>__('general.cartTitle')])
        </div>
        <div class="d-flex j-c-s-b">
            <div class="title-main">
                <img src="/img/icons/cart-icon.svg" alt="note">
                <h3>@lang('general.cartTitle')</h3>
            </div>
            
            <a href="" class="btn-request" onclick="javascript:history.back(); return false;">Назад</a>
        </div>
        <section class="cart__content">
            <div class="cart__content__header">
                <p>@lang('general.chosenAnalyzes')</p>
                <p>@lang('general.price')</p>
            </div>
            <cart-items
                unit="@lang('general.unit')"
                total-text="@lang('general.cartTotalText')"
                price-text="@lang('general.price')"
                empty-text="@lang('general.cartEmpty')"
                print-text="@lang('general.printText')"
                clear-text="@lang('general.clearText')"
            ></cart-items>
        </section>
    </div>
@endsection
