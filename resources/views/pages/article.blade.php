@extends('partials.layout')
@section('page_title',(strlen($post->title) > 1 ? $post->title : ''))
@section('seo_title', (strlen($post->seo_title) > 1 ? $post->seo_title : ''))
@section('meta_keywords',(strlen($post->meta_keywords) > 1 ? $post->meta_keywords : ''))
@section('meta_description', (strlen($post->meta_description) > 1 ? $post->meta_description : ''))
@section('image',$post->thumbic)
@section('url',url()->current())
@section('page_class','page')
@section('content')
    <div class="container-hc">
        <div class="bread">
            @include('partials.breadcrumbs',['title'=>$page->title,'titleLink'=>route('pages.get',$page->slug),'subtitle'=> $post->title])
        </div>
        <div class="title-main corporate-title">
            <h3>{{$post->title}}</h3>
        </div>
        <section class="corporate__article-info">
            <div class="body">
                <picture>
                    <source srcset="{{$post->webpImage}}" type="image/webp"/>
                    <source srcset="{{\Voyager::image($post->image)}}" type="image/jpg"/>
                    <img src="{{\Voyager::image($post->image)}}" alt="{{$post->seo_title}}">
                </picture>
                {!! $post->body !!}
            </div>
        </section>
        <section class="corporate__news">
            <div class="corporate__news-header">@lang('general.readMore')</div>
            <div class="corporate__news-slider">
                @foreach($otherPosts as $otherPost)
                    <div class="corporate__news-slider__item">
                        <picture>
                            <source srcset="{{$otherPost->webpImage}}" type="image/webp"/>
                            <source srcset="{{\Voyager::image($otherPost->image)}}" type="image/jpg"/>
                            <img src="{{\Voyager::image($otherPost->image)}}" alt="{{$otherPost->seo_title}}">
                        </picture>
                        <a href="{{route('corporate.post',[$page->slug,$otherPost->slug])}}">{{$otherPost->title}}</a>
                        <span>{{Str::limit($post->excerpt,120,'...')}}</span>
                    </div>
                @endforeach
            </div>
        </section>

        <section class="corporate__mailing">
            <div class="corporate__mailing-title">@lang('general.subscribeTitle')</div>
            <div class="corporate__mailing-text">@lang('general.subscribeText')</div>
            <form action="" class="corporate__mailing-from">
                <input type="text" placeholder="E-mail">
                <a class="corporate__mailing-btn btn-request">@lang('general.subscribe')</a>
            </form>
        </section>
    </div>
@endsection
