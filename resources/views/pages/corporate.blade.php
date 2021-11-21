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
    </div>
    <section class="corporate__consult">
        <div class="corporate__consult-dark">
            <div class="container-hc">
                <h2 class="corporate__consult-title">{{$page->seo_title}}</h2>
                <div class="corporate__consult-items">
                    @foreach($numbers as $number)
                        <div class="item">
                            <picture>
                                <img src="{{Voyager::image($number->icon)}}"
                                     alt="{{str_replace('<br>',' ', $number->title)}}">
                            </picture>
                            <div class="item-title">{!! $number->title !!}</div>
                        </div>
                    @endforeach
                </div>
                <a href="#" class="btn-request c-modal mobile-link-change" data-page="{{$page->title}}">@lang('general.getConsult')</a>
            </div>
        </div>
    </section>
    <div class="corporate-line"></div>
    <section class="corporate__info">
        <div class="container-hc">
            <div class="corporate__info-text">{{$page->excerpt}}</div>
        </div>
    </section>
    <div class="container-hc">
        <div class="corporate-slider-dots">
            @foreach($corpBlocks as $key=>$block)
                <div class="corporate-slider-dots__item @if($loop->first) active @endif"
                     data-index="{{$key}}">{{$block->title}}</div>
            @endforeach
        </div>
        <section class="corporate-info__slider">
            @foreach($corpBlocks as $key=>$block)
                <div class="info__slider-item">
                    <div class="item-header">{{$block->title}}</div>
                    <div class="item-text">{!! $block->text !!}</div>
                    <div class="btn-block">
                        <a href="#" class="btn-watch c-modal mobile-link-change" data-page="{{$block->title}}">@lang('general.getConsult')</a>
                    </div>
                </div>
            @endforeach
        </section>
        <section class="corporate__services">
            @foreach($advantages as $adv)
                <div class="corporate__services-item">
                    <div class="item-top">
                        <picture>
                            <img src="{{Voyager::image($adv->icon)}}" alt="{{str_replace('<br>',' ', $adv->title)}}">
                        </picture>
                        <span>{!! $adv->title !!}</span>
                    </div>
                    <div class="item-bottom">{!! $adv->text !!}</div>
                </div>
            @endforeach
        </section>

        <section class="corporate__news-slider">
            @foreach($news as $post)
                <div class="corporate__news-slider__item">
                    <picture>
                        <source srcset="{{$post->webpImage}}" type="image/webp"/>
                        <source srcset="{{\Voyager::image($post->image)}}" type="image/jpg"/>
                        <img src="{{\Voyager::image($post->image)}}"
                             alt="{{$post->seo_title}}">
                    </picture>
                    <a href="{{route('corporate.post',[$page->slug,$post->slug])}}">{{$post->title}}</a>
                    <span>{{Str::limit($post->excerpt,120,'...')}}</span>
                </div>
            @endforeach
        </section>

        <section class="corporate__mailing">
            <div class="corporate__mailing-title">@lang('general.subscribeTitle')</div>
            <div class="corporate__mailing-text">@lang('general.subscribeText')</div>
            <form id="subscription" action="{{route('subscribe')}}" method="POST" class="corporate__mailing-from">
                @csrf
                <input name="email" required type="email" placeholder="E-mail">
                <button type="submit" class="corporate__mailing-btn btn-request">@lang('general.subscribe')</button>
            </form>
        </section>
        <section class="corporate__video-slider">
            @foreach($videos as $video)
                <div class="corporate__video-slider__item">
                    {!! $video->video !!}
                </div>
            @endforeach
        </section>
        <section class="corporate__feed">
            <div class="title-main">
                <img src="img/icons/contacts-feed-icon.svg" alt="feed">
                <h3>@lang('general.feedbackTitle')</h3>
            </div>
            <div class="contacts-inner__feed-content">
                <div class="feed__left">
                    <picture>
                        <img src="img/contacts-bottom-img.png" alt="image">
                    </picture>
                    <div class="feed__left-title">@lang('general.qualityControl')</div>
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
                            <input required name="phone" type="tel"><br>
                        </div>
                        <div class="form-item">
                            <span>@lang('general.yourComment')</span>
                            <textarea name="comments" id="corporate-message" cols="30" rows="10"></textarea>
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
                            <input name="email" type="text" placeholder="E-mail">
                        </div>
                        <div class="form-item-mobile">
                            <input name="phone" required type="tel" placeholder="@lang('general.phone')"><br>
                        </div>
                        <div class="form-item-mobile">
                            <textarea name="comments" id="corporate-message-mob" cols="30" rows="10"
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
        </section>
        <section class="corporate__brand-slider">
            @foreach($partners as $partner)
                <div class="corporate__brand-slider__item">
                    <picture>
                        <source srcset="{{$partner->webpImage}}" type="image/webp"/>
                        <source srcset="{{\Voyager::image($partner->image)}}" type="image/jpg"/>
                        <img src="{{\Voyager::image($partner->image)}}" alt="{{$partner->title}}">
                    </picture>
                </div>
            @endforeach
        </section>
    </div>
    <section class="corporate__contacts">
        <div class="corporate__contacts-left"></div>
        <div class="corporate__contacts-right">
            <div class="right-title">
                @lang('general.corpContactsTitle')
            </div>
            <ul>
                <li><span class="f-item">@lang('general.address')</span><span
                        class="address-item">{{$address->value}}</span></li>
                <li><span class="f-item">@lang('general.phone')</span>
                    @foreach($phones as $phone)
                        <a href="{{$phone->link}}" class="tel-item">{{$phone->value}}</a>
                    @endforeach
                </li>
                <li><span class="f-item">E-mail</span><a href="{{$email->link}}" class="mail-item">{{$email->value}}</a>
                </li>
            </ul>
        </div>
    </section>
@endsection
