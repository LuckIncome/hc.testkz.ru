<!-- Footer start -->
<footer class="footer">
    <div class="footer__top">
        <div class="container">
            <a href="#">
                <img src="{{Voyager::image(setting('site.footer_logo'))}}" alt="{{setting('site.title')}}">
            </a>
            <a href="#" class="footer__btn btn-white c-modal" data-page="Подвал">@lang('general.contactUs')</a>
        </div>
    </div>
    <div class="footer__middle">
        <div class="container">
            <div class="footer__item">
                <div class="footer__title">@lang('general.aboutUs')</div>
                <ul>
                    <li>
                        <a href="/">@lang('general.home')</a>
                    </li>
                    <li>
                        <a href="{{route('pages.get',$pages['services']->first()->slug)}}">{{$pages['services']->first()->title}}</a>
                    </li>
                    <li>
                        <a href="{{route('pages.get',$pages['docs']->first()->slug)}}">{{$pages['docs']->first()->title}}</a>
                    </li>
                    <li>
                        <a href="{{route('pages.get',$pages['analyzes']->first()->slug)}}">{{$pages['analyzes']->first()->title}}</a>
                    </li>
                    <li>
                        <a href="{{route('pages.get',$pages['checkup']->first()->slug)}}">{{$pages['checkup']->first()->title}}</a>
                    </li>
                    <li>
                        <a href="{{route('pages.get',$pages['about']->first()->slug)}}">{{$pages['about']->first()->title}}</a>
                    </li>
                    <li>
                        <a href="{{route('sales.index')}}">{{$pages['sales']->first()->title}}</a>
                    </li>
                    <li>
                        <a href="{{route('pages.get',$pages['contacts']->first()->slug)}}">{{$pages['contacts']->first()->title}}</a>
                    </li>
                </ul>
            </div>
            <div class="footer__item">
                <div class="footer__title">@lang('general.corpSection')</div>
                <ul>
                    @foreach($news as $post)
                        <li><a href="{{route('corporate.post',[\App\Models\Page::where('type','corporate')->first()->slug,$post->slug])}}">{{$post->title}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="footer__item">
                <div class="footer__title">@lang('general.contacts')</div>
                <ul>
                    <li><a href="{{route('pages.get',$pages['contacts']->first()->slug)}}"><img src="{{Voyager::image($address->icon)}}" alt="{{$address->value}}">{{$address->value}}</a></li>
                    <li>
                        @foreach($phones as $phone)
                            <a href="{{$phone->link}}">
                                @if($loop->first)
                                    <img src="{{Voyager::image($phone->icon)}}" alt="{{$phone->value}}">
                                @endif
                                {{$phone->value}}@if(!$loop->last),@endif
                            </a>
                        @endforeach
                    </li>
                    <li><a href="{{$email->link}}"><img src="{{Voyager::image($email->icon)}}"
                                                        alt="{{$email->value}}">{{$email->value}}</a></li>
                </ul>
            </div>
            <div class="footer__item">
                <a href="{{setting('site.qr_link')}}">
                    <img src="{{Voyager::image(setting('site.qr'))}}" alt="qr-code">
                </a>
            </div>
        </div>
    </div>
    <div class="footer__bottom">
        <div class="container">
            <div class="footer__copyright">{{setting('site.copyrights')}}</div>
            <div class="footer__dev">
                <a href="https://i-marketing.kz" target="_blank"><img src="/img/i-marketing-logo.png" alt="i-marketing"></a>
            </div>
        </div>
    </div>

</footer>
<!-- Footer End -->
<!-- Footer mobile start -->
<section class="footer-mobile">
    <div class="container">`
        <div class="footer-mobile__content">
            <div class="row">
                <a href="/kontakty" class="title-main">{{strtoupper(__('general.contacts'))}}</a><a class="title-main" href="/akcii">Акции</a>
            </div>
            <div class="footer-mobile__bottom">
                @foreach($phones as $phone)
                    <div class="bottom-item">
                        <a href="{{$phone->link}}">
                            @if($loop->first)
                                <img src="{{Voyager::image($phone->icon)}}" alt="{{$phone->value}}">
                            @endif
                            {{$phone->value}}
                        </a>
                    </div>
                @endforeach
                <div class="bottom-item">
                    <a href="{{route('pages.get','kontakty')}}">
                        <svg width="10" height="14" viewbox="0 0 10 14" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5 1.14441e-05C2.24302 1.14441e-05 0 2.18307 0 4.86634C0 8.23894 5.00492 14 5.00492 14C5.00492 14 10 8.07308 10 4.86634C10 2.18307 7.75707 1.14441e-05 5 1.14441e-05ZM6.5086 6.29121C6.09263 6.69598 5.54636 6.89841 5 6.89841C4.45373 6.89841 3.90729 6.69598 3.49148 6.29121C2.65961 5.48166 2.65961 4.16438 3.49148 3.35475C3.89429 2.96254 4.43011 2.74652 5 2.74652C5.56989 2.74652 6.10562 2.96262 6.5086 3.35475C7.34047 4.16438 7.34047 5.48166 6.5086 6.29121Z"
                                fill="#C2AFD3"/>
                        </svg>
                        @lang('general.weInMap')</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Footer mobile end -->
