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

    </div>
    <section class="contacts-inner">
        <div class="container">
            <div class="title-main ">
                <img src="/img/icons/phone-contacts-icon.svg" alt="phone">
                <h3>{{$page->title}}</h3>
            </div>
            <div class="contacts-inner__content">
                <div class="contacts-inner__map-block__mobile">
                    <ul>
                            <span>@lang('general.address')</span>
                        <li class="address">{{$address->value}}</li>
                        <span class="phone-icon">@lang('general.phone')</span>
                        @foreach($phones as $phone)
                            <li class="phone"><a href="{{$phone->link}}">{{$phone->value}}</a></li>
                        @endforeach
                        <span class="email-icon">E-mail</span>
                        <li class="email"><a href="{{$email->link}}">{{$email->value}}</a></li>
                    </ul>
                </div>
                <div class="contacts-inner__map">
                    {!! $map->value !!}
                    <div class="contacts-inner__map-block">
                        <ul>
                            <span>@lang('general.address')</span>
                            <li class="address">{{$address->value}}</li>
                            <span class="phone-icon">@lang('general.phone')</span>
                            @foreach($phones as $phone)
                                <li class="phone"><a href="{{$phone->link}}">{{$phone->value}}</a></li>
                            @endforeach
                            <span class="email-icon">E-mail</span>
                            <li class="email"><a href="{{$email->link}}">{{$email->value}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="contacts-inner__feed">
                    <div class="title-main">
                        <img src="/img/icons/contacts-feed-icon.svg" alt="feed">
                        <h3>@lang('general.feedbackTitle')</h3>
                    </div>
                    <div class="contacts-inner__feed-content">
                        <div class="feed__left">
                            <picture>
                                <img src="/img/contacts-bottom-img.png" alt="image">
                            </picture>
                            <div class="feed__left-title">
                                @lang('general.qualityControl')
                            </div>
                            <p>@lang('general.feedbackText')</p>
                        </div>
                        <div class="feed__right">
                            <form action="{{route('feedback.inline')}}" method="POST">
                                @csrf
                                <div class="form-item">
                                    <span>@lang('general.yourFullName')</span>
                                    <input name="name" required type="text">
                                </div>
                                <div class="form-item"><span>@lang('general.yourEmail')</span>
                                    <input name="email" type="email">
                                </div>
                                <div class="form-item">
                                    <span>@lang('general.yourPhone')</span>
                                    <input name="phone" required type="tel"><br>
                                </div>
                                <div class="form-item">
                                    <span>@lang('general.yourComment')</span>
                                    <textarea name="comments" id="" cols="30" rows="10"></textarea>
                                </div>
                                <div class="form-item">
                                    <span></span>
                                    <input type="hidden" name="page" value="{{$page->title}}">
                                    <input type="hidden" name="url" value="{{url()->current()}}">
                                    <button type="submit" class="btn-request">@lang('general.sendFeedback')</button>
                                </div>
                            </form>
                            <form action="{{route('feedback.inline')}}" method="POST">
                                @csrf
                                <div class="form-item-mobile">
                                    <input name="name" required type="text" placeholder="@lang('general.name')">
                                </div>
                                <div class="form-item-mobile">
                                    <input name="email" type="email" placeholder="E-mail">
                                </div>
                                <div class="form-item-mobile">

                                    <input name="phone" required type="tel" placeholder="@lang('general.phone')"><br>
                                </div>
                                <div class="form-item-mobile">
                                    <textarea name="comments" id="" cols="30" rows="10"
                                              placeholder="@lang('general.yourComment')"></textarea>
                                </div>
                                <div class="form-item-mobile">
                                    <input type="hidden" name="page" value="{{$page->title}}">
                                    <input type="hidden" name="url" value="{{url()->current()}}">
                                    <button type="submit" class="btn-request">@lang('general.sendFeedback')</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
